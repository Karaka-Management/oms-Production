<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Production
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

/**
 * @var \phpOMS\Views\View $this
 */

echo $this->data['nav']->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <section class="portlet">
            <div class="portlet-head"><?= $this->getHtml('Productions'); ?><i class="g-icon download btn end-xs">download</i></div>
            <div class="slider">
            <table class="default sticky">
                <thead>
                <tr>
                    <td><?= $this->getHtml('Status'); ?>
                    <td><?= $this->getHtml('ID', '0', '0'); ?>
                    <td class="wf-100"><?= $this->getHtml('Article'); ?>
                    <td><?= $this->getHtml('Quantity'); ?>
                    <td><?= $this->getHtml('Start'); ?>
                    <td><?= $this->getHtml('Due'); ?>
                    <td><?= $this->getHtml('Done'); ?>
                <tbody>
                <?php $c = 0;
                foreach ([] as $key => $value) : ++$c;
                $url     = \phpOMS\Uri\UriFactory::build('{/prefix}/production/machine/view?{?}&id=' . $value->id); ?>
                <tr>
                    <td><a href="<?= $url; ?>"><?= $value->id; ?></a>
                    <td><a href="<?= $url; ?>"><?= $this->printHtml($value->getName()); ?></a>
                    <td><a href="<?= $url; ?>"><?= $this->printHtml($value->getParent()); ?></a>
                    <td><a href="<?= $url; ?>"><?= $this->printHtml($value->getUnit()); ?></a>
                <?php endforeach; ?>
                <?php if ($c === 0) : ?>
                <tr>
                    <td colspan="8" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
                <?php endif; ?>
            </table>
        </div>
        </div>
    </div>
</div>