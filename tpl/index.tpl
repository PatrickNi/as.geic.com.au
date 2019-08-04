{include file="header.tpl"}
 <!-- Main jumbotron for a primary marketing message or call to action -->
 	{if $login_user == ''}
 	<div class="jumbotron">
      <div class="container">
        <h1 style="font-size:50px">澳大利亚即时在线签证评估<small class="text-warning" style="font-size:20px">快捷，在线 24小时全球服务</small></h1>
        <p>5分钟填写您的简历，即可在2个工作日内获得签证评估！</p>
        <p>领先一步，您的签证值得，澳洲最权威西人移民律师的亲自评估。</p>
        <p>会员请直接登录(Sign in)，新客户请免费注册(Sign up)!</p>
        <p></p>
        <h1 style="font-size:50px">Australia Only Online Visa Assessment</h1>
        <p>Please fill in your resume, our reputable immigration lawyer will provide Australian visa advice within 2 working days. </p>
        <p>Current member update resume, please sign in, new client please sign up!</p>        
      </div>
    </div>
	{/if}
    
    <div class="container">
		<div class="row">
			{if $login_user == ''}

			<div class="col-xs-4">
			    <input type="email" class="form-control input-lg" placeholder="Email Address" id="su_email">
			</div>
			<button class="btn btn-primary btn-lg" id="sign_up">快速注册(Sign up) &raquo;</button>
      {else}
          {if $cfm == 1}
          <p/>
          <div class="alert alert-warning">
              <strong>感谢您的咨询！</strong>
              您的澳大利亚签证咨询已经成功提交！ 我们的移民律师，会在当天回复您。
                <p></p>
                <strong>Congratulation!</strong>
                Your Australia visa inquiry has been submitted successfully. Our registered migration agents will advise you within 1 working day.Thank you for choosing Global.
            </div>             
            </p>         
          {else}
            <div class="col-md-3">
              <h2>个人资料</h2>
              <p>Personal Profile</p>
              <p><a class="btn {if $info.c == 1}btn-primary{elseif $info.s == 1}btn-warning{else}btn-default{/if}" href="client/info.php?ref=2" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-3">
              <h2>教育背景</h2>
              <p>Education Background</p>
              <p><a class="btn {if $edu.c == 1}btn-primary{elseif $edu.s == 1}btn-warning{else}btn-default{/if}" href="client/edu.php?ref=2" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-3">
              <h2>工作经历</h2>
              <p>Working Experience</p>
              <p><a class="btn {if $wxp.c == 1}btn-primary{elseif $wxp.s == 1}btn-warning{else}btn-default{/if}" href="client/wxp.php?ref=2" role="button">View details &raquo;</a></p>
            </div>
<!--
            <div class="col-md-3">
              <h2>雅思成绩</h2>
              <p>IELTS</p>
              <p><a class="btn {if $ielts.c == 1}btn-primary{elseif $ielts.s == 1}btn-warning{else}btn-default{/if}" href="client/ielts.php?ref=2" role="button">View details &raquo;</a></p>
            </div>
-->
  			     {if $status == 'pending'}
  				      <p><a class="btn btn-warning" href="/clieng/confirm.php">您还未确认(Please confirm)</a></p>
  			     {/if}
          {/if}
			{/if}
        </div>    
{include file="footer.tpl"}
