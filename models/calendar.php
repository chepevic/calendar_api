<?php
class Calendar
{
    private $db;
    private $id;
    private $title;
    private $start_date;
    private $end_date;
    private $description;

    public function __construct()
    {
        $this->db = Conexion::Connect();
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    //end setters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getStartDate()
    {
        return $this->start_date;
    }
    public function getEndtDate()
    {
        return $this->end_date;
    }

    public function getDescription()
    {
        return $this->description;
    }
    //end getters

    public function createActivity()
    {
        try {
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO activities VALUES (?,?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute(array(NULL, $this->getTitle(), $this->getDescription(), $this->getStartDate(), $this->getEndtDate(), "calendar"));
            $response = $query->rowCount();
            if ($response == 1) {
                $message = ["message" => "activity was created"];
                $data = json_encode($message, http_response_code(201));
                return $data;
            } else {
                $error = ["message" => "activity was not created"];
                $data = json_encode($error, http_response_code(500));
            }
        } catch (PDOException $e) {
            echo $sql . "," . $e->getMessage();
        }
    }

    public function getActivities()
    {
        try {
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM activities";
            $query = $this->db->prepare($sql);
            $query->execute();
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            // DATA IN ARRAY FROMAT
            if ($response) {
                $data = json_encode($response, http_response_code(200));
                return $data;
                //DATA IN JSON FORMAT IF IT IS REQUIRED
            } else {
                $error = ["message" => "data not found"];
                $data = json_encode($error, http_response_code(500));
                return $data;
            }
        } catch (PDOException $e) {
            echo $sql . "," . $e->getMessage();
        }
    }
    public function getActivity()
    {
        try {
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM activities WHERE id=?";
            $query = $this->db->prepare($sql);
            $query->execute(array($this->getId()));
            $response = $query->fetch(PDO::FETCH_ASSOC);
            
            if ($response) {
                $data = json_encode($response, http_response_code(200));
                return $data;
           
            } else {
                $error = ["message" => "activity not found"];
                $data = json_encode($error, http_response_code(400));
                return $data;
            }
        } catch (PDOException $e) {
            echo $sql . "," . $e->getMessage();
        }
    }
    public function updateActivity()
    {
        try {
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE activities SET title=?, description=?, start=?, end=? WHERE id=?";
            $query = $this->db->prepare($sql);
            $query->execute(array($this->getTitle(), $this->getDescription(), $this->getStartDate(), $this->getEndtDate(), $this->getId()));
            $response = $query->rowCount();
            if ($response == 1) {
                $message = ["message" => "activity was updated"];
                $data = json_encode($message, http_response_code(200));
                return $data;
            } else {
                $error = ["message" => "activity was not updated"];
                $data = json_encode($error, http_response_code(500));
                return $data;
            }
        } catch (PDOException $e) {
            echo $sql . "," . $e->getMessage();
        }
    }
    public function deleteActivity()
    {
        try {
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM activities WHERE id=?";
            $query = $this->db->prepare($sql);
            $query->execute(array($this->getId()));
            $response = $query->rowCount();
            if ($response == 1) {
                $message = ["message" => "activity was deleted"];
                $data = json_encode($message, http_response_code(200));
                return $data;
            } else {
                $error = ["message" => "activity was not deleted"];
                $data = json_encode($error, http_response_code(500));
                return $data;
            }
        } catch (PDOException $e) {
            echo $sql . "," . $e->getMessage();
        }
    }

    public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}
