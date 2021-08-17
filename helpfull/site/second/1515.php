<!DOCTYPE html>
<html laпg="ru">
<head>
<title>Загрузка файлов на cepвep</title>
<meta charset='utf-8'>
</head>
<body>
<h2><b> Форма дпя загрузки файлов </b></h2>
<form  method="post" action="upload.php" enctype="multipart/form-data">
  <p>id клиента к которому надо прикрепить<input type="text" name="id" id="id"></p>
  <p>название photo с расширением(jpg/png)<input type="text" name="photo" id="photo"></
<label>Ваш авантар:<input type="file" name="avatar"></label>
<input type="submit" name="send" value="Отправить файл">
</form>
</body>
</html> 
