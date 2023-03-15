<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
    th {
        font-size: 30px;
    }
    </style>
</head>

<body style="background: #f3f6f4;">
    <div style="width: 83%; margin: 0 auto; padding-top: 50px;">
        <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo1.png') ?>"
            style="width: 300px; display: block;margin-bottom:25px;">
        <p
            style="margin-top:80px;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom:15px; display: block;">
            <b>Hi <?php echo (isset($userName) && $userName!='') ? ucwords($userName) : '';?>,</b>
        </p>
        <p>Following changes and updates have been occurred on the profile(s) you had been subscribed to</p>
    </div>
    <table width="100%;" style="text-align: center; ">
        <?php 
        
            if(isset($post_result) && !empty($post_result)){
                foreach($post_result as $key => $post_val){
                    //print_r($post_val);
                    if($key!=''){ 
                            echo '<tr><th style="margin-top:80px;display: block;">'.$key.'<br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';
                    }
                    if(is_array($post_val) && !empty($post_val)){
                    echo '<tr>';

                    foreach($post_val as $val){
                        
                    // echo '<pre>';print_r($val); echo '</pre>';
                    if(isset($val['id']) && $val['id']!=''){ ?>
        <td style="display: inline-block; margin:20px;">
            <div
                style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">
            </div>
            <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;">
                <?php echo isset($val['name']) ? $val['name'] : ''; ?> </div>

            <div style="
                                    padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                                    margin: 1em 0.75em 0 0;
                                    font-size: 1em;
                                    font-style: italic;
                                    line-height: 1.5em;
                                    background-size: cover !important;
                                    position: relative;
                                    ">
                <img src="<?php echo (isset($val['image']) && $val['image']!='' && $val['image']!='undefined') ? base_url('assets/frontend/uploads/').$val['image'] : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>"
                    style="height:50vh; width:100%;"
                    onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                <div style="position: absolute;
                                    width: calc(100% - 60px);
                                    height: calc(100% - 64px);
                                    top: 55px;
                                    right: 0;
                                    background: #d4dcd5;
                                    z-index: -1;
                                    border: 15px solid #90a792;
                                    transform: rotate(6deg);
                                    box-shadow: 0px 5px 10px #90a792;"></div>
                <h3
                    style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">
                    <?php echo isset($val['title']) ? $val['title'] : ''; ?></h3>


                <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>"
                    style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View
                    Profile</a>
            </div>
        </td>
        <?php } 
            } ?>
        </tr>
        <?php 
                    }
                    
                    }
                }
            
            exit();
            ?>

    </table>

</body>

</html>