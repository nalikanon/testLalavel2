<h1>Repair History: {{ $machine->machine_name }}</h1>

<a href="/machines/{{ $machine->id }}/repairs/create">
    Add Repair Request
</a> | 
<a href="/machines">
    Back to Machines
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Issue</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($repairs as $repair)
    <tr>
        <td>{{ $repair->issue }}</td>
        <td>{{ $repair->status }}</td>
        <td>
            <a href="/repairs/{{ $repair->id }}/edit">
                Update Status
            </a>
        </td>
    </tr>
    @endforeach
</table>