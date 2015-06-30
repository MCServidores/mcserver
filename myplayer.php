<? 
require('includes/gen_inc.php'); 
require('includes/inc_myplayer.php'); ?>
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
          <td bgcolor="#333333"><b><font size="3"><i><? echo MY_PLAYER; ?></i> </font></b></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr> 
          <td class="fieldsetheadcontent">
            <? if($bad_msgs != ''){ ?>
            <table width="492" border="0" cellspacing="0" cellpadding="4" bgcolor="#330000" align="center">
              <tr> 
                <td align="center" class="smllfont" width="492"> <b> 
                  <? echo $bad_msgs; ?>
                  </b></td>
              </tr>
            </table>
            <br>
            <? } ?>
            <? if($message != ''){ ?>
            <table width="492" border="0" cellspacing="0" cellpadding="4" bgcolor="#330000" align="center">
              <tr> 
                <td align="center" class="smllfont" width="492"> <b> 
                  <? echo $message; ?>
                  </b></td>
              </tr>
            </table>
            <br>
            <? } ?>
            <table width="100%" cellspacing="0" cellpadding="2">
              <tr> 
                <td> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="3" class="smllfontwhite" bgcolor="#333333">
                    <tr> 
                      <td width="19%" nowrap class="fieldsetheadcontent"><b><font color="#FFCC33"> 
                        <? echo PLAYER_PROFILE; ?>
                        </font></b></td>
                      <td width="18%" nowrap>&nbsp;</td>
                      <td width="22%" nowrap>&nbsp;</td>
                      <td width="19%" nowrap>&nbsp;</td>
                      <td width="22%" nowrap>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td rowspan="5" align="center" width="19%"> 
                        <?echo display_ava_profile($plyrname); ?>
                      </td>
                      <td width="18%" align="right" nowrap>&nbsp;</td>
                      <td width="22%" align="left" nowrap>&nbsp;</td>
                      <td width="19%" align="right" nowrap>&nbsp;</td>
                      <td width="22%" align="left" nowrap>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td width="18%" align="right" nowrap>
                        <? echo STATS_PLAYER_NAME; ?>
                      </td>
                      <td width="22%" align="left" nowrap> <b> 
                        <? echo $plyrname; ?>
                        </b></td>
                      <td width="19%" align="right" nowrap>
                        <? echo STATS_PLAYER_RANKING; ?>
                      </td>
                      <td width="22%" align="left" nowrap><b> 
                        <? echo $rank; ?>
                        </b></td>
                    </tr>
                    <tr> 
                      <td width="18%" align="right" nowrap>
                        <? echo STATS_PLAYER_CREATED; ?>
                      </td>
                      <td width="22%" align="left" nowrap><b> 
                        <? echo $created; ?>
                        </b></td>
                      <td width="19%" align="right" nowrap>
                        <? echo STATS_PLAYER_BANKROLL; ?>
                      </td>
                      <td width="22%" align="left" nowrap><b> 
                        <? echo money($winnings); ?>
                        </b></td>
                    </tr>
                    <tr> 
                      <td width="18%" align="right" nowrap>
                        <? echo STATS_PLAYER_LOGIN; ?>
                      </td>
                      <td width="22%" align="left" nowrap><b> 
                        <? echo $lastlogin; ?>
                        </b></td>
                      <td width="19%" align="right" nowrap>
                        <? echo STATS_PLAYER_GAMES_PLAYED; ?>
                      </td>
                      <td width="22%" align="left" nowrap><b> 
                        <? echo $gamesplayed; ?>
                        </b></td>
                    </tr>
                    <tr> 
                      <td width="18%" align="right" nowrap>&nbsp;</td>
                      <td width="22%" align="left" nowrap>&nbsp;</td>
                      <td width="19%" align="right" nowrap>&nbsp;</td>
                      <td width="22%" align="left" nowrap>&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <? if((RENEW == 1) && ($winnings == 0) && (($gID == '') || ($gID == 0)) && ($action != 'credit')){ ?>
            <table width="100%" cellspacing="0" cellpadding="2">
              <tr> 
                <td> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="3" class="smllfontwhite" bgcolor="#333333">
                    <tr> 
                      <td nowrap class="fieldsetheadcontent"><b><font color="#FFCC33"><? echo PLAYER_IS_BROKE; ?></font></b></td>
                    </tr>
                    <tr> 
                      <td align="center"> 
                        <form name="form2" method="post" action="">
                          <input type="hidden" name="action" value="renew">
                          <input type="submit" name="Submit" value="<? echo BUTTON_STATS_PLAYER_CREDIT; ?>" class="betbuttons">
                        </form>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <? } ?>
            <table width="100%" cellspacing="0" cellpadding="2" align="center">
              <tr> 
                <td> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="3" class="smllfontwhite" bgcolor="#333333">
                    <tr> 
                      <td nowrap class="fieldsetheadcontent" colspan="2"><b><font color="#FFCC33"><? echo PLAYER_STATS; ?></font></b></td>
                      <td nowrap colspan="2" width="49%">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td colspan="2" nowrap>&nbsp;</td>
                      <td colspan="2" nowrap width="49%">&nbsp;</td>
                    </tr>
                    <tr valign="top"> 
                      <td colspan="2" nowrap><b><fieldset><legend>&nbsp;<span class="fieldsethead"><? echo STATS_GAME; ?> &nbsp;</span>&nbsp;</legend> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr> 
                            <td align="center"> 
                              <div id="preview" width="44" height="50"> 
                                <table border="0" cellspacing="0" cellpadding="3" class="smllfontwhite">
                                  <tr> 
                                    <td> 
                                      <font color="#999999"><? echo STATS_PLAYER_GAMES_PLAYED; ?>
                                      </font> </td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $gamesplayed; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_TOURNAMENTS_PLAYED; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $tournamentsplayed; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_TOURNAMENTS_WON; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $tournamentswon; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_TOURNAMENTS_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $tperc; ?>
                                      </font></b></td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        </fieldset></b></td>
                      <td colspan="2" nowrap width="49%"><b><fieldset><legend>&nbsp;<span class="fieldsethead"><? echo STATS_HAND; ?> &nbsp;</span>&nbsp;</legend> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr> 
                            <td align="center"> 
                              <div id="preview" width="44" height="50"> 
                                <table border="0" cellspacing="0" cellpadding="3" class="smllfontwhite">
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_HANDS_PLAYED; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $handsplayed; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_HANDS_WON; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $handswon; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_HAND_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> 
                                      <? echo $handsperc; ?>
                                      </font></b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">&nbsp; </font></td>
                                    <td><b></b></td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        </fieldset></b></td>
                    </tr>
                    <tr valign="top"> 
                      <td colspan="2" nowrap>&nbsp;</td>
                      <td colspan="2" nowrap width="49%">&nbsp;</td>
                    </tr>
                    <tr valign="top"> 
                      <td colspan="2" nowrap><b><fieldset><legend>&nbsp;<span class="fieldsethead"><? echo STATS_MOVE; ?>&nbsp;</span>&nbsp;</legend> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr> 
                            <td align="center"> 
                              <div id="preview" width="44" height="50"> 
                                <table border="0" cellspacing="0" cellpadding="3" class="smllfontwhite">
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_FOLD_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> </font> 
                                      <? echo $foldperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_CHECK_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> </font> 
                                      <? echo $checkperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_CALL_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> </font> 
                                      <? echo $callperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_RAISE_RATIO; ?>
                                      </font></td>
                                    <td><b> 
                                      <? echo $raiseperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td><font color="#999999">
                                      <? echo STATS_PLAYER_ALLIN_RATIO; ?>
                                      </font></td>
                                    <td><b> <font color="#FFFFFF"> </font> 
                                      <? echo $allinperc; ?>
                                      </b></td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        </fieldset></b></td>
                      <td colspan="2" nowrap width="49%"><b><fieldset><legend>&nbsp;<span class="fieldsethead"><? echo STATS_FOLD; ?> &nbsp;</span>&nbsp;</legend> 
                        <table border="0" cellspacing="0" cellpadding="5" width="100%">
                          <tr> 
                            <td align="center"> 
                              <div id="preview" width="44" height="50"> 
                                <table border="0" cellspacing="0" cellpadding="3" class="smllfontwhite">
                                  <tr> 
                                    <td width="54%" nowrap><font color="#999999">
                                      <? echo STATS_PLAYER_FOLD_PREFLOP; ?>
                                      </font></td>
                                    <td width="46%" nowrap><b> <font color="#FFFFFF"> 
                                      </font> 
                                      <? echo $foldpfperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td width="54%" nowrap><font color="#999999">
                                      <? echo STATS_PLAYER_FOLD_FLOP; ?>
                                      </font></td>
                                    <td width="46%" nowrap><b> <font color="#FFFFFF"> 
                                      </font> 
                                      <? echo $foldfperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td width="54%" nowrap><font color="#999999">
                                      <? echo STATS_PLAYER_FOLD_TURN; ?>
                                      </font></td>
                                    <td width="46%" nowrap><b> <font color="#FFFFFF"> 
                                      </font> 
                                      <? echo $foldtperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr>
                                    <td width="54%" nowrap><font color="#999999">
                                      <? echo STATS_PLAYER_FOLD_RIVER; ?>
                                      </font></td>
                                    <td width="46%" nowrap><b> 
                                      <? echo $foldrperc; ?>
                                      </b></td>
                                  </tr>
                                  <tr> 
                                    <td width="54%"><font color="#999999"> &nbsp;</font></td>
                                    <td width="46%"><b> <font color="#FFFFFF"> 
                                      </font> </b></td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        </fieldset></b></td>
                    </tr>
                    <tr> 
                      <td colspan="2" nowrap>&nbsp;</td>
                      <td colspan="2" nowrap width="49%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <form action="" enctype="multipart/form-data" method="post" name="chngava">
              <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr> 
                  <td> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="3" class="smllfontwhite" bgcolor="#333333">
                      <tr> 
                        <td nowrap class="fieldsetheadcontent"><b><font color="#FFCC33"><? echo PLAYER_CHOOSE_AVATAR; ?></font></b></td>
                        <td width="22%" nowrap>&nbsp;</td>
                        <td width="19%" nowrap>&nbsp;</td>
                        <td width="22%" nowrap>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="4" nowrap class="fieldsetheadcontent"> 
                          <table width="400" border="0" cellspacing="0" cellpadding="5" align="center">
                            <tr> 
                              <td colspan="2" class="fieldsethead"><fieldset><legend>&nbsp;<? echo BOX_STD_AVATARS; ?>&nbsp;</legend> 
                                <table border="0" cellspacing="0" cellpadding="2" bordercolor="#CCCCCC" align="center">
                                  <tr align="center"> 
                                    <td id="avatar1" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'" ><img src="images/avatars/avatar1.jpg" width="44" height="50" onClick="newavatar('1')"></td>
                                    <td id="avatar2" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar2.jpg" width="44" height="50" onClick="newavatar('2')"></td>
                                    <td id="avatar3" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar3.jpg" width="44" height="50" onClick="newavatar('3')"></td>
                                    <td id="avatar4" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar4.jpg" width="44" height="50" onClick="newavatar('4')"></td>
                                    <td id="avatar5" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar5.jpg" width="44" height="50" onClick="newavatar('5')"></td>
                                    <td id="avatar6" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar6.jpg" width="44" height="50" onClick="newavatar('6')"></td>
                                    <td id="avatar7" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar7.jpg" width="44" height="50" onClick="newavatar('7')"></td>
                                    <td id="avatar8" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar8.jpg" width="44" height="50" onClick="newavatar('8')"></td>
                                  </tr>
                                  <tr align="center"> 
                                    <td id="avatar9" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar9.jpg" width="44" height="50" onClick="newavatar('9')"></td>
                                    <td id="avatar10" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar10.jpg" width="44" height="50" onClick="newavatar('10')"></td>
                                    <td id="avatar11" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar11.jpg" width="44" height="50" onClick="newavatar('11')"></td>
                                    <td id="avatar12" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar12.jpg" width="44" height="50" onClick="newavatar('12')"></td>
                                    <td id="avatar13" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar13.jpg" width="44" height="50" onClick="newavatar('13')"></td>
                                    <td id="avatar14" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar14.jpg" width="44" height="50" onClick="newavatar('14')"></td>
                                    <td id="avatar15" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar15.jpg" width="44" height="50" onClick="newavatar('15')"></td>
                                    <td id="avatar16" onMouseOver="this.bgColor = '#FF0000'"  onMouseOut="this.bgColor = '#000000'"><img src="images/avatars/avatar16.jpg" width="44" height="50" onClick="newavatar('16')"></td>
                                  </tr>
                                </table>
                                </fieldset></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr> 
                        <td colspan="4" nowrap class="fieldsetheadcontent"> 
                          <table width="400" border="0" cellspacing="0" cellpadding="5" align="center">
                            <tr> 
                              <td colspan="2" class="fieldsethead"><fieldset><legend>&nbsp;<? echo BOX_CUSTOM_AVATARS; ?>&nbsp;</legend> 
                                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                  <tr> 
                                    <td align="center"> 
                                      <div id="preview" width="44" height="50"> 
                                        <input name="uploadedfile" type="file" class="fieldsetheadinputs" size="40" />
                                        <input name="update" type="hidden" id="action" value="image" />
                                        <input name="submit" type="submit" class="betbuttons" id="submit" onClick="showdiv()" value="<? echo BUTTON_UPLOAD; ?>" />
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                                </fieldset></td>
                            </tr>
                          </table>
                          <br>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </form>
            <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
              <tr> 
                <td> 
<? if(MEMMOD != 1){ ?>
                  <form name="form1" method="post" action="">
                    <table width="100%" border="0" cellspacing="0" cellpadding="3" class="smllfontwhite" bgcolor="#333333">
                      <tr> 
                        <td nowrap class="fieldsetheadcontent" width="33%"><b><font color="#FFCC33"><? echo PLAYER_CHANGE_PWD; ?></font></b></td>
                        <td width="19%" nowrap>&nbsp;</td>
                        <td width="21%" nowrap>&nbsp;</td>
                        <td width="27%" nowrap>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="33%" align="right" nowrap>&nbsp;</td>
                        <td width="19%" align="left" nowrap>&nbsp;</td>
                        <td width="21%" align="left" nowrap>&nbsp;</td>
                        <td width="27%" align="left" nowrap>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="33%" align="right" nowrap>
                          <? echo STATS_PLAYER_OLD_PWD; ?>
                        </td>
                        <td width="19%" align="left" nowrap> <b> 
                          <input type="text" size="12" maxlength="12" name="old" class="fieldsetheadinputs" />
                          </b></td>
                        <td width="21%" align="left" nowrap><? echo STATS_PLAYER_PWD_CHAR_LIMIT; ?></td>
                        <td width="27%" align="left" nowrap>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="33%" align="right" nowrap>
                          <? echo STATS_PLAYER_NEW_PWD; ?>
                        </td>
                        <td width="19%" align="left" nowrap><b> 
                          <input type="text" size="12" maxlength="12" name="pwd" class="fieldsetheadinputs" />
                          </b></td>
                        <td width="21%" align="left" nowrap>
                          <? echo STATS_PLAYER_PWD_CHAR_LIMIT; ?>
                        </td>
                        <td width="27%" align="left" nowrap>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="33%" align="right" nowrap>
                          <? echo STATS_PLAYER_CONFIRM_PWD; ?>
                        </td>
                        <td width="19%" align="left" nowrap><b> 
                          <input type="text" size="12" maxlength="12" name="pwd2" class="fieldsetheadinputs" />
                          </b></td>
                        <td width="21%" align="left" nowrap> 
                          <input type="hidden" name="action" id="av" value="updatepwd">
                        </td>
                        <td width="27%" align="left" nowrap> 
                          <input type="submit" name="Submit" value="<? echo BUTTON_SUBMIT; ?>" class="betbuttons">
                        </td>
                      </tr>
                      <tr> 
                        <td width="33%" align="right" nowrap>&nbsp;</td>
                        <td width="19%" align="left" nowrap>&nbsp;</td>
                        <td width="21%" align="right" nowrap>&nbsp;</td>
                        <td width="27%" align="left" nowrap>&nbsp;</td>
                      </tr>
                    </table>
                  </form>
<? } ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
