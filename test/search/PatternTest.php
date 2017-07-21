<?php

namespace sepuka\academy\test\search;

use PHPUnit\Framework\TestCase;
use sepuka\academy\search\PatternSearcher;

class PatternTest extends TestCase
{
    /** @var PatternSearcher */
    private $patternInstance;

    public function setUp()
    {
        $this->patternInstance = new PatternSearcher();
    }

    /**
     * @dataProvider simplePatternSearchDataProvider
     * @param int    $expectedPosition
     * @param string $pattern
     * @param string $string
     */
    public function testSimplePatternSearch(int $expectedPosition, string $pattern, string $string)
    {
        $this->assertEquals($expectedPosition, $this->patternInstance->simplePatternSearch($pattern, $string));
    }

    public function simplePatternSearchDataProvider(): array
    {
        return [
            [0, 'pat', 'pattern'],
            [1, 'at', 'pattern'],
            [-1, 'aaa', 'pattern'],
            [0, 'pattern', 'pattern'],
        ];
    }
}