<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:24
         compiled from Live/templates/lastVisits.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Live/templates/lastVisits.tpl', 8, false),array('modifier', 'translate', 'Live/templates/lastVisits.tpl', 8, false),array('modifier', 'escape', 'Live/templates/lastVisits.tpl', 11, false),array('modifier', 'money', 'Live/templates/lastVisits.tpl', 48, false),)), $this); ?>
<?php $this->assign('maxPagesDisplayedByVisitor', 100); ?>

<ul id='visitsLive'>
<?php $_from = $this->_tpl_vars['visitors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['visitor']):
?>
	<li id="<?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
" class="visit">
		<div style="display:none" class="idvisit"><?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
</div>
			<div title="<?php echo count($this->_tpl_vars['visitor']['actionDetails']); ?>
 <?php echo ((is_array($_tmp='Live_Actions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" class="datetime">
				<span style='display:none' class='serverTimestamp'><?php echo $this->_tpl_vars['visitor']['serverTimestamp']; ?>
</span>
				<?php echo $this->_tpl_vars['visitor']['serverDatePretty']; ?>
 - <?php echo $this->_tpl_vars['visitor']['serverTimePretty']; ?>
 <?php if ($this->_tpl_vars['visitor']['visitDuration'] > 0): ?><i>(<?php echo $this->_tpl_vars['visitor']['visitDurationPretty']; ?>
)</i><?php endif; ?>
				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['countryFlag']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['location'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
, <?php echo ((is_array($_tmp='Provider_ColumnProvider')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <?php echo $this->_tpl_vars['visitor']['provider']; ?>
" />
				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['browserIcon']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['browserName']; ?>
, <?php echo ((is_array($_tmp='UserSettings_Plugins')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo $this->_tpl_vars['visitor']['plugins']; ?>
" />
				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['operatingSystemIcon']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['operatingSystem']; ?>
, <?php echo $this->_tpl_vars['visitor']['resolution']; ?>
" />
				&nbsp;
				<?php if ($this->_tpl_vars['visitor']['visitConverted']): ?>
				<span title="<?php echo ((is_array($_tmp='General_VisitConvertedNGoals')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['visitor']['goalConversions']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['visitor']['goalConversions'])); ?>
" class='visitorRank'>
				<img src="<?php echo $this->_tpl_vars['visitor']['visitConvertedIcon']; ?>
" />
				<span class='hash'>#</span><?php echo $this->_tpl_vars['visitor']['goalConversions']; ?>

				<?php if ($this->_tpl_vars['visitor']['visitEcommerceStatusIcon']): ?>
					&nbsp;- <img src="<?php echo $this->_tpl_vars['visitor']['visitEcommerceStatusIcon']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['visitEcommerceStatus']; ?>
"/>
				<?php endif; ?>
				</span><?php endif; ?>
				<?php if ($this->_tpl_vars['visitor']['visitorTypeIcon']): ?>
					<a class="rightLink" href="javascript:broadcast.propagateAjax('module=Live&action=getVisitorLog&period=month&segment=visitorId==<?php echo $this->_tpl_vars['visitor']['visitorId']; ?>
')">
					&nbsp;- <img src="<?php echo $this->_tpl_vars['visitor']['visitorTypeIcon']; ?>
" title="<?php echo ((is_array($_tmp='General_ReturningVisitor')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 - <?php echo ((is_array($_tmp='General_ReturningVisitorAllVisits')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
					</a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['visitor']['visitIp']): ?>- <span title="<?php if (! empty ( $this->_tpl_vars['visitor']['visitorId'] )): ?><?php echo ((is_array($_tmp='General_VisitorID')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo $this->_tpl_vars['visitor']['visitorId']; ?>
<?php endif; ?>">IP: <?php echo $this->_tpl_vars['visitor']['visitIp']; ?>
</span><?php endif; ?>
			</div>
			<!--<div class="settings"></div>-->
			<div class="referer">
				<?php if ($this->_tpl_vars['visitor']['referrerType'] != 'direct'): ?><?php echo ((is_array($_tmp='General_FromReferrer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <?php if (! empty ( $this->_tpl_vars['visitor']['referrerUrl'] )): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['referrerUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" target="_blank"><?php endif; ?><?php if (! empty ( $this->_tpl_vars['visitor']['searchEngineIcon'] )): ?><img src="<?php echo $this->_tpl_vars['visitor']['searchEngineIcon']; ?>
" /> <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['referrerName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php if (! empty ( $this->_tpl_vars['visitor']['referrerUrl'] )): ?></a><?php endif; ?>
					<?php if (! empty ( $this->_tpl_vars['visitor']['referrerKeyword'] )): ?> - "<?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['referrerKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"<?php endif; ?>
					<?php ob_start(); ?><?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['referrerKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('keyword', ob_get_contents());ob_end_clean(); ?>
					<?php ob_start(); ?><?php echo ((is_array($_tmp=$this->_tpl_vars['visitor']['referrerName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('searchName', ob_get_contents());ob_end_clean(); ?>
					<?php ob_start(); ?>#<?php echo $this->_tpl_vars['visitor']['referrerKeywordPosition']; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('position', ob_get_contents());ob_end_clean(); ?>
					<?php if (! empty ( $this->_tpl_vars['visitor']['referrerKeywordPosition'] )): ?><span title='<?php echo ((is_array($_tmp='Live_KeywordRankedOnSearchResultForThisVisitor')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['keyword'], $this->_tpl_vars['position'], $this->_tpl_vars['searchName']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['keyword'], $this->_tpl_vars['position'], $this->_tpl_vars['searchName'])); ?>
' class='visitorRank'><span class='hash'>#</span><?php echo $this->_tpl_vars['visitor']['referrerKeywordPosition']; ?>
</span><?php endif; ?>
				<?php else: ?><?php echo ((is_array($_tmp='Referers_DirectEntry')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php endif; ?>
			</div>
		<div id="<?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
_actions" class="settings">
			<span class="pagesTitle" title="<?php echo count($this->_tpl_vars['visitor']['actionDetails']); ?>
 <?php echo ((is_array($_tmp='Live_Actions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" ><?php echo ((is_array($_tmp='Actions_SubmenuPages')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:</span>&nbsp;
			<?php  $col = 0;	 ?>
			<?php $_from = $this->_tpl_vars['visitor']['actionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['visitorPages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['visitorPages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['action']):
        $this->_foreach['visitorPages']['iteration']++;
?>
				<?php if ($this->_foreach['visitorPages']['iteration'] <= $this->_tpl_vars['maxPagesDisplayedByVisitor']): ?>
				<?php if ($this->_tpl_vars['action']['type'] == 'ecommerceOrder' || $this->_tpl_vars['action']['type'] == 'ecommerceAbandonedCart'): ?>
					<span title="
						<?php if ($this->_tpl_vars['action']['type'] == 'ecommerceOrder'): ?><?php echo ((is_array($_tmp='Goals_EcommerceOrder')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp='Goals_AbandonedCart')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php endif; ?> 
 - <?php if ($this->_tpl_vars['action']['type'] == 'ecommerceOrder'): ?><?php echo ((is_array($_tmp='Live_GoalRevenue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php else: ?><?php ob_start(); ?><?php echo ((is_array($_tmp='Live_GoalRevenue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('revenueLeft', ob_get_contents());ob_end_clean(); ?><?php echo ((is_array($_tmp='Goals_LeftInCart')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['revenueLeft']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['revenueLeft'])); ?>
: <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['action']['revenue'])) ? $this->_run_mod_handler('money', true, $_tmp, $this->_tpl_vars['idSite']) : smarty_modifier_money($_tmp, $this->_tpl_vars['idSite'])); ?>
 
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['serverTimePretty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
  
 <?php if (! empty ( $this->_tpl_vars['action']['itemDetails'] )): ?><?php $_from = $this->_tpl_vars['action']['itemDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
  # <?php echo $this->_tpl_vars['product']['itemSKU']; ?>
<?php if (! empty ( $this->_tpl_vars['product']['itemName'] )): ?>: <?php echo $this->_tpl_vars['product']['itemName']; ?>
<?php endif; ?><?php if (! empty ( $this->_tpl_vars['product']['itemCategory'] )): ?> (<?php echo $this->_tpl_vars['product']['itemCategory']; ?>
)<?php endif; ?>, <?php echo ((is_array($_tmp='General_Quantity')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo $this->_tpl_vars['product']['quantity']; ?>
, <?php echo ((is_array($_tmp='General_Price')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['price'])) ? $this->_run_mod_handler('money', true, $_tmp, $this->_tpl_vars['idSite']) : smarty_modifier_money($_tmp, $this->_tpl_vars['idSite'])); ?>
 
<?php endforeach; endif; unset($_from); ?><?php endif; ?>">
						<img class='iconPadding' src="<?php echo $this->_tpl_vars['action']['icon']; ?>
" /> 
						<?php if ($this->_tpl_vars['action']['type'] == 'ecommerceOrder'): ?><?php echo ((is_array($_tmp='Live_GoalRevenue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['revenue'])) ? $this->_run_mod_handler('money', true, $_tmp, $this->_tpl_vars['idSite']) : smarty_modifier_money($_tmp, $this->_tpl_vars['idSite'])); ?>
 <?php endif; ?>
					</span>
				<?php else: ?>
				    <?php $col++; if ($col>=9) { $col=0; } ?>
					<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['action']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" target="_blank">
					<?php if ($this->_tpl_vars['action']['type'] == 'action'): ?>
						<img src="plugins/Live/templates/images/file<?php  echo $col;  ?>.png" title="<?php if (! empty ( $this->_tpl_vars['action']['pageTitle'] )): ?><?php echo $this->_tpl_vars['action']['pageTitle']; ?>
<?php endif; ?> - <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['serverTimePretty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php if (isset ( $this->_tpl_vars['action']['timeSpentPretty'] )): ?> - <?php echo ((is_array($_tmp='General_TimeOnPage')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo $this->_tpl_vars['action']['timeSpentPretty']; ?>
<?php endif; ?>" />
					<?php elseif ($this->_tpl_vars['action']['type'] == 'outlink' || $this->_tpl_vars['action']['type'] == 'download'): ?>
						<img class='iconPadding' src="<?php echo $this->_tpl_vars['action']['icon']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['action']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['serverTimePretty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
					<?php elseif ($this->_tpl_vars['action']['type'] == 'search'): ?>
						<img class='iconPadding' src="<?php echo $this->_tpl_vars['action']['icon']; ?>
" title="<?php echo ((is_array($_tmp=((is_array($_tmp='Actions_SubmenuSitesearch')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['pageTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['serverTimePretty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
					<?php else: ?>
						<img class='iconPadding' src="<?php echo $this->_tpl_vars['action']['icon']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['action']['goalName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
 - <?php if ($this->_tpl_vars['action']['revenue'] > 0): ?><?php echo ((is_array($_tmp='Live_GoalRevenue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['revenue'])) ? $this->_run_mod_handler('money', true, $_tmp, $this->_tpl_vars['idSite']) : smarty_modifier_money($_tmp, $this->_tpl_vars['idSite'])); ?>
 - <?php endif; ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['action']['serverTimePretty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
					<?php endif; ?>
					</a>
				<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_foreach['visitorPages']['iteration'] > $this->_tpl_vars['maxPagesDisplayedByVisitor']): ?>
				<i>(<?php echo ((is_array($_tmp='Live_MorePagesNotDisplayed')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
)</i>
			<?php endif; ?>
		</div>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>