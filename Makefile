.PHONY: test

test: vendor/bin/phpunit
	vendor/bin/phpunit

vendor/bin/phpunit:
	composer install
