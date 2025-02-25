<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .button-container {
        display: flex;
        justify-content: center;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
    }
</style>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('CRUD Operation') }}
            </h2>
        </x-slot>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 button-container">
                <a href="{{ route('crud.create') }}">
                    <button class="button">Create Product</button>
                </a>
            </div>
        </div>


        <div class="font-sans overflow-x-auto flex items-center justify-center py-10 px-20">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            S.No.
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                    @foreach ($products as $product)
                    <tr class="border">
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ $product->name }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            {{ $product->description }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            <div class="">
                                <img src="{{ asset('images/' . $product->image) }}" class="w-24 h-24 rounded-xl object-cover shadow-md border-2 border-gray-200 hover:scale-110 transition-transform duration-300 ease-in-out">
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800">
                            <a href="{{ route('crud.edit',$product->id) }}">
                                <button class=" hover:text-xl text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 mr-4">
                                    Edit
                                </button>
                            </a>
                            <a href="{{ route('crud.delete',$product->id) }}">
                                <button class=" hover:bg-red-600 text-black font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </x-app-layout>
</body>

</html>