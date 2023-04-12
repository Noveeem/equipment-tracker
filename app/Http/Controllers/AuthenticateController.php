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

class AuthenticateController extends Controller
{
    public function viewHistory(){
        if(!Auth::check()){
            return redirect('/');
        }

        $record = $this->getHistory();

        return view('history', ['Records' => $record]);

    }
    
    public function search(Request $request){

        if($request->ajax()){
            $result = '';
            $query = $request->get('query');

                if($query != ''){

                    $data = DB::table('equipment_track')
                                ->where('control_id', 'like', '%'.$query.'%')
                                ->orWhere('asset_identification_number', 'like', '%'.$query.'%')
                                ->orderBy('control_id', 'desc')
                                ->get();
                } else {
                    $data = DB::table('equipment_track')
                                ->orderBy('control_id', 'desc')
                                ->get();
                }

                $total_row = $data->count();
                if($total_row > 0){
                    foreach ($data as $row) {
                        $result .= '
                        <tr data-bs-toggle="collapse" data-bs-target="#target_id_'.$row->control_id.'" class="accordion-toggle">
                            <td scope="row">#'.$row->control_id.'</td>
                            <td>'.$row->asset_identification_number.'</td>
                            <td>'.$row->item_description.'</td>
                            <td>'.$row->station.'</td>
                            <td>'.$row->date.'</td>
                            <td>'.$row->facilitate.'</td>
                        </tr>
                        <tr>
                        <td colspan="6" class="hiddenRow">
                            <div id="target_id_'.$row->control_id.'" class="accordion-body accordion-collapse collapse">
                                <div class="container mb-4 mt-4">
                                    <div class="row">
                                        <div class="col-md-6 fs-6">
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Date: </label></span>
                                                <span><label for="">'.$row->date.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Control Number: </label></span>
                                                <span><label for="">'.$row->control_id.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Asset Identification Number: </label></span>
                                                <span><label for="">'.$row->asset_identification_number.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Item Description: </label></span>
                                                <span><label for="">'.$row->item_description.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Serial Number: </label></span>
                                                <span><label for="">'.$row->serial_number.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Facilitated By: </label></span>
                                                <span><label for="">'.$row->facilitate.'</label></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 fs-6">
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Quantity: </label></span>
                                                <span><label for="">'.$row->quantity.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Remarks: </label></span>
                                                <span><label for="">'.$row->remarks.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">User: </label></span>
                                                <span><label for="">'.$row->user.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Account: </label></span>
                                                <span><label for="">'.$row->account.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Station Number/Location: </label></span>
                                                <span><label for="">'.$row->station.'</label></span>
                                            </div>
                                            <div class="flex-column mb-3">
                                                <span class="fw-bold"><label for="ControlNum">Status: </label></span>
                                                <span class="text-danger"><label for="">'.$row->status.'</label></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                        ';
                    }
                } else {
                    $result = '
                    <tr>
                        <td align="center" colspan="7">No Data Found</td>
                    </tr>
                    ';
                }

                $data = array(
                    'table_data' => $result,
                    'total_data' => $total_row
                );
                echo json_encode($data);

        }

    }

    public function equipment(Request $request){
        $request->validate([
            'Date' => 'required',
            'AssetIdentificationNumber' => 'required',
            'Description' => 'required',
            'User' => 'required',
            'Account' => 'required',
            'Quantity' => 'required',
            'SerialNumber' => '',
            'Remarks' => 'required',
            'Location' => 'required',
            'Facilitate' => 'required',
        ]);

        $data = $request->all();
        $make = $this->newequipment($data);

        Alert::success('Success!', 'New tracker has been added to the record');
        return back();

    }


    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:3',
            'role' => 'required|not_in:0',
        ]);

        $data = $request->all();
        $make = $this->newaccount($data);
        
        Alert::success('Success!', 'You have successfully added a new account.');
        return redirect()->back();
    }

    public function authenticate(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            Alert::success('Success!', 'You have successfully signed in!');
            return redirect()->intended('dashboard');
        }

        Alert::error('Error!', 'Sorry, invalid credentials.');
        return back();
    }
    

    //History
    public function getHistory(){
        return DB::table('equipment_track')
                    ->where('user_id', Auth::user()->id)
                    ->get();
    }


    // Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    // MYSQL 
    public function newaccount(array $data){
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function newequipment(array $data){
        return Equipment::create([
            'asset_identification_number' => $data['AssetIdentificationNumber'],
            'item_description' => $data['Description'],
            'serial_number' => $data['SerialNumber'],
            'quantity' => $data['Quantity'],
            'remarks' => $data['Remarks'],
            'station' => $data['Location'],
            'user' => $data['User'],
            'account' => $data['Account'],
            'facilitate' => $data['Facilitate'],
            'date' => $data['Date'],
            'status' => 'Standby',
            'user_id' => Auth::user()->id,
        ]);
    }
}
