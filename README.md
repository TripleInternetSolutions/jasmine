# jasmine
A Laravel admin panel

## Instillation
```bash
php artisan migrate --path=vendor/tis/jasmine/database/migrations
```

```php
Route::group(['prefix' => 'jasmine'], function () {
   Jasmine::routes();
});
```

## Development
add to composer.json of a new laravel project
```json
  "repositories": {
    "package-name": {
      "type": "path",
      "url": "packages/tis/jasmine",
      "options": {
        "symlink": true
      }
    }
  },
```
