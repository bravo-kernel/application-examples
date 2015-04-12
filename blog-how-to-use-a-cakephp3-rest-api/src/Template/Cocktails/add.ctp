<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Cocktails'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="cocktails form large-10 medium-9 columns">
    <?= $this->Form->create($cocktail); ?>
    <fieldset>
        <legend><?= __('Add Cocktail') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
