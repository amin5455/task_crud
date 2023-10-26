<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\save_file;

class FileController extends Controller
{
    public function index():view
    {
         $get_file=save_file::all();
         return view('fileUpload',['get_file'=>$get_file]);
        
    }

    public function store(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:pdf,xlx,csv|max:4096',

        ]);
        $fileName = time().'.'.$request->file->extension();  
       
        $request->file->move(public_path('uploads'), $fileName);
     
         save_file::create(['file_name' => $fileName]);
       
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function destroy($id)
    {
        $del_file = save_file::findOrFail($id);
        $file_path = public_path("uploads/{$del_file->file_name}");
    
        if ($file_path) {
            //File::delete($image_path);
            unlink($file_path);
        }
        $del_file->delete();
        return back()
            ->with('success','File deleted success');

    }

    public function edit($id)
    {
        $edit_file = save_file::findOrFail($id);
        return view('editFile',['edit_file'=>$edit_file]);

    }
    public function edit_file(Request $request){
        $file_id = $request['file_id'];
        $del_file = save_file::findOrFail($file_id);
        $file_path = public_path("uploads/{$del_file->file_name}");
    
        if ($file_path) {
            //File::delete($image_path);
            unlink($file_path);
        }
        
        $request->validate([

            'file' => 'required|mimes:pdf,xlx,csv|max:4096',

        ]);
        $fileName = time().'.'.$request->file->extension();  
       
        $request->file->move(public_path('uploads'), $fileName);
     
         save_file::where('id',$file_id)->update(['file_name' => $fileName]);
         return redirect('file-upload')->with('success', 'File Updated Successfully');

        //  return view('fileUpload',['success'=>'You have successfully Updated file.']);


    }
}
 
