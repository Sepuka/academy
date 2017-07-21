<?php

declare(strict_types=1);

namespace sepuka\academy\search;

class LinearSearcher
{
    /**
     * При простом прохождении инвариант цикла содержит две проверки: выход за границу и символ
     * @param string $data
     * @param string $symbol
     *
     * @return int
     */
    public function simpleLinearSymbolSearch(string $data, string $symbol): int
    {
        $len = mb_strlen($data);
        $pos = 0;

        while (($pos < $len) && ($data[$pos] != $symbol)) {
            ++$pos;
        }

        return !isset($data[$pos]) ? -1 : $pos;
    }

    /**
     * Улучшеный поиск добавляет искомый элемент в конец последовательности
     * Т.о. инвариант упрощается до проверки одного условия
     * @param string $data
     * @param string $symbol
     *
     * @return int
     */
    public function improvedLinearSymbolSearch(string $data, string $symbol): int
    {
        if (!$symbol) {
            return -1;
        }

        $len = mb_strlen($data);
        $data .= $symbol;
        $pos = 0;

        while ($data[$pos] != $symbol) {
            ++$pos;
        }

        return $pos == $len ? -1 : $pos;
    }
}
