<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){//fungsi index untuk menampilkan halaman dashboard
        return view('dashboard');//melemparkan tampilan ke viw dashboard
    }

    public function dashboard(Request $reequest)//fungsi dashboard untuk mendeklasikan fariabel sekaligun melempar data ke tampilak 
    {
        $nama = $reequest->name; //deklarasi fariabel nama
        $pesanan = explode(',', $reequest->pesanan);//mengambil dari inputan pesanan kemudian dijadikan kedalam array dengan dibatasi koma.
        $jumlah = count($pesanan);//deklarasi jumlahpesanan didapat dari count array var pesanan
        $total = $reequest->total; //deklarasi total didapat dari inputan total
        $status = 'member'; //deklarasi status karena yg diminta output hanya member maka value di set ke member, jika bisa lain bisa digunakan select option dan diset value lain

        $coba = new Total($status, $total);// deklarasi objek coba dari class total dengan 2 parameter status dan total

        // kemudian data di tampung ke dalam array dan nanti akan di lemparkan ke viw dashboard 
        $data = [
            'nama' => $nama,//didapat dari deklasai variabel
            'total' => $total,//didapat dari deklasai variabel
            'jumlah' => $jumlah,//didapat dari deklasai variabel
            'status' => ucfirst($status),//didapat dari deklasai variabel dan diubah huruh depan jadi besar
            'diskon' => $coba->diskon(),//didapat dari class Diskon yg implemen interface Disc
            'totalPembayaran' => $coba->totalPembayaran(),//didapat dari class Total yang inherict dari kelas Diskon
        ];
        // dd($data['diskon']);

        return view('dashboard', compact('data'));
    }
}

interface Disc {//membuat interface Disc
    public function diskon();//dengan method diskon()
}

class Diskon implements Disc{//class Diskon implemens dari interface Disc
    public function __construct($status, $totalPesanan)//membuat method constructor dengan parameter status dan total 
    {
        $this->status = $status;
        $this->totalPesanan = $totalPesanan;
    }

    public function diskon()//method diskon 
    {
        if($this->status == 'member' && $this->totalPesanan >= 100000){//pengkondisian sesuai disoal
            $diskon = 20/100 * $this->totalPesanan; //adalah 20%
            return $diskon;
        }elseif($this->status == 'member' && $this->totalPesanan <= 100000){
            $diskon = 10/100 * $this->totalPesanan;//adalah 10%
            return $diskon;
        }else{//kondisi else tidak akan bisa karena status selalu member
            $diskon = 0;//adalah 0%
            return $diskon;
        }
    }
}

class Total extends Diskon{//membuat class Total yg inherict dari clas Diskon

    public function totalPembayaran(){//method totalPembayaran denganreturn total pesanan - diskon
        $totalPembayaran = $this->totalPesanan - $this->diskon();
        return $totalPembayaran;
    }
}
