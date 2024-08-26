# php-replicate
PHP client for Replicate

| Build | GitHub pages | Stable | License |
| ----- | ------------ | ------ | ------- |
| [![CI][x1]][y1] | [![pages-build-deployment][x4]][y4] | [![Latest Stable Version][x2]][y2] | [![License][x3]][y3] |

### Requirements
- PHP >= 7.1
- cURL extension
- JSON extension

### Installation
If Composer is not installed on your system yet, you may go ahead and install it using this command line:
```
$ curl -sS https://getcomposer.org/installer | php
```
Next, add the following require entry to the <code>composer.json</code> file in the root of your project.
```json
{
    "require" : {
        "riverside/php-replicate" : "*"
    }
}
```
Finally, use Composer to install php-replicate and its dependencies:
```
$ php composer.phar install 
```

### Configuration
Include autoload in your project: 
```php
require __DIR__ . '/vendor/autoload.php';
```

### How-to use
Create an instance of Request:
```php
$request = new Request('your token');
```

Create an instance of Model
```php
$model = new Model($request);
```

Call actual endpoint:
```php
$response = $model->get('model owner', 'model name');
```

Get result:
```php
print_r($response->getBody());
```

Full example:
```php
$request = new Request('your token');
$model = new Model($request);
$response = $model->get('model owner', 'model name');
print_r($response->getBody());
```

[x1]: https://github.com/riverside/php-replicate/actions/workflows/main.yml/badge.svg
[y1]: https://github.com/riverside/php-replicate/actions/workflows/main.yml
[x2]: https://poser.pugx.org/riverside/php-replicate/v/stable
[y2]: https://packagist.org/packages/riverside/php-replicate
[x3]: https://poser.pugx.org/riverside/php-replicate/license
[y3]: https://packagist.org/packages/riverside/php-replicate
[x4]: https://github.com/riverside/php-replicate/actions/workflows/pages/pages-build-deployment/badge.svg
[y4]: https://github.com/riverside/php-replicate/actions/workflows/pages/pages-build-deployment
