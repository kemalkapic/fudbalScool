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
    public function kasa()
    {
        $kasa = Kasa::where("status", "Aktivan")->get();
        $talent = Talent::all();
        return view('kasa', ['talents' => $talent, 'kasa' => $kasa]);
    }
    public function uplata()
    {
        $talenti = Talent::all();
        return view('kasauplata', ['talenti' => $talenti]);
    }
    public function add(Request $request)
    {
        $validated = $request->validate([
        'tipprometa' => 'required',
        'datum' => 'required',
        'status' => 'required',
        'iznos' => 'required',
        'opis' => 'required',
        ]);

        $tip = $request->input('tipprometa');
        $datum = $request->input('datum');
        $status = $request->input('status');
        $iznos = $request->input('iznos');
        $opis = $request->input('opis');
        $talent_id = $request->input('talent');
        $uplatitelj = $request->input('uplatitelj');
        $zamjesec = $request->input('month');
        
        Kasa::create([
            'talent_id' => $talent_id,
            'uplatitelj' => $uplatitelj,
            'tip' => $tip,
            'opis' => $opis,
            'mjesecGodina' => $zamjesec,
            'iznos' => $iznos,
            'datum' => $datum,
            'status' => $status,
        ]);

        return redirect('admin/kasa');
    }
    public function delete($id)
    {
        Kasa::where('id', $id)->update(array('status' => 'Obrisan'));
        return redirect('admin/kasa');
    }
}
