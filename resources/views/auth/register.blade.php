<HTML>
<HEAD>
<TITLE>Авторизация в системе</TITLE>
</HEAD>

<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<H2>Авторизация в системе</H2>

@if (count($errors) > 0)
<ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
</ul>
@endif


<Form Action="{{ route('register') }}" Method=Post name=myform>
@csrf 
<table border=0>
<tr><td valign="middle">
<table border=0>
<TR><TD>Имя: </td><td><input type="text" name="name" value="{{ old('name') }}"></td></tr>
@error('email')<TR><TD  colspan=2>{{ $message }}</td></tr>@enderror
<tr><td>email:</td>
<td><INPUT TYPE="text" NAME="email" SIZE="35" MAXLENGTH="25" value="{{ old('email') }}"></td></tr>
<tr><td>Пароль:</td>
<td><INPUT TYPE="password" NAME="password" SIZE="35" MAXLENGTH="10"></td></tr>
<tr><td>Повторите пароль:</td>
<td><INPUT TYPE="password" NAME="password_confirmation" SIZE="35" MAXLENGTH="10"></td></tr>
</table>
</td><td>&nbsp;&nbsp;</td><td valign="middle">
</table>
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" VALUE="Войти!">
<input type=hidden name="action" value="register" >
</FORM>
</BODY>
</HTML>
