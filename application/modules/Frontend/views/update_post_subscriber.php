<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <style>
         .white-color p{
            margin-top:0;color:#fff;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;
         }
         #subscription_list {
           font-family: Arial, Helvetica, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }

         #subscription_list td, #subscription_list th {
           border: 1px solid #ddd;
           padding: 8px;
         }

         #subscription_list tr:nth-child(even){background-color: #f2f2f2;}

         #subscription_list tr:hover {background-color: #ddd;}

         #subscription_list th {
           padding-top: 12px;
           padding-bottom: 12px;
           text-align: left;
           background-color: #04AA6D;
           color: white;
         }
         </style><style>
         #subscription_list {
           font-family: Arial, Helvetica, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }

         #subscription_list td, #subscription_list th {
           border: 1px solid #ddd;
           padding: 8px;
         }

         #subscription_list tr:nth-child(even){background-color: #f2f2f2;}

         #subscription_list tr:hover {background-color: #ddd;}

         #subscription_list th {
           padding-top: 12px;
           padding-bottom: 12px;
           text-align: left;
           background-color: #04AA6D;
           color: white;
         }
         </style>
   </head>
   <body>
      <div style="width:600px; display: inline-block;">
         <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo1.png') ?>" style="width: 100%; display: block;">
         <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Hi <?php echo ucwords($userName);?>,</p>
         <table class="table" style="border:1px solid #000;" width="100%" id="subscription_list">
            <thead>
                <tr style="border:1px solid">
                    <th>Post Type</th>
                    <th>Title</th>
                    <th>Profile Name</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($post_result) && !empty($post_result)){
                    foreach($post_result as $key => $post_val){
                        // echo $key;
                        
                        
                        foreach($post_val as $val){
                            if(isset($val->title) && $val->title!=''){
                            echo '<tr>';
                            echo '<td>'.$key.'</td>';
                            echo '<td>'.((isset($val->title) && $val->title!='') ? $val->title : '').'</td>';
                            echo '<td>'.((isset($val->profile_id) && $val->profile_id!='') ? get_userprofile($val->profile_id)->first_name.' '.get_userprofile($val->profile_id)->last_name : '').'</td>';

                            echo '<td>'.((isset($val->profile_id) && $val->profile_id!='') ? '<a href="'.site_url('?profile=').get_userprofile($val->profile_id)->profile_url.'">View</a>' : '').'</td>';
                            echo '</tr>';
                            }
                        }
                        // print_r($post_val);
                    }
                        
                    }
                    ?>
            </tbody>
        </table>
      </div>
   </body>
</html>