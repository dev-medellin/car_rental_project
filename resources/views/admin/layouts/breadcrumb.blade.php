<ol class="breadcrumb">
    <li><a href="{{ url('/admin/dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
    @if(session('previous_url'))
        <li><a href="{{ session('previous_url') }}">Previous Page</a></li>
    @endif
    <li class="active">@yield('title')</li>
</ol>
