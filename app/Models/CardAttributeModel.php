<?php 
namespace App\Models;
use CodeIgniter\Model;

class CardAttributeModel extends Model
{
    protected $table = 'cards_attribute';
    protected $primaryKey = 'attribute_id';
    protected $allowedFields = ['card_id','attribute_name', 'attribute_value','created_at'];
}