<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/header.tpl', 5, false),array('function', 'loadJavascriptTranslations', 'CoreHome/templates/header.tpl', 10, false),)), $this); ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="old-ie"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
<title><?php echo $this->_tpl_vars['siteName']; ?>
 - <?php if (! $this->_tpl_vars['isCustomLogo']): ?>Piwik &rsaquo; <?php endif; ?> <?php echo ((is_array($_tmp='CoreHome_WebAnalyticsReports')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="Piwik - Open Source Web Analytics" />
<meta name="description" content="Web Analytics report for '<?php echo $this->_tpl_vars['siteName']; ?>
' - Piwik" />
<link rel="shortcut icon" href="plugins/CoreHome/templates/images/favicon.ico" /> 
<?php echo smarty_function_loadJavascriptTranslations(array('plugins' => 'CoreHome Annotations'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/js_global_variables.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--[if lt IE 9]>
<script language="javascript" type="text/javascript" src="libs/jqplot/excanvas.min.js"></script>
<![endif]-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/js_css_includes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="themes/default/ieonly.css" />
<![endif]-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/iframe_buster_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (isset ( $this->_tpl_vars['addToHead'] )): ?><?php echo $this->_tpl_vars['addToHead']; ?>
<?php endif; ?>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/iframe_buster_body.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="root">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/index_before_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
