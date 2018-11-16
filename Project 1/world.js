// Any live cell with fewer than two live neighbours dies, as if caused by under-population.
// Any live cell with two or three live neighbours lives on to the next generation.
// Any live cell with more than three live neighbours dies, as if by overcrowding.
// Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.

/*Requirements:

Create a variable sized table. (prompt the user)
The background color of the cells will deturmine life.
The cells can be turned on or off with a mouse click.
Display the current generation. 
Create a button for each of the following functions:
Start the game
Stop the game
Increment 1 generation 
Increment 23 generations
Reset the game(Population=0 or other, Generation=0)*/

var newGame = function(targetElementId, worldWidth, worldHeight, xCellCount, yCellCount){
	var world = this;
	var livingCellsColor = prompt("Enter a color for the living cells (i.e red, blue, yellow, lightgreen, etc.)")
	var updateRate = 110;
	
	world.canvas = document.getElementById(targetElementId);
	world.ctx = world.canvas.getContext("2d");

	world.button = document.getElementById("start");
	var startButton = document.getElementById("start");
	var stopButton = document.getElementById("stop");
	var restartButton = document.getElementById("restart");
	var increment1Button = document.getElementById("inc1");
	var increment23Button = document.getElementById("inc23");
	
	var body = document.getElementsByTagName('body')[0];
	body.style.margin = '0px';
	body.style.overflow = "hidden";
	
	worldWidth = world.canvas.width = 475;
  	worldHeight = world.canvas.height = 475;

  	xCellCount = xCellCount;
  	yCellCount = yCellCount;

  	var cellW = world.canvas.width / xCellCount;
  	var cellH = cellW;

  	var grid = new gameWorld(xCellCount, yCellCount);

	var hasClicked = false;
	var hasBeenClicked = function(event){
		var x = event.pageX - world.canvas.offsetLeft;
		var y = event.pageY - world.canvas.offsetTop;
		
		var i = Math.floor(x / cellW);
		var j = Math.floor(y / cellH);

		grid.getCell(i, j).isAlive = !(grid.getCell(i, j).isAlive);
		return;
	};

	var startGame = false;
	var generationNum = 0;
	var increment1 = false, increment23 = false;

	startButton.onclick = function(event_C){
		startGame = true;
	};
	
	stopButton.onclick = function (event_C) {
		startGame = false;
	};
	
	restartButton.onclick = function (event_C) {
		location.reload();
	};
	
	increment1Button.onclick = function (event_C) {
		increment1 = true;
		if (startGame == false) {
			startGame = true;
			generationNum += 1;
			world.update();
			world.draw();
			startGame = false;
		} else {
			generationNum += 1;
			world.update();
			world.draw();
		}
		increment1 = false;
		
		grid.updateLiving();
		textNode.nodeValue = "Current generation: " + generationNum;
		paragraph.appendChild(textNode);
		var divElement = document.getElementById("textDiv");
		divElement.appendChild(paragraph);
	};
	
	increment23Button.onclick = function (event_C) {
		increment23 = true;
		if (startGame == false) {
			startGame = true;
			for (var i = 0; i < 23; i++) {
				world.update();
				world.draw();
				generationNum++;
				grid.updateLiving();
			}
			startGame = false;
		} else {
			for (var i = 0; i < 23; i++) {
				world.update();
				world.draw();
				generationNum++;
				grid.updateLiving();
			}
		}
		increment23 = false;
		
		textNode.nodeValue = "Current generation: " + generationNum;
		paragraph.appendChild(textNode);
		var divElement = document.getElementById("textDiv");
		divElement.appendChild(paragraph);
	};

	window.onresize = function(event_C){
		worldWidth = world.canvas.width = 500;
  		worldHeight = world.canvas.height = 500;
	};
	
	world.canvas.addEventListener('mousedown', function(event){
		hasClicked = true;
		hasBeenClicked(event);
		world.canvas.addEventListener('mousemove', hasBeenClicked);
	});

	world.canvas.addEventListener('mouseup', function(event){
		hasClicked = false;
		world.canvas.removeEventListener('mousemove', hasBeenClicked);
	});

	world.start = function(){
		setInterval(function(){
			world.update();
			world.draw();
		}, updateRate);

	};

	var paragraph = document.createElement("paragraph");
	var textNode = document.createTextNode(generationNum);

	world.update = function(){
		if(startGame == true && increment1 == false && increment23 == false){
			grid.updateLiving();
			generationNum++;
			
			textNode.nodeValue = "Current generation: " + generationNum;
			paragraph.appendChild(textNode);
			var divElement = document.getElementById("textDiv");
			divElement.appendChild(paragraph);
		}
	};

	world.draw = function() {
		world.ctx.fillStyle = 'white';
	 	world.ctx.fillRect(0, 0, world.canvas.width, world.canvas.height);

	 	//For cells that are alive
	 	grid.filter(function(cell){
	 		return cell.isAlive;
	 	}).forEach(function(cell){
	 		world.ctx.fillStyle = livingCellsColor;
	 		world.ctx.fillRect(cell.x * cellW, cell.y * cellH, cellW, cellH);
	 	});

	 	
	 	world.ctx.fillStyle = 'grey';
	 	for(var i = 0; i <= worldWidth; i += cellW){
	 		world.ctx.beginPath();
	 		world.ctx.moveTo(i, 0);
	 		world.ctx.lineTo(i, worldHeight);
	 		world.ctx.stroke();
	 	};

	 	for(var j = 0; j <= worldHeight; j += cellH){
	 		world.ctx.beginPath();
	 		world.ctx.moveTo(0, j);
	 		world.ctx.lineTo(worldWidth, j);
	 		world.ctx.stroke();	
	 	};
	};

	return world;
};

var worldDimensions = prompt("Enter a number for the dimensions of the world (30 would be 30x30)");
var gameOfLife = new newGame("game", 600, 600, worldDimensions, worldDimensions);
gameOfLife.start();