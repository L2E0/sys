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

        <div style="display: inline-block; float: right; overflow: visible;">
            <div class="btn-group">
                <button type="button" style="width: 160px; text-align: right;"class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" style="width: 100px;">
                    <li id="signup"><a href="#">sign up</a></li>
                    <li id="signin"><a href="#">sign in</a></li>
                    <li id="myp"><a href="#">my page</a></li>
                    <li id="crtth"><a href="#">create thread</a></li>
                    <li id="bar" role="separator" class="divider"></li>
                    <li id="signout"><a href="#">sign out</a></li>
                </ul>
            </div>
        </div>

        <script>
            function detail1()
            {
                if (1)//sign in
                {
                    document.getElementById("signup").style.display="none";
                    document.getElementById("signin").style.display="none";
                    document.getElementById("myp").style.display="inline";
                    document.getElementById("crtth").style.display="inline";
                    document.getElementById("signout").style.display="inline";
                    document.getElementById("bar").style.display="block";
                }
                else
                {
                    document.getElementById("signup").style.display="inline";
                    document.getElementById("signin").style.display="inline";
                    document.getElementById("myp").style.display="none";
                    document.getElementById("crtth").style.display="none";
                    document.getElementById("signout").style.display="none";
                    document.getElementById("bar").style.display="none";
                }
            }

            detail1();
        </script>

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
                        <button type="button" class="btn btn-default" onclick="detail2()">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <p id="ho" style="display: inline;">詳細検索</p>
                    </form>

                    <div id="option" style="display: none">
                        <p>
                        <input type="checkbox" name="riyu" value="1" checked="checked">スレッド検索
                        <input type="checkbox" name="riyu" value="2">コメント検索
                        </p>
                    </div>

                    <div id="d" style="display: none;" class="input-group">
                        <input type="datetime-local" value="<?php echo date('Y-m-j');?>" style="display: inline;">
                        <p style="display: inline;">　　〜　　</p>
                        <input type="datetime-local" style="display: inline;">
                        <p style="display: inline;">を検索</p>
                    </div>

                    <script>
                        function detail2()
                        {
                            if (document.getElementById("option").style.display == "none")
                            {
                                document.getElementById("option").style.display="block";
                                document.getElementById("d").style.display="block";
                                document.getElementById("ho").style.display="none";
                            }
                            else
                            {
                                document.getElementById("option").style.display="none";
                                document.getElementById("d").style.display="none";
                                document.getElementById("ho").style.display="inline";
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
