<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\File;
use App\Models\Trip;

class FileController extends Controller
{
    public function index(Trip $trip)
    {
        return response(Trip::find($trip)->first()->with('files')->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StoreFileRequest $request, Trip $trip, File $file)
    {   
        $validated = $request->validated();
        File::create([
            'trip_id' => $trip->id,
            'name' => $validated['file']->getClientOriginalName(),
            'storage_path' => $file->store($validated['file'])
        ]);

        return response('File uploaded successfuly.', 201);  
    }

    public function show(Trip $trip, File $file)
    {   
        return response(File::find($file)->first()->toJson(JSON_PRETTY_PRINT), 302);
    }

    public function destroy(Trip $trip, File $file)
    {   
        $file = File::find($file)->first();
       
        $file->deleteFromStorage($file);
        $file->delete($file);
      
        return response('File deleted successfuly.', 200);
    }
}
