<?php
include_once("config/connection.php");
include_once("models/Laundry.model.php");
include_once("views/Laundry.view.php");
include_once("views/formLaundry.view.php");

class LaundryController
{
    private $laundry;

    function __construct()
    {
        $this->laundry = new Laundry(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        $this->laundry->open();
        $this->laundry->getLaundry();

        $data = array();
        while ($row = $this->laundry->getResult()) {
            array_push($data, $row);
        }
        $this->laundry->close();
        
        $view = new LaundryView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->laundry->open();
        $this->laundry->deleteLaundry($id);
        $this->laundry->close();
        header("location:laundry.php");
    }

    public function add($data)
    {
        $this->laundry->open();
        $this->laundry->addLaundry($data);
        $this->laundry->close();
        header("location:laundry.php");
    }

    public function formAdd() 
    {
        $view = new FormLaundryView();
        $view->render();
    }

    public function update($id, $data)
    {
        $this->laundry->open();
        $this->laundry->updateLaundry($id, $data);
        $this->laundry->close();
        header("location:laundry.php");
    }

    public function formUpdate($id) 
    {
        $this->laundry->open();
        $this->laundry->getLaundryById($id);
        
        $dataLaundry = array();
        while ($row = $this->laundry->getResult()) {
            array_push($dataLaundry, $row);
        }
        $this->laundry->close();

        $view = new FormLaundryView();
        $view->render1($dataLaundry);
    }
}
