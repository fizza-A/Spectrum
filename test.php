<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Example</title>
</head>

<body>
   <?php
   $user = 'root';
   $password = 'root';
   $db = 'inventory';
   $socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';

   $link = mysql_connect(
      $socket,
      $user,
      $password
   );
   $db_selected = mysql_select_db(
      $db,
      $link
   );
   echo "test";
   ?>

   <h1>Try</h1>
   <form method='POST' action='test.php'>
      Name: <input type="text" name='box'><br>
      <input type="submit" name="submit">
   </form>
</body>
</html>
