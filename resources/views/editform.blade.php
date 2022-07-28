


<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form</title>
</head>

<body>
<form action="{{route('update')}}" method="POST" >
    @csrf



   <input type="hidden" id="id" name="id" value="{{$Employee->id}}">
<p>Name *</p>
<p><input maxlength="50" name="name"  value="{{$Employee->name}}"     size="30" type="text" /></p>

<p>email *</p>
<p><input maxlength="50" name="email" value="{{$Employee->email}}" size="30" type="text" /></p>

<p>Telephone</p>
<p><input maxlength="30" name="number" value="{{$Employee->number}}"size="30" type="tel" /></p>


<!-- <p>image *</p>

<p><input maxlength="80" name="imge" value="{{$Employee->image}}"size="30" type="file" /></p>


 -->

<p><input type="submit" value="Submit" /></p>
</form>
<a href="{{url('/employee/add')}}"><button type="button" class="btn btn-primary"> GO BACK </button> </a>
</body>
</html>

