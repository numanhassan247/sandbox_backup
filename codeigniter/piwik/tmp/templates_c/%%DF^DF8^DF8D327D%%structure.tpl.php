<?php /* Smarty version 2.6.26, created on 2013-04-24 12:46:05
         compiled from Installation/templates/structure.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Installation/templates/structure.tpl', 5, false),array('function', 'postEvent', 'Installation/templates/structure.tpl', 42, false),array('function', 'url', 'Installation/templates/structure.tpl', 53, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Piwik &rsaquo; <?php echo ((is_array($_tmp='Installation_Installation')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="themes/default/common.css" />
<link rel="stylesheet" type="text/css" href="libs/jquery/themes/base/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="themes/default/styles.css" />
<link rel="shortcut icon" href="plugins/CoreHome/templates/images/favicon.ico" />
<script type="text/javascript" src="libs/jquery/jquery.js"></script>
<script type="text/javascript" src="libs/jquery/jquery-ui.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready( function(){
	$(\'#toFade\').fadeOut(4000, function(){ $(this).show().css({visibility:\'hidden\'}); } );
	$(\'input:first\').focus();
	$(\'#progressbar\').progressbar({
'; ?>

		value: <?php echo $this->_tpl_vars['percentDone']; ?>

<?php echo '
	});
});
</script>
'; ?>


<link rel="stylesheet" type="text/css" href="plugins/Installation/templates/install.css" />
<?php if (((is_array($_tmp='General_LayoutDirection')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)) == 'rtl'): ?>
<link rel="stylesheet" type="text/css" href="themes/default/rtl.css" />
<?php endif; ?>
</head>
<body>
<div id="main">
	<div id="content">
		<div id="logo">
			<img id="title" width='160' src="themes/default/images/logo.png"/> &nbsp;&nbsp;&nbsp;<span id="subtitle"># <?php echo ((is_array($_tmp='General_OpenSourceWebAnalytics')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
		</div>
		<div style="float:right" id="topRightBar">
		<br />
		<?php echo smarty_function_postEvent(array('name' => 'template_topBar'), $this);?>

		</div>
		<div class="both"></div>

		<div id="generalInstall">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Installation/templates/allSteps.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		
		<div id="detailInstall">
			<?php if (isset ( $this->_tpl_vars['showNextStepAtTop'] ) && $this->_tpl_vars['showNextStepAtTop']): ?>
				<p class="nextStep">
					<a class="submit" href="<?php echo smarty_function_url(array('action' => $this->_tpl_vars['nextModuleName']), $this);?>
"><?php echo ((is_array($_tmp='General_Next')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &raquo;</a>
				</p>
			<?php endif; ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['subTemplateToLoad']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php if ($this->_tpl_vars['showNextStep']): ?>
				<p class="nextStep">
					<a class="submit" href="<?php echo smarty_function_url(array('action' => $this->_tpl_vars['nextModuleName']), $this);?>
"><?php echo ((is_array($_tmp='General_Next')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &raquo;</a>
				</p>
			<?php endif; ?>
		</div>
		
		<div class="both"></div>
		
		<br />
		<br />
		<h3><?php echo ((is_array($_tmp='Installation_InstallationStatus')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
		
		<div id="progressbar"></div>
		<?php echo ((is_array($_tmp='Installation_PercentDone')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['percentDone']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['percentDone'])); ?>
 
	</div>
</div>
</body>
</html>