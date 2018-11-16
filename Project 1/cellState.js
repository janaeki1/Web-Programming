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

	var Cell = function(x, y, cellArray){
		var currentCell = this;
		currentCell.isAlive = false;
		currentCell.x = x;
		currentCell.y = y;
		
		currentCell.distance = function(cell) {
			return Math.abs(cell.x - currentCell.x) + Math.abs(cell.y - currentCell.y);
		};

		currentCell.neighbors = null;	
		currentCell.getAdjacent = function(){
			
			return currentCell.neighbors.filter(function(cell){
				return cell.isAlive;
			}).length;
		};
		return currentCell;
	};

	var gameWorld = function(w, h){
		var currentCell = this;
		var cellArray = new Array(w * h);

		for(var i = 0; i < w; i++){
			for(var j = 0; j < h; j++){
				(function(){
					cellArray[i + j * w] = new Cell(i, j, cellArray);
				})();			
			}
		}

		cellArray.forEach(function(cell){
			cell.neighbors = cellArray.filter(function(cell2){
				var dx = Math.abs(cell2.x - cell.x);
				var dy = Math.abs(cell2.y - cell.y);
				return (dx === 1 && dy === 1 ) || (dx === 1 && dy === 0) || (dx === 0 && dy === 1);
			});
		});

		currentCell.filter = function(fcn){
			return cellArray.filter(fcn);
		};

		currentCell.updateLiving = function(){
			
			var overCrowding = cellArray.filter(function(cell){
				return cell.isAlive && (cell.getAdjacent() > 3);
			});

			var lowPop = cellArray.filter(function(cell){
				return cell.isAlive && (cell.getAdjacent() < 2);
			})

			var newCell = cellArray.filter(function(cell){
				return !cell.isAlive && cell.getAdjacent() === 3;
			});

			var stillAlive = cellArray.filter(function(cell){
				return cell.isAlive && (cell.getAdjacent() === 2 || cell.getAdjacent() === 3);
			});

			overCrowding.concat(lowPop).forEach(function(cell){
				cell.isAlive = false;
			});

			newCell.forEach(function(cell){
				cell.isAlive = true;
			});
			stillAlive.forEach(function(cell){
				cell.isAlive = true;
			});

		};

		currentCell.getCell = function(x, y){
			return cellArray[x + y * w];
		};

		return currentCell;
	}