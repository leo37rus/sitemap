<?php

namespace App\Sitemap;

use App\Sitemap\Dto\SitemapDto;
use App\Sitemap\Enum\SitemapTypeEnum;
use App\Sitemap\Exceptions\InvalidTypeException;
use App\Sitemap\Processors\SitemapProcessorFactory;

/**
 * Класс генератора карты сайта
 */
class SitemapGenerator
{
    /**
     * @param SitemapDto[] $data
     * @param SitemapTypeEnum $type
     * @param string $filePath
     */
    public function __construct(
        private readonly array $data,
        private readonly SitemapTypeEnum $type,
        private readonly string $filePath
    ) {
        $this->validate();
    }

    /**
     * @return void
     * @throws InvalidTypeException
     */
    private function validate(): void
    {
        foreach ($this->data as $dto)
        {
            if (!$dto instanceof SitemapDto) {
                 throw new InvalidTypeException('Передан некоректный тип данных');
            }
        }
    }

    /**
     * @return string
     * @throws Exceptions\NotImplementedException
     */
    public function generate(): string
    {
        $processor = SitemapProcessorFactory::build($this->type);
        $processor
            ->setData($this->data)
            ->setFilePath($this->filePath)
            ->generate();

        return $this->filePath;
    }
}
