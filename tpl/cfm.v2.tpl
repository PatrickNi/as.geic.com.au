{include file="header.tpl"}
{literal}
    <style>
      .form-control {
        color:#0f0e0e;
      }
      input:disabled{  
        color: black;
        opacity: 1;
        -webkit-text-fill-color: black;
      }
    </style>
{/literal}

    <div class="container">
        <div class="row" style="padding-top:20px;">
          <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>请核实您填写的简历(Confirm your resume)!</strong>
          </div>
          <form class="form-horizontal" role="form" id="form_info" action="info.php">
              <input type="hidden" name="p_type" value="{$pagetype}">
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
                        <select class="form-control" name="t_country" disabled>
                            {foreach key=id item=v from=$country}
                                <option value="{$id}" {if $id == $user.country} selected{/if}>{$v.en}({$v.zh})</option>
                              {/foreach}
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">目前持有澳洲签证类别<br/>(Current Visa type)</label>
                      <div class="col-lg-8">
                        <select class="form-control" name="t_visa" disabled>
                            {foreach key=id item=v from=$visacate}
                                <option value="{$id}" {if $id == $user.visa} selected {/if}>{$v.en}({$v.zh})</option>
                              {/foreach}
                          </select>        
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">目前持有澳洲签证子类别<br/>(Current Visa subclass)</label>
                      <div class="col-lg-8">
                        <input name="t_classtxt" type="text" class="form-control" value="{$user.classtxt}" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">目前持有签证到期日<br/>(Current Visa Expiry Date)</label>
                      <div class="col-lg-4">
                        <input name="t_epdate" type="text" class="form-control" value="{$user.epdate}" disabled />
                      </div>    
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">姓<br/>(Last Name)</label>
                      <div class="col-lg-8">
                        <input name="t_lname" type="text" class="form-control" value="{$user.lname}" disabled/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">名<br/>(First Name)</label>
                      <div class="col-lg-8">
                        <input name="t_fname" type="text" class="form-control" value="{$user.fname}" disabled/>       
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">性别<br/>(Gender)</label>
                      <div class="col-lg-8">
                          <label class="checkbox-inline">
                            <input name="t_gender" type="radio" value="M" {if $user.gender == 'M'} checked {/if} disabled> 男（Male)
                          </label>
                          <label class="checkbox-inline">
                            <input name="t_gender" type="radio" value="F" {if $user.gender == 'F'} checked {/if} disabled> 女(Female)
                          </label>       
                      </div>
                    </div>  
                    <div class="form-group">
                      <label class="col-lg-4 control-label">生日<br/>(DoB)</label>
                      <div class="col-lg-8">
                        <input name="t_dob" type="text" class="form-control" value="{$user.dob}" disabled readonly="readonly"/>        
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-4 control-label">英文名<br/>(English Name)</label>
                      <div class="col-lg-8">
                        <input name="t_ename" type="text" class="form-control" value="{$user.ename}" disabled/>        
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-4 control-label">婚姻状况<br/>(Martial Status)</label>
                      <div class="col-lg-8">
                         <select name="t_m" class="form-control" disabled>
                          <option value="married" {if $user.married == 'married'} selected {/if} >结婚(Married)</option>
                          <option value="divorce" {if $user.married == 'divorce'} selected {/if}>离婚(Divorce)</option>
                          <option value="never_married" {if $user.married == 'never_married'} selected {/if}>未婚(Never Married)</option>
                          <option value="separated" {if $user.married == 'separated'} selected {/if}>分居(Separated)</option>
                          <option value="defacto" {if $user.married == 'defacto'} selected {/if}>同居(Defacto Relationship)</option>
                        </select>       
                      </div>
                    </div>      
                    <div class="form-group">
                      <label class="col-lg-4 control-label">手机<br/>(Mobile)</label>
                      <div class="col-lg-8">
                        <input name="t_mobile" type="text" class="form-control" value="{$user.mobile}" disabled/>       
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">从何处知道我们<br/>(Where do u known us)</label>
                        <div class="col-lg-8">
                              <select name="t_about" class="form-control input-sm" disabled>
                                    <option value="" selected>Others please specify below(其他请在下框手动填写)</option>              
                                    <option value="Wechat" {if $user.about == 'Wechat'} selected {/if}>“哥伦布咨询”公众微信</option>
                                    <option value="QQ" {if $user.about == 'QQ'} selected {/if}>QQ(腾讯)</option>
                                    <option value="Flyer" {if $user.about == 'Flyer'} selected {/if}>Flyer(传单发放)</option>
                                    <option value="Friends" {if $user.about == 'Friends'} selected {/if}>Friends(朋友同学) </option>
                                    <option value="Internet" {if $user.about == 'Internet'} selected {/if}>Internet(网上搜索)</option>
                                    <option value="Passby" {if $user.about == 'Passby'} selected {/if}>Passby(路过)</option>
                                    <option value="Seminar" {if $user.about == 'Seminar'} selected {/if}>Seminar(留学移民讲座)</option>
                                    <option value="SubAgent" {if $user.about == 'SubAgent'} selected {/if}>SubAgent(海外留学中介)</option>
                              </select>
                            <input type="text" name="t_aboutTxt" value="{$user.about}" class="form-control input-sm" disabled>      
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-8 col-lg-4">
                        <p class="pull-right">
                          <button type="button" class="btn btn-default" id="deep_edit_info_1" >编辑(Edit)</button>&nbsp;
                          <button type="button" class="btn btn-warning" id="deep_save_info_1" disabled>保存(Save)</button>&nbsp;
                        </p>
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
                        <input name="t_c_name" type="text" class="form-control" value="{$user.c_name}" disabled/> 
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-4 control-label">与您的关系<br/>(Relationship to you)</label>
                      <div class="col-lg-8">
                        <input name="t_c_rtu" type="text" class="form-control" value="{$user.c_rtu}" disabled/>         
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-4 control-label">联系人电子邮件<br/>(Contact person email)</label>
                      <div class="col-lg-8">
                        <input name="t_c_email" type="text" class="form-control" value="{$user.c_email}" disabled/>         
                      </div>
                    </div>    
                    <div class="form-group">
                      <label class="col-lg-4 control-label">联系人手机<br/>(Contact person mobile)</label>
                      <div class="col-lg-8">
                        <input name="t_c_mobile" type="text" class="form-control" value="{$user.c_mobile}" disabled/>         
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-lg-offset-8 col-lg-4">
                        <p class="pull-right">
                          <button type="button" class="btn btn-default" id="deep_edit_info_2" >编辑(Edit)</button>&nbsp;
                          <button type="button" class="btn btn-warning" id="deep_save_info_2" disabled>保存(Save)</button>&nbsp;
                        </p>
                      </div>                    
                    </div>                                                    
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
                        <textarea class="form-control" name="t_note" rows="3" disabled>{$user.note}</textarea>       
                      </div>
                    </div>
                  </div>                    
              </div> 
              <div class="form-group">
                  <div class="col-lg-offset-8 col-lg-4">
                    <p class="pull-right">
                      <button type="button" class="btn btn-default" id="edit_info" >编辑(Edit)</button>&nbsp;
                      <button type="button" class="btn btn-warning" id="save_info" disabled>保存(Save)</button>&nbsp;
                    </p>
                  </div>                    
              </div>                                                               
            </form>       
         
        	<hr/>
        	{foreach key=id item=v from=$edu}
            <div class="panel panel-primary" id="e{$id}">
                <div class="panel-heading">
                	教育背景(Education Background) - {$id} 
                 </div>
                <div class="panel-body"> 
                  <form class="form-horizontal" role="form" id="form_edu_{$id}" action="edu.php">
                    <input type="hidden" name="p_type" value="{$pagetype}">
                    <input type="hidden" name="qid" value="{$id}">
                      <div class="form-group">
                          <label class="col-lg-4 control-label">开始时间(Start Date)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control" name="t_fdate" value="{$v.fdate}" disabled/>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">结束时间(Complete Date)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control"name="t_tdate" value="{$v.tdate}" disabled/>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">学校名称(School Name)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control"name="t_school" value="{$v.school}"disabled/>
                          </div>                    
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">学校所属国家(School Country)</label>
                          <div class="col-lg-6">
                          <select class="form-control" name="t_country">
                                  {foreach key=id item=co from=$country}
                                      <option value="{$id}" {if $id == $v.country} selected{/if}>{$co.en}({$co.zh})</option>
                                    {/foreach}
                                </select>
                          </div>                    
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">学历(Qualification)</label>
                          <div class="col-lg-6">
                                <select name="t_qual" class="form-control" disabled>
                                  {foreach key=x item=name from=$quals}
                                      <option value="{$id}" {if $x == $v.qual}selected{/if}>{$name}</option>
                                  {/foreach}
                                </select>
                          </div>                    
                        </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">专业(Major)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control" name="t_major" value="{$v.major}" disabled/>
                          </div>                    
                        </div>  
                      <div class="form-group">
                          <label class="col-lg-4 control-label">全职/兼职<br />(full-time/part-time)</label>
                          <div class="col-lg-6">
                              <label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="1" {if $v.fulltime == 1}checked{/if} disabled> 全职(full-time)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="0" {if $v.fulltime == 0}checked{/if} disabled> 兼职(part-time)
                                </label>   
                          </div>                    
                        </div>                          
                      <div class="form-group">
                          <label class="col-lg-4 control-label">是否完成(Complete)</label>
                          <div class="col-lg-6">
                              <label class="checkbox-inline">
                                  <input name="t_status" type="radio" value="YES" {if $v.status == 'YES'} checked {/if} disabled> 是(YES)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_status" type="radio" value="NO" {if $v.status == 'NO'} checked {/if} disabled> 否(NO)
                                </label>   
                          </div>                    
                      </div>
                      <div class="form-group">
                          <div class="col-lg-offset-4 col-lg-6">
                            <p class="pull-right">
                              <button type="button" class="btn btn-default" onclick="del_edu({$id})">删除(Delete)</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" id="edit_edu_{$id}" >编辑(Edit) </button>&nbsp;
                              <button type="button" class="btn btn-warning" id="save_edu_{$id}" disabled >保存(Save) </button>
                            </p>
                          </div>
                      </div>    
                    </form>                
                </div>
            </div>
          {/foreach}

	      	<hr/>
          {foreach key=id item=v from=$wxp}
            <div class="panel panel-success" id="w{$id}">
                <div class="panel-heading">
                	工作经历(Workding Experience) - {$id}
                 </div>
                <div class="panel-body">      
                  <form class="form-horizontal" role="form" id="form_wxp_{$id}" action="wxp.php">
                    <input type="hidden" name="p_type" value="{$pagetype}">
                    <input type="hidden" name="wid" value="{$id}">
                      <div class="form-group">
                          <label class="col-lg-4 control-label">开始时间(Start Date)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control"name="t_fdate" value="{$v.fdate}" disabled/>
                          </div>

                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">结束时间(Complete Date)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control"name="t_tdate" value="{$v.tdate}" disabled/>
                          </div>

                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">公司名称(Company)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control"name="t_com" value="{$v.com}" disabled/>
                          </div>                    
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">公司所属国家(Company Country)</label>
                          <div class="col-lg-6">
                          <select class="form-control" name="t_country">
                                  {foreach key=id item=co from=$country}
                                      <option value="{$id}" {if $id == $c.country} selected{/if}>{$co.en}({$co.zh})</option>
                                    {/foreach}
                                </select>
                          </div>                    
                      </div>
                      <div class="form-group">
                          <label class="col-lg-4 control-label">职位(Position)</label>
                          <div class="col-lg-6">
                             <input type="text" class="form-control" name="t_pos" value="{$v.pos}" disabled/>
                          </div>                    
                      </div>    
                      <div class="form-group">
                          <label class="col-lg-4 control-label">全职/兼职<br />(full-time/part-time)</label>
                          <div class="col-lg-6">
                              <label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="1" {if $v.fulltime == 1} checked {/if}} disabled> 全职(full-time)
                                </label>
                                <label class="checkbox-inline">
                                  <input name="t_fulltime" type="radio" value="0" {if $v.fulltime == 0} checked {/if}} disabled> 兼职(part-time)
                                </label>   
                          </div>                    
                      </div>                                  
                      <div class="form-group">
                          <div class="col-lg-offset-4 col-lg-6">
                            <p class="pull-right">
                              <button type="button" class="btn btn-default" onclick="del_wxp({$id})">删除(Delete)</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" id="edit_wxp_{$id}" >编辑(Edit)</button>&nbsp;
                              <button type="button" class="btn btn-warning" id="save_wxp_{$id}" disabled>保存(Save)</button>&nbsp;
                            </p>
                          </div>                    
                      </div>                                             
                    </form>            
                </div>
            </div>
          {/foreach} 
          	<form class="form-horizontal" action="confirm.php?cfm=1" method="post">
                <div > 
                  <p class="pull-right" >
				            <input type="submit" class="btn btn-primary btn-lg" value="确认提交(Confirm & Submit)" />  
                </p>
               </div>
            </form>
        </div>
{include file="footer.tpl"}
