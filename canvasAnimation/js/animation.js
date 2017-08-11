var animation = {
	fps: 15,
	startTime: 0,
	timeStamp: -1,
	interval: 66.7,
	process: 0,
	animationLength: 1000,
	raf: null,
	isStart: false,
	start: function(fps, animationLength) {
		this.fps = fps;
		this.interval = 1000 / fps;
		this.startTime = Date.now();
		this.animationLength = animationLength || Math.Infinity;
		this.isStart = true;
	},
	animate: function(animate) {
		this.timeStamp = Date.now();
		var _elapsed = this.timeStamp - this.startTime;

		if(_elapsed >= this.interval){
			this.startTime = Date.now();
			this.process += 1;

			if(this.process > this.animationLength*this.fps){
				this.stop();
			}
			// Do animation
			if(typeof animate == 'function'){
				animate();
			}				
		}
		if(this.isStart){
			this.raf = window.requestAnimationFrame(function(){
			animation.animate(animate);
		    });
		}		
	},
	stop: function() {
		window.cancelAnimationFrame(this.raf);
		this.startTime = 0;
		this.timeStamp = -1;
		this.interval = 66.7;
		this.process = 0;
		this.raf = null;
		this.isStart = false;
	}
}
