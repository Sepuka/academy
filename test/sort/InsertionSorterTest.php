<?php

namespace sepuka\academy\test\sort;

use PHPUnit\Framework\TestCase;
use sepuka\academy\sort\InsertionSorter;

class InsertionSorterTest extends TestCase
{
    /** @var InsertionSorter */
    private $instance;

    public function setUp()
    {
        $this->instance = new InsertionSorter();
    }

    /**
     * @dataProvider straightInsertSorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testStraightInsertionSorter(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->straightInsertionSorter($data));
    }

    /**
     * @dataProvider straightInsertSorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testBinaryInsertionSorter(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->binaryInsertionSorter($data));
    }

    public function straightInsertSorterDataProvider(): array
    {
        return [
            [[1,2,3,4,5,6,7,8,9], [1,2,3,4,5,6,7,8,9]],
            [[9,8,7,6,5,4,3,2,1], [1,2,3,4,5,6,7,8,9]],
            [[9,7,5,3,1], [1,3,5,7,9]],
        ];
    }
}
