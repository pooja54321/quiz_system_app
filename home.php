
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
 <html>
 <head>
   <title>home</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

 </head>
 <body>
   <div class="container">
      <br><h1 class="text-center text-primary"> COMPUTER SCIENCE QUIZ </h1><br>
      <h2 class="text-center text-success">Welcome <?php echo $_SESSION['username'] ; ?></h2>

   <div class="col-lg-8 m-auto d-block">
   <div class="card">
      <h3 class="text-center card-header">welcome <?php echo $_SESSION['username'] ; ?> You have to select one among all options given. All the best ! </h3>


   </div><br>


   <form action="check.php" method="post">

   <?php 

   for($i=1; $i < 11; $i++){

   $q = "select * from questions where qid = $i";
   $query = mysqli_query($con,$q);

   while($rows = mysqli_fetch_array($query) ) {
   
   ?>


   <div class="card">
      <h4 class="header"> <?php echo $rows['question'];  ?> </h4>


      <?php  

         $q = "select * from answers where aid = $i";
         $query = mysqli_query($con,$q);

         while($rows = mysqli_fetch_array($query) ) {
 
   ?>

      <div class="card-body">
         <input type = "radio" name = "quizcheck[<?php echo $rows['aid']; ?>]" value = "<?php echo $rows['ans_id']; ?>">
         <?php echo $rows['answer'] ; ?>

      </div>


   <?php  

   }
   }
}

    ?>

    <input type="submit" name="submit" value="submit" class="btn btn-success m-auto d-block">

    </form>

   </div>
   </div><br><br>

   <div class = "m-auto d-block">
       <a href = "logout.php"> Logout </a>
   </div><br>

   <div>
       <h5 class = "text-center">@2020 webcreation</h5>
   </div><br><br>




     

   </div>
 </body>
 </html>

