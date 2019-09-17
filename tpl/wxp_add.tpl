<div class="panel panel-success" id="w{$id}">
    <div class="panel-heading">
        <strong>{$v.t_fdate} ~ {$v.t_tdate}</strong>
         <button type="button" class="close" aria-hidden="true" onClick="del_wxp('{$id}')">&times;</button>   
     </div>
    <div class="panel-body">      
        <p>{$v.t_com}<p/>
        <p>{$country}</p>
        <p>{$v.t_pos}</p>
        <p>{if $v.t_fulltime == 1}Full-time{else}Part-time{/if}</p>  
		<p class="pull-right"><button type="button" class="btn btn-danger btn-xs" onClick="del_wxp('{$id}')">Delete</button></p>                      
    </div>
</div>
