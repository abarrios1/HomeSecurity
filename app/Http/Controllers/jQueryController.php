<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class jQueryController extends Controller
{
    public function index() {
        return view('/jQuery/jQuery');
    }
}
