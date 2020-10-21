<?php

namespace App\Http\Controllers;

use DB;
use App\Character;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
  public function statistics()
  {
    //$accounts = DB::table('accounts')->where('user_id' '=' $id)->sum('balance');
    $accounts = DB::table('accounts');
    $characters = DB::table('characters');
    $playhours = DB::table('characters')->orderBy('hoursplayed', 'desc')->limit(10)->get();
    $topdonates = DB::table('accounts')->orderBy('totalcredits', 'desc')->limit(10)->get();
    $vehicles = DB::table('vehicles')->where('deleted', 0);
    $interiors = DB::table('interiors')->where('deleted', 0);
    $factions = DB::table('factions');
    $shops = DB::table('shops')->where('deletedBy', '<>', 0);
    return view('server.statistics', compact('accounts', 'characters', 'vehicles', 'factions', 'interiors', 'shops', 'playhours', 'topdonates'));
  }
}
