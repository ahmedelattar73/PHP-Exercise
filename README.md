

# PHP Exercise
PHP Exercise based on Laravel framework.  
**NOTE: This project just for back-end API's and you must clone and install another front-end project based on Vue js [from this repo.](https://github.com/ahmedelattar73/VUE-Exercise)**

## Installation
**Use this steps for installations**

- Install composer dependencies.  (This project depends on [laravel sail](https://laravel.com/docs/9.x/sail) package which should be installed by composer.)  
  [Learn more](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)

```bash docker run --rm \ -u "$(id -u):$(id -g)" \    
 -v $(pwd):/var/www/html \    
 -w /var/www/html \ laravelsail/php81-composer:latest \ composer install --ignore-platform-reqs  
 ```   
- Build and run docker.
```bash $ ./vendor/bin/sail up  
 ```   
- Run jobs and queues watcher.
 ```bash $ ./vendor/bin/sail php artisan queue:work $ ./vendor/bin/sail php artisan schedule:work  
 ```   
## Code quality helper commands

Using some tools to check code quality (Unit Test - Code Sniffer - Code analyzer).
- Unit Test.

```bash $ ./vendor/bin/sail php artisan test  
```  
- [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).
```bash $ ./vendor/bin/sail php ./vendor/bin/phpcs // Code sniffer check.  
$ ./vendor/bin/sail php ./vendor/bin/phpcbf // Code sniffer Fix.  
```  
- Code analyzer ([phpStan](https://phpstan.org/)).
```bash $ ./vendor/bin/sail php ./vendor/bin/phpstan analyse -l 6 // Code analyzer.  
```
