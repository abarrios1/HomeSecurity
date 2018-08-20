<?php

namespace App\Http\Controllers;

use App\inventory;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $all = inventory::all();
        return $all;
    }

    public function Display() {
        
        $invent = inventory::paginate(9);
        
        $llc = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%LLC%')->get())->count();
        $ltd = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%LTD%')->get())->count();
        $inc = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%INC%')->get())->count();
        $plc = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%PLC%')->get())->count();
        $group = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%GROUP%')->get())->count();
        
        $family = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%AND SON%')->where('manufacturer', 'NOT LIKE', '%-%')->get())->count();
        $threePartners = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%AND%')->where('manufacturer', 'NOT LIKE', '%AND SON%')->get())->count();
        $twoPartners = (DB::table('inventories')->select('manufacturer')->where('manufacturer', 'LIKE','%-%')->get())->count();
        $partnership = $twoPartners + $threePartners;
        $manufacts = [
            'llc' => $llc,
            'ltd' => $ltd,
            'inc' => $inc,
            'plc' => $plc,
            'group' => $group,
            'family' => $family,
            'partnership' => $partnership
        ];

        return view('Home.display', ['invent' => $invent, 'manufacts' => $manufacts]);
    }

    public function details($id) {
        $invent = inventory::find($id);
    }

    public function edit($id) {

    }

    public function delete($id) {

    }
}
