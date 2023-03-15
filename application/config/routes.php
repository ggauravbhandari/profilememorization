<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Frontend';
$route['user-login'] = 'Frontend/userlogin';
$route['user-emailerification'] = 'Frontend/emailaddress_verification';
$route['user-register'] = 'Frontend/user_register';
$route['emailverification/(:any)'] = 'Frontend/emailverification/$1';
$route['resetpassword/(:any)/(:any)'] = 'Frontend/resetpassword/$1/$2';
$route['resetpassword_post'] = 'Frontend/resetpassword_post';

$route['forgotpassword'] = 'Frontend/forgotpassword';
$route['checkregisteruser_email'] = 'Frontend/checkregisteruser_email';
$route['checkregisterwardenuser_email'] = 'Frontend/checkregisterwardenuser_email';

$route['delete_subscription/(:any)'] = 'Frontend/subscription_delete/$1';
$route['checkemailid_sub'] = 'Frontend/checkemailid_sub';
$route['subscribe_user_postdata'] = 'Frontend/subscribe_user_postdata';

$route['warden_notification'] = 'Frontend/warden_notification';

$route['profile_update_description'] = 'Frontend/Postcontroller/profile_update_description';
$route['setmediapublicprivate'] = 'Frontend/Postcontroller/setmediapublicprivate';
$route['setmediaalbumpublicprivate'] = 'Frontend/Postcontroller/setmediaalbumpublicprivate';
$route['setjournalpublicprivate'] = 'Frontend/Postcontroller/setjournalpublicprivate';
$route['mediapost_albumdelete'] = 'Frontend/Postcontroller/mediapost_albumdelete';
$route['setmemorypublicprivate'] = 'Frontend/Postcontroller/setmemorypublicprivate';
$route['settimelinepublicprivate'] = 'Frontend/Postcontroller/settimelinepublicprivate';
$route['setrespectpublicprivate'] = 'Frontend/Postcontroller/setrespectpublicprivate';




$route['profile_familygroup/(:any)'] = 'Frontend/profile_familygroup/$1';

$route['wp-register-user'] = 'Frontend/woouser';


// Usercontroller
$route['user-logout'] = 'Frontend/Usercontroller/logout';
$route['checkuser_email'] = 'Frontend/checkuser_email';
$route['myaccount'] = 'Frontend/Usercontroller/myaccount';
$route['welcomepage'] = 'Frontend/Usercontroller/welcomepage';
$route['expired-link'] = 'Frontend/wordpress_link_expired';
$route['change-password']='Frontend/Usercontroller/change_password';

$route['edit-profile/(:any)'] = 'Frontend/Usercontroller/edit_profile/$1';
$route['profileget/(:any)'] = 'Frontend/Usercontroller/profileget/$1';
$route['profileupdate'] = 'Frontend/Usercontroller/profileupdate';
$route['familygroup'] = 'Frontend/Usercontroller/familygroup';
$route['familymember/(:any)'] = 'Frontend/Usercontroller/familymember/$1';
$route['deleteprofile/(:any)/(:any)'] = 'Frontend/Usercontroller/deleteprofile/$1/$2';
$route['profile_urlcheck/(:any)/(:any)'] = 'Frontend/Usercontroller/profile_urlcheck/$1/$2';

$route['linkprofile_qrcode'] = 'Frontend/linkprofile_qrcode';
$route['linkprofilepost'] = 'Frontend/Usercontroller/linkprofilepost';
$route['qr_keepsake'] = 'Frontend/Usercontroller/profilelink_list';

$route['testqrcodemail'] = 'Frontend/Usercontroller/testqrcodemail';

// $route['qr'] = 'Frontend/Usercontroller/qr';
$route['update_qrcode']= 'Frontend/Usercontroller/update_qrcode';


// Postcontroller
$route['feature-post'] = 'Frontend/Postcontroller/featurepost';
$route['delete-featuredpost'] = 'Frontend/Postcontroller/delete_featuredpost';
$route['edit-featuredpost/(:any)'] = 'Frontend/Postcontroller/edit_featuredpost/$1';
$route['updateprofileprivate/(:any)'] = 'Frontend/Postcontroller/updateprofileprivate/$1';


$route['shareqrcode'] = 'Frontend/Postcontroller/shareqrcode';


$route['lifeof-post'] = 'Frontend/Postcontroller/lifeofpost';
$route['edit-lifeof/(:any)'] = 'Frontend/Postcontroller/editlifeofpost/$1';

$route['edittimelinepost/(:any)'] = 'Frontend/Postcontroller/edittimelinepost/$1';
$route['memoriespost'] = 'Frontend/Postcontroller/memoriespost';
$route['editmemorypost/(:any)'] = 'Frontend/Postcontroller/editmemorypost/$1';
$route['memoriespost_delete/(:any)'] = 'Frontend/Postcontroller/memoriespost_delete/$1';
$route['memoriespost_edit/(:any)'] = 'Frontend/Postcontroller/memoriespost_edit/$1';

$route['profile-timeline'] = 'Frontend/Postcontroller/profile_timelinepost';
$route['respect_post'] = 'Frontend/Postcontroller/respect_post';
$route['journal_post'] = 'Frontend/Postcontroller/journal_post';
/* edit post route */
$route['journal_post_edit'] = 'Frontend/Postcontroller/journal_post_edit';
$route['timeline_post_edit'] = 'Frontend/Postcontroller/timeline_post_edit';
$route['memory_post_edit'] = 'Frontend/Postcontroller/memory_post_edit';
$route['respect_post_edit'] = 'Frontend/Postcontroller/respect_post_edit';
$route['mediaimage_post_edit'] = 'Frontend/Postcontroller/mediaimage_post_edit';
$route['mediaalbum_post_edit'] = 'Frontend/Postcontroller/mediaalbum_post_edit';


/* edit post route edit */
$route['timelinepost_delete/(:any)'] = 'Frontend/Postcontroller/timelinepost_delete/$1';
$route['respectpost_delete/(:any)'] = 'Frontend/Postcontroller/respectpost_delete/$1';
$route['journalpost_delete/(:any)'] = 'Frontend/Postcontroller/journalpost_delete/$1';

$route['journalpost_view/(:any)'] = 'Frontend/Postcontroller/journalpost_view/$1';
$route['journalpost_view_limit/(:any)/(:any)'] = 'Frontend/Postcontroller/journalpost_view_limit/$1/$2';

$route['otherpost_view_limit/(:any)/(:any)/(:any)'] = 'Frontend/Postcontroller/otherpost_view_limit/$1/$2/$3';
$route['other_commentpost'] = 'Frontend/Postcontroller/other_commentpost';


$route['setfeaturepost'] = 'Frontend/Postcontroller/setfeaturepost';

$route['featurepostdata'] = 'Frontend/Postcontroller/featurepostdata';

$route['create-album'] = 'Frontend/Postcontroller/create_album';
$route['groupwarden-mapping'] = 'Frontend/Postcontroller/groupwarden_mapping';


$route['media_image'] = 'Frontend/Postcontroller/media_image';
$route['singleimage_popup'] = 'Frontend/Postcontroller/singleimage_popup';

$route['mediasinglepost/(:any)'] = 'Frontend/Postcontroller/mediasinglepost/$1';
$route['mediapost_delete/(:any)'] = 'Frontend/Postcontroller/mediapost_delete/$1';
$route['set_coverphotopost'] = 'Frontend/Postcontroller/set_coverphotopost';

$route['mediapost_imagedelete'] = 'Frontend/Postcontroller/mediapost_imagedelete';
$route['postlike'] = 'Frontend/Postcontroller/postlike';


$route['respect_commentpost'] = 'Frontend/Postcontroller/respect_commentpost';
$route['journal_commentpost'] = 'Frontend/Postcontroller/journal_commentpost';
$route['media_commentpost'] = 'Frontend/Postcontroller/media_commentpost';
$route['mediapost_view_limit'] = 'Frontend/Postcontroller/mediapost_view_limit';

$route['mediapost_view_limit/(:any)/(:any)'] = 'Frontend/Postcontroller/mediapost_view_limit/$1/$2';

$route['user_subscription'] = 'Frontend/Postcontroller/user_subscription';
$route['delete-commentpost/(:any)'] = 'Frontend/Postcontroller/delete_commentpost/$1';



/************** admin url *******************/
$route['admin'] = 'Backend/Dashboard';
$route['admin/login'] = 'Backend/Login';
$route['admin/forgotpassword'] = 'Backend/Login/forgotpassword';
$route['admin/loginpost'] = 'Backend/Login/loginuser';
$route['admin/add-user'] = 'Backend/Dashboard/register_user';
$route['admin/edit-user/(:any)'] = 'Backend/Dashboard/edit_user/$1';
$route['admin/delete-user/(:any)'] = 'Backend/Dashboard/delete_user/$1';

$route['admin/user-grouplist/(:any)'] = 'Backend/Dashboard/user_grouplist/$1';

$route['admin/subscriber-list'] = 'Backend/SubscriberController/index';


$route['admin/update-user'] = 'Backend/Dashboard/update_user';
$route['admin/user-list'] = 'Backend/Dashboard/user_list';
$route['admin/warden-list'] = 'Backend/Dashboard/warden_list';
$route['admin/change-password'] = 'Backend/Dashboard/settings';
$route['admin/settings'] = 'Backend/Dashboard/settings';
$route['settings']='Frontend/Usercontroller/change_password';
$route['admin/logout'] = 'Backend/Dashboard/logout';
$route['admin/send_mail'] = 'Backend/Dashboard/send_mail';
$route['admin/feature-post'] = 'Backend/Dashboard/feature_postlist';


$route['admin/album-list'] = 'Backend/Dashboard/mediaalbum_postlist';
$route['admin/media_images/(:any)'] = 'Backend/Dashboard/media_images/$1';


$route['admin/feature_poststatusupdate/(:any)/(:any)'] = 'Backend/Dashboard/feature_poststatusupdate/$1/$2';

$route['admin/lifeof-post'] = 'Backend/Dashboard/lifeof_postlist';
$route['admin/lifeof-poststatus/(:any)/(:any)'] = 'Backend/Dashboard/lifeof_poststatusupdate/$1/$2';

$route['admin/memories-post'] = 'Backend/Dashboard/memories_postlist';
$route['admin/memories-poststatus/(:any)/(:any)'] = 'Backend/Dashboard/memories_poststatusupdate/$1/$2';

$route['admin/template'] = 'Backend/Dashboard/emailtemplate';
$route['admin/edit-emailtemplate/(:any)'] = 'Backend/Dashboard/emialtemplate_edit/$1';

$route['admin/respects-post'] = 'Backend/Dashboard/respect_postlist';
$route['admin/journal-post'] = 'Backend/Dashboard/journal_postlist';

$route['admin/timeline-post'] = 'Backend/Dashboard/timeline_postlist';


$route['admin/userstatus-update/(:any)/(:any)'] = 'Backend/Dashboard/userstatusupdate/$1/$2';
$route['admin/send_mail'] = 'Backend/Login/send_mail';

$route['admin/profile-list/(:any)'] = 'Backend/Dashboard/profile_list/$1';
$route['admin/profile-view/(:any)'] = 'Backend/Dashboard/profile_view/$1';
$route['admin/profile-delete/(:any)'] = 'Backend/Dashboard/profile_delete/$1';

$route['admin/updateactivestatus/(:any)/(:any)/(:any)'] = 'Backend/Dashboard/updateactivestatus/$1/$2/$3';

$route['404_override'] = '';
$route['404'] = "";
// $route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/comment-list'] = 'Backend/Dashboard/comment_postlist';

$route['admin/comment_poststatusupdate/(:any)/(:any)'] = 'Backend/Dashboard/comment_poststatusupdate/$1/$2';

$route['admin/postlike'] = 'Backend/Dashboard/postlike';

$route['update_group'] = 'Frontend/update_group';

/******** user section**********/
$route['dashboard'] ='Frontend/Usercontroller/user_dashboard';
$route['total-pending-items'] ='Frontend/Usercontroller/total_pending_items';

$route['comment-list'] = 'Frontend/Usercontroller/comment_postlist';

$route['life-of-list'] = 'Frontend/Usercontroller/lifeof_list';

$route['memory-list'] = 'Frontend/Usercontroller/memory_list';

$route['timeline-list'] = 'Frontend/Usercontroller/timeline_list';
$route['edit-timeline/(:any)'] = 'Frontend/Usercontroller/edit_timeline/$1';

$route['respect-list'] = 'Frontend/Usercontroller/respect_list';

$route['album-list'] = 'Frontend/Usercontroller/album_list';
$route['edit-album/(:any)'] = 'Frontend/Usercontroller/edit_album/$1';

$route['edit-albumimage/(:any)'] = 'Frontend/Usercontroller/edit_albumimage/$1';

$route['journal-list'] = 'Frontend/Usercontroller/journal_list';
$route['edit-journal/(:any)'] = 'Frontend/Usercontroller/edit_journal/$1';

$route['album-image-list'] = 'Frontend/Usercontroller/album_image_list';

$route['album-image-list/(:any)'] = 'Frontend/Usercontroller/album_image_list/$1';


$route['delete_comment/(:any)'] = 'Frontend/Usercontroller/comment_delete/$1';




$route['delete_memory/(:any)'] = 'Frontend/Usercontroller/memory_delete/$1';

$route['delete_timeline/(:any)'] = 'Frontend/Usercontroller/timeline_delete/$1';

$route['delete_respect/(:any)'] = 'Frontend/Usercontroller/respect_delete/$1';

$route['delete_album/(:any)'] = 'Frontend/Usercontroller/album_delete/$1';

$route['delete_album_image/(:any)'] = 'Frontend/Usercontroller/album_image_delete/$1';


$route['delete_journal/(:any)'] = 'Frontend/Usercontroller/journal_delete/$1';


$route['add-warden'] = 'Frontend/Usercontroller/register_warden';



$route['warden-list'] = 'Frontend/Usercontroller/warden_list';


$route['like-list'] = 'Frontend/Usercontroller/like_list';
$route['like-onprofile'] = 'Frontend/Usercontroller/like_onprofile';


$route['featured-list'] = 'Frontend/Usercontroller/featured_list';
$route['featured_delete/(:any)/(:any)'] = 'Frontend/Usercontroller/featured_delete/$1/$2';

$route['delete_warden/(:any)'] = 'Frontend/Usercontroller/delete_warden/$1';
$route['warder_permission/(:any)'] = 'Frontend/Usercontroller/warder_permission/$1';
$route['warden_permission_post'] = 'Frontend/Usercontroller/warden_permission_post';
$route['edit_warden/(:any)'] = 'Frontend/Usercontroller/edit_warden/$1';


$route['family-group-list'] = 'Frontend/Usercontroller/familygroup_list';
$route['family-member-list/(:any)'] = 'Frontend/Usercontroller/familymember_list/$1';
$route['checkgroup_wardenlimit'] = 'Frontend/Usercontroller/checkgroup_wardenlimit';

$route['active-pending-postlist'] = 'Frontend/Usercontroller/active_pending_postlist';



$route['updateactivestatus/(:any)/(:any)/(:any)'] = 'Frontend/Usercontroller/updateactivestatus/$1/$2/$3';
$route['updatefeatureactivestatus/(:any)/(:any)/(:any)'] = 'Frontend/Usercontroller/updatefeatureactivestatus/$1/$2/$3';

/*====== Search User Profile ======*/

$route['search-result'] = 'Frontend/Frontend/search_result';

/*======= End =============== */

$route['subscription-list'] = 'Frontend/Usercontroller/subscription_list';