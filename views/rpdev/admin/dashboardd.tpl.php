{{$assets_assets/css/bootstrap:css}}
{{$assets_assets/js/bootstrap::js}}
{{$assets_rpdev/js/custom::js}}
<!DOCTYPE html>
<html>
    <head>
        <title>RPDev Admin Panel</title>
        <link rel="stylesheet" href="{{$baseUrl}}css/{{$uriKey}}">
        <style>
            .nav-stacked,.content{
                margin-top:20px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{$baseUrl}}admin/logout" class="btn btn-warning">Logout</a></li>
                        <h2>Edit pages:</h2>
                        <?php
                        foreach($pages as $plink => $page){
                        ?>
                        <li><a href="{{$baseUrl}}admin/edit/{{$plink}}">{{$page}}</a></li>
                        <?php
                        }
                        ?>
                      </ul>
                </div>
                <div class="col-xs-9 content">
                    <div class="panel panel-default">
                        <div class="panel-body">
                         Please select a page to edit from the sidebar menu.
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{$baseUrl}}js/{{$uriKey}}"></script>
    </body>
</html>