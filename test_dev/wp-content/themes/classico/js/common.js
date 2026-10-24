/**
 * Reflow-Optimized common.js
 */
"use strict";

(function ($) {
  var $win = $(window);
  var $doc = $(document);

  // ユーティリティ: スクロール/リサイズ処理の最適化 (rafThrottle)
  function rafThrottle(fn) {
    var ticking = false;
    return function () {
      if (!ticking) {
        var context = this;
        var args = arguments;
        window.requestAnimationFrame(function () {
          fn.apply(context, args);
          ticking = false;
        });
        ticking = true;
      }
    };
  }

  // タッチデバイス判定
  function isTouchDevice() {
    return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
  }

  // URLパラメータ取得
  function getQueryParam(name, url) {
    if (!name) return null;
    name = name.replace(/[\[\]]/g, "\\$&");
    url || (url = window.location.href);
    var results = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)").exec(url);
    return results ? (results[2] ? decodeURIComponent(results[2].replace(/\+/g, " ")) : "") : null;
  }

  // DOM Ready
  $(function () {

    /* ====================================================
     * 1. Smooth Scroll
     * ==================================================== */
    $doc.on('click', 'a[href^="#"]', function (e) {
      var href = $(this).attr("href");
      if (!href || href === "#") return;

      var $target = $(href === "" ? 'html' : href);
      if ($target.length) {
        e.preventDefault();
        var position = $target.offset().top;
        $("html, body").animate({ scrollTop: position }, 500, "swing");
      }
    });

    /* ====================================================
     * 2. ハンバーガーメニュー
     * ==================================================== */
    $('#menu-btn').on('click', function () {
      var $this = $(this);
      var opened = $this.toggleClass('_opened').hasClass('_opened');
      $('#g-navi').toggleClass('is-active', opened);
    });

    /* ====================================================
     * 3. サブメニュー & ドロップダウン (CSSクラス切り替え化)
     * ==================================================== */
    var desktopMatcher = window.matchMedia('(min-width: 1280px)');

    function handleNavigation() {
      var isDesktop = desktopMatcher.matches;
      var $hasChild = $(".has-child");
      var $navTrigger = $(".js-nav-toggle-trigger");

      $hasChild.off("mouseenter mouseleave click");
      $navTrigger.off("click");

      if (isDesktop) {
        if (isTouchDevice()) {
          $hasChild.on("click", function (e) {
            var $this = $(this);
            if (!$this.hasClass("is-active")) {
              e.preventDefault();
              $hasChild.removeClass("is-active").find(".js-nav-toggle-content").removeClass("is-open");
              $this.addClass("is-active").find(".js-nav-toggle-content").addClass("is-open");
            }
          });
        } else {
          $hasChild.on("mouseenter", function () {
            $(this).addClass("is-active").find(".js-nav-toggle-content").addClass("active");
          }).on("mouseleave", function () {
            $(this).removeClass("is-active").find(".js-nav-toggle-content").removeClass("active");
          });
        }
      } else {
        $navTrigger.on("click", function () {
          var $this = $(this);
          $this.toggleClass("is-active");
          // JSのslideToggleではなくCSSクラス切替に変更
          $this.next(".js-nav-toggle-content").toggleClass("is-open");
        });

        $('.item-s').off('click').on('click', function () {
          var $this = $(this);
          $this.toggleClass('_opened');
          $this.children('.sub-menu').toggleClass("is-open");
        });
      }
    }

    handleNavigation();
    $win.on('resize', rafThrottle(handleNavigation));

    /* ====================================================
     * 4. Slick Slider 初期化
     * ==================================================== */
    var isMobile = window.matchMedia('(max-width: 767px)').matches;
    if (isMobile) {
      if ($('.slide').length) {
        $('.slide').slick({
          arrows: false,
          autoplay: true,
          adaptiveHeight: false, // リフロー防止のためfalseに推奨設定
          centerMode: true,
          centerPadding: "15%",
          accessibility: false,
        });
      }
      if ($('.slide02').length) {
        $('.slide02').slick({
          arrows: false,
          autoplay: true,
          adaptiveHeight: false, // リフロー防止のためfalseに推奨設定
          centerMode: true,
          centerPadding: "5%",
        });
      }
    } else {
      $('.slide').children('.item').css({ display: 'inline-block' });
      if ($('.slide02').length) {
        $('.slide02').slick({
          arrows: false,
          autoplay: true,
          infinite: true,
          centerMode: true,
          variableWidth: true,
        });
      }
    }

    /* ====================================================
     * 5. タブ切り替え機能
     * ==================================================== */
    $(".js-c-switch-tab").on("click", function () {
      var $this = $(this);
      var $parent = $this.parent(".js-c-switch-tab-list");
      var $children = $parent.children(".js-c-switch-tab");
      var $content = $parent.next(".js-c-switch-content-list").children(".js-c-switch-content");
      var num = $children.index(this);

      $content.removeClass("is-active");
      $children.removeClass("is-active");
      $content.eq(num).addClass("is-active");
      $this.addClass("is-active");
    });

    // URLパラメータによる初期タブ開閉
    var tabPram = getQueryParam("tab");
    if (tabPram && $(".js-c-switch-tab").length > 0) {
      var tabPramArray = tabPram.split("_");
      if (tabPramArray && tabPramArray.length >= 2) {
        var tabId = tabPramArray[0];
        var tabNum = tabPramArray[1];
        var $tabList = $('.js-c-switch-tab-list[data-tab-name="' + tabId + '"]');
        var $tabContentList = $('.js-c-switch-content-list[data-tab-name="' + tabId + '"]');

        $tabList.children(".js-c-switch-tab").removeClass("is-active");
        $tabContentList.children(".js-c-switch-content").removeClass("is-active");
        $tabContentList.children('.js-c-switch-content[data-tab-num="' + tabNum + '"]').addClass("is-active");
      }
    }

    /* ====================================================
     * 6. 汎用トグルアコーディオン (CSSクラス切り替え化)
     * ==================================================== */
    $(".js-c-toggle-trigger").on("click", function () {
      var $this = $(this);
      $this.toggleClass("is-active");
      // slideToggleの代わりにis-openクラスを切り替え
      $this.next(".js-c-toggle-content").toggleClass("is-open");
    });

    /* ====================================================
     * 7. スクロール検知機能の集約（レイアウト計測値の非同期読み取り化）
     * ==================================================== */
    var $cta = $('.fixed__nav');
    var $header = $('header');

    var handleScroll = rafThrottle(function () {
      var currentScroll = window.scrollY || window.pageYOffset;

      // 固定ナビ (CTA) の制御
      if (currentScroll > 50) {
        $cta.addClass('is-show');
      } else {
        $cta.removeClass('is-show');
      }

      // ヘッダーのコンパクト化制御
      if (desktopMatcher.matches) {
        if (currentScroll > 50) {
          $header.addClass('is-scrolled');
        } else {
          $header.removeClass('is-scrolled');
        }
      } else {
        $header.removeClass('is-scrolled');
      }
    });

    $win.on('scroll resize', handleScroll);
    handleScroll();

    /* ====================================================
     * 8. メガメニューテキスト補完
     * ==================================================== */
    $('.l-g-navi__item').each(function () {
      var $item = $(this);
      var $textElem = $item.find('.l-g-navi__item-link .nav-link-text');
      var parentText = $.trim($textElem.text());

      if (parentText) {
        $item.find('.js-megamenu-parent-text').text(parentText);
      }

      var $parentLinkElem = $item.find('.l-g-navi__item-link a');
      var parentHref = $parentLinkElem.length ? $parentLinkElem.attr('href') : null;
      var $topLink = $item.find('.js-megamenu-top-link');

      if (parentHref && parentHref !== '#' && parentHref !== 'javascript:void(0)') {
        $topLink.attr('href', parentHref).text(parentText + 'TOP').show();
      } else {
        $topLink.hide();
      }
    });

    /* ====================================================
     * 9. 50%スクロール時表示バナー (幾何的プロパティのキャッシュ化)
     * ==================================================== */
    (function initScrollBanner() {
      var $body = $('body');
      if (typeof scrollBannerConfig === 'undefined' || (!$body.hasClass('term-ipo') && !$body.hasClass('term-roumu'))) {
        return;
      }

      var currentConfig = $body.hasClass('term-ipo') ? scrollBannerConfig['term-ipo'] : scrollBannerConfig['term-roumu'];
      if (!currentConfig || !currentConfig.imgSrc || !currentConfig.linkUrl) return;

      var $banner = $('#scroll-banner');
      if ($banner.length === 0) return;

      if (currentConfig.bannerId) {
        $('#banner-link a').attr('id', currentConfig.bannerId);
      }

      $('#banner-link a').attr('href', currentConfig.linkUrl);
      $('#banner-img').attr({ 'src': currentConfig.imgSrc, 'alt': currentConfig.title });
      $('#banner-title').text(currentConfig.title);
      $('#banner-text').text(currentConfig.text);

      var bannerShown = false;
      var isDismissed = false;
      var cachedScrollableHeight = 0;

      // ウィンドウサイズ変化時のみドキュメント高さを計算（リフロー削減）
      function updateDimensions() {
        var windowHeight = window.innerHeight;
        var documentHeight = document.documentElement.scrollHeight;
        cachedScrollableHeight = documentHeight - windowHeight;
      }

      updateDimensions();
      $win.on('resize', rafThrottle(updateDimensions));

      var checkBannerScroll = rafThrottle(function () {
        if (bannerShown || isDismissed) return;

        var scrollTop = window.scrollY || window.pageYOffset;

        if (cachedScrollableHeight > 0) {
          var scrollPercent = (scrollTop / cachedScrollableHeight) * 100;
          if (scrollPercent >= 50) {
            $banner.addClass('is-show'); // CSS transition等で表示制御を推奨
            bannerShown = true;
          }
        }
      });

      $win.on('scroll', checkBannerScroll);

      $('#banner-close').on('click', function (e) {
        e.preventDefault();
        $banner.removeClass('is-show');
        isDismissed = true;
      });
    })();

  });
})(jQuery);