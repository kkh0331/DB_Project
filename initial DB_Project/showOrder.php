<meta charset="utf-8">

<HTML>
<HEAD><TITLE>공과대학 간식행사 당첨자</TITLE>
</HEAD>
<BODY bgcolor=#E6E6FA>
<br><br><center><font size=6><b>[공과대학 1학기 기말고사 간식행사]</b></font></center><br>
<?php 
$mysqli = new mysqli("localhost","ghkwon","2018100872","ghkwon");

if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else { 
	$sql = "SELECT * FROM P_item"; 
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo "<center><Table width=500>\n";
 		echo "<TH bgcolor=#ffffff width=50%>간식이름</TH>  <TH bgcolor=#ffffff width=25%>잔여개수</TH>  <TH bgcolor=#ffffff>총개수</TH> <TR>\n";
 		$sumOfRemainder = 0;
 		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
 			$orderItem = $newArray['orderItem'];
			$remainder = $newArray['remainder'];
			$total = $newArray['total'];
			echo "<TD bgcolor=#ffffff><center>".$orderItem."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$remainder."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$total."</center></TD>";
 			$sumOfRemainder = $sumOfRemainder + $remainder;
 			echo "<TR>\n";
 		}
 		echo "<TD bgcolor=#ffffff><center>전체 합계</center></TD>";
 		echo "<TD bgcolor=#ffffff><center>".$sumOfRemainder."</center></TD>";
 		echo "<TD bgcolor=#ffffff><center>300</center></TD>";
 		echo "</Table></center>\n";
 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res);
	
	$sql = "SELECT * FROM P_order"; 
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo "<br><br><center><font size=6><b>당첨내역</b></font><br><br>\n";
 		echo "<Table width=900>\n";
 		echo "<TH bgcolor=#ffffff></TH>  <TH bgcolor=#ffffff>이름</TH>  <TH bgcolor=#ffffff>학과</TH>";
 		echo " <TH bgcolor=#ffffff>학번 10자리(2018123456)</TH> <TH bgcolor=#ffffff>연락처 (010-1234-5678)</TH> <TH bgcolor=#ffffff>원하시는 간식</TH> <TR>\n";
 		$id = 1;
 		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
 			$user = $newArray['user'];
			$department = $newArray['department'];
			$studentID = $newArray['studentID'];
			$phoneNumber = $newArray['phoneNumber'];
			$orderItem = $newArray['orderItem'];
			echo "<TD bgcolor=#ffffff><center>".$id++."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$user."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$department."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$studentID."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$phoneNumber."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$orderItem."</center></TD>";
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

<center><br><br><a href=index.php>홈으로 가실래요?</a><br></center>
</BODY>
</HTML>