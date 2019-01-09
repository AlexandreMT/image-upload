<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload and Crop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app"><br>
        <div class="container col-lg-offset-4 col-lg-4">
            <div class="row">
                <form action="{{ route('upload') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field()  }}
                    <input type="file" name="image">
                    <img src="/storage/alexandre.jpg" alt="image">
                    <input type="submit" value="upload" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>
    
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>