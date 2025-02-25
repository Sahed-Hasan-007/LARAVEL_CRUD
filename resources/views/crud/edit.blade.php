<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>

</head>

<body>

    @if ($message= Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="container flex items-center justify-center mt-10">
        <form method="POST" action="{{ route('crud.update',$product->id) }}" class="space-y-4 font-[sans-serif] max-w-md mx-auto" enctype="multipart/form-data">
        <h1 class="text-2xl font-bold mb-4">Edit Product #{{ $product->id  }}</h1>
            @csrf
            @method('PUT')
            <input type="text" placeholder="Enter your name" name="name" value="{{ old('name',$product->name) }}"
                class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" />
            @if ($errors->has('name'))
            <span class="text-red-500">{{ $errors->first('name')  }}</span>
            @endif

            <input type="text" placeholder="Description" name="description" value="{{ old('description',$product->description) }}"
                class="px-4 py-8 bg-gray-100 w-full text-sm outline-none border-b-2 border-transparent focus:border-blue-500 rounded" />
            @if ($errors->has('description'))
            <span class="text-red-500">{{ $errors->first('description')  }}</span>
            @endif

            <input type="file" name="image"
                class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
            @if ($errors->has('image'))
            <span class="text-red-500">{{ $errors->first('image')  }}</span>
            @endif

            <button type="submit"
                class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer">Submit</button>
        </form>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 button-container flex justify-center mt-8">
        <a href="{{ route('crud.index') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-2xl shadow-lg transition duration-300 ease-in-out transform hover:scale-105 cursor-pointer">
                View Product
            </button>
        </a>
    </div>

</body>

</html>