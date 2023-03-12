<?php

namespace App\Http\Controllers;

use App\Models\FavDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ResourceFavDoc;



class FavDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'doctor_id'=>'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $favDoc = FavDoc::create([
            
            
            'doctor_id' => $request->doctor_id,

           'user_id' =>  Auth::user()->id,
        ]);

        return response()->json(['statusCode'=>200,'data'=> new ResourceFavDoc($favDoc)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavDoc  $favDoc
     * @return \Illuminate\Http\Response
     */
    public function show(FavDoc $favDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavDoc  $favDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(FavDoc $favDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavDoc  $favDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavDoc $favDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavDoc  $favDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $favDoc_id)
    {
        $favDoc=FavDoc::find($favDoc_id);
        if(is_null($favDoc)){
            return response()->json('Ovaj doktor nije omiljen', 404);      }
            
        $favDoc->delete();

        return response()->json(['success'=>true]);
    }
}
