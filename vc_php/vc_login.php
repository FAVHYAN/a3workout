<?php
include("inc.php");
include("incsan.php");
include("int.login.php");
include("rtmp.inc.php");

//replace bad words or expression
$filterRegex=urlencode("(?i)(fuck|cunt)(?-i)");
$filterReplace=urlencode(" ** ");

//fill your layout code between <<<layoutEND and layoutEND;
$layoutCode=<<<layoutEND
id=0&label=Chat&x=0&y=551&width=446&height=246&resize=true&move=true; id=1&label=Video&x=702&y=365&width=184&height=186&resize=true&move=true; id=2&label=Video&x=702&y=0&width=183&height=185&resize=true&move=true; id=3&label=Video&x=702&y=182&width=184&height=186&resize=true&move=true; id=4&label=Files&x=447&y=698&width=226&height=100&resize=true&move=true; id=5&label=Rooms&x=675&y=549&width=224&height=249&resize=true&move=true; id=6&label=Users&x=446&y=551&width=230&height=150&resize=true&move=true; id=7&label=Webcam&x=2&y=2&width=666&height=547&resize=true&move=true
layoutEND;


if (!$room) $room="Lobby";

if (!$welcome) $welcome="Welcome to $room! <BR><font color=\"#3CA2DE\">&#187;</font> Click top left preview panel for more options including selecting different camera and microphone. <BR><font color=\"#3CA2DE\">&#187;</font> Click any participant from users list for more options including extra video panels. <BR><font color=\"#3CA2DE\">&#187;</font> Try pasting urls, youtube movie urls, picture urls, emails, twitter accounts as @videowhisper in your text chat. <BR><font color=\"#3CA2DE\">&#187;</font> Download daily chat logs from file list.";

?>firstParameter=fix&server=<?=$rtmp_server?>&serverAMF=<?=$rtmp_amf?>&serverRTMFP=<?=$rtmfp_server?>&p2pGroup=VideoWhisper&enableRTMP=1&enableP2P=0&supportRTMP=1&supportP2P=0&alwaysRTMP=0&alwaysP2P=0&username=<?=urlencode($username)?>&loggedin=<?=$loggedin?>&userType=<?=$userType?>&administrator=<?=$admin?>&room=<?=urlencode($room)?>&welcome=<?=urlencode($welcome)?>&room_limit=100&userPicture=<?=$userPicture?>&userLink=<?=$userLink?>&webserver=&msg=<?=urlencode($msg)?>&tutorial=1&room_delete=0&room_create=0&file_upload=1&file_delete=1&panelFiles=1&panelRooms=1&panelUsers=1&showTimer=1&showCredit=1&disconnectOnTimeout=0&camWidth=320&camHeight=240&camFPS=15&micRate=11&camBandwidth=32768&bufferLive=0.1&bufferFull=0.1&bufferLivePlayback=0.1&bufferFullPlayback=0.1&videoCodec=H264&codecProfile=main&codecLevel=3.1&soundCodec=Speex&soundQuality=9&silenceLevel=0&silenceTimeout=0&micGain=50&showCamSettings=1&advancedCamSettings=1&camMaxBandwidth=81920&configureSource=0&disableVideo=0&disableSound=0&disableBandwidthDetection=0&disableUploadDetection=0&limitByBandwidth=1&background_url=&autoViewCams=1&layoutCode=<?=urlencode($layoutCode)?>&fillWindow=0&filterRegex=<?=$filterRegex?>&filterReplace=<?=$filterReplace?>&writeText=1&floodProtection=3&regularWatch=1&newWatch=1&privateTextchat=1&ws_ads=<?=urlencode("ads.php")?>&adsTimeout=15000&adsInterval=0&statusInterval=10000&verboseLevel=2&avatarPicture=<?=$avatarPicture?>&avatarList=1&infoMenu=1&profileDetails=<?=urlencode($profileDetails)?>&generateSnapshots=1&pushToTalk=1&loadstatus=1