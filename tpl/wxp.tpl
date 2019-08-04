{include file="header.tpl"}
 
<div class="container">
    <div class="row">
        <p></p>
        <div class="col-lg-9">
        	{foreach key=id item=v from=$wxp}
            <div class="panel panel-success" id="w{$id}">
                <div class="panel-heading">
                	<strong>{$v.fdate} ~ {$v.tdate}</strong>
	                 <button type="button" class="close" aria-hidden="true" onClick="del_wxp('{$id}')">&times;</button>   
                 </div>
                <div class="panel-body">      
                	<p>{$v.com}<p/>
                    <p>{$country[$v.country]}</p>                    
                    <p>{$v.pos}</p>   
					<p>{if $v.fulltime == 1}Fulltime{else}Parttime{/if}</p>   
					<p class="pull-right"><button type="button" class="btn btn-danger btn-xs" onClick="del_wxp('{$id}')">Delete(删除)</button></p>                                      
                </div>
            </div>
            {/foreach}
            <div class="panel panel-warning">
                <div class="panel-heading">工作经历(Working Experience)</div>
                <div class="panel-body">      
					<form class="form-horizontal" role="form" id="form_wxp" action="wxp.php">
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">开始时间(Start Date)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_fdate"/>
                	        </div>

                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">结束时间(Complete Date)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_tdate"/>
                	        </div>

                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">公司名称(Company)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_com"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">公司所属国家(Company Country)</label>
    	                    <div class="col-lg-6">
                             	<select class="form-control" name="t_country">
                               		{foreach key=id item=name from=$country}
                                    	<option value="{$id}" {if $id == $user.country} selected{/if}>{$name}</option>
                                    {/foreach}
                                </select>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">职位(Position)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_pos"/>
                	        </div>                    
                        </div>    
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">全职/半职<br />(Fulltime/Partime)</label>
    	                    <div class="col-lg-6">
                             	<label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="1" checked > 全职(Fulltime)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="0"> 半职(Partime)
                                </label>   
                	        </div>                    
                        </div>                                  
                    	<div class="form-group">
    	                    <div class="col-lg-offset-4 col-lg-6">
								<button type="button" class="btn btn-primary" id="save_wxp_new" >继续添加(Add New)</button>&nbsp;
                	        </div>                    
                        </div>                                                                                                                                                                                            
                    </form>
                </div>
            </div>
			<p class="pull-right">
				<a class="btn btn-default" href="edu.php" >&laquo; 上一步(Previous)</a>                                                                                    
				<button type="button" class="btn btn-success" id="save_wxp" >下一步(Next) &raquo;</button>&nbsp;
			</p>
        </div>
        {include file="sidebar.tpl"}                    
    </div>

{include file="footer.tpl"}            
