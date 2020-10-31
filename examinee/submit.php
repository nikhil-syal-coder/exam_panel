<?php 
  include 'config.php';
     $a='<div>';
     $a='<p>thanx for giving exam</p>';
     $a.='</div>';

echo $a;

?>
<?php 
$count=0;
$array1=array();
$array2=array();
$sql1="SELECT * from test1";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {

array_push($array1,$row['correct']);

}
}

$sql1="SELECT * from correct2";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {

array_push($array2,$row['correct']);

}
}
for ($i=0;$i<=8;$i++) {
    if ($array1[$i]==$array2[$i]) {
        $count++;
    }
}    
    
    if($count>=4){
        echo "pappu pass ho gya ";
        echo "<p>you scored ".$count."</p>";
    }
   
    else{
        echo "you failed";
        echo "<p>you scored ".$count."</p>";
    }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>