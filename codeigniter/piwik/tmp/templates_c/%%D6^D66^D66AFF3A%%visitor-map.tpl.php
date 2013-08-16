<?php /* Smarty version 2.6.26, created on 2013-04-24 12:51:29
         compiled from UserCountryMap/templates/visitor-map.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'UserCountryMap/templates/visitor-map.tpl', 15, false),array('modifier', 'escape', 'UserCountryMap/templates/visitor-map.tpl', 74, false),)), $this); ?>
<div class="UserCountryMap" style="position:relative; overflow:hidden;">
    <div class="UserCountryMap_container">
        <div class="UserCountryMap_map" style="overflow:hidden"></div>
        <div class="UserCountryMap-overlay UserCountryMap-title">
            <div class="content">
                <!--<div class="map-title" style="font-weight:bold; color:#9A9386;"></div>-->
                <div class="map-stats" style="color:#565656;"><b></b> </div>
            </div>
        </div>
        <div class="UserCountryMap-overlay UserCountryMap-legend">
            <div class="content">
            </div>
        </div>
        <div class="UserCountryMap-tooltip UserCountryMap-info">
            <div foo="bar" class="content unlocated-stats" data-tpl="<?php echo ((is_array($_tmp='UserCountryMap_Unlocated')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" >
            </div>
        </div>
        <div class="UserCountryMap-info-btn" data-tooltip-target=".UserCountryMap-tooltip"></div>
    </div>
    <div class="mapWidgetStatus">
        <?php if ($this->_tpl_vars['noData']): ?>
        <div class="pk-emptyDataTable"><?php echo ((is_array($_tmp='CoreHome_ThereIsNoDataForThisReport')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</div>
        <?php else: ?>
        <span class="loadingPiwik">
            <img src="<?php echo $this->_tpl_vars['piwikUrl']; ?>
themes/default/images/loading-blue.gif"> <?php echo ((is_array($_tmp='General_LoadingData')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
...
        </span>
        <?php endif; ?>
    </div>
    <div class="dataTableFeatures" style="padding-top:0px;">
        <div class="dataTableFooterIcons">
            <div class="dataTableFooterWrap" var="graphVerticalBar">
                <img class="UserCountryMap-activeItem dataTableFooterActiveItem" src="<?php echo $this->_tpl_vars['piwikUrl']; ?>
themes/default/images/data_table_footer_active_item.png" style="left: 25px;">

                <div class="tableIconsGroup">
                    <span class="tableAllColumnsSwitch">
                        <a class="UserCountryMap-btn-zoom tableIcon" format="table"><img src="<?php echo $this->_tpl_vars['piwikUrl']; ?>
plugins/UserCountryMap/img/zoom-out.png" title="Zoom to world"></a>
                    </span>
                </div>
                <div class="tableIconsGroup UserCountryMap-view-mode-buttons">
                    <span class="tableAllColumnsSwitch">
                        <a var="tableAllColumns" class="UserCountryMap-btn-region tableIcon activeIcon" format="tableAllColumns" data-region="<?php echo ((is_array($_tmp='UserCountryMap_Regions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" data-country="<?php echo ((is_array($_tmp='UserCountryMap_Countries')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['piwikUrl']; ?>
plugins/UserCountryMap/img/regions.png" title="Show vistors per region/country"> <span style="margin:0"><?php echo ((is_array($_tmp='UserCountryMap_Countries')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>&nbsp;</a>
                        <a var="tableGoals" class="UserCountryMap-btn-city tableIcon inactiveIco" format="tableGoals"><img src="<?php echo $this->_tpl_vars['piwikUrl']; ?>
plugins/UserCountryMap/img/cities.png" title="Show visitors per city"> <span style="margin:0"><?php echo ((is_array($_tmp='UserCountryMap_Cities')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</span>&nbsp;</a>
                    </span>
                </div>

            </div>

           <select class="userCountryMapSelectMetrics" style="float:right;margin-right:0;margin-bottom:5px;max-width: 9em;font-size:10px">
                <?php $_from = $this->_tpl_vars['metrics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metric']):
?>
                    <option value="<?php echo $this->_tpl_vars['metric'][0]; ?>
" <?php if ($this->_tpl_vars['metric'][0] == $this->_tpl_vars['defaultMetric']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['metric'][1]; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <select class="userCountryMapSelectCountry" style="float:right;margin-right:5px;margin-bottom:5px; max-width: 9em;font-size:10px">
                <option value="world"><?php echo ((is_array($_tmp='UserCountryMap_WorldWide')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option disabled="disabled">––––––</option>
                <option value="AF"><?php echo ((is_array($_tmp='UserCountry_continent_afr')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option value="AS"><?php echo ((is_array($_tmp='UserCountry_continent_asi')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option value="EU"><?php echo ((is_array($_tmp='UserCountry_continent_eur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option value="NA"><?php echo ((is_array($_tmp='UserCountry_continent_amn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option value="OC"><?php echo ((is_array($_tmp='UserCountry_continent_oce')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option value="SA"><?php echo ((is_array($_tmp='UserCountry_continent_ams')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</option>
                <option disabled="disabled">––––––</option>
            </select>
        </div>
    </div>
</div>

<?php if (! $this->_tpl_vars['noData']): ?>

<!-- configure some piwik vars -->
<script type="text/javascript">

    var visitorMap,
        config = JSON.parse('<?php echo ((is_array($_tmp=$this->_tpl_vars['config'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
    config._ = JSON.parse('<?php echo ((is_array($_tmp=$this->_tpl_vars['localeJSON'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
    config.reqParams = JSON.parse('<?php echo ((is_array($_tmp=$this->_tpl_vars['reqParamsJSON'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');

    $('.UserCountryMap').addClass('dataTable');


<?php echo '
    if ($(\'#dashboardWidgetsArea\').length) {
        // dashboard mode
        var $widgetContent = $(\'.UserCountryMap\').parents(\'.widgetContent\');

        $widgetContent.on(\'widget:create\', function(evt, widget) {
            visitorMap = new UserCountryMap.VisitorMap(config, widget);
        }).on(\'widget:maximise\', function(evt) {
            visitorMap.resize();
        }).on(\'widget:minimise\', function(evt) {
            visitorMap.resize();
        }).on(\'widget:destroy\', function(evt) {
            visitorMap.destroy();
        });
    } else {
        // stand-alone mode
        visitorMap = new UserCountryMap.VisitorMap(config);
    }
'; ?>


</script>
<?php endif; ?>