<img src='https://travis-ci.org/neg0/php7-oop-test.svg?branch=master' alt='Built Status'>

# bud Technical Test
 * Task I: Establishing Http connections: POST, GET, and DELETE with SSL Key and Certification
 * Task II: Translate Binary to readable English words

## Run using Docker 
```bash
$: docker-compose -f docker/docker-compose.yml up --build -d
$: docker-compose -f docker/docker-compose.yml exec php composer install
$: docker-compose -f docker/docker-compose.yml exec php ./bin/phpunit src/Tests --no-coverage
```

### Notes:
 * OOP PHP7
 * TDD (All services for domains are Unit Tested using PHPUnit)
 * Two Main Dependencies: 
    * Guzzle: Http Client Library
    * Base2n: Binary Encode and Decoder
 * Dependencies are injected to application using Adapter pattern to separate the layer of application according to Clean Architecture principles in software engineering
 * Application is containerised using Docker for portability
 * UnitTests: 21 tests, 32 assertions

> Improvements: Could use Symfony YAML Component to load Client Id, Client Secret and other private constants.

### License
Creative Commons Attribution-NonCommercial-NoDerivs *CC BY-NC-ND*

<img src='https://licensebuttons.net/l/by-nc-nd/3.0/88x31.png' alt='CC BY-NC-ND'>