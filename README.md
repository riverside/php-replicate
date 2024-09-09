# php-replicate
PHP client for Replicate

| Build | GitHub pages | Stable | License |
| ----- | ------------ | ------ | ------- |
| [![CI][x1]][y1] | [![pages-build-deployment][x4]][y4] | [![Latest Stable Version][x2]][y2] | [![License][x3]][y3] |

### Requirements
- PHP >= 7.1
- PHP extensions:
  - JSON (`ext-php`)

### Dependencies
- Guzzle HTTP (`guzzlehttp/guzzle`)

### Installation
If Composer is not installed on your system yet, you may go ahead and install it using this command line:
```
$ curl -sS https://getcomposer.org/installer | php
```
Next, add the following require entry to the <code>composer.json</code> file in the root of your project.
```json
{
    "require" : {
        "riverside/php-replicate" : "^1.0"
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
$request = new \Riverside\Replicate\Request('your token');
```

Create an instance of Model
```php
$model = new \Riverside\Replicate\Model($request);
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
<?php
$request = new \Riverside\Replicate\Request('your token');
$model = new \Riverside\Replicate\Model($request);
$response = $model->get('model owner', 'model name');
print_r($response->getBody());
```

or
```php
<?php
use Riverside\Replicate\Request;
use Riverside\Replicate\Model;

$request = new Request('your token');
$model = new Model($request);
$response = $model->get('model owner', 'model name');
print_r($response->getBody());
```

### Running tests
Developers clone the repository, and if needed, they can create their own **phpunit.xml** by copying **phpunit.xml.dist** and filling in their own configuration without modifying the version-controlled file.
```
cp phpunit.xml.dist phpunit.xml
```

### API
- [Account][1]
- [Collection][2]
- [Deployment][3]
- [Hardware][4]
- [Model][5]
- [Prediction][6]
- [Request][7]
- [Response][8]
- [Training][9]
- [Webhook][10]

[1]: https://riverside.github.io/php-replicate/api.html#account
[2]: https://riverside.github.io/php-replicate/api.html#collection
[3]: https://riverside.github.io/php-replicate/api.html#deployment
[4]: https://riverside.github.io/php-replicate/api.html#hardware
[5]: https://riverside.github.io/php-replicate/api.html#model
[6]: https://riverside.github.io/php-replicate/api.html#prediction
[7]: https://riverside.github.io/php-replicate/api.html#req
[8]: https://riverside.github.io/php-replicate/api.html#resp
[9]: https://riverside.github.io/php-replicate/api.html#training
[10]: https://riverside.github.io/php-replicate/api.html#webhook
[x1]: https://github.com/riverside/php-replicate/actions/workflows/main.yml/badge.svg
[y1]: https://github.com/riverside/php-replicate/actions/workflows/main.yml
[x2]: https://poser.pugx.org/riverside/php-replicate/v/stable
[y2]: https://packagist.org/packages/riverside/php-replicate
[x3]: https://poser.pugx.org/riverside/php-replicate/license
[y3]: https://packagist.org/packages/riverside/php-replicate
[x4]: https://github.com/riverside/php-replicate/actions/workflows/pages/pages-build-deployment/badge.svg
[y4]: https://github.com/riverside/php-replicate/actions/workflows/pages/pages-build-deployment
