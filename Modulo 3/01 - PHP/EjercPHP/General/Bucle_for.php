<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
	  <tr>
		    <th>Head 1</th>
		    <th>Head 2</th>
		   	<th>Head 3</th>
	  </tr>
	  <tr>
	  		<?php for($i=0; $i<3; $i++){ ?>
	  			
	  			<td>elemento <?= $i ?> </td>

	  		<?php } ?>
	  </tr>
	  <tr>
	  		<?php for($i=0; $i<3; $i++){ ?>
	  			
	  			<td>Fila <?= $i ?> </td>

	  		<?php } ?>
	  </tr>
	  

</table>

</body>
</html>
