<?php
/*
Plugin Name: Base of WordPress plug-in
Plugin URI: https://qooga.jb-jk.net/wp/make-wordpress-plugin/
Description: プラグイン作成ベース。この辺は適宜変更してください。
Version: 1.0.0
Author: QoogaKIKAKU (T.O)
Author URI: http://qooga.jb-jk.net/
*/
/*
 * @package make-wordpress-plugin
 * @version 1.0.0
 */

class Base_WordPress_plugin // ※変更対象：class名
{
    public static $package = "Base_WordPress_plugin"; // ※変更対象
    public static $version = "1.0.0"; // ※変更対象
    public static $title   = "Base of WordPress plug-in"; // ※変更対象

    /// 処理追加の呼び出し
    public static function register_hooks()
    {
        add_action('admin_menu', array(__CLASS__, 'register_admin_hooks'));
        // 下記のフック名は適宜変更　add_filterでも良いです。
		add_action('the_content', array(__CLASS__, 'register_action_hooks'), 10);
	}


	/// 管理ページへのリンク
	public static function register_admin_hooks() {
        /* Admin bits */
        add_options_page(
            __("Configure ".self::$title, self::$package), // page title.
            __(self::$title, self::$package),              // menu title.
            'manage_options',                              // priv/capability
            self::$package.'-settings',                    // slug
			array(__CLASS__, 'settings_page'));            // 設定メニューに追加
	}


    /// 追加される管理ページ
    public static function settings_page($text) {
?>
        <link rel='stylesheet' href='<?php echo plugins_url( 'css.css', __FILE__ ); ?>' type='text/css' media='all' />
        <script type="text/javascript" src='<?php echo plugins_url( 'js.js', __FILE__ ); ?>'></script>
        <form method="post" action="" id="form" name="form0">
        <h2><?php echo self::$title; ?></h2>
        などなど管理画面に追加したい項目をここに追加する
        </form>
<?php
    }


	/// 実際の処理追加
	public static function register_action_hooks($text)
	{
        return '--------ココカラ--------<br />'.$text.'--------ココマデ--------';
	}

}
Base_WordPress_plugin::register_hooks(); // ※変更対象：作ったclass名に合わせる