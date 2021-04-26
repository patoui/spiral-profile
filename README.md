# Spiral Profile

A profile website created with Spiral framework 

Server Requirements
--------
Make sure that your server is configured with following PHP version and extensions:
* PHP 7.4+, 64bit
* *mb-string* extension
* PDO Extension with desired database drivers

Installation
--------
```bash
$ git clone https://github.com/patoui/spiral-profile.git
$ composer install
$ copy .env.sample .env
$ php app.php encrypt:key -m .env
$ php app.php configure -vv
$ ./vendor/bin/spiral get
```

Once the application is installed you can ensure that it was configured properly by executing:

```
$ php ./app.php configure
```

To start application server execute:

```bash
$ ./spiral serve -v -d
```

On Windows:

```$xslt
$ spiral.exe serve -v -d
```

Application will be available on `http://localhost:8080`.

> Read more about application server configuration [here](https://roadrunner.dev/docs).

Testing:
--------
To test an application:

```bash
$ ./vendor/bin/phpunit
```

Build with [Spiral Skeleton App](https://github.com/spiral/app), license included at [SPIRAL LICENSE](./SPIRAL-LICENSE)
