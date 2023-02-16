<?php

class Angsuran extends Controller
{
    public function index()
    {
        $data['Page'] = 'Data Angsuran';
        $this->view('templates/header',$data);
        $this->view('user/index');
        $this->view('angsuran/index');
        $this->view('templates/footer');
    }
    public function bill()
    {
        $data['Page'] = 'Total Sisa Angsuran';
        $this->view('templates/header',$data);
        $this->view('user/index');
        $this->view('angsuran/bill');
        $this->view('templates/footer');
    }
    public function bayar()
    {   
        $data['NIK'] = $_POST['nik'];
        $data['Page'] = 'Total Sisa Angsuran';
        $data['listUser'] = $this->model('mUser')->getAllUser();
        $this->view('templates/header',$data);
        $this->view('user/index',);
        $this->view('angsuran/bayar');
        $this->view('templates/footer');
    }
}
