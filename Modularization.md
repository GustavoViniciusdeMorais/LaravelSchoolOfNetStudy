# Modularizaton

### Postgres
```

psql -d postgres -U postgres

\l # list databases

\c # connect to database

\dt # show tables

\d table # describe table

select * from customers;

```

### Commands
```

composer require nwidart/laravel-modules

php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

php artisan module:make Blog

php artisan module:make-migration create_posts Blog

```
