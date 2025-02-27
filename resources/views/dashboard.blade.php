<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 button-container">
                <a href="{{ route('crud.index') }}">
                   <button class="button">View Crud</button>
                </a>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 button-container">
                <a href="{{ route('manyTomany.index') }}">
                   <button class="button">View Many-to-Many</button>
                </a>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
