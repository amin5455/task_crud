<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Bus;
use App\jobs\VanceLeatherCSVData;

class CSVController extends Controller
{
    public function index(): View
    {
        return view('vance_leather_import');
    }
}
