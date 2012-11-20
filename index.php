
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Mouse.ly</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="./node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>	
	</head>
	
	<body>
		
		<script type="text/javascript">
			var socket = io.connect('http://localhost:8000');
			socket.on('connect', function () {

				socket.on("mouse", function(mouse) {
					$('<div style="background:red; width: 8px;  height: 8px; position:absolute; z-index:999;">')
					.appendTo('body').offset({ top: mouse.message.y, left: mouse.message.x }).
						fadeOut(1500);
				});

				$(document).mousemove(function(e){					
					socket.emit('mouse', {
						x: e.pageX,
						y: e.pageY
					});
				});
				
				socket.on("scrooll", function(scroll) {
					$(window).scrollTop(scroll.message.x)
				});
				
				 $(window).scroll(function () { 
					socket.emit('scrooll', { x: $(window).scrollTop() });
				});

			});
		</script>

		<?php echo file_get_contents('./tw.html') ?>
		
	</body>
</html>