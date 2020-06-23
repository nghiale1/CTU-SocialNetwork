<!DOCTYPE html>
<html lang="en">

@include('client.template.head')

<body data-spy="scroll">
    <div id="app">

        @include('client.template.navbar')
        @include('client.template.error')

        @yield('content')

        @include('client.template.footer')
    </div>
    @include('client.template.script')
</body>

</html>