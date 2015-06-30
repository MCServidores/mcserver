<? require('configure.php');
$host = DB_SERVER;
$ln = DB_SERVER_USERNAME;
$pw = DB_SERVER_PASSWORD;
$db = DB_DATABASE;
mysql_connect("$host", "$ln", "$pw") or die("Unable to connect to database");
mysql_select_db("$db") or die("Unable to select database");
require('tables.php');
require('settings.php');
session_start();
$plyrname = addslashes($_SESSION['playername']);
$SGUID = addslashes($_SESSION['SGUID']);
$valid = false;
$ADMIN = false;
$gID = '';
if (($plyrname != '') && ($SGUID != '')) {
    $idq = mysql_query("select GUID, banned, gID, vID from " . DB_PLAYERS . " where username = '" . $plyrname . "' and GUID = '" . $SGUID . "' ");
    $idr = mysql_fetch_array($idq);
    $gID = $idr['gID'];
    $gameID = $idr['vID'];
    if ((mysql_num_rows($idq) == 1) && ($idr['banned'] != 1)) $valid = true;
    $siteadmin = ADMIN_USERS;
    if ($plyrname != '') {
        $time = time();
        $admins = array();
        $adminraw = explode(',', $siteadmin);
        $i = 0;
        while ($adminraw[$i] != '') {
            $admins[$i] = $adminraw[$i];
            $i++;
        } 
        if (in_array($plyrname, $admins)) $ADMIN = true;
    } 
} 
require('poker_inc.php');
require('language.php');
if (($_SESSION[SESSNAME] != '') && (MEMMOD == 1) && ($plyrname == '')) {
    $time = time();
    $sessname = addslashes($_SESSION[SESSNAME]);
    $usrq = mysql_query("select username from " . DB_PLAYERS . " where sessname = '" . $sessname . "' ");
    if (mysql_num_rows($usrq) == 1) {
        $usrr = mysql_fetch_array($usrq);
        $usr = $usrr['username'];
        $GUID = randomcode(32);
        $_SESSION['playername'] = $usr;
        $_SESSION['SGUID'] = $GUID;
        $ip = $_SERVER['REMOTE_ADDR'];
        $result = mysql_query("update " . DB_PLAYERS . " set ipaddress = '" . $ip . "', lastlogin = '" . $time . "' , GUID = '" . $GUID . "' where username = '" . $usr . "' ");
        $valid = true;
    } 
} 
$time = time();
$tq = mysql_query("select waitimer from " . DB_PLAYERS . " where username = '" . $plyrname . "' ");
$tr = mysql_fetch_array($tq);
$waitimer = $tr['waitimer'];
if ($waitimer > $time) header('Location sitout.php');
?>