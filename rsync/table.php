<?php

$TABLE = array ('client_info' => array('ext'=>array('t_c'=>1), 'col'=>array(
'CID' => 'pk',
'FK' => 'fk:cid',
'EMAIL'=>'t_email',
'LName' => 't_lname',
'FName' => 't_fname',
'Gender' => 't_gender',
'DoB' => 't_dob',
'EName' => 't_ename',
'HTel' => 't_tel',
'Mobile' => 't_mobile',
'CurResiAdd' => 't_add',
'CNCT_PName' => 't_c_name',
'CNCT_HTel' => 't_c_tel',
'CNCT_Mobile' => 't_c_mobile',
'CNCT_Add' => 't_c_add',
'CNCT_RTU' => 't_c_rtu',
'VisaID' => 't_visa',
'VisaClassID' => 't_class',
'ExpirDate' => 't_epdate',
'CNCT_Email' => 't_c_email',
'Note' => 't_note',
'ClientType' => 't_type',
'Country' => 't_country',
'AgentID' => 't_agent',
'CreateTime' => 't_sign',
'About' => 't_about',
'MaritalStatus' => 't_m',
'VisaClassTxt' => 't_classtxt',
'ActiveMem' => 't_actm',
'ActiveMem_Date' => 't_d_actm',
'Bank' => 't_bank',
)),

'client_qual' => array('ext'=>array('isNew'=>1), 'col'=>array(
'ID'=>'pk',
'FK'=>'fk:qid',
'CID'=>'cid',
'FDate'=>'t_fdate',
'TDate'=>'t_tdate',
'Note'=>'t_note',
'School'=>'t_school',
'QUal'=>'t_qual',
'Major'=>'t_major',
'IsCompleted'=>'t_status',
'IsFulltime'=>'t_fulltime',
'CountryID'=>'t_country'
)),

'client_work' =>array('ext'=>array('isNew'=>1), 'col'=>array(
'ID'=>'pk',
'FK'=>'fk:wid',
'FDate'=>'t_fdate',
'TDate'=>'t_tdate',
'Company'=>'t_com',
'Note'=>'t_note',
'CID'=>'cid',
'CountryID'=>'t_country',
'Position'=>'t_pos',
'IsFulltime'=>'t_fulltime',
)),

'client_ielts' => array('ext'=>array(), 'col'=>array(
'CID'=>'pk',
'FK'=>'fk:cid',
'Mod'=>'t_mod',
'TestDate'=>'t_testday',
'PlanDate'=>'t_planday',
'Overall'=>'t_result',
'Listening'=>'t_listen',
'Reading'=>'t_read',
'Writing'=>'t_write',
'Speaking'=>'t_speak',
))
);
