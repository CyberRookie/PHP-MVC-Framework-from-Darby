<!-- 12/30/21 Create our database connection with private properties-->
<?php
    class Database {
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASS;
        private $dbName = DB_NAME;

        private $statement;
        private $dbHandler;
        private $error;

        //Create a function when we need a connection to the db
        //using a PDO
        public function __construct() {
            $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            //Create an associative array with error handling
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //create a try/catch and print out the error message
            try {
                //create a new PDO using existing parameters in case one is already open
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);

            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }

        } 

        //Method to allow us to create queries
        public function query($sql) {
            $this->statement = $this->dbHandler->prepare($sql);           
        }

        //bind values with 3 parameters, type is equal to data type;
       // if it's an integer, we set the type to param_int
        public function bind($parameter, $value, $type = null) {
            //check for null value, int, or the default string
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                        case is_null($value):
                            $type = PDO::PARAM_NULL;
                            break;
                        default:
                            $type = PDO::PARAM_STR;
            }
            //bind the values if everything is good
            $this->statement->bindValue($parameter, $value, $type);
        }

        //Execute the prepared statement outside of bind function
        public function execute(){
            return $this->statement->execute();
        }

        //Return an array of all the results fetchAll
        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        
        //Return a specific row as an object if someone logs in, single user, fetch
        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //Get's the row count, update queries for that row
        public function rowCount() {
            return $this->statement->rowCount();
        }
    }