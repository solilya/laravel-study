 <HTML>
<HEAD>
<TITLE>Управление Объектами</TITLE>
</HEAD>

<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<Form Action="object.php" Method=Post name=myform>
{{ csrf_field() }}
<table cellspacing=0 border=0 bgcolor=#CCCCCC>
<tr ><td colspan=3>
<h2>Удаление объектов</h2>
</td></tr>
@foreach ($obj_list as $obj)
<tr><td bgcolor=#DDDDDD><font color='purple'>{{ $obj->name }}&nbsp;&nbsp;</font></td><TD bgcolor=#DDDDDD>{{ $obj->obj_id }} &nbsp;&nbsp;</td><td valign=left><INPUT TYPE='checkbox' NAME='id[]' VALUE='{{ $obj->id }}'></td></tr>
@endforeach		

<tr><td colspan=3">
{{ $obj_list->appends(['action' => 'del_object_form'])->links() }}
<br>
<br>
<center><INPUT TYPE="submit" VALUE="Удалить">&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="reset" VALUE="Очистить"> &nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="button"  VALUE="Управление Объектами" onClick="JavaScript:document.myform.action.value='print_menu';submit()"></center>
<input type=hidden name=action value=del_object>
</td></tr>
</table>
</FORM>
</body>
</html>