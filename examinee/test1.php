<?php 
            if (isset($_GET['id']) ) {
             $update=$_GET['id'];
             echo"<h1>This is $update</h1>";

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="task3.css">
</head>
<body>
<html>
    <head>
   <link rel="stylesheet" href="task3.css">
       
    </head>
    
    <div class="head">
       
        
        <div  id="outer">
          <div id="inner"><p> <?php 
            session_start();
            if(isset($_SESSION['userdata']['username'])){
            echo "Welcome User "
           .$_SESSION['userdata']['username']."";
        }

                                    ?></p>
         

                         
          </div>
        </div>
        
       

        <nav>
            <ul class="navul">
           
                
                <div class="dropdown">
                  <button class="dropbtn">Dropdown
                  <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                  <a href="test1.php">Test 1</a>
                   <a href="test2.php">Test 2</a>
                   <a href="test3.php">Test 3</a>
                   <a href="test4.php">Test 4</a>
                  </div>
                </div>
                
            
               </li>
               
              
            </ul>
        </nav>
    </div>
    <div class="container">
    <?php 
            if (isset($_GET['id']) ) {
             $update=$_GET['id'];
             echo"<h1> $update</h1>";
  }
  ?>

    </div>
    <div class="exam">
    <?php

require "config.php";
?>
<?php 

$offset=0;
$limit=1;
$updt='';

  if(isset($_GET['id2'])){
    $offset=$_GET['id2'];
    
   
    
}
  else{
     $offset=0;
     $limit=1;
} 
if (isset($_GET['id']) ) {
 $update=$_GET['id'];
 $updt=$update;
}

echo $updt;
$sql1="SELECT * from test1 WHERE  test='test1' LIMIT $offset,$limit ";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
$a='<p><h2>Question:</h2><h3>'.$row['question'].'</h3></p>';
$a.='<form action="test1.php?id2='.$row['sno.'].'" method ="POST">';
$a.='<input type="radio" id="option1" name="option" value="'.$row['option1'].'" >: '.$row['option1'].'<br>';
$a.='<input type="radio" id="option2" name="option"   value="'.$row['option2'].'">: '.$row['option2'].'<br>';
$a.='<input type="radio" id="option3" name="option"  value="'.$row['option3'].'">: '.$row['option3'].'<br>';
$a.='<input type="radio" id="option4" name="option"  value="'.$row['option4'].'">: '.$row['option4'].'<br><br>';
$a.='<a href="prevoius.php?id2='.$row['sno.'].'" class="a1">Previous</a>';
$a.='<input type ="submit" name="submit" class="a1" value="Next">';
$a.='</form>';
if($offset==9){
  $a.='<br><br><a href="submit.php" class="a1">Final Submit</a>';
}
echo $a;

}


}


    if (isset($_POST['submit'])) {
 
    
    $op1=isset($_POST['option'])?$_POST['option']:'';
     
    $sql1="INSERT INTO `correct2` ( `correct`) VALUES ( '$op1');";
  
    if($conn->query($sql1)==true){
  
    }
    else{
  echo $conn->error;
    }

  }

?>

    </div>
    <footer>Copyright & copy</footer>
    <style>
.a1{
  text-decoration: none;
  color: yellow;
  padding: 10px;
  margin: 5px;
  border: 1px solid black;
  border-radius: 5px;;
  background-color: black;
}
    </style>
</body>
</html>