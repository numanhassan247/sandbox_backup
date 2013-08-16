<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:07
         compiled from Login/templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Login/templates/header.tpl', 5, false),array('modifier', 'escape', 'Login/templates/header.tpl', 9, false),)), $this); ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="old-ie"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
	<title><?php if (! $this->_tpl_vars['isCustomLogo']): ?>Piwik &rsaquo; <?php endif; ?><?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="plugins/CoreHome/templates/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="plugins/Login/templates/login.css" />
	<meta name="description" content="<?php echo ((is_array($_tmp=((is_array($_tmp='General_OpenSourceWebAnalytics')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/html5shiv.js"></script>
	<![endif]-->
	<script type="text/javascript" src="libs/jquery/jquery.js"></script>
	<script type="text/javascript" src="libs/jquery/jquery.placeholder.js"></script>
<?php if (isset ( $this->_tpl_vars['forceSslLogin'] ) && $this->_tpl_vars['forceSslLogin']): ?>
<?php echo '
	<script type="text/javascript">
		if(window.location.protocol !== \'https:\') {
			var url = window.location.toString();
			url = url.replace(/^http:/, \'https:\');
			window.location.replace(url);
		}
	</script>
'; ?>

<?php endif; ?>
<?php echo '
	<script type="text/javascript">
		$(function() {
			$(\'#form_login\').focus();
			$(\'input\').placeholder();
		});
	</script>
'; ?>

	<script type="text/javascript" src="plugins/Login/templates/login.js"></script>
<?php if (((is_array($_tmp='General_LayoutDirection')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)) == 'rtl'): ?>
<link rel="stylesheet" type="text/css" href="themes/default/rtl.css" />
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/iframe_buster_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body class="login">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/iframe_buster_body.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="logo">
	<?php if (! $this->_tpl_vars['isCustomLogo']): ?><a href="http://piwik.org" title="<?php echo $this->_tpl_vars['linkTitle']; ?>
"><?php endif; ?>
		<?php if ($this->_tpl_vars['hasSVGLogo']): ?>
		<img src='<?php echo $this->_tpl_vars['logoSVG']; ?>
' title="<?php echo $this->_tpl_vars['linkTitle']; ?>
" alt="Piwik" width="240" style='margin-right: 20px' class="ie-hide" />
		<!--[if lt IE 9]>
		<?php endif; ?>
		<img src='<?php echo $this->_tpl_vars['logoLarge']; ?>
' title="<?php echo $this->_tpl_vars['linkTitle']; ?>
" alt="Piwik" width="240" style='margin-right:20px' />
		<?php if ($this->_tpl_vars['hasSVGLogo']): ?><![endif]--><?php endif; ?>
		<?php if ($this->_tpl_vars['isCustomLogo']): ?>
			<?php ob_start(); ?>
			<i><a href="http://piwik.org/" target="_blank"><?php echo $this->_tpl_vars['linkTitle']; ?>
</a></i>
			<?php $this->_smarty_vars['capture']['poweredByPiwik'] = ob_get_contents(); ob_end_clean(); ?>
		<?php endif; ?>
	<?php if (! $this->_tpl_vars['isCustomLogo']): ?></a>
		<div class="description"><a href="http://piwik.org" title="<?php echo $this->_tpl_vars['linkTitle']; ?>
"><?php echo $this->_tpl_vars['linkTitle']; ?>
</a>
			<div class="arrow"> </div>
		</div>
	<?php endif; ?>
	</div>