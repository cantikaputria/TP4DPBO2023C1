<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Laundry.controller.php");

$laundry = new LaundryController();
$laundry->index();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        $laundry->delete($id);
    }
}
