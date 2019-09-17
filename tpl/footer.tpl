		<hr>
    	<footer>
            {if $cfm == 1}
                <p>预约请扫“哥伦布澳洲咨询”到秘书服务</p>
                <img width="180px" height="180px"  src="/images/wechat2.png">
                <p class="text-muted">geic.com.au</p>
            {/if}
            <img src="/images/geic4.png">
            <p style="padding-left: 55px;">哥伦布至尊服务您值得拥有，始自2000年！</p>
            <p style="padding-left: 55px;">Global professional services since 2000.</p>
	    </footer>
        <input type="hidden" id="errcode" value="{$error}" />
    </div> <!-- /container -->
    
  <!-- sample modal content -->
    <div id="mod_loading" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      		<div class="modal-content" style="width:200px">
            	<div class="modal-body" align="center">
     			<img src="/images/19-0.gif"/> 
                </div>
            </div>
      </div>
    </div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/include/bootstrap-3.0.2-dist/dist/js/bootstrap.js"></script>
	<script src="/include/datepicker/js/bootstrap-datepicker.js"></script>        
    {if $pagetype == 'info'}    
		<script src="/js/c_info.js?v02"></script> 
    {elseif $pagetype == 'edu'}
        <script src="/js/c_edu.js?v04"></script>    
    {elseif $pagetype == 'wxp'}
        <script src="/js/c_wxp.js?v055"></script>         
    {elseif $pagetype == 'ielts'}
        <script src="/js/c_ielts.js?v03"></script>                        
    {elseif $pagetype == 'cfm'}
        <script src="/js/c_cfm.js?v49"></script>                         
    {/if}
    
    {literal}
    <script>
		function loading(act) {
			
			if (act == 'show')
	            $('#mod_loading').modal({keyboard:false,backdrop:'static',show:true});		
			else
				$('#mod_loading').modal('hide');		
		}
		

		if ($('#errcode').val() != '') {
			switch($('#errcode').val()) {
				case '1':
					alert("请先登录，或注册！(Please sign in or sign up, first!)");
					break;
				case '2':
					alert("请完善您的各项资料(Please complete following sections in orange or white!)");
					break;
				default:
					break;
			}
		}
		
		$('#sign_up').click(function(){
			if($('#su_email').val() == '') {
				alert("注册邮件地址不能为空(Please fill in your email addreass !)");
				return false;	
			}
			loading('show');
			var tt = (new Date()).valueOf(); 				
			$.getJSON('/index.php?tt='+tt+'&em=' + $('#su_email').val(), function(data){
				loading('close');
				if (data.succ == 1)
					window.location.href = '/client/info.php';
				else
					alert("注册失败,邮件地址已存在!");
			});
		});

    </script>
    {/literal}
  </body>
</html>
