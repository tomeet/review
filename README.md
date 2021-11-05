# review

## Installing

```shell
$ composer require overtrue/laravel-vote -vvv
```

### Configuration

This step is optional

```bash
$ php artisan vendor:publish --provider="Tomeet\\Review\\ReviewServiceProvider" --tag=config
```

### Migrations

This step is required, you can publish the migration files:

```bash
$ php artisan vendor:publish --provider="Tomeet\\Review\\ReviewServiceProvider" --tag=migrations
```

then create tables: 

```bash
$ php artisan migrate
```