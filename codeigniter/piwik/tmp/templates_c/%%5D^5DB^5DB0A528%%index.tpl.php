<?php /* Smarty version 2.6.26, created on 2013-04-24 12:53:41
         compiled from Referers/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Referers/templates/index.tpl', 2, false),array('function', 'sparkline', 'Referers/templates/index.tpl', 9, false),)), $this); ?>
<a name="evolutionGraph" graphId="<?php echo $this->_tpl_vars['nameGraphEvolutionReferers']; ?>
"></a>
<h2><?php echo ((is_array($_tmp='Referers_Evolution')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php echo $this->_tpl_vars['graphEvolutionReferers']; ?>


<br />
<div id='leftcolumn' style="position:relative">
	<h2><?php echo ((is_array($_tmp='Referers_Type')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<div id='leftcolumn'>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineDirectEntry']), $this);?>

				<?php echo ((is_array($_tmp='Referers_TypeDirectEntries')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['visitorsFromDirectEntry'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['visitorsFromDirectEntry'])."</strong>")); ?>
<?php if (! empty ( $this->_tpl_vars['visitorsFromDirectEntryPercent'] )): ?>, <strong><?php echo $this->_tpl_vars['visitorsFromDirectEntryPercent']; ?>
%</strong> of visits<?php endif; ?><?php if (! empty ( $this->_tpl_vars['visitorsFromDirectEntryEvolution'] )): ?> <?php echo $this->_tpl_vars['visitorsFromDirectEntryEvolution']; ?>
<?php endif; ?>
			</div>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineSearchEngines']), $this);?>

				<?php echo ((is_array($_tmp='Referers_TypeSearchEngines')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['visitorsFromSearchEngines'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['visitorsFromSearchEngines'])."</strong>")); ?>
<?php if (! empty ( $this->_tpl_vars['visitorsFromSearchEnginesPercent'] )): ?>, <strong><?php echo $this->_tpl_vars['visitorsFromSearchEnginesPercent']; ?>
%</strong> of visits<?php endif; ?><?php if (! empty ( $this->_tpl_vars['visitorsFromSearchEnginesEvolution'] )): ?> <?php echo $this->_tpl_vars['visitorsFromSearchEnginesEvolution']; ?>
<?php endif; ?>
			</div>
	</div>
	<div id='rightcolumn'>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineWebsites']), $this);?>

				<?php echo ((is_array($_tmp='Referers_TypeWebsites')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['visitorsFromWebsites'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['visitorsFromWebsites'])."</strong>")); ?>
<?php if (! empty ( $this->_tpl_vars['visitorsFromWebsitesPercent'] )): ?>, <strong><?php echo $this->_tpl_vars['visitorsFromWebsitesPercent']; ?>
%</strong> of visits<?php endif; ?><?php if (! empty ( $this->_tpl_vars['visitorsFromWebsitesEvolution'] )): ?> <?php echo $this->_tpl_vars['visitorsFromWebsitesEvolution']; ?>
<?php endif; ?>
			</div>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineCampaigns']), $this);?>

				<?php echo ((is_array($_tmp='Referers_TypeCampaigns')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['visitorsFromCampaigns'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['visitorsFromCampaigns'])."</strong>")); ?>
<?php if (! empty ( $this->_tpl_vars['visitorsFromCampaignsPercent'] )): ?>, <strong><?php echo $this->_tpl_vars['visitorsFromCampaignsPercent']; ?>
%</strong> of visits<?php endif; ?><?php if (! empty ( $this->_tpl_vars['visitorsFromCampaignsEvolution'] )): ?> <?php echo $this->_tpl_vars['visitorsFromCampaignsEvolution']; ?>
<?php endif; ?>
			</div>
	</div>
	
	<div style="clear:both" />
	
	<div style="float:left">
		<br/>
		<h2><?php echo ((is_array($_tmp='General_MoreDetails')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
&nbsp;<a href="#" class="section-toggler-link" data-section-id="distinctReferrersByType">(<?php echo ((is_array($_tmp='General_Show_js')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
)</a></h2>
	</div>

	<div id="distinctReferrersByType" style="display:none;float:left">
		<table cellpadding="15">
		<tr><td width="50%">
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineDistinctSearchEngines']), $this);?>

				<strong><?php echo $this->_tpl_vars['numberDistinctSearchEngines']; ?>
</strong> <?php echo ((is_array($_tmp='Referers_DistinctSearchEngines')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php if (! empty ( $this->_tpl_vars['numberDistinctSearchEnginesEvolution'] )): ?> <?php echo $this->_tpl_vars['numberDistinctSearchEnginesEvolution']; ?>
<?php endif; ?>
			</div>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineDistinctKeywords']), $this);?>

				<strong><?php echo $this->_tpl_vars['numberDistinctKeywords']; ?>
</strong> <?php echo ((is_array($_tmp='Referers_DistinctKeywords')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php if (! empty ( $this->_tpl_vars['numberDistinctKeywordsEvolution'] )): ?> <?php echo $this->_tpl_vars['numberDistinctKeywordsEvolution']; ?>
<?php endif; ?>
			</div>
		</td>
		<td width="50%">
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineDistinctWebsites']), $this);?>

				<strong><?php echo $this->_tpl_vars['numberDistinctWebsites']; ?>
</strong> <?php echo ((is_array($_tmp='Referers_DistinctWebsites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <?php echo ((is_array($_tmp='Referers_UsingNDistinctUrls')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong>".($this->_tpl_vars['numberDistinctWebsitesUrls'])."</strong>") : smarty_modifier_translate($_tmp, "<strong>".($this->_tpl_vars['numberDistinctWebsitesUrls'])."</strong>")); ?>
<?php if (! empty ( $this->_tpl_vars['numberDistinctWebsitesEvolution'] )): ?> <?php echo $this->_tpl_vars['numberDistinctWebsitesEvolution']; ?>
<?php endif; ?>
			</div>
			<div class="sparkline"><?php echo smarty_function_sparkline(array('src' => $this->_tpl_vars['urlSparklineDistinctCampaigns']), $this);?>
 
				<strong><?php echo $this->_tpl_vars['numberDistinctCampaigns']; ?>
</strong> <?php echo ((is_array($_tmp='Referers_DistinctCampaigns')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php if (! empty ( $this->_tpl_vars['numberDistinctCampaignsEvolution'] )): ?> <?php echo $this->_tpl_vars['numberDistinctCampaignsEvolution']; ?>
<?php endif; ?>
			</div>
		</td></tr>
		</table>
		<br/>
	</div>
	
	<p style="clear:both"/>
	<div style="float:left"><?php echo ((is_array($_tmp='General_View')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 
		<a href="javascript:broadcast.propagateAjax('module=Referers&action=getSearchEnginesAndKeywords')"><?php echo ((is_array($_tmp='Referers_SubmenuSearchEngines')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>,
		<a href="javascript:broadcast.propagateAjax('module=Referers&action=indexWebsites')"><?php echo ((is_array($_tmp='Referers_SubmenuWebsites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>,
		<a href="javascript:broadcast.propagateAjax('module=Referers&action=indexCampaigns')"><?php echo ((is_array($_tmp='Referers_SubmenuCampaigns')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>.
	</div>
</div>

<div id='rightcolumn'>
	<h2><?php echo ((is_array($_tmp='Referers_DetailsByRefererType')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableRefererType']; ?>

</div>

<div style="clear:both;"></div>

<?php if ($this->_tpl_vars['totalVisits'] > 0): ?>
<h2><?php echo ((is_array($_tmp='Referers_ReferrersOverview')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php echo $this->_tpl_vars['referrersReportsByDimension']; ?>

<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/sparkline_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
