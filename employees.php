<?php
$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$company = (isset($_POST['company'])) ? $_POST['company'] : "";
$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : "";
$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : "";
$email_address = (isset($_POST['email_address'])) ? $_POST['email_address'] : "";
$job_title = (isset($_POST['job_title'])) ? $_POST['job_title'] : "";
$business_phone = (isset($_POST['business_phone'])) ? $_POST['business_phone'] : "";
$home_phone = (isset($_POST['home_phone'])) ? $_POST['home_phone'] : "";
$mobile_phone = (isset($_POST['mobile_phone'])) ? $_POST['mobile_phone'] : "";
$fax_number = (isset($_POST['fax_number'])) ? $_POST['fax_number'] : "";
$address = (isset($_POST['address'])) ? $_POST['address'] : "";
$city = (isset($_POST['city'])) ? $_POST['city'] : "";
$state_province = (isset($_POST['state_province'])) ? $_POST['state_province'] : "";
$zip_postal_code = (isset($_POST['zip_postal_code'])) ? $_POST['zip_postal_code'] : "";
$country_region = (isset($_POST['country_region'])) ? $_POST['country_region'] : "";
$web_page = (isset($_POST['web_page'])) ? $_POST['web_page'] : "";
$notes = (isset($_POST['notes'])) ? $_POST['notes'] : "";
$attachments = (isset($_POST['attachments'])) ? $_POST['attachments'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$error=array();

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

include("conexion.php");

switch ($accion) {
    case 'btnAgregar':

        if($first_name==""){
            $error['first_name']="Escribe el nombre";
        }

        if(count($error)>0){
            $mostrarModal=true;
        break;
        }

        $sentencia = $pdo->prepare("INSERT INTO employees(company,last_name,first_name,email_address,job_title,business_phone,home_phone,mobile_phone,fax_number,address,city,state_province,zip_postal_code,country_region,web_page,notes,attachments) 
        VALUES(:company,:last_name,:first_name,:email_address,:job_title,:business_phone,:home_phone,:mobile_phone,:fax_number,:address,:city,:state_province,:zip_postal_code,:country_region,:web_page,:notes,:attachments)");

        $sentencia->bindParam(':company', $company);
        $sentencia->bindParam(':last_name', $last_name);
        $sentencia->bindParam(':first_name', $first_name);
        $sentencia->bindParam(':email_address', $email_address);
        $sentencia->bindParam(':job_title', $job_title);
        $sentencia->bindParam(':business_phone', $business_phone);
        $sentencia->bindParam(':home_phone', $home_phone);
        $sentencia->bindParam(':mobile_phone', $mobile_phone);
        $sentencia->bindParam(':fax_number', $fax_number);
        $sentencia->bindParam(':address', $address);
        $sentencia->bindParam(':city', $city);
        $sentencia->bindParam(':state_province', $state_province);
        $sentencia->bindParam(':zip_postal_code', $zip_postal_code);
        $sentencia->bindParam(':country_region', $country_region);
        $sentencia->bindParam(':web_page', $web_page);
        $sentencia->bindParam(':notes', $notes);
        $sentencia->bindParam(':attachments', $attachments);
        $sentencia->execute();

        header('Location: index.php');
        break;
    case 'btnModificar':
        $sentencia = $pdo->prepare(" UPDATE employees SET

        last_name=:last_name,
        first_name=:first_name,
        email_address=:email_address,
        job_title=:job_title,

        home_phone=:home_phone,
        mobile_phone=:mobile_phone,

        address=:address,
        city=:city WHERE
        id=:id");

        $sentencia->bindParam(':last_name', $last_name);
        $sentencia->bindParam(':first_name', $first_name);
        $sentencia->bindParam(':email_address', $email_address);
        $sentencia->bindParam(':job_title', $job_title);
        $sentencia->bindParam(':home_phone', $home_phone);
        $sentencia->bindParam(':mobile_phone', $mobile_phone);
        $sentencia->bindParam(':address', $address);
        $sentencia->bindParam(':city', $city);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        header('Location: index.php');
        break;
    case 'btnEliminar':
        $sentencia = $pdo->prepare(" DELETE FROM employees WHERE id=:id ");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        header('Location: index.php');
        break;
    case 'btnCancelar':
        header('Location: index.php');
        break;
    case 'Seleccionar':
        $accionAgregar = "disabled";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal=true;
        break;
}
$sentencia = $pdo->prepare("SELECT * FROM employees");
$sentencia->execute();
$listaEmpleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>