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
        </style>
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


        <script type="text/javascript">
            <?php
                if (isset($_SESSION["username"])) {//sign in
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
            <p class="dokaben dkbn-text dkbn-up" style="animation-duration: 10000ms; font-size: 5em; display: inline-block;">Google</p>
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

                    <form>
                        <button type="button" class="btn btn-default" onclick="detail2()">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <p id="ho" style="display: inline;">詳細検索</p>
                    </form>

                    <div id="option" style="display: none">
                        <p>
                        <input type="checkbox" name="riyu" value="1">スレッド検索
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
                        function detail2() {
                            if (document.getElementById("option").style.display == "none") {
                                document.getElementById("option").style.display="block";
                                document.getElementById("d").style.display="block";
                                document.getElementById("ho").style.display="none";
                                } else {
                                document.getElementById("option").style.display="none";
                                document.getElementById("d").style.display="none";
                                document.getElementById("ho").style.display="inline";
                            }
                        }
                    </script>

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
                            New
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
                                //echo 'success';
                                pg_set_client_encoding('UTF-8');
                                $sql='select * from thread';
                                $result=pg_query($sql);
                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }
                                $maxeva=0;
                                while($row = pg_fetch_assoc($result)){
                                    //echo($row['title'] .'<br>');
                                    if($maxeva < $row['evaluation']){
                                        $maxeva = $row['evaluation'];
                                        $maxtitle = $row['title'];
                                    }
                                }
                                echo('<br>' .$maxtitle .$maxeva .'<br>');

                                $result=pg_query($sql);
                                $data=pg_fetch_array($result,NULL,PGSQL_ASSOC);
                                echo('thread:' .$data['title'] .'<br>' .$data['game'] .'<br>');

                                pg_close($con);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                            Rank
                        </div>
                            <?php
                                $maxeva=0;
                                while($row = pg_fetch_assoc($result)){
                                    //echo($row['title'] .'<br>');
                                    if($maxeva < $row['evaluation']){
                                        $maxeva = $row['evaluation'];
                                        $maxtitle = $row['title'];
                                    }
                                }
                                echo('<br>' .$maxtitle .$maxeva .'<br>');

                                $result=pg_query($sql);
                                $data=pg_fetch_array($result,NULL,PGSQL_ASSOC);
                                echo('thread:' .$data['title'] .'<br>' .$data['game'] .'<br>');

                                pg_close($con);
                            ?>
                        <div class="panel-body">
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
