<?php

namespace App\Http\Controllers;
use App\Models\Administratif;
use App\Models\Traite;

use App\Models\Reservation;
use App\Models\Voiture;

use Redirect,Response;
Use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = ['2022','2023','2024','2025','2026'];

        $voiture = [];
        foreach ($year as $key => $value) {
            $voiture[] = Voiture::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

$record =  Reservation::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
->where('created_at', '>', Carbon::today()->subDay(6))
->groupBy('day_name','day')
->orderBy('day')
->get();

 $data = [];

 foreach($record as $row) {
    $data['label'][] = $row->day_name;
    $data['data'][] = (int) $row->count;
  }

$data['chart_data'] = json_encode($data);
        $topArt = Administratif::latest()->take(4)->get();
        $top = Traite::latest()->take(4)->get();

    return view('home', compact('topArt' , 'top'), $data)->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('voiture',json_encode($voiture,JSON_NUMERIC_CHECK));
    }


}