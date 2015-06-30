<?  function pow_db_connect($server, $username, $password, $link = 'db_link') { global $$link, $db_error; $db_error = false; if (!$server) { $db_error = 'No Server selected.'; return false; } $$link = @mysql_connect($server, $username, $password) or $db_error = mysql_error(); return $$link; } function pow_db_select_db($database) { return mysql_select_db($database); } function pow_db_close($link = 'db_link') { global $$link; return mysql_close($$link); } function pow_db_query($query, $link = 'db_link') { global $$link; return mysql_query($query, $$link); } function pow_db_fetch_array($db_query) { return mysql_fetch_array($db_query); } function pow_db_num_rows($db_query) { return mysql_num_rows($db_query); } function pow_db_data_seek($db_query, $row_number) { return mysql_data_seek($db_query, $row_number); } function pow_db_insert_id() { return mysql_insert_id(); } function pow_db_free_result($db_query) { return mysql_free_result($db_query); } function pow_db_test_create_db_permission($database) { global $db_error; $message = 'Setup has detected that the database already contains information. If you have run this installer before, then the database may already be setup. If this is the case you must rerun the installer and uncheck the database setup check box. <BR><BR>If this is a new installation or a complete reinstall then you must use your MySQL configuration tool on your Web Server Control Panel to empty the database of all tables and data. If you are unsure how to do this then please contact your Web Hosting Company for assistance'; $db_created = false; $db_error = false; if (!$database) { $db_error = 'No Database selected.'; return false; } if (!$db_error) { if (!@pow_db_select_db($database)) { $db_created = true; if (!@pow_db_query('create database ' . $database)) { $db_error = mysql_error(); } } else { $db_error = mysql_error(); } if (!$db_error) { if (@pow_db_select_db($database)) { if (@pow_db_query('create table temp ( temp_id int(5) )')) { if (@pow_db_query('drop table temp')) { if ($db_created) { if (@pow_db_query('drop database ' . $database)) { } else { $db_error = $message; } } } else { $db_error = $message; } } else { $db_error = $message; } } else { $db_error = mysql_error(); } } } if ($db_error) { return false; } else { return true; } } function pow_db_test_connection($database) { global $db_error; $db_error = false; if (!$db_error) { if (!@pow_db_select_db($database)) { $db_error = mysql_error(); } else { if (!@pow_db_query('select count(*) from configuration')) { $db_error = mysql_error(); } } } if ($db_error) { return false; } else { return true; } } function pow_db_install($database, $sql_file) { global $db_error; $db_error = false; if (!@pow_db_select_db($database)) { if (@pow_db_query('create database ' . $database)) { pow_db_select_db($database); } else { $db_error = mysql_error(); } } if (!$db_error) { if (file_exists($sql_file)) { $fd = fopen($sql_file, 'rb'); $restore_query = fread($fd, filesize($sql_file)); fclose($fd); } else { $db_error = 'SQL file does not exist: ' . $sql_file; return false; } $sql_array = array(); $sql_length = strlen($restore_query); $pos = strpos($restore_query, ';'); for ($i=$pos; $i<$sql_length; $i++) { if ($restore_query[0] == '#') { $restore_query = ltrim(substr($restore_query, strpos($restore_query, "\n"))); $sql_length = strlen($restore_query); $i = strpos($restore_query, ';')-1; continue; } if ($restore_query[($i+1)] == "\n") { for ($j=($i+2); $j<$sql_length; $j++) { if (trim($restore_query[$j]) != '') { $next = substr($restore_query, $j, 6); if ($next[0] == '#') {  for ($k=$j; $k<$sql_length; $k++) { if ($restore_query[$k] == "\n") break; } $query = substr($restore_query, 0, $i+1); $restore_query = substr($restore_query, $k);  $restore_query = $query . $restore_query; $sql_length = strlen($restore_query); $i = strpos($restore_query, ';')-1; continue 2; } break; } } if ($next == '') {  $next = 'insert'; } if ( (eregi('create', $next)) || (eregi('insert', $next)) || (eregi('drop t', $next)) ) { $next = ''; $sql_array[] = substr($restore_query, 0, $i); $restore_query = ltrim(substr($restore_query, $i+1)); $sql_length = strlen($restore_query); $i = strpos($restore_query, ';')-1; } } } for ($i=0; $i<sizeof($sql_array); $i++) { pow_db_query($sql_array[$i]); } } else { return false; } }  $action=addslashes($_GET['action']); if($action == 'install'){  $error = false;  $dbs = addslashes($_POST['dbserver']); $dbname = addslashes($_POST['dbname']); $dbusr = addslashes($_POST['dbusr']); $dbpwd = addslashes($_POST['dbpwd']); $adminusr = addslashes($_POST['plyr']); if(($dbs == '') || ($dbname == '') || ($dbusr == '') || ($dbpwd == '') || ($adminusr == '')){ $msg = 'Missing fields! Please try again.<br>'; $error = true; } $ws = substr_count($usr, 'w'); $ms = substr_count($usr, 'm'); $Ws = substr_count($usr, 'M'); $Ms = substr_count($usr, 'W'); $longchars = $ws+$ms+$Ws+$Ms; if(($longchars > 4) && (strlen($adminusr) > 6)){ $error = true; $msg .= 'Player name has too many m\'s or w\'s in it!.<BR>'; } elseif(eregi('[^a-zA-Z0-9_]', $adminusr)){ $error = true; $msg .= 'Player names can contain letters, numbers and underscores.<BR>'; } elseif((strlen($usr) > 10) || (strlen($adminusr) < 5)){ $error = true; $msg .= 'Player names must be 5-10 characters long.<BR>'; } if($error == false){ $action = 'process'; $script_filename = getenv('PATH_TRANSLATED'); if (empty($script_filename)) { $script_filename = getenv('SCRIPT_FILENAME'); } $script_filename = str_replace('\\', '/', $script_filename); $script_filename = str_replace('//', '/', $script_filename); $dir_fs_www_root_array = explode('/', dirname($script_filename)); $dir_fs_www_root = array(); for ($i=0, $n=sizeof($dir_fs_www_root_array)-1; $i<$n; $i++) { $dir_fs_www_root[] = $dir_fs_www_root_array[$i]; } $dir_fs_www_root = implode('/', $dir_fs_www_root) . '/'; $db = array(); $db['DB_SERVER'] = $dbs; $db['DB_SERVER_USERNAME'] = $dbusr; $db['DB_SERVER_PASSWORD'] = $dbpwd; $db['DB_DATABASE'] = $dbname; pow_db_connect($db['DB_SERVER'], $db['DB_SERVER_USERNAME'], $db['DB_SERVER_PASSWORD']); $db_error = false; $sql_file = $dir_fs_www_root . 'install/poker.sql'; pow_db_install($db['DB_DATABASE'], $sql_file); $file_contents = '<?' . "\n" . '  define(\'DB_SERVER\', \'' . $dbs . '\');' . "\n" . '  define(\'DB_SERVER_USERNAME\', \'' . $dbusr . '\');' . "\n" . '  define(\'DB_SERVER_PASSWORD\', \'' . $dbpwd . '\');' . "\n" . '  define(\'DB_DATABASE\', \'' . $dbname . '\');' . "\n" . '  define(\'ADMIN_USERS\', \'' . $adminusr . '\');' . "\n" . '// Additional administrators can be added by seperating admin usernames with commas.' . "\n" . '?>'; $fp = fopen($dir_fs_www_root.'includes/configure.php', 'w'); fputs($fp, $file_contents); fclose($fp); }else{ $action = 'setup'; } } ?> 
<head>
<style type="text/css">
<!--
body {  font-family: Arial, Helvetica, sans-serif; font-size: 12px}
.button {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FF0000; background-color: #333333; border: #FFFFFF; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
-->
</style>
</head>
<body bgcolor="#000000" text="#FFFFFF">
<? if($action == ''){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr> 
    <td><b><font color="#FF0000" size="4">PHP Poker Installer V1.0</font><br>                              
      </b></td>
  </tr>
  <tr>
    <td>Before you begin installation, please check that the file includes/configure.php 
      is CHMOD to <b>0777</b> (writable).</td>
  </tr>
  <tr> 
    <td>
      <form name="form1" method="post" action="index.php?action=setup">
        <input type="submit" name="Submit" value="Continue" class="button">
      </form>
    </td>
  </tr>
</table>
<? }elseif($action == 'setup'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr> 
    <td><b><font color="#FF0000" size="4">PHP Poker Installer V1.0</font><br>
      </b> <font color="#FFCC33"> 
      <? echo $msg; ?>
      </font></td>
  </tr>
  <tr> 
    <td>Please supply the following installation information.</td>
  </tr>
  <tr> 
    <td> 
      <form name="form1" method="post" action="index.php?action=install">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="16%" nowrap><b>Database Server:</b></td>
            <td width="84%"> <font size="2"> 
              <input type="text" name="dbserver" size="30" maxlength="40" value="<? echo $db; ?>">
              Either localhost, the url or the IP Address of your database server.</font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap><b>Database Name:</b></td>
            <td width="84%"> <font size="2"> 
              <input type="text" name="dbname" size="30" maxlength="40" value="<? echo $dbname; ?>">
              The name of your database.</font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap> 
              <p><b>Database Username:</b></p>
            </td>
            <td width="84%"> <font size="2"> 
              <input type="text" name="dbusr" size="30" maxlength="40" value="<? echo $dbusr; ?>">
              Your database access username.</font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap><b>Database Password:</b></td>
            <td width="84%"> <font size="2"> 
              <input type="password" name="dbpwd" size="30" maxlength="40" value="<? echo $dbpwd; ?>">
              Your database access password</font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap><b></b></td>
            <td width="84%"><font size="2"></font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap><b>Your Player Name:</b></td>
            <td width="84%"> <font size="2"> 
              <input type="text" name="plyr" size="20" maxlength="10" value="<? echo $usr; ?>">
              Your chosen player name (5-10 alphanumeric chars) will inserted 
              as site administrator. </font></td>
          </tr>
          <tr> 
            <td width="16%" nowrap>&nbsp;</td>
            <td width="84%"> 
              <p><font size="2">When the game is installed, create a new player 
                using this administrator name and this player will have sole admin 
                access.<br>
                Additional administrators can be added by editing the configure.php 
                file </font></p>
            </td>
          </tr>
        </table>
        <input type="submit" name="Submit" value="Continue" class="button">
      </form>
    </td>
  </tr>
</table>
<? }elseif($action == 'process'){ if ($db_error != false) { ?>
  <table width="100%" border="0" cellpadding="2" class="formPage">
    <tr> 
      
    <td><b><font color="#FF0000" size="4">PHP Poker Installer Results:</font><br>
        </b></td>
    </tr>
    <tr> 
      <td> 
        <p>The installation of the database data was <font color="#990000"><b>NOT</b> 
          <b>successful</b></font>. <br>
          <br>
          The following error has occurred:</p>
        <p class="boxme"> 
          <? echo $db_error; ?>
        </p>
      </td>
    </tr>
    <tr>
      <td> <br>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr> 
            
          <td> 
            <input type=button value="Back" onClick="history.go(-1)" class="button">
          </td>
          </tr>
        </table>
        <br>
        &nbsp; </td>
    </tr>
  </table>

<p>&nbsp;</p>

<? } else { ?>
<form name="install" action="../index.php" method="post">
  <table width="100%" border="0" cellpadding="2" class="formPage">
    <tr> 
      <td><b><font color="#FF0000" size="4">PHP Poker Installer Results:</font><br>
        </b></td>
    </tr>
    <tr> 
      <td> 
        <p>The installation of the database data was <b><font color="#006600">successful</font></b>.</p>
        <p>Please click the continue button to proceed to continue to the game 
          and then make sure you delete the install folder from your server and 
          CHMOD the includes/configure.php file to <b>0644</b>. </p>
        <input type="hidden" name="hid" value="4">
      </td>
    </tr>
    <tr>
      <td><br>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr> 

            <td> 
              <input type="submit" name="Submit" value="Continue" class="button">
            </td>
    
          </tr>
        </table>
        <br>
      </td>
    </tr>
  </table>

<p>&nbsp;</p>

</form>

<? } } ?>