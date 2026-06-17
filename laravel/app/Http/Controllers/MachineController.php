<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    public function index()
    {
        $machines = DB::table('machines')->get();

        return view('machines.index', compact('machines'));
    }

    public function edit($id)
    {
        $machine = DB::table('machines')
            ->where('id', $id)
            ->first();

        return view('machines.edit', compact('machine'));
    }

    public function update(Request $request, $id)
    {
        DB::table('machines')
            ->where('id', $id)
            ->update([
                'machine_name' => $request->machine_name,
                'location' => $request->location
            ]);

        return redirect('/machines');
    }
    public function create()
{
    return view('machines.create');
}

public function store(Request $request)
{
    DB::table('machines')->insert([
        'machine_name' => $request->machine_name,
        'location' => $request->location
    ]);

    return redirect('/machines');
}

public function destroy($id)
{
    DB::table('machines')
        ->where('id', $id)
        ->delete();

    return redirect('/machines');
}
}