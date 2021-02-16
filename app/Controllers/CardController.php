<?php


namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\CardModel;
use App\Models\CardAttributeModel;
class CardController extends BaseController
{
     
     use ResponseTrait;
	public function index(){
          
          $model = new CardModel();
          $data['card'] = $model->orderBy('card_id', 'DESC')->findAll();
          return $this->respond($data);
     }
     public function showbydeckcard($deck=null,$id=null)
     {
          $model = new CardModel();
          $data = $model->where('deck_id', $deck)->where('card_id',$id)->first();
          if($data){
               return $this->respond($data);
          }else{
               return $this->failNotFound('No Card found');
          }
     }
     public function showbydeck($id=null)
     {
          $model = new CardModel();
          $data = $model->where('deck_id', $id)->first();
          if($data){
               return $this->respond($data);
          }else{
               return $this->failNotFound('No Deck found');
          }
     }
     public function showbycard($id=null)
     {
          $model = new CardModel();
          
          $data = $model->where('card_id', $id)->first();
          if($data){
               return $this->respond($data);
          }else{
               return $this->failNotFound('No Card found');
          }
     }
     public function getAttribute($id=null)
     {    
          $db = \Config\Database::connect();
          $builder = $db->table('cards');
          $data = $builder->select("*")->where('cards.card_id',$id)->get()->getResult();
          $model = new CardAttributeModel();
          $data[0]->attributes = $model->where('card_id',$id)->get()->getResult();     
          $db->close();
          if($data){
               return $this->respond($data);
          }else{
               return $this->failNotFound('No Card found');
          }
     }
}