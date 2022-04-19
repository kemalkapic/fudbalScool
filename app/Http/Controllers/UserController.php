<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Kasa;
use App\Models\Talent;
use DB;

use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $talenti = Talent::where("status", "Aktivan")->get();
        $grupe = Talent::select(DB::raw('YEAR(datum_rodjenja) as year'), DB::raw('count(*) as total'))
                        ->orderBy('datum_rodjenja', 'asc')
                        ->groupBy('year')
                        ->take(7)
                        ->get();
                      
        return view('user', ['grupe' => $grupe]);
    }
    public function generation($year)
    {
        $talenti = Talent::where("status", "Aktivan")
                          ->where(DB::raw('YEAR(datum_rodjenja)'), '=', $year)
                          ->get();
        $clanarine = new Collection();
         
        foreach($talenti as $talent){
            $kasa = Kasa::where("status", "Aktivan")
                        ->where('talent_id', $talent->id)
                        ->get();
            $paidMonths = array_map('strtolower', $kasa->pluck('mjesecGodina')->toArray());      
            $mapaClanarina = $this->makeArrayMonths($kasa, $paidMonths);   
            $clanarine->push([
                    'id' => $talent->id,
                    'name' => $talent->prezime . ' ('.  $talent->ime_roditelja . ') ' .  $talent->ime,
                    'clanarina'=> $mapaClanarina    
            ]);
        }       
        return view('generacija', ['talenti' => $talenti, 'clanarine' => $clanarine]);
    }
    public function makeArrayMonths($kasa, $paidMonths){
        Carbon::setlocale('bs');
        $curent = Carbon::now()->translatedFormat('F Y');
        $months = new Collection();
        for($i=3;$i>0;$i--){
                $currentMonth=Carbon::now()->subMonth($i)->translatedFormat('F Y');
                if(in_array($currentMonth, $paidMonths)){
                    $months->push([$currentMonth => 'Paid']);
                }else{
                    $months->push([$currentMonth => 'Not Paid']);
                   
                }   
        }
        $currentMonth=Carbon::now()->translatedFormat('F Y');
        if(in_array($currentMonth, $paidMonths)){
            $months->push([$currentMonth => 'Paid']);
        }else{
            $months->push([$currentMonth => 'Not Paid']);
        }   
        for($i=1;$i<9;$i++){
                $currentMonth=Carbon::now()->addMonth($i)->translatedFormat('F Y');
                if(in_array($currentMonth, $paidMonths)){
                    $months->push([$currentMonth => 'Paid']);
                }else{
                    $months->push([$currentMonth => 'Not Paid']);
                }   
        }
        return $months;
    }

}
