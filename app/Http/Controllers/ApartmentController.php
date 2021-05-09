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
        return ApartmentResource::collection(Apartment::orderBy('id', 'ASC')->paginate(10));
    }
    
    //Store a newly created apartment in the DB.
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
        return response([
            'apartment' => new ApartmentResource($apartment),
            'message' => 'Created successfully'
        ], 201);
        
    }

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
        return response([
            'apartment' => new ApartmentResource($apartment),
            'message' => 'Updated successfully'
        ], 200);
       
    }

    //Get Apartment
    public function show(Apartment $apartment)
    {
        return response([
            'apartment' => new ApartmentResource($apartment), 
            'message' => 'Retrieved successfully'
        ], 200);
    }


    //Delete Apartment
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return response(['message' => 'Deleted']);
     
    }
}
