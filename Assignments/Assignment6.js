function addCell(cell, num) {
    var pos = document.createTextNode(num);
	var div = document.createElement("div");
	
    cell.appendChild(div);
	div.appendChild(pos);
}

function addRowFunc() {
    var table = document.getElementById("tableID");
    var row = table.insertRow(table.rows.length);
    var i;
		
    for (i = 0; i < table.rows[0].cells.length; i++) {
        addCell(row.insertCell(i), i);
    }
}

function addColFunc() {
    var table = document.getElementById("tableID");
    var i;
		
    for (i = 0; i < table.rows.length; i++) {
        addCell(table.rows[i].insertCell(table.rows[i].cells.length), i);
    }
}

function delRowFunc() {
    var table = document.getElementById("tableID");
	var lastR = table.rows.length - 1;
	
	table.deleteRow(table.rows.length - 1);
}
 
function delColFunc() {
    var table = document.getElementById("tableID");
    var lastC = table.rows[0].cells.length - 1;
    var i;
		
    for (i = 0; i < table.rows.length; i++) {
        table.rows[i].deleteCell(lastC);
    }
}