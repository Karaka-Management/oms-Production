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

use Modules\Billing\Models\Bill;
use Modules\ItemManagement\Models\Item;
use Modules\ItemManagement\Models\NullItem;

/**
 * Production model.
 *
 * @package Modules\Production\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class Production
{
    public int $id = 0;

    public string $number = '';

    public int $status = ProductionStatus::ACTIVE;

    public \DateTimeImmutable $createdAt;

    public ?\DateTime $start = null;

    public ?\DateTime $expectedEnd = null;

    public ?\DateTime $end = null;

    public ?Bill $bill = null;

    public Item $item;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable('now');
        $this->item = new NullItem();
    }
}
