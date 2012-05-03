<?php
//print'<pre>';print_r($_GET);exit;

$archiveInfo = $tk->listArchive($id);

if ($archiveInfo['count'] <> 1 || (!(isset($_GET['id'])))) {
	//$_SESSION['notice'] = "Archive does not exist.";
	//header('Location: index.php');
}
	

// set default limit
if ($_GET['l'] == '') {$limit = 10;} else {$limit = $_GET['l'];}
if ($_GET['o'] == '') {$orderby = 'd';} else {$orderby = $_GET['o'];} 

// set time limit(s)
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
	for($i=0;$i<count($archiveInfo['results']);$i++)
		$archiveTweetsAll[] = $tk->getTweets($archiveInfo['results'][$i]['id'],null,null,$limit,$orderby,$_GET['nort'],$_GET['from_user'],$_GET['text'],$_GET['lang'],$_GET['max_id'],$_GET['since_id'],$_GET['offset'],$_GET['lat'],$_GET['long'],$_GET['rad'],$_GET['debug']);
}
//print'<pre>'; print_r($archiveTweets);exit;



?>

<div style='text-align:left; margin-left:auto; margin-right:auto; width:1024px; padding-top:15px; padding-bottom:15px'>

<?php        
		$tw_count = 0;
        //echo $limit;
		//echo count($archiveTweetsAll);
		//exit;
	foreach($archiveTweetsAll as $archiveTweets){
        foreach ($archiveTweets as $row) {
            $tw_count = $tw_count + 1;
			if($tw_count>$limit)break;
            echo "<div style='margin-bottom:5px'>";
            echo "<div style='float:left; margin-right:5px'><img src='".$row['profile_image_url']."' height='40px'/></div>";
            echo "<div style='float:left; width:950px'>";
            $text = preg_replace('@(http://([\w-.]+)+(:\d+)?(/([\w/_.]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $row['text']);
            $matches = array();
            preg_match('@(http://([\w-.]+)+(:\d+)?(/([\w/_.]*(\?\S+)?)?)?)@',$row['text'],$matches);
            $text = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $text);


            
            preg_replace('#','<a href="http://search.twitter.com/q=$1">.$1."</a>');
            echo "<b>@".$row['from_user']."</b> ".$text."<br><br>";
            echo "<font style='font-weight:lighter; font-size:8px'><i>".$row['created_at']." - tweet id <a name='tweetid-".$row['id']."'>".$row['id']."</a> - #$tw_count</i></font>";
            echo "<br>";  
            if ($row['geo_type'] <> '') {
                echo "<font style='font-weight:lighter; font-size:8px'><i>geo info: ".$row['geo_type']." - lat = ".$row['geo_coordinates_0']." - long = ".$row['geo_coordinates_1']."</i></font><br>";}
             
            
            echo "</div>";                                        
            echo "</div>";
            echo "<div style='clear:both; margin-bottom:10px; margin-top:10px; border-bottom:1px dotted #333333'><br></div>";
        }
	}//tweets all loop ends here
?>
</div>