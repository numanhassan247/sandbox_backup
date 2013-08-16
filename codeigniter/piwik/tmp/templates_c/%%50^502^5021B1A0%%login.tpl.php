<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:07
         compiled from Login/templates/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Login/templates/login.tpl', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Login/templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<section id="login">

<?php if (isset ( $this->_tpl_vars['isValidHost'] ) && isset ( $this->_tpl_vars['invalidHostMessage'] ) && ! $this->_tpl_vars['isValidHost']): ?>
<div id="login_error">
	<strong><?php echo ((is_array($_tmp='General_Warning')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:&nbsp;</strong><?php echo $this->_tpl_vars['invalidHostMessage']; ?>


	<br><br><?php echo $this->_tpl_vars['invalidHostMessageHowToFix']; ?>

	<br/><br/><a style="float:right" href="http://piwik.org/faq/troubleshooting/#faq_171" target="_blank"><?php echo ((is_array($_tmp='General_Help')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <img style='vertical-align: bottom' src="themes/default/images/help_grey.png" /></a><br/>


</div>
<?php else: ?>
<div id="message_container">
	<?php if ($this->_tpl_vars['form_data']['errors']): ?>
	<div id="login_error">	
		<?php $_from = $this->_tpl_vars['form_data']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
			<strong><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong>: <?php echo $this->_tpl_vars['data']; ?>
<br />
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['AccessErrorString']): ?>
	<div id="login_error"><strong><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong>: <?php echo $this->_tpl_vars['AccessErrorString']; ?>
<br /></div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['infoMessage']): ?>
	<p class="message"><?php echo $this->_tpl_vars['infoMessage']; ?>
</p>
	<?php endif; ?>
</div>

<form <?php echo $this->_tpl_vars['form_data']['attributes']; ?>
>
	<h1><?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>
	<fieldset class="inputs">
		<input type="text" name="form_login" id="login_form_login" class="input" value="" size="20" tabindex="10" placeholder="<?php echo ((is_array($_tmp='General_Username')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" autofocus="autofocus" />
		<input type="password" name="form_password" id="login_form_password" class="input" value="" size="20" tabindex="20" placeholder="<?php echo ((is_array($_tmp='Login_Password')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
		<input type="hidden" name="form_nonce" id="login_form_nonce" value="<?php echo $this->_tpl_vars['nonce']; ?>
" />
	</fieldset>

	<fieldset class="actions">
		<input name="form_rememberme" type="checkbox" id="login_form_rememberme" value="1" tabindex="90" <?php if ($this->_tpl_vars['form_data']['form_rememberme']['value']): ?>checked="checked" <?php endif; ?>/>
		<label for="login_form_rememberme"><?php echo ((is_array($_tmp='Login_RememberMe')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</label>
		<input class="submit" id='login_form_submit' type="submit" value="<?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" tabindex="100" />
	</fieldset>
</form>

<form id="reset_form" style="display:none;">
	<fieldset class="inputs">
		<input type="text" name="form_login" id="reset_form_login" class="input" value="" size="20" tabindex="10" placeholder="<?php echo ((is_array($_tmp='Login_LoginOrEmail')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
		<input type="hidden" name="form_nonce" id="reset_form_nonce" value="<?php echo $this->_tpl_vars['nonce']; ?>
" />

		<input type="password" name="form_password" id="reset_form_password" class="input" value="" size="20" tabindex="20" placeholder="<?php echo ((is_array($_tmp='Login_Password')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />

		<input type="password" name="form_password_bis" id="reset_form_password_bis" class="input" value="" size="20" tabindex="30" placeholder="<?php echo ((is_array($_tmp='Login_PasswordRepeat')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
	</fieldset>
	
	<fieldset class="actions">
		<span class="loadingPiwik" style="display:none;"><img alt="Loading" src="themes/default/images/loading-blue.gif" /></span>
		<input class="submit" id='reset_form_submit' type="submit" value="<?php echo ((is_array($_tmp='Login_ChangePassword')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" tabindex="100"/>
	</fieldset>
	
	<input type="hidden" name="module" value="Login"/>
	<input type="hidden" name="action" value="resetPassword"/>
</form>

<p id="nav">
<a id="login_form_nav" href="#" title="<?php echo ((is_array($_tmp='Login_LostYourPassword')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"><?php echo ((is_array($_tmp='Login_LostYourPassword')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
<a id="alternate_reset_nav" href="#" style="display:none;" title="<?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"><?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
<a id="reset_form_nav" href="#" style="display:none;" title="<?php echo ((is_array($_tmp='Mobile_NavigationBack')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"><?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
</p>
<?php if (isset ( $this->_smarty_vars['capture']['poweredByPiwik'] )): ?>
	<p id="piwik">
	<?php echo $this->_smarty_vars['capture']['poweredByPiwik']; ?>

	</p>
<?php endif; ?>

<div id="lost_password_instructions" style="display:none;">
	<p class="message"><?php echo ((is_array($_tmp='Login_ResetPasswordInstructions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
</div>
<?php endif; ?>
</section>
</body>
</html>