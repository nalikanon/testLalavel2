<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Machine;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();

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
        $machine = Machine::find($id);

        $machine->machine_name = $request->machine_name;
        $machine->location = $request->location;

        $machine->save();

        return redirect('/machines');
    }
    public function create()
{
    return view('machines.create');
}

public function store(Request $request)
{
    Machine::create([
        'machine_name' => $request->machine_name,
        'location' => $request->location
    ]);

    return redirect('/machines');
}

public function destroy($id)
{
    Machine::destroy($id);

    return redirect('/machines');
}
}