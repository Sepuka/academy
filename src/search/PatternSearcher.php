<?php

declare(strict_types=1);

namespace sepuka\academy\search;

class PatternSearcher
{
    /**
     * Простой поиск ищет вхождение шаблона с каждой позиции строки
     * @param string $pattern
     * @param string $string
     *
     * @return int
     */
    public function simplePatternSearch(string $pattern, string $string): int
    {
        $textPosition = 0;
        $stringLength = strlen($string);
        $patternLength = strlen($pattern);

        while (($textPosition <= $stringLength - $patternLength) && !$this->isMatchPosition($textPosition, $pattern, $string)) {
            ++$textPosition;
        }

        return $stringLength - $patternLength < $textPosition ? -1 : $textPosition;
    }

    /**
     * Реализация предиката проверяющего совпадение шаблона в текущей позиции.
     *
     * @param int    $absolutePosition
     * @param string $pattern
     * @param string $string
     *
     * @return bool
     */
    private function isMatchPosition(int $absolutePosition, string $pattern, string $string): bool
    {
        $patternPosition = 0;
        $patternLength = strlen($pattern);

        while (($patternPosition < $patternLength) && ($pattern[$patternPosition] == $string[$absolutePosition + $patternPosition])) {
            ++$patternPosition;
        }

        return !($patternPosition < $patternLength);
    }
}
