<?php
/**
 * Plugin Name: WooCommerce Social Media Share Buttons
 * Plugin URI: http://www.toastiestudio.com 
 * Description: The Woocommerce Social Media Share Buttons plugin allows visitors to your woocommerce shop to easily share your products on popular social media platforms.
 * Version: 1.1.0
 * Author: Toastie Studio
 * Author URI: http://www.toastiestudio.com
 * Requires at least: 3.5
 * Tested up to: 4.2
 * Text Domain: woocommerce-social-media-share-buttons
 * Domain Path: /lang
 *
 * @author ToastieStudio
 *
 *
 * Copyright 2015 Toastie Studio (email : toastiestudio@gmail.com)	
 *
 *     This file is part of WooCommerce Social Media Share Buttons
 *     plugin for WordPress.
 *
 *     WooCommerce Social Media Share Buttons is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     WooCommerce Social Media Share Buttons is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */


function toastie_wc_smsb_li_reg_like_settings() {
    register_setting('toastie_wc_share_like', 'toastie_smsb_fb');
    register_setting('toastie_wc_share_like', 'toastie_smsb_tw');	
    register_setting('toastie_wc_share_like', 'toastie_smsb_gp');
	register_setting('toastie_wc_share_like', 'toastie_smsb_pi');
	register_setting('toastie_wc_share_like', 'toastie_smsb_tu');
    register_setting('toastie_wc_share_like', 'toastie_smsb_li');
	register_setting('toastie_wc_share_like', 'toastie_smsb_st');
	register_setting('toastie_wc_share_like', 'toastie_smsb_vk');
    register_setting('toastie_wc_share_like', 'toastie_smsb_em');	
    register_setting('toastie_wc_share_like', 'toastie_smsb_format');
}

if (is_admin()) {
    add_action('admin_init', 'toastie_wc_smsb_li_reg_like_settings');
}
add_option('toastie_smsb_fb', 'true');
add_option('toastie_smsb_tw', 'true');
add_option('toastie_smsb_gp', 'true');
add_option('toastie_smsb_pi', 'true');
add_option('toastie_smsb_tu', 'true');
add_option('toastie_smsb_li', 'true');
add_option('toastie_smsb_st', 'true');
add_option('toastie_smsb_vk', 'true');
add_option('toastie_smsb_em', 'true');
add_option('toastie_smsb_format', 'button');

function toastie_wc_smsb_form_code() {
    global $post;
    $social_val = '<div class="woo-social-buttons">';
	if (get_option('toastie_smsb_format') == 'button') {
		if (get_option('toastie_smsb_fb') == 'true') {	
			$social_val.='<span class="smsb_facebook nocount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button"></span>';
		}
		if (get_option('toastie_smsb_tw') == 'true') {
			$social_val.='<span class="smsb_twitter nocount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></span>';
		}
		if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus nocount"><span class="g-plus" data-action="share" data-annotation="none" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') { 
            $social_val.='<span class="smsb_pinterest nocount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }		
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr nocount"><a class="tumblr-share-button" data-color="blue" data-notes="none" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin nocount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') { 
            $social_val.='<span class="smsb_stumbleupon nocount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title='.get_the_title($post->ID).'" target="_blank"><img src="'. plugins_url( 'img/stumbleupon-button.png', __FILE__ ) . '" alt="StumbleUpon" /></a></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte nocount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "round_nocount"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
            $social_val.='<span class="smsb_email nocount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
	}
	
	
    if (get_option('toastie_smsb_format') == 'button_count') {		
        if (get_option('toastie_smsb_fb') == 'true') {
            $social_val.='<span class="smsb_facebook hcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button_count"></span>';
        }
		if (get_option('toastie_smsb_tw') == 'true') {
            $social_val.='<span class="smsb_twitter hcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></span>';
        }
        if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus hcount"><span class="g-plus" data-action="share" data-annotation="bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') {
            $social_val.='<span class="smsb_pinterest hcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="beside" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr hcount"><a class="tumblr-share-button" data-color="blue" data-notes="right" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin hcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') { 
            $social_val.='<span class="smsb_stumbleupon hcount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title='.get_the_title($post->ID).'" target="_blank"><img src="'. plugins_url( 'img/stumbleupon-button.png', __FILE__ ) . '" alt="StumbleUpon" /></a></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte hcount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "round"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
             $social_val.='<span class="smsb_email hcount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
    }
	
	
    if (get_option('toastie_smsb_format') == 'box_count') {	
        if (get_option('toastie_smsb_fb') == 'true') {
            $social_val.='<span class="smsb_facebook vcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="box_count"></span>';
        }
		if (get_option('toastie_smsb_tw') == 'true') {
            $social_val.='<span class="smsb_twitter vcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a></span>';
        }
        if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus vcount"><span class="g-plus" data-action="share" data-annotation="vertical-bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') {
            $social_val.='<span class="smsb_pinterest vcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="above" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr vcount"><a class="tumblr-share-button" data-color="blue" data-notes="top" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin vcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="top"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') {
            $social_val.='<span class="smsb_stumbleupon vcount"><su:badge layout="5"></su:badge></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte vcount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "custom", text: "<img src=\''. plugins_url( 'img/vk-share-button-big.png', __FILE__ ) . '\'; />"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
            $social_val.='<span class="smsb_email vcount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button-big.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
    }
	$social_val.='<div style="clear:both"></div></div>';
    echo $social_val;
}

function toastie_wc_smsb_form_short_code() {
    global $post;
    $social_val = '<div class="woo-social-buttons">';
	if (get_option('toastie_smsb_format') == 'button') {
		if (get_option('toastie_smsb_fb') == 'true') {	
			$social_val.='<span class="smsb_facebook nocount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button"></span>';
		}
		if (get_option('toastie_smsb_tw') == 'true') {
			$social_val.='<span class="smsb_twitter nocount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></span>';
		}
		if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus nocount"><span class="g-plus" data-action="share" data-annotation="none" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') { 
            $social_val.='<span class="smsb_pinterest nocount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }		
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr nocount"><a class="tumblr-share-button" data-color="blue" data-notes="none" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin nocount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') { 
            $social_val.='<span class="smsb_stumbleupon nocount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title='.get_the_title($post->ID).'" target="_blank"><img src="'. plugins_url( 'img/stumbleupon-button.png', __FILE__ ) . '" alt="StumbleUpon" /></a></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte nocount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "round_nocount"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
            $social_val.='<span class="smsb_email nocount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
	}
	
	
    if (get_option('toastie_smsb_format') == 'button_count') {		
        if (get_option('toastie_smsb_fb') == 'true') {
            $social_val.='<span class="smsb_facebook hcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button_count"></span>';
        }
		if (get_option('toastie_smsb_tw') == 'true') {
            $social_val.='<span class="smsb_twitter hcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></span>';
        }
        if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus hcount"><span class="g-plus" data-action="share" data-annotation="bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') {
            $social_val.='<span class="smsb_pinterest hcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="beside" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr hcount"><a class="tumblr-share-button" data-color="blue" data-notes="right" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin hcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') { 
            $social_val.='<span class="smsb_stumbleupon hcount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title='.get_the_title($post->ID).'" target="_blank"><img src="'. plugins_url( 'img/stumbleupon-button.png', __FILE__ ) . '" alt="StumbleUpon" /></a></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte hcount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "round"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
             $social_val.='<span class="smsb_email hcount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
    }
	
	
    if (get_option('toastie_smsb_format') == 'box_count') {	
        if (get_option('toastie_smsb_fb') == 'true') {
            $social_val.='<span class="smsb_facebook vcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="box_count"></span>';
        }
		if (get_option('toastie_smsb_tw') == 'true') {
            $social_val.='<span class="smsb_twitter vcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a></span>';
        }
        if (get_option('toastie_smsb_gp') == 'true') {
            $social_val.='<span class="smsb_googleplus vcount"><span class="g-plus" data-action="share" data-annotation="vertical-bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
        }
		if (get_option('toastie_smsb_pi') == 'true') {
            $social_val.='<span class="smsb_pinterest vcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="above" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
        }
		if (get_option('toastie_smsb_tu') == 'true') { 	
			$social_val.='<span class="smsb_tumblr vcount"><a class="tumblr-share-button" data-color="blue" data-notes="top" href="https://embed.tumblr.com/share"></a></span>';
		}
        if (get_option('toastie_smsb_li') == 'true') {
            $social_val.='<span class="smsb_linkedin vcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="top"></script></span>';
        }
		if (get_option('toastie_smsb_st') == 'true') {
            $social_val.='<span class="smsb_stumbleupon vcount"><su:badge layout="5"></su:badge></span>';
		}
		if (get_option('toastie_smsb_vk') == 'true') {
            $social_val.='<span class="smsb_vkontakte vcount"><script type="text/javascript" src="http://vk.com/js/api/share.js?9"; charset="windows-1251"></script><script type="text/javascript">document.write(VK.Share.button(false, {type: "custom", text: "<img src="'. plugins_url( 'img/vk-share-button-big.png', __FILE__ ) . '"; />"})); </script></span>';
        }
        if (get_option('toastie_smsb_em') == 'true') {
            $social_val.='<span class="smsb_email vcount"><a href="mailto:?subject='.get_the_title($post->ID).'&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="'. plugins_url( 'img/email-share-button-big.png', __FILE__ ) . '" alt="Email" /></a></span>';
        }
    }
	$social_val.='<div style="clear:both"></div></div>';
    echo $social_val;
}


add_shortcode('woocommerce_social_media_share_buttons', 'toastie_wc_smsb_form_short_code');
add_action('woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 31);
add_action('admin_menu', 'toastie_wc_smsb_social_menu');
add_action('wp_footer', 'toastie_wc_smsb_social_footer');
load_plugin_textdomain( 'woocommerce-social-media-share-buttons', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' ); 

function toastie_wc_smsb_social_menu() {
    add_menu_page('Woocommerce Social Media Share Button Page', 'Share Buttons', 'manage_options', 'Woocommerce-social-media-share-button-plugin', 'toastie_wc_smsb_social_init', plugins_url('/img/woo_16.png', __FILE__));
}

function toastie_wc_smsb_social_footer() {
    echo "<style type='text/css'>
			.fb_iframe_widget > span {display: table !important;}
			.woo-social-buttons {margin:10px 0;}
			.woo-social-buttons img {vertical-align: top;}
			.woo-social-buttons span.nocount, .woo-social-buttons span.hcount {float:left; margin:0 5px 5px 0; height:21px;}
			.woo-social-buttons span.vcount {float:left; margin:0 5px 5px 0; height:65px;}
			.woo-social-buttons iframe {margin-bottom:0px; vertical-align:baseline;}
			.woo-social-buttons .smsb_pinterest.vcount {position:relative; top:30px}
			.woo-social-buttons .smsb_tumblr iframe {height:20px !important; width:50px !important;} 
			.woo-social-buttons .smsb_tumblr.hcount iframe {height:20px !important; width:72px !important;}
			.woo-social-buttons .smsb_tumblr.vcount iframe {height:40px !important; width:55px !important;}
			.woo-social-buttons .smsb_stumbleupon.vcount iframe {height:60px !important; width:50px !important;}
			.woo-social-buttons .smsb_vkontakte table tr > td {padding:0px; line-height:auto;}
			.woo-social-buttons .smsb_vkontakte a {height:auto !important;}		
		  </style>";
}

function toastie_wc_smsb_social_init() {
    $submited = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {

        $smsb_fb = sanitize_text_field($_REQUEST['smsb_fb']);
        $smsb_tw = sanitize_text_field($_REQUEST['smsb_tw']);		
        $smsb_gp = sanitize_text_field($_REQUEST['smsb_gp']);
        $smsb_pi = sanitize_text_field($_REQUEST['smsb_pi']);	
		$smsb_tu = sanitize_text_field($_REQUEST['smsb_tu']);
        $smsb_li = sanitize_text_field($_REQUEST['smsb_li']);
		$smsb_st = sanitize_text_field($_REQUEST['smsb_st']);
		$smsb_vk = sanitize_text_field($_REQUEST['smsb_vk']);
        $smsb_em = sanitize_text_field($_REQUEST['smsb_em']);
        $smsb_format = sanitize_text_field($_REQUEST['smsb_format']);
        update_option('toastie_smsb_fb', $smsb_fb);
		update_option('toastie_smsb_tw', $smsb_tw);
        update_option('toastie_smsb_gp', $smsb_gp);
		update_option('toastie_smsb_pi', $smsb_pi);
		update_option('toastie_smsb_tu', $smsb_tu);
        update_option('toastie_smsb_li', $smsb_li);
		update_option('toastie_smsb_st', $smsb_st);
		update_option('toastie_smsb_vk', $smsb_vk);
        update_option('toastie_smsb_em', $smsb_em);
        update_option('toastie_smsb_format', $smsb_format);
        $submited = 1;
    }
    ?>
    <style type="text/css">
        .smsb_pluginheader{width: 98%; margin:15px 0px; padding:10px; background:#ffffff; border-left: 5px solid #fdb435; font-size:22px; color:#fdb435; }
        .smsb_optionheader{width: 400px; margin:15px 0px; padding:10px; background:#ffffff; border-left: 5px solid #fdb435; font-size:14px; color:#fdb435;}	
        .smsb_form{font-size: 14px;}
        .smsb_button {background:#fdb435; color: #fff; border: 0 none; cursor: pointer;}
        .smsb_button:hover {background:#9c8967;}	
    </style>
    <div>   
        <h2 class="smsb_pluginheader"><?php _e("WooCoomerce Social Media Share Buttons - Settings", "woocommerce-social-media-share-buttons"); ?></h2>
        <?php if (isset($submited) && $submited == 1) { ?>
            <div id="setting-error-settings_updated" class="updated settings-error"> 
                <p><strong><?php _e("Your settings have been saved.", "woocommerce-social-media-share-buttons"); ?></strong></p></div>
        <?php } ?>
        <?php _e("<p>By default the plugin adds social media share buttons to your woocommerce store products page (just below the 'add to cart' button). With the addition of a shortcode you can use it to add social media share buttons in posts, pages, products, events, widget etc.</p>
        <p>Use shortcode to add social media share buttons to posts, pages, products, events etc. [woocommerce_social_media_share_buttons]</p>
        <p>Add shortcode to your WordPress theme, or php widget. &lt;?php echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?></p>", "woocommerce-social-media-share-buttons"); ?>
            <form name="social" method="post" >   
                <table class="smsb_form" >
                    <tr><th><h3 class="smsb_optionheader"><?php _e("Which share buttons would you like to show?", "woocommerce-social-media-share-buttons"); ?></h3></th></tr>
                    <tr valign="top">
                        <td><fieldset>
                                <label><input type="checkbox" name="smsb_fb" value="true" <?php echo (get_option('toastie_smsb_fb') == 'true' ? 'checked' : ''); ?>  /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Facbook', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_tw" value="true" <?php echo (get_option('toastie_smsb_tw') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Twitter', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label><input type="checkbox" name="smsb_gp" value="true" <?php echo (get_option('toastie_smsb_gp') == 'true' ? 'checked' : ''); ?>   /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Google Plus', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_pi" value="true" <?php echo (get_option('toastie_smsb_pi') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Pinterest', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_tu" value="true" <?php echo (get_option('toastie_smsb_tu') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Tumblr', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_li"  value="true" <?php echo (get_option('toastie_smsb_li') == 'true' ? 'checked' : ''); ?>  /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Linkedin', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_st" value="true" <?php echo (get_option('toastie_smsb_st') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('StumbleUpon', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_vk" value="true" <?php echo (get_option('toastie_smsb_vk') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('VKontakte', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label> <input type="checkbox" name="smsb_em" value="true" <?php echo (get_option('toastie_smsb_em') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Email', 'woocommerce-social-media-share-buttons'); ?></span></label>
                            </fieldset></td>
                    </tr>
                    <tr><th><h3 class="smsb_optionheader" ><?php _e("What format do you want the share buttons?", "woocommerce-social-media-share-buttons"); ?></h3></th></tr>  
                    <tr valign="top">
                        <td><fieldset>
                        		<img src="<? echo plugins_url( 'img/smsb_formatoptions.png', __FILE__ );?>" alt="Format Options"/><br/>
                                <label><input type="radio" name="smsb_format" value="button" <?php echo (get_option('toastie_smsb_format') == 'button' ? 'checked' : ''); ?> /> <span style="padding-left: 5px;font-weight: bold;"><?php _e('Button', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label><input type="radio" name="smsb_format" value="button_count" <?php echo (get_option('toastie_smsb_format') == 'button_count' ? 'checked' : ''); ?> /><span style="padding-left: 5px;font-weight: bold;"> <?php _e('Button with counter', 'woocommerce-social-media-share-buttons'); ?></span></label>
                                <br/>
                                <label><input type="radio" name="smsb_format" value="box_count" <?php echo (get_option('toastie_smsb_format') == 'box_count' ? 'checked' : ''); ?> /><span style="padding-left: 5px;font-weight: bold;"> <?php _e('Box with counter', 'woocommerce-social-media-share-buttons'); ?></span></label>
                            </fieldset>
                            <br/><br/>
                            <?php _e('Note: Some buttons do not show the share count until the url has been shared atleast once. Email does not show the share count at all.', 'woocommerce-social-media-share-buttons'); ?>
                            </td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <p><input type="submit" name="Submit" class="smsb_button" value="<?php _e("Save Settings", "woocommerce-social-media-share-buttons"); ?>"></p>
            </form>
            <p style="text-align:right">&copy; All rights reserved, <a href="http://www.toastiestudio.com" target="_blank">Toastie Studio</a></p>
    </div>
    <?php
}

function toastie_wc_smsb_my_enqueue() {
    wp_enqueue_script('smsb_script', plugin_dir_url(__FILE__) . 'smsb_script.js', array(), '1.0.0', true);
}

add_action('wp_print_scripts', 'toastie_wc_smsb_my_enqueue');
?>
