install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games:
	php ./bin/brain-games

brain-even:
	php ./bin/brain-even

brain-calc:
	php ./bin/brain-calc