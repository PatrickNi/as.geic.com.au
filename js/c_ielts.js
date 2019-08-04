// JavaScript Document
		$("input[name='t_testday']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
		$("input[name='t_planday']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
	
		$('#form_ielts').find('input').click(function(){
			$(this).parent().parent().removeClass('has-error');
		})
		
	
		$("#save_ielts").click(function(){		
			var pass = true;
			$('#form_info').find('input').each(function(){
				if($(this).val() == '') {
					switch($(this).attr('name')) {
						case 't_testday':
						case 't_result':
							alert('提交失败！红色框内容不能为空');							
							$(this).parent().parent().addClass('has-error');
							$(this).focus();
							pass = false;
							return false;							
							break;
						default:
							break;
					}					
				}
			});	
			
			if (!pass)
				return false;
			
			loading('show');	
			$.post($('#form_ielts').attr('action'), $('#form_ielts').serialize(), function(data){
				loading('close');
				obj = $.parseJSON(data);
				if (obj.succ == 0) {
					alert('提交失败！'+obj.msg);
					return false;
				}
				else {
					//alert('提交成功！');
					location.href = obj.href
					return true;
					//$('#confirm_ielts').removeClass('hidden');
				}
			}).error(function(){loading('close'); alert('提交失败！');});
		});
