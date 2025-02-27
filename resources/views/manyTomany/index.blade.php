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
                {{ __('Many to Many Relationship') }}
            </h2>
        </x-slot>

        <div class="font-sans overflow-x-auto px-40 py-10 ">
            <table class="min-w-full divide-y divide-gray-200 border ">
                <thead class="bg-gray-200 whitespace-nowrap">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Projects
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            name Assigned
                        </th>

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">

                    @foreach ($projects as $project )
                    <tr>
                        <td class="px-4 py-4 text-sm text-gray-800 border">
                            {{ $project->name }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-800 border">
                            <ul>
                                @foreach ($project->users as $user)
                                <li>{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



    </x-app-layout>
</body>

</html>