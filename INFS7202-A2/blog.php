<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
	<div class="logo"></div>
	<div class = "navbar navbar-custom">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="tea.html">Tea</a></li>
					<li><a href="cake.html">Cake</a></li>
					<li><a href="blog.php">Blog</a></li>
					<li><a href="order.html">My Order</a></li>
				</ul>		
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<form id = 'commentBox' action='' method='post'>
			<textarea id='comment' name='comment' class='form-control' rows='4' required='required'></textarea>
			<button id = 'send' name='submitComment' type='submit' class='btn btn-info'>Comments</button>
		</form>
		<div id='commentSection'>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/blogComment.js"></script>
  </body>
</html>