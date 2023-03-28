<?php

namespace App\Http\Controllers\pages;

// use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{

    //   ============show dashboard ==============
    public function showdashboard(){
        $dashboard=Dashboard::all();
        return view('pages.dashboard',compact('dashboard'));
    }
//   ============submit dashboard ==============

    public function dashboard(){
        $this->validate(request(),[

            'name'=>'required',
            'email'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'gender'=>'required',
            'skills'=>'required'
        ]);

        // finding image extention
        $imageExtension=request()->file('image')->extension();
        // creating a unique name for image
        $imageName="e_tracker_".uniqid()."_".time().".".$imageExtension;
        // saved in folder
        request()->file('image')->move('images',$imageName);

        $Dashboard=Dashboard::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'image'=>$imageName,
        'gender'=>request('gender'),
        'skills'=>json_encode(request()->skills)

        ]);
        return redirect()->back();

    }

//   ============delete dashboard data ==============
public function delete($id){
    Dashboard::findorFail($id)->delete();
    return to_route('showdashboard');
}
//   ==============show edit page=================
public function showedit($id){

     $dashboard=Dashboard::find($id);
    return view('pages.edit',compact('dashboard'));
}



public function edit($id){

     $dashboard=Dashboard::find($id);

       // finding image extention
     $imageExtension=request()->file('image')->extension();
     // creating a unique name for image
     $imageName="e_tracker_".uniqid()."_".time().".".$imageExtension;
     // saved in folder
     request()->file('image')->move('images',$imageName);
    //  delete from storage
          if(request()->hasFile('image')){
            $destination='images/'.$dashboard->image;
            if(File::exists($destination)){
               File::delete($destination);
            }
          }
     $dashboard->update([
        'name'=>request('name'),
        'email'=>request('email'),
        'image'=>$imageName,
        'gender'=>request('gender'),
        'skills'=>json_encode(request()->skills)

     ]);
     return to_route('showdashboard');
}
}
