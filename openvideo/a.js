var BD_HY_VIDEOAD = {}; (function() {
    var F = {
        videoId: "BD_HY_VIDEOAD_" + new Date().getTime().toString().substring(5, 13),
        bgFlashShow: 0,
        bdLogoShow: "true",
        bdSmallShow: "true",
        bdLogo: "http://eiv.baidu.com/mapm2/0306videoTest/malogo.gif",
        bdSmallLogo: "http://eiv.baidu.com/mapm2/0306videoTest/malogo.gif",
        cookieTime: 1200000,
        playerWidth: 340,
        playerHeight: 300,
        minWidth: 177,
        minHeight: 85,
        bgWidth: 450,
        bgHeight: 400,
        playerSrc: "http://eiv.baidu.com/mapm2/0306videoNewPlayer/videoad.swf",
        videoSrc: "http://www.a.com/1.flv",
        imageSrc: "http://eiv.baidu.com/mapm2/ddt0129/1.jpg",
        bgSrc: "http://eiv.baidu.com/mapm2/0224videobg.swf",
        logoSwf: "http://eiv.baidu.com/mapm2/ddt0129/logo2.jpg",
        logoPic: "http://eiv.baidu.com/mapm2/ddt0129/logo.jpg",
        words: "\u767e\u5ea6\u5f39\u5f39\u5802\u706b\u7206\u5f00\u670d \u6ce8\u518c\u65e2\u9001 \u767e\u5143\u5927\u793c",
        ctIfShow: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3491&tu=d3d3LmJhaWR1LmNvbQ%3D%3D&std=0",
        ctAutoPlay: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3492&tu=d3d3LmJhaWR1LmNvbQ%3D%3D&std=0",
        ctReplay: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3492&tu=d3d3LmJhaWR1LmNvbQ%3D%3D&std=0",
        ctAllPlay: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3493&tu=d3d3LmJhaWR1LmNvbQ%3D%3D&std=0",
        ctClose: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3494&tu=d3d3LmJhaWR1LmNvbQ%3D%3D&std=0",
        ctVideoUrl: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3490&tu=aHR0cDovL3lvdXhpLmJhaWR1LmNvbS9wcm9tLnhodG1sP2NvZGU9JUI2JUU3JUFFJUU0JUJEJUQ1JTkyZSUyRiU5NyVGRG4lODk0JUY4JUEz&std=0",
        ctImageUrl: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3490&tu=aHR0cDovL3lvdXhpLmJhaWR1LmNvbS9wcm9tLnhodG1sP2NvZGU9JUI2JUU3JUFFJUU0JUJEJUQ1JTkyZSUyRiU5NyVGRG4lODk0JUY4JUEz&std=0",
        ctLogoUrl: "http://tk.baidu.com/tk-rcv/sv/click.php?trid=3490&tu=aHR0cDovL3lvdXhpLmJhaWR1LmNvbS9wcm9tLnhodG1sP2NvZGU9JUI2JUU3JUFFJUU0JUJEJUQ1JTkyZSUyRiU5NyVGRG4lODk0JUY4JUEz&std=0"


    },
    K = null,
    R = 0,
    P = !window.opera && (navigator.appVersion.indexOf("MSIE") != -1),
    J = P && (!window.XMLHttpRequest),
    $ = document.compatMode == "CSS1Compat",
    S = !P || (!J && $);
    function M(B, E, D, C, _, A) {
        if (D) {
            var $ = new Date();
            $.setTime($.getTime() + D)


        }
        document.cookie = B + "=" + encodeURIComponent(E) + ((D == null) ? "": ";expires=" + $.toGMTString()) + ((C == null) ? "": ";path=" + C) + ((_ == null) ? "": ";domain=" + _) + ((A) ? ";secure": "")


    }
    function D(A) {
        var $ = "(?:; )?" + A + "=([^;]*);?",
        _ = new RegExp($);
        if (_.test(document.cookie)) return decodeURIComponent(RegExp.$1);
        else return null


    }
    function Q(A, $, _) {
        if (A.addEventListener) A.addEventListener($, _, false);
        else if (A.attachEvent) A.attachEvent("on" + $, _);
        else A["on" + $] = _


    }
    BD_HY_VIDEOAD.setPosition = function(_) {
        var $ = document.getElementById(F.videoId + "_div");
        K = _;
        if (_ == "close") {
            M("BD_HY_VIDEOAD", "close", F.cookieTime);
            N(F.ctClose);
            I();
            $.style.display = "none"


        } else if (_ == "big") {
            if (!S) L();
            $.style.width = F.playerWidth + "px";
            $.style.height = F.playerHeight + "px"


        } else if (_ == "small") {
            $.style.width = F.minWidth + "px";
            $.style.height = F.minHeight + "px";
            if (!S) L()


        }


    };
    BD_HY_VIDEOAD.logoClick = function() {
        window.open(F.ctLogoUrl, "BDvideoAdNewWindow")


    };
    BD_HY_VIDEOAD.videoClick = function() {
        window.open(F.ctVideoUrl, "BDvideoAdNewWindow")


    };
    BD_HY_VIDEOAD.videoPicClick = function() {
        window.open(F.ctImageUrl, "BDvideoAdNewWindow")


    };
    BD_HY_VIDEOAD.videoAutoPlay = function() {
        N(F.ctAutoPlay);
        G()


    };
    BD_HY_VIDEOAD.videoReplay = function() {
        N(F.ctReplay);
        G()


    };
    BD_HY_VIDEOAD.videoStop = function() {
        N(F.ctAllPlay);
        I()


    };
    BD_HY_VIDEOAD.videoToSmall = function() {
        I()


    };
    function N($) { (new Image(1, 1)).src = $ + "&sendtime=" + new Date().getTime().toString()


    }
    function E(A, _, B) {
        if (document.compatMode && $) {
            A.style.top = document.documentElement.scrollTop + (document.documentElement.clientHeight - B) - 1;
            A.style.left = document.documentElement.scrollLeft + (document.documentElement.clientWidth - _) - 1


        } else {
            A.style.top = document.body.scrollTop + (document.body.clientHeight - B) - 1;
            A.style.left = document.body.scrollLeft + (document.body.clientWidth - _) - 1


        }


    }
    function L() {
        var _ = document.getElementById(F.videoId + "_div");
        if (K == "big") E(_, F.playerWidth, F.playerHeight);
        else if (K == "small") E(_, F.minWidth, F.minHeight);
        if (F.bgFlashShow == 1 && R == 1) {
            var $ = document.getElementById(F.videoId + "_bg");
            $.style.position = "absolute";
            if ($) E($, F.bgWidth, F.bgHeight)


        }


    }
    function H() {
        var $ = document.getElementById(F.videoId + "_div");
        if ($) {
            $.style.position = "absolute";
            L();
            Q(window, "resize", L);
            Q(window, "scroll", L)


        }


    }
    function G() {
        if (F.bgFlashShow == 1 && R == 0) {
            var $ = document.createElement("div");
            $.innerHTML = O(F.videoId + "_bgflash", F.bgSrc, F.bgWidth, F.bgHeight);
            $.id = F.videoId + "_bg";
            if (S) {
                $.style.position = "fixed";
                $.style.right = 0;
                $.style.bottom = 0


            }
            $.style.zIndex = 2047483647;
            document.body.appendChild($);
            R = 1;
            if (!S) L()


        }


    }
    function I() {
        if (F.bgFlashShow == 1 && R == 1) {
            document.body.removeChild(document.getElementById(F.videoId + "_bg"));
            R = 0


        }


    }
    function O(D, C, B, A, $) {
        var _ = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ' + 'codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="' + B + '" height="' + A + '" id="' + D + '" align="middle">' + '<param name="allowScriptAccess" value="always">' + '<param name="quality" value="high">' + '<param name="wmode" value="transparent">' + '<param name="movie" value="' + C + "?" + D + '">' + '<param name="flashvars" value="' + (!$ ? "": $) + '">' + '<embed src="' + C + '" flashvars="' + (!$ ? "": $) + '" quality="high" wmode="transparent" width="' + B + '" height="' + A + '" name="' + D + '" align="middle" allowScriptAccess="always" ' + 'type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></object>';
        return _


    }
    function B($) {
        var _ = "mode=" + $ + "&logomove=" + F.logoSwf + "&logopic=" + F.logoPic + "&vid=" + F.videoSrc + "&words=" + F.words + "&vpic=" + F.imageSrc + "&sl=" + F.bdLogoShow + "&ssl=" + F.bdSmallShow + "&bdlogo=" + F.bdLogo + "&bdslogo=" + F.bdSmallLogo;
        return _


    }
    function A() {
        var A = O(F.videoId + "_player", F.playerSrc, F.playerWidth, F.playerHeight, B(K)),
        $ = document.createElement("div");
        $.innerHTML = A;
        $.id = F.videoId + "_div";
        $.style.zIndex = 2147483647;
        $.style.overflow = "hidden";
        $.style.position = "fixed";
        $.style.right = 0;
        $.style.bottom = 0;
        if (K == "small") {
            $.style.width = F.minWidth + "px";
            $.style.height = F.minHeight + "px"


        } else if (K == "big") {
            $.style.width = F.playerWidth + "px";
            $.style.height = F.playerHeight + "px"


        }
        _($);
        if (!S) H();
        N(F.ctIfShow)


    }
    function _($) {
        if (P) {
            if (document.readyState == "complete") document.body.appendChild($);
            else document.onreadystatechange = function() {
                if (document.readyState == "complete") document.body.appendChild($)


            }


        } else document.body.appendChild($)


    }
    function C() {
        var $ = D("BD_HY_VIDEOAD");
        if ($ != "close") if ($ == "small") {
            K = "small";
            A()


        } else {
            K = "big";
            A();
            M("BD_HY_VIDEOAD", "small", F.cookieTime)


        }


    }
    Q(window, "load", C)


})()