<?php

namespace byrokrat\amount\Rounder;

class RoundUpTest extends \PHPUnit_Framework_TestCase
{
    public function testRound()
    {
        $value = '1.01';
        $precision = 0;
        $expected = 'foobar';

        $toolkit = $this->getMockBuilder('byrokrat\amount\Rounder\Toolkit')->getMock();

        $toolkit->expects($this->once())
            ->method('roundUp')
            ->with($value, $precision)
            ->will($this->returnValue($expected));

        $this->assertSame(
            $expected,
            (new RoundUp($toolkit))->round($value, $precision)
        );
    }
}
