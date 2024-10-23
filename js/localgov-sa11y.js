(function sa11yScript(Drupal, drupalSettings) {
  Drupal.behaviors.sa11y = {
    attach: function (context, settings) {

      const checkRootSetting = (drupalSettings.localgov_sa11y_options.checkRoot) ? drupalSettings.localgov_sa11y_options.checkRoot : 'div.dialog-off-canvas-main-canvas';
      const containerIgnoreSetting = (drupalSettings.localgov_sa11y_options.containerIgnore) ? drupalSettings.localgov_sa11y_options.containerIgnore.replace(/\n/g, ",") : '';
      const contrastIgnoreSetting = (drupalSettings.localgov_sa11y_options.contrastIgnore) ? drupalSettings.localgov_sa11y_options.contrastIgnore.replace(/\n/g, ",") : '';
      const linkIgnoreSetting = (drupalSettings.localgov_sa11y_options.linkIgnore) ? drupalSettings.localgov_sa11y_options.linkIgnore.replace(/\n/g, ",") : '';
      const exportResultsPluginSetting = (drupalSettings.localgov_sa11y_options.exportResultsPlugin) ? drupalSettings.localgov_sa11y_options.exportResultsPlugin : 0;
      const checkAllHideTogglesSetting = (drupalSettings.localgov_sa11y_options.checkAllHideToggles) ? drupalSettings.localgov_sa11y_options.checkAllHideToggles : 0;
      const panelPositionSetting = (drupalSettings.localgov_sa11y_options.panelPosition) ? drupalSettings.localgov_sa11y_options.panelPosition : 'right';

      context = context || document;
      Sa11y.Lang.addI18n(Sa11yLangEn.strings);
      const sa11y = new Sa11y.Sa11y({
        checkRoot: checkRootSetting,
        containerIgnore: containerIgnoreSetting,
        contrastIgnore: contrastIgnoreSetting,
        linkIgnore: linkIgnoreSetting,
        exportResultsPlugin: exportResultsPluginSetting,
        checkAllHideToggles: checkAllHideTogglesSetting,
        panelPosition: panelPositionSetting,
      });
    },
  };
})(Drupal, drupalSettings);
