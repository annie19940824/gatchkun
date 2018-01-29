// 仕様変更により使われません

$(function(){

/*カラオケ*/
   $('#karaoke').on('click',function(){
        $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition":"i_karaoke.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php');

        })
    });

/*ドライブ*/
   $('#drive').on('click',function(){
        $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_drive.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});


/*アルコール*/
$('#alcohol').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_nomi.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});


    /*宅のみ*/
   $('#insake').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_takunomi.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});


/*カフェ */
    $('#cafe').on('click',function(){

    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_cafe.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});


  /*買い物*/
 $('#kaimono').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_kaimono.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});


    /*ご飯*/
    $('#meshi').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_meshi.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});

      /*ゲーム */
    $('#game').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_game.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });
});

/*その他   */
    $('#sonota').on('click',function(){
    $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "login_condition": "i_sonota.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/i_sonota.gif');
            console.log(data);
           // $('body').load('http://localhost/annie/gatchkun/TOP/top_push.php')
    });

});
});

