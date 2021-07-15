html----------------------------------------------
<html>
<head>
    <title>Pixel Art Maker!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lab: Pixel Art Maker</h1>
    <h2>Choose Grid Size</h2>
    <form id="sizePicker">
        Grid Height:
        <input type="number" id="inputHeight" name="height" min="1" value="1">
        Grid Width:
        <input type="number" id="inputWidth" name="width" min="1" value="1">
        <input type="submit">
    </form>
    <h2>Pick A Color</h2>
    <input type="color" id="colorPicker">
    <h2>Design Canvas</h2>
    <table id="pixelCanvas"></table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="designs.js"></script>
</body>
</html>

css-------------------------------------------
body {
    text-align: center;
}
h1 {
    font-family: Monoton;
    font-size: 70px;
    margin: 0.2em;
}
h2 {
    margin: 1em 0 0.25em;
}
h2:first-of-type {
    margin-top: 0.5em;
}
table,
tr,
td {
    border: 1px solid black;
}
table {
    border-collapse: collapse;
    margin: 0 auto;
}
tr {
    height: 20px;
}
td {
    width: 20px;
    height: 20px;
}
input[type=number] {
    width: 6em;
}

js---------------------------------------
"use strict";
const $tableElement = $('#pixelCanvas');
const $inputHeight = $('#inputHeight');
const $inputWidth = $('#inputWidth');
const $colorPicker = $('#colorPicker');
$('#sizePicker').submit( event => {
    event.preventDefault();
    let width = $inputWidth.val();
    let height = $inputHeight.val();
    $tableElement.html(''); //clear
    makeGrid(height, width);
    addCellClickListener();
});
function makeGrid(height, width) {
    for(let i = 0; i < height; i++) {
        $tableElement.append('<tr></tr>');
    };
    for(let i = 0; i < width; i++) {
        $('tr').append('<td></td>');
    };
};
function addCellClickListener() {
    $('td').click( event => {
        let color = $colorPicker.val();
        $(event.currentTarget).css("background-color", color)
    });
};
