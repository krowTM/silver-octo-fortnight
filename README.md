# Video Importer

## 1. Setup
   - run `composer install`
   - run `chmod +x bin/import`

## 2. Running
   - run `./bin/import glorf`
   - run `./bin/import flub`
   
## 3. Tests
   - run `./vendor/bin/phpunit`

## 4. Others
   - I have written unit tests before with PHPUnit
   - I would have implemented some sort of service provider and services for data loader, parser, persistence, logging
   - I would have implemented data parsing line by line from the feed so that the while feed is not loaded into memory
   
