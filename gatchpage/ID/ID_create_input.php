<?php 
require('../../dbconect_gatch.php');
require('ID_sql.php');


 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
     <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>チャットページ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
  <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="FreeHTML5.co" />


  <!-- Bootstrap  -->
  <link rel="stylesheet" href="../../asset/rin/Rin-3.3.7-2/dist/css/bootstrap.css">
  
  <!-- ========jQuery======== -->
  <script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
        var clipboadCopy = function(){
            var id = document.getElementById("onetime");
            id.select();
            document.execCommand("copy");
        }
        </script>


 	<title>作成と入力</title>

</head>
   <body>
   
   <h1>はい合致edit</h1>

<br>
<br>
 　　　<div class="container">
 	　　　  <div class="row">
 		　    　<div class="col-xs-6">
			 		   <h4>ID出力画面</h4>
			 　　　  <div>
					     <form method="POST" action="">
						   <input  type="text" name="onetimeId" value="<?php echo $r_str; ?>" id="onetime" >
						   </input>
						   <input type="submit" name="idCreate" class="btn btn-primary" value="コピーする" onclick="clipboadCopy()">
					     </form>
				　　   </div>

　　　　　　　<!-- 履歴 -->
	   	 <div class="past">
				     <h4>コピー履歴</h4>
				<?php foreach ($created_id as $key): ?>
			    <?php echo $key['random_created']; ?>
					 </p>
					 <p style="font-size:15px;">
			    <?php echo $key['random']; ?>
					 </p>
				<?php endforeach; ?>

        					<br>
        					<br>
        					<br>
        					<br>
        					<a href="../TOP/top_push.php">トップへ</a>
              </div>    
			      </div><!-- col-xs-6 -->
        <div class="col-xs-6">
        <h4>ID入力画面</h4>	
        
          <div>
            <form method="POST" action="">
              <input  type="text" name="idInput" placeholder="友達から受け取ったIDを入力してください">
              </input>
              <input type="submit" value="友達追加" class="btn btn-primary">
            </form>
          </div>


        </div><!-- col-xs-6 -->
 	   </div><!-- row -->
   </div><!-- container -->


 </body>
 </html>