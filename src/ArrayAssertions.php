<?php

namespace Astrotomic\PhpunitAssertions;

use PHPUnit\Framework\Assert as PHPUnit;

trait ArrayAssertions
{
    public static function assertIndexed($actual): void
    {
        PHPUnit::assertIsArray($actual);
        PHPUnit::assertEquals(
            range(0, count($actual) - 1),
            array_keys($actual)
        );
    }

    public static function assertAssociative($actual): void
    {
        PHPUnit::assertIsArray($actual);
        PHPUnit::assertNotEquals(
            range(0, count($actual) - 1),
            array_keys($actual)
        );
    }

    public static function assertEquals(array $expected, $actual): void
    {
        PHPUnit::assertIsArray($actual);

        if(array_keys($expected) === range(0, count($expected) - 1)) {
            sort($expected);
            sort($actual);
        } else {
            ksort($expected);
            ksort($actual);
        }

        PHPUnit::assertEquals($expected, $actual);
    }
}
