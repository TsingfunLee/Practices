Math.clamp = function(min, val, max) {
	if(val > max){
		return max;
	}else if(val < min){
		return min;
	}
	return val;
}

Math.easeInOutExpo = function(t, b, c, d) {
	if (t==0) return b;
    if (t==d) return b+c;
    if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
    return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
}

function addEventListener(ele, event, func) {
	if(ele.addEventListener){
		ele.addEventListener(event, func);
	}else if(ele.attachEvent){
		ele.attachEvent('on'+event, func);
	}else{
		ele['on' + event] = func;
	}
}
