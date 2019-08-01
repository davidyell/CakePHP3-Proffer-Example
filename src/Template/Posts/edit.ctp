<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Edit Post') ?></legend>
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

    <?php
    if (!empty($post->uploads)) {
        echo "<h3>Uploads</h3><ul>";
        echo "<li>Title image: " . $this->Html->link($post->title_image, '../files/posts/title_image/' . $post->title_image_dir . '/' . $post->title_image) . "</li>";
        echo "<li>Author avatar: " . $this->Html->link($post->author_avatar->avatar, '../files/authoravatars/avatar/' . $post->author_avatar->avatar_dir . '/' . $post->author_avatar->avatar) . "</li>";
        echo "<li>Uploads:<ul>";
        foreach ($post->uploads as $upload) {
            echo "<li>" . $this->Html->link($upload->filename, '../files/uploads/filename/' . $upload->file_dir . '/' . $upload->filename) . "</li>";
        }
        echo "</ul></ul>";
    }
    ?>
</div>
