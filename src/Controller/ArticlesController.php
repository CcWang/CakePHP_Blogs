<?php 
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\Validation\Validator;
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
        // $this->set('article',$article);
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

    public function quote()
    {
      // if ($this->request->is('ajax')) {
      //   die(print_r(['mes'=>'it is ajax!']));
      // }else if ($this->request->is('post')) {
      //   # code...
      //    die(print_r(['mes'=>'it is post!']));
      // }
      // die(print_r($this->request()));
        $this->autoRender = false; 
          $url='https://thirdparty.mortech-inc.com/mpg/servlet/mpgThirdPartyServlet?request_id=1&customerId=15mweq01&thirdPartyName=MidwestEquity&licenseKey=buDrU4ra&emailAddress=dave@midwestequity.com&loanProduct1=30%20year%20fixed&loanProduct2=15%20year%20fixed&loanProduct3=5%20year%20ARM/30%20yrs&propertyState=CA&appraisedvalue=500000&ltv=80&propertyCounty=Alameda&loan_amount=400000&targetPrice=-999&loanProduct4=7%20year%20ARM/30%20yrs&loanProduct5=10%20year%20ARM/30%20yrs';
          $data = json_encode(simplexml_load_file(($url)));
          $this->response->body($data);
          // die(print_r($array));
    
    }
    public function formV()
    {
      # code...
      $name =$this->request->data('name');
      echo  $name;
      if (empty($name)) {
        # code...
        $this->Flash->error(__('no name'));
        // $this->autoRender = false; 
       $this->redirect('/articles/add');
      };
    }
}

?>