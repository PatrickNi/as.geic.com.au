<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Australian Visa Assessment</title>

    <!-- Bootstrap core CSS -->
    <link href="/include/bootstrap-3.0.2-dist/dist/css/bootstrap.min.css?v1" rel="stylesheet">
	<link href="/include/datepicker/css/datepicker.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="/css/jumbotron.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!--
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        -->
          <a class="navbar-brand" href="#" data-toggle="collapse" data-target=".navbar-collapse">"哥伦布"签证评估表(Australian Visa Assessment)</a>
        </div>
        <div class="navbar-collapse collapse">
        	{if $login_user != ''}
	        	<ul class="nav navbar-nav navbar-right">
    	        	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">{$login_user} <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="/exit.php">退出(Log off)</a></li>                        
                      </ul>                    
                  </li>
        	  	</ul>
            {else}
                <form class="navbar-form navbar-right" method="post" action="index.php">
                    <div class="form-group">
                      <input type="text" placeholder="Email" class="form-control" name="t_email">
                    </div>
                    <div class="form-group">
                      <input type="password" placeholder="Password" class="form-control" name="t_pass">
                    </div>
                    <button type="submit" class="btn btn-success" id="signin">会员登录(Sign in)</button>
                </form>
			{/if}
        </div><!--/.navbar-collapse -->
      </div>
    </div>
