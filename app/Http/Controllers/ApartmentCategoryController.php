<?php

namespace App\Http\Controllers;

use App\Models\ApartmentCategory;
use App\Models\Apartment;
use App\Http\Resources\ApartmentCategoryResource;
use Illuminate\Http\Request;
use Validator;

class ApartmentCategoryController extends Controller
{
    //Display a list of the categories
    public function index()
    {
        return ApartmentCategoryResource::collection(ApartmentCategory::orderBy('ext_id', 'ASC')->paginate(10));
    }

    //Store a newly created category in storage.
    public function store(Request $request)
    {
        $rules = array(
            'ext_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',

        );
        $validator = Validator::make($request->all(), $rules);
     
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        
        $data = $request->all();  
        
        //Validates if the EXT_ID exists in the Apartment Table.
        $find_apartment = Apartment::where('ext_id', $request->ext_id)->first();
        
        if($find_apartment){
            //Here we create the new Category if the ext_id in the apartment table exists.
            $category = ApartmentCategory::create($data);
            return response([
                'category' => new ApartmentCategoryResource($category),
                'message' => 'Created successfully'
            ], 201);
        }else{
            return response(['error' => 'Validation Error, Invalid Apartment ID.']);
        }
        
        
    }    

    //Update category
    public function update(Request $request, ApartmentCategory $category)
    {
        $rules = array(
            'ext_id' => 'string|max:255',
            'title' => 'string|max:255',
            'description' => 'string|max:255',

        );
        $validator = Validator::make($request->all(), $rules);
     
       if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        //Validates if the EXT_ID exists in the Apartment Table.
        $find_apartment = Apartment::where('ext_id', $request->ext_id)->first();
        if($find_apartment){
            //Here we update the Category if the ext_id in the apartment table exists.
            $category->update($request->all());
            return response([
                'category' => new ApartmentCategoryResource($category),
                'message' => 'Updated successfully'
            ], 200);
        }else{
            return response(['error' => 'Validation Error, Invalid Apartment ID.']);
        }
    }

    //Get Category
    public function show(ApartmentCategory $category)
    {
        return response([
            'category' => new ApartmentCategoryResource($category), 
            'message' => 'Retrieved successfully'
        ], 200);
    }

    //Delete category
    public function destroy(ApartmentCategory $category)
    {
        $category->delete();
        return response(['message' => 'Deleted']);
     
    }
}
