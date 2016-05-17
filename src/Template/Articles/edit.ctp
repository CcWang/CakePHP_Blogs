<h2>Edit:<small> <?= h($article->title)?></small></h2>
<?php 

  echo $this->Form->create($article);
  echo $this->Form->input('title');
  echo $this->Form->input('body',['row'=>'3']);
  echo $this->Form->button(__('Save Article'));


  echo $this->Form->end();
?>