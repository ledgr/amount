<?php

declare(strict_types = 1);

namespace byrokrat\amount\Currency;

/**
 * The Chinese Yuan currency
 *
 * This file has ben auto generated and should not be edited directly
 */
class CNY extends \byrokrat\amount\Currency
{
    public function getCurrencyCode(): string
    {
        return 'CNY';
    }

    public static function getDisplayPrecision(): int
    {
        return 2;
    }
}
