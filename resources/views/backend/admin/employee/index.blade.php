<a href="{{ route('employee.export') }}">Employee Export</a>




<h2>User Import</h2>
@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <div>
        Errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('employee.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="import_file" class="form-label">Excel File</label>
        <input type="file" class="form-control" name="import_file" id="import_file">
    </div>
    <br>
    <button type="submit">Import</button>
</form>

<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_employee as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

