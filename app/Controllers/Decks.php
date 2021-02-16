<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DeckModel;

class Decks extends ResourceController
{
     use ResponseTrait;

     // all users
     public function index()
     {
          helper(['form', 'url']);
          $model = new DeckModel();
          $data['deck'] = $model->orderBy('deck_id', 'DESC')->findAll();
          return $this->respond($data);
     }

     // create
     public function create()
     {
          $empty = empty($_FILES['cover']['name']);
          $rules = null;
          $rules = [
               'name' => 'required|is_unique[decks.name]',
               'num_of_cards' => 'required',
               'type' => 'required',
          ];
          if ($empty) {
          } else {
               $rules = [
                    'name' => 'required|is_unique[decks.name]',
                    'num_of_cards' => 'required',
                    'type' => 'required',
                    'cover' => 'is_image[cover]|max_size[cover,4096]'
               ];
          }
          if ($this->validate($rules)) {
               $file = $this->request->getFile('cover');
               $foldername = null;
               if ($empty) {
                    $foldername = null;
               } else {
                    if ($file->isValid()) {
                         $foldername = strtolower($this->request->getVar('name'));
                         $foldername = str_replace(' ', '_', $foldername);
                         $ext = $file->getExtension();
                         $time = time();
                         $file->move('./assets/upload/cards/' . $foldername, "cover_" . $time . "." . $ext);
                         $foldername = $foldername . "/cover_" . $time . "." . $ext;
                    }
               }
               $model = new DeckModel();
               $data = [
                    'name' => $this->request->getVar('name'),
                    'number_of_cards'  => $this->request->getVar('num_of_cards'),
                    'type' => $this->request->getVar('type'),
                    'cover' => $foldername
               ];
               $id = $model->save($data);
               if (!$id) {
                    return $this->fail($model->errors());
               }
               $response = [
                    'status'   => 201,
                    'error'    => null,
                    'messages' => [
                         'success' => 'Deck created successfully',
                         'id' => $id
                    ]
               ];
          } else {
               return  json_encode($this->validator->getErrors());
          }
          return $this->respondCreated($response);
     }

     // single user
     public function show($id = null)
     {
          $model = new DeckModel();
          $data = $model->where('deck_id', $id)->first();
          if ($data) {
               return $this->respond($data);
          } else {
               return $this->failNotFound('No Deck found');
          }
     }

     // update
     public function update($id = null)
     {
          $model = new DeckModel();
          $id = $this->request->getVar('id');
          $data = [
               'name' => $this->request->getVar('name'),
               'number_of_cards'  => $this->request->getVar('num_of_cards'),
               'type'  => $this->request->getVar('type'),
          ];
          $model->update($id, $data);
          $response = [
               'status'   => 200,
               'error'    => null,
               'messages' => [
                    'success' => 'Deck updated successfully'
               ]
          ];
          return $this->respond($response);
     }

     // delete
     public function delete($id = null)
     {
          $model = new DeckModel();
          $data = $model->where('deck_id', $id)->delete($id);
          if ($data) {
               $model->delete($id);
               $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                         'success' => 'Deck successfully deleted'
                    ]
               ];
               return $this->respondDeleted($response);
          } else {
               return $this->failNotFound('No Deck found');
          }
     }
}