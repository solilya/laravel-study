@extends('layouts.mylayout')

@section('title','Сброс пароля')

@section('content')
<Form Action="{{ route('password.email') }}" Method=Post name=myform>
@csrf 


@if (session('status'))
{{ session('status') }}
@endif


@error('email')
<ul>
   <li>{{ $message }}</li>
</ul>
@enderror

<table border=0>
<tr><td valign="middle">
<table border=0>
<tr><td>{{ __('email') }}:</</td>
<td><INPUT TYPE="text" NAME="email" SIZE="35" MAXLENGTH="35"  value="{{ old('email') }}"></td></tr>
</table>
</td><td>&nbsp;&nbsp;</td><td valign="middle">
</table><BR>
<INPUT TYPE="submit" VALUE="Сбросить пароль!"> 

</FORM>
@endsection

