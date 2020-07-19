<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	
</head>
<body>
	<div class="container">

		<br><h1 class="text-center text-success">welcome to Quiz Analysis</h1><br>

		<div class="row">
			<div class="col-lg-6">

			  <div class="card">
				<h2 class="text-center card-header">login form</h2> 
				<form action="validation.php" method="post">
					<div class="form-group">
						<label>username</label>
						<input type="text" name="user" class="form-control">						
					</div>
					<div class="form-group">
						<label>password</label>
						<input type="password" name="pass" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success">
					</div>

				</form>
			   </div>
 
			</div>

			<div class="col-lg-6">
			  <div class="card">
				<h2 class = "text-center card-header " >sign form</h2>
				<form action="registration.php" method="post">
					<div class="form-group">
						<label>username</label>
						<input type="text" name="user" class="form-control">						
					</div>

					<div class="form-group">
						<label>password</label>
						<input type="text" name="pass" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success">
					</div>

				</form>
			 </div>
 
			</div>

		</div>
		
	</div>

</body>
</html>