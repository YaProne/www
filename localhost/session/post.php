<?
// include("db.php");

if(isset($_POST['logoff'])):
  $_SESSION['user'] = '';	
  header('Location: ./');
  exit();
endif;

$stmt = $db->prepare(<<<SQL
  Select id From users 
    Where user = :u 
    And password = :p
SQL
);  

$stmt->bindValue(':u', $_POST["user"]);
$stmt->bindValue(':p', $_POST["password"]);

$cursor = $stmt->execute();

if($row = $cursor->fetchArray()):
  $_SESSION['user'] = $_POST['user'];
  $time = $_SESSION['logon'] = strftime("%c");

  $q = $db->prepare(<<<SQL
    Insert Into logins(user_id, logon, ip, ua)
    Values(:id, :time, :ip, :ua)
SQL
);
  $q->bindValue(':id', $row['id']);
  $q->bindValue(':time', $time);
  $q->bindValue(':ip', $_SERVER['REMOTE_ADDR']);
  $q->bindValue(':ua', $_SERVER['HTTP_USER_AGENT']);
  $q->execute();
else:
  $_SESSION['user'] = '';
  $_SESSION['lastUser'] = $_POST['user'];
endif;

// header('HTTP/1.0 301 Redirect');
header('Location: ./');
?>
