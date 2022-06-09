<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

/**
 * @group Vehicle endpoints
 */
class VehicleController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return VehicleResource::collection(Vehicle::get());
    }

    public function update($id, VehicleRequest $request)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        if ($vehicle) {
            $vehicle->update($request->validated());
        }

        return (new VehicleResource($vehicle));
    }

    public function new(VehicleRequest $request)
    {
        return (new VehicleResource(Vehicle::create($request->validated())));
    }

    public function remove($id)
    {
        Vehicle::where('id', $id)->delete();

        return response()->json([
            'error' => 0,
            'message' => 'Operation Successful',
        ]);

    }
}
