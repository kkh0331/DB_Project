<meta charset="utf-8">

<HTML>
<HEAD><TITLE>공과대학 간식행사</TITLE>
</HEAD>
<BODY bgcolor=#E6E6FA>
<br><br><br><br><br>
<center><table width=500><td bgcolor=#ffffff>
<center>
<br><font size=6><b>신청 결과</b></font><br>
<?php
$id = $_POST["id"];
$user = $_POST["user"];
$department = $_POST["department"];
$studentID = $_POST["studentID"];
$phoneNumber = $_POST["phoneNumber"];
$oldOrderItem = $_POST["oldOrderItem"];
$newOrderItem = $_POST["newOrderItem"];

$mysqli = new mysqli("localhost","ghkwon","2018100872","ghkwon");

if($newOrderItem == "선택") $newOrderItem = $oldOrderItem;

if (mysqli_connect_errno()) {
	printf("연결 실패 : %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "UPDATE P_order ";
	$sql .= " SET user='".$user."', department='".$department."', studentID='".$studentID."', phoneNumber='".$phoneNumber."', orderItem='".$newOrderItem."'";
	$sql .= " WHERE id='".$id."'";
	$res = mysqli_query($mysqli, $sql); 
	if ($res === TRUE) {
		echo "<p>P_order 테이블에 레코드 수정 성공";
	} else {
		printf("P_order 테이블에 레코드 수정 실패: %s\n", mysqli_error($mysqli));
	}
	
	$sql = "update P_item set remainder=remainder+1 where orderItem='".$oldOrderItem."';";
	$res = mysqli_query($mysqli, $sql);
	if ($res === TRUE) {
		echo "<p>P_item 테이블에 레코드 수정 성공";
	} else {
		printf("P_item 테이블에 레코드 수정 실패: %s\n", mysqli_error($mysqli));
	}
	
	$sql = "update P_item set remainder=remainder-1 where orderItem='".$newOrderItem."';";
	$res = mysqli_query($mysqli, $sql);
	if ($res === TRUE) {
		echo "<p>P_item 테이블에 레코드 수정 성공";
	} else {
		printf("P_item 테이블에 레코드 수정 실패: %s\n", mysqli_error($mysqli));
	}
	
	mysqli_close($mysqli);
}
?>

<br><br><br>
<a href=index.php>홈으로 가실래요?</a><br><br>
<a href=showOrder.php>당첨자 내역</a><br><br>
</center>
</td></table></center>
</body>
