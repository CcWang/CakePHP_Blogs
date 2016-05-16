<? php 
  namespace App\Controller;
  /**
  * 
  */
  class ArticlesController extends AppController
  {
    
    function index()
    {
      $articles = $this->Articles->find('all');
      $this->set(compact('articles'));
    }
  }

?>