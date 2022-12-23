<?php
require_once("models/calendar.php");
header('Content-Type: application/json; charset=utf-8');
class apiController
{
    private $calendar;

    public function __construct()
    {
        $this->calendar=new Calendar();
    }
    public function activities($params)
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "POST":
                $this->createActivity();
                break;
            case "GET":
                if ($params) {
                    $this->getActivity($params);
                } else {
                    $this->getActivities();
                }
                break;
            case "PUT":
                $this->updateActivity($params);
                break;
            case "DELETE":
                $this->deleteActivity($params);
                break;
        }
    }

    public function createActivity()
    {
        $resp = file_get_contents("php://input"); // get data form in json format

        $data = json_decode($resp, true);     
        $title=$this->calendar->clean_input($data["title"]);         
        $this->calendar->setTitle($title);
        $this->calendar->setStartDate($data["start_date"]);
        $this->calendar->setEndDate($data["end_date"]);
        $description=$this->calendar->clean_input($data["description"]);
        $this->calendar->setDescription($description);
        $response = $this->calendar->createActivity();
        echo $response;
    }

    public function getActivities()
    {
        $response = $this->calendar->getActivities();
        echo $response;
    }
    public function getActivity($params)
    {
        $id = $params;
        $this->calendar->setId($id);
        $response = $this->calendar->getActivity();
        echo $response;
    }
    public function updateActivity($params)
    {
        $id = $params;
        $resp = file_get_contents("php://input"); // get data form in json format
        $data = json_decode($resp, true); // get data in array
        $this->calendar->setId($id);
        $title=$this->calendar->clean_input($data["title"]);         
        $this->calendar->setTitle($title);
        $this->calendar->setStartDate($data["start_date"]);
        $this->calendar->setEndDate($data["end_date"]);
        $description=$this->calendar->clean_input($data["description"]);
        $this->calendar->setDescription($description);
        $response = $this->calendar->updateActivity();
        echo $response;
    }
    public function deleteActivity($params)
    {
        $id = $params;
        $this->calendar->setId($id);
        $response = $this->calendar->deleteActivity();
        echo $response;
    }
}
