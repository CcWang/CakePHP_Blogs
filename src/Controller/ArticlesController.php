<?php 
  namespace App\Controller;
  use App\Controller\AppController;
  /**
  * 
  */
  class ArticlesController extends AppController
  {
    
    function index()
    {
      $articles = $this->Articles->find('all');
      $this->set(compact('articles'));
      
      // echo $articles;
    }

    public function view($id = null)
    {
      // to see the params in url
      // echo $this->request->params['pass'][0];
      $article = $this->Articles->get($id);
      echo $article;
      $this->set(compact('article'));

    }
  }

?>