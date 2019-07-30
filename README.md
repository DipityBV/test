# Fantastic Frontender Functional Testing Framework
This framework allows for testing JSON APIs included with Frontender.

## Instructions
To install FFFTF, run `composer install`:

    composer install

To run the functional tests, run PHPUnit:

    vendor/bin/phpunit Test/Functional/

## Todo
- Move the URLs from the `PlatformDataProvider` class to separate configuration files
    - YAML files or INI files
    - Load the new configuration via the original DataProvider class
    - Group entries by deployment type (development, staging, production)
- Add a cronjob to run these tests automatically
