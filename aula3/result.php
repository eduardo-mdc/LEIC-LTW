<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>result</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
        <p>
            <?php
                echo $_GET['number1'] . " + " . $_GET['number2'] . " =  " . ($_GET['number1'] + $_GET['number2']);
            ?>
        </p>
        <a href='sum2.php'>voltar para tras</a>
	</body>
</html>
