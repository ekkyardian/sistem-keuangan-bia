<?php
class M_bulan
{
    // variabel connection to mysqli
    private $mysqli;

    // variabel table
    private $table;

    function __construct($conn)
    {
        // set variabel connection
        $this->mysqli = $conn;

        // set variabel table
        $this->table = 'view_bulan';
    }

    function get_bulan()
    {
        $db     = $this->mysqli->conn;

        $sql    = "SELECT * FROM $this->table";

        $query  = $db->query($sql) or die ($db->error);

        return $query;
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }

}