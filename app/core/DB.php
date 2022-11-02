<?php
class DB
{
    public $link;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'nhansu';
    function __construct()
    {
        $this->link = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->link, $this->dbname);
        mysqli_query($this->link, "SET NAME 'utf8'");
    }
}
