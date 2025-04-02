<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Production
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\EquipmentManagement\Models\EquipmentStatus;
use Modules\Media\Models\NullMedia;
use Modules\Production\Models\NullMachine;
use phpOMS\Uri\UriFactory;

/**
 * @var \Modules\MachineManagement\Models\Machine $machine
 */
$machine      = $this->data['machine'] ?? new NullMachine();
$machineImage = $this->data['machineImage'] ?? new NullMedia();
$isNew        = $machine->id === 0;

$equipmentStatus = EquipmentStatus::getConstants();

/**
 * @var \phpOMS\Views\View $this
 */
echo $this->data['nav']->render();
?>
<div class="tabview tab-2">
    <?php if (!$isNew) : ?>
    <div class="box">
        <ul class="tab-links">
            <li><label for="c-tab-1"><?= $this->getHtml('Machine'); ?></label>
            <li><label for="c-tab-2"><?= $this->getHtml('Items'); ?></label>
        </ul>
    </div>
    <?php endif; ?>
    <div class="tab-content">
        <input type="radio" id="c-tab-1" name="tabular-2"<?= $isNew || $this->request->uri->fragment === 'c-tab-1' ? ' checked' : ''; ?>>
        <div class="tab">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <section class="portlet">
                        <div class="portlet-head"><?= $this->getHtml('Machine'); ?></div>
                        <div class="portlet-body">
                            <div class="form-group">
                                <label for="iMachineProfileName"><?= $this->getHtml('Name', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="text" id="iMachineProfileName" name="name" value="<?= $this->printHtml($machine->equipment->name); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="iMachineNumber"><?= $this->getHtml('Number', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="text" id="iMachineNumber" name="code" value="<?= $this->printHtml($machine->equipment->code); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="iMachineEquipment"><?= $this->getHtml('Equipment', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="text" id="iMachineEquipment" name="equipment" value="<?= $this->printHtml($machine->equipment->code); ?>"<?= $isNew ? '' : ' disabled'; ?>>
                            </div>

                            <div class="form-group">
                                <label for="iMachineStatus"><?= $this->getHtml('Status', 'EquipmentManagement', 'Backend'); ?></label>
                                <select id="iMachineStatus" name="machine_status" disabled>
                                    <?php foreach ($equipmentStatus as $status) : ?>
                                        <option value="<?= $status; ?>"<?= $status === $machine->equipment->status ? ' selected' : ''; ?>><?= $this->getHtml(':status' . $status, 'EquipmentManagement', 'Backend'); ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="iMachineMake"><?= $this->getHtml('Make', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="text" id="iMachineMake" name="make" value="<?= $this->printHtml($machine->equipment->getAttribute('maker')->value->getValue()); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="iMachineModel"><?= $this->getHtml('Model', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="text" id="iMachineModel" name="machine_model" value="<?= $this->printHtml($machine->equipment->getAttribute('machine_model')->value->getValue()); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="iMachineStart"><?= $this->getHtml('Start', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="datetime-local" id="iMachineStart" name="ownership_start" value="<?= $machine->equipment->getAttribute('ownership_start')->value->getValue()?->format('Y-m-d\TH:i') ?? $machine->equipment->createdAt->format('Y-m-d\TH:i'); ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="iMachineEnd"><?= $this->getHtml('End', 'EquipmentManagement', 'Backend'); ?></label>
                                <input type="datetime-local" id="iMachineEnd" name="ownership_end" value="<?= $machine->equipment->getAttribute('ownership_end')->value->getValue()?->format('Y-m-d\TH:i'); ?>" disabled>
                            </div>
                        </div>
                        <div class="portlet-foot">
                            <?php if ($machine->equipment->id === 0) : ?>
                                <input id="iCreateSubmit" type="Submit" value="<?= $this->getHtml('Create', '0', '0'); ?>">
                            <?php else : ?>
                                <input id="iSaveSubmit" type="Submit" value="<?= $this->getHtml('Save', '0', '0'); ?>">
                            <?php endif; ?>
                        </div>
                    </section>
                </div>

                <div class="col-xs-12 col-md-6">
                    <section class="portlet">
                        <div class="portlet-body">
                            <img width="100%" src="<?= $machineImage->id === 0
                                ? 'Web/Backend/img/logo_grey.png'
                                : UriFactory::build($machineImage->getPath()); ?>"></a>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php if (!$isNew) : ?>
        <input type="radio" id="c-tab-2" name="tabular-2"<?= $this->request->uri->fragment === 'c-tab-2' ? ' checked' : ''; ?>>
        <div class="tab">

        </div>
        <?php endif; ?>
    </div>
</div>