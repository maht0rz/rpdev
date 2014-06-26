{{$assets_assets/css/bootstrap::css}}
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
                    <form action="{{$baseUrl}}admin/edit/push/{{$name}}" method="post">
                    <?php
                       foreach($sections as $title => $section){
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">{{$title}}</h3>
                        </div>
                        <div class="panel-body">
                            
                                <p>Edit text of section:</p>
                                <textarea name="{{$title}}" class="form-control">{{$section}}</textarea>
                           
                        </div>
                      </div>
                       <?php } ?>
                        <input type="submit" value="Save changes" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>