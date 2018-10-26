<!DOCTYPE html>
<html>
    <head>
        <title>{$SITE_DETAILS.title} - master.serwery-go.pl</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Administration Daemon by th7">
        <meta name="keywords" content="th7nder,serwery,go,serwery-go">
        <meta charset="UTF-8">
       
        <!-- CSS -->
        <link href="{$STATIC_URL}/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="{$STATIC_URL}/css/icomoon.min.css" rel="stylesheet">
        <link href="{$STATIC_URL}/css/style.min.css" rel="stylesheet">
    </head>
    
    <body> 
        <div class="lbox-horz"></div>
        <div class="lbox-vert">
            <a href="" class="icon-info ttips forgot-password" title="Problem&nbsp;Login?"></a>
        </div>

        <div class="login-box side-form">
            <form method="POST" class="form-validation">
                <div class="form-group">
                    <input type="text" name="login" class="input-sm validate[required,custom[email]] form-control" placeholder="Login" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="input-sm validate[required] form-control" placeholder="Hasło" required>
                </div>
                <input type="submit" class="btn btn-gr-gray btn-block btn-xs" value="Zaloguj">
            </form>
        </div>
		<div style="margin: 0 auto; width: 480px;"{include file='_messages.tpl'}</div>
		<script src="{$STATIC_URL}/js/jquery-1.10.2.min.js"></script>
        <script src="{$STATIC_URL}/js/jquery-ui-1.10.3.min.js"></script>
        <script src="{$STATIC_URL}/js/bootstrap.min.js"></script>
    </body>
</html>