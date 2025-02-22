<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="mt-5" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center;">Create Post</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="title">title:</label>
                <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="price">Price:</label>
                <textarea id="price" name="price" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="amount">Amount:</label>
                <textarea id="amount" name="amount" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
            category:
            @foreach($categories as $category)
            <div>
            <input name="category_ids[]" class="form-check-input" type="checkbox" id="category_{{ $category->id }}" value="{{ $category->id }}"  >
            <label class="form-check-label" for="category_{{ $category->id }}">
            {{ $category->name }}
            </label>
            </div>
            @endforeach
            <br>
                <label class="mt-3 mb-3" for="image">Upload Image</label>
                <input type="file" name="path"  >

            <button type="submit" style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Create</button>
        </form>
    </div>
</body>
</html>
