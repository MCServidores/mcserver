<? 
require('includes/gen_inc.php'); 
$action = (($_GET['action'] != '')? addslashes($_GET['action']) : addslashes($_POST['action']));
$usr = addslashes($_POST['usr']);
$pwd = addslashes($_POST['pwd']);
$time = time();
$ip = $_SERVER['REMOTE_ADDR']; 

if(($action == 'process') && ($usr != '') && ($pwd != '')){
$GUID = randomcode(32);
$pwdq = mysql_fetch_array(mysql_query("select password, banned, approve from ".DB_PLAYERS." where username = '".$usr."' "));
$orig = $pwdq['password'];
$banned = $pwdq['banned'];
$approve = $pwdq['approve'];
if($approve == 1){
$msg = LOGIN_MSG_APPROVAL;
}elseif($banned == 1){
$msg = LOGIN_MSG_BANNED;
}elseif(validate_password($pwd,$orig) == true){
session_start();
$_SESSION['playername'] = $usr; 
$_SESSION['SGUID'] = $GUID;
 $result = mysql_query("update ".DB_PLAYERS." set ipaddress = '".$ip."', lastlogin = '".$time."' , GUID = '".$GUID."' where username = '".$usr."' ");
header('Location: lobby.php');
}else{
$msg = LOGIN_MSG_INVALID;
}
}

?>
<html>
<head>
<title>Poker Dos Amigos - Montes Claros, MG</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/poker.css" type="text/css">
<script language="JavaScript" type="text/JavaScript" src="js/lobby.php"></script>
</head>

<body bgcolor="#000000" text="#CCCCCC" >
<table width="772" border="0" cellspacing="0" cellpadding="2" align="center" bgcolor="#1B1B1B">
  <tr> 
    <td valign="top" bgcolor="#333333"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="1">
        <tr> 
          <td>
            <? require('includes/scores.php'); ?>
          </td>
        </tr>
        <tr> 
          <td> 
            <table border="0" cellspacing="0" cellpadding="1" width="300" class="smllfontpink" align="center" height="150">
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('index.php')" class="hand"> 
                <td>
                  <? echo MENU_HOME; ?>
                </td>
              </tr>      <? if (($valid == false) && (MEMMOD == 0)){ ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('login.php')" class="hand"> 
                <td>
                  <? echo MENU_LOGIN; ?>
                </td>
              </tr>
<? } ?>
       <? if ($valid == false){ ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('create.php')" class="hand"> 
                <td>
                  <? echo MENU_CREATE; ?>
                </td>
              </tr>
<? } ?>
              <? if ($valid == true){ ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('lobby.php')" class="hand"> 
                <td>
                  <? echo MENU_LOBBY; ?>
                </td>
              </tr>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('rankings.php')" class="hand"> 
                <td>
                  <? echo MENU_RANKINGS; ?>
                </td>
              </tr>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('myplayer.php')" class="hand"> 
                <td>
                  <? echo MENU_MYPLAYER; ?>
                </td>
              </tr>
              <? } ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('rules.php')" class="hand"> 
                <td>
                  <? echo MENU_RULES; ?>
                </td>
              </tr>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('faq.php')" class="hand"> 
                <td>
                  <? echo MENU_FAQ; ?>
                </td>
              </tr>
              <? if ($ADMIN == true){ ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('admin.php')" class="hand"> 
                <td>
                  <? echo MENU_ADMIN; ?>
                </td>
              </tr>
              <? } ?>              <? if (($valid == true) && (MEMMOD != 1)){ ?>
              <tr onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('index.php?action=logout')" class="hand"> 
                <td>
                  <? echo MENU_LOGOUT; ?>
                </td>
                <? } ?>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td width="650" class="fieldsethead" valign="top" height="100%">
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr> 
          <td bgcolor="#333333"><b><font size="3"><i><? echo LOGIN; ?></i> </font></b></td>
        </tr>
      </table>
      <br>
      <? if($msg != ''){ ?>
      <table width="300" border="0" cellspacing="0" cellpadding="5" align="center">
        <tr> 
          <td colspan="2" align="center" class="smllfont" bgcolor="#660000"> <b> 
            <? echo $msg; ?>
            </b></td>
        </tr>
      </table>
      <? } ?>
      <table border="0" cellspacing="0" cellpadding="0" width="300" align="center">
        <tr> 
          <td><fieldset class="yellowborder"> <legend>&nbsp;
            <? echo BOX_LOGIN; ?>
            &nbsp;</legend> 
            <form action="login.php" method="post" name="login">
              <table width="300" border="0" cellspacing="0" cellpadding="5" align="center">
                <tr> 
                  <td width="200" align="right" class="fieldsetheadcontent"> 
                    <p>
                      <? echo LOGIN_USER; ?>
                      <input type="text" size="12" maxlength="10" name="usr" class="fieldsetheadinputs" />
                    </p>
                    <p>
                      <input type="hidden" name="action" value="process">
                      <? echo LOGIN_PWD; ?>
                      <input type="password" size="12" maxlength="10" name="pwd" class="fieldsetheadinputs" />
                    </p>
                  </td>
                  <td align="center" width="80" valign="bottom"> 
                    <input type="submit" name="Login" value="ENTRAR" class="betbuttons">
                    <br>
                    &nbsp; </td>
                </tr>
              </table>
            </form>
            </fieldset></td>
        </tr>
      </table>
      <table width="300" border="0" cellspacing="0" cellpadding="5" align="center">
        <tr> 
          <td colspan="2" align="right" class="fieldsetheadlink"><a href="create.php" target="_self" class="fieldsetheadlink"><i>
            <? echo LOGIN_NEW_PLAYER; ?>
            </i></a></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
