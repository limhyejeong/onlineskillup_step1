<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
	// DB에 접속
	$dbh = new PDO($dsn, $user, $pass);

	// 여기서 쿼리실행
	// query 메소드(SELECT)
	$query_result = $dbh -> query('SELECT * FROM board');

	// query 메소드(INSERT)
	$sth = $dbh->prepare('INSERT INTO board (name, title, content, password, email) VALUES (?, ?, ?, ?, ?)');

	// prepare 메소드 (SELECT)
	$sth_select  =  $dbh->prapare('SELECT * FROM board WHERE name = ?');

	// DB를 절단
	$dbh = null;
} catch (PDOException $e) {
	// 접속에 에러가 발생한 경우
	print "DB ERROR : " . $e->getMessage() . "<br/>";
	die();
}
?>

<?php
 foreach($query_result as $row) {
		print $row["name"] . " : " . $row["title"] . "<br/>";
	}
?>

<?php
	$name = "쿠쿠맘";
	$title = "아이와 자연체험하며 놀 수 있는 곳";
	$content = "따뜻한 봄날, 아이와 함께 자연의 아름다움도 살펴보고 자연 속에서 신나는 시간을 보내며 좋은 추억을 쌓아보아요!";
	$password = "k11";
	$email = "koomom@gmail.com";
	$sth->execute(array($name, $title, $content, $password, $email));
?>

<?php
	$name = "김경래";
	$sth_select->execute(array($name));
	$prepare_result = $sth_select->fetchAll();
	foreach($prepare_result as $row) {
		print $row["name"] . " : " . $row["text"] . "<br/>";
	}
	$sth_select->execute(array($name));
?>