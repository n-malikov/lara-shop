<!DOCTYPE html>
<html lang="ru-RU">
@include('layouts.head')
<body>

@include('layouts.menu')

<div class="container">
    <div class="content">

        @if(session()->has('success'))
            <div class="message message__success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="message message__warning">
                {{ session()->get('warning') }}
            </div>
        @endif

        @yield('content')

    </div>
</div>

</body>
</html>
