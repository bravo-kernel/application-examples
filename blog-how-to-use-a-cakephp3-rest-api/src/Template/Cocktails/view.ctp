<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Cocktail'), ['action' => 'edit', $cocktail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cocktail'), ['action' => 'delete', $cocktail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cocktail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cocktails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cocktail'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="cocktails view large-10 medium-9 columns">
    <h2><?= h($cocktail->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($cocktail->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($cocktail->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($cocktail->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($cocktail->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($cocktail->modified) ?></p>
        </div>
    </div>
</div>
