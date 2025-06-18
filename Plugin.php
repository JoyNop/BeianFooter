<?php
/**
 * 在博客底部输出 ICP 和公安备案信息，支持自定义链接和图标
 *
 * @package BeianFooter
 * @author JoyNop
 * @link https://github.com/JoyNop/BeianFooter
 * @version 1.0.0
 */
class BeianFooter_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('BeianFooter_Plugin', 'render');
    }

    public static function deactivate(){}

    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $icp = new Typecho_Widget_Helper_Form_Element_Text(
            'icp', NULL, '', 'ICP备案号', '例如：京ICP备04000001号-2'
        );
        $form->addInput($icp);

        $icpUrl = new Typecho_Widget_Helper_Form_Element_Text(
            'icpUrl', NULL, 'https://beian.miit.gov.cn/', 'ICP备案跳转链接', '默认：https://beian.miit.gov.cn/'
        );
        $form->addInput($icpUrl);

        $icpIcon = new Typecho_Widget_Helper_Form_Element_Text(
            'icpIcon', NULL, '', 'ICP备案图标链接', '可选，填入图标URL，不填则无图标'
        );
        $form->addInput($icpIcon);

        $gongan = new Typecho_Widget_Helper_Form_Element_Text(
            'gongan', NULL, '', '公安备案号', '例如：京公网安备11040102700068号'
        );
        $form->addInput($gongan);

        $gonganUrl = new Typecho_Widget_Helper_Form_Element_Text(
            'gonganUrl', NULL, '', '公安备案跳转链接', '例如：https://beian.mps.gov.cn/#/query/webSearch?code=11040102700068'
        );
        $form->addInput($gonganUrl);

        $gonganIcon = new Typecho_Widget_Helper_Form_Element_Text(
            'gonganIcon', NULL, '', '公安备案图标链接', '可选，填入图标URL，不填则无图标'
        );
        $form->addInput($gonganIcon);
    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function render()
    {
        $options = Helper::options()->plugin('BeianFooter');

        $icp = trim($options->icp);
        $icpUrl = trim($options->icpUrl);
        $icpIcon = trim($options->icpIcon);

        $gongan = trim($options->gongan);
        $gonganUrl = trim($options->gonganUrl);
        $gonganIcon = trim($options->gonganIcon);

        echo '<div style="text-align:center; font-size:0.9em; padding:10px 0;">';

        if ($gongan && $gonganUrl) {
            echo '<a href="' . htmlspecialchars($gonganUrl) . '" rel="noreferrer" target="_blank" style="margin-right: 10px;">';
            if ($gonganIcon) {
                echo '<img src="' . htmlspecialchars($gonganIcon) . '" alt="公安备案图标" width="16" height="16" style="vertical-align:middle; margin-right:4px;">';
            }
            echo '<span>' . htmlspecialchars($gongan) . '</span>';
            echo '</a>';
        }

        if ($icp && $icpUrl) {
            echo '<a href="' . htmlspecialchars($icpUrl) . '" target="_blank">';
            if ($icpIcon) {
                echo '<img src="' . htmlspecialchars($icpIcon) . '" alt="ICP备案图标" width="16" height="16" style="vertical-align:middle; margin-right:4px;">';
            }
            echo htmlspecialchars($icp);
            echo '</a>';
        }

        echo '</div>';
    }
}
