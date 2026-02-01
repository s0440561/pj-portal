<!DOCTYPE html>
<html class="light" lang="th">

<head>
    @include('layouts.partials.head')
</head>

<body class="bg-gradient-to-b from-gradient-start to-gradient-end min-h-screen text-[#101518] antialiased">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">

        @include('layouts.partials.header')

        @include('layouts.partials.navbar')

        <main class="flex-1">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
    @stack('scripts')
</body>

</html>