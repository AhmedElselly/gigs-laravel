<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Get all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
        ]);
    }

    // Get single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);    
    }

    // show create listings form
    public function create(){
        return view('listings.create');
    }

    // create listings store
    public function store(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings', 'company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request -> hasFile(('logo'))){
            $formFields['logo'] = $request -> file('logo') -> store('logos', 'public');
        }

        Listing::create($formFields);
        // Session::flash('message', 'Listing created');

        return redirect('/listings/create') -> with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request -> hasFile(('logo'))){
            $formFields['logo'] = $request -> file('logo') -> store('logos', 'public');
        }

        $listing->update($formFields);
        // Session::flash('message', 'Listing created');

        return back() -> with('message', 'Listing created successfully!');
    }

    public function remove(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
