<?php

namespace sepuka\academy\task;

use sepuka\academy\test\resources\exception\CoordinatesException;

/**
 * Ищем число в отсортированном массиве.
 *
 * 1    2   3   4   5   6
 * 2    4   5   6   7   9
 * 4    5   7   8   9   15
 * 5    6   7   8   10  22
 * 10   11  12  13  14  45
 * 18   34  55  67  88  99
 */
class SearchInSortedArray
{
    /**
     * Поиск последовательно проходящий по диагонали, можно ускорить используя бинарный поиск.
     *
     * @param int   $value
     * @param array $data
     * @param array $coordinates
     *
     * @return array (X,Y)|false
     */
    public function search(int $value, array $data, array $coordinates = [0, 0]): array
    {
        try {
            return $this->splitArray($coordinates, $value, $data);
        } catch (CoordinatesException $e) {
            $firstArray = [0, $e->getCoordinates()[1]];
            $secondArray = [$e->getCoordinates()[0], 0];
            $firstResult = $this->search($value, $data, $firstArray);
            if (!empty($firstResult)) {
                return $firstResult;
            }

            return $this->search($value, $data, $secondArray);
        }
    }

    /**
     * @param array $coordinates
     * @param int   $value
     * @param array $data
     *
     * @throws CoordinatesException
     *
     * @return array
     */
    private function splitArray(array $coordinates, int $value, array $data): array
    {
        try {
            $current = $data[$coordinates[0]][$coordinates[1]];
        } catch (\Throwable $e) {
            return [];
        }
        if ($value === $current) {
            return [$coordinates[0], $coordinates[1]];
        }

        if ($value > $current) {
            return $this->splitArray([++$coordinates[0], ++$coordinates[1]], $value, $data);
        }

        throw new CoordinatesException([$coordinates[0], $coordinates[1]]);
    }
}
