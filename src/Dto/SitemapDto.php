<?php

namespace App\Sitemap\Dto;

use DateTime;

/**
 * DTO-объект, данных карты сайта.
 */
class SitemapDto
{
    /**
     * Инициализирует класс {@link SitemapDto}
     *
     * @param string $loc Адрес страницы.
     * @param DateTime $lastmod Дата изменения страницы.
     * @param float $priority Приоритет парсинга.
     * @param string $changefreq Периодичность обновления.
     */
    public function __construct(
        public readonly string $loc,
        public readonly DateTime $lastmod,
        public readonly float $priority,
        public readonly string $changefreq,
    ) {}

    /**
     * Преобразование объекта в массив.
     *
     * @return array
     */
    public function toArray(): array
    {
        $vars = get_object_vars($this);

        foreach ($vars as $key => $var) {
            $vars[$key] = $this->valueToArray($var);
        }

        return $vars;
    }

    /**
     * Рекурсивное преобразование свойства объекта в массив.
     *
     * @param mixed $var Значение для преобразования.
     * @return mixed
     */
    protected function valueToArray($var): mixed
    {
        if (is_array($var) || is_iterable($var)) {
            foreach ($var as &$v) {
                $v = $this->valueToArray($v);
            }
        }

        return $var;
    }
}
