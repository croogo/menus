<?php

use Croogo\Core\Status;

$this->extend('Croogo/Core./Common/admin_edit');

$this->Html->addCrumb(__d('croogo', 'Menus'), ['action' => 'index']);

if ($this->request->params['action'] == 'edit') {
    $this->Html->addCrumb($menu->title, $this->request->here());

    $this->assign('title', __d('croogo', 'Edit Menu'));
}

if ($this->request->params['action'] == 'add') {
    $this->Html->addCrumb(__d('croogo', 'Add'), $this->request->here());

    $this->assign('title', __d('croogo', 'Add Menu'));
}

$this->append('form-start', $this->Form->create($menu));

$this->append('tab-heading');
echo $this->Croogo->adminTab(__d('croogo', 'Menu'), '#menu-basic');
echo $this->Croogo->adminTab(__d('croogo', 'Misc.'), '#menu-misc');
$this->end();

$this->append('tab-content');
echo $this->Html->tabStart('menu-basic');
echo $this->Form->input('title', [
    'label' => __d('croogo', 'Title'),
    'data-slug' => '#alias'
]);
echo $this->Form->input('alias', [
    'label' => __d('croogo', 'Alias'),
]);
echo $this->Form->input('description', [
    'label' => __d('croogo', 'Description'),
]);
echo $this->Html->tabEnd();
$this->end();

$this->append('tab-content');
echo $this->Html->tabStart('menu-misc');
echo $this->Form->input('params', [
    'label' => __d('croogo', 'Params'),
]);
echo $this->Html->tabEnd();

echo $this->Croogo->adminTabs();
$this->end();

$this->start('panels');
echo $this->Html->beginBox('Publishing');
echo $this->element('Croogo/Core.admin/buttons', ['type' => 'menu']);
echo $this->element('Croogo/Core.admin/publishable');
echo $this->Html->endBox();
echo $this->end();

$this->append('form-end', $this->Form->end());
