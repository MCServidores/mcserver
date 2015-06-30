<?php /* Smarty version Smarty3rc4, created on 2015-06-25 16:25:52
         compiled from "Z:\ts3wi\templates/new/showupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14815558c55c04be604-20003898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf51753dd1dccd8226495498fa2bf2c11f5a2fa4' => 
    array (
      0 => 'Z:\\ts3wi\\templates/new/showupdate.tpl',
      1 => 1291673560,
    ),
  ),
  'nocache_hash' => '14815558c55c04be604-20003898',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('newwiversion')->value)){?>
<tr>
	<td class="green1 warning center" colspan="2">
	<?php echo $_smarty_tpl->getVariable('newwiversion')->value;?>

	</td>
<tr>
<?php }?>