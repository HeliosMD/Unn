<html>
	<body bgcolor="#6689CB" text="#ffffff">
		<center>
			<img src="onu.jpg" width="150">			
				<br/><b><small>LAST TWO DIGIT DOCUMENT CODE:</small> <?php
					$unn=$_POST["UNN"];
					$dcc=substr($unn, -2);
					if ($dcc == "") { $dcc="N/A"; }
					echo "<big>$dcc</big>";
					?></b><br/>
				<br/>DEPARTMENT:<br/>
				<?php if ($dcc=="GS"){ echo "==> <big><big><b>"; } ?> Secretary: GS <?php if ($dcc=="GS"){ echo "</b></big></big> <=="; } ?> <br/> 
				<?php if ($dcc=="IJ"){ echo "==> <big><big><b>"; } ?>International Justice Council: IJ <?php if ($dcc=="IJ"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="FA"){ echo "==> <big><big><b>"; } ?>Fiducidary Administration Council: FA <?php if ($dcc=="FA"){ echo "</b></big></big> <=="; } ?><br/>
				<?php if ($dcc=="ES"){ echo "==> <big><big><b>"; } ?>Economic & Social Council: ES <?php if ($dcc=="ES"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="SC"){ echo "==> <big><big><b>"; } ?>Security Council: SC <?php if ($dcc=="SC"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="GA"){ echo "==> <big><big><b>"; } ?> General Assembly: GA <?php if ($dcc=="GA"){ echo "</b></big></big> <=="; } ?> <br/><br/>
				COMMISSION:<br/>
				<?php if ($dcc=="SA"){ echo "==> <big><big><b>"; } ?>Decolonization & Political Special Affairs: SA <?php if ($dcc=="SA"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="BA"){ echo "==> <big><big><b>"; } ?>Budget & Administrative Affairs: BA <?php if ($dcc=="BA"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="JA"){ echo "==> <big><big><b>"; } ?>Judiric Affairs: JA <?php if ($dcc=="JA"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="FE"){ echo "==> <big><big><b>"; } ?>Financial & Economic Affairs: FE <?php if ($dcc=="FE"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="CA"){ echo "==> <big><big><b>"; } ?>Social, Humanitarian & Cultural Affairs:  CA <?php if ($dcc=="CA"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="SD"){ echo "==> <big><big><b>"; } ?>International Security & Dissarm: SD <?php if ($dcc=="SD"){ echo "</b></big></big> <=="; } ?> <br/>
				<?php if ($dcc=="VW"){ echo "==> <big><big><b>"; } ?>Voluntary Work: VW <?php if ($dcc=="VW"){ echo "</b></big></big> <=="; } ?> <br/>
		</center>
	</body>
<html>

