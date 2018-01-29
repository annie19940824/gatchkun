<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rin</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	  <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../asset/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>



<header>
	<div class="navbar navbar-default navbar-fixed-top" style="background-color: #f4f4f4;
">

		<div class="container">
		   <div class="row">
			 <div class="col-xs-2">
				<a href="">
					<img src="../asset/images/gatchi_logo88.gif" style="width:95%; bottom: :10px;">
					</a>
			</div>
			<div class="col-xs-8">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				<div class="navbar-collapse collapse" id="navbar-main" style="margin-left: 60px;">
					<ul class="nav navbar-nav">
						<li><a href="../gatchpage/TOP/top_push.php">Top</a></li>
						<li><a href="../gatchpage/LOGIN/cushion_page.php">マイページ</a></li>
						<li><a href="../gatchpage/ID/ID_create_input.php">友達追加</a></li>
						<li><a href="../../asset/logout.php">ログアウト</a></li>
				    </ul>
			    </div>
             </div>

           <div class="col-xs-2" style="padding-top: 20px;">
           	<div style="text-align: center;">
			   <i class="fa fa-user-plus" aria-hidden="true" style="font-size: 35px"></i>
               <i class="fa fa-bell" aria-hidden="true" style="font-size: 35px"></i>
		   </div>
         </div>
     	</div>
       </div>

		<!--  第二ヘッダー -->
	<div style="background-color: black;">
	<div class="container" style="padding: 15px 0px 15px 0px;">
		<div class="row">
			<div class="col-xs-12 visible-xs">

			<!-- スマホ用の表示 -->
			</div>

			<div class="col-md-4 col-sm-4 hidden-xs" style="background-color: black;">


				<span class="obi" style="color:#efe597;">あなたのコンディションは
					<img id="test" src="../asset/images/<?= $_SESSION['login_user']['conditions'] ?>" style="width:50px;height:50px;">
				です
				</span>

			</div>
			<div class="col-md-4 col-sm-4 hidden-xs" style="background-color: black;">

			</div>
			<div class="col-md-4 col-sm-4 hidden-xs text-right" style="background-color: black; margin-top: 13px;">
				<a  href="../LOGIN/cushion_page.php" style="color:#efe597;">
				コンディションを変更する
			    </a>
            </div>
		</div>
	</div>
	</div>
</div>
   </header>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('.bs-component [data-toggle="popover"]').popover();
	$('.bs-component [data-toggle="tooltip"]').tooltip();
</script>

</body>
</html>
