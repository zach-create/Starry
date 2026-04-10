<?php




$n1 = $_POST['name'];
$n2 = $_POST['phno'];
$n3 = $_POST['topic'];
$n4 = $_POST['msg'];

include("dbcon.php");
$sql = "INSERT INTO info (names, phno, topic, msg )VALUES ('$n1', '$n2', '$n3','$n4')";

/*if ($conn->query($sql) === TRUsE) {
    alert("Message Successfully Sent");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();*/
?>
