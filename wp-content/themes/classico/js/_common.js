var _doc = document, _win = window;
$( _doc ).ready( function() {
    $( 'a[ href^="#" ]' ).click(function(){
        var speed = 500;
        var href= $( this ).attr( "href" );
        var target = $( href == "#" || href == "" ? 'html' : href );
        var position = target.offset().top;

        $( "html, body" ).animate( { scrollTop: position }, speed, "swing" );

        return false;
    });

    $( '#menu-btn' ).on( 'click', function() {
        var $this = $( this );
        if ( $this.hasClass( '_opened' ) ) {
            $this.removeClass( '_opened' );
            $( '#g-navi' ).removeClass( 'is-active' );
            // $( '#g-navi' ).animate( { opacity: 0 }, { duraion: 300, queue: false, complete: function() {
            //     $( this ).css( { display: 'none', visibility: 'hidden', pointerEvents: 'none' } );
            // } } );
        } else {
            $this.addClass( '_opened' );
            $( '#g-navi' ).addClass( 'is-active' );
            // $( '#g-navi' ).css({ display: 'block', visibility: 'visible', pointerEvents: 'auto' } ).animate( { opacity: 1 }, { duration: 300, queue: false } );
        }
    } );

    if ( $( _win ).outerWidth() > 1280 ) {
        $( '.item-s' ).hover( function() {
            var $this = $( this ), $submenuA = $this.children( '.sub-menu' );
            $submenuA.css( { display: 'block' } ).animate( { opacity: '1' }, { duration: 300, queue: false } );
        }, function() {
            var $this = $( this ), $submenuA = $this.children( '.sub-menu' );
            $submenuA.animate( { opacity: '0' }, { duration: 300, queue: false, compelete: function() {
                $( this ).css( { display: 'none' } );
            } } );
        } );
    }
    if ( $( _win ).outerWidth() < 1279 ) {
        $( '.sub-menu' ).each( function() {
            var $this = $( this );
            $this.data( 'h', $this.outerHeight() );
            // $this.css( { height: 0 } );
            // $( '#g-navi' ).css( { display: 'none' } );
        } );

        $( '.item-s' ).on( 'click', function() {
            var $this = $( this ), $list = $this.children( '.sub-menu' );
            $this.toggleClass( '_opened' );
            $this.children('.sub-menu').slideToggle();
        } );
    }

    if ( $( _win ).outerWidth() < 768 ) {
        $( '.slide' ).slick( {
            arrows: false,
            autoplay: true,
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: "15%",
            accessibility: false,
        } );
        $( '.slide02' ).slick( {
            arrows: false,
            autoplay: true,
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: "5%",
        } );
    } else {
        $( '.slide' ).children( '.item' ).css( { display: 'inline-block' } );
        $( '.slide02' ).slick( {
            arrows: false,
            autoplay: true,
            infinite: true,
            centerMode: true,
            variableWidth: true,
        } );
    }
});

//added
"use strict";

$(window);
$("body,html");

$((function() {
  var $switchTabList = $(".js-c-switch-tab-list"),
      $switchTab = $(".js-c-switch-tab"),
      $switchConList = $(".js-c-switch-content-list"),
      $switchCon = $(".js-c-switch-content");

  $switchTab.on("click", (function() {
    var $this = $(this),
        $parent = $this.parent($switchTabList),
        $children = $parent.children($switchTab),
        $content = $parent.next($switchConList).children($switchCon),
        num = $children.index(this);

    $content.removeClass("is-active");
    $children.removeClass("is-active");
    $content.eq(num).addClass("is-active");
    $this.addClass("is-active");
  }));
}));

$((function() {
  var tabPram = function(name, opt_url) {
    if (name) {
      name = name.replace(/[\[\]]/g, "\\$&");
      opt_url || (opt_url = window.location.href);
      var results = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)").exec(opt_url);
      return results ? results[2] ? decodeURIComponent(results[2].replace(/\+/g, " ")) : "" : null;
    }
  }("tab");

  if (tabPram && $(".js-c-switch-tab").length > 0) {
    var tabPramArray = tabPram.split("_");
    if (tabPramArray) {
      var tabId = tabPramArray[0],
          tabNum = tabPramArray[1],
          $tabList = $('.js-c-switch-tab-list[data-tab-name="' + tabId + '"]'),
          $tabContentList = $('.js-c-switch-content-list[data-tab-name="' + tabId + '"]');

      $tabList.children(".js-c-switch-tab").removeClass("is-active");
      $tabContentList.children(".js-c-switch-content").removeClass("is-active");
      $tabContentList.children('.js-c-switch-content[data-tab-num="' + tabNum + '"]').addClass("is-active");
    }
  }
}));

$((function() {
  $(".js-c-toggle-trigger").on("click", (function() {
    var $this = $(this);
    $this.toggleClass("is-active");
    $this.next(".js-c-toggle-content").slideToggle(300);
  }));
}));


$((function() {
    // タッチデバイスかどうかを判定する関数
    function isTouchDevice() {
        return 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
    }
    // ウィンドウサイズに応じてナビゲーションの動作を切り替える関数
    function handleResize() {
        var isTouch = isTouchDevice();
        // デスクトップサイズ（1280px以上）の場合
        if (window.matchMedia('(min-width: 1280px)').matches) {
            // 既存のイベントリスナーを削除
            $(".has-child").off("mouseenter mouseleave click");
            if (isTouch) {
                // タッチデバイスの場合、タップで動作
                $(".has-child").on("click", function(e) {
                    var $this = $(this);
                    if (!$this.hasClass("is-active")) {
                        e.preventDefault();
                        $(".has-child").removeClass("is-active").find(".js-nav-toggle-content").slideUp(0);
                        $this.addClass("is-active");
                        $this.find(".js-nav-toggle-content").slideDown(0);
                    }
                });
            } else {
                // マウスデバイスの場合、マウスオーバーで動作
                $(".has-child").on("mouseenter", function() {
                    var $this = $(this);
                    $this.addClass("is-active");
                    //$this.find(".js-nav-toggle-content").slideDown(0);
                    $this.find(".js-nav-toggle-content").addClass("active");
                }).on("mouseleave", function() {
                    var $this = $(this);
                    $this.removeClass("is-active");
                    //$this.find(".js-nav-toggle-content").slideUp(0);
                    $this.find(".js-nav-toggle-content").removeClass("active");
                });
            }
        } else {
            // モバイルサイズの場合
            // マウスオーバーイベントとクリックイベントを削除
            $(".has-child").off("mouseenter mouseleave click");
            // クリックイベントを再設定
            $(".js-nav-toggle-trigger").off("click").on("click", function() {
                var $this = $(this);
                $this.toggleClass("is-active");
                $this.next(".js-nav-toggle-content").slideToggle(300);
            });
        }
    }
    // 初期化時に一度実行
    handleResize();
    // ウィンドウサイズが変更されるたびに実行
    $(window).on('resize', handleResize);
}));

$((function() {
    var $cta = $('.fixed__nav');
    var targetScroll = 50;

    $(window).on('scroll load', function() {
        if ($(this).scrollTop() > targetScroll) {
            $cta.addClass('is-show');
        } else {
            $cta.removeClass('is-show');
        }
    });
}));

$(function() {
    $('.l-g-navi__item').each(function() {
    var $item = $(this);
    
    // 親メニューのテキストを取得
    var $textElem = $item.find('.l-g-navi__item-link .nav-link-text');
    var parentText = $.trim($textElem.text());

    // 親タイトルのテキストをサブメニュー内に挿入
    if (parentText) {
        $item.find('.js-megamenu-parent-text').text(parentText);
    }

    // 親要素がリンク(<a>)を持っているかチェック
    var $parentLinkElem = $item.find('.l-g-navi__item-link a');
    var parentHref = $parentLinkElem.length ? $parentLinkElem.attr('href') : null;

    var $topLink = $item.find('.js-megamenu-top-link');

    // 有効な href が存在する場合のみ「〇〇〇TOP」リンクをセット
    if (parentHref && parentHref !== '#' && parentHref !== 'javascript:void(0)') {
        $topLink.attr('href', parentHref)
                .text(parentText + 'TOP')
                .show();
    } else {
        // 親要素が <p> や href なしの場合は TOP リンクを非表示にする
        $topLink.hide();
    }
    });
    
    function handleHeaderCompact() {
    var windowWidth = window.innerWidth || $(window).width();
    
    // 1280px 以上の場合のみスクロール判定
    if (windowWidth >= 1280) {
        if ($(window).scrollTop() > 50) {
        $('header').addClass('is-scrolled');
        } else {
        $('header').removeClass('is-scrolled');
        }
    } else {
        // 1280px 未満の場合は常にクラスを解除（通常サイズ維持）
        $('header').removeClass('is-scrolled');
    }
    }

    // スクロール時およびリサイズ時に実行
    $(window).on('scroll resize', function() {
    handleHeaderCompact();
    });

    // 初期ロード時にも実行
    handleHeaderCompact();
});

$(document).ready(function ($) {
  var $body = $('body');

  // 対象のクラス、またはPHP設定データが存在しない場合は終了
  if (typeof scrollBannerConfig === 'undefined' || !$body.is('.term-ipo, .term-roumu')) {
    return;
  }

  // カレントカテゴリーに対応する設定を取得
  var currentConfig = null;
  if ($body.hasClass('term-ipo')) {
    currentConfig = scrollBannerConfig['term-ipo'];
  } else if ($body.hasClass('term-roumu')) {
    currentConfig = scrollBannerConfig['term-roumu'];
  }

  // 画像・リンク情報が正しくセットされていない場合は終了
  if (!currentConfig || !currentConfig.imgSrc || !currentConfig.linkUrl) {
    return;
  }

  var $banner = $('#scroll-banner');
  if ($banner.length === 0) return;

  if (currentConfig.bannerId) {
    $('#banner-link a').attr('id', currentConfig.bannerId);
  }

  // バナーのHTML要素に動的にサムネイル画像とリンクをセット
  $('#banner-link a').attr('href', currentConfig.linkUrl);
  $('#banner-img').attr({
    'src': currentConfig.imgSrc,
    'alt': currentConfig.title
  });
  $('#banner-title').text(currentConfig.title);
  $('#banner-text').text(currentConfig.text);

  // --- スクロール表示制御（50%スクロールで表示） ---
  var bannerShown = false;
  var isDismissed = false;

  $(window).on('scroll', function () {
    if (bannerShown || isDismissed) return;

    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var documentHeight = $(document).height();
    var scrollableHeight = documentHeight - windowHeight;

    if (scrollableHeight > 0) {
      var scrollPercent = (scrollTop / scrollableHeight) * 100;

      if (scrollPercent >= 50) {
        $banner.fadeIn(400);
        bannerShown = true;
      }
    }
  });

  // 閉じるボタンの処理
  $('#banner-close').on('click', function (e) {
    e.preventDefault();
    $banner.fadeOut(200);
    isDismissed = true;
  });
});