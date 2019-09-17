<?php
//user detail
function user_login() {
	return api_call(AS_API.AS_ACTION_REG.'?login=1');
}

function user_register($email='') {
	return api_call(AS_API.AS_ACTION_REG.'?reg=1&email='.$email);
}

function user_confirm() {
	return api_call(AS_API.AS_ACTION_REG.'?cfm=1');
}

function add_local_client($cid, $email) {
	if ($cid > 0 && $email !='') {
		$sql = "insert ignore into client_info (CID, EMAIL, FK, RSYNC) values ({$cid}, '{$email}', '{$cid}', 1)";
		return send_query($sql);	
	}
	return false;
}

function get_client($cid = 0) {
		$_arr = array();
		if(!($cid > 0)) {
			return $_arr;
		}
			
		$sql = " select CID, LName, FName, Gender, DoB, EName, Email, HTel, Mobile, CurResiAdd, Country, CNCT_PName, CNCT_HTel, CNCT_Mobile, CNCT_Email, CNCT_Add, CNCT_RTU, VisaID, VisaClassID, ExpirDate, UserID, Note, ClientType, AgentID, About, CreateTime, CourseUser, CourseVisitDate, STATUS, MaritalStatus, VisaClassTxt, ActiveMem_Date, ActiveMem, Bank from client_info where CID = {$cid} ";
 		$res = send_query($sql);
		while($row = fetch_row($res)) {
			$_arr['lname']   = $row['LName'];
			$_arr['fname'] 	 = $row['FName'];
			$_arr['gender']  = $row['Gender'];
			$_arr['dob'] 	 = $row['DoB'];
			$_arr['ename']	 = $row['EName'];
			$_arr['email'] 	 = $row['Email'];
			$_arr['tel'] 	 = $row['HTel'];
			$_arr['mobile']	 = $row['Mobile'];
			$_arr['add'] 	 = $row['CurResiAdd'];
			$_arr['country'] = $row['Country'];
			$_arr['visa'] 	 = $row['VisaID'];
			$_arr['class'] 	 = $row['VisaClassID'];
			$_arr['epdate']	 = $row['ExpirDate'];
			$_arr['userid']	 = $row['UserID'];
			$_arr['c_name']  = $row['CNCT_PName'];
			$_arr['c_tel']   = $row['CNCT_HTel'];
			$_arr['c_mobile']= $row['CNCT_Mobile'];
			$_arr['c_email'] = $row['CNCT_Email'];	
			$_arr['c_add'] 	 = $row['CNCT_Add'];
			$_arr['c_rtu'] 	 = $row['CNCT_RTU'];			
			$_arr['type'] 	 = explode(',', $row['ClientType']);
			$_arr['note'] 	 = $row['Note'];
			$_arr['agent'] 	 = $row['AgentID'];
			$_arr['about'] 	 = $row['About'];
			$_arr['sign'] 	 = $row['CreateTime'];		
			$_arr['cuser'] 	 = $row['CourseUser'];
			$_arr['cvdate']  = $row['CourseVisitDate'];
			$_arr['status']  = $row['STATUS'];
			$_arr['married'] = $row['MaritalStatus'];			
			$_arr['classtxt'] = $row['VisaClassTxt'];
			$_arr['actm'] = $row['ActiveMem'];
			$_arr['d_actm'] = $row['ActiveMem_Date'];
			$_arr['bank'] = $row['Bank'];						
		}
		return $_arr;
}

function set_client() {
	$sets = array();
	$client_id = isset($_REQUEST['cid'])? trim($_REQUEST['cid']) : 0;
	$sets['email']  = isset($_REQUEST['t_email'])? (string)trim($_REQUEST['t_email']) : "";
	$sets['pass']  = isset($_REQUEST['t_pass'])? (string)trim($_REQUEST['t_pass']) : "";
	$sets['visa']  = isset($_REQUEST['t_visa'])? (string)trim($_REQUEST['t_visa']) : 0;
	$sets['class'] = isset($_REQUEST['t_class'])? (string)trim($_REQUEST['t_class']) : 0; 
	$sets['classtxt']  = isset($_REQUEST['t_classtxt'])? (string)trim($_REQUEST['t_classtxt']) : "";

	# get client info
	$sets['lname']  = isset($_REQUEST['t_lname'])? (string)trim($_REQUEST['t_lname']) : "";
	$sets['fname']  = isset($_REQUEST['t_fname'])? (string)trim($_REQUEST['t_fname']) : "";
	//$sets['status']  = isset($_REQUEST['status'])? (string)trim($_REQUEST['status']) : "approved";	
	$sets['dob']    = isset($_REQUEST['t_dob']) && $_REQUEST['t_dob'] != ''? (string)trim($_REQUEST['t_dob']) : "0000-00-00";

	
	$sets['gender'] = isset($_REQUEST['t_gender'])? (string)trim($_REQUEST['t_gender']) : "";
	$sets['ename']  = isset($_REQUEST['t_ename'])? (string)trim($_REQUEST['t_ename']) : "";
	$sets['tel']    = isset($_REQUEST['t_tel'])? (string)trim($_REQUEST['t_tel']) : "";
	$sets['mobile'] = isset($_REQUEST['t_mobile'])? (string)trim($_REQUEST['t_mobile']) : "";
	$sets['add']    = isset($_REQUEST['t_add'])? (string)trim($_REQUEST['t_add']) : "";
	$sets['country']= isset($_REQUEST['t_country'])? (string)trim($_REQUEST['t_country']) : "";
	if (isset($_REQUEST['t_type']) && count($_REQUEST['t_type']) > 0 && is_array($_REQUEST['t_type']))
		$sets['type']   = implode(',', $_REQUEST['t_type']);
	
	$sets['agent']  = isset($_REQUEST['t_agent'])? (string)trim($_REQUEST['t_agent']) : 0;
	$sets['note']   = isset($_REQUEST['t_note'])? (string)trim($_REQUEST['t_note']) : "";
//	$sets['cuser']    = isset($_REQUEST['t_cuser'])? (string)trim($_REQUEST['t_cuser']) : 0;
	$sets['sign']  = isset($_REQUEST['t_sign'])  && $_REQUEST['t_sign'] != '' ? (string)trim($_REQUEST['t_sign']) : date('Y-m-d');
//	$sets['sign']  = $sets['sign'] == ""? date("Y-m-d"): $sets['sign'];
	
	$sets['about']  = isset($_REQUEST['t_about'])? (string)trim($_REQUEST['t_about']) : "";
	@$sets['about']  = $sets['about'] == "" ? (string)$_REQUEST['t_aboutTxt'] : $sets['about'];

	$sets['married']  = isset($_REQUEST['t_m'])? (string)trim($_REQUEST['t_m']) : "never_married";

	if (isset($_REQUEST['t_c']) && $_REQUEST['t_c'] == 1){
		$sets['c_name']  = isset($_REQUEST['t_c_name'])? (string)trim($_REQUEST['t_c_name']) : "";
		$sets['c_tel']   = isset($_REQUEST['t_c_tel'])? (string)trim($_REQUEST['t_c_tel']) : "";
		$sets['c_mobile']= isset($_REQUEST['t_c_mobile'])? (string)trim($_REQUEST['t_c_mobile']) : "";
		$sets['c_email'] = isset($_REQUEST['t_c_email'])? (string)trim($_REQUEST['t_c_email']) : "";
		$sets['c_add']   = isset($_REQUEST['t_c_add'])? (string)trim($_REQUEST['t_c_add']) : "";	
		$sets['c_rtu']   = isset($_REQUEST['t_c_rtu'])? (string)trim($_REQUEST['t_c_rtu']) : "";			
	}

	$sets['epdate']  = isset($_REQUEST['t_epdate']) && $_REQUEST['t_epdate'] != ''? (string)trim($_REQUEST['t_epdate']) : "0000-00-00";
//	$sets['epdate']  = $sets['epdate'] == ""? "0000-00-00" : $sets['epdate']; //date("Y-m-d")
	$sets['actm']  = isset($_REQUEST['t_actm'])? (string)trim($_REQUEST['t_actm']) : "";
	$sets['d_actm']  = isset($_REQUEST['t_d_actm']) && $_REQUEST['t_d_actm'] != ''? (string)trim($_REQUEST['t_d_actm']) : "0000-00-00";
	$sets['bank']  = isset($_REQUEST['t_bank'])? (string)trim($_REQUEST['t_bank']) : "";

	#set or add client info
	$msg = 'success';
    if ($client_id > 0){
        if($sets['about'] == ""){
			return "ERROR:Where do you know about us: can not be empty!";
        }
        else{
			//if ($_REQUEST['code'] != '') 
			//	$sets['agent'] = $o_a->getAgentIDByCode($_REQUEST['code']);
			
			foreach($sets as &$v){
				$v = addslashes($v);
			}
		
			$sql = "Update client_info SET RSYNC = 0, LName = '{$sets['lname']}', FName = '{$sets['fname']}', DoB = '{$sets['dob']}', Gender = '{$sets['gender']}', EName = '{$sets['ename']}', Email = '{$sets['email']}', HTel = '{$sets['tel']}', Mobile = '{$sets['mobile']}', CurResiAdd = '{$sets['add']}', Country = '{$sets['country']}', VisaID = '{$sets['visa']}', VisaClassID = '{$sets['class']}', ExpirDate = '{$sets['epdate']}', Note = '{$sets['note']}', ClientType = '{$sets['type']}', AgentID = '{$sets['agent']}', About = '{$sets['about']}', CreateTime = '{$sets['sign']}', MaritalStatus = '{$sets['married']}', VisaClassTxt = '{$sets['classtxt']}', ActiveMem = '{$sets['actm']}', ActiveMem_Date = '{$sets['d_actm']}', Bank = '{$sets['bank']}'";
			if (isset($sets['c_name']) && $sets['c_name'] != ""){
				$sql .= ", CNCT_PName = '{$sets['c_name']}', CNCT_HTel = '{$sets['c_tel']}', CNCT_Mobile = '{$sets['c_mobile']}', CNCT_ADD = '{$sets['c_add']}', CNCT_Email = '{$sets['c_email']}', CNCT_RTU = '{$sets['c_rtu']}' ";
			}

			$sql .= " where CID = '{$client_id}'";
			//var_dump($sql);exit;
        	return send_query($sql);
        }
    } else {
		
		if($sets['about'] == ""){
			return "ERROR:Where do you know about us: can not be empty!";			
        }
        else{
			//if ($_REQUEST['code'] != '') 
			//	$sets['agent'] = $o_a->getAgentIDByCode($_REQUEST['code']);

			$sets['type'] = strtolower(implode(',', $sets['type']));
			foreach($sets as &$v){
				$v = addslashes($v);
			}
			if (isset($sets['c_name']) && $sets['c_name'] != ""){
				$sql = "insert into `geic`.`client_info` (STATUS, LName, FName, Gender, DoB, EName, Email, HTel, Mobile, CurResiAdd, Country, VisaID, VisaClassID, ExpirDate, UserID, CNCT_PName, CNCT_HTel, CNCT_Mobile, CNCT_Add, ClientType, Note, About, AgentID, CreateTime, MaritalStatus, TOKEN, VisaClassTxt, CNCT_RTU, ActiveMem, ActiveMem_Date, Bank, CODE_FAKE) values ('{$sets['status']}','{$sets['lname']}', '{$sets['fname']}', '{$sets['gender']}', '{$sets['dob']}', '{$sets['ename']}', '{$sets['email']}', '{$sets['tel']}', '{$sets['mobile']}', '{$sets['add']}', '{$sets['country']}', '{$sets['visa']}', '{$sets['class']}', '{$sets['epdate']}', {$userid}, '{$sets['c_name']}', '{$sets['c_tel']}', '{$sets['c_mobile']}', '{$sets['c_add']}', '{$sets['type']}', '{$sets['note']}', '{$sets['about']}', '{$sets['agent']}', '{$sets['sign']}', '{$sets['married']}', '{$password}', '{$sets['classtxt']}', '{$sets['c_rtu']}', '{$sets['actm']}', '{$sets['d_actm']}', '{$sets['bank']}', '{$sets['code']}') ";
			}
			else{
				$sql = "insert into `geic`.`client_info` (STATUS, LName, FName, Gender, DoB, EName, Email, HTel, Mobile, CurResiAdd, Country, VisaID, VisaClassID, ExpirDate, UserID, ClientType, Note, About, AgentID, CreateTime, MaritalStatus, TOKEN, VisaClassTxt, ActiveMem, ActiveMem_Date, Bank, CODE_FAKE)values ('{$sets['status']}','{$sets['lname']}', '{$sets['fname']}', '{$sets['gender']}', '{$sets['dob']}', '{$sets['ename']}', '{$sets['email']}', '{$sets['tel']}', '{$sets['mobile']}', '{$sets['add']}', '{$sets['country']}', '{$sets['visa']}', '{$sets['class']}', '{$sets['epdate']}', {$userid}, '{$sets['type']}', '{$sets['note']}', '{$sets['about']}', '{$sets['agent']}', '{$sets['sign']}', '{$sets['married']}', '{$password}', '{$sets['classtxt']}', '{$sets['actm']}', '{$sets['d_actm']}', '{$sets['bank']}', '{$sets['code']}') ";
			}

			return send_query($sql);
		}
	}

}



//Education background
function get_edu($cid=0) {
		$sql = "select ID, FDate, TDate, School, CountryID, Qual, Major, Note, CID, ISCOMPLETED, ISFULLTIME from client_qual WHERE RSYNC <> 2";
		if ($cid > 0){
			$sql .= " AND  CID = {$cid}";
		}

		$sql .= " order by FDATE asc";
		$res = send_query($sql);
		$_arr = array();
		while($row = fetch_row($res)){
			$_arr[$row['ID']]['fdate']   = $row['FDate'];
			$_arr[$row['ID']]['tdate']   = $row['TDate'];
			$_arr[$row['ID']]['school']  = $row['School'];
			$_arr[$row['ID']]['country'] = $row['CountryID'];
			$_arr[$row['ID']]['qual']    = $row['Qual'];
			$_arr[$row['ID']]['major']   = $row['Major'];
			$_arr[$row['ID']]['note']    = $row['Note'];
			$_arr[$row['ID']]['cid']     = $row['CID'];
			$_arr[$row['ID']]['status']  = $row['ISCOMPLETED'];			
			$_arr[$row['ID']]['fulltime']= $row['ISFULLTIME'];						
		}
		return $_arr;
}

function set_edu() {
	$client_id = isset($_REQUEST['cid'])? trim($_REQUEST['cid']) : 0;
	$qual_id   = isset($_REQUEST['qid'])? trim($_REQUEST['qid']) : 0;
	$isNew     = isset($_REQUEST['isNew'])? trim($_REQUEST['isNew']) : 0;
	$isChange  = isset($_REQUEST['isChange'])? trim($_REQUEST['isChange']) : 0;

	$sets = array();
	$sets['country']= isset($_POST['t_country'])? (string)trim($_POST['t_country']) : 0;
	$sets['fdate']  = isset($_POST['t_fdate'])? (string)trim($_POST['t_fdate']) : "0000-00-00";
	$sets['fdate']   = $sets['fdate'] != ""? $sets['fdate'] : "0000-00-00";

	$sets['tdate']  = isset($_POST['t_tdate'])? (string)trim($_POST['t_tdate']) : "0000-00-00";
	$sets['tdate']   = $sets['tdate'] != ""? $sets['tdate'] : "0000-00-00";

	$sets['school'] = isset($_POST['t_school'])? (string)trim($_POST['t_school']) : '';	
	$sets['qual']   = isset($_POST['t_qual'])? (string)trim($_POST['t_qual']) : '';
	$sets['major']  = isset($_POST['t_major'])? (string)trim($_POST['t_major']) : '';

	$sets['note']   = isset($_POST['t_note'])? (string)trim($_POST['t_note']) : "";
	$sets['status']   = isset($_POST['t_status'])? (string)trim($_POST['t_status']) : "YES";

	$sets['fulltime']   = isset($_POST['t_fulltime'])? trim($_POST['t_fulltime']) : 0;


	if($sets['country'] == 0 || $sets['school'] == '' || $sets['fdate'] == "0000-00-00" || $sets['tdate'] == "0000-00-00"){
		return 'ERROR: Invalid Input Data';
	}
	else{
		if($isNew == 1){
			if(!($client_id > 0)){
				return false;
			}

			$sets['status'] = isset($sets['status'])? $sets['status'] : 'YES';
			foreach($sets as &$v){
				$v = addslashes($v);
			}
			
			$sql = "Insert into client_qual (FDate, TDate, School, CountryID, Qual, Major, Note, CID, IsCompleted, IsFulltime) values ('{$sets['fdate']}', '{$sets['tdate']}', '{$sets['school']}', '{$sets['country']}', '{$sets['qual']}', '{$sets['major']}', '{$sets['note']}', '{$client_id}', '{$sets['status']}', '{$sets['fulltime']}')";
			return send_query($sql);
		}
		else{
			if(!($qual_id > 0)){
				return false;
			}
			
			$sets['status'] = isset($sets['status'])? $sets['status'] : 'YES';		
			foreach($sets as &$v){
					$v = addslashes($v);
			}
		
			$sql = "Update client_qual SET RSYNC = 0, FDate = '{$sets['fdate']}', TDate = '{$sets['tdate']}', School = '{$sets['school']}', CountryID = '{$sets['country']}', Qual = '{$sets['qual']}', Major = '{$sets['major']}', Note = '{$sets['note']}', ISCOMPLETED = '{$sets['status']}' , ISFULLTIME = '{$sets['fulltime']}' where ID = {$qual_id} ";
			return send_query($sql);				
		}
	}	
}

function del_edu() {
	$qid   = isset($_REQUEST['qid'])? trim($_REQUEST['qid']) : 0;
	if($qid > 0){
		$sql = "update client_qual SET RSYNC = 2 where ID = {$qid} ";
		return send_query($sql);
	}
	return false;
}



//Workding experience
function get_wxp($client_id=0) {
		$sql = "select ID, FDate, TDate, Company, CountryID, Position, Note, CID, ISFULLTIME from client_work WHERE RSYNC <> 2";
		if ($client_id > 0){
			$sql .= " AND CID = {$client_id}";
		}

		$sql .= " Order by FDate asc ";
		$res = send_query($sql);
		$_arr = array();
		while($row = fetch_row($res)){
			$_arr[$row['ID']]['fdate'] = $row['FDate'];
			$_arr[$row['ID']]['tdate'] = $row['TDate'];
			$_arr[$row['ID']]['com']   = $row['Company'];
			$_arr[$row['ID']]['country']= $row['CountryID'];
			$_arr[$row['ID']]['pos']   = $row['Position'];
			$_arr[$row['ID']]['note']  = $row['Note'];
			$_arr[$row['ID']]['cid']   = $row['CID'];
			$_arr[$row['ID']]['fulltime']   = $row['ISFULLTIME'];		
		}
		return $_arr;
}

function set_wxp() {
	$client_id = isset($_REQUEST['cid'])? trim($_REQUEST['cid']) : 0;
	$work_id   = isset($_REQUEST['wid'])? trim($_REQUEST['wid']) : 0;
	$isNew     = isset($_REQUEST['isNew'])? trim($_REQUEST['isNew']) : 0;

	$sets = array();
	$sets['fdate']  = isset($_POST['t_fdate'])? (string)trim($_POST['t_fdate']) : "0000-00-00";
	$sets['fdate']  = $sets['fdate'] == ""? "0000-00-00" : $sets['fdate'] ; 

	$sets['tdate']  = isset($_POST['t_tdate'])? (string)trim($_POST['t_tdate']) : "0000-00-00";
	$sets['tdate']  = $sets['tdate'] == ""? "0000-00-00" : $sets['tdate'];

	$sets['com']    = isset($_POST['t_com'])? (string)trim($_POST['t_com']) : "";
	$sets['country'] = isset($_POST['t_country'])? (string)trim($_POST['t_country']) : "";

	$sets['pos']    = isset($_POST['t_pos'])? (string)trim($_POST['t_pos']) : "";

	$sets['note']   = isset($_POST['t_note'])? (string)trim($_POST['t_note']) : "";
	$sets['note']   = $sets['note'] != ""? $sets['note'] : " ";

	$sets['fulltime']   = isset($_POST['t_fulltime'])? trim($_POST['t_fulltime']) : 0;

	if($sets['com'] == ""){
		return 'ERROR:Invalid Company Name';	
	}else{
		if($isNew == 1){
			if(!($client_id > 0)){
				return false;
			}
			foreach($sets as &$v){
				$v = addslashes($v);
			}
			
			$sql = "Insert into client_work (FDate, TDate, Company, CountryID, Position, Note, CID, ISFULLTIME) values ('{$sets['fdate']}', '{$sets['tdate']}', '{$sets['com']}', '{$sets['country']}', '{$sets['pos']}', '{$sets['note']}', {$client_id}, '{$sets['fulltime']}')";
			return send_query($sql);		
		}
		else{
			if(!($work_id > 0)){
				return false;
			}
			foreach($sets as &$v){
				$v = addslashes($v);
			}
			
			$sql = "Update client_work SET RSYNC=0, FDate = '{$sets['fdate']}', TDate = '{$sets['tdate']}', Company = '{$sets['com']}', CountryID = '{$sets['country']}', Position = '{$sets['pos']}' , ISFULLTIME = '{$sets['fulltime']}', Note = '{$sets['note']}' where ID = {$work_id} ";
			return send_query($sql);		
		}
		
	}	

}

function del_wxp() {
		$work_id   = isset($_REQUEST['wid'])? trim($_REQUEST['wid']) : 0;
		if($work_id > 0){
			$sql = "update client_work SET RSYNC = 2 where ID = {$work_id} ";
			return send_query($sql);
		}
		return false;
}


//IELTS
function get_ielts($client_id = 0) {
   	$sql = "select `Mod`, TestDate, PlanDate, Overall, Listening, Reading, Writing, Speaking from client_ielts where CID = {$client_id}";
	$res = send_query($sql);
	$_arr = array();
	while($row = fetch_row($res)){
    	$_arr['mod'] = $row['Mod'];
    	$_arr['testday'] = $row['TestDate'];
    	$_arr['planday'] = $row['PlanDate'];
    	$_arr['overall'] = $row['Overall'];
    	$_arr['listen']  = $row['Listening'];
    	$_arr['read']    = $row['Reading'];
    	$_arr['write']   = $row['Writing'];
    	$_arr['speak']   = $row['Speaking'];
    }
    return $_arr;
}

function set_ielts() {
	$client_id = isset($_REQUEST['cid'])? trim($_REQUEST['cid']) : 0;

	$sets = array();
	$sets['testday']    = isset($_POST['t_testday'])? (string)trim($_POST['t_testday']) : "0000-00-00";
	$sets['testday']    = $sets['testday'] == ""? "0000-00-00" : $sets['testday'];
	
	$sets['planday']     = isset($_POST['t_planday'])? (string)trim($_POST['t_planday']) : "0000-00-00";
	$sets['planday']    = $sets['planday'] == ""? "0000-00-00" : $sets['planday'];
	
	$sets['mod']  = isset($_POST['t_mod'])? (string)trim($_POST['t_mod']) : "";
	$sets['overall']     = isset($_POST['t_result'])? (string)trim($_POST['t_result']) : "";
	$sets['listen'] = isset($_POST['t_listen'])? (string)trim($_POST['t_listen']) : "";
	$sets['read'] = isset($_POST['t_read'])? (string)trim($_POST['t_read']) : "";	
	$sets['write'] = isset($_POST['t_write'])? (string)trim($_POST['t_write']) : "";
	$sets['speak'] = isset($_POST['t_speak'])? (string)trim($_POST['t_speak']) : "";

	foreach ($sets as &$v){
   		$v = addslashes($v);
    }
    $sql = "insert into `client_ielts` (CID, FK, `Mod`, TestDate, PlanDate, Overall, Listening, Reading, Writing, Speaking, RSYNC) values ('{$client_id}', '{$client_id}', '{$sets['mod']}', '{$sets['testday']}', '{$sets['planday']}', '{$sets['overall']}', '{$sets['listen']}', '{$sets['read']}', '{$sets['write']}', '{$sets['speak']}', 0)";
    $sql .= " ON DUPLICATE KEY UPDATE `Mod` = VALUES(`MOD`), TestDate = values (TestDate), PlanDate = values(PlanDate), Overall = values(Overall), Listening=values(Listening), Reading = values(Reading), Writing = values(Writing), Speaking = values(Speaking), RSYNC = values(RSYNC) ";
	return send_query($sql);
}

//AS options sync
function dump_visacate() {
	return api_call(AS_API.AS_ACTION_SETTING.'?act=vc');
}

function dump_visacate_v2() {
	return api_call(AS_API.AS_ACTION_SETTING.'?act=vc2');
}

function dump_aboutus() {
	return api_call(AS_API.AS_ACTION_SETTING.'?act=aboutus');
}

function get_aboutus() {
	return include FRONTEND_PATH.'/aboutus.php';
}

function get_visacate() {
	return include  FRONTEND_PATH.'/visacate.php';	
}

function dump_country() {
	$tmp = api_call(AS_API.AS_ACTION_SETTING.'?act=co');
	$format = array();
	$format[1] = $tmp[1];//China
	unset($tmp[1]);
	$format[7] = $tmp[7];//Australian
	unset($tmp[7]);
	foreach ($tmp as $k => $v) {
		$format[$k] = $v;
	}
	return $format;
	//return api_call(AS_API.AS_ACTION_SETTING.'?act=co');
}	

function get_country() {
	return include FRONTEND_PATH.'/country.php';
}

