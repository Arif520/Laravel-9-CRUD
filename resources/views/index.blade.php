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
            <h2 class="text-center pt-5 pb-5">Laravel CRUD </h2>
            <div class="pt-4 pb-4">
                <a href="{{ route('add.company') }}" class="btn btn-primary">Add New Company</a>
            </div>
            <div class="card-body">
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ route('company.search') }}" method="GET">
                     <input type="text" name="search" required/>
                     <button type="submit" class="btn btn-info btn-sm">Search</button>
                  </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th class="text-center">Name</th> 
                          <th class="text-center">Email</th>
                          <th class="text-center">Mobile</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key=>$companyInfo)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td class="text-center">{{ $companyInfo->name }}</td>
                            <td class="text-center">{{ $companyInfo->email }}</td>
                            <td class="text-center">{{ $companyInfo->mobile }}</td>
                            <td class="text-center">{{ $companyInfo->address }}</td>
                            <td class="text-center">
                                <img src="{{ asset('image/company/'.$companyInfo->image) }}" style="width: 100px">
                            </td>
                            <td class="text-center">
                              <a class="btn btn-success btn-sm" href="{{ route('edit.company',$companyInfo->id) }}">Edit</a>
                              <a class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete')" href="{{ route('delete.company',$companyInfo->id) }}">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                  {{ $dataPaginate->links() }}
            </div>
        </div>
    </body>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </script>
</html>
