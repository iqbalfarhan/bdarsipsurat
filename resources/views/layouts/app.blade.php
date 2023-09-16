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

<body data-theme="light">
    
    @auth
    <div class="drawer lg:drawer-open">
        <input id="drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content bg-base-200 flex flex-col flex-1 min-h-screen overflow-x-auto">
            @livewire('component.navbar')
            <div class="w-full max-w-7xl p-6 mx-auto">
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
    <div class="flex justify-center items-center h-screen bg-opacity-30" style="background-image: url('{{ Storage::url('bgbatikloop.png') }}')">
        <div class="card w-96 bg-base-100 shadow-2xl">
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    @endauth
    
    
    @livewireScripts
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <x-livewire-alert::scripts />
</body>

</html>
