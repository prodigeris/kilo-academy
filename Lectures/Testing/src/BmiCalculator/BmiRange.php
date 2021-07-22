<?php

declare(strict_types=1);

namespace Kilo\BmiCalculator;

use MyCLabs\Enum\Enum;

/**
 * @method static BmiRange UNDERWEIGHT()
 * @method static BmiRange NORMAL()
 * @method static BmiRange OVERWEIGHT()
 * @method static BmiRange OBESE()
 * @method static BmiRange EXTREMELY_OBESE()
 */
class BmiRange extends Enum
{
    private const UNDERWEIGHT = 'underweight';

    private const NORMAL = 'normal';

    private const OVERWEIGHT = 'overweight';

    private const OBESE = 'obese';

    private const EXTREMELY_OBESE = 'extremely_obese';
}
