setup-local:
	cp .env.local .env
	touch database/database.sqlite
	composer install
	npm install
	npm run dev
	php artisan migrate --seed
	php artisan ide-helper:generate
	php artisan ide-helper:models -n
	php artisan ide-helper:meta

install:
	composer install
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
