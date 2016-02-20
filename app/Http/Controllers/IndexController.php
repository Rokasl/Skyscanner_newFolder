<?php

namespace App\Http\Controllers;

use App\Facades\SkyScanner;
use App\Flight;
use App\Group;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = SkyScanner::getCheapest('LON');

        $group = new Group();

        $group->public_id = strtoupper(str_random(5));
        $group->name = $request->get('name');
        $group->from = $request->get('from');
        $group->save();

        foreach ($s->Quotes as $quote) {
            $flight = new Flight();
            $flight->group_id = $group->id;
            $flight->quote_id = $quote->id;
            $flight->price = $quote->MinPrice;
            $flight->dateFrom = Carbon::parse($quote->OutboundLeg->DepartureDate);
            $flight->dateTo = Carbon::parse($quote->InboundLeg->DepartureDate);
            $flight->from_id = $quote->OutboundLeg->OriginId;
            $flight->to_id = $quote->InboundLeg->OriginId;

            foreach ($s->Places as $place) {
                if ($place->PlaceId == $flight->from_id) {
                    $flight->from = $place->name;
                }
                if ($place->PlaceId == $flight->to_id) {
                    $flight->to = $place->name;
                }
            }

        }

        return redirect()->action('IndexController@show', $group->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        Group::find($id);

        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {


    }
}
