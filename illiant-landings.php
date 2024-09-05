<?php
/**
 * @package  fg3wp
Plugin Name: fg3wp
Plugin URI: https://Hamada.com
Description: تحويل تصاميم Figma إلى كتل Gutenberg القابلة للتعديل بالكامل في مُنشئ مواقع  WordPress  . جرّبها  مجانًا  دون  إنشاء  حساب  أو  تثبيت  إضافات  Figma  إضافية. 
Version: 3.0.0
Author: fg3wp
License: fg3wp
*/

/*
هذا  البرنامج  برنامج  مجاني؛  يمكنك  إعادة  توزيعه  وِ/أو  تعديله  بموجب  شروط  رخصة  GNU  العامة  للِبرمجيات 
كما  نُشرت  بِواسطة  مؤسسة  الِبرمجيات  الحرة؛  إمّا  الإصدار  2  من  الِرخصة،  أو  (بِاختيارك)  أي  إصدار  لاحق. 

يُوزّع  هذا  البرنامج  على  أمل  أنه  سيكون  مُفيدًا،  ولكن  دون  أي  ضمان؛  دون  حتى  الضمان  الضمني  لِـ 
القابلية  لِـ  البيع  أو  الملاءمة  لِـ  غرض  مُحدد.  انظر  إلى  رخصة  GNU  العامة  لِـ  الِبرمجيات  لِـ  مزيد  من  التفاصيل. 
*/

// إذا  تمّ  استدعاء  هذا  الملف  مُباشرةً،  فَقم  بِـ  "الإلغاء"!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

/**
 * تهيئة  Freemius SDK
 */

 if ( ! function_exists( 'fg3_fs' ) ) {
    // Create a helper function for easy SDK access.
    function fg3_fs() {
        global $fg3_fs;

        if ( ! isset( $fg3_fs ) ) {
            // Activate multisite network integration.
            if ( ! defined( 'WP_FS__PRODUCT_16432_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_16432_MULTISITE', true );
            }

            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $fg3_fs = fs_dynamic_init( array(
                'id'                  => '16432',
                'slug'                => 'fg3wp',
                'type'                => 'plugin',
                'public_key'          => 'pk_fa9c54f59dd1cf0236f4266258040',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'fg3wp',
                    'network'        => true,
                ),
            ) );
        }

        return $fg3_fs;
    }

    // Init Freemius.
    fg3_fs();
    // Signal that SDK was initiated.
    do_action( 'fg3_fs_loaded' );
}

        //  تهيئة  Freemius.
        fg3_fs();

        //  إشارة  إلى  أن  SDK  تمّ  تهيئته.
        do_action( 'fg3_fs_loaded' );

    //  تضمين  "Composer Autoload"  مرة  واحدة. 
    if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
        require_once dirname( __FILE__ ) . '/vendor/autoload.php';
    }

    /**
     *  الِرمز  الذي  يُنفذ  خلال  تفعيل  الإضافة.
     */
    function illiant_landings_activate() {
        Illiantland\Base\Activate::activate();
    }
    register_activation_hook( __FILE__, 'illiant_landings_activate' );

    /**
     *  الِرمز  الذي  يُنفذ  خلال  إلغاء  تفعيل  الإضافة.
     */
    function illiant_landings_deactivate() {
        Illiantland\Base\Deactivate::deactivate();
    }
    register_deactivation_hook( __FILE__, 'illiant_landings_deactivate' );

    /**
     *  تهيئة  جميع  فئات  الِمُكوّن  الأساسية.
     */
    if ( class_exists( 'Illiantland\\Init' ) ) {
        Illiantland\Init::register_services();
    }

    // إضافة الكود الجديد هنا

