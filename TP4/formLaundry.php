<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Laundry.controller.php");

$laundry = new LaundryController();

if (isset($_POST['btn-submit'])) {
    $laundry->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $laundry->formUpdate($id); 
    }
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $laundry->update($id, $_POST);
} else {
    $laundry->formAdd(); 
}
