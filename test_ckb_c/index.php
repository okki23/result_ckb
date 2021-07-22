<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="vendor/jquery/jquery.min.js"></script>  
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="vendor/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="vendor/jquery.dataTables.js"></script>

</head>
<body>
    <div align="center">
        <h1>Pilihlah Bentuk Bangun Datar</h1>   
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <button id="jajar_g" name="jajar_g" onclick="JajarGenjang();" class="btn btn-success"> Jajar Genjang </button>
            </div>
            <div class="col-lg-3">
                <button id="segitiga_terbalik" name="segitiga_terbalik" onclick="SegitigaKebalik();" class="btn btn-success"> Segitiga Sama Sisi Terbalik </button>
            </div>
            <div class="col-lg-3">
            <button id="silang" name="silang" onclick="Silang();" class="btn btn-success"> Silang </button>
            </div>
             <div class="col-lg-3">
             <button id="close" name="close" onclick="Close();" class="btn btn-success"> Close </button>
            </div>
        </div>
        <div id="result">

        </div>
    </div>

</body>
<script>
    function JajarGenjang(){
        $.ajax({
            url:"jajar_genjang.php",
            type:"GET",
            success:function(response){
                $("#result").html(response);
            }
        });
    }
    function SegitigaKebalik(){
        $.ajax({
            url:"segitiga_terbalik.php",
            type:"GET",
            success:function(response){
                $("#result").html(response);
            }
        });
    }
    function Silang(){
        $.ajax({
            url:"silang.php",
            type:"GET",
            success:function(response){
                $("#result").html(response);
            }
        });
    }
    function Close(){
        $("#result").html("");
    }
    
</script>
</html>