<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasa;
use App\Models\Talent;

class KasaController extends Controller
{
    
    //--------------------------------CASH REGISTER METHODS-----------------------------------------//

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getCashRegister()
    {
        $kasa = Kasa::all();
        $talent = Talent::all();
        return view('kasa', ['talents' => $talent, 'kasa' => $kasa]);
    }
    public function kasaDelete()
    {
        Kasa::where('id', $id)->update(array('status' => 'Obrisan'));
        return redirect('admin/kasa');
    }
}
