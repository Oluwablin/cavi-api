<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Cavi API</title>

	    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			    @yield('content')
			</div>
		</div>

		<!-- Date Validation -->
		{{-- <script src="ddmmyyy-validation.js"></script> --}}
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	    {{-- This is where our script will extend from --}}
		@stack('scripts')
		
		<style>
			.modal-content {
		 background-image: url("img_tree.gif"), url("paper.gif");
		 background-color: #cccccc;
	   </style>
	   @stack('styles')
	   
	</div>
</body>
</html>