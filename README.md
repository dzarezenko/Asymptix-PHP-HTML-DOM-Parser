# Asymptix PHP HTML DOM Parser

[Composer](https://getcomposer.org/) adaptation and wrapper for the [Simple HTML DOM](http://simplehtmldom.sourceforge.net/) parser written on PHP5+ let you manipulate HTML in a very easy and fast way. It supports invalid HTML DOM and may find tags in HTML DOM with selectors just like jQuery.

### Composer installation

To install with [Composer](https://getcomposer.org/) simply create this `composer.json` file in your project root folder and run composer command `composer install`.

```json
{
	"minimum-stability": "dev",
    "require": {
        "php": ">=5.3.2",
		"asymptix/php-html-dom-parser": "1.5.*"
    }
}
```

### Usage

Here you can find a simple example how to use Parser to parse products from some shop web-site and then parse product details from product pages:

```php
use Asymptix\HtmlDomParser\HtmlDomParser;

require_once('vendor/autoload.php');

$url = "http://www.some-shop.com/";
$html = new HtmlDomParser();
$html->loadUrl($url);
foreach ($html->find("a.product") as $productItem) {
    $productHtml = new HtmlDomParser();
    $productHtml->loadUrl($productItem->href);

    $productDetails = $productHtml->find("div#productDetails", 0);
    $productForm = $productHtml->find("div#productForm", 0);
    
    $product = new stdClass();

    if (is_object($productForm)) {
        $product->price = $productForm->find("div.price", 0)->plaintext;
    }

    unset($productHtml);
}
```
