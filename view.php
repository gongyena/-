<?php
include "php/dbcon.php";
$num = $_GET["num"];   //넘어온 인수(글번호)
/*조회수 1증가하는 부분*/
$sql = "UPDATE board SET view=view+1 WHERE num=$num";
mysqli_query($conn, $sql);
/*num 번호인 글 불러오기 부분*/
$sql = "SELECT * FROM board where num=$num";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<style type="text/css"> 
			#viewtable{
				border-collapse:collapse;
			}
			td{
				border:1px solid #ABCDEF;
			}
			#content{
				height:400px;
				vertical-aling:top;
			}
		</style>
		<!--table id=~~ 테이블 이름을 ~~로 정해서 그 이름에 맞는 테이블의 속성을 지정하는 거임!
		테이블 말고 다른 것도 막 바꿀 수 있다는 거임!! 띠용
		vertical-aling:top;-수직 정렬
		aling:right-좌우 정렬;
		-->
</head>
<body>
	<table id="viewtable" border="1">
		<tr>
			<td>제목</td>
			<td colspan="3" style="width:400px">
					<?php echo $data["subject"];?>
			</td>
		</tr>
		<tr>
			<td>작성자</td>
			<td><?php echo $data["id"];?></td>
			<td>날짜</td>
			<td><?php echo $data["w_date"];?></td>
		</tr>
		<tr>
			<td>조회수</td>
			<td colspan="3"><?php echo $data["view"];?></td>
		</tr>
		<tr>
			<td>내용</td>
			<td colspan="3" style="padding:10px 10px 50px 10px;">
				<?php echo $data["content"];?> </td>
		</tr>
		<tr>
			<td colspan="4">
				<a href="list.php">목록</a>
				<a href="edit.php?num=<?=$data["num"];?>">수정</a>
				<a href="del.php?num=<?=$data["num"];?>">삭제</a>
			</td>
		</tr>
	</table>
</body>
</html>
