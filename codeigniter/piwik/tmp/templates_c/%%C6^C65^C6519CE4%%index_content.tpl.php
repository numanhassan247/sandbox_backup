<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/index_content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajaxRequestErrorDiv', 'CoreHome/templates/index_content.tpl', 8, false),array('function', 'ajaxLoadingDiv', 'CoreHome/templates/index_content.tpl', 11, false),)), $this); ?>

<div class="page">
	<div class="pageWrap">
		<div class="nav_sep"></div>
		<div class="top_controls">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/period_select.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/header_message.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <?php echo smarty_function_ajaxRequestErrorDiv(array(), $this);?>

		</div>

		<?php echo smarty_function_ajaxLoadingDiv(array(), $this);?>


		<div id="content" class="home">
		<?php if ($this->_tpl_vars['content']): ?><?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>

<br/><br/>