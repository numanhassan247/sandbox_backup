<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/header_message.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/header_message.tpl', 8, false),)), $this); ?>
<?php $this->assign('test_latest_version_available', "2.0"); ?>
<?php $this->assign('test_piwikUrl', 'http://demo.piwik.org/'); ?>

<span id="header_message" class="<?php if ($this->_tpl_vars['piwikUrl'] == 'http://demo.piwik.org/' || ! $this->_tpl_vars['latest_version_available']): ?>header_info<?php else: ?>header_alert<?php endif; ?>">
<span class="header_short">
	<?php if ($this->_tpl_vars['piwikUrl'] == 'http://demo.piwik.org/'): ?>
		<?php echo ((is_array($_tmp='General_YouAreViewingDemoShortMessage')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

	<?php elseif ($this->_tpl_vars['latest_version_available']): ?>
		<?php echo ((is_array($_tmp='General_NewUpdatePiwikX')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['latest_version_available']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['latest_version_available'])); ?>

	<?php else: ?>
		<?php echo ((is_array($_tmp='General_AboutPiwikX')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['piwik_version']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['piwik_version'])); ?>

	<?php endif; ?>
</span>

<span class="header_full">
	<?php if ($this->_tpl_vars['piwikUrl'] == 'http://demo.piwik.org/'): ?>
		<?php echo ((is_array($_tmp='General_YouAreViewingDemoShortMessage')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<br/>
		<?php echo ((is_array($_tmp='General_DownloadFullVersion')) ? $this->_run_mod_handler('translate', true, $_tmp, "<a href='http://piwik.org/'>", "</a>", "<a href='http://piwik.org'>piwik.org</a>") : smarty_modifier_translate($_tmp, "<a href='http://piwik.org/'>", "</a>", "<a href='http://piwik.org'>piwik.org</a>")); ?>

	<?php elseif ($this->_tpl_vars['latest_version_available']): ?>
		<?php if ($this->_tpl_vars['isSuperUser']): ?>
			<?php echo ((is_array($_tmp='General_PiwikXIsAvailablePleaseUpdateNow')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['latest_version_available'], "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>") : smarty_modifier_translate($_tmp, $this->_tpl_vars['latest_version_available'], "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>")); ?>

			<br/><?php echo ((is_array($_tmp='General_YouAreCurrentlyUsing')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['piwik_version']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['piwik_version'])); ?>

		<?php else: ?>
			<?php echo ((is_array($_tmp='General_PiwikXIsAvailablePleaseNotifyPiwikAdmin')) ? $this->_run_mod_handler('translate', true, $_tmp, "<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>".($this->_tpl_vars['latest_version_available'])."</a>") : smarty_modifier_translate($_tmp, "<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>".($this->_tpl_vars['latest_version_available'])."</a>")); ?>

		<?php endif; ?>
	<?php else: ?>
		<?php echo ((is_array($_tmp='General_PiwikIsACollaborativeProjectYouCanContributeAndDonate')) ? $this->_run_mod_handler('translate', true, $_tmp, "<a href='?module=Proxy&action=redirect&url=http://piwik.org' target='_blank'>", ($this->_tpl_vars['piwik_version'])."</a>", "<br />", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/contribute/'>", "</a>", '<br/>', "<a href='http://piwik.org/donate/' target='_blank'><strong><em>", "</em></strong></a>") : smarty_modifier_translate($_tmp, "<a href='?module=Proxy&action=redirect&url=http://piwik.org' target='_blank'>", ($this->_tpl_vars['piwik_version'])."</a>", "<br />", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/contribute/'>", "</a>", '<br/>', "<a href='http://piwik.org/donate/' target='_blank'><strong><em>", "</em></strong></a>")); ?>

	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['hasSomeAdminAccess'] )): ?>
	<br/>
	<div id="updateCheckLinkContainer">
		<span class='loadingPiwik' style="display:none"><img src='./themes/default/images/loading-blue.gif'/></span>
		<img src="themes/default/images/reload.png"/>
		<a href="#" id="checkForUpdates"><em><?php echo ((is_array($_tmp='CoreHome_CheckForUpdates')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</em></a>
	</div>
	<?php endif; ?>
</span>
</span>