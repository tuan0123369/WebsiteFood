<?php
include_once '../config.php';

class configuration
{
    private  $HOST;
    private  $DBNAME;
    private  $USERNAME;
    private  $PASSWORD;
    private static $conn;

    public function __construct()
    {
        $this->HOST = 'localhost';
        $this->DBNAME = 'food_code';
        $this->USERNAME = 'root';
        $this->PASSWORD = '';
        if (self::$conn = null) {
            $this->connectDB();
        } else {
            //  echo "Lấy kết nối cũ";
            return self::$conn;
        }
    }

    public function __destruct()
    {
        $this->HOST = '';
        $this->DBNAME = '';
        $this->USERNAME = '';
        $this->PASSWORD = "";
        self::$conn = null;
    }

    public function closeConnect()
    {
        self::$conn = null;
        // echo "Đóng kết nối";
    }

    private function connectDB()
    {
        try {
            self::$conn = new PDO("mysql:host=$this->HOST; dbname=$this->DBNAME", $this->USERNAME, $this->PASSWORD);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Tạo kết nối";
        } catch (PDOException $e) {
            // echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function insertData($query, $param = array())
    {
        try {
            $this->connectDB();
            $stm = self::$conn->prepare($query);
            $stm->execute($param);
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->closeConnect();
        }
    }

    public function getData($query, $param = array())
    {
        try {
            $this->connectDB();
            $stm = self::$conn->prepare($query);
            $stm->execute($param);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->closeConnect();
        }
    }

    public function updateData($query, $param = array())
    {
        try {
            $this->connectDB();
            $stm = self::$conn->prepare($query);
            $stm->execute($param);
            return $stm->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->closeConnect();
        }
    }

    public function deleteData($query, $param = array())
    {
        try {
            $this->connectDB();
            $stm = self::$conn->prepare($query);
            $stm->execute($param);
            return $stm->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $this->closeConnect();
        }
    }
}
