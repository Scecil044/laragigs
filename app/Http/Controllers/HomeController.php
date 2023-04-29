<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
        return view('welcome', compact('listings'));
    }
    public function singleListing(Request $request){
        $id = $request->id;
        $listing = Listing::find($id);
        if($listing){
            return view('listing',compact('listing'));
        }else{
            return view('pageNotFound');
        }
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'description' => 'required',

            'location'=> 'required',
            'email'=> ['required', 'email'],
            'website'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

         $formFields['user_id'] = Auth::user()->id;
        Listing::Create($formFields);
        return redirect('/')->with('message', 'gig posted successfully');

    }
    public function edit(Request $request){
        $id = $request->id;
        $listing = Listing::find($id);
        return view('edit', compact('listing'));
    }

    public function update(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => ['required'],
            'description' => 'required',

            'location'=> 'required',
            'email'=> ['required', 'email'],
            'website'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing = Listing::find($request->id);
        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully');

    }
    public function destroy(Request $request){
        Listing::find($request->id)->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
