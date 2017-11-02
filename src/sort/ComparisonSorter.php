<?php

namespace sepuka\academy\sort;

/**
 * Сортировки сравнениями
 */
class ComparisonSorter
{
    /**
     * Пузырьковая сортировка
     * Суть - соседние элементы сравниваются между собой и меняются местами при необходимости
     * до тех пор, пока массив не будет сортирован
     *
     * @param array $items
     *
     * @return array
     */
    public function bubbleSort(array $items)
    {
        $n = count($items);

        for ($i = 0; $i < $n - 1; ++$i) {
            for ($j = $n - 1; $j > $i; --$j) {
                $a = $items[$j - 1];
                $b = $items[$j];
                if ($a > $b) {
                    $items[$j] = $a;
                    $items[$j - 1] = $b;
                }
            }
        }

        return $items;
    }
}
