<h1>
    Add Repair Request
</h1>

<p>
    Machine :
    {{ $machine->machine_name }}
</p>

<form
    method="POST"
    action="/machines/{{ $machine->id }}/repairs">

    @csrf

    <textarea
        name="issue"
        rows="5"
        cols="50">
    </textarea>

    <br><br>

    <button type="submit">
        Save
    </button>

</form>