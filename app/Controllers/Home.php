<?php

namespace App\Controllers;

use App\Models\DeckModel;

class Home extends BaseController
{
     public function index()
     {
          return view('home');
     }
     public function newdeck()
     {
          return view('deck');
     }
     public function editdeck($id = null)
     {

          $model = new DeckModel();
          $data['data'] = $model->where('deck_id', $id)->first();
          // echo $data;
          return view('edit_deck', $data);
     }
}