
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login E-Laundry | </title>

<link href="{{ asset('assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="{{ asset('assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet">

<link href="{{ asset('assets') }}/vendors/animate.css/animate.min.css" rel="stylesheet">

<link href="{{ asset('assets') }}/build/css/custom.min.css" rel="stylesheet">
<meta name="robots" content="noindex, follow">
<script>(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];a.zarazData.c=e.cookie,s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),//
a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="login">
<div>
<a class="hiddenanchor" id="signup"></a>
<a class="hiddenanchor" id="signin"></a>
<div class="login_wrapper">
<div class="animate form login_form">
<section class="login_content">
<form method="post" action="/">
    @csrf
<h1>Login Form</h1>
<div>
<input type="text" class="form-control" placeholder="email" required="" name="email" />
</div>
<div>
<input type="password" class="form-control" placeholder="Password" required="" name="password" />
</div>
<div>
<button class="btn btn-default" type="sumbit" href="index.html">Log in</button>
<a class="reset_pass" href="#">Lost your password?</a>
</div>
<div class="clearfix"></div>
<div class="separator">
<p class="change_link">New to site?
<a href="#signup" class="to_register"> Create Account </a>
</p>
<div class="clearfix"></div>
<br />
<div>
<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
</div>
</div>
</form>
</section>
</div>
<div id="register" class="animate form registration_form">
<section class="login_content">
<form>
<h1>Create Account</h1>
<div>
<input type="text" class="form-control" placeholder="Username" required="" />
</div>
<div>
<input type="email" class="form-control" placeholder="Email" required="" />
</div>
<div>
<input type="password" class="form-control" placeholder="Password" required="" />
</div>
<div>
<a class="btn btn-default submit" href="index.html">Submit</a>
</div>
<div class="clearfix"></div>
<div class="separator">
<p class="change_link">Already a member ?
<a href="#signin" class="to_register"> Log in </a>
</p>
<div class="clearfix"></div>
<br />
<div>
<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
</div>
</div>
</form>
</section>
</div>
</div>
</div>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6d2ec5fa08f1355b","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>
