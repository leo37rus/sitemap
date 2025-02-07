<?php

namespace App\Sitemap\Enum;

/**
 * Типы сайтмапов.
 */
enum SitemapTypeEnum: string
{
    /** @var string Тип CSV. */
    case Csv = 'csv';

    /** @var string Тип JSON. */
    case Json = 'json';

    /** @var string Тип XML. */
    case Xml = 'xml';
}
