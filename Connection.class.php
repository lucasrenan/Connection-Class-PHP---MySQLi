<?php

/**
 * Description of connectionclass
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
     * @return Connection
     */
    public static function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}

public function close() {

if(self:_connected) {
parent::close();
self:_connected = false;
}
}
public function close() {

}

?>
