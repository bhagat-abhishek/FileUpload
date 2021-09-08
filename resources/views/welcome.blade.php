<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header">
                Upload
            </div> 
            <div class="card-body">
                @if(Session::has('msg'))
                <div class="alert alert-success">{{ Session('msg') }}</div>
                @endif
            <!-- Form -->
                <form method="post" action="{{ route('submit') }}">
                    @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <br>
                <div class="form-group">
                    <input type="file" class="form-control" name="file">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <!-- Form -->
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <!-- CUSTOM SCRIPT FOR UPLOAD -->
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[name="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                }
            }
        });
    </script>
</body>
</html>