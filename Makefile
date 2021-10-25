analyse:
	./vendor/bin/phpstan analyse

coverage:
	XDEBUG_MODE=coverage ./vendor/bin/pest --coverage --min=95

test:
	./vendor/bin/pest

all: analyse coverage
