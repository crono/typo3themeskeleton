<?php
defined('TYPO3_MODE') || die();

call_user_func(function() {
    $extension = "typo3themeskeleton";
    $extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extension));
    $className = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extension);
    // $pluginName = strtolower('PluginName');
    // $pluginSignature = $extensionName.'_'.$pluginName;

    $classname = 'HhThemeSkeleton';

    // If BE view - User logged in at BE
    if (TYPO3_MODE === 'BE' || TYPO3_MODE === 'FE' && isset($GLOBALS['BE_USER'])) {
        // add CSS and JS in TYPO3-BE
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][]
            = \GroundStack\HhThemeSkeleton\Hooks\BackendControllerHook::class . '->addCss';

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][]
            = \GroundStack\HhThemeSkeleton\Hooks\BackendControllerHook::class . '->addJavaScript';
    }
});
