<? 
require('includes/gen_inc.php'); 
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
            <table border="0" cellspacing="0" cellpadding="1" width="98%" class="smllfontpink" align="center" height="55">
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
          <td bgcolor="#333333"><b><font size="3"><i><? echo FAQ; ?></i></font></b> 
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td class="smllfontwhite" colspan="2"><b><font color="#FFCC33">How do 
            I change my avatar?</font></b></td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2">In the main lobby screen click 
            the edit character link to change your avatar or upload a custom avatar. 
            Custom avatars must be in jpg image format and less than 250kb in 
            size.</td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2"><b><font color="#FFCC33">What 
            is the Move Timer?</font></b></td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2">The move timer ensures that smooth 
            table play continues by auto folding or dealing hands if a player 
            does not take their turn within the time limit set by the site administrator. 
            If a player repeatedly fails to take their turn they will be kicked 
            off the table and any money left in their pot will be added back on 
            to their total bankroll.</td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2"><b><font color="#FFCC33">Why did 
            I get kicked from a game?</font></b></td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2">Players are automatically kicked 
            if they repeadedly fail to take their turn and the game has to auto 
            move them or if they lose connection from the table for more than 
            the allowed time. The lengths of time are variable as they are set 
            by the site administrator.</td>
        </tr>
        <tr>
          <td class="smllfontwhite" colspan="2"><b><font color="#FFCC33">My player 
            is broke, what now?</font></b></td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2">If the site administrator has 
            enabled the option, you can renew your initial game credits by clicking 
            the renew button on your &quot;My Player&quot; page.</td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2"><b><font color="#FFCC33">How can 
            I get my own copy of PHP Poker?</font></b></td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2"> 
            <p>PHP Poker can be purchased in two ways. You can hire your own poker 
              table for a small annual fee or purchase the full package to install 
              on your own website. For information about PHP Poker, please visit 
              our website.<br>
              <a href="http://www.phppoker.net" target="_blank" class="smllfontwhite">http://www.phppoker.net</a></p>
          </td>
        </tr>
        <tr> 
          <td class="smllfontwhite" colspan="2">&nbsp;</td>
        </tr>
      </table>
      </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
