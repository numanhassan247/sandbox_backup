<?php /* Smarty version 2.6.26, created on 2013-04-24 12:46:05
         compiled from LanguagesManager/templates/languages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'LanguagesManager/templates/languages.tpl', 5, false),)), $this); ?>
<span class="topBarElem" style="padding-right:70px">
	<span id="languageSelection" style="position:absolute">
		<form action="index.php?module=LanguagesManager&amp;action=saveLanguage" method="post">
		<select name="language" id="language">
			<option title="" value="" href="?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/translations/"><?php echo ((is_array($_tmp='LanguagesManager_AboutPiwikTranslations')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
			<?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['language']):
?>
			<option value="<?php echo $this->_tpl_vars['language']['code']; ?>
" <?php if ($this->_tpl_vars['language']['code'] == $this->_tpl_vars['currentLanguageCode']): ?>selected="selected"<?php endif; ?> title="<?php echo $this->_tpl_vars['language']['name']; ?>
 (<?php echo $this->_tpl_vars['language']['english_name']; ?>
)"><?php echo $this->_tpl_vars['language']['name']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
				<?php if (! empty ( $this->_tpl_vars['token_auth'] )): ?><input type="hidden" name="token_auth" value="<?php echo $this->_tpl_vars['token_auth']; ?>
"/><?php endif; ?>
		<input type="submit" value="go" />
		</form>
	</span>
	
	<script type="text/javascript">
	piwik.languageName = "<?php echo $this->_tpl_vars['currentLanguageName']; ?>
";
	</script>
</span>