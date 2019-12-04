<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Chop;
use App\Object1;

class object extends Controller
{

	public function index(Request $request)
	{		
	
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$action=$_REQUEST['action'] ?? null; 
if (!isset($action)) {$action='print_menu';}



require("/var/www/html/modules/config.php");
require("/var/www/html/arc/combat_config.php");
#require("/var/www/html/arc/auth.php");

$db->select_db("combat") or die("<p>Ошибка при выборе базы данных combat: " . mysql_error() . "</p>");



	if ($action  =='print_menu') { $this->Print_menu($db);} 
	if ($action  =='add_form'){  $this->myAuth('admin'); return $this->Add_form($db); }	
	if ($action  =='add'){ 	$this->myAuth('admin'); return $this->Add($db, $request); }
	if ($action  =='del_object_form'){ $this->myAuth('admin'); return $this->Del_object_form($db); }	
	if ($action  =='del_object'){ $this->myAuth('admin'); return $this->Del_object($db); }	
	if ($action  =='login_form'){ return view('auth.login'); }
	if ($action  =='login'){ Login($db); }
	if ($action  =='logout'){ Logout($db); }


mysqli_close($db);

}

function myAuth($rights)
{
	if (Gate::allows('check_rights',$rights)) return;
	else
	{
		$error="у Вас недостаточно прав для работы с этой частью программы";
		return view('auth.login');		
	}
}

function Print_menu($db,$username='')
{

	
print <<<END
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML>
<HEAD>
<TITLE>Управление Объектами</TITLE>
</HEAD>

<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<H2>Управление Объектами</H2>

<a href="object.php?action=add_form">Создать объект</a>
<br><a href="object.php?action=del_object_form">Удалить объект</a>
<BR>
<br><a href="combat.php">Терминал тревог</a>
<!-- <br><a href="licence.php?action=edit_form">Изменить объект</a>
<br><a href="licence.pl?action=view">Просмотр объектов</a>
<br> -->

</BODY>
</HTML>
END
;
}


function Add_form($db)
{
//	$chopp = DB::select('select * from Chop');
	
	$chopp= Chop::all();
    return view('add_object')->with(compact('chopp'));
}

function Add($db, Request $request)
{
	
	$id=random_int(1,2147483640);
	while (Object1::find($id))
	{ 
		$id=random_int(1,2147483640);		
	}
	
	 $fields=$request->only(['name','address','obj_id','pult_id','chop_id']);
	 $fields['id']=$id;
	 $obj = Object1::create($fields);
	 if ($row=Object1::find($id))

/*
	$sth = $db->prepare("select id from Object where id=$id") or die ('Can not prepare sql query: "' .  mysqli_error($db).'"'); 	
 	if (!$sth->execute()) { die('Can not check id for Object!"' .  mysqli_error($db).'"');	}
 	$result=$sth->get_result();
	$row=$result->fetch_assoc();		
		
	while ($row['id']==$id)
	{
		$id=random_int(1,2147483640);	
	 	if (!$sth->execute()) { die('Can not check id for Object!"' .  mysqli_error($db).'"');	}
	 	$result=$sth->get_result();
		$row=$result->fetch_assoc();
	}
	
	
	$sth = $db->prepare("INSERT INTO Object (id,name ,address,obj_id,pult_id,chop_id ) values (?,?,?,?,?,?)") or die ("Can not prepare sql query for inserting object".  mysqli_error($db)."!"); 	
	$sth->bind_param("issssi",$id, $input['name'],$input['address'],$input['obj_id'],$input['pult_id'],$input['chop_id']);
 	if (!$sth->execute()) { die("Can not add Object!");	}		
 	

	$sth->prepare("Select Object.name as name,address,obj_id,pult_id,Chop.name as chop_name from Object,Chop	where Object.id=$id and Object.chop_id=Chop.id");
	if (!$sth->execute()) { die("Error:".  mysqli_error($db)."!");	}	
	$result=$sth->get_result();
	if ($row=$result->fetch_assoc()) 
*/

	{   
		print <<<END
<HTML>
<HEAD>
<TITLE>Управление Объектами</TITLE>
</HEAD>
<BODY BACKGROUND="" BGCOLOR="#C0c0c0" TEXT="#000000" LINK="#0000ff" VLINK="#800080" ALINK="#ff0000">
<b>Добавлена информация:</b>
<table border=0>
<tr><td>Объект:</td>
<td>{$row['name']}</td></tr>
<tr><td>ЧОП:</td>
<td>{$row['chop']->name}</td></tr>
<tr><td>Адрес:</td>
<td>{$row['address']}</td></tr>
<tr><td>Номер объекта:</td>
<td>{$row['obj_id']}</td></tr>
<tr><td>Пультовой номер:</td>
<td>{$row['pult_id']}</td></tr>
</table>
<br>
<A HREF="object.php?action=add_form">Добавить еще</A>&nbsp;&nbsp;&nbsp;&nbsp;
<A HREF="object.php?action=print_menu">Управление объектами</A>
</body>
</html>
END
; 	 			
	}	

}


function Del_object_form($db)
{
	$input=$_POST;
	
#	$obj_list = DB::table('Object')->get();
#	$obj_list=Object1::all();
	$obj_list=Object1::paginate(2);
	return view('del_object_form')->with(compact('obj_list'));
}



function Del_object($db)
{
	$input=$_POST;
	if (isset($input['id']))
	{			
		Object1::destroy($input['id']);	
	}
	return $this->Del_object_form($db);	
}

}
?>