<?php


include "config.php";
if (isset($_POST['submit'])) {
  $question=isset($_POST['question'])?$_POST['question']:'';
  $op1=isset($_POST['op1'])?$_POST['op1']:'';
  $op2=isset($_POST['op2'])?$_POST['op2']:'';
  $op3=isset($_POST['op3'])?$_POST['op3']:'';
  $op4=isset($_POST['op4'])?$_POST['op4']:'';
  $corr=isset($_POST['correct'])?$_POST['correct']:'';
  $test=isset($_POST['test'])?$_POST['test']:'';
  
  $sql="INSERT INTO `test1` (`question`, `option1`, `option2`, `option3`, `option4`, `correct`, `test`)
   VALUES ('$question', '$op1', '$op2', '$op3', '$op4','$corr', '$test')";
   if ($conn->query($sql)===true) {
     echo "New record created successfully";
   
 
}
else {

echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();
}





?>
<html>
    <head>
   <link rel="stylesheet" href="task3.css">
       
    </head>
    
    <div class="head">
       
        
        <div  id="outer">
          <div id="inner"><p>Welcome Admin</p></div>
        </div>
        
       

        <nav>
            <ul class="navul">
           
                <li><a href="#" id="na">Question & Answer</a></li>
                <li><a href="#" id="na">Examinee List</a></li>
                <li><a href="#" id="na">Score Card</a></li>
                
                <div class="dropdown">
                  <button class="dropbtn">Dropdown
                  <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                   <a href="admin.php?id=Test1">Test 1</a>
                   <a href="admin.php?id=Test2">Test 2</a>
                   <a href="admin.php?id=Test3">Test 3</a>
                   <a href="admin.php?id=Test4">Test 4</a>
                  </div>
                </div>
                
            
               </li>
               
              
            </ul>
        </nav>
    </div>
    
    
    <div class="lftpor"><?php
    if (isset($_GET['id']) ) {
    $update=$_GET['id'];
    echo"<h1>This is $update</h1>";
    }
   
    ?>
    <form action="admin.php" method="post">
   <label for="question" style="font-size: 1.2em;">Question:</label><br>
  <input type="text" id="question" class="question" name="question" style="width: 100%; height:30%;"><br><br>
  <label for="op1" style="font-size: 1.2em;">Option 1:</label><br>
  <input type="text" id="op1" name="op1"><br><br>
  <label for="op2" style="font-size: 1.2em;">Option 2:</label><br>
  <input type="text" id="op2" name="op2"><br><br>
  <label for="op3" style="font-size: 1.2em;">Option 3:</label><br>
  <input type="text" id="op3" name="op3"><br><br>
  <label for="op4" style="font-size: 1.2em;">Option 4:</label><br>
  <input type="text" id="op4" name="op4"><br><br>
  <label for="correct" style="font-size: 1.2em;">Correct Option :</label><br>
  <input type="text" id="correct" name="correct"><br><br>
  <label for="op4" style="font-size: 1em;">Test No.</label><br>
  
  <select id="test" name="test">
    <option value="test1">test1</option>
    <option value="test2">test2</option>
    <option value="test3">test3</option>
    <option value="test4">test4</option>
    <option value="test5">test5</option>
  </select><br><br>
  
  <input type="submit" value="Submit" name="submit" class="sub">
    
    </form>
    </div>
         
    <footer>Copyright & copy</footer>
    </section>
   
</html>
