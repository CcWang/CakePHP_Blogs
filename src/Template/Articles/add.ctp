
<h1>Add Article</h1>
<?php 
  echo $this->Form->create();
  echo $this->Form->input("title");
  echo $this->Form->input('body',['rows'=>'3']);
  echo $this->Form->button(__('Save Article'));
  echo $this->Form->end();
?>
<div>
<?php 
  echo $this->cell('Inbox::display');
  echo $this->cell('Test::display');
  echo $this->cell('Inbox::formV')
?>
</div>