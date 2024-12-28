<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities and municipalities from Nitra region from e-obce.sk';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://www.e-obce.sk/kraj/NR.html';

        $html = file_get_contents($url);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        if (! $html) {
            $this->error('Failed to load the page: '.$url);

            return;
        }

        $crawler = new Crawler($html);

        $crawler->filter('td[colspan="2"] a')->each(function (Crawler $node) {
            $okresUrl = $node->attr('href');
            $okresName = $node->text();

            $this->info("Parsing district: $okresName");

            $okresHtml = file_get_contents($okresUrl);
            $okresHtml = mb_convert_encoding($okresHtml, 'HTML-ENTITIES', 'UTF-8');

            if (! $okresHtml) {
                $this->error("Failed to load the district page: $okresUrl");

                return;
            }

            $okresCrawler = new Crawler($okresHtml);

            $okresCrawler->filter('table[cellpadding="3"] tr td a')->each(function (Crawler $node) use ($okresName) {

                $cityUrl = $node->attr('href');

                if (! str_starts_with($cityUrl, 'https://www.e-obce.sk/obec/')) {
                    $this->warn("Skipped invalid link: $cityUrl");

                    return;
                }

                $cityName = $node->text();

                $cityHtml = file_get_contents($cityUrl);
                $detectedEncoding = mb_detect_encoding($cityHtml, 'UTF-8, ISO-8859-2, ISO-8859-1, ASCII', true);
                $cityHtml = mb_convert_encoding($cityHtml, 'HTML-ENTITIES', $detectedEncoding ?: 'UTF-8');

                if (! $cityHtml) {
                    $this->error("Failed to load the city page: $cityUrl");

                    return;
                }

                $cityCrawler = new Crawler($cityHtml);

                $mayorName = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[8]//td[2]')->text();
                $cityHallAddress = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[5]//td[1]')->text();
                $phone = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[3]//td[4]')->text();
                $fax = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[4]//td[3]')->text();
                $email = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[5]//td[3]')->text();
                $website = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[6]//td[3]')->text();

                $coatOfArmsUrl = $cityCrawler->filterXPath('//table[@cellspacing="3"]//tr[3]//td//img')->attr('src');

                try {
                    $imageContents = file_get_contents($coatOfArmsUrl);

                    $imageName = str_replace([' ', '/'], '_', $cityName).'.png';
                    $imagePath = "coat_of_arms_imgs/$imageName";

                    Storage::disk('public')->put($imagePath, $imageContents);

                    $localImagePath = Storage::url($imagePath);

                } catch (\Exception $e) {
                    $this->error('Failed to download or save coat of arms: '.$e->getMessage());
                }

                City::updateOrCreate(
                    ['name' => $cityName],
                    [
                        'mayor_name' => $mayorName,
                        'city_hall_address' => $cityHallAddress,
                        'phone' => $phone,
                        'fax' => $fax ?? null,
                        'email' => $email ?? null,
                        'website' => $website ?? null,
                        'coat_of_arms_path' => $localImagePath ?? null,
                        'region' => $okresName ?? null,
                    ]
                );

                $this->info("City $cityName has been imported into district $okresName.");
            });
        });
    }
}
