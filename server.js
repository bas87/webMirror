var io = require('socket.io').listen(8000),
	spawn = require('child_process').spawn;

phantomjs  = spawn('/var/www/mouse.ly/bin/phantomjs', ['/var/www/mouse.ly/screeshot.js']);

io.sockets.on("connection", function(socket) {

	socket.on("mouse", function(message) {
		if (message) {
			io.sockets.emit("mouse", {
				message: message
			});
		}
	});
	
	socket.on("scrooll", function(message) {
		if (message) {
			io.sockets.emit("scrooll", {
				message: message
			});
		}
	});

});

phantomjs.stdin.end();