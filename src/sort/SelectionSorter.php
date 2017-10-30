<?php
declare(strict_types=1);

namespace sepuka\academy\sort;

/**
 * Семейства сортировок выбором
 */
class SelectionSorter
{
    /**
     * Простая сортировка выбором
     * Сложность порядка O(n^2)
     *
     * @param array $data
     *
     * @return array
     */
    public function simpleSort(array $data): array
    {
        $n = count($data);

        for ($i = 0; $i < $n - 2; ++$i) {
            $minIndex = $i;
            $minValue = $data[$i];
            for($j = $i + 1; $j < $n; ++$j) {
                if ($data[$j] < $minValue) {
                    $minIndex = $j;
                    $minValue = $data[$minIndex];
                }
            }
            $data[$minIndex] = $data[$i];
            $data[$i] = $minValue;
        }

        return $data;
    }
}
