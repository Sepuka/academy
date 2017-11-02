<?php

namespace sepuka\academy\test\sort;

use PHPUnit\Framework\TestCase;
use sepuka\academy\sort\ComparisonSorter;
use sepuka\academy\test\resources\helper\SorterDataProviderTrait;

class ComprasionSorterTest extends TestCase
{
    use SorterDataProviderTrait;

    /** @var ComparisonSorter */
    private $instance;

    public function setUp()
    {
        $this->instance = new ComparisonSorter();
    }

    /**
     * @dataProvider sorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testBubbleSort(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->bubbleSort($data));
    }

    /**
     * @dataProvider sorterDataProvider
     *
     * @param array $data
     * @param array $expectedResult
     */
    public function testBubbleSortWithActionDetect(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->bubbleSortWithActionDetect($data));
    }
}
