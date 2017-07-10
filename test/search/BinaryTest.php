<?php

namespace sepuka\academy\test\search;

use PHPUnit\Framework\TestCase;
use sepuka\academy\search\Binary;

class BinaryTest extends TestCase
{
    /** @var Binary */
    private $instance;

    public function setUp()
    {
        $this->instance = new Binary();
    }

    /**
     * @dataProvider simpleSearchDataProvider
     *
     * @param string $data
     * @param int    $value
     * @param int    $expectedIndex
     */
    public function testSimpleSearch(string $data, int $value, int $expectedIndex)
    {
        $this->assertEquals($expectedIndex, $this->instance->simpleSearch($data, $value));
    }

    /**
     * @dataProvider simpleSearchDataProvider
     *
     * @param string $data
     * @param int    $value
     * @param int    $expectedIndex
     */
    public function testImprovedSearch(string $data, int $value, int $expectedIndex)
    {
        $this->assertEquals($expectedIndex, $this->instance->improvedSearch($data, $value));
    }

    public function simpleSearchDataProvider(): array
    {
        return [
            ['0123456789', 0, 0],
            ['0123456789', 1, 1],
            ['0123456789', 2, 2],
            ['0123456789', 3, 3],
            ['0123456789', 4, 4],
            ['0123456789', 5, 5],
            ['0123456789', 6, 6],
            ['0123456789', 7, 7],
            ['0123456789', 8, 8],
            ['0123456789', 9, 9],
        ];
    }
}
