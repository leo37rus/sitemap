
#  Библиотека генерации карты сайта 

Генерация файла карты сайта на php. Доступные форматы: xml, json, csv.

## Установка

Усановка библиотеки через Composer

```bash
composer require leo37rus/sitemap
```

## Требования

Минимальные требование для данной библиотеки, требуется Веб сервер с поддержкой  `PHP 8.1.`

## Как работает

Для генерации файла необходимо инициализировать класс `SitemapGenerator` передав в него необходимые параметры и вызвать метод `generate()`.

## Пример

```php

use App\Sitemap\SitemapGenerator;

$data = [];

$example = [
	[
		'loc' => 'https://site.ru/',
		'lastmod' => '2020-12-14',
		'priority' => 1,
		'changefreq' => 'hourly',

	],
	[
		'loc' => 'https://site.ru/news',
		'lastmod' => '2020-12-10',
		'priority' => 0.5,
		'changefreq' => 'daily',

	],
	[
		'loc' => 'https://site.ru/about',
		'lastmod' => '2020-12-07',
		'priority' => 0.1,
		'changefreq' => 'weekly',

	],
	[
		'loc' => 'https://site.ru/products',
		'lastmod' => '2020-12-12',
		'priority' => 0.5,
		'changefreq' => 'daily',

	],
	[
		'loc' => 'https://site.ru/products/ps5',
		'lastmod' => '2020-12-11',
		'priority' => 0.1,
		'changefreq' => 'weekly',

	],
	[
		'loc' => 'https://site.ru/products/xbox',
		'lastmod' => '2020-12-12',
		'priority' => 0.1,
		'changefreq' => 'weekly',

	],
	[
		'loc' => 'https://site.ru/products/wii',
		'lastmod' => '2020-12-15',
		'priority' => 0.3,
		'changefreq' => 'weekly',

	]
];

foreach($example as $item) {
    $data[] = SitemapDto::createInstanceFromArray($item);
} 

try {
    $generator = (new SitemapGenerator($data, 'xml', 'path\\to\\file'));
    $generator->generate();
} catch (Exception $e) {
	  echo 'Ошибка генерации' . $e->getMessage();
}
```


[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
