// JavaScript Document
		$("input[name='t_epdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
		$("input[name='t_dob']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
		$("select[name='t_about']").change(function(){
			if ($(this).val() != "")
				$("input[name='t_aboutTxt']").addClass("hidden");
			else
				$("input[name='t_aboutTxt']").removeClass("hidden");			
		})
		
		$('#form_info').find('input').click(function(){
			$(this).parent().parent().removeClass('has-error');
		})
		
	
		$("#save_info").click(function(){		
			var pass = true;
			$('#form_info').find('input').each(function(){
				if($(this).val() == '') {
					switch($(this).attr('name')) {
						case 't_email':
						case 't_dob':
						case 't_lname':
						case 't_fname':
							alert('提交失败，请检查红色框内不能为空！');						
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
			
			$("select[name='t_about']").each(function(){
				if ($(this).val() == '' && $("input[name='t_aboutTxt']").val() == '') {
							alert('提交失败，请检查红色框内不能为空！');						
							$(this).parent().parent().addClass('has-error');
							$(this).focus();
							pass = false;
							return false;										
				}
			});
			
			if (!pass)
				return false;
			
			loading('show');	
			$.post($('#form_info').attr('action'), $('#form_info').serialize(), function(data){
				loading('close');
				obj = $.parseJSON(data);
				if (obj.succ == 0) {
					alert('提交失败，邮件地址已存在！');
					$('#form_info').find("input[name='t_email']").each(function(){
						$(this).parent().parent().addClass('has-error');
						$(this).focus();
					});
				}
				else {
					if (location.href.indexOf('ref=2') > 0)
						location.href = document.referrer
					else 
						location.href = obj.href
					//$('#confirm_info').removeClass('hidden');
				}
			}).error(function(){loading('close'); alert('提交失败！');});
		});
