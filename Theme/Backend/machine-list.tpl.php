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

use phpOMS\Uri\UriFactory;

/** @var \phpOMS\Views\View $this */
$machines = $this->data['machines'] ?? [];

echo $this->data['nav']->render(); ?>
<div class="row">
    <div class="col-xs-12">
        <section class="portlet">
            <div class="portlet-head"><?= $this->getHtml('Machines'); ?><i class="g-icon download btn end-xs">download</i></div>
            <div class="slider">
            <table id="iMachineList" class="default sticky">
                <thead>
                <tr>
                    <td>
                    <td><?= $this->getHtml('ID', '0', '0'); ?>
                        <label for="iMachineList-sort-1">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-1">
                            <i class="sort-asc g-icon">expand_less</i>
                        </label>
                        <label for="iMachineList-sort-2">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-2">
                            <i class="sort-desc g-icon">expand_more</i>
                        </label>
                        <label>
                            <i class="filter g-icon">filter_alt</i>
                        </label>
                    <td><?= $this->getHtml('Status'); ?>
                        <label for="iMachineList-sort-3">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-3">
                            <i class="sort-asc g-icon">expand_less</i>
                        </label>
                        <label for="iMachineList-sort-4">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-4">
                            <i class="sort-desc g-icon">expand_more</i>
                        </label>
                        <label>
                            <i class="filter g-icon">filter_alt</i>
                        </label>
                    <td class="wf-100"><?= $this->getHtml('Name'); ?>
                        <label for="iMachineList-sort-5">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-5">
                            <i class="sort-asc g-icon">expand_less</i>
                        </label>
                        <label for="iMachineList-sort-6">
                            <input type="radio" name="iMachineList-sort" id="iMachineList-sort-6">
                            <i class="sort-desc g-icon">expand_more</i>
                        </label>
                        <label>
                            <i class="filter g-icon">filter_alt</i>
                        </label>
                <tbody>
                <?php
                    $count = 0;
                    foreach ($machines as $key => $value) :
                        ++$count;
                        $url = UriFactory::build('{/base}/production/machine/view?{?}&id=' . $value->equipment->id);
                ?>
                <tr data-href="<?= $url; ?>">
                    <td>
                    <td data-label="<?= $this->getHtml('ID', '0', '0'); ?>"><a href="<?= $url; ?>"><?= $value->equipment->id; ?></a>
                    <td data-label="<?= $this->getHtml('Status'); ?>"><a href="<?= $url; ?>"><?= $this->getHtml(':status' . $value->equipment->status); ?></a>
                    <td data-label="<?= $this->getHtml('Name'); ?>"><a href="<?= $url; ?>"><?= $this->printHtml($value->equipment->name); ?></a>
                <?php endforeach; ?>
                <?php if ($count === 0) : ?>
                    <tr><td colspan="8" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
                <?php endif; ?>
            </table>
            </div>
        </section>
    </div>
</div>
