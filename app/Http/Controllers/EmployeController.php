<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\employe;
use Illuminate\View\view;
use Illuminate\Validation\Rule;
use Illuminate\Http\Input;
use Yajra\DataTables\Facades\DataTables;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $employe = employe::all();
        // return view ('employe.index')->with('employe', $employe);

            if ($request->ajax()) {
                return DataTables::of(employe::query())
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
    
                        $btn = '<a href="/employe/'. $row->id.'" class="btn btn-info btn-sm">veiw</a>';

                        $btn = $btn.' <a href="/employe/'.$row->id.'/edit" class="btn btn-secondary btn-sm">Edit</a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEmploye">Delete</a>';
    
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('employe.index');
        
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('employe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       $email=$request['email'];
       // echo $address;
       $select_emails = employe::select('email')->get()->toarray();
       foreach($select_emails as $select_email){
           $db_email = str_replace('"','',$select_email['email']);
           if($email == $db_email){
            return redirect('employe/create')->with('error', 'This Email Already Exist!');
           }
        }
        $input  = $request->all();
        employe::create($input);
        return redirect('employe')->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): view
    {
        $employe = employe::find($id);
        return view('employe.show')->with('employe',$employe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): view
    {
        $employe = employe::find($id);
        return view('employe.edit')->with('employe',$employe);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
           $employe = employe::find($id);
        // $email=$request['email'];
        // // echo $address;
        // $select_emails = employe::select('email')->get()->toarray();
        // foreach($select_emails as $select_email){
        //     $db_email = str_replace('"','',$select_email['email']);
        //     if($email == $db_email){
        //      return redirect('employe');
        //     }
        //  }
        $input  = $request->all();
        $employe->update($input);
        return redirect('employe')->with('success','Employe updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employe $employe)
    {
        $employe->delete();

        return response()->json(['success' => 'Product deleted successfully.']);
    }
}
