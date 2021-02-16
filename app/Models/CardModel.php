<?php 
namespace App\Models;
use CodeIgniter\Model;

class CardModel extends Model
{
    protected $table = 'cards';
    protected $primaryKey = 'card_id';
    protected $allowedFields = ['deck_id','name', 'image_uri','description','created_at'];

}