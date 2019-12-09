{include file="header.tpl"}
 
    <div class="container">
        <div class="row" style="padding-top:20px;">
        	<p></p>
        	<div class="col-lg-9">
                  <form class="form-horizontal" role="form" id="form_info" action="info.php">
                  <div class="panel panel-primary">
                      <div class="panel-heading">个人概况(Personal Information)</div>
                      <div class="panel-body">                 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">电子邮件<br/>(Email)</label>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Email" name="t_email" value="{$user.email}" readonly="readonly">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">护照持有国<br/>(Country of passport)</label>
                            <div class="col-lg-8">
                             	<select class="form-control" name="t_country">
                               		{foreach key=id item=v from=$country}
                                    	<option value="{$id}" {if $id == $user.country} selected{/if}>{$v.en}({$v.zh})</option>
                                    {/foreach}
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">目前持有澳洲签证类别<br/>(Current Visa type)</label>
                            <div class="col-lg-8">
                             	<select class="form-control" name="t_visa">
                               		{foreach key=id item=v from=$visacate}
                                    	<option value="{$id}" {if $id == $user.visa} selected {/if}>{$v.en}({$v.zh})</option>
                                    {/foreach}
                                </select>        
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">目前持有澳洲签证子类别<br/>(Current Visa subclass)</label>
                            <div class="col-lg-8">
        						<input name="t_classtxt" type="text" class="form-control" value="{$user.classtxt}"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">目前持有签证到期日<br/>(Current Visa Expiry Date)</label>
                            <div class="col-lg-4">
								
        						<input name="t_epdate" type="text" class="form-control" value="{$user.epdate}"//>
                          	</div>  	
						  </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">姓<br/>(Last Name)</label>
                            <div class="col-lg-8">
                				      <input name="t_lname" type="text" class="form-control" value="{$user.lname}"//>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">名<br/>(First Name)</label>
                            <div class="col-lg-8">
                 				       <input name="t_fname" type="text" class="form-control" value="{$user.fname}"//>       
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">性别<br/>(Gender)</label>
                            <div class="col-lg-8">
                                <label class="checkbox-inline">
                                  <input name="t_gender" type="radio" value="M" {if $user.gender == 'M'} checked {/if}> 男（Male)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_gender" type="radio" value="F" {if $user.gender == 'F'} checked {/if}> 女(Female)
                                </label>       
                            </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-lg-4 control-label">生日<br/>(DoB)</label>
                            <div class="col-lg-8">
                				<input name="t_dob" type="text" class="form-control" value="{$user.dob}"/>        
                            </div>
						  </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">英文名<br/>(English Name)</label>
                            <div class="col-lg-8">
                				<input name="t_ename" type="text" class="form-control" value="{$user.ename}"/>        
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">婚姻状况<br/>(Martial Status)</label>
                            <div class="col-lg-8">
                               <select name="t_m" class="form-control">
                                <option value="married" {if $user.married == 'married'} selected {/if} >结婚(Married)</option>
                                <option value="divorce" {if $user.married == 'divorce'} selected {/if}>离婚(Divorce)</option>
                                <option value="never_married" {if $user.married == 'never_married'} selected {/if}>未婚(Never Married)</option>
                                <option value="defacto" {if $user.married == 'defacto'} selected {/if}>同居(Defacto Relationship)</option>
                              </select>       
                            </div>
                          </div>      
                          <div class="form-group">
                            <label class="col-lg-4 control-label">手机<br/>(Mobile)</label>
                            <div class="col-lg-8">
                 				<input name="t_mobile" type="text" class="form-control" value="{$user.mobile}"/>       
                            </div>
                          </div>  
                          	<div class="form-group">
                            <label class="col-lg-4 control-label">从何处知道我们<br/>(Where do u known us)</label>
                            <div class="col-lg-8">
                                  <select name="t_about" class="form-control input-sm">
                                    {foreach key=id item=v from=$aboutus}
                                      <option value="{$id}" {if $user.about == '$id'} selected {/if}>{$v.en}({$v.zh})</option>
                                    {/foreach} 
                                    <option value="">Others please specify below(其他请在下框手动填写)</option>       
				                          </select>
	                              <input type="text" name="t_aboutTxt" value="{$user.about}" class="form-control" >      
                            </div>
                          </div>       
                      </div>                  
                  </div>  
                  
                     <div class="panel panel-success">
                        <div class="panel-heading">
                          选填项：紧急联系人(Optional: Emergency Contact Person)
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人姓名<br/>(Contact person name)</label>
                            <div class="col-lg-8">
        						<input name="t_c_name" type="text" class="form-control" value="{$user.c_name}"/> 
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">与您的关系<br/>(Relationship to you)</label>
                            <div class="col-lg-8">
        						<input name="t_c_rtu" type="text" class="form-control" value="{$user.c_rtu}"/>         
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人电子邮件<br/>(Contact person email)</label>
                            <div class="col-lg-8">
        						<input name="t_c_email" type="text" class="form-control" value="{$user.c_email}"/>         
                            </div>
                          </div>    
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人手机<br/>(Contact person mobile)</label>
                            <div class="col-lg-8">
        						<input name="t_c_mobile" type="text" class="form-control" value="{$user.c_mobile}"/>         
                            </div>
                          </div> 
<!--                          
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人地址<br/>(Contact person addr.)</label>
                            <div class="col-lg-8">
        						<input name="t_c_add" type="text" class="form-control" value="{$user.c_add}"/>         
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人家庭电话<br/>(Contact person home TEL)</label>
                            <div class="col-lg-8">
        						<input name="t_c_tel" type="text" class="form-control" value="{$user.c_tel}"/>         
                            </div>
                          </div>  
-->                                                   
                       </div>                                                                  
                    </div>  
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">您需要的服务(Service Needed)</div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="col-lg-4 control-label">&nbsp;</label>
                            <div class="col-lg-8">
				{foreach key=id item=t from=$all_types}
            				<input type="checkbox" name="t_type[]" value="{$t}" {if in_array($t, $user.type)} checked {/if}>{$id}&nbsp;&nbsp;
        			{/foreach}
                            </div>
                          </div>                  
                          <div class="form-group">
                            <label class="col-lg-4 control-label">对服务的其他详细要求，请在下框填写<br />(Others please specify below)</label>
                            <div class="col-lg-8">
 							 	<textarea class="form-control" name="t_note" rows="3">{$user.note}</textarea>       
                            </div>
                          </div>
                        </div>                    
                    </div> 
                    <p class="pull-right">
						<input type="hidden" name="t_agent" value="{$user.agent}">
						{if $user.agent == 0 || $user.agent == ''}
							<strong>选填: 邀请码(Optional: code):</strong><input name="code" type="text" />&nbsp;&nbsp;&nbsp;
                    	{/if}
						<button type="button" class="btn btn-success" id="save_info" >下一步(Next) &raquo;</button>&nbsp;
					</p>                                                                 
				</form>                 	            
           </div>
           {include file="sidebar.tpl"}                    
        </div>
{include file="footer.tpl"}
