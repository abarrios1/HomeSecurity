<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@extends('layouts.main')

@section('body')
<style>
        .centered {
            margin: 0 auto;
            width: 95%;
        }

        .center {
            text-align: center;
        }

        #btnImg {
            margin-bottom: 10px;
        }
</style>
<div class="center">
<h2 class="blink">JQuery Playground</h2>
</div>
<hr>

<div class="centered">
    <input type="button" name="New Image" id="btnImg" value="New Image">
    <br>
    <img id="newImg" src="" alt="">
</div>
<hr>

<div class="centered">
    <input type="button" name="Random Todo" id="randTodo" value="Random Todos">
    <p id="todo-id"></p>
    <p id="todo-content"></p>
    <p id="isDone"></p>
</div>
<hr>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@endsection


<script>
 
$(document).ready(function() {

function blink_text() {
    $('.blink').fadeOut(1000);
    $('.blink').fadeIn(1000);
}
setInterval(blink_text, 2000);

$('#title').on('click', function() {  
    alert("Welcome to the page!");
});

$('#newImg').attr('src', 'https://dog.ceo/api/breeds/image/random');

$('#btnImg').on('click', function(e) {
    e.preventDefault();

    $.ajax({
        type: "GET",
        url: "https://dog.ceo/api/breeds/image/random",
        dataType: "json",
        success: function (data, textStatus, xhr) {
            var loc = data['message'];
            $('#newImg').attr('src', loc);
        },
        error: function (xhr, textStatus, error) {
            console.log("Error along the way some where....");
        }
    });
});

    $('#randTodo').on('click', function (e) {
        e.preventDefault();
        var rand = Math.floor( (Math.random() * 200) + 1);
        
        $.ajax({
            url: "https://jsonplaceholder.typicode.com/todos/" + rand,  
        }).then(function (data) {
            $('#todo-id').text(data.id);
            $('#todo-content').text(data.title);
            $('#isDone').text(data.completed);
          });

    });

});

window.onload = function() {

var options = {
	title: {
		text: "Type of Manufacturers"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "LLC", y: 36 },
				{ label: "LTD", y: 31 },
				{ label: "INC", y: 7 },
				{ label: "PLC", y: 7 },
				{ label: "Family", y: 6 },
				{ label: "Group", y: 10 },
				{ label: "Others", y: 3 }
			]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>