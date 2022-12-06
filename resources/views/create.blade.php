<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel CRUD</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <h2 class="text-center pt-5 pb-5">Add Company Information </h2>
            <div class="pt-4 pb-4">
                <a href="{{ route('all.company') }}" class="btn btn-primary">Company List</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ route('store.company') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Company Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Company Mobile</label>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Company Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Company Logo</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </script>
</html>
