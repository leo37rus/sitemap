<?php

namespace App\Sitemap\Processors;

/**
 *  Обработчик xml формата
 */
class JsonSitemapProcessor extends BaseSitemapProcessor
{
    /**
     * @inheritDoc
     */
    public function generate(): void
    {
        $this->saveToFile(
            json_encode($this->data->toArray(), JSON_UNESCAPED_UNICODE)
        );
    }
}
