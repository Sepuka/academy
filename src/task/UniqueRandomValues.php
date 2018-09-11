<?php

namespace sepuka\academy\task;

/**
 * Из массива чисел нужно извлекать случайное число без повторов и без выделения дополнительной памяти.
 */
class UniqueRandomValues
{
    public function getValue(array $sequence): iterable
    {
        $start = 0;
        $stop = \count($sequence);
        while ($stop > $start) {
            $index = random_int($start, $stop - 1);
            $value = $sequence[$index];
            $this->moveValueToHiddenArea($start, $index, $sequence);
            ++$start;

            yield $value;
        }
    }

    /**
     * Перемещаем случайное значение в "защищенную область" слева - в начало массива
     * из этой области не будет производиться выборка новых значений.
     *
     * @param int   $protectedAreaPos
     * @param int   $rndIndex
     * @param array $sequence
     */
    private function moveValueToHiddenArea(int $protectedAreaPos, int $rndIndex, array &$sequence): void
    {
        $substitute = $sequence[$protectedAreaPos];
        $sequence[$protectedAreaPos] = $sequence[$rndIndex];
        $sequence[$rndIndex] = $substitute;
    }
}
