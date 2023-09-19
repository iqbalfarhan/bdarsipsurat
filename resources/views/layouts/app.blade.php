<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ url('images/simpatik logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    
    @livewireStyles
</head>

<body data-theme="light">
    
    @auth
    <div class="drawer lg:drawer-open">
        <input id="drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content bg-base-200 flex flex-col flex-1 min-h-screen overflow-x-auto">
            @livewire('component.navbar')
            <div class="w-full max-w-7xl p-6 mx-auto overflow-x-auto">
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
    <div class="flex justify-center items-center h-screen bg-base-200" style="background-image: url('{{ url('images/bgrelic.png') }}')">
        <div class="card bg-base-100 shadow-2xl w-full max-w-5xl flex flex-row overflow-hidden m-6 lg:m-0">
            <div class="card-body flex-1 py-24">
                {{ $slot }}
            </div>
            <div class="card-body backdrop-blur-3xl bg-neutral flex-1 hidden lg:flex justify-between">
                <div class="avatar">
                    <div class="w-24 mask mask-squircle bg-base-100 p-4 shadow-2xl">
                        <img src="{{ url('images/simpatik logo.png') }}" alt="" class="w-24" />
                    </div>
                </div>

                
                <div class="text-neutral-content">
                    <h3 class="text-2xl">{{ config('app.name') }}</h3>
                    <div>sistem informasi</div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    
    
    @livewireScripts
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <x-livewire-alert::scripts />
</body>

</html>
