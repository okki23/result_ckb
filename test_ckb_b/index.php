
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="vendor/jquery/jquery.min.js"></script>  
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="vendor/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="vendor/jquery.dataTables.js"></script>

    <title>Apps</title>
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
    <table class="table table-bordered table-hover text-center panel panel-primary" id="example">
				<thead class="panel-heading">
					<tr>
						<th class="text-center">ID Bagian</th>
						<th class="text-center">Nama Bagian</th> 
					</tr>
				</thead> 
    </table>
    <br>
    &nbsp;
    <a href="cetak_excel.php" class="btn btn-primary"> Create XLS </a> 
    <br>
    &nbsp;
        <div class="alert alert-success alert-dismissible" id="pesanyes">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sukses!</strong> Berhasil Disimpan.
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> &nbsp; </h4>
        </div>

        <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
			 
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <form class="form-horizontal" id="myform">
                                    <div class="form-group">
										<input type="text" name="id" id="id" tabindex="1" class="form-control" placeholder="ID" value="">
									</div> 
									<div class="form-group">
										<input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Name" value="">
									</div> 
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
		</div>
        </div>
       
        </div>
    </div>
    </div>
    
</body>
<script>
$(document).ready(function(){
   $("#pesanyes").hide();
});
 
$('#example').DataTable( {
	"ajax": "backend_data.php", 
});

$('#example').DataTable();
 
function OpenForm(){
    $("#myModal").modal({backdrop: 'static', keyboard: false,show:true});
} 

function Simpan(){
    var id = $("#id").val();
    var nama = $("#nama").val();
    $.ajax({
        url:"backend_simpan.php", 
        data:{id,nama},
        type:"POST",
        success:function(result){
            if(result=='berhasil'){
                $('#example').DataTable().ajax.reload(); 
                $('#myform')[0].reset();
                $("#myModal").modal('hide');
                $("#pesanyes").show();
            }
        }
    });
}
 
</script>
</html>
