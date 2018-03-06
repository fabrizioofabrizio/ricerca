<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <style>
body {
		position: relative; 
		background-color: white;
		padding-top: 170px;
		height: 100%;
	}
#section1 {padding-top:0px; min-height:10%; color:#fff; background-color: white;}
input[type="text"] {
    color:#000000;
    }
.form-control::-webkit-input-placeholder { color: #fff; }
.navbar-collapse::-webkit-scrollbar-track {
	background-color: lightgray;
	}
	.navbar-collapse::-webkit-scrollbar-thumb {
		background-color: lightgray;
	}
html, body {
	height: 100%; /*Fixes the height to 100% of the viewport*/
	}
body { padding-top: 2px; }
</style>
   
<!--/////////////////////////////////////INVIARE TESTO TRAMITE TEXT BOX AD AJAX / PHP ///////////////////////////////////////-->
<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'ajaxInviaMail.php',
                data: {
					testo: $('#testo').val(),
					keywords : $('#keywords').val(),
					link : $('#link').val()
				},
				success: function () {
				//alert(testo);	
				}
            });
        });
    });
</script>


	
</head>
<body>
<div id="section1" class="container-fluid">
	<div class="row">
		<div class="col-sm-3">		
			<form name="input">
				<div class="input-group">
				<label class="text-center center-block" style= "color: black">Mail:</label>
					<input type="text" class="form-control" id="testo" placeholder="Mail">
					<label class="text-center center-block" style= "color: black">Link:</label>
					<input type="text" class="form-control" id="link" name="link" placeholder="Link" value="">
					<label class="text-center center-block" style= "color: black">Tag:</label>
					<input type="text" class="form-control" id="keywords" name="keywords" placeholder="Tag" value="">
					</br>
					</br>
					</br>
					</br>
					<input type="submit" class="form-control" id="submit" placeholder="Button">
				</div>
			</form>
	</div>
		<div class="col-sm-9">
			</br>
			<label style= "color: black"><div id="refresh"></div></label>
		</div>
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function() {
	   $("#refresh").load("ajaxRiceviMail.php");
	   var refreshId = setInterval(function() {
		$("#refresh").load('ajaxRiceviMail.php?' + 1*new Date());
	   }, 1000);
	});
</script>


</body>
</html>
<?php
