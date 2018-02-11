<!DOCTYPE html>
<html>
<head>
	<title>Load PDF</title>
	<style type="text/css">
	table{
		width: 100%;
		border:0px solid black;
	}

	td, th{
		border:0px solid black;
	}

</style>
</head>
<body>
	<table>
		<tr>
			<th colspan="2"><h2>{{$general_information->name}}</h2></th>
		</tr>
		<tr>
			<th colspan="2">
				<img src="{{asset($general_information->img)}}" alt="" style="width: 300px;">
			</th>
		</tr>
		
		@foreach ($ls_speciality as $speciality)
		<tr>
			<th>{{$speciality->title}}</th>
			<td>{{$speciality->subtitle}}</td>
		</tr>
		@endforeach
		
		
		@foreach ($ls_hobby as $hobby)
		<tr>
			<th>{{$hobby->name}}</th>
			<td></td>
		</tr>
		@endforeach		
		
		@foreach ($ls_job as $job)
		<tr>
			<th>{{$job->position}}</th>
			<td>{{$job->place}} {{$job->time_begin}} {{$job->time_end}}</td>
		</tr>
		@endforeach
		
		
		@foreach ($ls_qualification as $qualification)
		<tr>
			<th>{{$qualification->course}}</th>
			<td>{{$qualification->place}} {{$qualification->time_begin}} {{$qualification->time_end}}</td>
		</tr>
		@endforeach
		
		
		@foreach ($ls_skill as $skill)
		<tr>
			<th>{{$skill->name}}</th>
			<td>{{$skill->percent}}%</td>
		</tr>
		@endforeach
		
	</table>



</body>

</html>