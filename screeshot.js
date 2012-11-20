var counter = 0;
var page = require('webpage').create();
page.viewportSize = { width: 600, height: 600 };
page.open('http://localhost/mouse.ly', function () {
	var interval = setInterval(function() {
		page.render('/var/www/webmiror/images/i'+counter+'.png');
		if (counter > 1000) {
			clearInterval(interval);
		}
		counter++;
    }, 3000); 
    //phantom.exit();
});