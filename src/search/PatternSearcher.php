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

    /**
     * Реализация поиска по Кнуту-Моррису-Пратту
     * TODO: подумать над "D" - сбросом $patternPos. Возможно это не всегда -1
     *
     * @param string $pattern
     * @param string $string
     *
     * @return int
     */
    public function KMPPatternSearch(string $pattern, string $string): int
    {
        $patternPos = 0;
        $stringPos = 0;
        $patternLen = strlen($pattern);
        $stringLen = strlen($string);

        while (($patternPos < $patternLen) && ($stringPos < $stringLen)) {
            if (($patternPos < 0) || $string[$stringPos] == $pattern[$patternPos]) {
                ++$stringPos;
                ++$patternPos;
            } elseif (($patternPos >= 0) && ($string[$stringPos] != $pattern[$patternPos])) {
                $patternPos = -1;
            }
        }

        return $patternPos > 0 ? $stringPos - $patternLen : -1;
    }
}
