{include file="header.tpl"}
 
    <div class="container">
        <div class="row">
        	<div class="page-header">
            	<h1>个人资料(Personal Profile)<a href="/client/info.php?ref=1" class="btn btn-warning btn-xs inline">Edit(编辑)</a></h1>  
            </div>
            <form class="form-horizontal">
              <div class="panel panel-info">
                  <div class="panel-heading">个人概况(Personal Information)</div>
                  <div class="panel-body"> 
                    <div class="form-group">
                        <label class="col-lg-4 control-label">电子邮件<br/>(Email)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.email}</p>
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">护照持有国<br/>(Country of passport)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$country[$user.country]}</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">目前持有澳洲签证类别<br/>(Current Visa type)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$visacate[$user.visa]}</p>      
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">目前持有澳洲签证子类别<br/>(Current Visa subclass)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.classtxt}</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">目前持有签证到期日<br/>(Current Visa Expiry Date)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.epdate}</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">姓<br/>(Last Name)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.lname}</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">名<br/>(First Name)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.fname}</p>                    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">性别<br/>(Gender)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{if $user.gender == 'M'}男(Male){else}女(Female){/if}</p>    
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="col-lg-4 control-label">生日<br/>(DoB)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.dob}</p>                                        
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="col-lg-4 control-label">英文名<br/>(English Name)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.ename}</p> 
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="col-lg-4 control-label">婚姻状况<br/>(Martial Status)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">
                                {if $user.married == 'married'}
                                    结婚(Married)
                                {elseif $user.married == 'divorce'}
                                    离婚(Divorce)
                                {elseif $user.married == 'never_married'}
                                    未婚(Never Married)
                                {else}
                                    同居(Defacto Relationship)
                                {/if}
                            </p>     
                        </div>
                      </div>      
                      <div class="form-group">
                        <label class="col-lg-4 control-label">手机<br/>(Mobile)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.mobile}</p>                     
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="col-lg-4 control-label">现居住地址<br/>(Current residential address)</label>
                        <div class="col-lg-8">
                            <p class="form-control-static">{$user.add}</p> 
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-lg-4 control-label">从何处知道我们<br/>(Where do u known us)</label>
                        <div class="col-lg-8">
                              <p class="form-control-static">{$user.about}</p>    
                        </div>
                      </div>                   
	            	</div>
    	            </div>
                  <div class="panel panel-info">
                      <div class="panel-heading">联系人明细(Contact Person)</div>
                      <div class="panel-body">                     
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人姓名<br/>(Contact person name</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.c_name}</p> 
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">与您的关系<br/>(Relationship to you)</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.c_rtu}</p> 
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人电子邮件<br/>(Contact person email)</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.c_email}</p> 
                            </div>
                          </div>    
                          <div class="form-group">
                            <label class="col-lg-4 control-label">联系人手机<br/>(Contact person mobile)</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.c_mobile}</p>                     
                            </div>
                          </div>
						</div>
                    </div>
                  <div class="panel panel-info">
                      <div class="panel-heading">服务明细(Service Needed)</div>
                      <div class="panel-body">                                         
                                                    
                           <div class="form-group">
                            <label class="col-lg-4 control-label">服务类别<br />(Service Category)</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.type}</p> 
                            </div>
                          </div>                  
                          <div class="form-group">
                            <label class="col-lg-4 control-label">对服务的详细要求<br />(Other things we can help you)</label>
                            <div class="col-lg-8">
                                <p class="form-control-static">{$user.note}</p>                     
                            </div>
                          </div>  
                          </div>
                          </div>                                              
            </form>
                   
        	<div class="page-header">
            	<h1>教育背景(Education Background)<a href="/client/edu.php?ref=1" class="btn btn-warning btn-xs inline">Edit(编辑)</a></h1>                
            </div>
        	{foreach key=id item=v from=$edu}
            <div class="panel panel-primary" id="e{$id}">
                <div class="panel-heading">
                	<strong>{$v.fdate} ~ {$v.tdate}</strong> 
                 </div>
                <div class="panel-body">      
                	<p>{$v.school} @{$country[$v.country]}<p/>
                    <p>{$v.qual}</p>
                    <p>{$v.major}</p>
                    <p>{if $v.fulltime == 1}Fulltime{else}Parttime{/if}</p>
                    <p>COMPLETED: {$v.status}</p>                    
                </div>
            </div>
            {/foreach}                        
	      	<div class="page-header">
            	<h1>工作经历(Workding Experience)<a href="/client/wxp.php?ref=1" class="btn btn-warning btn-xs inline">Edit(编辑)</a></h1>                
            </div>
{foreach key=id item=v from=$wxp}
            <div class="panel panel-success" id="e{$id}">
                <div class="panel-heading">
                	<strong>{$v.fdate} ~ {$v.tdate}</strong>  
                 </div>
                <div class="panel-body">      
                	<p>{$v.com}<p/>
                    <p>{$country[$v.country]}</p>                    
                    <p>{$v.pos}</p>   
					<p>{if $v.fulltime == 1}Fulltime{else}Parttime{/if}</p>                    
                </div>
            </div>
            {/foreach}            
    	  	<div class="page-header">
            	<h1>雅思成绩(IETLS)<a href="/client/ietls.php?ref=1" class="btn btn-warning btn-xs inline">Edit(编辑)</a></h1>                
            </div>  
            <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>测试时间<br/>(Test Date)</th>
                    <th>总分<br/>(Overall Result)</th>
                    <th>听<br/>(Listening)</th>
                    <th>读<br/>(Reading)</th>
                    <th>写<br/>(Writing)</th>
                    <th>说<br/>(Speaking)</th>  
                    <th>预计参加考试时间<br/>(Planned attending IELTS test date)</th>                                                                              
                  </tr>
                </thead>
                <tbody>            	                  
                  <tr class="active">
                  	<td>{$ielts.testday}</td> 
                    <td>{$ielts.overall}</td> 
                    <td>{$ielts.listen}</td> 
                    <td>{$ielts.read}</td> 
                    <td>{$ielts.write}</td> 
                    <td>{$ielts.speak}</td> 
                    <td>{$ielts.planday}</td>                                                           
                  </tr>
				</tbody>                                                                                                 
            </table>                                        
          	<form class="form-inline" action="confirm.php?cfm=1" method="post">
                <div class="pull-right">            	
   	               <!--{$google_recaptcha}
                   <input type="submit" class="btn btn-primary btn-lg  btn-block" value="填写验证码确认(Confirm & Submit)" />
                   -->
				   <input type="submit" class="btn btn-primary btn-lg  btn-block" value="确认提交(Confirm & Submit)" />  
				   <p></p>
                   <a class="btn btn-default btn-lg btn-block" href="/index.php">返回重填(Back to check)</a> 
               </div>
        </div>
{include file="footer.tpl"}
