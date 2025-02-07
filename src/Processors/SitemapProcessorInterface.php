<?php

namespace App\Sitemap\Processors;

use App\Sitemap\Dto\SitemapDto;

/**
 * Интерфейс класса генератора
 */
interface SitemapProcessorInterface
{
    /**
     * @param SitemapDto $data
     * @return self
     */
    public function setData(SitemapDto $data): self;

    /**
     * @param string $path
     * @return self
     */
    public function setFilePath(string $path): self;

    /**
     * @return void
     */
    public function generate(): void;
}
