{{$assets_assets/css/bootstrap::css}}
<!DOCTYPE html>
<html>
    <head>
        <title>RPDev Admin Panel</title>
        <link rel="stylesheet" href="{{$baseUrl}}css/{{$uriKey}}">
        <style>
            .loginBox{
                margin-top:150px;
            }
            p{
                margin-top:6px;
                margin-bottom:6px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-xs-4 col-xs-offset-4 loginBox">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">RPDev Admin Panel</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{$baseUrl}}admin/dashboard" method="post">
                            <?php
                                if($error){
                            ?>
                                <div class="alert alert-danger">
                                    <a href="#" class="alert-link">{{$error}}</a>
                                </div>
                            <?php
                                }
                            ?>
                            <p>Username:</p>
                            <input type="text" name="username" placeholder="Username" class="form-control">
                            <p>Password:</p>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                            <input type="hidden" name="token" value="{{$token}}">
                            <br>
                            <input type="submit" value="Sign in" class="form-control btn btn-success">
                        </form> 
                    </div>
                  </div>
            </div>
        </div>
    </body>
</html>