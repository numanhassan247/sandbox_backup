<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/top_bar_hello_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/top_bar_hello_menu.tpl', 4, false),)), $this); ?>

<div id="topRightBar">
<?php ob_start(); ?><?php if (! empty ( $this->_tpl_vars['userAlias'] )): ?><?php echo $this->_tpl_vars['userAlias']; ?>
<?php else: ?><?php echo $this->_tpl_vars['userLogin']; ?>
<?php endif; ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('helloAlias', ob_get_contents());ob_end_clean(); ?>
	<span class="topBarElem"><?php echo ((is_array($_tmp='General_HelloUser')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['helloAlias'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['helloAlias'])."</strong>")); ?>
</span>
<?php if ($this->_tpl_vars['userLogin'] != 'anonymous'): ?>| <span class="topBarElem"><a href='index.php?module=CoreAdminHome'><?php echo ((is_array($_tmp='General_Settings')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></span><?php endif; ?>
	| <span class="topBarElem"><?php if ($this->_tpl_vars['userLogin'] == 'anonymous'): ?><a href='index.php?module=<?php echo $this->_tpl_vars['loginModule']; ?>
'><?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a><?php else: ?><a href='index.php?module=<?php echo $this->_tpl_vars['loginModule']; ?>
&amp;action=logout'><?php echo ((is_array($_tmp='Login_Logout')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a><?php endif; ?></span>
</div>