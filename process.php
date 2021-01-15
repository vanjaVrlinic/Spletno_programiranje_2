<?php 
session_start();

//Connection
$mysqli = new mysqli('localhost', 'root', 'madagaskar', 'crud') or die(mysqli_error($mysqli));

//Vrednosti postavljene na null
$id = 0;
$update = false;
$name = '';
$lastname = '';
$address = '';
$post = '';
$post_code = '';

//Dodajanje v podatkovno bazo
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $post = $_POST['post'];
    $post_code = $_POST['post_code'];
    $mysqli->query("INSERT INTO data(name, lastname, address, post, post_code) VALUES('$name', '$lastname', '$address', '$post', '$post_code')") or die($mysqli->error);

    $_SESSION['message'] = "Uspešno shranjeno!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");	
}

//Brisanje iz podatkovne baze
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Uspešno izbrisano!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

//Urejanje
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());

    if(count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $lastname = $row['lastname'];
        $address = $row['address'];
        $post = $row['post'];
        $post_code = $row['post_code'];
    }

}

//Shranjevanje urejanja
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $post = $_POST['post'];
    $post_code = $_POST['post_code'];

    $mysqli->query("UPDATE data SET name='$name', lastname='$lastname', address='$address', post='$post', post_code='$post_code' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Uspešno posodobljeno!";
    $_SESSION['msg-type'] = "warning";

    header('location: index.php');
}
?>

