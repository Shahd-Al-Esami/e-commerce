<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>E-commerce</title>
</head>
<body style="background-image: url(imgs/image.png);height:100vh;background-repeat: no-repeat;background-position: center;background-size: cover;">


@extends('layouts.header+footer') <!-- Ensure the header is included -->

@section('content')
<div class="row mx-0 mt-5">
    <div class="col-2"></div>
    <div class="col-8">


                    <div class="row mx-0 mt-5">
                        <h2 style="text-align: center">Welcome to Our Commerce</h2>
                        <div class="col-5"></div>
                        <div class="col-2">
                <a href="{{ route('products.index') }}" class="btn border-black mt-5">Display Products</a>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('categories.index') }}" class="btn border-black mt-5">Display Categories</a>
                                    </div>
                        <div class="col-5"></div>
                    </div>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-2">
        {{-- <form action="{{ route('userOrders') }}" method="GET">
            @csrf
            <button type="submit" style="background-color: red; border: none; color: white; padding: 10px 20px; cursor: pointer;">
                My Orders
            </button>
        </form> --}}
                </div>
</div>
@endsection



</body>
</html>

