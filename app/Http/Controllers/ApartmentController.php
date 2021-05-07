<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //Display a list of the apartments
    public function index()
    {
        $apartments = Apartment::latest()->paginate(5);
        return view('apartment.index',compact('apartments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Show the form for creating a new apartment.
    public function create()
    {
        return view('apartment.create');
    }

    //Store a newly created apartment in storage.
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'quantity' => 'required|integer',
            'active' => 'required|integer'
        ]);

        $apartment = Apartment::create($storeData);
         
        return redirect('/apartment')->with('completed', 'A new apartment has been saved!');
    }

    // Show the form for editing the apartment.
    public function edit($ext_id)
    {
        $apartment = Apartment::findOrFail($ext_id);        
        return view('apartment.edit',compact('apartment'));
    }

    //Update Apartment
    public function update(Request $request, $ext_id)
    {
         //validation
         $updateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'quantity' => 'required|integer',
            'active' => 'required|integer'
        ]);

        Apartment::where('ext_id',$ext_id)->update($updateData);

        return redirect('/apartment')->with('success','Apartment updated successfully');
    }

    //Delete Apartment
    public function destroy($ext_id)
    {
        $apartment = Apartment::findOrFail($ext_id);
        $apartment->delete();

        return redirect('/apartment')->with('success', 'Apartment has been deleted');
    }
}
