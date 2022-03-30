<?php
class database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->dbConnect();
    }
    private function dbConnect() {
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link) {
            $this->error = 'Connection error'.$this->link->connect_error;
            return false;
        }
    }

    public function select($query) {
        $result = $this->link->query($query) or die($this->link->error.__LINE__);

        if($result->num_rows>0) {
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($query) {
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_row) {
            header('Location: index.php?msg='.urlencode('Data inserted successfully'));
            exit();
        }
        else{
            die('connection error'.$this->link->error);
        }
    }

    // update data 
    public function update($query) {
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row) {
            header("location: index.php?msg=".urlencode('Data is updated.'));
            exit();
        }else {
            die('not inserted'.$this->link->error);
        }
    }

    // delete data 
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row) {
            header("location: index.php?msg=".urlencode('Data is deleted.'));
            exit();
        }
        else{
            die('not delete'.$this->link->error);
        }
    }
}
?>