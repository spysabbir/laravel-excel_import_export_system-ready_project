<a href="{{ route('employee.export') }}">Employee Export</a>

<form action="{{ route('employee.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="import_file" class="form-label">Excel File</label>
        <input type="file" class="form-control" name="import_file" id="import_file">
    </div>
    <button type="submit">Import</button>
</form>
