<?php

declare(strict_types = 1);

namespace byrokrat\amount\Currency;

/**
 * The Sudanese Pound currency
 *
 * This file has ben auto generated and should not be edited directly
 */
class SDG extends \byrokrat\amount\Currency
{
    public function getCurrencyCode(): string
    {
        return 'SDG';
    }

    public static function getDisplayPrecision(): int
    {
        return 2;
    }
}
