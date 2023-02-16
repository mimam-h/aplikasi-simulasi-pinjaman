<?php

class Pinjaman extends Controller
{
    public function index($nik)
    {
        $data['Page'] = 'Data Angsuran';
        $this->view('templates/header',$data);
        $data['user'] = $this->model('mUser')->getUser($nik);
        $data['pinjaman'] = $this->model('mPinjaman')->getPinjaman($nik);
        $data['data_angsuran'] = $this->model('mCicilan')->getDaftarCicilan($nik);
        $this->view('user/index',$data);
        $this->view('pinjaman/index',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {   
        $data['Page'] = 'Data Baru';
        if (($this->model('mUser')->setUser($_POST)>0)&&($this->model('mPinjaman')->setPinjaman($_POST)>0)) {
            $data['pinjaman'] = $_POST;
            header('Location: ' . BASEURL . '/pinjaman/angsuran/'.$data['pinjaman']['nik']);
        }
    }
    public function angsuran($nik)
    {
        $data['pinjaman'] = $this->model('mPinjaman')->getPinjaman($nik);
        $bunga = 0;
        if($data['pinjaman']['nilai_pinjaman']<=20000000){
            $bunga = 0.005;
        }else{
            $bunga = 0.1;
        }
        $angsuranPokok = $data['pinjaman']['nilai_pinjaman']/$data['pinjaman']['tenor'];
        $saldoPokok = $data['pinjaman']['nilai_pinjaman'];
        for($i = 1; $i<= $data['pinjaman']['tenor']; $i++){
            $nomor_angsuran = $i;
            $besaran_bunga = $saldoPokok * $bunga;
            $total_angsuran = $angsuranPokok + $besaran_bunga;
            $saldoPokok = $saldoPokok - $angsuranPokok;
            $this->model('mCicilan')->setCicilan($total_angsuran,$nomor_angsuran,$data['pinjaman']['id']);
        }
        header('Location: ' . BASEURL . '/pinjaman/index/'.$nik);
    }
    public function total()
    {
        $data['Page'] = 'Total Sisa Angsuran';
        $data['user'] = $this->model('mUser')->getUser($_POST['nik']);
        $data['pinjaman'] = $this->model('mPinjaman')->getPinjaman($_POST['nik']);
        $data['data_angsuran'] = $this->model('mCicilan')->getTotalCicilan($_POST['nik']);
        $this->view('templates/header',$data);
        $this->view('user/index',$data);
        $this->view('pinjaman/total',$data);
        $this->view('templates/footer');
    }
    public function bayar()
    {   
        $data['Page'] = 'Bayar Angsuran';
        $data['user'] = $this->model('mUser')->getUser($_POST['nik']);
        $data['pinjaman'] = $this->model('mPinjaman')->getPinjaman($_POST['nik']);
        $data['daftar_angsuran'] = $this->model('mCicilan')->getDaftarCicilan($_POST['nik']);
        $this->view('form/headerKecilBayar',$data);
        $this->view('user/index',$data);
        $this->view('pinjaman/bayar',$data);
        $this->view('templates/footer');
    }
    public function search()
    {
        $data['jumlah_pembayaran'] = $_POST;
        $data['data_pinjaman'] = $this->model('mCicilan')->getDetail($data['jumlah_pembayaran']['pembayaran']);
        header('Location: '. BASEURL . '/pinjaman/update/'.$data['data_pinjaman']['id'].'/'.$data['data_pinjaman']['nomor_angsuran'].'/'.$data['jumlah_pembayaran']['pembayaran']);
    }
    public function update($id_pinjaman,$nomor_angsuran,$nilai_pembayaran)
    {
        if ($this->model('mCicilan')->updateCicilan($nilai_pembayaran,$nomor_angsuran,$id_pinjaman)) {
            $data['id_pinjaman'] = $this->model('mPinjaman')->getNIKPinjaman($id_pinjaman);
            header('Location: ' . BASEURL . '/pinjaman/index'.'/'.$data['id_pinjaman']['nik']);
        }
    }
}