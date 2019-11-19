# jasmine
A Laravel admin panel

## Instillation
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
