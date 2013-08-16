<?php /* Smarty version 2.6.26, created on 2013-04-24 12:53:41
         compiled from D:%5Cwamp%5Cwww%5Csandbox%5Ccodeigniter%5Cpiwik/plugins/CoreHome/templates/reports_by_dimension.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'D:\\wamp\\www\\sandbox\\codeigniter\\piwik/plugins/CoreHome/templates/reports_by_dimension.tpl', 6, false),)), $this); ?>
<div class="reportsByDimensionView">

<div class="entityList">
<?php $_from = $this->_tpl_vars['dimensionCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dimensionCategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dimensionCategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category'] => $this->_tpl_vars['dimensions']):
        $this->_foreach['dimensionCategories']['iteration']++;
?>
	<div class='dimensionCategory'>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['category'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

		<ul class='listCircle'>
			<?php $_from = $this->_tpl_vars['dimensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['dimension']):
?>
			<li class="reportDimension <?php if ($this->_tpl_vars['idx'] == 0 && ($this->_foreach['dimensionCategories']['iteration']-1) == 0): ?>activeDimension<?php endif; ?>" data-url="<?php echo $this->_tpl_vars['dimension']['url']; ?>
">
				<span class='dimension'><?php echo ((is_array($_tmp=$this->_tpl_vars['dimension']['title'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
			</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
<?php endforeach; endif; unset($_from); ?>
</div>

<div style="float:left;">
	<div class="loadingPiwik" style="display:none">
		<img src="themes/default/images/loading-blue.gif" alt="" /><?php echo ((is_array($_tmp='General_LoadingData')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

	</div>
	
	<div class="dimensionReport"><?php echo $this->_tpl_vars['firstReport']; ?>
</div>
</div>
<div class="clear"></div>

</div>