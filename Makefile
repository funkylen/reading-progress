setup-local:
	cp .env.local .env
	touch database/database.sqlite
	make install
	php artisan migrate --seed
	make ide-helper

install:
	composer install
	npm ci
	npm run dev

migrate:
	php artisan migrate

seed:
	php artisan db:seed

validate:
	composer validate

serve:
	php artisan serve

lint:
	composer exec phpcs -- --standard=PSR12 app tests
	composer exec phpstan -- analyse

lint-fix:
	composer exec phpcbf -- --standard=PSR12 app tests

test:
	composer exec phpunit -- tests

ide-helper:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta
