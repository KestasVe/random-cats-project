<?php

class Updater
{
    private $con;
    private $uri;

    public function __construct($con, $uri)
    {
        $this->con = $con;
        $this->uri = $uri;
    }

    public function updateDatabase()
    {
        $query = mysqli_query($this->con, "SELECT * FROM views WHERE N = '$this->uri'");
        if (mysqli_num_rows($query) > 0) {
            mysqli_query($this->con, "UPDATE views SET countN = countN+1 WHERE N = '$this->uri'");
        } else {
            mysqli_query($this->con, "INSERT INTO views (N, countN) VALUES ('$this->uri', '1')");
        }
    }
}