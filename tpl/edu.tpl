{include file="header.tpl"}
 
<div class="container">
    <div class="row">
        <p></p>
        <div class="col-lg-9">
        	{foreach key=id item=v from=$edu}
            <div class="panel panel-primary" id="e{$id}">
                <div class="panel-heading">
                	<strong>{$v.fdate} ~ {$v.tdate}</strong>
	                 <button type="button" class="close" aria-hidden="true" onClick="del_edu('{$id}')">&times;</button>   
                 </div>
                <div class="panel-body">      
                	<p>{$v.school} @{$country[$v.country]}<p/>
                    <p>{$v.qual}</p>
                    <p>{$v.major}</p>
                    <p>{if $v.fulltime == 1}Fulltime{else}Parttime{/if}</p>
                    <p>COMPLETED: {$v.status}</p>  
					<p class="pull-right"><button type="button" class="btn btn-danger btn-xs" onClick="del_edu('{$id}')">Delete(删除)</button></p>                                         
                </div>
            </div>
            {/foreach}
            <div class="panel panel-warning">
                <div class="panel-heading">教育背景(Education Background)</div>
                <div class="panel-body">      
					<form class="form-horizontal" role="form" id="form_edu" action="edu.php">
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
	                        <label class="col-lg-4 control-label">学校名称(School Name)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_school"/>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">学校所属国家(School Country)</label>
    	                    <div class="col-lg-6">
                             	<select class="form-control" name="t_country">
                               		{foreach key=id item=name from=$country}
                                    	<option value="{$id}" {if $id == $user.country} selected{/if}>{$name}</option>
                                    {/foreach}
                                </select>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">学历(Qualification)</label>
    	                    <div class="col-lg-6">
                                <select name="t_qual" class="form-control">
                                  <option value="No Qualification">初中以下(Below Junior School)</option>
                                  <option value="Middle School">初中(Junior High School)</option>
                                  <option value="High School">高中(Senior High School)</option>
                                  <option value="Vocational">职校(Vocational Collage)</option>
                                  <option value="Diploma">二年大专(Diploma)</option>
                                  <option value="Advance Diploma">三年大专(Advanced Diploma)</option>
                                  <option value="Bachelor">大学本科(Bachelor)</option>
                                  <option value="Graduate Certificate">研究生证书(Graduate Certificate)</option>
                                  <option value="Graduate Diploma">研究生文凭(Graduate Diploma)</option>
                                  <option value="Master">研究生(Master)</option>
                                  <option value="PH.D">博士(PHD)</option>
                                </select>
                	        </div>                    
                        </div>
                    	<div class="form-group">
	                        <label class="col-lg-4 control-label">专业(Major)</label>
    	                    <div class="col-lg-6">
        		                 <input type="text" class="form-control"name="t_major"/>
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
	                        <label class="col-lg-4 control-label">是否完成(Complete)</label>
    	                    <div class="col-lg-6">
                             	<label class="checkbox-inline">
                                  <input name="t_status" type="radio" value="YES" checked > 是(YES)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_status" type="radio" value="NO"> 否(NO)
                                </label>   
                	        </div>                    
                        </div>
						
                    	<div class="form-group">
    	                    <div class="col-lg-offset-4 col-lg-6">
                	        	<button type="button" class="btn btn-primary" id="save_edu_new" >继续添加(Add New) </button>&nbsp;
							</div>
                        </div>    
						
                    </form>
                </div>
            </div>
			
			<p class="pull-right">
				<a class="btn btn-default" href="info.php" >&laquo; 上一步(Previous)</a>
				<button type="button" class="btn btn-success" id="save_edu" >下一步(Next) &raquo;</button>&nbsp;
			</p>
        </div>
        {include file="sidebar.tpl"}                    
    </div>

{include file="footer.tpl"}            
