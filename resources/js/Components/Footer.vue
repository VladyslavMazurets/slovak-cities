<template>
    <div class="footer px-13 pt-5">
        <div class="row">
            <div class="d-flex flex-column col-md-3 gap-4">
                <div class="d-flex flex-column">
                    <strong>ADRESA A KONTAKT</strong>
                    <FooterNavItem :title="'ŠÚKL'" />
                    <FooterNavItem :title="'Kvetná 11'" />
                    <FooterNavItem :title="'825 08 Bratislava 26'" />
                    <FooterNavItem :title="'Ústredňa:'" />
                    <FooterNavItem :title="'+421-2-50701 111'" />
                </div>

                <div class="d-flex flex-column">
                    <strong>KONTAKTY</strong>
                    <FooterNavItem :title="'telefónne čísla '" />
                    <FooterNavItem :title="'adresa'" />
                    <FooterNavItem :title="'úradné hodiny'" />
                    <FooterNavItem :title="'bankové spustenie'" />
                </div>

                <div class="d-flex flex-column">
                    <strong>INFORMÁCIE PRE VEREJNOSŤ</strong>
                    <FooterNavItem :title="'Zoznam vyvezených liekov'" />
                    <FooterNavItem :title="'MZ SR'" />
                    <FooterNavItem :title="'Národný портál zdravia'" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <strong>O NÁS</strong>
                    <FooterNavItem :title="'Dotazníky'" />
                    <FooterNavItem :title="'Hlavní predstavitelia'" />
                    <FooterNavItem :title="'Základné dokumentи'" />
                    <FooterNavItem :title="'Zmluvy za ŠÚKL'" />
                    <FooterNavItem :title="'História a súčasnosť'" />
                    <FooterNavItem :title="'Národná spolupráca'" />
                    <FooterNavItem :title="'Medzinárodná spolupráca'" />
                    <FooterNavItem :title="'Poradné orgány'" />
                    <FooterNavItem :title="'Legislatíva'" />
                    <FooterNavItem
                        :title="'Priestupky a iné správne delikty'"
                    />
                    <FooterNavItem :title="'Zoznam dlžníkov'" />
                    <FooterNavItem :title="'Sadzobník ŠÚKL'" />
                    <FooterNavItem :title="'Verejné obstarávanie'" />
                    <FooterNavItem :title="'Vzdelávacie akcie a prezentacie'" />
                    <FooterNavItem :title="'Konzultácie'" />
                    <FooterNavItem :title="'Voľné pracovné miesta (0)'" />
                    <FooterNavItem :title="'Poskytovanie informácií'" />
                    <FooterNavItem :title="'Sťažnosti a petície'" />
                </div>
            </div>

            <div class="d-flex flex-column col-md-3 gap-4">
                <div class="d-flex flex-column">
                    <strong>MÉDIÁ</strong>
                    <FooterNavItem :title="'Tlačové správy'" />
                    <FooterNavItem :title="'Lieky v médiách'" />
                    <FooterNavItem :title="'Kontakt pre médiá'" />
                </div>

                <div class="d-flex flex-column">
                    <strong>DATABÁZY A SERVIS</strong>
                    <FooterNavItem
                        :title="'Databáza liekov a zdravotníckych'"
                    />
                    <FooterNavItem :title="'pomôcок'" />
                    <FooterNavItem :title="'Iné zoznamy'" />
                    <FooterNavItem :title="'Kontaktný formulár'" />
                    <FooterNavItem :title="'Mapa stránoк'" />
                    <FooterNavItem :title="'A - Z index '" />
                    <FooterNavItem :title="'Linky'" />
                    <FooterNavItem :title="'RSS'" />
                    <FooterNavItem
                        :title="'Doplnok pre internetový prehliadač'"
                    />
                    <FooterNavItem :title="'Prehliadače formatov'" />
                </div>
            </div>

            <div class="d-flex flex-column col-md-3 gap-4">
                <div class="d-flex flex-column">
                    <strong>DROGOVÉ PREKURZORY</strong>
                    <FooterNavItem :title="'Aktuality'" />
                    <FooterNavItem :title="'Legislatíva'" />
                    <FooterNavItem :title="'Pokyny'" />
                    <FooterNavItem :title="'Kontakt'" />
                </div>

                <div class="d-flex flex-column">
                    <strong>INÉ</strong>
                    <FooterNavItem :title="'Linky'" />
                    <FooterNavItem :title="'Mapa stránoк'" />
                    <FooterNavItem :title="'FAQ'" />
                    <FooterNavItem :title="'Podmienky používania'" />
                </div>

                <div class="d-flex flex-column row">
                    <strong class="text-primary">RAPID ALERT SYSTEM </strong>
                    <FooterNavItem
                        :title="'Rýchla výstraha vyplývajúca z nedostatkov v kvalite liekov'"
                        class="text-primary"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import FooterNavItem from "./FooterNavItem.vue";
</script>
