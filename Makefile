install:
	composer install

validate:
	composer validate

brain-games:
	php ./bin/brain-games

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin