@if (app()->environment('local'))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <link rel="stylesheet" href="{{ asset('build/assets/app-7KWvDcDT.css') }}">
    <script src="{{ asset('build/assets/app-CEsE5a7F.js') }}" defer></script>
@endif