<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavDoc;
use App\Http\Resources\ResourceFavDoc;


class UsersFavDocController extends Controller
{
    public function index($user_id) {
        $favDocs=FavDoc::get()->where('user_id', $user_id);
        if(is_null($favDocs)) return response()->json("Nemate omiljenih doktora",404);
        else         return ['data' => ResourceFavDoc::collection(FavDoc::get()->where('user_id', $user_id))];
  
           }
}
