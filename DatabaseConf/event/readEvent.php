<?php
$conn = mysqli_connect('localhost','root','','api-festival');
$result= array();
$result['data']=array();
$response= mysqli_query($conn,"SELECT * FROM Evenement");

while ($row=mysqli_fetch_array($response)){

    $index['id_even']=$row[0];
    $index['Nom']=$row[1];
    $index['date']=$row[2];
    $index['id_art']=$row[3];
    $index['lieu']=$row[4];
    $index['Description']=$row[5];
    array_push($result['data'],$index);


}
$result['success']="1";
echo json_encode($result);
mysqli_close($conn);
