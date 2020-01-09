<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="http://192.168.2.12/arc/laravel/test/public/js/app.js"></script>


</head>
<body>


<script>



var channel = Echo.channel('test');

channel.listen('.TestEvent', function(data) {
        console.log(data);
  alert(JSON.stringify(data));
       	 $('#info').html(JSON.stringify(data)); 
});    
</script>

name: {{ $name }}<br>
num: {{ $number }} <BR>
flash {{ session('status') }}<BR>

<div class="info" id="info">12</div>
<div id='app'></div>
</body>
</html>