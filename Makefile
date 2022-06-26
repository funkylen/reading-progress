setup-local:
	cp .env.example .env
	composer install
	npm install
	npm run dev
	php artisan migrate --seed

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
	composer exec phpstan -- analyse --memory-limit=2G

lint-fix:
	composer exec phpcbf -- --standard=PSR12 app tests
