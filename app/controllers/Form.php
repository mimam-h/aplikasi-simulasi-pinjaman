<?php
class Form extends Controller
{
    public function index()
    {
        $data['Page'] = 'Form Pinjaman';
        $this->view('form/header',$data);
        $this->view('form/index');
        $this->view('form/footer');
    }

    public function konfirmasiTotal()
    {
        $data['Page'] = 'Cari Total Angsuran';
        $this->view('form/headerKecil',$data);
        $this->view('form/konfirmasiTotal');
        $this->view('templates/footer');
    }
    public function konfirmasiBayar()
    {
        $data['Page'] = 'Konfirmasi NIK';
        $this->view('form/headerKecil',$data);
        $this->view('form/konfirmasiBayar');
        $this->view('templates/footer');
    }
}
