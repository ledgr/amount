<?php

declare(strict_types = 1);

namespace byrokrat\amount\Currency;

/**
 * The Samoan Tala currency
 *
 * This file has ben auto generated and should not be edited directly
 */
class WST extends \byrokrat\amount\Currency
{
    public function getCurrencyCode(): string
    {
        return 'WST';
    }

    public static function getDisplayPrecision(): int
    {
        return 2;
    }
}
