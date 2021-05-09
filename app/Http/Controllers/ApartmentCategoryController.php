<?php

namespace App\Http\Controllers;

use App\Models\ApartmentCategory;
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
        $category = ApartmentCategory::create($data);
        return response([
            'category' => new ApartmentCategoryResource($category),
            'message' => 'Created successfully'
        ], 201);
        
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

        $category->update($request->all());
        return response([
            'category' => new ApartmentCategoryResource($category),
            'message' => 'Updated successfully'
        ], 200);
       
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
