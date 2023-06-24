<meta charset="utf-8">

<HTML>
<HEAD><TITLE>공과대학 간식행사 당첨자</TITLE>
</HEAD>
<BODY bgcolor=#E6E6FA>
<br><br><center><font size=6><b>취소하시겠습니까?</b></font></center><br>
<?php 
$mysqli = new mysqli("localhost","ghkwon","2018100872","ghkwon");

if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else { 
	$sql = "SELECT * FROM P_order"; 
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo "<center><Table width=900>\n";
 		echo "<TH bgcolor=#ffffff></TH>  <TH bgcolor=#ffffff>이름</TH>  <TH bgcolor=#ffffff>학과</TH>";
 		echo "<TH bgcolor=#ffffff>학번 10자리(2018123456)</TH> <TH bgcolor=#ffffff>연락처 (010-1234-5678)</TH> <TH bgcolor=#ffffff>원하시는 간식</TH> <TH bgcolor=#ffffff>Delete</TH> <TR>\n";
 		$i = 1;
 		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
 			$id = $newArray['id'];
 			$user = $newArray['user'];
			$department = $newArray['department'];
			$studentID = $newArray['studentID'];
			$phoneNumber = $newArray['phoneNumber'];
			$orderItem = $newArray['orderItem'];
			echo "<TD bgcolor=#ffffff><center>".$i++."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$user."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$department."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$studentID."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$phoneNumber."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$orderItem."</center></TD>";
 			echo "<FORM action=deleteOrder2.php method=post>\n";
			echo "<input type=hidden name=id value=".$id.">";
			echo "<input type=hidden name=orderItem value=".$orderItem.">";
			echo "<TD bgcolor=#ffffff><center><input type=submit style='WIDTH: 40pt; HEIGHT: 18pt; color:#ffffff; background-color:#6495ed; border:none' value=delete></TD>";
			echo "</Form>\n";
 			echo "<TR>\n";
 		}
 		echo "</Table></center>\n";
 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
 	mysqli_close($mysqli);
} 
?>
</body>


	