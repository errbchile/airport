<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>{{$title}}</title>
 <style type="text/css">
	footer {
		text-align: center;
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 33px;
		color: #989595;
		font-size: 11px;
	}
 </style>
</head>
<body>
	<div align="center">
	<img src="{{url('/app-assets/img/logos/logo.gif')}}">
	<h1>{{$heading}}</h1>

	
	@foreach ($content as $nombre => $valor)
		<p><b>{{$nombre}}:</b> {{$valor}}</p>
	@endforeach
	</div>
	<footer>
	  Informe generado el {{date('d/m/Y')}} a las {{date('H:i')}} hrs. por el usuario {{fullname(Auth::user()->id)}} desde FlightSys &copy; Derechos Reservados.
	</footer>
</body>
</body>
</html>