
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}"> 
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>  
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>  
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery.dataTables.css') }} ">
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/jquery.dataTables.js') }}"></script>

    <title>CRUD CKB</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Apps </a>
            </div>
           
            <div class="navbar-default sidebar" role="navigation">
               
            </div> 
        </nav>
        <br>
        &nbsp;
<div class="container">
    <div class="row"> 
    <button class="btn btn-primary" onclick="OpenForm();">
        Input 
    </button>
    <br>
    &nbsp;
    <div class="container">
                    <div id="formku">
                        <div class="row">
							<div class="col-lg-12">
                                <form class="form-horizontal" id="myform"> 
                                    <input type="hidden" name="id" id="id">
									<div class="form-group">
										<input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama" value="">
									</div> 
                                    <div class="form-group">
										<input type="text" name="alamat" id="alamat" tabindex="1" class="form-control" placeholder="Alamat" value="">
									</div> 
                                    <div class="form-group">
										<input type="text" name="nomor_telepon" id="nomor_telepon" tabindex="1" class="form-control" placeholder="Nomor Telepon" value="">
									</div> 
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label> 
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input jenis_kelamin" type="radio" id="customRadio1" name="jenis_kelamin" value="pria">
                                            <label for="customRadio1" class="custom-control-label">Laki-Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input jenis_kelamin" type="radio" id="customRadio2" name="jenis_kelamin" value="wanita" checked="">
                                            <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                        </div>
                                        <br> 
                                    
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" name="simpan" onclick="Simpan();" id="simpan" tabindex="4" class="form-control btn btn-info" value="Simpan">
											</div>
										</div>
									</div> 
								</form> 
							</div>
						</div>
                    </div>
                    </div>

    <table class="table table-bordered table-hover text-center panel panel-primary" id="example">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Nama</th> 
                        <th class="text-center">Alamat</th> 
                        <th class="text-center">Nomor Telepon</th> 
                        <th class="text-center">Jenis Kelamin</th> 
                        <th class="text-center">Opsi</th> 
					</tr>
				</thead> 
    </table>
    <br>
    &nbsp; 
        <div class="alert alert-success alert-dismissible" id="pesanyesave">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sukses!</strong> Berhasil Disimpan.
        </div>
        <div class="alert alert-success alert-dismissible" id="pesanyesdel">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sukses!</strong> Berhasil Dihapus.
        </div>
        <div class="alert alert-success alert-dismissible" id="pesanyesupdate">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sukses!</strong> Berhasil Diubah.
        </div>
    </div>
</div>  
                   
                   
    
</body>
<script>
$(document).ready(function(){
   $("#pesanyesdel").hide();
   $("#pesanyesave").hide();
   $("#pesanyesupdate").hide();
//    $("#formku").hide();
});
 
$('#example').DataTable( {
	"ajax": "{{ url('pegawai/fetch_pegawai') }}", 
});

$('#example').DataTable();
 
// function OpenForm(){
//     $("#formku").slideToggle("normal");
// } 

function Simpan(){
    var id = $("#id").val();
    var nama = $("#nama").val();
    var alamat = $("#alamat").val();
    var nomor_telepon = $("#nomor_telepon").val();
    var jenis_kelamin = $(".jenis_kelamin:checked").val(); 
    $.ajax({
        url:" {{ URL::current(); }}/store", 
        data:{id:id,nama:nama,alamat:alamat,nomor_telepon:nomor_telepon,jenis_kelamin:jenis_kelamin,"_token": "{{ csrf_token() }}"},
        type:"POST",
        success:function(result){
            if(result=='berhasil'){
                $('#example').DataTable().ajax.reload(); 
                $('#myform')[0].reset(); 
                // $("#formku").slideUp("fast");
                $("#pesanyesave").show();
            }
        }
    });
}

function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?')){ 
        $.ajax({
            url:" {{ URL::current(); }}/destroy/"+id,  
            type: "GET", 
            success: function(result){ 
                $('#example').DataTable().ajax.reload();  
                $("#pesanyesdel").show(); 
            } 
        });
        }
}


function Ubah_Data(id){ 
		$.ajax({
             url:" {{ URL::current(); }}/edit/"+id,  
			 type:"GET", 
			 success:function(result){ 
                const obj = JSON.parse(result); 
                // $("#formku").slideDown("fast"); 
                $("#id").val(obj.id);
                $("#nama").val(obj.nama);
                $("#alamat").val(obj.alamat);
                $("#nomor_telepon").val(obj.nomor_telepon);
                 
			 }
		 });
	 }
   
     
    
 
</script>
</html>
