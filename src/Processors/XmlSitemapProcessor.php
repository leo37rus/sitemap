<?php

namespace App\Sitemap\Processors;

use XMLWriter;

/**
 *  Обработчик xml формата
 */
class XmlSitemapProcessor extends BaseSitemapProcessor
{
    /**
     * @inheritDoc
     */
    public function generate(): void
    {
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->setIndentString('	');
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElement('urlset');
        $xmlWriter->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xmlWriter->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xmlWriter->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        foreach ($this->data as $sitemap) {
            $xmlWriter->startElement('url');

            $xmlWriter->startElement('loc');
            $xmlWriter->text($sitemap->loc);
            $xmlWriter->endElement();

            $xmlWriter->startElement('lastmod');
            $xmlWriter->text($sitemap->lastmod->format('Y-m-d'));
            $xmlWriter->endElement();

            $xmlWriter->startElement('priority');
            $xmlWriter->text($sitemap->priority);
            $xmlWriter->endElement();

            $xmlWriter->startElement('changefreq');
            $xmlWriter->text($sitemap->changefreq);
            $xmlWriter->endElement();

            $xmlWriter->endElement();
        }

        $xmlWriter->endElement();
        $xmlWriter->endDocument();

        $this->saveToFile($xmlWriter->outputMemory());
    }
}
