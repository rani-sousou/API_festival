<?php
$conn = mysqli_connect('localhost','root','','api-festival');
$result= array();
$result['data']=array();
$response= mysqli_query($conn,"SELECT * FROM utilisateurs");

while ($row=mysqli_fetch_array($response)){

    $index['id']=$row[0];
    $index['Nom']=$row[1];
    $index['email']=$row[2];
    $index['password']=$row[3];
    array_push($result['data'],$index);


}
$result['success']="1";
echo json_encode($result);
mysqli_close($conn);