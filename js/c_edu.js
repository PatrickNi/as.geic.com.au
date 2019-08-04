// JavaScript Document
		$("input[name='t_fdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});
		$("input[name='t_tdate']").datepicker({format:'yyyy-mm-dd', viewMode:2}).on('changeDate', function(ev){if(ev.viewMode == 'days'){$(this).datepicker('hide');}});	
			
		$('#form_edu').find('input').click(function(){
			$(this).parent().parent().removeClass('has-error');
		})		
				
		$("button[id^='save_edu']").click(function(){		
			var pass = true;
			var next = false;
			var next_p = '';
			if ($(this).attr('id') == 'save_edu') {
				next = true;
				next_p = '&next=1';
			}

			$('#form_edu').find('input').each(function(){
				if($(this).val() == '') {
					switch($(this).attr('name')) {
						case 't_fdate':
							if (next) {
								window.location = $('#form_edu').attr('action') + '?'+next_p;
								pass = false
								return pass;
								break;
			
							}
						case 't_tdate':
						case 't_qual':
						case 't_major':
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
			$.post($('#form_edu').attr('action'), $('#form_edu').serialize() + next_p, function(data){
				loading('close');				
				obj = $.parseJSON(data);
				//alert(data);
				if (obj.succ == 0 || obj.add == '') {
					alert('提交失败！');
					return false;
				}
				
				if (next) {
					window.location = 'wxp.php'
					return true;
				}
				else if (location.href.indexOf('ref=2') > 0) {
					window.location = document.referrer;
					return true;
				}
					

				$('#confirm_edu').removeClass('hidden');				
				$("div[class='panel panel-warning']:last").before(obj.add);		
				$('#form_edu').find('input').val('');
				return true;
			})
			.error(function(){loading('close'); alert('提交失败！');});
		});		
		
		function del_edu(id) {
			loading('show');
			$.getJSON($('#form_edu').attr('action') + '?del=1&id='+ id, function(data){
				loading('close');
				$('#e'+id).remove();			
			});			
		}
