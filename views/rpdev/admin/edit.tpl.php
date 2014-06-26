{{$assets_rpdev/css/styles::css}}
{{$assets_rpdev/css/forms::css}}
{{$assets_rpdev/css/bootstrap::css}}
{{$assets_assets/js/bootstrap::js}}
{{$assets_rpdev/js/custom::js}}

{{$assets_rpdev/vendors/form-helpers/css/bootstrap-formhelpers.min::css}}
{{$assets_rpdev/vendors/select/bootstrap-select.min::css}}
{{$assets_rpdev/vendors/tags/css/bootstrap-tags::css}}


    {{$assets_rpdev/js/forms::js}}
    {{$assets_rpdev/js/forms::js}}
    {{$assets_vendors/wizard/jquery.bootstrap.wizard.min::js}}
    {{$assets_vendors/bootstrap-datetimepicker/datetimepicker::css}}
    {{$assets_vendors/bootstrap-datetimepicker/bootstrap-datetimepicker::js}}
    {{$assets_vendors/mask/jquery.maskedinput.min::js}}
    {{$assets_vendors/moment/moment.min::js}}
    {{$assets_vendors/tags/js/bootstrap-tags.min::js}}
    {{$assets_vendors/select/bootstrap-select.min::js}}
    {{$assets_vendors/form-helpers/js/bootstrap-formhelpers.min::js}}

<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

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
                                    
	  				<div class="col-md-8">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
                                                           
					            <div class="panel-title">{{$name}}</div>
                                                                   
					        </div>
			  				<div class="panel-body">
                                                            
			  					<form class="form-horizontal" action="{{$baseUrl}}admin/edit/push/{{$name}}" method="post" role="form">
								  <?php
                                                                    foreach($sections as $title => $section){
                                                                 ?>
								  <div class="form-group">
								    <label class="col-sm-2 control-label">{{$title}}</label>
								    <div class="col-sm-10">
								      <textarea class="form-control" name="{{$title}}" placeholder="Textarea" rows="3">{{$section}}</textarea>
								    </div>
								  </div>
                                                                   <?php } ?>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-success "><i class="glyphicon glyphicon-floppy-disk" style="margin-right:10px"></i>Save Changes</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  			  
	  			</div>

	  			

	  			

	  			


	  		<!--  Page content -->
		  </div>
		</div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>









    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script type="text/javascript" src="{{$baseUrl}}js/{{$uriKey}}"></script>
  </body>
</html>
