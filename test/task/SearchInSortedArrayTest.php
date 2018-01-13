<?php

namespace sepuka\academy\test\task;

use PHPUnit\Framework\TestCase;
use sepuka\academy\task\SearchInSortedArray;

class SearchInSortedArrayTest extends TestCase
{
    private const DATA_SET_1 = [];
    private const DATA_SET_2 = [
        [1, 2, 3, 4, 5],
        [2, 3, 4, 5, 6],
        [3, 4, 5, 6, 7],
        [4, 5, 6, 7, 8],
        [5, 6, 7, 8, 9],
    ];

    /** @var SearchInSortedArray */
    private $instance;

    public function setUp()
    {
        $this->instance = new SearchInSortedArray();
    }

    /**
     * @dataProvider searchDataProvider
     *
     * @param array $dataSet
     * @param int   $value
     * @param array $expectedResult
     */
    public function testSearch(array $dataSet, int $value, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->search($value, $dataSet));
    }

    public function searchDataProvider(): array
    {
        return [
            [self::DATA_SET_1, 1, [],],
            [self::DATA_SET_2, 1, [0, 0],],
            [self::DATA_SET_2, 2, [0, 1],],
            [self::DATA_SET_2, 3, [1, 1],],
            [self::DATA_SET_2, 9, [4, 4],],
            [self::DATA_SET_2, 10, [],],
        ];
    }
}
