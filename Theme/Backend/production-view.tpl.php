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

use Modules\Production\Models\NullProduction;
use phpOMS\Uri\UriFactory;

/**
 * @var \phpOMS\Views\View $this
 */
$production = $this->data['production'] ?? new NullProduction();
$isNew      = $production->id === 0;

echo $this->data['nav']->render(); ?>
<div class="tabview tab-2">
    <?php if (!$isNew) : ?>
    <div class="box">
        <ul class="tab-links">
            <li><label for="c-tab-1"><?= $this->getHtml('Production'); ?></label>
            <li><label for="c-tab-2"><?= $this->getHtml('Parts'); ?></label>
        </ul>
    </div>
    <?php endif; ?>
    <div class="tab-content">
        <input type="radio" id="c-tab-1" name="tabular-2"<?= $isNew || $this->request->uri->fragment === 'c-tab-1' ? ' checked' : ''; ?>>
        <div class="tab">

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <?php if ($isNew) : ?>
                        <section class="portlet">
                            <div class="portlet-body">
                                <div class="form-group">
                                    <label for="iBill"><?= $this->getHtml('Bill'); ?></label>
                                    <input type="text" name="bill" id="iBill">
                                </div>
                            </div>
                            <div class="portlet-foot">
                                <input id="iCreateSubmit" type="Submit" value="<?= $this->getHtml('Create', '0', '0'); ?>">
                            </div>
                        </section>
                    <?php endif; ?>

                    <section class="portlet">
                        <form method="<?= $isNew ? 'PUT' : 'POST'; ?>" action="<?= UriFactory::build('{/api}production/view?csrf={$CSRF}'); ?>">
                            <div class="portlet-head"><?= $this->getHtml('Production'); ?></div>
                            <div class="portlet-body">
                                <div class="form-group">
                                    <label for="iId"><?= $this->getHtml('ID', '0', '0'); ?></label>
                                    <input type="text" name="id" id="iId" value="<?= $production->id; ?>" disabled>
                                </div>

                                <?php if (!$isNew) : ?>
                                <div class="form-group">
                                    <label for="iStatus"><?= $this->getHtml('Status'); ?></label>
                                    <input type="text" name="number" id="iStatus" value="<?= $this->printHtml($production->item->getL11n('name1')->name); ?>" required>
                                </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="iNumber"><?= $this->getHtml('Number'); ?></label>
                                    <input type="text" name="number" id="iNumber" value="<?= $this->printHtml($production->number); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="iItem"><?= $this->getHtml('Item'); ?></label>
                                    <input type="text" name="number" id="iItem" value="<?= $this->printHtml($production->item->getL11n('name1')->name); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="iQuantity"><?= $this->getHtml('Quantity'); ?></label>
                                    <input type="text" name="number" id="iQuantity" value="<?= $this->printHtml($production->item->getL11n('name1')->name); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="iStart"><?= $this->getHtml('Start'); ?></label>
                                    <input type="date" name="start" id="iStart" value="<?= $production->start?->format('Y-m-d'); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="iExpectedEnd"><?= $this->getHtml('ExpectedEnd'); ?></label>
                                    <input type="date" name="expected_end" id="iExpectedEnd" value="<?= $production->expectedEnd?->format('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="portlet-foot">
                                <?php if ($isNew) : ?>
                                    <input id="iCreateSubmit" type="Submit" value="<?= $this->getHtml('Create', '0', '0'); ?>">
                                <?php else : ?>
                                    <input id="iSaveSubmit" type="Submit" value="<?= $this->getHtml('Save', '0', '0'); ?>">
                                <?php endif; ?>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>