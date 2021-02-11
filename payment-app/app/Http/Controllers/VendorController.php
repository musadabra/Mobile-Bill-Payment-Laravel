<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendor;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vendor = Vendor::get()->toJson(JSON_PRETTY_PRINT);
        return response($vendor, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->save();

        return response()->json([
            "message" => "Vendor record created"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $vendor = Vendor::find($id);
        // return response()->json($vendor);
        if (Vendor::where('id', $id)->exists()) {
            $vendor = Vendor::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($vendor, 200);
        } else {
            return response()->json([
                "message" => "Vendor not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $vendor = Vendor::find(1);

        // $vendor = '';

        // $vendor->save();
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
        if (Vendor::where('id', $id)->exists()) {
            $vendor = Vendor::find($id);

            $vendor->name = is_null($request->name) ? $vendor->name : $vendor->name;
            $vendor->email = is_null($request->email) ? $vendor->email : $vendor->email;
            $vendor->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Vendor not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Vendor::where('id', $id)->exists()) {
            $vendor = Vendor::find($id);
            $vendor->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Vendor not found"
            ], 404);
        }
    }
}
