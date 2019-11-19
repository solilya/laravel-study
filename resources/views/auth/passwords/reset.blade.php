@extends('layouts.mylayout')

@section('title','Ввод нового пароля')

@section('content')
<Form Action="{{ route('password.update') }}" Method=Post name=myform>
@csrf 
<input type="hidden" name="token" value="{{ $token }}">
@if (count($errors) > 0)
<ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
</ul>
@endif
<table border=0>
<tr><td valign="middle">
<table border=0>
<tr><td>{{ __('email') }}:</td>
<td><INPUT TYPE="text" NAME="email" SIZE="35" MAXLENGTH="35" value="{{ $email ?? old('email') }}"></td></tr>
<tr><td>Новый пароль:</td>
<td><input id="password" type="password" name="password" required ></td></tr>
<tr><td>Повторите пароль:</td>
<td><input id="password-confirm" type="password" name="password_confirmation" required ></td></tr>
</table>
</td><td>&nbsp;&nbsp;</td></tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" VALUE="Изменить пароль!">                           


</FORM>

@endsection
                                

