<?php
//*
// health_med_student_3.php
// Health Section
// Edit medication record for student
//*
//Version 1.00 April 18,2005

//Check if admin or nurse is logged in
session_start();
if(!session_is_registered('UserId') || $_SESSION['UserType'] != "N"  && 
$_SESSION['UserType'] != "A")
  {
    header ("Location: index.php?action=notauth");
	exit;
}

//Include global functions
include_once "common.php";
//Initiate database functions
include_once "ez_sql.php";
// Include configuration
include_once "configuration.php";

$menustudent=1;
$web_user=$_SESSION['UserId'];
$current_year=$_SESSION['CurrentYear'];

//Get student id
$studentid=get_param("studentid");
//Get action
$action=get_param("action");


if ($action=="edit"){
	//Get health event id
	$disid=get_param("disid");
	//Gather info from db
	$sSQL="SELECT health_med_history.health_med_history_id, health_med_history.health_med_history_notes, health_med_history.health_med_history_reason,
studentbio.studentbio_fname, studentbio.studentbio_lname, 
school_names.school_names_desc, school_years.school_years_desc, 
DATE_FORMAT(health_med_history.health_med_history_date, 
'" . _EXAMS_DATE . "') AS disdate, health_medicine.health_medicine_desc, 
health_medicine.health_medicine_id, 
health_med_history.health_med_history_notes, 
web_users.web_users_flname FROM ((((health_med_history INNER JOIN 
studentbio 
ON health_med_history.health_med_history_student = 
studentbio.studentbio_id) 
INNER JOIN school_names ON health_med_history.health_med_history_school = 
school_names.school_names_id) INNER JOIN school_years ON 
health_med_history.health_med_history_year = school_years.school_years_id) 
INNER 
JOIN health_medicine ON health_med_history.health_med_history_code = 
health_medicine.health_medicine_id) INNER JOIN web_users ON 
health_med_history.health_med_history_user = web_users.web_users_id WHERE 
health_med_history.health_med_history_id='". $disid ."'";
	$health=$db->get_row($sSQL);
	$slname=$health->studentbio_lname;
	$sfname=$health->studentbio_fname;
	$user=$health->web_users_flname;
	$cyear=$health->school_years_desc;
	$sschool=$health->school_names_desc;

}else{
	//Get student names
	$sSQL="SELECT studentbio_fname, studentbio_lname, studentbio_school FROM studentbio WHERE studentbio_id='". $studentid ."'";
	$student=$db->get_row($sSQL);
	$slname=$student->studentbio_lname;
	$sfname=$student->studentbio_fname;
	$sschoolid=$student->studentbio_school;;
	//Get user name
	$sSQL="SELECT web_users_flname FROM web_users WHERE web_users_id='". $web_user ."'";
	$user=$db->get_var($sSQL);
	//Get Year
	$sSQL="SELECT school_years_desc FROM school_years WHERE school_years_id='". $current_year ."'";
	$cyear=$db->get_var($sSQL);
	//Get School
	$sSQL="SELECT school_names_desc FROM school_names WHERE school_names_id='". $sschoolid ."'";
	$sschool=$db->get_var($sSQL);

};
//Get list of medicine codes
$healthcodes=$db->get_results("SELECT * FROM health_medicine ORDER BY 
health_medicine_desc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title><?php echo _BROWSER_TITLE?></title>
<style type="text/css" media="all">@import "student-health.css";</style>
<script language="JavaScript" src="datepicker.js"></script>
<link rel="icon" href="favicon.ico" type="image/x-icon"><link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<SCRIPT LANGUAGE="JAVASCRIPT">
<!--


// -->
</SCRIPT>


<script type="text/javascript" language="JavaScript" src="sms.js"></script>
</head>

<body><img src="images/<?php echo _LOGO?>" border="0">

<div id="Header">
<table width="100%">
  <tr>
    <td width="50%" align="left"><font size="2">&nbsp;&nbsp;<?php echo date(_DATE_FORMAT); ?></font></td>
    <td width="50%"><?php echo _HEALTH_MED_STUDENT_3_UPPER?></td>
  </tr>
</table>
</div>

<div id="Content">
	<h1><?php echo _HEALTH_MED_STUDENT_3_TITLE?></h1>
	<br>
	<h2><?php echo $sfname. " " .$slname ; ?></h2>
	<br>
	<h2><?php echo _HEALTH_MED_STUDENT_3_INSERTED?><?php echo $user; ?></h2>
	<table border="1" cellpadding="0" cellspacing="0" width="100%">
	<form name="health" method="POST" action="health_med_student_4.php">
	  <tr class="trform">
	    <td width="50%">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_SCHOOL?></td>
	    <td width="50%">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_YEAR?></td>
	  </tr>
	  <tr class="tblcont">
	    <td width="50%">&nbsp;<?php echo $sschool ; ?></td>
	    <td width="50%">&nbsp;<?php echo $cyear ; ?></td>
	  </tr>
	  <tr class="trform">
	    <td width="50%">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_MED?></td>
	    <td width="50%">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_DATE?></td>
	  </tr>
	  <tr class="tblcont">
	    <td width="50%" class="tdinput">
			  <select name="discode">
			  <option><?php echo _HEALTH_MED_STUDENT_3_MED?></option>
			   <?php
			   //Display medications codes from table
			   foreach($healthcodes as $healthcode){
			   ?>
		       <option value="<?php echo 
$healthcode->health_medicine_id; ?>" 
<?php if ($healthcode->health_medicine_id==$health->health_medicine_id){echo 
"selected=selected";};?>><?php echo $healthcode->health_medicine_desc; 
?></option>
			   <?php
			   };
			   ?>
			   </select>
		</td>
		<td width="50%" class="tdinput"><input type="text" onChange="capitalizeMe(this)" name="disdate" size="10" value="<?php if($action=="edit"){echo $health->disdate;};?>" READONLY onclick="javascript:show_calendar('health.disdate');"><a href="javascript:show_calendar('health.disdate');"><img src="images/cal.gif" border="0" class="imma"></a>
		</td>
	  </tr>
	  <tr class="trform">
	    <td width="100%" colspan="2">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_REASON?></td>
	  </tr>
	  <tr class="tdinput">
	    <td width="100%" colspan="2">&nbsp;<input type="text" onChange="capitalizeMe(this)" name="disaction" value="<?php if($action=="edit"){echo strip($health->health_med_history_reason);};?>"></td>
	  </tr>	  
	  <tr class="trform">
	    <td width="100%" colspan="2">&nbsp;<?php echo _HEALTH_MED_STUDENT_3_NOTES?></td>
	  </tr>
	  <tr class="tdinput">
	    <td width="100%" colspan="2">&nbsp;<textarea name="disnotes" cols="40" rows="5"><?php if($action=="edit"){echo strip($health->health_med_history_notes);};?></textarea></td>
	  </tr>

	<table>
	<br>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	  <tr>
	    <td width="50%"><a href="admin_edit_student_1.php?studentid=<?php echo $studentid; ?>" class="aform"><?php echo _HEALTH_MED_STUDENT_3_BACK?></a></td>
	    <td width="50%" align="right"><input type="submit" name="submit" value="<?php if($action=="edit"){echo _HEALTH_MED_STUDENT_3_UPDATE_NOTE;}else{echo _HEALTH_MED_STUDENT_3_ADD_NOTE;};?>" class="frmbut"></td>
	  </tr>
	  <input type="hidden" name="disid" value="<?php echo $disid; ?>">
	  <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
	  <input type="hidden" name="action" value="<?php if($action=="edit"){echo "update";}else{echo "new";};?>">
	</table>
</div>
<?php include "health_menu.inc.php"; ?>
</body>

</html>
