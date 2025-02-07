<?php

namespace App\Sitemap\Processors;

use App\Sitemap\Enum\SitemapTypeEnum;
use App\Sitemap\Exceptions\NotImplementedException;

/**
 * Фабрика для создания экземпляра обработчика карты сайта
 */
class SitemapProcessorFactory
{
    /**
     * @param SitemapTypeEnum $type
     * @return SitemapProcessorInterface
     * @throws NotImplementedException
     */
    public static function build(SitemapTypeEnum $type): SitemapProcessorInterface
    {
        switch ($type->value) {
            case SitemapTypeEnum::Csv->value:
                $processor = CsvSitemapProcessor::class;
                break;
            case SitemapTypeEnum::Xml->value:
                $processor = XmlSitemapProcessor::class;
                break;
            case SitemapTypeEnum::Json->value:
                $processor = JsonSitemapProcessor::class;
                break;
            default:
                throw new NotImplementedException('По указанному типу не существует обработчика.');
        }

        return new $processor();
    }
}
