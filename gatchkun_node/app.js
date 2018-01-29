// Node.js各種モジュール読み込み
var app = require("express")();
var http = require("http");

// socket
var server = http.createServer(app);
var io = require('socket.io').listen(server);


// 起動ポートの設定
server.listen(3000, function() {
    console.log("listening on *:" + 3000);
});

// 直接飛んだ場合
app.get(`/`, (req, res) => {
  res.sendFile(__dirname + '/index.html');
  //res.send('hello');
});

app.get(`/hello`, (req, res) => {
  // res.sendFile(__dirname + '/index.html');
  res.send('helloworld');
});

// コネクションチェック
io.on('connection', (socket) => {
  console.log('A user connected');

 // Push通知
  socket.on("pushSend", function (data) {
    console.log(data);
    var id = data['receiveId'];
    var id2 = data['sentId'];
    var name = data['sentName'];
    var picture = data['picture']
    socket.broadcast.emit("pushOn",
      {id: id,id2: id2,name: name,picture: picture}); //自分以外全員にプッシュ
    // socket.emit("pushOn", {id: id}); // 自分にプッシュ

  });

});
// emit したら on が発動