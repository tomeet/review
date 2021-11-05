# review

## Installing

```shell
$ composer require tomeet/reviews
```

### Configuration

This step is optional

```bash
$ php artisan vendor:publish --provider="Tomeet\\Reviews\\ReviewServiceProvider" --tag=config
```

### Migrations

This step is required, you can publish the migration files:

```bash
$ php artisan vendor:publish --provider="Tomeet\\Reviews\\ReviewServiceProvider" --tag=migrations
```

then create tables: 

```bash
$ php artisan migrate
```