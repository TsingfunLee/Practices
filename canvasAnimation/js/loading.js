var loading = {
	radius: 100,
	width: 20,
	startAngle: -Math.PI/2,
	endAngle: -Math.PI/2,
	color: '#ccccff',
	draw: function(ctx, endAngle) {
		var x = window.innerWidth/2, y = window.innerHeight/2;  // 圆心坐标
		var r = this.radius - this.width;   // 圆环内圆半径	
		this.endAngle = endAngle;
		var progress = Math.floor((this.endAngle - this.startAngle)/(Math.PI*2)*100);
		
		ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
		ctx.beginPath();
		ctx.arc(x, y, this.radius, 
			this.startAngle, this.endAngle, false);
		ctx.arc(x, y, r, this.endAngle, this.startAngle, true);
		ctx.closePath();
		ctx.fillStyle = this.color;
		ctx.fill();
		
		ctx.font = '80px serif';
		ctx.textBaseline = 'middle';
		ctx.textAlign = 'center';
		ctx.fillText(progress, x, y);
	}
}
