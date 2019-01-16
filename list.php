<?php
include "php/dbcon.php";
$sql = "SELECT * FROM board";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>글목록</title>
		<style type="text/css"> 
			table{
				border-collapse:collapse;
			}
			td{
				border:1px solid #123456;
			}
		</style> 
		<!--스타일로 따로 꾸미게 됨 {}안에 table의 속성을 지정할 수 있음. {}안에는 C언어 처럼 ;를
		붙여야함. #123456을 마음대로 바꾸면 됨.-->
	</head>
	<body>
		<table border="1">
		<!--th를 사용하면 td를 사용했을 때 보다 더 진하게 나옴. 그래서 보통 제목에 사용함.-->
			<tr>
				<th>번호</th>
				<th>제목</th>
				<th>작성자</th>
				<th>날짜</th>
				<th>조회수</th>
			</tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
?>
			<tr>
				<td><?php echo $row["num"];?></td>
				<td><a href="view.php?num=<?php echo $row["num"];?>">
					<?php echo $row["subject"];?></a>
				</td>
				<td><?php echo $row["id"];?></td>
				<td><?php echo $row["w_date"];?></td>
				<td><?php echo $row["view"];?></td>
			</tr>
<?php
		}
} else {
	echo "<tr><td colspan='5'>0 results</td></tr>";
}
?>
			<tr>
				<td colspan="5">
						[1][2][3][4][5][6][7][8][9][10]
				</td>
			</tr>
			<tr>
				<td colspan="5"><a href="write.php">글쓰기</a> </td>
			</tr>
		</table>
	</body>
</html>
<?php
 mysqli_close($conn);
?>

<!--아래에 있는 것은 웹프로그래밍할 때 기본적으로 써야할 것들임.
저장할 때 올타입하는 이유는 확장자가 text로 바뀌지 않게 하는 것이고
(파일이름).php와 같이 뒤에 .~을 붙여서 확장자를 정해준다.
<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		
	</body>
	
</html>
-----------------
<td colspan="5" align="right"> 오른쪽정렬
-->
