<?php

class LogWriter
{
    private $con;
    private $uri;
    private $file;
    private $time;
    private $cats;
    private $countAll;
    private $countN;

    public function __construct($con, $uri, $file, $time, $cats)
    {
        $this->con = $con;
        $this->uri = $uri;
        $this->file = $file;
        $this->time = $time;
        $this->cats = $cats;

        $sumQuery = mysqli_query($this->con, "SELECT SUM(countN) AS viewsTotal FROM views");
        $viewsAll = mysqli_fetch_array($sumQuery);
        $this->countAll = $viewsAll['viewsTotal'];

        $query = mysqli_query($this->con, "SELECT * FROM views WHERE N = '$this->uri'");
        $viewsN = mysqli_fetch_array($query);
        $this->countN = $viewsN['N'];
    }

    public function writeLogFile()
    {
        $currentLog = file_get_contents($this->file);
        $cat1 = $this->cats[0];
        $cat2 = $this->cats[1];
        $cat3 = $this->cats[2];
        $currentLog .= "{ \"datetime\": \"$this->time\", \"N\": \"$this->uri\", \"Cats\": [\"$cat1\", \"$cat2\", \"$cat3\"], \"countAll\": $this->countAll, \"countN\": $this->countN }\n";
        file_put_contents($this->file, $currentLog);
    }
}