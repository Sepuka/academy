<?php

namespace sepuka\academy\sort;

/**
 * Сортировки сравнениями
 */
class ComparisonSorter
{
    /**
     * Пузырьковая сортировка. Простейший вариант
     * Суть - соседние элементы сравниваются между собой и меняются местами при необходимости
     * до тех пор, пока массив не будет сортирован
     *
     * @param array $items
     *
     * @return array
     */
    public function bubbleSort(array $items): array
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

    /**
     * Пузырьковая сортировка. Улучшение в определении состоявшихся изменений в процессе цикла сортировки
     * Для уже сортированного массива алгоритм не проверяет следующие элементы
     *
     * @param array $items
     *
     * @return array
     */
    public function bubbleSortWithActionDetect(array $items): array
    {
        $n = count($items);

        for ($i = 0; $i < $n - 1; ++$i) {
            $change = false;
            for ($j = $n - 1; $j > $i; --$j) {
                $a = $items[$j - 1];
                $b = $items[$j];
                if ($a > $b) {
                    $items[$j] = $a;
                    $items[$j - 1] = $b;
                    $change = true;
                }
            }
            if ($change === false) {
                break;
            }
        }

        return $items;
    }
}
