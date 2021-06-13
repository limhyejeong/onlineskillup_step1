<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>PHP의 샘플페이지</title>
  </head>
  <body>
    <?php
		if(isset($_POST["comment"]) && isset($_POST["name"])) {
			// 에스케이프 후 표시
			$comment = htmlspecialchars($_POST["comment"]);
			$name = htmlspecialchars($_POST["name"]);
			$title = htmlspecialchars($_POST["title"]);
			$color = htmlspecialchars($_POST["color"]);
			$email = htmlspecialchars($_POST["email"]);
			print("<div style='color: ${color}'>
				${name} : ${title}
				<br>
				\" ${comment} \"
				<br>
				${name}의 email : ${email}
				</div>"
			);
		} else {
	?>
		<p>코멘트를 남겨보세요.</p>
		<form method="POST" action="index.php">
			<label>제목 :
			</label> <input name="title" >
			<br><br>
			<label>이름 :
			</label> <input name="name" size="10">
			<br><br>
			<label>메일 주소 :
			</label> <input type="mail" name="email">
			<br><br>
			<input type="color" name="color">
			<br>
			<textarea name="comment" style="width: 400px; height: 100px;"> </textarea>
			<br>
			<input type="submit" value="전송" />
		</form>
	<?php
		}
	 ?>
  </body>
</html>