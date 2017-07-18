<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href=".\css\dokaben-css-master\dokaben.css">
        <link rel="stylesheet" href=".\css\bootstrap-3.3.7-dist\css\bootstrap.min.css">
        <link rel="stylesheet" href=".\css\dropmenu.css">
        <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
        <meta charset=utf-8>
        <title>Bootstrap dokaben test</title>

        <style>
            body { padding-bottom: 300px; }
            h3{ clear: both; padding: 50px 0 0; color: #333; text-align: center; }
            .clear:before, .clear:after { content: ""; display: table; }
            .clear:after { clear: both; }
            .clear { *zoom: 1; }

            .dropmenu{
                *zoom: 1;
                list-style-type: none;
                width: 960px;
                margin: 5px auto 30px;
                padding: 0;
            }
            .dropmenu:before, .dropmenu:after{
                content: "";
                display: table;
            }
            .dropmenu:after{
                clear: both;
            }
            .dropmenu li{
                position: relative;
                width: 20%;
                float: left;
                margin: 0;
                padding: 0;
                text-align: center;
            }
            .dropmenu li a{
                display: block;
                margin: 0;
                padding: 15px 0 11px;
                background: #8a9b0f;
                color: #fff;
                font-size: 14px;
                line-height: 1;
                text-decoration: none;
            }
            .dropmenu li ul{
                list-style: none;
                position: absolute;
                top: 100%;
                left: 0;
                margin: 0;
                padding: 0;
            }
            .dropmenu li ul li{
                width: 100%;
            }
            .dropmenu li ul li a{
                padding: 13px 15px;
                border-top: 1px solid #7c8c0e;
                background: #6e7c0c;
                text-align: left;
            }
            .dropmenu li:hover > a{
                background: #6e7c0c;
            }
            .dropmenu li a:hover{
                background: #616d0b;
            }

        </style>
    </head>
    <body>
        <a type="button" class="btn btn-default" style="margin-left:20px;" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>

        <div style="display: inline; float: right;">
            <div class="btn-group" style="margin-left: auto; margin-right: 0;">
                <button type="button" class="btn btn-default">Action</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" >
                    <li><a href="#">Action</a></li>
                    <li><a href="#">あ</a></li>
                    <li><a href="#">い</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>

        <hr style="border-color: #ff0000; margin-top: 1px;">

        <div style="text-align: center;">
            <p class="dokaben dkbn-loop dkbn-text" style="font-size: 5em; display: inline-block;">Google</p>
        </div>





        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <a href="#"><button  class="btn btn-danger" type="button" style="float: left;">は？</button></a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>

            <p class="dokaben dkbn-loop dkbn-text" style="font-size: 2em;">こんにちは。</p>
            <br>
            <a href="./select_thread.php" class="dkbn-hover"><span class="dokaben dkbn-loop2 dkbn-text" style="font-size: 2em;">さようなら</span></a>

        </div>

        <div class="row">
            <div class="col-lg-6" style="margin-left: auto; margin-right: auto;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
        <script src=".\css\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>

    </body>
</html>
