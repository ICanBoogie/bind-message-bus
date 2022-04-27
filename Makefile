# customization

PACKAGE_NAME = icanboogie/bind-message-bus
PHPUNIT = vendor/bin/phpunit
SERVICES_DST = config/services.yml
SERVICES_SRC = vendor/icanboogie/message-bus/lib/Symfony/services.yaml

# do not edit the following lines

all: vendor $(SERVICES_DST)

vendor:
	@composer install

$(SERVICES_DST): $(SERVICES_SRC)
	cp $^ $@

# testing

.PHONY: test-dependencies
test-dependencies: vendor $(SERVICES_DST)

.PHONY: test
test: test-dependencies
	@$(PHPUNIT)

.PHONY: test-coverage
test-coverage: test-dependencies
	@mkdir -p build/coverage
	@XDEBUG_MODE=coverage $(PHPUNIT) --coverage-html ../build/coverage

.PHONY: test-coveralls
test-coveralls: test-dependencies
	@mkdir -p build/logs
	@$(PHPUNIT) --coverage-clover ../build/logs/clover.xml

.PHONY: test-container
test-container:
	@-docker-compose run --rm app bash
	@docker-compose down -v

.PHONY: lint
lint:
	@XDEBUG_MODE=off phpcs -s
	@XDEBUG_MODE=off vendor/bin/phpstan
