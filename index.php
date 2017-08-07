<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href=".\css\dokaben-css-master\dokaben.css">
        <link rel="stylesheet" href=".\css\bootstrap-3.3.7-dist\css\bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
        <meta charset=utf-8>
        <title>Bootstrap dokaben test</title>
        <style>
            .dekaben {
                        display: inline-block;
                        font-size: 3em;
                        text-align: center;
                    }
                    .parent{
                        position: relative;
                        height: 200px;
                        width: 300px;
                    }
                    .inner{
                        top: 0;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        position: absolute;
                        margin: auto;
                    }
        </style>
    </head>
    <body>
        <a type="button" class="btn btn-default" style="margin-left:20px;" href="index.php">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </a>
        <a  href="riyoukiyaku.html" type="button" class="btn btn-warning">利用規約</a>
        <a href="shiyouhoho.html" type="button" class="btn btn-success">使用方法</a>

        <div style="display: inline-block; float: right; overflow: visible;">
            <div class="btn-group">
                <button type="button" style="width: 160px; text-align: right;"class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" style="width: 100px;">
                    <li id="signup"><a href="./signup.php">sign up</a></li>
                    <li id="signin"><a href="./signin.php">sign in</a></li>
                    <li id="myp"><a href="./mypage.php">my page</a></li>
                    <li id="crtth"><a href="./post.php">create thread</a></li>
                    <li id="bar" role="separator" class="divider"></li>
                    <li id="signout"><a href="./signout.php">sign out</a></li>
                </ul>
            </div>
        </div>


        <script type="text/javascript">
            <?php
            ob_start();
            session_start();
                if (isset($_SESSION["userid"])) {//sign in
                    echo <<< GOMI
                    document.getElementById("signup").style.display="none";
                    document.getElementById("signin").style.display="none";
                    document.getElementById("myp").style.display="inline";
                    document.getElementById("crtth").style.display="inline";
                    document.getElementById("signout").style.display="inline";
                    document.getElementById("bar").style.display="block";
GOMI;
                } else {
                    echo <<< GOMI
                    document.getElementById("signup").style.display="inline";
                    document.getElementById("signin").style.display="inline";
                    document.getElementById("myp").style.display="none";
                    document.getElementById("crtth").style.display="none";
                    document.getElementById("signout").style.display="none";
                    document.getElementById("bar").style.display="none";
GOMI;
                }
            ?>
        </script>

        <hr style="border-color: #ff0000; margin-top: 1px;">

        <div style="text-align: center;">
            <p class="dokaben dkbn-text dkbn-up" style="animation-duration: 10000ms; font-size: 8em; display: inline-block;">ランキングくん</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <a href="#"><button  class="btn btn-info" type="button" style="float: left;">検索</button></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <a href="select_thread.php" type="button" class="btn btn-danger">詳細検索へGo</a>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-4">
                    <div class="panel panel-info" >
                        <div class="panel-heading" >
                            <p style="margin: 0px 0px 0px 30px;"><span class="dokaben dkbn-text dkbn-loop dekaben" >Genre</span></p>
                        </div>
                        <div class="panel-body">
                            <ul style="list-style: none;">
                                <a href="#?genre='a'" style="font-size: 2em;"><li>Horror</li></a>
                                <a href="#" style="font-size: 2em;"><li>Action</li></a>
                                <a href="#" style="font-size: 2em;"><li>Battle</li></a>
                                <a href="#" style="font-size: 2em;"><li>Fighting</li></a>
                                <a href="#" style="font-size: 2em;"><li>Shooting</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                            <p style="margin: 0px 0px 0px 12px;"><span class="dokaben dkbn-text dkbn-loop dekaben" >New Comments</span></p>
                        </div>
                        <div class="panel-body">
                            <?php
                                $dbname='group1_db';
                                $dbuser='group1';
                                $dbhost='localhost';

                                $con=pg_connect("dbname=group1_db user=group1");
                                if(!$con){
                                    die('failure' .pg_last_error());
                                }
                                pg_set_client_encoding('UTF-8');
                                $sql='select * from comment order by date desc, time desc limit 5';
                                $result=pg_query($sql);
                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }

                            ?>
                            <style>
                                span.title{
                                    font-size: 27px;
                                    color: #000f00;
                                }
                                span.comment{
                                    font-size:35px;
                                    color: #0000f0;
                                }
                                span.datetime{
                                    font-size:18px;
                                    color: #000000;
                                }
                                span.in{
                                    font-size:18px;
                                    color: #000000;
                                }
                            </style>
                            <?php
                                while($comment = pg_fetch_assoc($result)){
                                    echo('<a href="./show_thread.php?no=' .$comment['no'] .'">' .'<span class="comment">'  .$comment['comment'] .'</span><span class="in"> in
                                    </span>  <span class="title">' .$comment['title'] .': </span><span class="datetime">' .$comment['date'] .'-' .$comment['time'] .'</span></a><br>');
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                            <p style="margin: 0px 0px 0px 30px;"><span class="dokaben dkbn-text dkbn-loop dekaben" >Thread Rank</span></p>
                        </div>
                            <?php
                                $evaary = array_pad(array(), 5, NULL);
                                $titleary = array_pad(array(), 5, NULL);
                                $numary = array_pad(array(), 5, NULL);

                                $sql='select * from thread order by evaluation desc limit 5';
                                $result=pg_query($sql);

                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }
                                while($row = pg_fetch_assoc($result)){
                                    for($i=0; $i<count($evaary); $i++){
                                        if($evaary[$i] < $row['evaluation']){
                                            $evaary[$i] = $row['evaluation'];
                                            $titleary[$i] = $row['title'];
                                            $numary[$i] = $row['no'];
                                            break;
                                        }
                                    }
                                }
                            ?>
                        <div class="panel-body">

                            <p style="font-size: 3em;">
                            <?php
                                if($titleary[0] != NULL)
                                echo('<a href="./show_thread.php?no=' .$numary[0] .'">' .$titleary[0] .' : ★' .$evaary[0] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[1] != NULL)
                                echo('<a href="./show_thread.php?no=' .$numary[1] .'">' .$titleary[1] .' : ★' .$evaary[1] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[2] != NULL)
                                echo('<a href="./show_thread.php?no=' .$numary[2] .'">' .$titleary[2] .' : ★' .$evaary[2] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[3] != NULL)
                                echo('<a href="./show_thread.php?no=' .$numary[3] .'">' .$titleary[3] .' : ★' .$evaary[3] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[4] != NULL)
                                echo('<a href="./show_thread.php?no=' .$numary[4] .'">' .$titleary[4] .' : ★' .$evaary[4] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 1em;">
                            <a href="ranking.php" class="dkbn-hover"><span class="dokaben dkbn-loop2">ランキングをさらに見る</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
        <script src=".\css\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>

    </body>
</html>
