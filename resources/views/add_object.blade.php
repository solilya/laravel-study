<HTML>
<HEAD>
<TITLE>Управление Объектами</TITLE>
<script>
function validate(){
 if (document.myform.chop_id.value =='')
    { 
    	alert('Невозможно создать объект: требуется выбрать ЧОП!');
    	return false;
    }     
    else
    { document.myform.submit(); }
}
</script>
</HEAD>

<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<H2>Создание Объекта</H2>
<Form Action="object.php" Method=Post name=myform >
@csrf 
<table border=0>
<tr><td valign="middle">
<table border=0>
<tr><td>Название :</td>
<td><INPUT TYPE="text" NAME="name" SIZE="35" MAXLENGTH="255"></td></tr>
<tr><td>ЧОП</td><td>
<select name="chop_id">
<option value="" selected="selected">-- выберете ЧОП --</option>

@foreach ($chopp as $c)
	<option value='{{ $c->id }}'>{{ $c->name }}</option>
@endforeach	

</select></td></tr>
<tr><td>Адрес:</td>
<td><INPUT TYPE="text" NAME="address" SIZE="35" MAXLENGTH="255"></td></tr>
<tr><td>Номер объекта:</td>
<td><INPUT TYPE="text" NAME="obj_id" SIZE="20" MAXLENGTH="20"></td></tr>
<tr><td>Пультовый объекта:</td>
<td><INPUT TYPE="text" NAME="pult_id" SIZE="20" MAXLENGTH="20"></td></tr>
</table>
</td><td>&nbsp;&nbsp;</td><td valign="middle">
</table>
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="button" VALUE="Добавить!" onClick="validate()">
&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="button"  VALUE="Управление Объектами" onClick="JavaScript:document.myform.action.value='print_menu';submit()">
<input type=hidden name="action" value="add" >
</FORM>
</BODY>
</HTML>