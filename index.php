<? 
require('includes/gen_inc.php'); 
require('includes/inc_index.php'); 
?>
<html>
<head>
<title><? echo TITLE; ?></title>
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
              </tr>
              <? if (($valid == false) && (MEMMOD == 0)){ ?>
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
              <? } ?>
              <? if (($valid == true) && (MEMMOD != 1)){ ?>
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
          <td bgcolor="#333333"><b><font size="3"><i>
            <? echo HOME; ?>
            </i> </font></b></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr> 
          <td class="fieldsetheadcontent">Welcome To Multiplayer Poker...</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
