var loading = {
	radius: 100,
	width: 20,
	startAngle: -Math.PI/2,
	endAngle: -Math.PI/2,
	percentage: 0,
	color: '#ccccff',
	x: 0,  // 波浪终点
	y: 0,
	xs: 0,  // 波浪起点
	ys: 0,
	xc: 0,  // 波浪中间
	yc: 0, 
	cp1x: 0,    
	cp1y: 0,
	cp2x: 0,
	cp2y: 0,
	waveH: 60,
	draw: function(ctx, endAngle) {
		var x = window.innerWidth/2, y = window.innerHeight/2;  // 圆心坐标
		var r = this.radius - this.width;   // 圆环内圆半径	
		this.endAngle = endAngle;
		var progress = Math.floor((this.endAngle - this.startAngle)/(Math.PI*2)*100);
		this.percentage = progress;
		
		ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
		ctx.beginPath();
		ctx.arc(x, y, this.radius, 
			this.startAngle, this.endAngle, false);
		ctx.arc(x, y, r, this.endAngle, this.startAngle, true);
		ctx.closePath();
		ctx.fillStyle = this.color;
		ctx.fill();
		
//		ctx.beginPath();
//		ctx.moveTo(this.x - 200, this.y);
//		ctx.quadraticCurveTo(this.cp1x, this.cp1y, this.xc , this.yc);
//		ctx.quadraticCurveTo(this.cp2x, this.cp2y, this.x , this.y);
//		ctx.stroke();
		
		ctx.font = '80px serif';
		ctx.textBaseline = 'middle';
		ctx.textAlign = 'center';
		ctx.fillText(this.percentage, x, y);		
	}
}
