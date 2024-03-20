<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Production\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
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
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
abstract class PermissionState extends Enum
{
    public const PRODUCTION = 1;

    public const PROCESS = 2;
}
