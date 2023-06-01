<?php
include_once("config/connection.php");
include_once("models/Member.model.php");
include_once("models/Laundry.model.php");
include_once("views/Member.view.php");
include_once("views/formMember.view.php");

class MemberController
{
    private $member;
    private $laundry;

    function __construct()
    {
        $this->member = new Member(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $this->laundry = new Laundry(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMemberFull();

        $data = array();
        while ($row = $this->member->getResult()) {
            array_push($data, $row);
        }
        $this->member->close();
       
        $view = new MemberView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->member->open();
        $this->member->deleteMember($id);
        $this->member->close();
        header("location:index.php");
    }

    public function add($data)
    {
        $this->member->open();
        $this->member->addMember($data);
        $this->member->close();
        header("location:index.php");
    }

    public function formAdd() 
    {
        $this->laundry->open();
        $this->laundry->getLaundry();
        
        $data = array();
        while ($row = $this->laundry->getResult()) {
            array_push($data, $row);
        }
        $this->laundry->close();
       
        $view = new FormMemberView();
        $view->render($data);
    }

    public function update($id, $data)
    {
        $this->member->open();
        $this->member->updateMember($id, $data);
        $this->member->close();
        header("location:index.php");
    }

    public function formUpdate($id) 
    {
        $this->laundry->open();
        $this->laundry->getLaundry();
     
        $dataLaundry = array();
        while ($row = $this->laundry->getResult()) {
            array_push($dataLaundry, $row);
        }
        $this->laundry->close();

        $this->member->open();
        $this->member->getMemberById($id);
        $dataMember = array();
        while ($temp = $this->member->getResult()) {
            array_push($dataMember, $temp);
        }
        $this->member->close();
        
        $view = new FormMemberView();
        $view->render1($dataLaundry, $dataMember);
    }
}
