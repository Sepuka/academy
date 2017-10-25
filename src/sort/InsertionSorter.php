<?php

declare(strict_types=1);

namespace sepuka\academy\sort;

/**
 * Реализации алгоритмов сортировки
 * 1. Простая сортировка вставками, устойчивый алгоритм
 * 2. Сортировка двоичными вставками
 */
class InsertionSorter
{
    /**
     * @param array $items
     *
     * @return array
     */
    public function straightInsertionSorter(array $items): array
    {
        for($i = 0; $i < count($items); ++$i) {
            $current = $items[$i];
            $j = $i;
            while ($j > 0 && $current < $items[$j - 1]) {
                $items[$j] = $items[$j - 1];
                --$j;
            }
            $items[$j] = $current;
        }

        return $items;
    }
}
