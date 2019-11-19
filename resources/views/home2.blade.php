@section('title')
Here Title section<br>
@show              
<BR>

home<BR>
{{ $word }}

@yield('city','moscow')<BR>
@include('contact', ['address'=>'mendeleevo'])
                           