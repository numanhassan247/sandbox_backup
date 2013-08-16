<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:28
         compiled from CoreHome/templates/graph.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/graph.tpl', 24, false),array('modifier', 'escape', 'CoreHome/templates/graph.tpl', 24, false),)), $this); ?>
<div id="<?php echo $this->_tpl_vars['properties']['uniqueId']; ?>
" class="dataTable">
	
	<div class="reportDocumentation">
		<?php if (! empty ( $this->_tpl_vars['reportDocumentation'] )): ?><p><?php echo $this->_tpl_vars['reportDocumentation']; ?>
</p><?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['properties']['metadata']['archived_date'] )): ?><p><?php echo $this->_tpl_vars['properties']['metadata']['archived_date']; ?>
</p><?php endif; ?>
	</div>
	
	<div class="<?php if ($this->_tpl_vars['graphType'] == 'evolution'): ?>dataTableGraphEvolutionWrapper<?php else: ?>dataTableGraphWrapper<?php endif; ?>">

	<?php if ($this->_tpl_vars['isDataAvailable']): ?>
		
		<div class="jqplot-<?php echo $this->_tpl_vars['graphType']; ?>
" style="padding-left: 6px;">
			<div id="<?php echo $this->_tpl_vars['chartDivId']; ?>
" class="piwik-graph" style="position: relative; width: <?php echo $this->_tpl_vars['width']; ?>
<?php if (substr ( $this->_tpl_vars['width'] , -1 ) != '%'): ?>px<?php endif; ?>; height: <?php echo $this->_tpl_vars['height']; ?>
<?php if (substr ( $this->_tpl_vars['height'] , -1 ) != '%'): ?>px<?php endif; ?>;"></div>
		</div>
		
		<script type="text/javascript">
			<?php echo '  window.setTimeout(function() {  '; ?>

				var plot = new JQPlot(<?php echo $this->_tpl_vars['data']; ?>
, '<?php echo $this->_tpl_vars['properties']['uniqueId']; ?>
');
				<?php if (isset ( $this->_tpl_vars['properties']['externalSeriesToggle'] ) && $this->_tpl_vars['properties']['externalSeriesToggle']): ?>
					plot.addExternalSeriesToggle(<?php echo $this->_tpl_vars['properties']['externalSeriesToggle']; ?>
, '<?php echo $this->_tpl_vars['chartDivId']; ?>
',
						<?php if ($this->_tpl_vars['properties']['externalSeriesToggleShowAll']): ?>true<?php else: ?>false<?php endif; ?>);
				<?php endif; ?>
				plot.render('<?php echo $this->_tpl_vars['graphType']; ?>
', '<?php echo $this->_tpl_vars['chartDivId']; ?>
', <?php echo ' { '; ?>

					noData: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_NoDataForGraph')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
					exportTitle: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_ExportAsImage_js')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
					exportText: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_SaveImageOnYourComputer_js')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
					metricsToPlot: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_MetricsToPlot')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
					metricToPlot: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_MetricToPlot')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
					recordsToPlot: '<?php echo ((is_array($_tmp=((is_array($_tmp='General_RecordsToPlot')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
'
				<?php echo ' }); '; ?>

			<?php echo '  }, 5);  '; ?>

		</script>
		
	<?php else: ?>
		
		<div><div id="<?php echo $this->_tpl_vars['chartDivId']; ?>
" class="pk-emptyGraph">
			<?php if ($this->_tpl_vars['showReportDataWasPurgedMessage']): ?>
			<?php echo ((is_array($_tmp='General_DataForThisGraphHasBeenPurged')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['deleteReportsOlderThan']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['deleteReportsOlderThan'])); ?>

			<?php else: ?>
			<?php echo ((is_array($_tmp='General_NoDataForGraph')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<?php endif; ?>
		</div></div>
		
	<?php endif; ?>

	<?php if ($this->_tpl_vars['properties']['show_footer']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/datatable_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/datatable_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	
	</div>
</div>