<?php

function connect(){
    $mysqli = new mysqli('localhost', 'root', '', 'unemployment');
    if($mysqli->connect_errno != 0){
        return $mysqli->connect_error;
    }else{
        $mysqli->set_charset("utf8mb4");	
    }
    return $mysqli;
}

function getTables(){
    $mysqli = connect();
    $res = $mysqli->query("SELECT * FROM asia ");
    while($row = $res->fetch_assoc()){
        $tables[] = $row;
    }
    return $tables;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Start up</title>
</head>
<body>
<div class="page">
		
		<div class="right">
			<!--<h2>Globe</h2>-->
			<div class="product-wrapper">
			<table style="width: 100%;">	
                <tr>
                    <th>Global Rank</th>
                    <th>Country</th>
                    <th>Unemployment Rate</th>
                    <th>Latest Year Of Update</th>
                </tr>
                <tr>
			    <?php 
				    $tables = getTables();
				    foreach ($tables as $tab) {
					    ?>
						    <div class="product">
							
							    <div class="right">
								
                                    
                                        <tr>
                                            <td class="global"><?php echo $tab['Global_rank']; ?></td>
								            <td class="country"><?php echo $tab['Countries'] ;?></td>
								            <td class="rate"><?php echo $tab['Unemployment_rate'] ;?></td>
                                            <td class="year"><?php echo $tab['Available_data'] ;?></td>
                                        </tr>
                               
							    </div>
						    </div>
                </tr>
					    <?php
				    }
			    ?>
            
			</div>
		</div>
	</div>
    <script src="script.js"></script>
</body>
</html>

