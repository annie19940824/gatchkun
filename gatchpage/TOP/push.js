// $('#push').click(() => {
//     socket.emit('pushSend', {id: myId});
//     return false;
// });
    function push(id){
        var otherId = id;
        socket.emit('pushSend',
            {sentId: myId,
             sentName: myName,
             receiveId: otherId,
             picture: picture
            });
        return false;
    };

    // 通知を受け取る
    socket.on('pushOn', (data) => {
      console.log(myId);
      console.log(data['id']);
      if(myId==data['id']){
        Push.create('合致！', {
            body: data['name']+'が暇みたいです',
            icon: '../LOGIN/profile_image/' + data['picture'],
            timeout: 8000, // 通知が消えるタイミング
            // モバイル端末でのバイブレーション秒数
            vibrate: [100, 100, 100],
            onClick: function() {
                // 通知がクリックされた場合の設定
                console.log(this);
            }
        });
      }
    });