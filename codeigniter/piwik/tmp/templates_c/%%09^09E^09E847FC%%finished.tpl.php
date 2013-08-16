<?php /* Smarty version 2.6.26, created on 2013-04-24 12:50:26
         compiled from Installation/templates/finished.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Installation/templates/finished.tpl', 1, false),)), $this); ?>
<h2><?php echo ((is_array($_tmp='Installation_Congratulations')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>

<?php echo ((is_array($_tmp='Installation_CongratulationsHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>



<p class="nextStep">
	<a class="submit" href="index.php"><?php echo ((is_array($_tmp='Installation_ContinueToPiwik')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &raquo;</a>
</p>