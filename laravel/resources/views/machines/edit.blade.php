<!DOCTYPE html>
<html>
<head>
    <title>Edit Machine</title>
</head>
<body>

<h1>Edit Machine</h1>

<form method="POST" action="/machines/{{ $machine->id }}">
    @csrf

    <div>
        Name
        <input
            type="text"
            name="machine_name"
            value="{{ $machine->machine_name }}">
    </div>

    <br>

    <div>
        Location
        <input
            type="text"
            name="location"
            value="{{ $machine->location }}">
    </div>

    <br>

    <button type="submit">
        Save
    </button>

</form>

</body>
</html>