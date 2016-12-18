<?php

namespace Core\Database;

class QueryBuilder
{
    /** @var  mysqli */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($table, array $data)
    {
        $keys = array_keys($data);
        // INSERT INTO %s (%s) VALUES ('%s')
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', $keys),
            ":" . implode(", :", $keys)
        );
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";

        return $this->db->query($sql)->fetchAll();
    }

    public function update($table, $setFields, $whereFields, $op='AND')
    {
        $keys = array_keys($whereFields);

        $set = implode(', ', array_map(function ($v, $k) {
            return sprintf("%s='%s'", $k, $v);
        }, array_values($setFields), array_keys($setFields)));

        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s',
            $table,
            $set,
            implode(" = ? $op ", $keys) . ' = ? '
        );

        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values($whereFields));
    }
}