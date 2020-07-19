
<?php 

session_start();

if(!isset($_SESSION['username'] ))
{
header('location:login.php');
}

$con =mysqli_connect('localhost','root');
if($con)
echo "";
else
echo "not";

mysqli_select_db($con, 'quizdatabase');

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>check</title>
  	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>


<div class="container text-center">
  <br><h1 class="text-center text-success"> COMPUTER SCIENCE QUIZ </h1><br>      
  <table class="table table-text-center table-bordered-table-hover">
  	<tr>
  		<th colspan="2" class="bg-dark"><h1 class="text-white">Results</h1></th>
  	</tr>

      <tr>
        <td>Question attempted</td>

        <?php
        if(isset($_POST['submit']))
        {
        	if(!empty($_POST['quizcheck'])){

        	if ($selected = $_POST['quizcheck']) {
        		$count = count($_POST['quizcheck']); }	
        

        ?>

        <td><?php echo "out of 10 you have selected ".$count." options"; ?></td>
      </tr>

      <tr>	
        <td>Your score</td>
		<?php
		$selected = $_POST['quizcheck'];

		$q = "select * from questions";
		$query = mysqli_query($con, $q);

		$result = 0;
		$i = 1;

		while( $rows = mysqli_fetch_array($query))
		{
			//print_r($rows['aid']);

			$checked = $rows['aid'] == $selected[$i] ;

			if($checked)
			{
				$result++;
			}

			$i++;

		}
  }

		?>

        <td colspan="2">
        	<?php echo "your total score is".$result; 
        		}
        		else
        		{
        			echo "please select atlest one option.";
        		}
        		?>
        	</td>
      </tr>

  </table>

<?php 

		$name = $_SESSION['username'];
		$finallyresult = "insert into users(uname,totalques,anscorrect) values ('$name','10','$result')";
		$resultquery = mysqli_query($con,$finallyresult);


 ?>
    <div class = "m-auto d-block">
       <a href = "logout.php"> Logout </a>
   </div><br>
</div>



   <div>
       <h5 class = "text-center">@2020 webcreation</h5>
   </div><br><br>

</body>
</html>



