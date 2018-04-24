<?php 
if($subsec=="uploading"){
	if(uploadFiles($_POST['sec'])==true){ echo "File OK uploaded ";} 
	else{ echo "File noK uploaded ";} 
}
else{
?>

<form action="index.php" method="post" enctype="multipart/form-data">
	Select work to upload: <br><br>
	<input type="file" name="fileToUpload" id="fileToUpload"  required><br><br>
	<input type="file" name="imageToUpload" id="imaageToUpload" required><br><br>
	<input type="radio" name="sec" value="pelis" CHECKED>Peli
	<input type="radio" name="sec" value="series">Serie
	<input type="radio" name="sec" value="libros">Libro
	<input type="submit" value="uploading" name="seccio">
</form>

<?php 
} 
?>