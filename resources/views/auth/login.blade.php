<HTML>
<HEAD>
<TITLE>Авторизация в системе</TITLE>
</HEAD>

<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<H2>Авторизация в системе</H2>

<Form Action="{{ route('login') }}"" Method=Post name=myform>
@csrf 
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
<tr><td>{{ __('email') }}:</</td>
<td><INPUT TYPE="text" NAME="email" SIZE="35" MAXLENGTH="35"  value="{{ old('email') }}"></td></tr>
<tr><td>Пароль:</td>
<td><INPUT TYPE="password" NAME="password" SIZE="35" id="password" MAXLENGTH="`10"></td></tr>
</table>
</td><td>&nbsp;&nbsp;</td><td valign="middle">
</table><BR>
<input type="checkbox" name="remember">запомнить меня<BR>
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" VALUE="Войти!">
<input type=hidden name="action" value="login" >
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                                @endif


</FORM>



</BODY>
</HTML>


