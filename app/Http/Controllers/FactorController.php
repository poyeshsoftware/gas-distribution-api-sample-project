<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactorRequest;
use App\Http\Resources\FactorResource;
use App\Models\Factor;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @group Factor endpoints
 */
class FactorController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return FactorResource::collection(
            Factor::with('user', 'categories', 'vehicles', 'drivers', 'images')
                ->orderBy('id', 'DESC')->get()
        );
    }

    public function update($id, FactorRequest $request)
    {
        // update factors within Images or just data.
        $factor = Factor::where('id', $id)->first();
        if ($factor) {
            $factor->update($request->validated());
            $factor->drivers()->sync($request->driver_ids);
            $factor->vehicles()->sync($request->vehicle_ids);
            $factor->categories()->sync($request->category_ids);
            if ($request->file('images')) {
                foreach ($request->file('images') as $image) {
                    $extension = $image->getClientOriginalExtension();
                    if ($extension == "jpg" || $extension == 'jpeg' || $extension == 'png') {
                        $img_name = time() . md5($image->getClientOriginalName()) . "." . $extension;
                        $image->move('factor_images', $img_name);
                        $factor->images()->create(['name' => $img_name]);
                    }
                }
            }
        }

        return (new FactorResource($factor->load('user', 'categories', 'vehicles', 'drivers', 'images')));
    }

    public function new(FactorRequest $request)
    {
        $factor = $request->user()->factors()->create($request->validated());
        $factor->drivers()->sync($request->driver_ids);
        $factor->vehicles()->sync($request->vehicle_ids);
        $factor->categories()->sync($request->category_ids);
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                if ($extension == "jpg" || $extension == 'jpeg' || $extension == 'png') {
                    $img_name = time() . md5($image->getClientOriginalName()) . "." . $extension;
                    $image->move('factor_images', $img_name);
                    $factor->images()->create(['name' => $img_name]);
                }
            }
        }

        $factor->date = date("Y-m-d H:i:s");
        return (new FactorResource($factor->load('user', 'categories', 'vehicles', 'drivers', 'images')));
    }

    public function remove($id)
    {
        Factor::where('id', $id)->delete();

        return response()->json([
            'error' => 0,
            'message' => 'Operation Successful',
        ]);

    }

}
