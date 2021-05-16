<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('name', 'ASC')->paginate(50);
        return view('admin.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);
        $unit = new Unit;
        $unit->name = $request->name;
        if ($unit->save()) {
            return redirect()->route('admin.units.index')->with('success', 'Unit Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('admin.units.edit', compact('unit'));
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
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);
        $unit = Unit::find($id);
        $unit->name = $request->name;
        if ($unit->save()) {
            return redirect()->route('admin.units.index')->with('success', 'Unit Update Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong !');
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
        try {
            $unit = Unit::find($id);
            if ($unit) {
                if ($unit->delete()) {
                    $result = ['message' => "Unit Deleted Successfully", 'data' => [], 'status' => true];
                    return response($result, 200);
                } else {
                    $result = ['message' => "Something Went Wrong", 'data' => [], 'status' => false];
                    return response($result, 200);
                }
            } else {
                $result = ['message' => "Unit Data Not Found...", 'data' => [], 'status' => false];
                return response($result, 200);
            }
        } catch (Exception $e) {
            $result = ['message' => $e->getMessage(), 'status' => false];
            return response($result, 200);
        }
    }
}
