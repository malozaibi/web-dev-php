<?php
require_once('core/functions.php');

class Car
{
    public $make;
    public $model;
    public $year;

    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    function insertToDB()
    {
        $conn = getConnection();

        $stmt = $conn->prepare("INSERT INTO cars (make, model, year) VALUES (:make, :model, :year)");
        $stmt->bindParam(':make', $this->make);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':year', $this->year);
        $stmt->execute();
    }

    function getDetails()
    {
        return "This $this->make Car is model $this->model Built in Year $this->year";
    }
}
