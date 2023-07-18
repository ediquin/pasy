<?php
include('conexion.php');

if (isset($_POST)) {
    $db = $pdo;
    $name = $_POST['pet_name'];
    $specie = $_POST['pet_specie'];
    $gender = $_POST['pet_gender'];
    $age_years = $_POST['pet_age_years'];
    $age_months = $_POST['pet_age_months'];
    $size = $_POST['pet_size'];
    $health = $_POST['pet_health'];
    $care = $_POST['pet_health_details'];
    $temperament = $_POST['pet_mood'];
    $description = $_POST['pet_mood_details'];
    $address = $_POST['pet_address'];
    $pet_shelter = $_POST['pet_shelter'];
    $imagen = $_FILES['pet_upload_photo']["name"];
    $fecha = new DateTime();
	$nombreArchivo = ($imagen!="")?$fecha->getTimestamp()."_".$_FILES["pet_upload_photo"]["name"]:"imagen.jpg";
	$tmpFoto = $_FILES["pet_upload_photo"]["tmp_name"];
	if($tmpFoto!=""){
		move_uploaded_file($tmpFoto, "./bd_img/".$nombreArchivo);
	}

		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO mascotas (name, specie, gender, age_years, age_months, size, health, care, temperament, description, address, pet_shelter, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$stmt->execute([$name, $specie, $gender, $age_years, $age_months, $size, $health, $care, $temperament, $description, $address, $pet_shelter, $nombreArchivo]) ? 'Usuario guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
		print_r($stmt);

	//cerrar la conexion
	$db = null;
}


?>
