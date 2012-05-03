<?php
/*
yourTwapperKeeper - Twitter Archiving Application - http://your.twapperkeeper.com
Copyright (c) 2010 John O'Brien III - http://www.linkedin.com/in/jobrieniii

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$response = array();

// Load important files
session_start();
require_once('config.php');
require_once('function.php');
require_once('twitteroauth.php');

$id = $_GET['id'];

$archiveInfo = $tk->listArchive($id);
if ($archiveInfo['count'] <> 1 || (!(isset($_GET['id'])))) {
	$response = array();
	//$response['response'] = 'bad archive id';
	//echo json_encode($response);
	//die;
}

$response['archive_info'] = $archiveInfo['results'][0];
    
// set default limit
if ($_GET['l'] == '') {$limit = 10;} else {$limit = $_GET['l'];}
if ($_GET['o'] == '') {$orderby = 'd';} else {$orderby = $_GET['o'];} 

// set times
if ($_GET['sm'] <> '' && $_GET['sd'] <> '' && $_GET['sy'] <> '') {
    $start_time = strtotime($_GET['sm']."/".$_GET['sd']."/".$_GET['sy']);}
if ($_GET['em'] <> '' && $_GET['ed'] <> '' && $_GET['ey'] <> '') {
    $end_time = strtotime($_GET['em']."/".$_GET['ed']."/".$_GET['ey']);}
    
// Get tweets
if ($start_time <> '' || $end_time <> '') {
	for($i=0;$i<count($archiveInfo['results']);$i++){
			$archiveTweetsAll[] = $tk->getTweets($archiveInfo['results'][$i]['id'],$start_time,$end_time,$limit,$orderby,$_GET['nort'],$_GET['from_user'],$_GET['text'],$_GET['lang'],$_GET['max_id'],$_GET['since_id'],$_GET['offset'],$_GET['lat'],$_GET['long'],$_GET['rad'],$_GET['debug']);
	}
} else {
	for($i=0;$i<count($archiveInfo['results']);$i++){
			$archiveTweetsAll[] = $tk->getTweets($archiveInfo['results'][$i]['id'],null,null,$limit,$orderby,$_GET['nort'],$_GET['from_user'],$_GET['text'],$_GET['lang'],$_GET['max_id'],$_GET['since_id'],$_GET['offset'],$_GET['lat'],$_GET['long'],$_GET['rad'],$_GET['debug']);
	}
}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$tw_count=0;
foreach($archiveTweetsAll as $archiveTweets){

foreach ($archiveTweets as $tweet_count=>$tweet) {
	$tw_count++;
	if($tw_count>$limit)break;
	foreach ($tweet as $key=>$value) {
		$response['tweets'][$tweet_count][$key] = $value;
		}
		}
}
//print'<pre>';print_r($response);exit;
echo json_encode($response);

?>
