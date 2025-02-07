<?php

namespace App\Sitemap\Processors;

/**
 * Обработчик csv формата
 */
class CsvSitemapProcessor extends BaseSitemapProcessor
{
    /**
     * @inheritDoc
     */
    public function generate(): void
    {
        $content = implode(';', array_keys(self::$keyPosition));
        $content .= PHP_EOL;
        foreach ($this->data->toArray() as $sitemap) {
            $content .= implode(';', $sitemap);
            $content .= PHP_EOL;
        }

        $this->saveToFile($content);
    }
}
