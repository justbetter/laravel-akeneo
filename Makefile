analyse:
	./vendor/bin/phpstan analyse

coverage:
	XDEBUG_MODE=coverage ./vendor/bin/pest --coverage --min=75

all: analyse coverage
