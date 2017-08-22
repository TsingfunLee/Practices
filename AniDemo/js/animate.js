var step = 1;
window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

(function(){
	var tip = document.querySelector('#tip'),
		dot = document.querySelector('#tip .dot'),
		arrow = document.querySelector('#tip .arrow'),
		tipText = document.querySelector('#tip .tipText');
	var plane = document.querySelector('#plane');
	var dropDown = document.querySelector('.dropDown');

	var startTime = new Date().getTime();

	var RAF = window.requestAnimationFrame(animate);

	function animate(){
		var nowTime = new Date().getTime();
		if(nowTime - startTime > 1000 && step == 1){
			document.querySelector('#page > div:first-child').classList.add('flipOver');
			tip.classList.add('fadeOut');
			tip.classList.remove('fadeIn');
			step++;
		}else if(nowTime - startTime > 2000 && step == 2){
			dot.classList.add('dot2');
			arrow.classList.add('arrow2');
			tipText.classList.add('tipText2');
			tipText.textContent = tipText.dataset.texta;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
			step ++;
		}else if(nowTime - startTime > 3000 && step == 3){
			document.querySelector('#page > div:last-child').classList.add('flipOver2');
			tip.classList.add('fadeOut');
			tip.classList.remove('fadeIn');
			step ++;
		}else if (nowTime - startTime > 4000 && step == 4) {
			dot.classList.add('dot3');
			arrow.classList.add('arrow3');
			tipText.classList.add('tipText3');
			tipText.textContent = tipText.dataset.textb;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
      step ++;
		}else if (nowTime - startTime > 5000 && step == 5) {
  		tip.classList.add('fadeOut');
  		tip.classList.remove('fadeIn');
  		document.querySelector('#page').classList.add('fadeOut');
  		step ++;
		}else if (nowTime - startTime > 6000 && step == 6) {
			dot.classList.add('dot4');
			arrow.classList.add('arrow4');
			tipText.classList.add('tipText4');
			tipText.textContent = tipText.dataset.textc;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
			plane.style.display = 'block';
			plane.classList.add('fadeIn');
      step ++;
    }else if (nowTime - startTime >　7000 && step == 7) {
  		tip.classList.add('fadeOut');
  		tip.classList.remove('fadeIn');
  		plane.classList.add('fly');
  		step ++;
    }else if (nowTime - startTime > 9000 && step == 8) {
			dot.classList.add('dot5');
			arrow.classList.add('arrow5');
			tipText.classList.add('tipText5');
			tipText.textContent = tipText.dataset.textd;
			tip.classList.add('fadeIn');
			tip.classList.remove('fadeOut');
			dropDown.style.display = 'block';
      step ++;
    }else if (nowTime - startTime > 10000 && step == 9) {
    	tip.classList.add('fadeOut');
		tip.classList.remove('fadeIn');
		dropDown.classList.add('pullDown');
		step ++;
    }else if (nowTime - startTime > 11000 && step == 10) {
    	dropDown.style.display = 'none';
		dropDown.classList.add('fadeOut');
		step ++;
    }else if (nowTime - startTime > 11500 && step == 11) {
    	document.body.style.backgroundImage = 'inherit';
    }

		window.requestAnimationFrame(animate);
	}
})();