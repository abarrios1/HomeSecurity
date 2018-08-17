<?php

namespace App\Http\Controllers;

use App\inventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $all = inventory::all();
        return $all;
    }

    public function Display() {
        
        $invent = inventory::paginate(9);
        return view('Home.display', ['invent' => $invent]);
    }

    public function details($id) {
        $invent = inventory::find($id);
    }

    public function edit($id) {

    }

    public function delete($id) {

    }
}
