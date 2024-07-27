init: docker-down-clear \
	docker-pull docker-build docker-up \
	project-init

up: docker-up
down: docker-down
restart: down up

update-deps: project-composer-update \
	restart

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build --pull

project-init: project-permissions project-composer-install project-wait-db init-db

project-permissions:

project-composer-install:
	docker-compose run --rm lara-php-cli composer install

project-composer-update:
	docker-compose run --rm lara-php-cli composer update

project-wait-db:
	docker-compose run --rm lara-php-cli wait-for-it lara-postgres:5432 -t 30

init-db:
	docker-compose run --rm lara-php-cli php artisan migrate:fresh