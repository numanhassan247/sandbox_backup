<?php /* Smarty version 2.6.26, created on 2013-04-24 12:46:12
         compiled from Installation/templates/systemCheckSection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Installation/templates/systemCheckSection.tpl', 8, false),array('modifier', 'nl2br', 'Installation/templates/systemCheckSection.tpl', 33, false),)), $this); ?>
<?php $this->assign('ok', "<img src='themes/default/images/ok.png' />"); ?>
<?php $this->assign('error', "<img src='themes/default/images/error.png' />"); ?>
<?php $this->assign('warning', "<img src='themes/default/images/warning.png' />"); ?>
<?php $this->assign('link', "<img src='themes/default/images/link.gif' />"); ?>

<table class="infosServer" id="systemCheckRequired">
	<tr>
		<?php ob_start(); ?><?php echo ((is_array($_tmp='Installation_SystemCheckPhp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &gt; <?php echo $this->_tpl_vars['infos']['phpVersion_minimum']; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('MinPHP', ob_get_contents());ob_end_clean(); ?>
		<td class="label"><?php echo $this->_tpl_vars['MinPHP']; ?>
</td>

		<td><?php if ($this->_tpl_vars['infos']['phpVersion_ok']): ?><?php echo $this->_tpl_vars['ok']; ?>

		<?php else: ?><?php echo $this->_tpl_vars['error']; ?>
 <span class="err"><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
: <?php echo ((is_array($_tmp='General_Required')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['MinPHP']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['MinPHP'])); ?>
</span><?php endif; ?></td>
	</tr>
	<tr>
		<td class="label">PDO <?php echo ((is_array($_tmp='Installation_Extension')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td><?php if ($this->_tpl_vars['infos']['pdo_ok']): ?><?php echo $this->_tpl_vars['ok']; ?>

			<?php else: ?>-<?php endif; ?>
		</td>
	</tr>
	<?php $_from = $this->_tpl_vars['infos']['adapters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adapter'] => $this->_tpl_vars['port']):
?>
	<tr>
		<td class="label"><?php echo $this->_tpl_vars['adapter']; ?>
 <?php echo ((is_array($_tmp='Installation_Extension')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td><?php echo $this->_tpl_vars['ok']; ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php if (! count ( $this->_tpl_vars['infos']['adapters'] )): ?>
	<tr>
		<td colspan="2" class="error">
			<small>
				<?php echo ((is_array($_tmp='Installation_SystemCheckDatabaseHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

				<p>
				<?php if ($this->_tpl_vars['infos']['isWindows']): ?>
					<?php echo ((is_array($_tmp=((is_array($_tmp='Installation_SystemCheckWinPdoAndMysqliHelp')) ? $this->_run_mod_handler('translate', true, $_tmp, "<br /><br /><code>extension=php_mysqli.dll</code><br /><code>extension=php_pdo.dll</code><br /><code>extension=php_pdo_mysql.dll</code><br />") : smarty_modifier_translate($_tmp, "<br /><br /><code>extension=php_mysqli.dll</code><br /><code>extension=php_pdo.dll</code><br /><code>extension=php_pdo_mysql.dll</code><br />")))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

				<?php else: ?>
					<?php echo ((is_array($_tmp='Installation_SystemCheckPdoAndMysqliHelp')) ? $this->_run_mod_handler('translate', true, $_tmp, "<br /><br /><code>--with-mysqli</code><br /><code>--with-pdo-mysql</code><br /><br />", "<br /><br /><code>extension=mysqli.so</code><br /><code>extension=pdo.so</code><br /><code>extension=pdo_mysql.so</code><br />") : smarty_modifier_translate($_tmp, "<br /><br /><code>--with-mysqli</code><br /><code>--with-pdo-mysql</code><br /><br />", "<br /><br /><code>extension=mysqli.so</code><br /><code>extension=pdo.so</code><br /><code>extension=pdo_mysql.so</code><br />")); ?>

				<?php endif; ?>
				<?php echo ((is_array($_tmp='Installation_RestartWebServer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

				<br />
				<br />
				<?php echo ((is_array($_tmp='Installation_SystemCheckPhpPdoAndMysqliSite')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

				</p>
			</small>
		</td>
	</tr>
	<?php endif; ?>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckExtensions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td><?php $_from = $this->_tpl_vars['infos']['needed_extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['needed_extension']):
?>
				<?php if (in_array ( $this->_tpl_vars['needed_extension'] , $this->_tpl_vars['infos']['missing_extensions'] )): ?>
					<?php echo $this->_tpl_vars['error']; ?>

					<?php ob_start(); ?>1<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('hasError', ob_get_contents());ob_end_clean(); ?>
				<?php else: ?>
					<?php echo $this->_tpl_vars['ok']; ?>

				<?php endif; ?>
				<?php echo $this->_tpl_vars['needed_extension']; ?>

				<br />
			<?php endforeach; endif; unset($_from); ?>
			<br/><?php if (isset ( $this->_tpl_vars['hasError'] )): ?><?php echo ((is_array($_tmp='Installation_RestartWebServer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php endif; ?>
		</td>
	</tr>
	<?php if (count ( $this->_tpl_vars['infos']['missing_extensions'] ) > 0): ?>
	<tr>
		<td colspan="2" class="error">
			<small>
				<?php $_from = $this->_tpl_vars['infos']['missing_extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['missing_extension']):
?>
					<p>
					<i><?php echo ((is_array($_tmp=$this->_tpl_vars['helpMessages'][$this->_tpl_vars['missing_extension']])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</i>
					</p>
				<?php endforeach; endif; unset($_from); ?>
			</small>
		</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckFunctions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		
		<td><?php $_from = $this->_tpl_vars['infos']['needed_functions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['needed_function']):
?>
				<?php if (in_array ( $this->_tpl_vars['needed_function'] , $this->_tpl_vars['infos']['missing_functions'] )): ?>
					<?php echo $this->_tpl_vars['error']; ?>
 <span class='err'><?php echo $this->_tpl_vars['needed_function']; ?>
</span>
					<?php ob_start(); ?>1<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('hasError', ob_get_contents());ob_end_clean(); ?>
					<p>
					<i><?php echo ((is_array($_tmp=$this->_tpl_vars['helpMessages'][$this->_tpl_vars['needed_function']])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</i>
					</p>
				<?php else: ?>
					<?php echo $this->_tpl_vars['ok']; ?>
 <?php echo $this->_tpl_vars['needed_function']; ?>
<br />
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<br/><?php if (isset ( $this->_tpl_vars['hasError'] )): ?><?php echo ((is_array($_tmp='Installation_RestartWebServer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<?php echo ((is_array($_tmp='Installation_SystemCheckWriteDirs')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

		</td>
		<td>
			<small>
				<?php $_from = $this->_tpl_vars['infos']['directories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir'] => $this->_tpl_vars['bool']):
?>
					<?php if ($this->_tpl_vars['bool']): ?><?php echo $this->_tpl_vars['ok']; ?>
<?php else: ?>
					<span style="color:red"><?php echo $this->_tpl_vars['error']; ?>
</span><?php endif; ?> 
					<?php echo $this->_tpl_vars['dir']; ?>

					<br />				
				<?php endforeach; endif; unset($_from); ?>
			</small>
		</td>
	</tr>
	<?php if ($this->_tpl_vars['problemWithSomeDirectories']): ?>
	<tr>
		<td colspan="2" class="error">
			<?php echo ((is_array($_tmp='Installation_SystemCheckWriteDirsHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:
			<?php $_from = $this->_tpl_vars['infos']['directories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir'] => $this->_tpl_vars['bool']):
?>
				<ul><?php if (! $this->_tpl_vars['bool']): ?>
						<li><pre>chmod a+w <?php echo $this->_tpl_vars['dir']; ?>
</pre></li>
					<?php endif; ?>
				</ul>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<?php endif; ?>
</table>
<br />
	
<h2><?php echo ((is_array($_tmp='Optional')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<table class="infos" id="systemCheckOptional">
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckFileIntegrity')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
		<?php if (empty ( $this->_tpl_vars['infos']['integrityErrorMessages'] )): ?>
			<?php echo $this->_tpl_vars['ok']; ?>

		<?php else: ?>
			<?php if ($this->_tpl_vars['infos']['integrity']): ?>
				<?php echo $this->_tpl_vars['warning']; ?>
 <i><?php echo $this->_tpl_vars['infos']['integrityErrorMessages'][0]; ?>
</i>
			<?php else: ?>
				<?php echo $this->_tpl_vars['error']; ?>
 <i><?php echo $this->_tpl_vars['infos']['integrityErrorMessages'][0]; ?>
</i>
			<?php endif; ?>
			<?php if (count ( $this->_tpl_vars['infos']['integrityErrorMessages'] ) > 1): ?>
				<button id="more-results" class="ui-button ui-state-default ui-corner-all"><?php echo ((is_array($_tmp='General_Details')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</button>
			<?php endif; ?>
		<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckTracker')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['tracker_status'] == 0): ?>
				<?php echo $this->_tpl_vars['ok']; ?>

			<?php else: ?>
				<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo $this->_tpl_vars['infos']['tracker_status']; ?>

				<br /><?php echo ((is_array($_tmp='Installation_SystemCheckTrackerHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </span>
				<br/><?php echo ((is_array($_tmp='Installation_RestartWebServer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<?php endif; ?>	
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckMemoryLimit')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['memory_ok']): ?>
				<?php echo $this->_tpl_vars['ok']; ?>
 <?php echo $this->_tpl_vars['infos']['memoryCurrent']; ?>

			<?php else: ?>
				<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo $this->_tpl_vars['infos']['memoryCurrent']; ?>
</span>
				<br /><?php echo ((is_array($_tmp='Installation_SystemCheckMemoryLimitHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 
				<?php echo ((is_array($_tmp='Installation_RestartWebServer')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<?php endif; ?>	
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='SitesManager_Timezone')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['timezone']): ?><?php echo $this->_tpl_vars['ok']; ?>

			<?php else: ?><?php echo $this->_tpl_vars['warning']; ?>
 
			<span class="warn"><?php echo ((is_array($_tmp='SitesManager_AdvancedTimezoneSupportNotFound')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </span>
			<br/><a href="http://php.net/manual/en/datetime.installation.php" target="_blank">Timezone PHP documentation</a>.
			<?php endif; ?>	
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckOpenURL')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['openurl']): ?><?php echo $this->_tpl_vars['ok']; ?>
 <?php echo $this->_tpl_vars['infos']['openurl']; ?>

			<?php else: ?><?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_SystemCheckOpenURLHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
			<?php endif; ?>
			<?php if (! $this->_tpl_vars['infos']['can_auto_update']): ?>
				<br /><?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_SystemCheckAutoUpdateHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span><?php endif; ?>	
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckGD')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['gd_ok']): ?><?php echo $this->_tpl_vars['ok']; ?>

			<?php else: ?><?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_SystemCheckGD')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 
			<br /> <?php echo ((is_array($_tmp='Installation_SystemCheckGDHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </span><?php endif; ?>
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckMbstring')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['infos']['hasMbstring']): ?>
				<?php if ($this->_tpl_vars['infos']['multibyte_ok']): ?><?php echo $this->_tpl_vars['ok']; ?>

				<?php else: ?>
					<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_SystemCheckMbstring')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

					<br/> <?php echo ((is_array($_tmp='Installation_SystemCheckMbstringFuncOverloadHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
				<?php endif; ?>
			<?php else: ?>
				<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_SystemCheckMbstringExtensionHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp='Installation_SystemCheckMbstringExtensionGeoIpHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckOtherExtensions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td><?php $_from = $this->_tpl_vars['infos']['desired_extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['desired_extension']):
?>
				<?php if (in_array ( $this->_tpl_vars['desired_extension'] , $this->_tpl_vars['infos']['missing_desired_extensions'] )): ?>
					<?php echo $this->_tpl_vars['warning']; ?>
<span class="warn"><?php echo $this->_tpl_vars['desired_extension']; ?>
</span>
					<p><?php echo ((is_array($_tmp=$this->_tpl_vars['helpMessages'][$this->_tpl_vars['desired_extension']])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
				<?php else: ?>
					<?php echo $this->_tpl_vars['ok']; ?>
 <?php echo $this->_tpl_vars['desired_extension']; ?>
<br />
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckOtherFunctions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td><?php $_from = $this->_tpl_vars['infos']['desired_functions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['desired_function']):
?>
				<?php if (in_array ( $this->_tpl_vars['desired_function'] , $this->_tpl_vars['infos']['missing_desired_functions'] )): ?>
					<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo $this->_tpl_vars['desired_function']; ?>
</span>
					<p><?php echo ((is_array($_tmp=$this->_tpl_vars['helpMessages'][$this->_tpl_vars['desired_function']])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
				<?php else: ?>
					<?php echo $this->_tpl_vars['ok']; ?>
 <?php echo $this->_tpl_vars['desired_function']; ?>
<br />
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<?php if (isset ( $this->_tpl_vars['infos']['general_infos']['assume_secure_protocol'] )): ?>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_SystemCheckSecureProtocol')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
			<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo $this->_tpl_vars['infos']['protocol']; ?>
 </span><br/>
			<?php echo ((is_array($_tmp='Installation_SystemCheckSecureProtocolHelp')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<br /><br />
			<code>[General]<br/>
assume_secure_protocol = 1</code><br />
		</td>
	</tr>
	<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['infos']['extra']['load_data_infile_available'] )): ?>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_DatabaseAbilities')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
		<?php if ($this->_tpl_vars['infos']['extra']['load_data_infile_available']): ?>
			<?php echo $this->_tpl_vars['ok']; ?>
 LOAD DATA INFILE<br/>
		<?php else: ?>
			<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn">LOAD DATA INFILE</span><br/><br/>
			<p><?php echo ((is_array($_tmp='Installation_LoadDataInfileUnavailableHelp')) ? $this->_run_mod_handler('translate', true, $_tmp, 'LOAD DATA INFILE', 'FILE') : smarty_modifier_translate($_tmp, 'LOAD DATA INFILE', 'FILE')); ?>
</p>
			<p><?php echo ((is_array($_tmp='Installation_LoadDataInfileRecommended')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
			<?php if (isset ( $this->_tpl_vars['infos']['extra']['load_data_infile_error'] )): ?>
				<em><strong><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:</strong></em> <?php echo $this->_tpl_vars['infos']['extra']['load_data_infile_error']; ?>

			<?php endif; ?>
		<?php endif; ?>
		</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td class="label"><?php echo ((is_array($_tmp='Installation_Filesystem')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td>
		<?php if (! $this->_tpl_vars['infos']['is_nfs']): ?>
			<?php echo $this->_tpl_vars['ok']; ?>
 <?php echo ((is_array($_tmp='General_Ok')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<br/>
		<?php else: ?>
			<?php echo $this->_tpl_vars['warning']; ?>
 <span class="warn"><?php echo ((is_array($_tmp='Installation_NfsFilesystemWarning')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
			<?php if (! empty ( $this->_tpl_vars['duringInstall'] )): ?>
				<p><?php echo ((is_array($_tmp='Installation_NfsFilesystemWarningSuffixInstall')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
			<?php else: ?>
				<p><?php echo ((is_array($_tmp='Installation_NfsFilesystemWarningSuffixAdmin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
			<?php endif; ?>
		<?php endif; ?>
		</td>
	</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Installation/templates/integrityDetails.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
