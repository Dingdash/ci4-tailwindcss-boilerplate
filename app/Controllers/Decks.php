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
        $model = new DeckModel();
        $data['deck'] = $model->orderBy('deck_id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // create
    public function create()
    {
        $model = new DeckModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'number_of_cards'  => $this->request->getVar('num_of_cards'),
            'type' => $this->request->getVar('type')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Deck created successfully'
            ]
        ];
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