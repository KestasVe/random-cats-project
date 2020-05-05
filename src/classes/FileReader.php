<?php

class FileReader
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function getCats()
    {
        if (file_exists($this->file)) {
            $catsArray = file($this->file, FILE_IGNORE_NEW_LINES);
            $randCats = array_rand($catsArray, 3);
            $randCatsArray = array($catsArray[$randCats[0]], $catsArray[$randCats[1]], $catsArray[$randCats[2]]);
            return $randCatsArray;
        } else {
            echo 'The file does not exist'.PHP_EOL;
        }
    }
}