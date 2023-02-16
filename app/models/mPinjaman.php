<?php
class mPinjaman{
    private $table = 'pinjaman';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setPinjaman($data)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES (:nilai_pinjaman,:tenor,'',:nik)");
        $this->db->bind('nik',$data['nik']);
        $this->db->bind('nilai_pinjaman',$data['nilai_pinjaman']);
        $this->db->bind('tenor',$data['tenor']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function getPinjaman($nik)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik=:nik');
        $this->db->bind('nik',$nik);

        return $this->db->single();
    }

    public function getIdPinjaman($nik)
    {
        $this->db->query('SELECT id FROM ' . $this->table . ' WHERE nik=(SELECT nik FROM user WHERE nik=:nik');
        $this->db->bind('nik',$nik);

        return $this->db->single();
    }
    public function getNIKPinjaman($id)
    {
        $this->db->query('SELECT nik FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);

        return $this->db->single();
    }
}