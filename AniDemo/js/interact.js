var page = document.getElementById('page');
var startX = 0;

page.addEventListener('touchstart', function(e) {
	startX = e.clientX;
	console.log(e);
});

page.addEventListener('touchmove', function(e) {
	if(e.clientX > page.x){
		console.log('向右滑')
	}
});