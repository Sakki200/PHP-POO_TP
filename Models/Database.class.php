<?php

abstract class Database
{
    protected $db;

    public function __construct()
    {
        //BIEN VERIFIER LE PORT, LE MIEN EST 3308
        $this->db = new PDO("mysql:host=localhost;port=3308;dbname=blogtp;charset=utf8", 'root', '');
    }
}
