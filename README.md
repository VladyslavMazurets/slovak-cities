## Used technologies

-   PHP 8.1
-   PostgreSQL 13
-   [Laravel](https://laravel.com)
-   [Vue 3](https://vuejs.org/)
-   [Inertia](https://inertiajs.com/)

## START

### 1. Clone the project

```sh
$ git clone git@github.com:VladyslavMazurets/slovak-cities.git
```

### 2. Install dependencies from `composer.json`

```sh
$ composer install --ignore-platform-reqs
```

### 3A. Run Laravel Sail

```sh
$ ./vendor/bin/sail up
```

### 3B. Or run Laravel Sail in "[`detached`](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail)" mode

> You can configure an `alias` that allows you to execute Sail's commands more easily [`Configuring A Bash Alias`](https://laravel.com/docs/8.x/sail#configuring-a-bash-alias).

```sh
$ sail up -d
```

### 4. Run migrations and optionally also seeder

```sh
$ sail art migrate:fresh
```

### 5. Install dependencies from `package-lock.json`

```sh
$ sail npm install
```

### 6A. For local development run

```sh
$ sail npm run dev
```

### 7. Import Slovak cities located in Nitra
To import Slovak cities located in Nitra, run the following command:

```sh
$ sail art data:import
```

### 8. Geocode cities in Nitra
To fetch and update the geolocation (latitude and longitude) of all cities located in Nitra, run the following command:

```sh
$ sail art data:geocode
```

