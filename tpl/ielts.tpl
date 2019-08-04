{include file="header.tpl"}
 
<div class="container">
    <div class="row">
        <p></p>
        <div class="col-lg-9">
            <div class="panel panel-warning">
                <div class="panel-heading">雅思(IELTS)</div>
                <div class="panel-body">      
					<form class="form-horizontal" role="form" id="form_ielts" action="ielts.php" method="post">
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">Module</label>
    	                    <div class="col-lg-6">
                                  <select name="t_mod" class="form-control" >
                                    <option value="academic" {if $user.mod == 'academic'} selected {/if} >Academic</option>
                                    <option value="general" {if $user.mod == 'general'} selected {/if}>General</option>
                                  </select>                                                                  
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">测试时间(Test Date)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_testday" value="{$user.testday}"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">总分(Overall Result)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_result" value="{$user.overall}"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">听(Listening)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_listen" value="{$user.listen}"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">读(Reading)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_read" value="{$user.read}"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">写(Writing)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_write" value="{$user.write}"/>
                	        </div>                    
                        </div>    
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">说(Speaking)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control" name="t_speak" value="{$user.speak}"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">预计参加考试时间<br/>(Planned attending IELTS test date)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_planday" value="{$user.planday}"/>
                	        </div>                    
                        </div>            
                    </form>
                </div>
            </div>            
			<p class="pull-right">
				<a class="btn btn-default" href="wxp.php" >&laquo; 上一步(Previous)</a>                                                                                    
				<button type="button" class="btn btn-success" id="save_ielts" >下一步(Next) &raquo;</button>&nbsp;
			</p>
		</div>
        {include file="sidebar.tpl"}                    
    </div>

{include file="footer.tpl"}            
