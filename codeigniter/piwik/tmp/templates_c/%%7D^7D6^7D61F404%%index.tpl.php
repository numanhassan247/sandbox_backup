<?php /* Smarty version 2.6.26, created on 2013-04-24 12:53:05
         compiled from VisitsSummary/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'VisitsSummary/templates/index.tpl', 4, false),)), $this); ?>
<a name="evolutionGraph" graphId="VisitsSummarygetEvolutionGraph"></a>

<h2><?php echo ((is_array($_tmp='Referers_Evolution')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>

<?php echo $this->_tpl_vars['graphEvolutionVisitsSummary']; ?>


<h2><?php echo ((is_array($_tmp='General_Report')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "VisitsSummary/templates/sparklines.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>