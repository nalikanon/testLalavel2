<!DOCTYPE html>
<html>
<head>
    <title>Create Machine</title>
</head>
<body>

<h1>Add Machine</h1>

<form method="POST" action="/machines">
    @csrf

    <div>
        Machine Name
        <input type="text" name="machine_name">
    </div>

    <br>

    <div>
        Location
        <input type="text" name="location">
    </div>

    <br>

    <button type="submit">
        Save
    </button>

</form>

</body>
</html>