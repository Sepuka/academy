<?php

namespace sepuka\academy\search;

class Binary
{
    /**
     * Самая простая реализация поиска делением пополам
     *
     * @param string $data
     * @param int    $value
     *
     * @return int
     */
    public function simpleSearch(string $data, int $value): int
    {
        $l = 0;
        $r = strlen($data);
        $middle = intdiv($r, 2);

        while (($l <= $r) && $data[$middle] != $value) {
            if ($data[$middle] < $value) {
                $l = $middle + 1;
                $middle = (int)floor(($l + $r)/2);
            } else {
                $r = $middle - 1;
                $middle = (int)ceil(($l + $r)/2);
            }
        }

        return $middle;
    }

    /**
     * Улучшеная версия не проверяет текущую позицию, а проверяет момент пересечения срезов
     * @param string $data
     * @param int    $value
     *
     * @return int
     */
    public function improvedSearch(string $data, int $value): int
    {
        $l = 0;
        $r = strlen($data);

        while ($l < $r) {
            $middle = (int)floor(($l + $r) / 2);
            if ($data[$middle] < $value) {
                $l = $middle + 1;
            } else {
                $r = $middle;
            }
        }

        return $r;
    }
}
