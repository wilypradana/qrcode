<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <video width="100%" id="preview"></video>
            <img id="photo"> 

        </div>
        <div class="col-md-6">
            <form action="detail.php" method="post" id="form">
            <label>SCAN QR CODE</label>
            <input type="text" name="text" id="text" readonly placeholder="Scan QR code" class="form-control">
            <input type="hidden" name="photo" id="photo">
                    </form>
        </div>
    </div>
</div>


<!-- JavaScript links -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/1.0.0/instascan.min.js" integrity="sha512-QblNATV/gin5FC8tqTM2gfCMBei2qCzTte4O6CxGp8KQ5BgC5vNNGv99uTBvzmq+AFFYFoUNhowGOOJNTIBy6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script> let scanner = new Instascan.Scanner({ video: document.getElementById("preview") }); Instascan.Camera.getCameras().then(function (cameras) { if (cameras.length > 0) { scanner.start(cameras[0]); } else { alert("No cameras found"); } }).catch(function (e) { console.error(e); }); scanner.addListener("scan", function (content) { document.getElementById("text").value = content; document.forms[0].submit() }); </script>
</body>
</html>