{{$assets_rpdev/css/styles::css}}
{{$assets_rpdev/css/bootstrap::css}}
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{$baseUrl}}css/{{$uriKey}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
                                        <form action="{{$baseUrl}}admin/dashboard" method="post">
			                <input class="form-control" name="username" type="text" placeholder="Username">
			                <input class="form-control" name="password" type="password" placeholder="Password">
                                        <input type="hidden" name="token" value="{{$token}}">
			                <div class="action">
			                    <input type="submit" class="btn btn-primary signup" value="Login">
			                </div>           
                                        </form>
			            </div>
			        </div>

			        
			    </div>
			</div>
		</div>
	</div>



   
  </body>
</html>