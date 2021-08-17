<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $pageData['title'];?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/css/bootsrtapp.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.minn.css" type="text/css">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
</head>
<body>

<header></header>

<div id="content">
    <div class="container-fluid table-block">
                <div class="row table-cell-block">
                        <h1 class="text-center login-title" style="margin:10% 0% 0% 43%" >регистрация</h1>
                        <div class="account-wall">
                            <img class="profile-img" src="https://s1.best-wallpaper.net/wallpaper/m/1205/Mountain-lake-walkway_m.webp" alt="">
                            <form method="post" class="form-signin" id="form-signin" name="form" action="2.php">
                            <input type="hidden" name="action" value="login"> 
                                <?php if(!empty($pageData['errorr'])) :?>
                                    <p style="margin:5% 0% 0% 15%"><?php echo $pageData['error']; ?></p>
                                <?php endif; ?>
                                <input type="text" style="margin:5% 0% 0% 15%" name="login" class="form-control" id="login" placeholder="Логин" required autofocus>
                                <input type="password" style="margin:5% 0% 0% 15%" name="pass" class="form-control" id="pass" placeholder="Пароль" required>
                                 <input type="text" style="margin:5% 0% 0% 15%" name="email" class="form-control" id="email" placeholder="email" required>
                                <br/>
                                <input type="submit" class="btn btn-lg btn-primary" style="margin:10% 0% 0% 35%" value="регистрация"/>
                            </form>
                             <a href="/" class="text-center new-account" style="margin:5% 0% 0% 43%">авторизация</a>
                        </div> 
                </div>
    </div>
</div>

<footer>
	
</footer>
</body>
</html>
  
</body>
</html>