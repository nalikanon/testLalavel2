<!DOCTYPE html>
<html>
<head>
    <title>Machines</title>
</head>
<body>

<h1>Machine List</h1>
<a href="/machines/create">
    Add Machine
</a>

<br><br>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Location</th>
        <th>Action</th>
    </tr>

    @foreach($machines as $machine)
    <tr>
        <td>{{ $machine->id }}</td>
        <td>{{ $machine->machine_name }}</td>
        <td>{{ $machine->location }}</td>
        <td>

    <a href="/machines/{{ $machine->id }}/repairs">
        Repair History
    </a> | 

    <a href="/machines/{{ $machine->id }}/edit">
        Edit
    </a>

    <form
        method="POST"
        action="/machines/{{ $machine->id }}/delete"
        style="display:inline">

        @csrf

        <button type="submit">
            Delete
        </button>

    </form>

</td>
    </tr>
    @endforeach

</table>

</body>
</html>