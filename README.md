# MinorWork Twig View

A Twig bridge for MinorWork to use Twig as view renderer.

## Usage

First install `minorwork/twig-view`

```
composer require minorwork/twig-view
```

Then tell MinorWork to use TwigView as view renderer.

```php
<?php
use MinorWork\App;

// index.php
$app = new App();
$app->set('view', '\MinorWork\View\TwigView');

// in your request handler
$app->view->basePath('/path/to/your/templates');
$app->view->prepare('template.twig', ['title' => 'Doctor', 'name' => 'Strange Love']);
```

That's all!

