<?php
session_start();
require('../dbconect_gatch.php');


$login_id = $_SESSION['login_user']['user_id'];
$login_condition =$_SESSION['login_user']['conditions'];

/*require('himajin.php');*/
    $sql = "SELECT *
            FROM   `gatchi_users`
            WHERE  `login` = 1
            AND    `user_id` != ?";
    $data = array($login_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $login_users = $stmt->fetchall();

/*require('condition_gatch.php');*/
    
    $sql = "SELECT *
            FROM  `gatchi_users`
            WHERE `login`= 1
            AND   `conditions` =?
            AND   `user_id` != ?
           ";
    $data = array($login_condition,$login_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $condition_gatch = $stmt->fetchall();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Rin</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	  <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">


	<style type="text/css">
	body { padding-top: 80px; }
	@media ( min-width: 768px ) {
		#banner {
			min-height: 300px;
			border-bottom: none;
		}
		.bs-docs-section {
			margin-top: 8em;
		}
		.bs-component {
			position: relative;
		}
		.bs-component .modal {
			position: relative;
			top: auto;
			right: auto;
			left: auto;
			bottom: auto;
			z-index: 1;
			display: block;
		}
		.bs-component .modal-dialog {
			width: 90%;
		}
		.bs-component .popover {
			position: relative;
			display: inline-block;
			width: 220px;
			margin: 20px;
		}
		.nav-tabs {
			margin-bottom: 15px;
		}
		.progress {
			margin-bottom: 10px;
		}
	}
	</style>
</head>
<body>

<header>
	<div class="navbar navbar-default navbar-fixed-top">
		
		<div class="container">
		   <div class="row">
			 <div class="col-xs-10 ">			   
			   <div class="navbar-header">
				<a href="" class="navbar-brand">
					<img src="images/gatchi_logo88.gif" style="width:150px;height:70px; bottom: :10px;">	
					</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						<li><a href="../gatchpage/TOP/top_push.php">Top</a></li>
						<li><a href="../gatchpage/LOGIN/cushion_page.php">マイページ</a></li>
						<li><a href="../gatchpage/ID/ID_create_input.php">友達追加</a></li>
						<li><a href="">ログアウト</a></li>	          
				    </ul>
			    </div>
             </div>
           <div class="col-xs-2">	  
			   <i class="fa fa-user-plus" aria-hidden="true" style="font-size: 50px"></i>
               <i class="fa fa-bell" aria-hidden="true" style="font-size: 50px"></i>
			 </div>
         </div>
       </div>
		
	</div> 
   </header>

	<!--  第二ヘッダー -->
	<div class="container" style="">
		<div class="row">
			<div class="col-xs-12 visible-xs">
				ほげほげほげほげほげほげほげほげほげ <!-- スマホ用の表示 -->
			</div>
			<div class="col-md-4 col-sm-4 hidden-xs">
				
				<p>あなたのコンディションは<img id="test" src="images/<?php echo $login_condition; ?>">です</p>
			
			</div>
			
			<div class="col-md-4 col-sm-4 hidden-xs">
			
			</div>
			
			<div class="col-md-4 col-sm-4 hidden-xs text-right">
				
				<p>コンディションを変更する</p>
			
            </div>
		</div>
	</div>


<?php 
	// ここにメインコンテンツを表示する
//	require('../../YUSUKE1/chat.php');
 ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('.bs-component [data-toggle="popover"]').popover();
	$('.bs-component [data-toggle="tooltip"]').tooltip();
</script>

</body>
</html>
