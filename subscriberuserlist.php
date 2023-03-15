<?php


header('Location:https://profile.memorisation.co.uk/subscribe_user_postdata');
/*
$localhost='localhost';
$username = 'u9evbpogjdg03';
$password = '2k(vj1+&1i^3';
$database = 'dbsvnjhx4mjyel';


$conn = mysqli_connect($localhost,$username,$password,$database);

if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	exit();
}

$sql_user_subscribe = mysqli_query($conn,"select * from user_subscribe");

$maxDays=date('t');
$last_maildate = ($maxDays-22);
$monthday_mailshot_date = [8,15,22,$maxDays];

$result = [];
while ($row = mysqli_fetch_assoc($sql_user_subscribe)) {
	$result[] = $row;
	$subscribe_val->profile_id;
    $lastdayold = date('Y-m-d',strtotime('-1 days'));
    $lastdayold_start = $lastdayold.' 00:00:00';
    $lastdayold_end= $lastdayold.' 23:59:59';
    $table_name_arr = ['journal_post','life_of','media_images','memories','respect_post','timeline'];
    $weekly_user = $daily_user = [];
    if($subscribe_val->subscription_type==2){
    	$sql_result = [];
        $weekly_user[] = $subscribe_val;
        // exit('asasdd');
        for($w=0;$w<count($monthday_mailshot_date);$w++){
        	if($monthday_mailshot_date[$w]==date('j')){
                $date = date('Y-m-').$monthday_mailshot_date[$w];
                $days_diff = ((count($monthday_mailshot_date)-1)==$w) ? $last_maildate : 7;
                $weekstartdate = date('Y-m-d',strtotime($date.'-'.$days_diff.' days'));
                $weekenddate = date('Y-m-d',strtotime($date.'-1 days'));
                $weekstartdate = $weekstartdate.' 00:00:00';
                $weekenddate = $weekenddate.' 23:59:59';
                for($tb=0;$tb<count($table_name_arr);$tb++){
                    
                    if(isset($weekenddate) && isset($weekstartdate)){
                        $ispubliclifeof = ($table_name_arr[$tb]=='life_of') ? ' and is_public=1' : '';
                        $ispublicmedia = ($table_name_arr[$tb]=='media_images') ? ' and media_ispublic=1' : '';
                        $ispublicjournal = ($table_name_arr[$tb]=='journal_post') ? ' and is_public=1' : '';
                        $sql_result_resp[$table_name_arr[$tb]] = $this->db->query("SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$weekstartdate' and '$weekenddate' OR updated_at BETWEEN '$weekstartdate' and '$weekenddate') and `status` = 1 and trash=0 ".$ispubliclifeof.$ispublicmedia.$ispublicjournal);
                        // echo 
                        if($sql_result_resp[$table_name_arr[$tb]]->num_rows()>0){
                            $sql_result[$table_name_arr[$tb]] = $sql_result_resp[$table_name_arr[$tb]]->result();
                        }
                    }
                }
                $sql_result['feature_post'] = $this->featurepost_for_subscriber($subscribe_val->profile_id,$lastdayold_start,$lastdayold_end);
            }
        }
        if(!empty($sql_result['journal_post']) || !empty($sql_result['life_of']) || !empty($sql_result['media_images']) || !empty($sql_result['memories']) || !empty($sql_result['respect_post']) || !empty($sql_result['timeline']) || !empty($sql_result['feature_post'])){
            $templatename = "update_post_subscriber";
            $subject = lang("update_post_subscriber");
            $tomail = $subscribe_val->email;
            // $username = $subscribe_val->name;
            // exit();
            
            $msgarr["userName"] = $subscribe_val->name;
            $msgarr["post_result"] = $sql_result;
            // echo '<pre>';print_r($msgarr); exit('weekly');
            $resp = $this->sendmailcommon(
                $tomail,
                $subject,
                $templatename,
                $msgarr
            );
        }
    }
    if($subscribe_val->subscription_type==1){
    	$sql_result = [];
        for($tb=0;$tb<count($table_name_arr);$tb++){
        	$ispubliclifeof = ($table_name_arr[$tb]=='life_of') ? ' and is_public=1' : '';
            $ispublicmedia = ($table_name_arr[$tb]=='media_images') ? ' and media_ispublic=1' : '';
            $ispublicjournal = ($table_name_arr[$tb]=='journal_post') ? ' and is_public=1' : '';
            $sql_result_table_name_arr = mysqli_query($conn,"SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$lastdayold_start' and '$lastdayold_end' OR updated_at BETWEEN '$lastdayold_start' and '$lastdayold_end') and `status` = 1 and trash=0".$ispubliclifeof.$ispublicmedia.$ispublicjournal);
            while($row_1 = mysqli_fetch_assoc($sql_result_table_name_arr)){
            	$sql_result[$table_name_arr[$tb]] = $row_1;
        	}
        }
        echo '<pre>';print_r($sql_result); exit();
        // if(!empty($sql_result['journal_post']) || !empty($sql_result['life_of']) || !empty($sql_result['media_images']) || !empty($sql_result['memories']) || !empty($sql_result['respect_post']) || !empty($sql_result['timeline']) || !empty($sql_result['feature_post'])){
        //     $templatename = "update_post_subscriber";
        //     $subject = lang("update_post_subscriber");
        //     $tomail = $subscribe_val->email;
        //     // $username = $subscribe_val->name;
        //     // exit();
            
        //     $msgarr["userName"] = $subscribe_val->name;
        //     $msgarr["subscriber_id"] = $subscribe_val->id;
        //     $userName = $subscribe_val->name;
        //     $msgarr["post_result"] = $sql_result;
            
        //     // echo '<pre>';print_r($sql_result); exit();
        //    // echo  $tomail;exit('daily');
        //     $resp = $this->sendmailcommon(
        //         $tomail,
        //         $subject,
        //         $templatename,
        //         $msgarr
        //     );
        //     // echo '<pre>';print_r($sql_result); exit();
        //     $this->load->view('emails/update_post_subscriber',['post_result'=>$sql_result,'userName'=>$subscribe_val->name,'subscriber_id'=>$subscribe_val->id]);
        // }
    }
}


echo '<pre>';print_r($result);

*/
?>