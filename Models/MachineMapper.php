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

use Modules\EquipmentManagement\Models\EquipmentMapper;
use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;

/**
 * Machine mapper class.
 *
 * @package Modules\Production\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of Machine
 * @extends DataMapperFactory<T>
 */
final class MachineMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'production_machine_id'          => ['name' => 'production_machine_id',         'type' => 'int',      'internal' => 'id'],
        'production_machine_capacity'    => ['name' => 'production_machine_capacity',      'type' => 'int',   'internal' => 'capacity'],
        'production_machine_equipment'   => ['name' => 'production_machine_equipment',      'type' => 'int',   'internal' => 'equipment'],
        'production_machine_unitmeasure' => ['name' => 'production_machine_unitmeasure',      'type' => 'string',   'internal' => 'unitOfMeasure'],
        'production_machine_unit'        => ['name' => 'production_machine_unit',      'type' => 'int',   'internal' => 'unit'],
    ];

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:class-string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    public const OWNS_ONE = [
        'equipment' => [
            'mapper'   => EquipmentMapper::class,
            'external' => 'production_machine_equipment',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'production_machine';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'production_machine_id';
}
