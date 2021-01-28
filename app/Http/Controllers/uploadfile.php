<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class uploadfile extends Controller
{
    function index(Request $req){
        return $req->file('file')->store('documents');
    }

    function viewStudent(){
            return view('add-student');
    }

    function addimage(Request $req){

        $req->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'name' => 'required|max:20'
        ]);
        $name=$req->name;
        $image = $req->file;
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $student = new profile();
        $student->name = $name;
        $student->image = $imageName;
        $student->save();

        return back()->with( $req->session()->flash('add_image'));
    }
        function viewImage(){
            $students= profile::all();
            return view('view-students',compact('students'));
        }
        function beforUpdate($id){
            $students= profile::find($id);
            return view('edit-student',compact('students'));
        }

        function editImage(Request $req){
            $req->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                'name' => 'required|max:20'

            ]);
        $image = $req->file;
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $student = profile::find($req->id);
        $student->name =$req->name;
        $student->image =$imageName;
        $student->save();

        return redirect('students');

        }

        function deleteImage($id){
            $students= profile::find($id);
            unlink(public_path('images').'/'.$students->image);
            $students->delete();

            return redirect('students');
        }
}
