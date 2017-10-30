<?php

namespace sepuka\academy\test\sort;

use PHPUnit\Framework\TestCase;
use sepuka\academy\sort\InsertionSorter;
use sepuka\academy\test\resources\helper\SorterDataProviderTrait;

class InsertionSorterTest extends TestCase
{
    use SorterDataProviderTrait;

    /** @var InsertionSorter */
    private $instance;

    public function setUp()
    {
        $this->instance = new InsertionSorter();
    }

    /**
     * @dataProvider sorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testStraightInsertionSorter(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->straightInsertionSorter($data));
    }

    /**
     * @dataProvider sorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testBinaryInsertionSorter(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->binaryInsertionSorter($data));
    }
}
