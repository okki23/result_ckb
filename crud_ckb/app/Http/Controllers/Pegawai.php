<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PegawaiModel;

class Pegawai extends Controller
{
    public $tablename = 'pegawai';
    public function __construct(){ 
        $this->PegawaiModel = new PegawaiModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->PegawaiModel->allData()->get());
        return view('pegawai',$data);

    }

     
    public function create()
    { 
        $data = array('selectjabatan'=>$this->PegawaiModel->selectjabatan());
        return view('pegawai_create',$data);
    } 
    
    public function fetch_pegawai(){ 
            $data =   DB::table($this->tablename)->get();
            $datax = array();  
            foreach($data as $datas){
                $sub_array = array();  
           
                $sub_array[] = $datas->id;  
                $sub_array[] = $datas->nama;  
                $sub_array[] = $datas->alamat;  
                $sub_array[] = $datas->nomor_telepon;
                $sub_array[] = $datas->jenis_kelamin; 
			    
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$datas->id.');" > Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$datas->id.');" >   Hapus </a>';  
               
                $datax[] = $sub_array;   
            }
            
            $output = array("data"=>$datax);
            echo json_encode($output);
            
    }
     
    public function store(Request $request)
    {  
        $data = [
            'nama' => Request()->nama,
            'alamat' => Request()->alamat,
            'nomor_telepon' => Request()->nomor_telepon,
            'jenis_kelamin' => Request()->jenis_kelamin           
        ];
 
        $save = $this->PegawaiModel->savedata($data);
        if($save){
            echo "berhasil";
        }else{
            echo "gagal";
        }
        
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = $this->PegawaiModel->getData($id);
        echo json_encode($data,TRUE); 
    }

     
    public function update(Request $request)
    {
        $data = [
            'nama' => Request()->nama,
            'alamat' => Request()->alamat,
            'nomor_telepon' => Request()->nomor_telepon,
            'jenis_kelamin' => Request()->jenis_kelamin           
        ];
        $id = Request()->id;
        $this->PegawaiModel->updateData($data,$id); 
        return redirect()->route('pegawai')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $del = $this->PegawaiModel->deleteData($id);
        if($del){
            echo "berhasil";
        }else{
            echo "gagal";
        } 
    }
 
}
