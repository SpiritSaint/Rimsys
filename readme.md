> *NEW* Want all of your models typed out as interfaces? check out [modeltyper](https://github.com/fumeapp/modeltyper)

## Rimsys Test

### Installation

* clone from GitHub
* run `yarn` and `composer install` to install all of your deps
* copy `.env.example` to `.env` and configure it to your likings
* generate encrypted key
* migrate database tables
* run `php artisan db:seed` command
* TL;DR
 ```bash
git clone git@github.com:SpiritSaint/Rimsys.git; cd laranuxt; yarn; composer install; cp .env.example .env; php artisan key:generate;
 ```

### Local Environment
* run `yarn dev` in one terminal for our nuxt dev setup
* run `yarn api` (alias for `./artisan serve`) in another terminal for our laravel API


