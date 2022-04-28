<?php

require_once(__DIR__ . '/dbh.php');

class Crud extends DatabaseHandler
{

    public function create($firstValues, $secondValues)
    {
        $firstSql = "INSERT INTO products VALUES (?,?,?,?)";
        $secondSql = "INSERT INTO products_description VALUES (?,?)";
        $firstStmt = $this->connect()->prepare($firstSql);
        $firstStmt->execute([$firstValues['sku'], $firstValues['name'], $firstValues['price'], $firstValues['type']]);
        $secondStmt = $this->connect()->prepare($secondSql);
        $secondStmt->execute([$secondValues['sku'], $secondValues['description']]);
    }

    public function read($where)
    {
        $sql = "SELECT sku FROM products WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$where]);
        return $stmt->fetchAll();
    }

    public function readAll()
    {
        $sql = "SELECT * FROM products inner join products_description on products.sku = products_description.sku";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function delete($sku){
        $sql = "DELETE FROM products WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);
    }
}
