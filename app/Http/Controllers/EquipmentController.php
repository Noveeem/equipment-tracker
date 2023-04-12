<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Equipment;
use Alert;
use Session;
use Hash;
use DB;

class EquipmentController extends Controller
{
    public function viewRecords(){
        $records = $this->getRecords();
        
        return view('dashboard', ['records' => $records]);
    }

    public function getRecords(){
        return DB::table('equipment_track')->orderBy('control_id', 'desc')->get();
    }
}
