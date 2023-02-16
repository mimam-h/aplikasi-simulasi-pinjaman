<?php

class mCicilan
{
    private $table = 'cicilan';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setCicilan($total_angsuran,$nomor_angsuran,$id)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES (:jumlah_cicilan,:nomor_angsuran,:id)");
        $this->db->bind('jumlah_cicilan',$total_angsuran);
        $this->db->bind('nomor_angsuran',$nomor_angsuran);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getDetail($jumlah_pembayaran)
    {
        $query = "SELECT id,nomor_angsuran FROM ".$this->table." WHERE jumlah_cicilan=:jumlah_pembayaran LIMIT 1";
        $this->db->query($query);
        $this->db->bind('jumlah_pembayaran',$jumlah_pembayaran);

        return $this->db->single();
    }
    public function updateCicilan($jumlah_cicilan,$nomor_angsuran,$id)
    {
        $query = "UPDATE ".$this->table." SET jumlah_cicilan='0' WHERE id=:id and nomor_angsuran=:nomor_angsuran and jumlah_cicilan=:jumlah_cicilan";
        $this->db->query($query);
        $this->db->bind('jumlah_cicilan',$jumlah_cicilan);
        $this->db->bind('nomor_angsuran',$nomor_angsuran);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getTotalCicilan($nik)
    {
        $query = "SELECT SUM(jumlah_cicilan) as total_angsuran FROM ".$this->table." WHERE id=(SELECT id FROM pinjaman WHERE nik=:nik)";
        $this->db->query($query);
        $this->db->bind('nik',$nik);

        return $this->db->single();
    }

    public function getDaftarCicilan($nik)
    {
        $query = "SELECT * FROM ".$this->table." WHERE id=(SELECT id FROM pinjaman WHERE nik=:nik)";
        $this->db->query($query);
        $this->db->bind('nik',$nik);

        return $this->db->resultSet();
    }
}
