<?php
class mUser
{
    private $table = 'user';

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }
    public function setUser($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (:nik,:nama,:alamat,:handphone)";
        $this->db->query($query);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('handphone', $data['handphone']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getUser($nik)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik=:nik');
        $this->db->bind('nik', $nik);

        return $this->db->single();
    }
}
