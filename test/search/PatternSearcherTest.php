<?php

namespace sepuka\academy\test\search;

use PHPUnit\Framework\TestCase;
use sepuka\academy\search\PatternSearcher;

class PatternSearcherTest extends TestCase
{
    /** @var PatternSearcher */
    private $patternInstance;

    public function setUp()
    {
        $this->patternInstance = new PatternSearcher();
    }

    /**
     * @dataProvider patternSearchDataProvider
     *
     * @param int    $expectedPosition
     * @param string $pattern
     * @param string $string
     */
    public function testSimplePatternSearch(int $expectedPosition, string $pattern, string $string)
    {
        $this->assertEquals($expectedPosition, $this->patternInstance->simplePatternSearch($pattern, $string));
    }

    /**
     * @dataProvider patternSearchDataProvider
     *
     * @param int    $expectedPosition
     * @param string $pattern
     * @param string $string
     */
    public function testKMPPatternSearch(int $expectedPosition, string $pattern, string $string)
    {
        $this->assertEquals($expectedPosition, $this->patternInstance->KMPPatternSearch($pattern, $string));
    }

    public function patternSearchDataProvider(): array
    {
        return [
            [0, 'pat', 'pattern'],
            [1, 'at', 'pattern'],
            [6, 'n', 'pattern'],
            [-1, 'aaa', 'pattern'],
            [0, 'pattern', 'pattern'],
            [100, 'a', str_repeat('b', 100).'a'],
        ];
    }
}
