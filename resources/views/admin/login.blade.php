
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/bootstrap.min.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/animate.css">

<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/select2.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/util.css">
<link rel="stylesheet" type="text/css" href="{{ asset('loginasset') }}/main.css">

</head>
<body>
<div class="limiter">
<div class="container-login100" style="background-image: url('{{ asset('loginasset') }}/images/bg-01.jpg');">
<div class="wrap-login100  p-b-30">
<form class="login100-form validate-form" action="{{ url('admin') }}" method="post">
<div class="login100-form-avatar">
	{{ csrf_field() }}
<img src="{{ asset('') }}/{{ $log[0]->image }}" alt="AVATAR">
</div>
<span class="login100-form-title p-t-20 p-b-45">
{{ $log[0]->name }}

</span>

            
    <span class="login100-form-title p-0 ">           
@if(session()->has('wrong'))
                   <div class="alert alert-danger ">
                      {{ session()->get('wrong') }}
                   </div>
                @endif
                </span>
                 

            
            
<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">

<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-user"></i>
</span>
</div>
<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
<input class="input100" type="password" name="password" placeholder="Password" >
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock"></i>
</span>
</div>
<div class="container-login100-form-btn p-t-10">
<button class="login100-form-btn">
Login
</button>
</div>
<div class="text-center w-full p-t-25 ">

</div>

</form>
</div>
</div>
</div>

<script src="{{ asset('loginasset') }}/jquery-3.2.1.min.js" type="text/javascript" ></script>
<script type="text/javascript">
    $(function() {
     $(".alert").fadeOut(5000);
});
</script>
<script src="{{ asset('loginasset') }}/popper.js" type="text/javascript"></script>
<script src="{{ asset('loginasset') }}/bootstrap.min.js" type="text/javascript"></script>

<script src="{{ asset('loginasset') }}/select2.min.js" type="text/javascript"></script>

<script src="{{ asset('loginasset') }}/main.js" type="text/javascript"></script>






</body>

</html>
