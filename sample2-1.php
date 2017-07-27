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
        <a type="button" class="btn btn-default" style="margin-left:20px;" href="./sample2-1.php">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </a>
        <a  href="riyoukiyaku.html" type="button" class="btn btn-danger">利用規約</a>
        <a href="siyouhoho.html" type="button" class="btn btn-info">使用方法</a>

        <div style="display: inline-block; float: right; overflow: visible;">
            <div class="btn-group">
                <button type="button" style="width: 160px; text-align: right;"class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" style="width: 100px;">
                    <li id="signup"><a href="./register.php">sign up</a></li>
                    <li id="signin"><a href="./login.php">sign in</a></li>
                    <li id="myp"><a href="./mypage.php">my page</a></li>
                    <li id="crtth"><a href="./make.php">create thread</a></li>
                    <li id="bar" role="separator" class="divider"></li>
                    <li id="signout"><a href="./signout.php">sign out</a></li>
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
                                $sql='select * from comment';
                                $result=pg_query($sql);
                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }

                                $dateary = array_pad(array(), 5, NULL);
                                $timeary = array_pad(array(), 5, NULL);
                                $commentary = array_pad(array(), 5, NULL);
                                $titleary = array_pad(array(), 5, NULL);

                                while($row = pg_fetch_assoc($result)){
                                    for($i=count($dateary)-1; $i>=0; $i--){
                                        if($dateary[$i] < $row['date']){
                                            $dateary[$i] = $row['date'];
                                            $timeary[$i] = $row['time'];
                                            $commentary[$i] = $row['comment'];
                                            $titleary[$i] = $row['title'];
                                            break;
                                        }
                                    }
                                }

                                pg_close($con);
                            ?>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[0] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[0] .'">' .$dateary[0] .'-' .$timeary[0] .' : ' .$commentary[0] .'<br>in  ' .$titleary[0] .'</a>');
                            ?>
                            <br>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[1] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[1] .'">' .$dateary[1] .'-' .$timeary[1] .' : ' .$commentary[1] .'<br>in  ' .$titleary[1] .'</a>');
                            ?>
                            <br>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[2] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[2] .'">' .$dateary[2] .'-' .$timeary[2] .' : ' .$commentary[2] .'<br>in  ' .$titleary[2] .'</a>');
                            ?>
                            <br>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[3] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[3] .'">' .$dateary[3] .'-' .$timeary[3] .' : ' .$commentary[3] .'<br>in  ' .$titleary[3] .'</a>');
                            ?>
                            <br>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[4] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[4] .'">' .$dateary[4] .'-' .$timeary[4] .' : ' .$commentary[4] .'<br>in  ' .$titleary[4] .'</a>');
                            ?>
                            <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                            <p style="margin: 0px 0px 0px 30px;"><span class="dokaben dkbn-text dkbn-loop dekaben" >Thread Rank</span></p>
                        </div>
                            <?php
                                /*$maxeva=0;

                                $con=pg_connect("dbname=group1_db user=group1");
                                if(!$con){
                                    die('failure' .pg_last_error());
                                }
                                pg_set_client_encoding('UTF-8');
                                $sql='select * from thread';
                                $result=pg_query($sql);
                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }
                                while($row = pg_fetch_assoc($result)){
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
                                */

                                $evaary = array_pad(array(), 5, NULL);
                                $titleary = array_pad(array(), 5, NULL);

                                $con=pg_connect("dbname=group1_db user=group1");
                                if(!$con){
                                    die('failure' .pg_last_error());
                                }
                                pg_set_client_encoding('UTF-8');
                                $sql='select * from thread';
                                $result=pg_query($sql);

                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }
                                while($row = pg_fetch_assoc($result)){
                                    for($i=0; $i<count($evaary); $i++){
                                        if($evaary[$i] < $row['evaluation']){
                                            $evaary[$i] = $row['evaluation'];
                                            $titleary[$i] = $row['title'];
                                            break;
                                        }
                                    }
                                }
                            ?>
                        <div class="panel-body">

                            <p style="font-size: 3em;">
                            <?php
                                if($titleary[0] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[0] .'">' .$titleary[0] .' : ★' .$evaary[0] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[1] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[1] .'">' .$titleary[1] .' : ★' .$evaary[1] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 2em;">
                            <?php
                                if($titleary[2] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[2] .'">' .$titleary[2] .' : ★' .$evaary[2] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 1em;">
                            <?php
                                if($titleary[3] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[3] .'">' .$titleary[3] .' : ★' .$evaary[3] .'</a>');
                            ?>
                            </p>
                            <p style="font-size: 1em;">
                            <?php
                                if($titleary[4] != NULL)
                                echo('<a href="./show_thread.php?' .$titleary[4] .'">' .$titleary[4] .' : ★' .$evaary[4] .'</a>');
                            ?>
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
