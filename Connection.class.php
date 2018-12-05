<?php

/**
 * Description of Connection
 *
 * @author Lucas
 */
class Connection extends mysqli {

    /**
     *
     * @var bool
     */
    private static $_connected = false;

    /**
     *
     * @var Connection
     */
    private static $_instance = null;

    /**
     *
     */
    public function  __destruct() {
        $this->close();
    }

    /**
     *
     * @return Connection
     */
    public static function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     *
     */
    public function connect() {
        if(!self::$_connected) {
            parent::__construct(
                    "localhost",
                    "user",
                    "pass",
                    "database"
            );

            if(mysqli_connect_errno()) {
                throw new Exception("Connection failed: ".mysqli_connect_error());
            }

            self::$_connected = true;
        }
    }

    /**
     *
     */
    public function close() {
        if(self::$_connected) {
            parent::close();
            self::$_connected = false;
        }
    }

    /**
     *
     * @param string $sql
     * @return mysqli_result
     */
    public function query($sql) {
        $this->connect();
        $result = parent::query(mysqli::escape_string($sql));

        if($result) {
            return $result;
        }
        else {
            throw new Exception('Query Exception: '.mysqli_error($this).' num:'.mysqli_errno($this));
        }
    }

}

?>
