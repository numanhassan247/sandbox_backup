<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:33
         compiled from Annotations/templates/evolutionAnnotations.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Annotations/templates/evolutionAnnotations.tpl', 6, false),)), $this); ?>
<div class="evolution-annotations">
<?php $_from = $this->_tpl_vars['annotationCounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dateCountPair']):
?>
	<?php $this->assign('date', $this->_tpl_vars['dateCountPair'][0]); ?>
	<?php $this->assign('counts', $this->_tpl_vars['dateCountPair'][1]); ?>
	<span data-date="<?php echo $this->_tpl_vars['date']; ?>
" data-count="<?php echo $this->_tpl_vars['counts']['count']; ?>
" data-starred="<?php echo $this->_tpl_vars['counts']['starred']; ?>
"
		<?php if ($this->_tpl_vars['counts']['count'] == 0): ?>title="<?php echo ((is_array($_tmp='Annotations_AddAnnotationsFor_js')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['date']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['date'])); ?>
"
		<?php elseif ($this->_tpl_vars['counts']['count'] == 1): ?>title="<?php echo ((is_array($_tmp='Annotations_AnnotationOnDate')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['date'], $this->_tpl_vars['counts']['note']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['date'], $this->_tpl_vars['counts']['note'])); ?>


<?php echo ((is_array($_tmp='Annotations_ClickToEditOrAdd')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"
		<?php else: ?>title="<?php echo ((is_array($_tmp='Annotations_ViewAndAddAnnotations_js')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['date']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['date'])); ?>
"
		<?php endif; ?>>
		<img src="themes/default/images/<?php if ($this->_tpl_vars['counts']['starred'] > 0): ?>yellow_marker.png<?php else: ?>grey_marker.png<?php endif; ?>" width="16" height="16"/>
	</span>
<?php endforeach; endif; unset($_from); ?>
</div>