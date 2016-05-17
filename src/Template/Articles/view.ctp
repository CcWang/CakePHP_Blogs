<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><i><?=h($article->created_at) ?></i></p>
<p><?= $this->Html->link(__('Edit'),['action'=>'edit',$article->id])?> | <?= $this->Form->postLink('Delete',['action'=>'delete',$article->id],['confirm'=>'Are you sure you?'])?></p>