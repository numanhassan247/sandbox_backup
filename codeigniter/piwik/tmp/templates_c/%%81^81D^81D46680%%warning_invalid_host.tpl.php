<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/warning_invalid_host.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/warning_invalid_host.tpl', 6, false),)), $this); ?>

<?php if (isset ( $this->_tpl_vars['isValidHost'] ) && isset ( $this->_tpl_vars['invalidHostMessage'] ) && ! $this->_tpl_vars['isValidHost']): ?>
<div class="ajaxSuccess" style='clear:both;width:800px'>
	<a style="float:right" href="http://piwik.org/faq/troubleshooting/#faq_171" target="_blank"><img src="themes/default/images/help_grey.png" /></a>
	<strong><?php echo ((is_array($_tmp='General_Warning')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:&nbsp;</strong><?php echo $this->_tpl_vars['invalidHostMessage']; ?>

</div>
<?php endif; ?>
