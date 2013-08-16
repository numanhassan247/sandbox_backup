<?php /* Smarty version 2.6.26, created on 2013-04-24 12:53:05
         compiled from VisitsSummary/templates/sparklines.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sparkline', 'VisitsSummary/templates/sparklines.tpl', 3, false),array('modifier', 'translate', 'VisitsSummary/templates/sparklines.tpl', 4, false),array('modifier', 'sumtime', 'VisitsSummary/templates/sparklines.tpl', 9, false),array('modifier', 'trim', 'VisitsSummary/templates/sparklines.tpl', 31, false),)), $this); ?>
<div id='leftcolumn'>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbVisits']), $this);?>
 
		<?php echo ((is_array($_tmp='VisitsSummary_NbVisits')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbVisits'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbVisits'])."</strong>")); ?>
<?php if ($this->_tpl_vars['displayUniqueVisitors']): ?>, 
		<?php echo ((is_array($_tmp='VisitsSummary_NbUniqueVisitors')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbUniqVisitors'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbUniqVisitors'])."</strong>")); ?>
<?php endif; ?>
	</div>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineAvgVisitDuration']), $this);?>
 
		<?php $this->assign('averageVisitDuration', ((is_array($_tmp=$this->_tpl_vars['averageVisitDuration'])) ? $this->_run_mod_handler('sumtime', true, $_tmp) : smarty_modifier_sumtime($_tmp))); ?> 
		<?php echo ((is_array($_tmp='VisitsSummary_AverageVisitDuration')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['averageVisitDuration'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['averageVisitDuration'])."</strong>")); ?>

	</div>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineBounceRate']), $this);?>
 
		<?php echo ((is_array($_tmp='VisitsSummary_NbVisitsBounced')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['bounceRate'])."%</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['bounceRate'])."%</strong>")); ?>

	</div>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineActionsPerVisit']), $this);?>
 
		<?php echo ((is_array($_tmp='VisitsSummary_NbActionsPerVisit')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbActionsPerVisit'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbActionsPerVisit'])."</strong>")); ?>

	</div>
</div>

<div id='rightcolumn'>
	<?php if ($this->_tpl_vars['showOnlyActions']): ?>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbActions']), $this);?>

		<?php echo ((is_array($_tmp='VisitsSummary_NbActionsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbActions'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbActions'])."</strong>")); ?>

	</div>
	<?php else: ?>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbPageviews']), $this);?>
 
		<?php echo ((is_array($_tmp=((is_array($_tmp='VisitsSummary_NbPageviewsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbPageviews'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbPageviews'])."</strong>")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
, 
		<?php echo ((is_array($_tmp='VisitsSummary_NbUniquePageviewsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbUniquePageviews'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbUniquePageviews'])."</strong>")); ?>

	</div>
	<?php if ($this->_tpl_vars['displaySiteSearch']): ?>
		<div class="sparkline">
			<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbSearches']), $this);?>

			<?php echo ((is_array($_tmp=((is_array($_tmp='VisitsSummary_NbSearchesDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbSearches'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbSearches'])."</strong>")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
,
			<?php echo ((is_array($_tmp='VisitsSummary_NbKeywordsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbKeywords'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbKeywords'])."</strong>")); ?>

		</div>
	<?php endif; ?>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbDownloads']), $this);?>

		<?php echo ((is_array($_tmp=((is_array($_tmp='VisitsSummary_NbDownloadsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbDownloads'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbDownloads'])."</strong>")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
,
		<?php echo ((is_array($_tmp='VisitsSummary_NbUniqueDownloadsDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbUniqueDownloads'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbUniqueDownloads'])."</strong>")); ?>

	</div>
		<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineNbOutlinks']), $this);?>

		<?php echo ((is_array($_tmp=((is_array($_tmp='VisitsSummary_NbOutlinksDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbOutlinks'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbOutlinks'])."</strong>")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
,
		<?php echo ((is_array($_tmp='VisitsSummary_NbUniqueOutlinksDescription')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['nbUniqueOutlinks'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['nbUniqueOutlinks'])."</strong>")); ?>

	</div>
	<?php endif; ?>
	<div class="sparkline">
		<?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineMaxActions']), $this);?>
 
		<?php echo ((is_array($_tmp='VisitsSummary_MaxNbActions')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['maxActions'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['maxActions'])."</strong>")); ?>

	</div>
</div>
<div style="clear:both;"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/sparkline_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
