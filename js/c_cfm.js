$("button[id^='edit']").click(function(){
	form = $(this).parent().parent().parent().parent().attr('id')
	$('#'+form).find('input').attr('disabled',  false);
	$('#'+form).find('select').attr('disabled',  false);
	$('#'+form).find('textarea').attr('disabled',  false);
	$('#'+form).find("button[id^='save']").attr('disabled',  false);
});

$("button[id^='deep_edit']").click(function(){
	form = $(this).parent().parent().parent().parent().parent().parent().attr('id')
	$('#'+form).find('input').attr('disabled',  false);
	$('#'+form).find('select').attr('disabled',  false);
	$('#'+form).find('textarea').attr('disabled',  false);
	$('#'+form).find("button[id^='deep_save']").attr('disabled',  false);
});

$("button[id^='deep_save']").click(function() {
	form = $(this).parent().parent().parent().parent().parent().parent().attr('id')

	loading('show');
	$.post($('#'+form).attr('action'), $('#'+form).serialize(), function(data){
		loading('close');
		obj = $.parseJSON(data);
		if (obj.succ == 0) {
			alert('提交失败');
		}
		
		$('#'+form).find('input').attr('disabled',  true);
		$('#'+form).find('select').attr('disabled',  true);
		$('#'+form).find('textarea').attr('disabled',  true);
		$(this).attr('disabled', true);
	}).error(function(){loading('close'); alert('提交失败！');});
});

$("button[id^='save']").click(function() {
	form = $(this).parent().parent().parent().parent().attr('id')

	loading('show');
	$.post($('#'+form).attr('action'), $('#'+form).serialize(), function(data){
		loading('close');
		obj = $.parseJSON(data);
		if (obj.succ == 0) {
			alert('提交失败');
		}
		
		$('#'+form).find('input').attr('disabled',  true);
		$('#'+form).find('select').attr('disabled',  true);
		$('#'+form).find('textarea').attr('disabled',  true);
		$(this).attr('disabled', true);
	}).error(function(){loading('close'); alert('提交失败！');});
});

$("input[name='t_epdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
$("input[name='t_dob']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
$("input[name='t_fdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
$("input[name='t_tdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
$("input[name='t_testday']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
$("input[name='t_planday']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});

function del_wxp(id) {
	loading('show');
	$.getJSON('/client/wxp.php?del=1&id='+ id, function(data){
		loading('close');
		$('#w'+id).remove();			
	});			
}
function del_edu(id) {
	loading('show');
	$.getJSON('/client/edu.php?del=1&id='+ id, function(data){
		loading('close');
		$('#e'+id).remove();			
	});			
}