# Laravel project

```bash
php artisan serve
npm run dev
```

## project立ち上げ

```plaintext
composer create-project laravel/laravel tsumigee-list
git init
git remote add origin https://github.com/kohara1202/tsumigee-list.git
git branch -M main
```

この後にcommit、push。

## migration

```plaintext
php artisan make:migration create_hards_table
php artisan make:migration create_makers_table
php artisan make:migration create_games_table
# 諸々書き終わったら
php artisan migrate
```

## breeze導入

```plaintext
composer require laravel/breeze --dev  # blade を選択
php artisan breeze:install
npm install
```

## model

```plaintext
php artisan make:model Hard
php artisan make:model Maker
php artisan make:model Game
```

## seeder

```plaintext
php artisan make:seeder HardsTableSeeder
php artisan make:seeder MakersTableSeeder
php artisan make:seeder GamesTableSeeder
# 諸々書き終わったら
php artisan db:seed
```

## controller

```plaintext
php artisan make:controller GameController
php artisan make:controller HardController
php artisan make:controller MakerController
```

## bootstrap

```plaintext
composer require laravel/ui
php artisan ui bootstrap
npm install
```
