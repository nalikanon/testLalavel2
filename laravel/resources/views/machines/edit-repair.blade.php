<h1>
    Update Repair Status
</h1>

<p>
    Issue :
    {{ $repair->issue }}
</p>

<form
    method="POST"
    action="/repairs/{{ $repair->id }}">

    @csrf

    <select name="status">

        <option
            value="pending"
            {{ $repair->status == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option
            value="in_progress"
            {{ $repair->status == 'in_progress' ? 'selected' : '' }}>
            In Progress
        </option>

        <option
            value="completed"
            {{ $repair->status == 'completed' ? 'selected' : '' }}>
            Completed
        </option>

    </select>

    <br><br>

    <button type="submit">
        Save
    </button>

</form>