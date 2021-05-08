<?php

namespace App\Http\Controllers;

use App\Models\ApartmentCategory;
use Illuminate\Http\Request;

class ApartmentCategoryController extends Controller
{
    //Display a list of the categories
    public function index()
    {
        $categories = ApartmentCategory::latest()->paginate(5);
        
        return view('category.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('category.create');
    }

    //Store a newly created category in storage.
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'ext_id' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',            
        ]);

        $category = ApartmentCategory::create($storeData);
         
        return redirect('/category')->with('completed', 'A new category has been saved!');
    }

    // Show the form for editing the category.
    public function edit($ext_id)
    {
        $category = ApartmentCategory::findOrFail($ext_id);        
        return view('category.edit',compact('category'));
    }

    //Update category
    public function update(Request $request, $ext_id)
    {
         //validation
         $updateData = $request->validate([
            'ext_id' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        ApartmentCategory::where('ext_id',$ext_id)->update($updateData);

        return redirect('/category')->with('success','Category updated successfully');
    }

    //Delete category
    public function destroy($ext_id)
    {
        $category = ApartmentCategory::findOrFail($ext_id);
        $category->delete();

        return redirect('/category')->with('success', 'Category has been deleted');
    }
}
