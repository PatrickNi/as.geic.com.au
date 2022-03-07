<div class="panel panel-primary" id="e{$id}">
    <div class="panel-heading">
        <strong>{$v.t_fdate} ~ {$v.t_tdate}</strong>
         <button type="button" class="close" aria-hidden="true" onClick="del_edu('{$id}')">&times;</button>   
     </div>
    <div class="panel-body">      
        <p>{$v.t_school} @{$country}<p/>
        <p>{$v.t_qual}</p>
        <p>{$v.t_major}</p>
        <p>{if $v.t_fulltime == 1}Full-time{else}Part-time{/if}</p>        
        <p>COMPLETED: {$v.t_status}</p>  
		<p class="pull-right"><button type="button" class="btn btn-danger btn-xs" onClick="del_edu('{$id}')">Delete(删除)</button></p>                          
    </div>
</div>
