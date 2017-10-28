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

    /**
     * Сортировка бинарными вставками
     * заключается в том, что всю последовательность можно разбить на 2 части: источник и приемник
     * приемник находится слева и является сортированным поэтому можно применить поиск делением попалам
     * для нахождения позиции вставки
     * @param array $items
     * @return array
     */
    public function binaryInsertionSorter(array $items): array
    {
        for($i = 1; $i < count($items); ++$i) {
            $current = $items[$i];
            $leftPosition = 0;
            $rightPosition = $i;
            while ($leftPosition < $rightPosition) {
                $middle = (int)floor(($leftPosition + $rightPosition)/2);
                if ($items[$middle] <= $current) {
                    $leftPosition = $middle + 1;
                } else {
                    $rightPosition = $middle;
                }
            }
            for($j = $i; $j >= $rightPosition + 1; --$j) {
                $items[$j] = $items[$j - 1];
            }
            $items[$rightPosition] = $current;
        }

        return $items;
    }
}
