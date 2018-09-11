<?php

namespace sepuka\academy\test\task;

use PHPUnit\Framework\TestCase;
use sepuka\academy\task\UniqueRandomValues;

class UniqueRandomValuesTest extends TestCase
{
    private const VALUES = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];

    /** @var UniqueRandomValues */
    private $instance;

    public function setUp()
    {
        $this->instance = new UniqueRandomValues();
    }

    /**
     * Проверяем что значения выдаются без повторов, в другом порядке и в ожидаемом количестве.
     */
    public function testGetValue()
    {
        $result = [];

        foreach ($this->instance->getValue(self::VALUES) as $value) {
            if (\in_array($value, $result)) {
                $this->fail("Value $value already exist in result.");
            }
            $result[] = $value;
        }

        $this->assertNotEquals($result, self::VALUES);
        $this->assertCount(\count(self::VALUES), $result);
    }
}
