<?php

declare(strict_types = 1);

namespace byrokrat\amount\Currency;

/**
 * The Latvian Lats currency
 *
 * This file has ben auto generated and should not be edited directly
 */
class LVL extends \byrokrat\amount\Currency
{
    public function getCurrencyCode(): string
    {
        return 'LVL';
    }

    public static function getDisplayPrecision(): int
    {
        return 2;
    }
}
