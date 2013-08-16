<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:24
         compiled from Dashboard/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'loadJavascriptTranslations', 'Dashboard/templates/index.tpl', 1, false),array('modifier', 'translate', 'Dashboard/templates/index.tpl', 14, false),)), $this); ?>
<?php echo smarty_function_loadJavascriptTranslations(array('plugins' => 'CoreHome Dashboard'), $this);?>


<?php echo '
<script type="text/javascript">
widgetsHelper.availableWidgets = '; ?>
<?php echo $this->_tpl_vars['availableWidgets']; ?>
<?php echo ';
$(document).ready(function() {
    initDashboard('; ?>
<?php echo $this->_tpl_vars['dashboardId']; ?>
,<?php echo $this->_tpl_vars['dashboardLayout']; ?>
<?php echo ');
});
</script>
'; ?>

<div id="dashboard">
 
    <div class="ui-confirm" id="confirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_DeleteWidgetConfirm')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Yes')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="no" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div class="ui-confirm" id="setAsDefaultWidgetsConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_SetAsDefaultWidgetsConfirm')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <?php ob_start(); ?><?php echo ((is_array($_tmp='Dashboard_ResetDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('resetDashboard', ob_get_contents());ob_end_clean(); ?>
        <div class="popoverSubMessage"><?php echo ((is_array($_tmp='Dashboard_SetAsDefaultWidgetsConfirmHelp')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['resetDashboard']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['resetDashboard'])); ?>
</div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Yes')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="no" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div class="ui-confirm" id="resetDashboardConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_ResetDashboardConfirm')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Yes')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="no" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div> 

    <div class="ui-confirm" id="dashboardEmptyNotification">
        <h2><?php echo ((is_array($_tmp='Dashboard_DashboardEmptyNotification')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <input role="addWidget" type="button" value="<?php echo ((is_array($_tmp='Dashboard_AddAWidget')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="resetDashboard" type="button" value="<?php echo ((is_array($_tmp='Dashboard_ResetDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div class="ui-confirm" id="changeDashboardLayout">
        <h2><?php echo ((is_array($_tmp='Dashboard_SelectDashboardLayout')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <div id="columnPreview">
        <?php $_from = $this->_tpl_vars['availableLayouts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['layout']):
?>
            <div>
            <?php $_from = $this->_tpl_vars['layout']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column']):
?>
                 <div class="width-<?php echo $this->_tpl_vars['column']; ?>
"><span></span></div>
            <?php endforeach; endif; unset($_from); ?>
            </div>
        <?php endforeach; endif; unset($_from); ?>
        </div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Save')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div class="ui-confirm" id="renameDashboardConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_RenameDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <div id="newDashboardNameInput"><label for="newDashboardName"><?php echo ((is_array($_tmp='Dashboard_DashboardName')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </label><input type="input" name="newDashboardName" id="newDashboardName" value=""/></div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Save')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="cancel" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <?php if ($this->_tpl_vars['isSuperUser']): ?>
    <div class="ui-confirm" id="copyDashboardToUserConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_CopyDashboardToUser')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <div class="inputs"><label for="copyDashboardName"><?php echo ((is_array($_tmp='Dashboard_DashboardName')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </label><input type="input" name="copyDashboardName" id="copyDashboardName" value=""/>
        <label for="copyDashboardUser"><?php echo ((is_array($_tmp='General_Username')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 </label>
        <select name="copyDashboardUser" id="copyDashboardUser">
        </select></div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Ok')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="cancel" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>
    <?php endif; ?>

    <div class="ui-confirm" id="createDashboardConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_CreateNewDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
        <div id="createDashboardNameInput">
            <label><?php echo ((is_array($_tmp='Dashboard_DashboardName')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <input type="input" name="newDashboardName" id="createDashboardName" value=""/></label><br />
            <label><input type="radio" checked="checked" name="type" value="default" id="dashboard_type_default"><?php echo ((is_array($_tmp='Dashboard_DefaultDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</label><br />
            <label><input type="radio" name="type" value="empty" id="dashboard_type_empty"><?php echo ((is_array($_tmp='Dashboard_EmptyDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</label>
        </div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Yes')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="no" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div class="ui-confirm" id="removeDashboardConfirm">
        <h2><?php echo ((is_array($_tmp='Dashboard_RemoveDashboardConfirm')) ? $this->_run_mod_handler('translate', true, $_tmp, '<span></span>') : smarty_modifier_translate($_tmp, '<span></span>')); ?>
</h2>
        <div class="popoverSubMessage"><?php echo ((is_array($_tmp='Dashboard_NotUndo')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['resetDashboard']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['resetDashboard'])); ?>
</div>
        <input role="yes" type="button" value="<?php echo ((is_array($_tmp='General_Yes')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
        <input role="no" type="button" value="<?php echo ((is_array($_tmp='General_Cancel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
    </div>

    <div id="dashboardSettings">
        <span><?php echo ((is_array($_tmp='Dashboard_WidgetsAndDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>
        <ul class="submenu">
            <li>
                <div id="addWidget"><?php echo ((is_array($_tmp='Dashboard_AddAWidget')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &darr;</div>
                <ul class="widgetpreview-categorylist"></ul>
            </li>
            <li>
                <div id="manageDashboard"><?php echo ((is_array($_tmp='Dashboard_ManageDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &darr;</div>
                <ul>
                    <li onclick="resetDashboard();"><?php echo ((is_array($_tmp='Dashboard_ResetDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <li onclick="showChangeDashboardLayoutDialog();"><?php echo ((is_array($_tmp='Dashboard_ChangeDashboardLayout')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <?php if (( $this->_tpl_vars['userLogin'] && 'anonymous' != $this->_tpl_vars['userLogin'] )): ?>
                    <li onclick="renameDashboard();"><?php echo ((is_array($_tmp='Dashboard_RenameDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <li onclick="removeDashboard();" id="removeDashboardLink"><?php echo ((is_array($_tmp='Dashboard_RemoveDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <?php if (( $this->_tpl_vars['isSuperUser'] )): ?>
                    <li onclick="setAsDefaultWidgets();"><?php echo ((is_array($_tmp='Dashboard_SetAsDefaultWidgets')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <li onclick="copyDashboardToUser();"><?php echo ((is_array($_tmp='Dashboard_CopyDashboardToUser')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
            <?php if (( $this->_tpl_vars['userLogin'] && 'anonymous' != $this->_tpl_vars['userLogin'] )): ?>
            <li onclick="createDashboard();"><?php echo ((is_array($_tmp='Dashboard_CreateNewDashboard')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</li>
            <?php endif; ?>
        </ul>
        <ul class="widgetpreview-widgetlist"></ul>
        <div class="widgetpreview-preview"></div>
    </div>
    
    <div class="clear"></div>
    
    <div id="dashboardWidgetsArea"></div>
</div>