<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href=".\css\dokaben-css-master\dokaben.css">
        <link rel="stylesheet" href=".\css\bootstrap-3.3.7-dist\css\bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
        <meta charset=utf-8>
        <title>Bootstrap dokaben test</title>

    </head>
    <body>
        <a type="button" class="btn btn-default" style="margin-left:20px;" href="./index.php">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </a>

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

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <a href="#"><button  class="btn btn-info" type="button" style="float: left;">は？</button></a>
                        </span>
                    </div>

                    <form>
                        <button type="button" class="btn btn-default" onclick="detail()">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>

                    <div id="disp" style="display: none">
                        aaa
                    </div>

                    <script>
                        function detail()
                        {
                            if (document.getElementById("disp").style.display == "none")
                            {
                                document.getElementById("disp").style.display="block";
                            }
                            else
                            {
                                document.getElementById("disp").style.display="none";
                            }
                        }
                    </script>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div style="padding: 10px; margin: 10px; border: 1px solid #333333; border-radius: 10px;">
                        Genre
                        <ul>
                            <a href="#"><li>aaa</li></a>
                            <li>iii</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="padding: 10px; margin: 10px; border: 1px solid #333333; border-radius: 10px;">
                        New
                    </div>
                    <p class="dokaben dkbn-loop dkbn-text" style="font-size: 2em;">こんにちは。</p>
                    <br>
                    <a href="./select_thread.php" class="dkbn-hover"><span class="dokaben dkbn-loop2 dkbn-text" style="font-size: 2em;">さようなら</span></a>
                </div>
                <div class="col-md-4">
                    <div style="padding: 10px; margin: 10px; border: 1px solid #333333; border-radius: 10px;">
                        <a href="#" class="dkbn-hover"><span class="dokaben dkbn-loop2 dkbn-text">Rank</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <p class="dokaben dkbn-text" style="font-size: 2em;">aaaaa</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6" style="float: center;">
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
