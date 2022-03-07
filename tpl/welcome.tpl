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
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>
    <div class="container">
      <div class="clearfix">
        <div class="alert alert-info alert-dismissible" role="alert" style="color: #575c5c;background-color: #d2d7da; border-color: #d2d7da;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div style="color:red;margin-bottom: 5px;">
              在线咨询，请至网站首页右下角<br>(周一至周五 9:00 – 5:30)
            </div>
            <p style="margin-bottom: 10px;">工作时间之外请填写， 哥伦布持牌顾问团队会在第一时间联系您。</p>
    
            <h4 style="text-align: center;">哥伦布咨询表</h4>
            <h4 style="text-align: center;">Australian Education &amp; Migration consultation</h4>    
        </div>
      </div>
      <div class="panel panel-primary" style="border-color: #911F23;">
        <div class="panel-body">
          <form method="post" id="form_welcome">
            <div class="form-group">
              <select class="form-control"  name="t_ctype" >
                <option value="0">* 您需要的服务 Service Needed</option>
                <option value="study">* 留学 Study</option>
                <option value="immi">* 移民 Immigration</option>
                <option value="homeloan">* 贷款 Home Loan</option>
                <option value="legal">* 法律 Legal</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-xs-6">
                <input type="text" class="form-control"  name="t_lname" placeholder="* 姓 Last name">
              </div>
              <div class="col-xs-6">
                <input type="text" class="form-control"  name="t_fname"  placeholder="* 名 First name">
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  name="t_wechatid" placeholder="* 微信 ID">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="t_phone"  placeholder="* 手机 Phone">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="t_email" placeholder="* 邮箱 Email">
            </div>
            <div class="form-group">
              <button type="button" id="save_welcome" class="btn btn-info btn-sm form-control" style="background-color: #911F23; border-color: #911F23;">提交咨询 Submit Information</button>
            </div>
          </form> 
        </div>
      </div>         
    </div>
{include file="footer.tpl"}            
