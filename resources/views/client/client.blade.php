<!DOCTYPE html>
<html lang="en">

@include('client.template.head')

<body data-spy="scroll">
    <div id="app">

        @include('client.template.navbar')
        <!-- Page Content -->
        <section class="container blog">
            @include('client.template.error')
            @yield('breadcrumb')
            @yield('content')
        </section>
        @include('client.template.footer')
    </div>
    @include('client.template.script')
</body>

</html>