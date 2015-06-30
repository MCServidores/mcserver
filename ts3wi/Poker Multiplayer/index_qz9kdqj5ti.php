<? 
require('includes/gen_inc.php'); 
require('includes/inc_index.php'); 
?><!--MMDW 1 -->
<html>
<head>
<title><!--MMDW 2 --><? echo TITLE; ?><!--MMDW 3 --></title>
<meta mmdw="0"  http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link mmdw="1"  rel="stylesheet" href="css/poker.css" type="text/css">
<!--MMDW 4 --><script language="JavaScript" type="text/JavaScript" src="js/lobby.php"></script><!--MMDW 5 -->
</head>

<body mmdw="2"  bgcolor="#000000" text="#CCCCCC" >
<table mmdw="3"  width="772" border="0" cellspacing="0" cellpadding="2" align="center" bgcolor="#1B1B1B">
  <tr> 
    <td mmdw="4"  valign="top" bgcolor="#333333"> 
      <table mmdw="5"  width="100%" border="0" cellspacing="0" cellpadding="1">
        <tr> 
          <td> 
            <!--MMDW 6 --><? require('includes/scores.php'); ?><!--MMDW 7 -->
          </td>
        </tr>
        <tr> 
          <td> 
            <table mmdw="6"  border="0" cellspacing="0" cellpadding="1" width="300" class="smllfontpink" align="center" height="150">
              <tr mmdw="7"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('index.php')" class="hand"> 
                <td> 
                  <!--MMDW 8 --><? echo MENU_HOME; ?><!--MMDW 9 -->
                </td>
              </tr>
              <!--MMDW 10 --><? if (($valid == false) && (MEMMOD == 0)){ ?><!--MMDW 11 -->
              <tr mmdw="8"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('login.php')" class="hand"> 
                <td> 
                  <!--MMDW 12 --><? echo MENU_LOGIN; ?><!--MMDW 13 -->
                </td>
              </tr>
              <!--MMDW 14 --><? } ?><!--MMDW 15 -->
              <!--MMDW 16 --><? if ($valid == false){ ?><!--MMDW 17 -->
              <tr mmdw="9"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('create.php')" class="hand"> 
                <td> 
                  <!--MMDW 18 --><? echo MENU_CREATE; ?><!--MMDW 19 -->
                </td>
              </tr>
              <!--MMDW 20 --><? } ?><!--MMDW 21 -->
              <!--MMDW 22 --><? if ($valid == true){ ?><!--MMDW 23 -->
              <tr mmdw="10"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('lobby.php')" class="hand"> 
                <td> 
                  <!--MMDW 24 --><? echo MENU_LOBBY; ?><!--MMDW 25 -->
                </td>
              </tr>
              <tr mmdw="11"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('rankings.php')" class="hand"> 
                <td> 
                  <!--MMDW 26 --><? echo MENU_RANKINGS; ?><!--MMDW 27 -->
                </td>
              </tr>
              <tr mmdw="12"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('myplayer.php')" class="hand"> 
                <td> 
                  <!--MMDW 28 --><? echo MENU_MYPLAYER; ?><!--MMDW 29 -->
                </td>
              </tr>
              <!--MMDW 30 --><? } ?><!--MMDW 31 -->
              <tr mmdw="13"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('rules.php')" class="hand"> 
                <td> 
                  <!--MMDW 32 --><? echo MENU_RULES; ?><!--MMDW 33 -->
                </td>
              </tr>
              <tr mmdw="14"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('faq.php')" class="hand"> 
                <td> 
                  <!--MMDW 34 --><? echo MENU_FAQ; ?><!--MMDW 35 -->
                </td>
              </tr>
              <!--MMDW 36 --><? if ($ADMIN == true){ ?><!--MMDW 37 -->
              <tr mmdw="15"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('admin.php')" class="hand"> 
                <td> 
                  <!--MMDW 38 --><? echo MENU_ADMIN; ?><!--MMDW 39 -->
                </td>
              </tr>
              <!--MMDW 40 --><? } ?><!--MMDW 41 -->
              <!--MMDW 42 --><? if (($valid == true) && (MEMMOD != 1)){ ?><!--MMDW 43 -->
              <tr mmdw="16"  onMouseOver="this.bgColor = '#330000'; this.style.color = 'FFFFFF'" onMouseOut="this.bgColor = ''; this.style.color = 'CC9999'" onClick="changeview('index.php?action=logout')" class="hand"> 
                <td>
                  <!--MMDW 44 --><? echo MENU_LOGOUT; ?><!--MMDW 45 -->
                </td>
                <!--MMDW 46 --><? } ?><!--MMDW 47 -->
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td mmdw="17"  width="650" class="fieldsethead" valign="top" height="100%">
      <table mmdw="18"  width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td mmdw="19"  bgcolor="#333333"><b><font mmdw="20"  size="3"><i>
            <!--MMDW 48 --><? echo HOME; ?><!--MMDW 49 -->
            </i> </font></b></td>
        </tr>
      </table>
      <table mmdw="21"  width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr> 
          <td mmdw="22"  class="fieldsetheadcontent">Welcome To Multiplayer Poker...</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
<!-- MMDW:success -->