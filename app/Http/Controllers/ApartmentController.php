<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Http\Resources\ApartmentResource;
use Illuminate\Http\Request;
use Validator;

class ApartmentController extends Controller
{
    //Display a list of the apartments
    public function index()
    {
        $apartments = Apartment::latest()->paginate(5);
        return response([ 'apartments' => ApartmentResource::collection($apartments), 'message' => 'Retrieved successfully'], 200);  

    }

    /* Show the form for creating a new apartment.
    public function create()
    {
        return view('apartment.create');
    }
    */

    //Store a newly created apartment in storage.
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'active' => 'required|integer'
        );
        $validator = Validator::make($request->all(), $rules);
     
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $data = $request->all();
        $apartment = Apartment::create($data);
        return response(['apartment' => new ApartmentResource($apartment), 'message' => 'Created successfully'], 201);
        
    }

    /* Show the form for editing the apartment.
    public function edit($ext_id)
    {
        $apartment = Apartment::findOrFail($ext_id);        
        return view('apartment.edit',compact('apartment'));
    }
    */

    //Update Apartment
    public function update(Request $request, Apartment $apartment)
    {
        $rules = array(
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'quantity' => 'integer',
            'active' => 'integer'
        );
        $validator = Validator::make($request->all(), $rules);
     
       if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $apartment->update($request->all());
        return response(['apartment' => new ApartmentResource($apartment), 'message' => 'Updated successfully'], 200);
       
    }


    public function show(Apartment $apartment)
    {
        //$apartment = Apartment::findOrFail($ext_id);
        //dd($apartment);
        return response([
            'apartment' => new ApartmentResource($apartment), 
            'message' => 'Retrieved successfully'
        ], 200);
    }


    //Delete Apartment
    public function destroy(Apartment $apartment)
    {
        //dd($apartment);
        //$apartment = Apartment::findOrFail($ext_id);
        $apartment->delete();

        return response(['message' => 'Deleted']);
     
    }
}
