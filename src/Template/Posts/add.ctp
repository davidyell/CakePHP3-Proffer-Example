<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('content');

            echo $this->Form->control('uploads[]', ['type' => 'file', 'multiple' => true, 'label' => 'Files to upload']);

            echo $this->Form->control('title_image', ['type' => 'file']);

            echo $this->Form->control('author_avatar', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
