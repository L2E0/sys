<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href=".\css\dokaben-css-master\dokaben.css">
        <link rel="stylesheet" href=".\css\bootstrap-3.3.7-dist\css\bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
        <meta charset=utf-8>
        <title>ランキングくん</title>
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
        <a href="riyoukiyaku.html" type="button" class="btn btn-warning">利用規約</a>
        <a href="shiyouhoho.html" type="button" class="btn btn-success">使用方法</a>

        <div style="display: inline-block; float: right; overflow: visible;">
            <div class="btn-group">
                <button type="button" style="width: 160px; text-align: right;"class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div align="center">User Menu<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" style="width: 100px;">
                    <li id="signup"><a href="signup.php">sign up</a></li>
                    <li id="signin"><a href="signin.php">sign in</a></li>
                    <li id="myp"><a href="mypage.php">my page</a></li>
                    <li id="crtth"><a href="post.php">create thread</a></li>
                    <li id="bar" role="separator" class="divider"></li>
                    <li id="signout"><a href="signout.php">sign out</a></li>
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
                <div class="col-sm-2 col-sm-offset-5">
                    <div style="test-align: center;">
                        <div style="text-align: center;">
                            <span class="dkbn-hover"><span class="dokaben dkbn-loop2"><a href="select_thread.php" type="button" class="btn btn-info">検索へGo</a></span></span>
                        </div>
                    </div>
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
                                <?php
                                    $opt = '&search_title=&search_game=&search_date1=2017-01-01&search_date2=2017-12-31&search_time1=00:00&search_time2=24:59';
                                    $genre=<<<GOMI
                                    <a href="select_thread.php?search_genre='アクション'$opt" style="font-size: 2em;"><li>アクション</li></a>
                                    <a href="select_thread.php?search_genre='アドベンチャー'$opt" style="font-size: 2em;"><li>アドベンチャー</li></a>
                                    <a href="select_thread.php?search_genre='音楽'$opt" style="font-size: 2em;"><li>音楽</li></a>
                                    <a href="select_thread.php?search_genre='カジノ'$opt" style="font-size: 2em;"><li>カジノ</li></a>
                                    <a href="select_thread.php?search_genre='教育'$opt" style="font-size: 2em;"><li>教育</li></a>
                                    <a href="select_thread.php?search_genre='カード'$opt" style="font-size: 2em;"><li>カード</li></a>
                                    <a href="select_thread.php?search_genre='シュミレーション'$opt" style="font-size: 2em;"><li>シュミレーション</li></a>
                                    <a href="select_thread.php?search_genre='シューティング'$opt" style="font-size: 2em;"><li>シューティング</li></a>
                                    <a href="select_thread.php?search_genre='スポーツ'$opt" style="font-size: 2em;"><li>スポーツ</li></a>
                                    <a href="select_thread.php?search_genre='パズル'$opt" style="font-size: 2em;"><li>パズル</li></a>
                                    <a href="select_thread.php?search_genre='レース'$opt" style="font-size: 2em;"><li>レース</li></a>
GOMI;
                                    echo $genre;
                                ?>
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
                                $evaary = [];
                                $titleary = [];
                                $numary = [];

                                $sql='select * from thread order by evaluation desc limit 5';
                                $result=pg_query($sql);

                                if(!$result){
                                    die('fail to execute the query' .pg_last_error());
                                }
                                $rows=[];
                                $fontsizes=['3em', '2em', '1.8em', '1.5em', '1.2em'];
                                while($row = pg_fetch_assoc($result)){
                                    $rows[]=$row;
                                }
                                foreach($rows as $i => $row){
                                    $evaary[$i] = $row['evaluation'];
                                    $titleary[$i] = $row['title'];
                                    $numary[$i] = $row['no'];
                                }
                            ?>
                        <div class="panel-body">
                            <?php
                                foreach($fontsizes as $i => $size){
                                    if(isset($titleary[$i])){
                                        $html=<<<EOT
                                        <p style="font-size: $size;">
                                        <a href="./show_thread.php?no={$numary[$i]}">{$titleary[$i]} : ★{$evaary[$i]}</a>
                                        </p>
EOT;
                                        echo $html;
                                    }
                                }
                            ?>
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
