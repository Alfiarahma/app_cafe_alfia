<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pesananmodel;

class laporancontroller extends Controller{
    function __construct()
    {
        $this->laporan = new Pesananmodel();
    }
    public function tampil()
    {
        $data['data']=$this->laporan->FindAll();
        return view('laporan',$data);
    }
}