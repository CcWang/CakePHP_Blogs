<h1>Blog Articles</h1>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $a): ?>
    <tr>
      <td><?= $a->id ?></td>
      <td> <?= $this->Html->link($a->title,['action'=>'view', $a->id])?></td>
      <td><?= $a->created_at ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<button><?= $this->Html->link('Add Article', ['controller'=>'articles','action' => 'add']) ?></button>