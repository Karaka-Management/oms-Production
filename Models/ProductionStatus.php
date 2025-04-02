<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Production\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Production\Models;

use phpOMS\Stdlib\Base\Enum;

/**
 * Permission category enum.
 *
 * @package Modules\Production\Models
 * @license OMS License 2.2
 * @link    https://jingga.app
 * @since   1.0.0
 */
abstract class ProductionStatus extends Enum
{
    public const DRAFT = 1;

    public const ACTIVE = 2;

    public const FINISHED = 3;

    public const CANCELED = 4;
}
