<?php

namespace App\Http\Controllers;

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
}
