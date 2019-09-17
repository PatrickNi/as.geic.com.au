<div class="col-lg-3" id="sidebar">
  <ul class="list-group affix">
    <a href="info.php" class="list-group-item {if $pagetype == 'info'}active{/if}">
        个人资料(Personal Profile)
        {if $steps.info.c == 1}
            <span class="badge"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
        {/if}
    </a>
    <a href="edu.php" class="list-group-item {if $pagetype == 'edu'}active{/if}">
        教育背景(Education Background)
        {if $steps.edu.c == 1}
            <span class="badge"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
        {/if}
    </a>
    <a href="wxp.php" class="list-group-item {if $pagetype == 'wxp'}active{/if}">
        工作经历(Workding Experience)
        {if $steps.wxp.c == 1}
            <span class="badge"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
        {/if}
    </a>
    <!--<a href="ielts.php" class="list-group-item {if $pagetype == 'ielts'}active{/if}">雅思成绩(IETLS)</a>-->
  </ul>
</div>
