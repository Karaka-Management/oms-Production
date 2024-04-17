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

use Modules\EquipmentManagement\Models\Equipment;
use Modules\EquipmentManagement\Models\NullEquipment;
use phpOMS\Stdlib\Base\FloatInt;

/**
 * Machine class.
 *
 * @package Modules\Production\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class Machine
{
    public int $id = 0;

    public Equipment $equipment;

    public ?FloatInt $capacity = null;

    public string $unitOfMeasure = '';

    public int $unit = 0;

    public function __construct()
    {
        $this->equipment = new NullEquipment();
    }
}
