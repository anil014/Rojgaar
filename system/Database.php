<?php

class Database
{
    private $_connection = null;
    private static $_instance = null;

    public function __construct()
    {
        $this->Connection();
    }

    private function Connection()
    {
        try {
            $this->_connection = new PDO("mysql:host=127.0.0.1;dbname=rojgar", 'root', '');
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }


    }

    public static function Instance()
    {
        if (!isset(self::$_instance)) {
            return self::$_instance = new Database();
        }

        return self::$_instance;
    }

    public function Mandatory($tableName, $data = array())
    {
        if (empty($tableName) && empty($data)) throw new PDOException('table name & data filed is required');

    }

    public function Insert($tableName = '', $data = array())
    {
        $this->Mandatory($tableName, $data);
        $columns = implode(',', array_keys($data));
        $getColumnsValue = array_values($data);
        $x = 1;
        $setColumns = '';
        foreach ($data as $key => $val) {
            $setColumns .= ' ?';
            if ($x < count($data)) {
                $setColumns .= ",";
            }

            $x++;

        }

        $query = "INSERT INTO {$tableName} ($columns) VALUES({$setColumns})";


        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($getColumnsValue)) {
                return $this->_connection->lastInsertId();
            }

        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;

    }

    public function Update($tableName = '', $data = array(), $criteria = '', $bindValue = array())
    {
        $this->Mandatory($tableName, $data);
        if (empty($criteria) && empty($bindValue)) throw new PDOException('criteria & bind value filed is required');

        $increment = 1;
        $setColumns = '';
        $mergeValue = array_merge(array_values($data), $bindValue);
        foreach ($data as $columns => $dataValue) {
            $setColumns .= $columns . '=?';
            if ($increment < count($data)) {
                $setColumns .= ', ';
            }

            $increment++;

        }

        $query = "UPDATE $tableName SET $setColumns WHERE $criteria";

        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($mergeValue)) {
                return true;
            }

        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;


    }

    public function Delete($tableName = '', $criteria = '', $bindValue = array())
    {
        $this->Mandatory($tableName, $bindValue);
        $query = "DELETE FROM {$tableName} WHERE $criteria ";
        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                return true;
            }

        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;


    }

    public function Select($query = '', $bindValue = array())
    {
        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                return $prepareStatement->fetchALL(PDO::FETCH_CLASS);

            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

    }

    public function SelectBy($query = '', $bindValue = array())
    {
        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                return $prepareStatement->fetchALL(PDO::FETCH_CLASS);


            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

    }

    public function SelectAll($tableName = '', $columns = array(), $bindValue = array())
    {
        if (empty($tableName)) throw new PDOException('table name not set');
        if (empty($columns)) $columns = '*';
        else
            $columns = implode(',', $columns);
        $query = "SELECT {$columns} FROM {$tableName}";
        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                $result = $prepareStatement->fetchALL(PDO::FETCH_CLASS);
                return $result;
            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;
    }

    public function SelectByCriteria($tableName = '', $columns = '', $criteria = '', $bindValue = array())
    {
        if (empty($tableName) && empty($criteria)) throw new PDOException('table name & criteria required');
        if (empty($columns)) $columns = '*';
        else
            $columns = implode(',', $columns);
        $query = "SELECT {$columns} FROM {$tableName} WHERE {$criteria}";

        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                $result = $prepareStatement->fetchALL(PDO::FETCH_CLASS);
                return $result[0];
            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;

    }

    public function SelectOrderBy($tableName = '', $columns = array(), $bindValue = array(), $clause = '')
    {
        if (empty($tableName)) throw new PDOException('table name not set');
        if (empty($columns)) $columns = '*';
        else
            $columns = implode(',', $columns);
        $query = "SELECT {$columns} FROM {$tableName} ORDER BY $clause";

        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                $result = $prepareStatement->fetchALL(PDO::FETCH_CLASS);
                return $result;
            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;

    }

    public function Count($tableName = '', $criteria = '', $bindValue = array())
    {
        if (empty($tableName)) throw new PDOException('table name not set');
        $query = "SELECT COUNT(*) as Total_data FROM {$tableName}";
        if (!empty($criteria) && !empty($bindValue)) {
            $query .= " WHERE " . $criteria;
        }

        $prepareStatement = $this->_connection->prepare($query);
        try {
            if ($prepareStatement->execute($bindValue)) {
                $result = $prepareStatement->fetchALL(PDO::FETCH_COLUMN);
                return $result[0];
            }


        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return false;


    }

}

