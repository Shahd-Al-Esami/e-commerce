<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>product</title>
</head>
<body>


    @if (session('alert'))
        <div class="alert alert-warning">
            {{ session('alert') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
{{-- {{ dd($products) }} --}}
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add New product</a>
            <a href="{{ route('showDeletedItems') }}" class="btn btn-primary">show deleted items</a>
            <a href="{{route('welcome') }}" class="btn btn-primary border-black mt-5">back</a>


        </div>

        <div class="container">
            <h1 class="mt-5">Search : Enter Category</h1>
            <form class="mt-3" method="get" action="{{ route('products.index') }}">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                         <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Go Back</a>

                    </div>
                </div>
            </form>
        </div>
        <div class="row mx-0" style="display:flex;padding:10px;">


            {{-- {{ dd($products) }} --}}
     @foreach($products as $product)

        <div class="card col-4 m-2 shadow-sm" style="width: 18rem;"> <!-- Added shadow for depth -->

            <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $product->path) }}" alt="Post Image" /> <!-- Improved image styling -->
            <div class="card-body">
                <h5 class="card-title">title {{ $product->title }}</h5> <!-- Removed 'title :' for cleaner look -->
                <h6 class="card-subtitle mb-2 text-muted">description {{ $product->description }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">price {{ $product->price }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">amount {{ $product->amount }}</h6>
                Categories:

                @foreach($product->categories as $category)

                <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label">
                    {{ $category->name }}
                </label>
                @endforeach





                 <div class="d-flex justify-content-between mt-3"> <!-- Flexbox for action buttons -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                    <form action="{{ route('products.destroy',$product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button> <!-- Changed button style -->
                    </form>

                    <form action="{{ route('forceDelete',$product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm">Force Delete</button> <!-- Changed button style -->
                    </form>

                <div id="order-container">
                <form action="{{ route('orders.create',$product->id) }}" method="POST">
                    @csrf
                    <button id="add-order" type="submit" class="btn btn-danger btn-sm">Order</button> <!-- Changed button style -->
                </form>
                <div id="order-list"></div>
            </div>
            </div>
        </div>  </div>
        @endforeach






            </div>
        </div>



        </div>
        </div>

{{--
        @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    </body>




</html>
