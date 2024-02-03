<html>
  <head>
    <style>
      * {
          color:#6689CB;
          font-family:Arial,sans-serif;
          font-size:10px;
          font-weight:normal;
      }    
      #config{
          overflow: auto;
          margin-bottom: 10px;
      }
      .config{
          float: left;
          width: 200px;
          height: 202px;
          border: 1px solid #6689CB;
          margin-left: 185px;
      }
      .config .title{
          font-weight: bold;
          text-align: center;
      }
      .config .barcode2D,
      #miscCanvas{
        display: none;
      }
      #submit{
          clear: both;
      }
      #barcodeTarget,
      #canvasTarget{
        margin-top: 20px;
      }        
    </style>
    <title>ONU | UNN</title><link rel="shortcut icon" href="Small_Flag_of_the_United_Nations_ZP.svg">
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="onu.js"></script>
    <script type="text/javascript">
    
      function generateBarcode(){
        var unn = $("#UNN").val();
        var idn = $("#IDN").val();
        var btype = "code128"		//$("input[name=btype]:checked").val();
        var renderer = "canvas"		//$("input[name=renderer]:checked").val();
        var quietZone = true;
		
        var settings = {
          output:renderer,
          bgColor: "#FFFFFF", //$("#bgColor").val(),
          color: "#6689CB", //$("#color").val(),
          barWidth: 2,
          barHeight: 70,
          moduleSize: 5, //$("#moduleSize").val(),
          posX: 115,
          posY: 200,
          addQuietZone: 1, //$("#quietZoneSize").val()
        };

        var unn_settings = {
          output:renderer,
          bgColor: "#FFFFFF", //$("#bgColor").val(),
          color: "#6689CB", //$("#color").val(),
          barWidth: 2, //$("#barWidth").val(),
          barHeight: 100, //$("#barHeight").val(),
          moduleSize: 5, //$("#moduleSize").val(),
          posX: 408,
          posY: 195,
          addQuietZone: 1 //$("#quietZoneSize").val()
        };

        var idn_settings = {
          output:renderer,
          bgColor: "#FFFFFF", //$("#bgColor").val(),
          color: "#6689CB", //$("#color").val(),
          barWidth: 2, //$("#barWidth").val(),
          barHeight: 100, //$("#barHeight").val(),
          moduleSize: 5, //$("#moduleSize").val(),
          posX: 10,
          posY: 200,
          addQuietZone: 1, //$("#quietZoneSize").val()
        };
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(unn, "code128", settings);
          $("#canvasTarget").show().barcode(idn, "datamatrix", idn_settings);
	  $("#canvasTarget").show().barcode(unn, "datamatrix", unn_settings);
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').show();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
	var nam = $('#NAM').val();
	var idn = $('#IDN').val();
        var vnu = $('#VNU').val();
	var unn = $('#UNN').val();		//generateUNN();
	var doc = $('#dep-com').val();		//"General Assembly -- [ 06 ]"	//generateDC();
	var dat = generateDATE();
        var ctx = canvas.getContext('2d');
        var img = document.getElementById("logo");
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#6689CB';
        ctx.strokeStyle  = '#6689CB';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width/2, canvas.height);
        ctx.strokeRect (365, 15, 120, 145);
        ctx.strokeRect (5, 5, 490, 290);
	ctx.drawImage (logo, 500, 0);
	ctx.fillText ("NAME:", 15, 25);
	ctx.fillText (nam, 88, 25);
	ctx.fillText ("D/C:", 15, 50);
	ctx.fillText (doc, 88, 50);
	ctx.fillText ("ID#:", 15, 75);
	ctx.fillText (idn, 88, 75);
	ctx.fillText ("VNU:", 250, 100);
	ctx.fillText (vnu, 300, 100);
	ctx.fillText ("UN#:", 15, 100);
	ctx.fillText (unn, 88, 100);
	ctx.fillText ("DATE:", 15, 125);
	ctx.fillText (dat, 88, 125);
	ctx.fillText ("SIGNATURE:    ____________________________________________", 15, 155);
	ctx.fillText ("FAVOR PRESTAR LA MAYOR COLABORACION AL PORTADOR DE ESTE DOCUMENTO", 42, 178);
	ctx.fillText ("PLEASE PAY MOST COLABORATION TO THE BEARER OF THIS DOCUMENT", 64, 192);
	ctx.fillStyle = '#FFFFFF';
	ctx.fillText ("http://onu.url.ph/", 707, 285);
	ctx.fillText (unn, 707, 25);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') === 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') === 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').show();
        });
        generateBarcode();
      });

	function validateFORM() {
		var n = document.forms["onu"]["NAM"].value;
		if (n===null || n==="") {
			alert("Name must be filled out.");
		        return false;
		}
		var dc = document.forms["onu"]["DC"].value;
		if (dc===null || dc==="") {
			alert("Department/Comission must be filled out.");
		        return false;
		}
		var n = document.forms["onu"]["UNN"].value;
		if (n===null || n==="") {
			alert("UN# not generated.");
		        return false;
		}
		var i= document.forms["onu"]["IDN"].value;
		if (i===null || i==="") {
			alert("Indentication Number not specified.");
	        	return false;
		}
		var i= document.forms["onu"]["VNU"].value;
		if (i===null || i==="") {
			alert("Voluntary Number not specified.");
	        	return false;
		}
	}

	function generateDATE() {
		var d = new Date();
		return d;		//.toGMTString();
	}

	function generateUNN() {
		var d = new Date();
		var yy = d.getYear();
		var mm = d.getMonth()+1;
		var dd = d.getDate();
		var hh = d.getHours();
		var mi = d.getMinutes();
		var dc = generateDC();
		var unn = "";
		unn = yy & mm & dd & hh & mi & dc;
		var ctx = canvas.getContext('2d');
		ctx.fillStyle="#FFFFFF";
		ctx.fillText (yy, 288, 100);
		//return unn;
		//return d.toGMTString();
	}

	function generateDC() {
		var dc = document.forms["onu"]["DC"].value
		return dc;
	}

	function generateVNU() {
		var vnu = document.forms["onu"]["VNU"].value
		return vnu;
	}

    </script>
  </head>
  <body><center>
<?php
	$vol=$_POST["VOL"];
	if ($vol == "on")
	{
	$dc=$_POST["DC"];
	$nam=strtoupper($_POST["NAM"]);
	$idn=$_POST["IDN"];
        $vnu=$_POST["VNU"];
	switch ($dc)
	{
		case 01:
			$dc="GS";
			$dcn="SECRETARY";
			break;
		case 02:
			$dc="IJ";
			$dcn="INTERNATIONAL JUSTICE COUNCIL";
			break;
		case 03:
			$dc="FA";
			$dcn="FIDUCIDARY ADMINISTRATION COUNCIL";
			break;
		case 04:
			$dc="ES";
			$dcn="ECONOMIC & SOCIAL COUNCIL";
			break;
		case 05:
			$dc="SC";
			$dcn="SECURITY COUNCIL";
			break;
		case 06:
			$dc="GA";
			$dcn="GENERAL ASSEMBLY";
			break;
		case 07:
			$dc="SA";
			$dcn="DECOLONIZATION & POLITICAL SPECIAL AFFAIRS";
			break;
		case 10:
			$dc="FE";
			$dcn="FINNANCIAL & ECONOMIC AFFAIRS";
			break;
		case 11:
			$dc="CA";
			$dcn="SOCIAL, HUMANITARIAN & CULTURAL AFFAIRS";
			break;
		case 12:
			$dc="SD";
			$dcn="INTERNATIONAL SECURITY & DISSARM";
			break;
		case 13:
			$dc="VW";
			$dcn="VOLUNTARY WORK";
			break;
	}
	if ($dc == "08")
	{
		$dc="BA";
		$dcn="BUDGET & ADMINISTRATIVE AFFAIRS";
	}
	elseif ($dc == "09")
	{
		$dc="JA";
		$dcn="JURIDIC AFFAIRS";
	}
	$unn=date('YmdHi').$dc;
	//echo $dc.$dcn;
	}
?>
 <div id="generator">
      <div id="config"><br/>
        			<form name="onu" action="dep-com.php" onsubmit="return validateFORM()" method="post">
			<small><br />
				<img id="logo" src="onu.png" width="25">&nbsp;&nbsp;

				NAME: <?php print "<input type='text' name='NAM' id='NAM' value='$nam' size='42'>"; ?>&nbsp;&nbsp;
				DEP/COM: <?php print "<input type='text' name='dep-com' id='dep-com' value='$dcn'>"; ?>&nbsp;&nbsp;
				UN#: <?php print "<input type='text' id='UNN' name='UNN' value=".$unn.">"; ?>&nbsp;&nbsp;
				ID#: <?php print "<input type='text' name='IDN' id='IDN' value=".$idn.">" ?>&nbsp;&nbsp;
				VNU: <?php print "<input type='text' name='VNU' id='VNU' value=".$vnu.">" ?>&nbsp;&nbsp;
				
	<!--input type="button" onclick="generateBarcode();" value="Validate"-->&nbsp;&nbsp;
	<input type="button" onclick="window.print()" value="Print">&nbsp;&nbsp;
	<!--input type="button" onclick="generateBarcode()" value="Validate"-->
	<input type="submit" name="GEN" value="Validate"> 
	<br />
	</form>

    <div id="barcodeTarget" class="barcodeTarget"></div>
    <canvas id="canvasTarget" width="1000" height="300"></canvas> <br /><br />
	<a href="http://www.un.org/" target="_blank">United Nations</a> -- <a href="http://helios.url.ph/curriculum/" target="_blank">Helios Martínez Domínguez (L) 2014~2016</a>
  </center>
  </body>
</html>
