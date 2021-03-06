<?php

declare(strict_types = 1);

namespace byrokrat\amount\Rounder;

class ToolkitTest extends \PHPUnit\Framework\TestCase
{
    public function isPositiveProvider()
    {
        return [
            ['-1', false],
            ['0', false],
            ['0.0000000001', true],
        ];
    }

    /**
     * @dataProvider isPositiveProvider
     */
    public function testIsPositive($value, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->isPositive($value)
        );
    }

    public function isEvenProvider()
    {
        return [
            ['-2', true],
            ['-1', false],
            ['0', true],
            ['1', false],
            ['2', true],
        ];
    }

    /**
     * @dataProvider isEvenProvider
     */
    public function testIsEven($value, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->isEven($value)
        );
    }

    public function parsePrecisionProvider()
    {
        return [
            ['1', 0],
            ['1.1', 1],
            ['1.1000', 1],
            ['0.10001', 5],
        ];
    }

    /**
     * @dataProvider parsePrecisionProvider
     */
    public function testParsePrecision($value, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->parsePrecision($value)
        );
    }

    public function oneUnitProvider()
    {
        return [
            [0, '1'],
            [1, '0.1'],
            [2, '0.01'],
            [3, '0.001'],
            [4, '0.0001'],
        ];
    }

    /**
     * @dataProvider oneUnitProvider
     */
    public function testGetOneUnit($precision, $unit)
    {
        $this->assertSame(
            $unit,
            (new Toolkit)->getOneUnit($precision)
        );
    }

    public function towardsZeroProvider()
    {
        return [
            ['0', 0, '0'],
            ['1', 0, '1'],
            ['0.1', 0, '0'],
            ['0.5', 0, '0'],
            ['0.9', 0, '0'],
            ['0.01', 0, '0'],
            ['0.05', 0, '0'],
            ['0.09', 0, '0'],
            ['0.01', 1, '0.0'],
            ['0.05', 1, '0.0'],
            ['0.09', 1, '0.0'],
            ['-0.1', 0, '-0'],
            ['-0.5', 0, '-0'],
            ['-0.9', 0, '-0'],
            ['-0.01', 0, '-0'],
            ['-0.05', 0, '-0'],
            ['-0.09', 0, '-0'],
            ['-0.01', 1, '-0.0'],
            ['-0.05', 1, '-0.0'],
            ['-0.09', 1, '-0.0'],
        ];
    }

    /**
     * @dataProvider towardsZeroProvider
     */
    public function testRoundTowardsZero($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->roundTowardsZero($value, $precision)
        );
    }

    public function awayFromZeroProvider()
    {
        return [
            ['0', 0, '0'],
            ['1', 0, '1'],
            ['0.1', 0, '1'],
            ['0.5', 0, '1'],
            ['0.9', 0, '1'],
            ['0.01', 0, '1'],
            ['0.05', 0, '1'],
            ['0.09', 0, '1'],
            ['0.01', 1, '0.1'],
            ['0.05', 1, '0.1'],
            ['0.09', 1, '0.1'],
            ['-0.1', 0, '-1'],
            ['-0.5', 0, '-1'],
            ['-0.9', 0, '-1'],
            ['-0.01', 0, '-1'],
            ['-0.05', 0, '-1'],
            ['-0.09', 0, '-1'],
            ['-0.11', 1, '-0.2'],
            ['-0.15', 1, '-0.2'],
            ['-0.19', 1, '-0.2'],
        ];
    }

    /**
     * @dataProvider awayFromZeroProvider
     */
    public function testRoundAwayFromZero($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->roundAwayFromZero($value, $precision)
        );
    }

    public function roundUpProvider()
    {
        return [
            ['0', 0, '0'],
            ['1', 0, '1'],
            ['0.1', 0, '1'],
            ['0.5', 0, '1'],
            ['0.9', 0, '1'],
            ['0.01', 0, '1'],
            ['0.05', 0, '1'],
            ['0.09', 0, '1'],
            ['0.01', 1, '0.1'],
            ['0.05', 1, '0.1'],
            ['0.09', 1, '0.1'],
            ['-0.1', 0, '-0'],
            ['-0.5', 0, '-0'],
            ['-0.9', 0, '-0'],
            ['-0.01', 0, '-0'],
            ['-0.05', 0, '-0'],
            ['-0.09', 0, '-0'],
            ['-0.11', 1, '-0.1'],
            ['-0.15', 1, '-0.1'],
            ['-0.19', 1, '-0.1'],
        ];
    }

    /**
     * @dataProvider roundUpProvider
     */
    public function testRoundUp($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->roundUp($value, $precision)
        );
    }

    public function roundDownProvider()
    {
        return [
            ['0', 0, '0'],
            ['1', 0, '1'],
            ['0.1', 0, '0'],
            ['0.5', 0, '0'],
            ['0.9', 0, '0'],
            ['0.11', 0, '0'],
            ['0.15', 0, '0'],
            ['0.19', 0, '0'],
            ['0.11', 1, '0.1'],
            ['0.15', 1, '0.1'],
            ['0.19', 1, '0.1'],
            ['-0.1', 0, '-1'],
            ['-0.5', 0, '-1'],
            ['-0.9', 0, '-1'],
            ['-0.01', 0, '-1'],
            ['-0.05', 0, '-1'],
            ['-0.09', 0, '-1'],
            ['-0.11', 1, '-0.2'],
            ['-0.15', 1, '-0.2'],
            ['-0.19', 1, '-0.2'],
        ];
    }

    /**
     * @dataProvider roundDownProvider
     */
    public function testRoundDown($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->roundDown($value, $precision)
        );
    }

    public function getTiebreakProvider()
    {
        return [
            ['1.238', 2, '1.235'],
            ['1.238', 1, '1.25'],
            ['1.238', 0, '1.5'],
            ['-1.238', 2, '-1.235'],
        ];
    }

    /**
     * @dataProvider getTiebreakProvider
     */
    public function testGetTiebreak($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->getTiebreak($value, $precision)
        );
    }

    public function roundToNearestProvider()
    {
        return [
            ['0', 0, '0'],
            ['1', 0, '1'],
            ['1.1', 0, '1'],
            ['1.6', 0, '2'],
            ['1.5', 0, 'tiebreak'],
            ['-1.1', 0, '-1'],
            ['-1.6', 0, '-2'],
            ['-1.5', 0, 'tiebreak'],
        ];
    }

    /**
     * @dataProvider roundToNearestProvider
     */
    public function testRoundToNearest($value, $precision, $expected)
    {
        $this->assertSame(
            $expected,
            (new Toolkit)->roundToNearest($value, $precision, function ($value, $precision) {
                return 'tiebreak';
            })
        );
    }
}
