// JavaScript Document
$("#save_welcome").click(function(){       
    var pass = true;
    $('#form_welcome').find('input').each(function(){
        if($(this).val() == '') {
            switch($(this).attr('name')) {
                case 't_email':
                case 't_phone':                        
                    $(this).parent().parent().addClass('has-error');
                    pass = false;
                    break;
                default:
                    break;
            }                   
        }
    });
    
    if (!pass) {
        alert('提交失败，请检查红色框内不能为空！');
        return false;
    }
    
    loading('show');    
    $.post($('#form_welcome').attr('action'), $('#form_welcome').serialize(), function(data){
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
            location.href = obj.href
        }
    }).error(function(){loading('close'); alert('提交失败！');});
});
