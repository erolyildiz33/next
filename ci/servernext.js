var app = require('express')();
var http = require('http').Server(app, {
    cors: {
        origin: "http://localhost:3300",
        methods: ["GET", "POST"],
        transports: ['websocket', 'polling'],
        credentials: true
    },
    allowEIO3: false
});
var io = require('socket.io')(http);
var port = process.env.PORT || 3300;

app.get('/', function(req, res){
  res.sendFile(__dirname + '/socket.html');
});

io.on('connection', function(socket){
  socket.on('chat message', function(msg){
    io.emit('chat message', msg);
  });
});

http.listen(port, function(){
  console.log('listening on *:' + port);
});
/*
const express = require("express");
const { createServer } = require("http");
const { Server } = require("socket.io");

const app = express();
const httpServer = createServer(app);
const io = new Server(httpServer, {
    cors: {
        origin: "http://localhost:8100",
        methods: ["GET", "POST"],
        transports: ['websocket', 'polling'],
        credentials: true
    },
    allowEIO3: true
});

io.on("connection", (socket) => {
  console.log("biri geldi");
});


httpServer.listen(3300,function(){
console.log("server Çalýþtý")}
);

*/