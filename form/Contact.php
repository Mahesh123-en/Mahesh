<?php
class Contact {
    private $conn;

    public function __construct($servername, $username, $password, $databasename) {
        $this->conn = new mysqli($servername, $username, $password, $databasename);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insert($name, $last, $email, $date, $gender, $description, $city, $photo) {
        $sql = "INSERT INTO contacts (Name, Last, Email, date, Gender, Description, city, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssss", $name, $last, $email, $date, $gender, $description, $city, $photo);
        return $stmt->execute();
    }

    public function getAllContacts() {
        $sql = "SELECT * FROM contacts";
        return $this->conn->query($sql);
    }

    public function getContactById($id) {
        $sql = "SELECT * FROM contacts WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $name, $last, $email, $date, $gender, $description, $city, $photo) {
        $sql = "UPDATE contacts SET Name=?, Last=?, Email=?, date=?, Gender=?, Description=?, city=?, photo=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $name, $last, $email, $date, $gender, $description, $city, $photo, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        echo " hello";
        return $stmt->execute();
    }
    public function checkEmail($email,$id=null) {
       // $sql="SELECT * FROM users WHERE email = ?";
        $sql = "SELECT count(id) as counter FROM contacts WHERE email = ?";

        if($id!=null){
            $sql .= " AND id = ? ";
        }
         $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $email);

        if($id!=null){
            $stmt->bind_param("s", $id);
        }
          
         $stmt->execute();
          return $result = $stmt->get_result()->fetch_assoc();;
        


    }



    
}
?>
