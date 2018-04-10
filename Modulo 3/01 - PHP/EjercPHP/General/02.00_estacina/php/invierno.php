<div class="invierno">

	<p>Click on the Menu Icon to transform it to "X":</p>

	<div class="container" onclick="myFunction(this)">
	  <div class="bar1"></div>
	  <div class="bar2"></div>
	  <div class="bar3"></div>
	</div>


	<div id="menu">
		<img src="img/invierno.jpg" alt="Invierno">
	</div>

</div>

<script>
function myFunction(x) {
    x.classList.toggle("change");
}
</script>