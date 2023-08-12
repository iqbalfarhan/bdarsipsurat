<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="bg-base-200" data-theme="bumblebee">

    @auth
        <div class="drawer drawer-open">
            <input id="drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col flex-1 min-h-screen">
                @livewire('component.navbar')
                <div class="p-6">
                    {{ $slot }}
                </div>
                @livewire('component.logout')
            </div>
            <div class="drawer-side">
                <label for="drawer" class="drawer-overlay"></label>
                @livewire('component.sidebar')
            </div>
        </div>
    @else
        <div class="flex justify-center items-center h-screen bg-base-200">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @endauth


    @livewireScripts
</body>

</html>
