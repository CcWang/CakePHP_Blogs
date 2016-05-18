<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;


class ArticlesTable extends Table{
  
  public function initialize(array $config){
    $this->addBehavior('Timestamp',[
      'events'=>[
          'Model.beforeSave'=>[
            'created_at'=>'new',
            'updated_at'=>'always',
          ]
        ]
    ]);
    $this->belongsTo('Categories',[
      'foreignKey' => 'category_id',
    ]);
  } 
  public function validationDefault(Validator $validator)
  {
    $validator
      ->requirePresence('title')
      ->notEmpty('title','title is required !!');
    $validator
      ->requirePresence('body')
      ->notEmpty('body','body is empty')
      ->add('body',[
            'minLength'=>[
              'rule'=>['minLength',10],
              'last'=>true,
              'message'=>'body is too short'
            ],
            'maxLength'=>[
              'rule'=>['maxLength',250],
              'message'=>'olalalal.'
            ]
        ]);
    return $validator;
  }

}

?>