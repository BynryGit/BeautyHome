<?php
$api_key = "cb97e4d7135f5efd92bff9469c908ec7-us10";  // How get your Mailchimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key
$list_id = 'a3510d6b98';  // How to get your Mailchimp LIST ID - http://kb.mailchimp.com/article/how-can-i-find-my-list-id
 
require('Mailchimp.php');

$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );
$subscriber = $Mailchimp_Lists->subscribe( $list_id, array( 'email' => htmlentities($_POST['email']) ) );
 
if ( ! empty( $subscriber['leid'] ) ) {
echo "success";
}
else
{
echo "fail";
}
 
?>
