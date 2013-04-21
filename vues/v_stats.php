
	<h3>Répartition des absences entre les élèves pour les 12 derniers mois</h3>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <?php
    	foreach ($tabStatsAbs as $month => $tabStudents):
    		$txt = "";
    ?>
		    <script type="text/javascript">
		      google.load("visualization", "1", {packages:["corechart"]});
		      google.setOnLoadCallback(drawChart);
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Elève', 'Hours per Day'],
		          <?php
		          	foreach ($tabStudents as $name => $nbAbs) {
		          		$txt .= "['$name', $nbAbs],";
		          	}
		          	$txt = substr($txt, 0, -1);
		          	echo $txt;
		          ?>
		        ]);

		        var options = {
		          title: '<?php echo $month; ?>',
		          chartArea:{
		          				width:"95%"
		          }
		        };

		        var chart = new google.visualization.PieChart(document.getElementById('<?php echo $month; ?>'));
		        chart.draw(data, options);
		      }
		    </script>

    <div class='span6' <?php echo 'id="'.$month.'"'; ?> style="width: 500px; height: 400px;"></div>

    <?php
    	endforeach;
    ?>
  





