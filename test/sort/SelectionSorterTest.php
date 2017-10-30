<?php

namespace sepuka\academy\test\sort;

use PHPUnit\Framework\TestCase;
use sepuka\academy\sort\SelectionSorter;
use sepuka\academy\test\resources\helper\SorterDataProviderTrait;

class SelectionSorterTest extends TestCase
{
    use SorterDataProviderTrait;

    /** @var SelectionSorter */
    private $instance;

    public function setUp()
    {
        $this->instance = new SelectionSorter();
    }

    /**
     * @dataProvider sorterDataProvider
     * @param array $data
     * @param array $expectedResult
     */
    public function testSimpleSort(array $data, array $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->instance->simpleSort($data));
    }
}
