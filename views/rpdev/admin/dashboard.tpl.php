{{$assets_rpdev/css/styles::css}}
{{$assets_rpdev/css/forms::css}}
{{$assets_rpdev/css/bootstrap::css}}
{{$assets_assets/js/bootstrap::js}}
{{$assets_rpdev/js/custom::js}}
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <link href="{{$baseUrl}}css/{{$uriKey}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container-fluid">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="{{$baseUrl}}admin/dashboard">RPDev Dashboard</a></h1>
	              </div>
	           </div>
	           <div class="col-md-2 pull-right">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
                                <li>
	                        <a href="{{$baseUrl}}admin/logout" >Logout</a>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li ">
                         <a href="{{$baseUrl}}admin/dashboard">
                            <i class="glyphicon glyphicon-home"></i> Home
                         </a>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                             <?php
                                foreach($pages as $plink => $page){
                                ?>
                                 <li><a href="{{$baseUrl}}admin/edit/{{$plink}}">{{$page}} <i class="glyphicon glyphicon-pencil pull-right"></i></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">

		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Welcome to Dashboard</div>
								
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				To start, please select a page to edit from sidebar menu.
					  			<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
                                <div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Rapid development class (v 0.0.2)</div>
								
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				Welcome to Rapid development class backend enviroment, from here you can manage content visible on your side, using a very sleek & intuitive interface!
					  			<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  	<div class="row">
		  		
		  	</div>

		  </div>
		</div>
    </div>

   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{$baseUrl}}js/{{$uriKey}}"></script>
  </body>
</html>