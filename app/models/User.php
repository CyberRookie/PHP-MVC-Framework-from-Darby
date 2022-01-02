<!-- 12/30/21 User model Keep models singular, NOT Users-->
<?php
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        //Create a query to get users
        public function getUsers() {
            $this->db->query("SELECT * FROM users");

            //Create a results variable of objects
            $result = $this->db->resultSet();

            //return the result
            return $result;
        }
    }