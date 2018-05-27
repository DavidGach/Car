var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var c = canvas.getContext('2d');

var colors = ['#ff0000E6', '#ff000080', '#ffffffE6', '#ffffff80'];

function getRandomColor() {
	return colors[Math.floor(Math.random() * colors.length)];
}

function getRandomPosition() {
	for(var i = 0; i < dotsArray.length; i++) {
		dotsArray[i].x = Math.random() * canvas.width;
		dotsArray[i].y = Math.random() * canvas.height;
	}
	c.clearRect(0, 0, canvas.width, canvas.height);
	render();
}

function Dot(x, y, radius) {
	this.x = x;
	this.y = y;
	this.radius = radius;

	this.draw = function() {
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
		c.fillStyle = getRandomColor();
		c.fill();
	}
}

var dotsArray = [];

function init() {
	for (var i = 0; i < 10; i++) {
		var x = Math.random() * canvas.width;
		var y = Math.random() * canvas.height;
		var radius = Math.random() * 40 + 10;

		dotsArray.push(new Dot(x, y, radius));
	}
}

function render() {
	for (var i = 0; i < dotsArray.length; i++) {
		dotsArray[i].draw();
	}
}

init();
render();

var arrowL = document.querySelector('#arrow-left');
var arrowR = document.querySelector('#arrow-right');

arrowL.addEventListener('click', function() {
	getRandomPosition();
});

arrowR.addEventListener('click', function() {
	getRandomPosition();
});