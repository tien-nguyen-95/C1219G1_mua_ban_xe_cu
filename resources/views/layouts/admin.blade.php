@include('patials.admin.head')

@include('patials.admin.sidebar')

@include('patials.admin.navbar')

<div class="container-fluid" id="body">
    @yield('content')
</div>
@include('patials.admin.foot')
