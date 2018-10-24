Symfony Cours
=============

Install
---------

```bash
docker-compose up -d
docker-compose exec php-fpm php bin/console doctrine:schema:update --force
yarn install
yarn run dev

```