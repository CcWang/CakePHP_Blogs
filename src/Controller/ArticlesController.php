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

    public function add()
    {
      # code...
      $article = $this->Articles->newEntity();
      // echo $article;
      if ($this->request->is('post')) {
        # code...
        $article = $this->Articles->patchEntity($article,$this->request->data);
        // debug($article);
        if($this->Articles->save($article)){
          $this->Flash->success(__('Your article has been saved'));
          return $this->redirect(['action'=>'index']);
        }else{
          $this->Flash->error(__('Unable to add your article.'));
        };
        $this->set('article',$article);
      }
    }

    public function edit($id=null)
    {
      # code...
      // debug($this->request->params['pass']);
      $article = $this->Articles->get($id);
      if ($this->request->is(['post','put'])) {
        $this->Articles->patchEntity($article,$this->request->data);
        if ($this->Articles->save($article)) {
          # code...
          $this->Flash->success(__('Your article has been updated'));
          return $this->redirect(['action'=>'index']);
        }else{
          $this->Flash->error(__('Unable to update your article'));
        }
      }
      $this->set('article',$article);
    }

    public function delete($id)
    {
      
      $this->request->allowMethod(['post', 'delete']);
      $article = $this->Articles->get($id);
      if($this->Articles->delete($article)){
        $this->Flash->success(__('The article is deleted'));
        return $this->redirect(['action'=>'index']);
      }
    }
  }

?>