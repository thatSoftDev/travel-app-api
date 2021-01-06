<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Trip;
use Illuminate\Http\Response;

class TripController extends Controller
{
    public function index(): Response
    {   
        if (Trip::all()->count() < 1) {
            return response('There are no trips.', 200);
        }

        return response(Trip::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StoreTripRequest $request): Response
    {  
        Trip::create($request->validated());

        return response('Trip created successfuly.', 201);
    }

    public function show(Trip $trip)
    {  
        return response(Trip::find($trip)->first()->toJson(JSON_PRETTY_PRINT), 302);
    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {   
        Trip::find($trip)->first()->update($request->validated());

        return response('Trip updated successfuly.', 200);
    }

    public function destroy(Trip $trip)
    {
        Trip::find($trip)->first()->delete();

        return response('Trip deleted successfuly.', 200);
    }
}
