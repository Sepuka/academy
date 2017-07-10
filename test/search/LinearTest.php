<?php

namespace sepuka\academy\test\search;

use PHPUnit\Framework\TestCase;
use sepuka\academy\search\Linear;

class LinearTest extends TestCase
{
    /** @var Linear */
    private $linearInstance;

    public function setUp()
    {
        $this->linearInstance = new Linear();
    }

    /**
     * @dataProvider simpleLinearDataProvider
     * @small
     *
     * @param string $data
     * @param string $symbol
     * @param int    $expectedPos
     */
    public function testSimpleLinear(string $data, string $symbol, int $expectedPos)
    {
        $this->assertEquals($expectedPos, $this->linearInstance->simpleLinearSymbolSearch($data, $symbol));
    }

    /**
     * @dataProvider simpleLinearDataProvider
     * @small
     *
     * @param string $data
     * @param string $symbol
     * @param int    $expectedPos
     */
    public function testImprovedLinear(string $data, string $symbol, int $expectedPos)
    {
        $this->assertEquals($expectedPos, $this->linearInstance->improvedLinearSymbolSearch($data, $symbol));
    }

    /**
     * @return array
     */
    public function simpleLinearDataProvider(): array
    {
        return [
            ['qwerty', 'q', 0],
            ['qwerty', 'w', 1],
            ['qwerty', 'y', 5],
            ['qwerty', 'a', -1],
            ['qwerty', '', -1],
        ];
    }
}
