analyse:
	php vendor/bin/phpstan analyse

coverage:
	XDEBUG_MODE=coverage php vendor/bin/pest --coverage --min=99

test:
	php vendor/bin/pest

all: analyse coverage
