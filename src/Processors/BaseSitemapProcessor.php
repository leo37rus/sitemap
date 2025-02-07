<?php

namespace App\Sitemap\Processors;

use App\Sitemap\Dto\SitemapDto;
use App\Sitemap\Exceptions\PermissionDeniedException;
use Exception;
use App\Sitemap\Exceptions\FileCreateException;

abstract class BaseSitemapProcessor implements SitemapProcessorInterface
{
    /** @var SitemapDto[] */
    protected array $data;
    /** @var string  */
    protected string $filePath;

    /**
     * @inheritDoc
     */
    public function setData(SitemapDto $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setFilePath(string $path): self
    {
        $this->filePath = $path;

        return $this;
    }

    /**
     * @throws Exception|FileCreateException
     */
    protected function saveToFile(string $content): void {
        if (file_put_contents($this->checkPath($this->filePath), $content) === false) {
             throw new FileCreateException('Ошибка сохранения файла');
        }
    }

    /**
     * @throws Exception|PermissionDeniedException
     */
    protected function checkPath(): string {
        if (!is_dir($this->filePath) && !@mkdir($this->filePath, 0755, true)) {
            throw new PermissionDeniedException('Доступ к сохранению запрещен');
        }
        return $this->filePath;
    }
}
