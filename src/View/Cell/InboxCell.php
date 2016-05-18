<?php
namespace App\View\Cell;


use Cake\View\Cell;
use App\Controller\AppController;

class InboxCell extends Cell
{

    public function display()
    {
      $this->loadModel('Articles');
      $articles = $this->Articles->find('all');
      $this->set('art_count',$articles->count());
    }

    public function formV()
    {
      # code...
    }

}


?>