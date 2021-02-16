<?php

namespace App\Models;

use CodeIgniter\Model;

class DeckModel extends Model
{
    protected $table = 'decks';
    protected $primaryKey = 'deck_id';
    protected $allowedFields = ['name', 'number_of_cards', 'type', 'created_at', 'cover'];
}