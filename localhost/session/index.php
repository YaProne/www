<?
session_start();

include('db.php');

if('POST'==$_SERVER['REQUEST_METHOD']):
	include('post.php');
endif;

$count = $_SESSION['count'] + 1;
$_SESSION['count'] = $count;
$_SESSION['last'] = strftime("%c");
?>
<h1>Сессия</h1>

<? 
if($_SESSION['user']):

$q = $db->prepare(<<<SQL
	Select 
	  name 
	From 
	  users 
	Where
	  user=:user
SQL
);
$q->bindValue(':user', $_SESSION['user']);
$cursor = $q->execute();
$row = $cursor->fetchArray();
$userName = $row['name'];
?>
Здравствуйте, <?= htmlspecialchars($userName) ?>!
<br>
<form method=POST>
<input type=hidden name="logoff">
<input type=submit value=Выход>
</form>
<?
else:
?>
Вы не авторизованы, авторизуйтесь!
<form method=POST>
<label>Имя пользователя<br>
  <input type=text name=user required
         value="<?= htmlspecialchars($_SESSION['lastUser'])?>">
</label>
<p>
<label>Пароль<br>
  <input type=password name=password required>
</label>
<p>
<input type=submit value="Авторизоваться!">
</form><?
endif;

$query = $db->prepare(<<<SQL
	Select id From users Where user = :user
SQL
);	
$query->bindValue(':user', $_SESSION['user']);
$cursor = $query->execute();
$row = $cursor->fetchArray();
$user_id = $row['id'];

$query = $db->prepare(<<<SQL
	Select
	  Count(id) As num,
	  Count(Distinct ip) As ips,
	  Max(logon) As time,
	  (Select logon 
	   From logins 
	   Where user_id=:u1 
	   Order By id Desc
	   Limit 1) As last_time,
	  (Select logon 
	   From logins 
	   Where user_id=:u2
	   Order By id Desc
	   Limit 1 Offset 1) As prev_time
	From 
	  logins
	Where
	  user_id = :u3
SQL
);
$query->bindValue(':u1', $user_id);
$query->bindValue(':u2', $user_id);
$query->bindValue(':u3', $user_id);
$cursor = $query->execute();
$row = $cursor->fetchArray();
print_r($row);
?>
<p>
Вы были здесь <?= $count ?> раз.

<hr>

<hr>
<a href=session.zip>Исходный код</a>
<pre>
<?
/*
$db = new SQLite3('C:\OpenServer\domains\db\session.sq3');
$db->enableExceptions(true);

$cursor = $db->query("Select * From users Order By 2");

while($row = $cursor->fetchArray()):
	print_r($row);
endwhile;
*/
?>