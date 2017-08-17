var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// 绘制动画
var angle = -90;
var wavePoint = -loading.radius;
var waveDir = 'ltr';
var delta = 8;
var PorN = 1;   // 变正负
animation.start(15);
ctx.save();
animation.animate(function() {
	if(angle <= 270){
		// 计算绘制波浪曲线的点		
		loading.x = window.innerWidth/2 + loading.radius + loading.width;
		var yTemp = -loading.percentage * 2 + window.innerHeight/2 + loading.radius + loading.width;
		loading.y = yTemp; 
		loading.xs = loading.x - loading.radius * 2 - loading.width*2;
		loading.ys = yTemp;
		loading.cp1x = window.innerWidth/2 + wavePoint;
		loading.cp1y = loading.y - loading.waveH;
		loading.cp2x = loading.cp1x;
		loading.cp2y = loading.y + loading.waveH;
		if(waveDir == 'ltr'){
			wavePoint += 15;
		}else{
			wavePoint -= 20;
		}
		if(wavePoint >= loading.radius){
			waveDir = 'rtl';
		}else if(wavePoint <= -loading.radius){
			waveDir = 'ltr';
		}
		
		loading.draw(ctx, Math.PI / 180 * angle);
		angle += delta;
	}else{
		ctx.restore();

		ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
		ctx.font = '300px Sans-serif';
		ctx.textBaseline = 'middle';
		ctx.textAlign = 'center';
		ctx.fillText('TSing', window.innerWidth/2, window.innerHeight/2);	
			
		var img = ctx.getImageData(0, 0, window.innerWidth, window.innerHeight);
		var data = img.data;
		var particles = [];
		var posx = 0;
		var posy = 0;
		
		// 存储粒子位置
		for(var x=0;x<img.width;x+= 7){
	        for(var y=0;y<img.height;y+= 7){
	            var i = (y*img.width + x)*4;
	            if(data[i+3] >= 128){
	            	posx = x + (Math.random()-0.5);
	            	posy = y + (Math.random()-0.5);
	                particles.push([posx, posy]);
	            }
	        }
        }		
		
		ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
		// 绘制粒子
		for (var i = 0;i < particles.length; i ++) {
			// 计算位置
			var startPosX = Math.random()*window.innerWidth;
			var startPosY = Math.random()*window.innerHeight;
			
			particle.x = Math.easeInOutExpo(animation.process*animation.interval/1000, 
				startPosX, particles[i][0]-startPosX, 8);
			particle.y = Math.easeInOutExpo(animation.process*animation.interval/1000, 
				startPosY, particles[i][1]-startPosY, 8);
				
			var distance = Math.sqrt((particle.x-particle.mouseX)*(particle.x-particle.mouseX)+(particle.y-particle.mouseY)*(particle.y-particle.mouseY));
			if(distance<50){
//				particle.x=Math.easeInOutExpo(animation.process*animation.interval/1000, 
//				particle.mouseX, particles[i][0]-particle.mouseX, 5);
//				particle.y=Math.easeInOutExpo(animation.process*animation.interval/1000, 
//				particle.mouseY, particles[i][0]-particle.mouseY, 5);
				var newX = particle.mouseX + (Math.random()-0.5)*100;
				var newY = particle.mouseY + (Math.random()-0.5)*100;
				distance = Math.sqrt((newX-particle.mouseX)*(newX-particle.mouseX)+(newY-particle.mouseY)*(newY-particle.mouseY));
				if(distance < 50){
					particle.x = newX;
					particle.y = newY;
				}
			}
			
			// 计算半径
			distance = Math.sqrt((particle.mouseX - particle.x)*(particle.mouseX - particle.x)+(particle.mouseY-particle.y)*(particle.mouseY-particle.y));
			var scale = 1;
			if(distance < 20){
				scale = 1.8;
			}else{
				scale = 30 / distance; 
				if(scale < 0.5){
					scale = 1;
				}
			}	
			particle.radius = scale * 3;
			
			// 计算颜色
			particle.color = 'rgba(204, 204, 255, ' + Math.clamp(0.7, Math.random()+0.5, 1) +')'
			particle.draw(ctx);
		}	
	}	
});

// 鼠标滑过事件
var mouseoverEvent = function(e) {
	//console.log(e.clientX)
	particle.mouseX = e.clientX;
	particle.mouseY = e.clientY;
	particle.draw(ctx);
};

addEventListener(canvas, 'mousemove', mouseoverEvent);