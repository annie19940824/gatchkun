<?php
session_start();
require('../../dbconect_gatch.php');

$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];
require('ID_sql.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <title>ID発行・入力</title>
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../../asset/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========BootStrap======== -->
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../asset/css/common.css">
    <!-- ========stylesheet======== -->
    <link rel="stylesheet" type="text/css" href="ID.css">
    <!-- ========jQuery======== -->
    <script src="../../YUSUKE1/jQuery/jquery-3.1.1.js"</script>
    <script src="../../YUSUKE1/jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- ========push.js======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script type="text/javascript">
        var clipboadCopy = function(){
            var id = document.getElementById("onetime");
            var r_str = <?php echo json_encode($r_str); ?>;
            id.select();
            document.execCommand("copy");
            alert(r_str + 'をコピーしました');
        }
    </script>
</head>
<body>
<div class="header">
    <?php require('../../asset/head.php'); ?>
</div>
    <div class="container">
 	    <div class="row row1">
            <div class="col-xs-9">
                <h3 class="theme">
                    合致トモの追加用ワンタイムパスワード（友人に追加してもらう）
                </h3>
                <p>
                    他のユーザーがあなたを友達として追加する時に、このパスワードが必要になります。<br>
                    このパスワードを、メッセージアプリなどで友達に送ってください。
                </p>
                <div onMouseDown="return false;" onSelectStart="return false;" unselectable="on">
				    <form method="POST" action="">
				        <input  type="text" name="onetimeId" value="<?php echo $r_str; ?>" id="onetime" class="input">
                        </input>
                        <input type="submit" name="idCreate" value="パスワードをコピーする" onclick="clipboadCopy()">
				    </form>
                </div>
                <!-- 履歴 -->
                <!-- <div class="past">
			        <?php // foreach ($created_id as $key): ?>
                        <?php // echo $key['random_created']; ?>
                        <p style="font-size:15px;">
                            <?php //echo $key['random']; ?>
                        </p>
			        <?php //endforeach; ?>
                </div> -->
            </div><!-- col-xs-9 -->
        </div>
        <div class="row row2">
            <div class="col-xs-9">
                <h3 class="theme">
                    合致トモの追加用ワンタイムパスワード入力フォーム（友人を追加する）
                </h3>
                <p>
                    あなたが他のユーザーを友達として追加する時に、ここにパスワードを入力します。<br>
                    発行から24時間以上経過したパスワードは使用できません。
                </p>
                <div>
                    <form method="POST" action="">
                        <input  type="text" name="idInput" placeholder="友達から受け取ったIDを入力してください" class="input">
                        </input>
                        <input type="submit" value="合致トモを追加する">
                    </form>
                </div>
            </div><!-- col-xs-9 -->
        </div><!-- row -->
    </div><!-- container -->
    <div class="footer">
        <?php require('../../asset/footer.php'); ?>
    </div>
    <?php require('created-destroy.php'); ?>

    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
    var myId = <?= $_SESSION['login_user']['user_id']; ?>;
    var myName = "<?= $_SESSION['login_user']['user_name']; ?>";
    var picture = "<?= $_SESSION['login_user']['picture']; ?>";
    var socket = io('http://localhost:3000');
</script>
<script type="text/javascript" src="../TOP/push.js"></script>
</body>

 </body>
 </html>