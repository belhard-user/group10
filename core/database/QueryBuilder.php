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
            "'" . implode("', '", $data) . "'"
        );

        return $this->db->query($sql);
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function update($table, array $data, array $where)
    {

    }
}