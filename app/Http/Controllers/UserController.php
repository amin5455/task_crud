<?php

namespace App\Http\Controllers;

use App\Models\employe;
use App\Models\import_csvs;

use App\Models\vanceleather;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\View\View;
use Illuminate\Support\Facades\Bus;
use App\jobs\VanceLeatherCSVData;

class UserController extends Controller
{
    public function index(): View
     {

        return view('vance_leather_import');
    }

    public function store(Request $request)
    {
        if( $request->has('csv') ) {
            $csv    = file($request->csv);
            $chunks = array_chunk($csv, 1000);
            $header = [];
            $batch  = Bus::batch([])->dispatch();
  
            foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);
                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new VanceLeatherCSVData($data, $header));
            }
  
            return redirect()->route('products.import.index')
                            ->with('success', 'CSV Import added on queue. will update you once done.');
            
        }
    }
}
