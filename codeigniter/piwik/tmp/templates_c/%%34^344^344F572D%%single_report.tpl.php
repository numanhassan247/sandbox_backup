<?php /* Smarty version 2.6.26, created on 2013-04-24 12:53:19
         compiled from CoreHome/templates/single_report.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'CoreHome/templates/single_report.tpl', 1, false),)), $this); ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
<?php echo $this->_tpl_vars['report']; ?>