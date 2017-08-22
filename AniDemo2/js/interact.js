var startX = 0, startY = 0;
var step = 1;

document.addEventListener('touchstart', function(e) {
	startX = e.changedTouches[0].clientX;
	startY = e.changedTouches[0].clientY;
	console.log(startX);
});

document.addEventListener('touchmove', function(e) {
	var tip = document.querySelector('#tip'),
		dot = document.querySelector('#tip .dot'),
		arrow = document.querySelector('#tip .arrow'),
		tipText = document.querySelector('#tip .tipText');
	var plane = document.querySelector('#plane');
	var dropDown = document.querySelector('.dropDown');
		
	if(e.changedTouches[0].clientX > startX && step == 1){
		console.log('向右滑')
		document.querySelector('#page').style.backgroundColor = 'transparent';
		document.querySelector('#page > div:first-child').classList.add('flipOver');
		tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');
		step ++;
		setTimeout(function(){
			dot.classList.add('dot2');
			arrow.classList.add('arrow2');
			tipText.classList.add('tipText2');
			tipText.textContent = tipText.dataset.texta;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
		}, 1000);
	}else if(e.changedTouches[0].clientX < startX && step  == 2){
		console.log('向左滑')
		document.querySelector('#page > div:last-child').classList.add('flipOver2');
		tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');
		step ++;
		setTimeout(function(){
			dot.classList.add('dot3');
			arrow.classList.add('arrow3');
			tipText.classList.add('tipText3');
			tipText.textContent = tipText.dataset.textb;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
		}, 1000);
	}else if(e.changedTouches[0].clientX > startX && step == 3){
		console.log('向右滑');		
		tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');	
		document.querySelector('#page').classList.add('fadeOut');
		step ++;
		setTimeout(function(){
			dot.classList.add('dot4');
			arrow.classList.add('arrow4');
			tipText.classList.add('tipText4');
			tipText.textContent = tipText.dataset.textc;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');		
			plane.style.display = 'block';
			plane.classList.add('fadeIn');
			step ++;
		}, 1000);
	}else if(e.changedTouches[0].clientY < startY && step ==5){
		console.log('向上滑');
		tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');
		plane.classList.add('fly');	
		step ++;
		setTimeout(function(){
			dot.classList.add('dot5');
			arrow.classList.add('arrow5');
			tipText.classList.add('tipText5');
			tipText.textContent = tipText.dataset.textd;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
			dropDown.style.display = 'block';
		},2000);
	}else if(e.changedTouches[0].clientY > startY && step == 6){
		console.log('向下滑');
		tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');	
		dropDown.classList.add('pullDown');
		step++;
	}
});

document.addEventListener('touchend', function(){
	if(step == 7){
		document.querySelector('.dropDown').style.display = 'none';
		document.querySelector('.dropDown').classList.add('fadeOut');
		setTimeout(function(){
			document.body.style.backgroundImage = 'inherit'
		}, 500)
	}
});