
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
        //counter =0

        $Resultants =0;   
        if(isset($_POST['submit']))
        {
        	if(!empty($_POST['quizcheck'])){

        	//if ($selected = $_POST['quizcheck']) {
            //counting number of checked checkboxes.
        		$checked_count = count($_POST['quizcheck']); 	
        

        ?>

        <td>
          <?php
           echo "out of 10 you have selected ".$checked_count." options"; ?>
          </td>
      </tr>


		<?php
    //loop to display and store values of checked checkboxes.
		$selected = $_POST['quizcheck'];

		$q1 = "select * from questions";
    $ansresults = mysqli_query($con, $q1);
		$i = 1;

		while( $rows = mysqli_fetch_array($ansresults))
    {
      $flag = $rows['aid'] == $selected[$i];
    
    if ($flag)
		{
     	$Resultants++;
			}

			$i++;
		
  }

		?>

          <tr>  
        <td>Your score</td>

        <td colspan="2">
        	<?php echo "your total score is".$Resultants. ".";
        		}
        		else
        		{
        			echo "please select atlest one option.";
        		}
          }

        		?>
        	</td>
      </tr>

  

<?php 

		$name = $_SESSION['username'];

    $finallyresult = "insert into users(uname,totalques,anscorrect) 
    values ('$name','10','$Resultants') ";

		$resultquery = mysqli_query($con,$finallyresult);

 ?>
</table>

    <div class = "m-auto d-block">
       <a href = "logout.php"> Logout </a>
   </div><br>
</div>



   <div>
       <h5 class = "text-center">@2020 Pooja webcreation</h5>
   </div><br><br>

</body>
</html>



