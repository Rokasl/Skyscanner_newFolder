<?php

namespace App\Http\Controllers;

use App\Facades\SkyScanner;
use App\Flight;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function addVoteForFlight(Request $request)
    {
       $flight =  Flight::find();

        if (Vote::where('client_id', $request->get('client_id')->where('flight_id', $request->get('flight_id'))->count() < 1 )) {

            $vote =  new Vote();
            $vote->flight_id = $request->get('flight_id');
            $vote->client_id = $request->get('client_id');

        } else {
            return response('Already voted', '401');
        }

    }


    public function showDestinations(Request $request)
    {

        return SkyScanner::destination($request->get('q'))->Places;
    }
}
