<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>

	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="../assets/datatables/media/css/dataTables.bootstrap4.min.css" type="text/css">
	<link href="../assets/toastr/build/toastr.min.css" rel="stylesheet"/>
	<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
	<script src="../assets/jquery/jquery.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>	
	
	<script type="text/javascript" src="../js/session.js"></script>
	<script type="text/javascript" src="../js/monitor-insert.js"></script>

	<link href="../assets/select2/css/select2.min.css" rel="stylesheet" />
	<link href="../assets/select2/css/select2-bootstrap4.min.css" rel="stylesheet" />
	<script src="../assets/select2/js/select2.full.min.js"></script>

	<script src="../assets/datatables/media/js/jquery.dataTables.js"></script>
	<script src="../assets/datatables/media/js/dataTables.dataTables.min.js"></script>
	<script src="../assets/datatables/media/js/dataTables.bootstrap4.min.js"></script>

<script src="../assets/toastr/build/toastr.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
		<a class="navbar-brand" href="/">Sistema</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<?php print $data['menu']; ?>			
			</ul>
		</div>
	</nav>
