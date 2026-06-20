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

public function repairHistory($id)
{
    $machine = DB::table('machines')
        ->where('id', $id)
        ->first();

    $repairs = DB::table('repair_requests')
        ->where('machine_id', $id)
        ->get();

    return view(
        'machines.repairs',
        compact('machine', 'repairs')
    );
}

public function createRepair($id)
{
    $machine = DB::table('machines')
        ->where('id', $id)
        ->first();

    return view(
        'machines.create-repair',
        compact('machine')
    );
}

public function storeRepair(Request $request, $id)
{
    DB::table('repair_requests')
        ->insert([
            'machine_id' => $id,
            'issue' => $request->issue,
            'status' => 'pending'
        ]);

    return redirect(
        "/machines/$id/repairs"
    );
}

public function editRepair($id)
{
    $repair = DB::table('repair_requests')
        ->where('id', $id)
        ->first();

    return view(
        'machines.edit-repair',
        compact('repair')
    );
}

public function updateRepair(Request $request, $id)
{
    $repair = DB::table('repair_requests')
        ->where('id', $id)
        ->first();

    DB::table('repair_requests')
        ->where('id', $id)
        ->update([
            'status' => $request->status
        ]);

    return redirect('/machines/' . $repair->machine_id . '/repairs');
}
}