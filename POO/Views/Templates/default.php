<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $this->title ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css" media="screen">
	*{ box-sizing: border-box; }
		.content{
			width: 100%; height:auto; border-radius: 5px; background-color: whitesmoke; padding: 5px; text-align: center;font-weight: bold; border:1px solid #000;
		}		
	</style>
</head>
<body>
<div class="content" style="margin:20px auto;position: relative; padding: 20px;">
	<h2>Les modèles : valider les informations</h2>
	<div style="width:80%; margin:0 auto;">
		<pre>
			<?= $page_content ?>
		</pre>
		

	</div>
</div>	

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>