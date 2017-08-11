var particle = {
	x: 0,
	y: 0,
	mouseX: 0,
	mouseY: 0,
	radius: 4.5,
	color: '#ccccff',
	draw: function(ctx) {
		ctx.beginPath();
		ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
		ctx.fillStyle = this.color;
		ctx.fill();
	}
}
