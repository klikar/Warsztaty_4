<?php

class General {

    static private $data;
    public $post;
    public $files;

    public function __construct()
    {
        $this->post = $_POST;
        $this->files = $_FILES;
    }

    static function getData(){
        return General::$data;
    }

    public function render(string $pathToFile, $data = [])
    {
        if(!empty($data)){
            General::$data = $data;
        }

        require ($pathToFile);
    }

    public static function getConnection()
    {
        $configDB = array(
            'servername' => "localhost",
            'username' => "root",
            'password' => "marecki@123",
            'baseName' => "shop"
        );

        $conn = new mysqli($configDB['servername'], $configDB['username'], $configDB['password'], $configDB['baseName']);

        if ($conn->connect_error) {
            die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
        }

        return $conn;
    }


    public function is_post()
    {
        if(!empty($this->post)){
            return true;
        }

        return false;
    }

    public function redirect(string $destiny)
    {
        header('location:'. '/Warsztaty_4/src/index.php' . $destiny);
    }

    //Dodane na potrzeby Panelu
    public function panelRedirect($location)
    {
        header("location: {$location}");    ;
    }
}
