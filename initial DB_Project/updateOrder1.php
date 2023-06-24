<meta charset="utf-8">

<HTML>
<HEAD><TITLE>공과대학 간식행사 당첨자</TITLE>
</HEAD>
<BODY bgcolor=#E6E6FA>
<br><br><center><font size=6><b>수정하시겠습니까?</b></font></center><br>
<?php 
$mysqli = new mysqli("localhost","ghkwon","2018100872","ghkwon");

if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else {
	$sql = "SELECT * FROM P_item"; 
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo "<br><center><font size=4><b>현재 잔여 수량</b></font><br><br>\n";
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
 		echo "</Table></center>\n<br><br><br>";
 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res);
	
	$sql = "SELECT * FROM P_order"; 
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo "<center><Table width=1000>\n";
 		echo "<TH bgcolor=#ffffff></TH>  <TH bgcolor=#ffffff>이름</TH>  <TH bgcolor=#ffffff>학과</TH> <TH bgcolor=#ffffff>학번 10자리(2018123456)</TH>";
 		echo "<TH bgcolor=#ffffff>연락처 (010-1234-5678)</TH> <TH bgcolor=#ffffff>기존 간식</TH> <TH bgcolor=#ffffff>새로 원하는 간식</TH> <TH bgcolor=#ffffff>Update</TH> <TR>\n";
 		$i = 1;
 		echo "<font color=red>*</font> 가능학과 - <b>건축공학과</b>, <b>건축학과</b>, <b>기계공학과</b>, <b>사회기반시스템공학과</b>, <font color=blue><b>산업경영공학과</b></font>, <b>원자력 공학과</b>, <b>정보전자신소재공학과</b>, <b>화학공학과</b>, <b>환경학및환경공학과</b>로 제한<br><br>";
 		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
 			$id = $newArray['id'];
 			$user = $newArray['user'];
			$department = $newArray['department'];
			$studentID = $newArray['studentID'];
			$phoneNumber = $newArray['phoneNumber'];
			$orderItem = $newArray['orderItem'];
			echo "<TD bgcolor=#ffffff><center>".$i++."</center></TD>";
			echo "<FORM action=updateOrder2.php method=post>\n";
			echo "<input type=hidden name=id value=".$id.">";
			echo "<input type=hidden name=oldOrderItem value=".$orderItem.">";
 			echo "<TD bgcolor=#ffffff><center><input type=text name=user value=".$user."></center></TD>";
 			echo "<TD bgcolor=#ffffff><center><input type=text name=department value=".$department."></center></TD>";
 			echo "<TD bgcolor=#ffffff><center><input type=text name=studentID value=".$studentID."></center></TD>";
 			echo "<TD bgcolor=#ffffff><center><input type=text name=phoneNumber value=".$phoneNumber."></center></TD>";
 			echo "<TD bgcolor=#ffffff><center>".$orderItem."</center></TD>";
 			echo "<TD bgcolor=#ffffff><center> <select name=newOrderItem> <option value=선택>선택";
 			echo "<option value=[서브웨이]1만원권>[서브웨이]1만원권 <option value=[맥도날드]1만원권>[맥도날드]1만원권 <option value=[GS25]1만원권>[GS25]1만원권 </select></center></TD>";
			echo "<TD bgcolor=#ffffff><center><input type=submit style='WIDTH: 40pt; HEIGHT: 18pt; color:#ffffff; background-color:#6495ed; border:none' value=update></TD>";
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