<?php

namespace App\Controllers;

use App\Models\DeckModel;
use App\Models\CardModel;

class CronController extends BaseController
{
     public function deleteunusedImage()
     {
          $directory = "./assets/upload/cards/*/";
          $images = glob($directory . "{*.jpg,*.jpeg,*.png,*.gif,*.JPG,*.JPEG,*.PNG,*.GIF}", GLOB_BRACE);

          for ($i = 0; $i < count($images); $i++) {
               $tes = "./assets/upload/cards/";
               $model = new DeckModel();
               $model2 = new CardModel();
               $cekdb = substr($images[$i], strlen($tes));
               $id = $model->where('cover', $cekdb)->first();
               $id2 = $model2->where('image_uri', $cekdb)->first();
               if (!$id && !$id2) {
                    unlink($images[$i]);
               }
          }
     }
}