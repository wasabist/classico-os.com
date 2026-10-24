<?php
$uri = get_template_directory_uri();
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no">
<meta name="author" content="">
<meta name="keywords" itemprop="keywords" content="社会保険労務士法人クラシコ,大阪,IPO支援,保険手続き,給与計算代行">
<?php if(is_page(array('contact-thanks','contact-error','mail-magazine-thanks'))): ?>
  <meta name="robots" content="noindex">
<?php endif; ?>
<link rel="icon" href="<?php echo $uri; ?>/img/favicon.ico">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<style>
  @media (max-width: 1279px) {
    #header > .inner > .inner-02 > .h-unit > #g-navi {
      display: none;
      pointer-events: none;
      visibility: hidden;
    }
  }
body{font-family:"Noto Sans JP","Hiragino Sans","Meiryo",sans-serif !important;letter-spacing:.05em;font-feature-settings:"palt";font-size:12px;text-align:justify}#header{background-color:#fff;position:fixed;width:100%;z-index:3;box-shadow:0 8px 16px 0 rgba(0,0,0,.08)}#header>.inner{padding-left:15px;padding-right:15px}@media(min-width: 375px){#header>.inner{padding-left:16px;padding-right:0}}@media(min-width: 1280px){#header>.inner{padding:5px 30px;height:90px;transition:all .3s ease-in-out}}#header>.inner>.inner-02{padding:15px 0}@media(min-width: 375px){#header>.inner>.inner-02{padding:0;height:56px;justify-content:space-between}}@media(min-width: 1280px){#header>.inner>.inner-02{margin:0 auto;width:100%;max-width:1320px;height:100%;position:relative}}#header>.inner>.inner-02>.h-unit{width:auto}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit{width:296px;position:absolute;left:0;top:50%;transform:translateY(-50%)}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit:first-of-type{z-index:2}}#header>.inner>.inner-02>.h-unit:nth-of-type(2){width:56px}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit:nth-of-type(2){width:100%;margin:0}}#header>.inner>.inner-02>.h-unit #ci{width:175px}@media(min-width: 375px){#header>.inner>.inner-02>.h-unit #ci{width:240px}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #ci{width:auto}}#header>.inner>.inner-02>.h-unit #ci a{display:block;transition:all .3s ease-in-out}#header>.inner>.inner-02>.h-unit #ci a>img{width:100%}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #ci a>img{transition:all .3s ease-in-out;width:256px}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #ci a:hover{opacity:.6}}#header>.inner>.inner-02>.h-unit .ci__sub{font-size:10px;margin-bottom:4px}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit .ci__sub{transition:all .3s ease-in-out}}#header>.inner>.inner-02>.h-unit #g-navi{background-color:hsla(0,0%,100%,.975);max-height:100vh;left:0;opacity:0;position:fixed;top:0;width:100%;-webkit-overflow-scrolling:touch}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi{overflow:auto;padding:56px 0 0;display:block;visibility:hidden;pointer-events:none;opacity:0}#header>.inner>.inner-02>.h-unit #g-navi.is-active{transform:translateX(0);visibility:visible;pointer-events:auto;opacity:1;transition:all .3s ease;height:100vh}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi{background-color:rgba(0,0,0,0);display:block;height:auto;left:auto;opacity:1;position:static;top:auto;width:auto}}#header>.inner>.inner-02>.h-unit #g-navi>.list{position:static;padding:0 15px;width:100%}@media(min-width: 375px){#header>.inner>.inner-02>.h-unit #g-navi>.list{padding:0}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list{left:auto;top:auto;transform:translate(0, 0);display:flex;align-items:center;justify-content:flex-end;gap:24px}}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi>.list>li.btn-A:has(+.btn-T){margin-bottom:16px !important}}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi>.list>li.btn-A+.btn-T{margin-top:16px !important}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G){border-bottom:1px solid #e5e5e5;margin-bottom:20px;padding-bottom:20px}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G){border-bottom:none;margin:0 8px 0 0;padding-bottom:0;display:inline-block;position:relative}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G):last-child{margin-right:0}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>a{color:#003988;font-size:18px;font-weight:600;padding-left:22px;position:relative;white-space:nowrap}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>a{font-size:14px;font-weight:300;padding-left:19px}}@media(min-width: 1280px)and (min-width: 375px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>a{font-size:calc(.75rem + (1vw - 3.75px)*.22099)}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>a::before{background-color:#ddff0c;border-radius:50%;bottom:0;content:"";display:block;height:15px;left:0;margin:auto 0;position:absolute;right:0;top:0;width:15px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>a::after{bottom:0;content:"";display:block;left:6px;margin:auto 0;position:absolute;right:0;top:0;width:0;height:0;border-style:solid;border-width:2.5px 0 2.5px 5px;border-color:rgba(0,0,0,0) rgba(0,0,0,0) rgba(0,0,0,0) #003988}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu{overflow:hidden}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu{display:none}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu{bottom:0;display:none;left:0;margin-top:0;transform:translateY(100%);opacity:0;position:absolute;padding-top:10px;z-index:10}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item{border-radius:10px;margin-bottom:0;padding-left:22px;padding-top:10px;text-align:left;font-size:18px}@media(min-width: 375px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item{margin-bottom:calc(.3125rem + (1vw - 3.75px)*.55249)}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item{margin-bottom:0;font-size:12px;border-radius:0;background-color:#fff;padding:0 5px 8px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item:nth-of-type(1){padding-top:5px}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item:nth-of-type(1){padding-top:20px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item>a{color:#003988;white-space:nowrap}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item>a{color:#333;display:block;line-height:20px;padding:0 10px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G)>.sub-menu>.item>a:hover{color:#666}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A,#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T{border-bottom:none;margin-top:40px;padding-bottom:0;max-width:100%}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A,#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T{padding:0 16px;margin:24px 0}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A{margin:0;width:200px}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A>a{background-color:#e77d18;border-radius:8px;border:1px solid #e77d18;color:#fff;display:flex;line-height:64px;text-align:center;transition-duration:.3s;padding-left:0;align-items:center;justify-content:center}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A>a{border-radius:4px;line-height:56px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A>a:hover{opacity:.6}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A>a::before{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_mail.svg) no-repeat center center/100% auto;width:21px;height:16px;display:block;border-radius:0;position:relative;margin:0 8px 0 0}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-A>a::after{display:none}@media(max-width: 1279px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a{background-color:#fff;border-radius:8px;border:1px solid #099c6b;color:#262626;display:flex;flex-direction:column;height:64px;text-align:center;transition-duration:.3s;padding-left:0;align-items:center;justify-content:center}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a::before,#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a::after{display:none}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a .tel{color:#099c6b;font-size:22px;display:flex;align-items:center;gap:8px;margin-bottom:2px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a .tel::before{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_tel.svg) no-repeat center center/100% auto;width:16px;height:21px;display:block}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-T>a .text{font-size:12px}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A{border-bottom:none;padding-bottom:0}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A{display:none}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A>a{display:block;padding-left:0;text-align:center;width:100%}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A>a::before,#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A>a::after{display:none}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).bnr-A>a>img{width:338px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G{border-bottom:1px solid #003988;padding-bottom:0}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G{display:none !important}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a{font-size:15px;display:block;padding-left:10px;text-align:left;width:100%}@media(min-width: 375px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a{font-size:calc(.9375rem + (1vw - 3.75px)*-0.33149);padding-left:calc(.625rem + (1vw - 3.75px)*1.10497)}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a{font-size:12px;padding-left:20px}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a::before{display:none}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a::after{border-bottom:2px solid #003988;border-right:2px solid #003988;bottom:0;content:"";display:block;height:5px;margin:auto 0;position:absolute;right:10px;top:0;transform:rotate(-45deg);width:5px}@media(min-width: 375px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a::after{height:calc(.3125rem + (1vw - 3.75px)*.55249);width:calc(.3125rem + (1vw - 3.75px)*.55249);right:calc(.625rem + (1vw - 3.75px)*1.10497)}}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a::after{height:10px;width:100px;right:20px}}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).btn-G>a>img{width:338px}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).item-s{position:relative}#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).item-s::after{border-bottom:1px solid #003988;border-right:1px solid #003988;content:"";display:block;height:7.5px;position:absolute;right:10px;top:3px;transform:rotate(45deg);width:7.5px}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #g-navi>.list>.item:not(.btn-G).item-s::after{display:none}}#header>.inner>.inner-02>.h-unit #menu-btn{height:56px;width:56px;position:relative;display:flex;flex-direction:column;align-items:center;background-color:#003988}@media(min-width: 1280px){#header>.inner>.inner-02>.h-unit #menu-btn{display:none}}@media(min-width: 1280px){#header.is-scrolled>.inner{padding:0 30px;height:64px}}@media(min-width: 1280px){#header.is-scrolled #g-navi .btn-A>a{line-height:48px}}.menu-btn__border{width:24px;height:18px;position:relative;margin:12px 0 6px}.menu-btn__border span{background-color:#fff;display:block;height:2px;left:0;position:absolute;transition-duration:.3s;width:100%}.menu-btn__border span:nth-of-type(1){top:0}.menu-btn__border span:nth-of-type(2){top:0;bottom:0;margin:auto 0}.menu-btn__border span:nth-of-type(3){bottom:0}#g-navi .btn-G>a{background-color:#fff;display:flex;height:64px;align-items:center}#g-navi .btn-G>a .text{font-size:16px;line-height:1.4}#g-navi .btn-G>a::after{border:none;background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_blank_navy.svg) no-repeat center center;width:12px;height:11px;transform:none;right:16px}@media(min-width: 1280px){#g-navi{display:flex !important;opacity:1 !important}}.js-nav-toggle-content,.sub-menu,.js-c-toggle-content{display:grid;grid-template-rows:0fr;transition:grid-template-rows .3s ease;overflow:hidden}.js-nav-toggle-content.is-open,.sub-menu.is-open,.js-c-toggle-content.is-open{grid-template-rows:1fr}#scroll-banner{opacity:0;visibility:hidden;transition:opacity .3s ease,visibility .3s ease}#scroll-banner.is-show{opacity:1;visibility:visible}._opened .menu-btn__border span:nth-of-type(1){top:0;bottom:0;margin:auto 0;transform:rotate(45deg)}._opened .menu-btn__border span:nth-of-type(2){opacity:0}._opened .menu-btn__border span:nth-of-type(3){top:0;bottom:0;margin:auto 0;transform:rotate(-45deg)}._opened .menu-btn__name::before{content:"閉じる"}.menu-btn__name::before{content:"メニュー";display:block;font-size:8px;color:#fff}.l-g-navi__item.has-child .l-g-navi__item-link{transition:all .3s ease-in-out}@media(max-width: 1279px){.l-g-navi__item.has-child .l-g-navi__item-link{position:relative;justify-content:space-between}.l-g-navi__item.has-child .l-g-navi__item-link::after{content:"";display:block;width:10px;height:10px;border-bottom:2px solid #003988;border-right:2px solid #003988;transform:rotate(45deg)}.l-g-navi__item.has-child .l-g-navi__item-link.is-active::after{transform:rotate(-135deg)}.l-g-navi__item.has-child .l-g-navi__item-link.is-active .nav-link-text{color:#003988}}@media(min-width: 1280px){.l-g-navi__item.has-child .l-g-navi__item-link:hover{cursor:pointer;color:#003988}.l-g-navi__item.has-child .l-g-navi__item-link:hover::after{left:10px}}@media(min-width: 1280px){.l-g-navi__item.has-child:hover .l-g-navi__item-link{color:#003988}.l-g-navi__item.has-child:hover .l-g-navi__item-link::before{content:"";background:#abb9de;width:100%;height:4px;position:absolute;left:0;bottom:12px}}@media(min-width: 1280px){.l-g-navi__item.before_btn{position:static}}@media(min-width: 1280px){.l-g-navi__item{border-bottom:none;margin:0;padding-bottom:0;display:inline-block}}.l-g-navi__item-link,.l-g-navi__sub-item-link{color:#262626;font-size:16px;font-weight:600;position:relative;white-space:nowrap;border-bottom:1px solid #e5e5e5;padding:1.37em 24px;display:flex;align-items:center;transition:all .3s ease-in-out}.l-g-navi__item-link::before,.l-g-navi__item-link::after,.l-g-navi__sub-item-link::before,.l-g-navi__sub-item-link::after{transition:all .3s}.l-g-navi__item-link:hover::after,.l-g-navi__sub-item-link:hover::after{border-color:rgba(0,0,0,0) rgba(0,0,0,0) rgba(0,0,0,0) #fff}@media(min-width: 1280px){.l-g-navi__item-link,.l-g-navi__sub-item-link{font-size:14px;font-weight:400;border-bottom:none}}@media(min-width: 1280px){.l-g-navi__item-link{padding:30px 0}.l-g-navi__item-link::before{left:5px}.l-g-navi__item-link::after{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_arrow_bottom.svg) no-repeat center center/100% auto;width:10px;height:6px;display:block;margin-left:8px;left:11px}}.l-g-navi__sub-item-link{border:none;font-size:16px;padding:1.37em 24px}.l-g-navi__sub-item-link::before{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_arrow_right.svg) no-repeat center center/100% auto;width:6px;height:10px;display:block;margin-right:8px}.l-g-navi__sub-item-link:hover{color:#003988;opacity:.6}@media(max-width: 1279px){.l-g-navi__sub-item-link{border-bottom:1px solid #e5e5e5}}@media(min-width: 1280px){.l-g-navi__sub-item-link{padding:12px 8px;border-bottom:1px solid #efefef}}@media(max-width: 1279px){.l-g-navi__list li:first-child .l-g-navi__item-link{border-top:1px solid #e5e5e5}}@media(max-width: 1279px){.l-g-navi__list-sub{background:#f9f9f9}}@media(min-width: 1280px){.l-g-navi__list-sub{box-shadow:0 6px 18px 0 rgba(0,0,0,.16);padding:40px;border-radius:8px;width:100%;z-index:1000;background-color:#fff;position:absolute;left:0;top:calc(100% - 12px);margin:0;transition:all .3s;opacity:0;visibility:hidden;transform:translateY(-8px)}.l-g-navi__list-sub.active{opacity:1;visibility:visible;transform:translateY(0)}}@media(min-width: 1280px){.l-g-navi__list-sub__pannel{display:flex;justify-content:space-between}.with-download .l-g-navi__list-sub__pannel{align-items:flex-start}}@media(max-width: 1279px){.l-g-navi__list-sub__pannel{min-height:0}}@media(max-width: 1279px){.l-g-navi__list-sub__ttl{display:none}}@media(min-width: 1280px){.l-g-navi__list-sub__ttl{width:23.549%;border-right:1px solid #efefef;min-height:80px;padding-top:8px;flex-basis:23.549%}}@media(min-width: 1280px){.l-g-navi__list-sub__main{width:74.517%;display:flex;flex-wrap:wrap}.l-g-navi__list-sub__main.column3{display:flex;gap:24px}.with-download .l-g-navi__list-sub__main{width:46.452%;justify-content:space-between}.l-g-navi__list-sub__main li{width:calc((100% - 48px)/3);margin-left:24px}.l-g-navi__list-sub__main li:first-child,.l-g-navi__list-sub__main li:nth-child(3n+1){margin-left:0}.with-download .l-g-navi__list-sub__main li{width:calc((100% - 24px)/2);margin-left:0}}@media(max-width: 1279px){.l-g-navi__list-sub__download{display:none}}@media(min-width: 1280px){.l-g-navi__list-sub__download{width:29.356%;padding-left:16px;margin:-40px -40px -40px 0}.l-g-navi__list-sub__download .archive-download__item{width:100%;background:#f4f6f9;border-radius:0 8px 8px 0;padding:24px}.l-g-navi__list-sub__download .archive-download__item a{display:block;transition:all .3s}.l-g-navi__list-sub__download .archive-download__item a:hover{opacity:.8}.l-g-navi__list-sub__download .archive-download__item-thumb{height:120px;margin-bottom:8px}.l-g-navi__list-sub__download .archive-download__item-thumb img{width:100%;height:100%;object-fit:cover}.l-g-navi__list-sub__download .archive-download__item-title{margin-bottom:0 !important;padding-bottom:0 !important;border-bottom:none !important;display:flex;align-items:center;justify-content:space-between;font-size:12px;font-weight:normal;color:#262626}.l-g-navi__list-sub__download .archive-download__item-title:after{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_arrow_right.svg) no-repeat center center/100% auto;width:6px;height:10px;display:block;margin-left:16px;flex-basis:6px;flex-shrink:0}}@media(min-width: 1280px){.l-g-navi__list-sub__module{flex:1;display:flex;flex-direction:column}.l-g-navi__list-sub__module figure{display:flex;align-items:baseline;justify-content:center;position:relative}.l-g-navi__list-sub__module figure::before{content:"";background:#f8fbff;width:100%;height:104px;border-radius:8px;position:absolute;left:0;top:0;z-index:0}.l-g-navi__list-sub__module figure img{position:relative;z-index:1}.l-g-navi__list-sub__module.romu figure img{max-width:137px;padding-top:14px}.l-g-navi__list-sub__module.consulting figure img{max-width:143px;margin-top:-27px}.l-g-navi__list-sub__module.outsourcing figure img{max-width:185px;margin-top:-10px}.l-g-navi__list-sub__module .l-g-navi__list-sub__main{flex-direction:column;width:100%}.l-g-navi__list-sub__module .l-g-navi__list-sub__main li{width:100%;margin-left:0}}@media(max-width: 1279px){.l-g-navi__list-sub__module-ttl{border-bottom:1px solid #e5e5e5;background:#f4f4f4;line-height:32px;padding:0 24px;color:#003988;font-size:14px;font-weight:bold}}@media(min-width: 1280px){.l-g-navi__list-sub__module-ttl{font-size:16px;font-weight:bold;color:#003988;padding:16px 0}}@media(max-width: 1279px){.l-g-navi__list-sub__module figure{display:none}}@media(max-width: 1279px){.js-megamenu-parent-text{display:none}}@media(min-width: 1280px){.js-megamenu-parent-text{position:relative;display:flex;font-size:20px;font-weight:bold;align-items:center}.js-megamenu-parent-text::before{content:"";background:url(https://classico-os.com/wp-content/themes/classico/img/common/ico_arrow_circle_right.svg) no-repeat center center/100% auto;width:16px;height:16px;display:block;margin-right:8px}}@media(min-width: 1280px){.js-megamenu-top-link{font-size:14px;text-decoration:underline;margin-top:24px;display:block;transition:all .3s ease-in-out}.js-megamenu-top-link:hover{opacity:.6;text-decoration:none}}@media screen and (min-width: 1280px){#header>.inner>.inner-02>.h-unit>#g-navi>.list>.item:not(.btn-G).btn-A.service-download{width:auto}#header>.inner>.inner-02>.h-unit>#g-navi>.list>.item:not(.btn-G).btn-A.service-download>a{padding:0 10px}}/*# sourceMappingURL=inline.min.css.map */
</style>
<link rel="stylesheet" href="<?php echo $uri; ?>/css/index.min.css?v=<?php echo filemtime($_SERVER['DOCUMENT_ROOT'] . $file_path); ?>" media="all">
<?php if (!is_page('top')) :?>
<link rel="stylesheet" href="<?php echo $uri; ?>/css/under.min.css?v=<?php echo filemtime($_SERVER['DOCUMENT_ROOT'] . $file_path); ?>" media="all">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo $uri; ?>/css/slick.css" media="print" onload="this.media='all'">
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M6R2DLH');</script>
<!-- End Google Tag Manager -->
</head>
<body class="<?php if ( !is_page( 'top' ) ) : echo 'local '; endif; ?><?php echo esc_attr( get_custom_single_term_class() ); ?>" id="<?php echo esc_attr( $post->post_name ); ?>">
<div id="wrap">
  <!-- HEADER -->
  <header id="header">
    <div class="inner">
      <div class="fl inner-02">
        <div class="h-unit">
          <p class="ci__sub">全国対応 | IPOに強い、人事・労務のプロフェッショナル</p>
          <h1 id="ci"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo $uri; ?>/img/common/ci_min.png" width="240" height="20" alt="社会保険労務士法人クラシコ"></a></h1>
        </div>
        <div class="h-unit">
          <div id="g-navi">
            <ul class="list l-g-navi__list">
              <li class="l-g-navi__item has-child">
                <p class="l-g-navi__item-link js-nav-toggle-trigger">
                  <a href="<?php echo home_url( '/' ); ?>service/">
                    <span class="nav-link-text">サービス</span>
                  </a>
                </p>
                <div class="l-g-navi__list-sub js-nav-toggle-content">
                  <div class="l-g-navi__list-sub__pannel">
                    <div class="l-g-navi__list-sub__ttl">
                      <span class="js-megamenu-parent-text"></span>
                      <a href="#" class="js-megamenu-top-link"></a>
                    </div>
                    <div class="l-g-navi__list-sub__main column3">
                      <div class="l-g-navi__list-sub__module romu">
                        <figure class="l-g-navi__list-sub__module-img"><img src="<?php echo get_template_directory_uri(); ?>/img/service/image02.png" alt="顧問労務サポート"></figure>
                        <p class="l-g-navi__list-sub__module-ttl">顧問労務サポート</p>
                        <ul class="l-g-navi__list-sub__main">
                          <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>service/romu/">労務相談</a></li>
                          <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>sharoshi/">委託替えをご検討中の方</a></li>
                        </ul>
                      </div><!--/module-->
                      <div class="l-g-navi__list-sub__module consulting">
                        <figure class="l-g-navi__list-sub__module-img"><img src="<?php echo get_template_directory_uri(); ?>/img/service/image05.png" alt="労務コンサルティング"></figure>
                        <p class="l-g-navi__list-sub__module-ttl">労務コンサルティング</p>
                        <ul class="l-g-navi__list-sub__main">
                          <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>service/consulting/">労務コンサルティング</a></li>
                        </ul>
                      </div><!--/module-->
                      <div class="l-g-navi__list-sub__module outsourcing">
                        <figure class="l-g-navi__list-sub__module-img"><img src="<?php echo get_template_directory_uri(); ?>/img/service/image03.png" alt="各種アウトソーシング"></figure>
                        <p class="l-g-navi__list-sub__module-ttl">各種アウトソーシング</p>
                        <ul class="l-g-navi__list-sub__main">
                          <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>service/outsourcing/">手続きアウトソーシング</a></li>
                          <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>service/jyoseikin/">助成金申請</a></li>
                        </ul>
                      </div><!--/module-->
                    </div>
                  </div>
                </div>
              </li>
              <li class="l-g-navi__item has-child with-download">
                <p class="l-g-navi__item-link js-nav-toggle-trigger">
                  <span class="nav-link-text">IPO・労務監査</span>
                </p>
                <div class="l-g-navi__list-sub js-nav-toggle-content">
                  <div class="l-g-navi__list-sub__pannel">
                    <div class="l-g-navi__list-sub__ttl">
                      <span class="js-megamenu-parent-text"></span>
                      <a href="#" class="js-megamenu-top-link"></a>
                    </div>
                    <ul class="l-g-navi__list-sub__main">
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>iposupport/">社労士によるIPO支援</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>service/romukansa/">労務監査</a></li>
                    </ul>
                    <?php 
                      // 「IPO支援サービスのご紹介」の記事IDを指定
                      $target_post_id = 4951; 

                      $args = array(
                          'post_type'      => 'download',
                          'p'              => $target_post_id,
                          'posts_per_page' => 1,
                      );

                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()): ?>
                        <ul class="l-g-navi__list-sub__download">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <?php include("inc/head-download.php"); ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php 
                      wp_reset_postdata(); 
                    else: ?>
                      <p class="l-g-navi__list-sub__download">準備中です。</p>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
              <li class="l-g-navi__item has-child with-download">
                <p class="l-g-navi__item-link js-nav-toggle-trigger">
                  <span class="nav-link-text">ご検討中の方へ</span>
                </p>
                <div class="l-g-navi__list-sub js-nav-toggle-content">
                  <div class="l-g-navi__list-sub__pannel">
                    <div class="l-g-navi__list-sub__ttl">
                      <span class="js-megamenu-parent-text"></span>
                      <a href="#" class="js-megamenu-top-link"></a>
                    </div>
                    <ul class="l-g-navi__list-sub__main">
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>plan/">報酬</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>voices/">お客様の声</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>media/">メディア掲載</a></li>
                    </ul>
                    <?php 
                      // 「サービス資料」の記事IDを指定
                      $target_post_id = 4947; 

                      $args = array(
                          'post_type'      => 'download',
                          'p'              => $target_post_id,
                          'posts_per_page' => 1,
                      );

                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()): ?>
                        <ul class="l-g-navi__list-sub__download">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <?php include("inc/head-download.php"); ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php 
                      wp_reset_postdata(); 
                    else: ?>
                      <p class="l-g-navi__list-sub__download">準備中です。</p>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
              <li class="l-g-navi__item has-child with-download">
                <p class="l-g-navi__item-link js-nav-toggle-trigger">
                  <span class="nav-link-text">セミナー・お役立ち情報</span>
                </p>
                <div class="l-g-navi__list-sub js-nav-toggle-content">
                  <div class="l-g-navi__list-sub__pannel">
                    <div class="l-g-navi__list-sub__ttl">
                      <span class="js-megamenu-parent-text"></span>
                      <a href="#" class="js-megamenu-top-link"></a>
                    </div>
                    <ul class="l-g-navi__list-sub__main">
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>seminar/">無料セミナー情報</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>columns/">コラム</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>download/">資料一覧</a></li>
                    </ul>
                    <?php 
                      // 「サービス資料」の記事IDを指定
                      $target_post_id = 4947; 

                      $args = array(
                          'post_type'      => 'download',
                          'p'              => $target_post_id,
                          'posts_per_page' => 1,
                      );

                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()): ?>
                        <ul class="l-g-navi__list-sub__download">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <?php include("inc/head-download.php"); ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php 
                      wp_reset_postdata(); 
                    else: ?>
                      <p class="l-g-navi__list-sub__download">準備中です。</p>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
              <li class="l-g-navi__item has-child before_btn">
                <p class="l-g-navi__item-link js-nav-toggle-trigger">
                  <span class="nav-link-text">事務所情報</span>
                </p>
                <div class="l-g-navi__list-sub js-nav-toggle-content">
                  <div class="l-g-navi__list-sub__pannel">
                    <div class="l-g-navi__list-sub__ttl">
                      <span class="js-megamenu-parent-text"></span>
                      <a href="#" class="js-megamenu-top-link"></a>
                    </div>
                    <ul class="l-g-navi__list-sub__main">
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>company/">事務所概要</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>classico-recruit/fulltime/">採用情報：正社員</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>classico-recruit/parttime/">採用情報：パート社員</a></li>
                      <li class="l-g-navi__sub-item"><a class="l-g-navi__sub-item-link" href="<?php echo home_url( '/' ); ?>news/">新着情報</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="item btn btn-A"><a href="<?php echo home_url( '/' ); ?>contact/">無料お問い合わせ</a></li>
              <li class="item btn btn-T"><a href="tel:0649632970"><span class="tel">06-4963-2970</span><span class="text">営業時間：10:00〜17:00（土日祝を除く）</span></a></li>
              <li class="item btn btn-G"><a href="https://classico-medical.com/" target="_blank" class="ib"><span class="icon"><img src="<?php echo $uri; ?>/img/common/medical_ci_b.png" width="38" height="37" alt=""></span><span class="text">医療機関・クリニックの<br class="br">お客様はこちら</span></a></li>
            </ul>
          </div>
          <button id="menu-btn" aria-label="メニューを開く">
            <div class="menu-btn__border">
              <span></span><span></span><span></span>
            </div>
            <span class="menu-btn__name"></span>
          </button>
        </div>
      </div>
    </div>
  </header>
  <!-- E HEADER -->