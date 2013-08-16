<?php /* Smarty version 2.6.26, created on 2013-04-24 12:46:12
         compiled from Installation/templates/systemCheck.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Installation/templates/systemCheck.tpl', 6, false),)), $this); ?>
<?php if (! $this->_tpl_vars['showNextStep']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Installation/templates/systemCheck_legend.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br style="clear:both">
<?php endif; ?>

<h3><?php echo ((is_array($_tmp='Installation_SystemCheck')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<br/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Installation/templates/systemCheckSection.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['showNextStep']): ?>
<br/><p>
<img src='themes/default/images/link.gif' /> &nbsp;<a href="?module=Proxy&action=redirect&url=http://piwik.org/docs/requirements/" target="_blank"><?php echo ((is_array($_tmp='Installation_Requirements')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a> 
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Installation/templates/systemCheck_legend.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>