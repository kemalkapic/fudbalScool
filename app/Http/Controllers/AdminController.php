<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talent;
use App\Models\Kasa;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //--------------------------------TALENTI METHODS-----------------------------------------//
    public function index()
    {
        return view('talenti');
    }
    public function getTalents()
    {
        $talents = Talent::all();
        return view('talenti', ['talents' => $talents]);
    }
    public function addTalent()
    {
        return view('novitalent');
    }
    public function addTalentSave(Request $request)
    {
        $validated = $request->validate([
        'prezime' => 'required',
        'ime' => 'required',
        'datum_rodjenja' => 'required',
        'ime_roditelja' => 'required',
        ]);

        $prezime = $request->input('prezime');
        $ime = $request->input('ime');
        $datum_rodjenja = $request->input('datum_rodjenja');
        $status = $request->input('status');
        $start_treniranja = $request->input('start_treniranja');
        $ime_roditelja = $request->input('ime_roditelja');
        $telefon = $request->input('telefon');
        $email = $request->input('email');

        Talent::create([
            'prezime' => $prezime,
            'ime' => $ime,
            'datum_rodjenja' => $datum_rodjenja,
            'status' => $status,
            'start_treniranja' => $start_treniranja,
            'ime_roditelja' => $ime_roditelja,
            'telefon' => $telefon,
            'email' => $email,
        ]);

        return redirect('admin/talenti');
    }

    public function talentEdit($id)
    {
        $talent = Talent::where('id', $id)->first();

        return view('ureditalenta', ['talent' => $talent]);
    }
    public function talentUpdate(Request $request, $id)
    {
        $validated = $request->validate([
        'prezime' => 'required',
        'ime' => 'required',
        'datum_rodjenja' => 'required',
        'ime_roditelja' => 'required',
        ]);

        $prezime = $request->input('prezime');
        $ime = $request->input('ime');
        $datum_rodjenja = $request->input('datum_rodjenja');
        $status = $request->input('status');
        $start_treniranja = $request->input('start_treniranja');
        $ime_roditelja = $request->input('ime_roditelja');
        $telefon = $request->input('telefon');
        $email = $request->input('email');

        Talent::where('id', $id)->update(array('prezime' => $prezime, 'ime' => $ime, 'datum_rodjenja' => $datum_rodjenja, 'status' => $status, 'start_treniranja' => $start_treniranja, 'ime_roditelja' => $ime_roditelja, 'telefon' => $telefon, 'email' => $email));
        
        return redirect('admin/talenti');
    }
    public function talentDelete($id)
    {
        Talent::where('id', $id)->update(array('status' => 'Obrisan'));
        return redirect('admin/talenti');
    }

    //--------------------------------CASH REGISTER METHODS-----------------------------------------//

    public function getCashRegister()
    {
        $kasa = Kasa::all();
        $talent = Talent::all();
        return view('kasa', ['talents' => $talent, 'kasa' => $kasa]);
    }
    public function kasaDeletee()
    {
        Kasa::where('id', $id)->update(array('status' => 'Obrisan'));
        return redirect('admin/kasa');
    }
}
