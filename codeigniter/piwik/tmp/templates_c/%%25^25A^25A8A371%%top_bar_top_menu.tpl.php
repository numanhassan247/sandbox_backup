<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:14
         compiled from CoreHome/templates/top_bar_top_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/top_bar_top_menu.tpl', 7, false),array('modifier', 'strtolower', 'CoreHome/templates/top_bar_top_menu.tpl', 9, false),array('modifier', 'urlRewriteWithParameters', 'CoreHome/templates/top_bar_top_menu.tpl', 9, false),)), $this); ?>
<div id="topLeftBar">
<?php $_from = $this->_tpl_vars['topMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['topMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['topMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['menu']):
        $this->_foreach['topMenu']['iteration']++;
?>

	<?php if (isset ( $this->_tpl_vars['menu']['_html'] )): ?>
		<?php echo $this->_tpl_vars['menu']['_html']; ?>

		<?php elseif ($this->_tpl_vars['menu']['_url']['module'] == $this->_tpl_vars['currentModule'] && ( empty ( $this->_tpl_vars['menu']['_url']['action'] ) || $this->_tpl_vars['menu']['_url']['action'] == $this->_tpl_vars['currentAction'] )): ?>
		<span class="topBarElem"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</b></span> |
		<?php else: ?>
		<span class="topBarElem" <?php if (isset ( $this->_tpl_vars['menu']['_tooltip'] )): ?>title="<?php echo $this->_tpl_vars['menu']['_tooltip']; ?>
"<?php endif; ?>><a id="topmenu-<?php echo ((is_array($_tmp=$this->_tpl_vars['menu']['_url']['module'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
" href="index.php<?php echo smarty_modifier_urlRewriteWithParameters($this->_tpl_vars['menu']['_url']); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></span> |
	<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>
</div>