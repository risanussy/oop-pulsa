<?php

    class Connection {
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'pulsa';

        protected function conn(){
            return mysqli_connect($this->host, $this->user, $this->password, $this->database);
        }
    }