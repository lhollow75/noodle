!function(a, b) {
    "function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? module.exports = b() : b()
}(this, function() {
    function t(b) {
        if (null === k) {
            for (var c = b.length, d = 0, e = document.getElementById(a), f = "<ul>"; d < c;)
                f += "<li>" + b[d] + "</li>", d++;
            f += "</ul>", e.innerHTML = f
        } else 
            k(b)
    }
    function u(a) {
        return a.replace(/<b[^>]*>(.*?)<\/b>/gi, function(a, b) {
            return b
        }).replace(/class="(?!(tco-hidden|tco-display|tco-ellipsis))+.*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi, "")
    }
    function v(a) {
        for (var b = a.getElementsByTagName("a"), c = b.length - 1; c >= 0; c--)
            b[c].setAttribute("target", "_blank")
    }
    function w(a, b) {
        for (var c = [], d = new RegExp("(^| )" + b + "( |$)"), e = a.getElementsByTagName("*"), f = 0, g = e.length; f < g; f++)
            d.test(e[f].className) && c.push(e[f]);
        return c
    }
    function x(a) {
        if (void 0 !== a && a.innerHTML.indexOf("data-srcset") >= 0) {
            var b = a.innerHTML.match(/data-srcset="([A-z0-9%_\.-]+)/i)[0];
            return decodeURIComponent(b).split('"')[1]
        }
    }
    var a = "", b = 20, c=!0, d = [], e=!1, f=!0, g=!0, h = null, i=!0, j=!0, k = null, l=!0, m=!1, n=!0, o = "en", p=!0, q=!1, r = null, y = {
        fetch: function(i) {
            if (void 0 === i.maxTweets && (i.maxTweets = 20), void 0 === i.enableLinks && (i.enableLinks=!0)
                , void 0 === i.showUser && (i.showUser=!0), void 0 === i.showTime && (i.showTime=!0), void 0 === i.dateFunction && (i.dateFunction = "default"), void 0 === i.showRetweet && (i.showRetweet=!0), void 0 === i.customCallback && (i.customCallback = null), void 0 === i.showInteraction && (i.showInteraction=!0), void 0 === i.showImages && (i.showImages=!1), void 0 === i.linksInNewWindow && (i.linksInNewWindow=!0), void 0 === i.showPermalinks && (i.showPermalinks=!0), void 0 === i.dataOnly && (i.dataOnly=!1), e)d.push(i);
            else {
                e=!0, a = i.domId, b = i.maxTweets, c = i.enableLinks, g = i.showUser, f = i.showTime, j = i.showRetweet, h = i.dateFunction, k = i.customCallback, l = i.showInteraction, m = i.showImages, n = i.linksInNewWindow, p = i.showPermalinks, q = i.dataOnly;
                var s = document.getElementsByTagName("head")[0];
                null !== r && s.removeChild(r), r = document.createElement("script"), r.type = "text/javascript", r.src = "https://cdn.syndication.twimg.com/widgets/timelines/" + i.id + "?&lang=" + (i.lang || o) + "&callback=twitterFetcher.callback&suppress_response_codes=true&rnd=" + Math.random(), s.appendChild(r)
            }
        },
        callback: function(a) {
            function o(a) {
                var b = a.getElementsByTagName("img")[0];
                return b.src = b.getAttribute("data-src-2x"), a
            }
            var k = document.createElement("div");
            k.innerHTML = a.body, "undefined" == typeof k.getElementsByClassName && (i=!1);
            var r = [], s = [], z = [], A = [], B = [], C = [], D = [], E = 0;
            if (i)
                for (var F = k.getElementsByClassName("timeline-Tweet"); E < F.length;)
                    F[E].getElementsByClassName("timeline-Tweet-retweetCredit").length > 0 ? B.push(!0) : B.push(!1), (!B[E] || B[E] && j) && (r.push(F[E].getElementsByClassName("timeline-Tweet-text")[0]), C.push(F[E].getAttribute("data-tweet-id")), s.push(o(F[E].getElementsByClassName("timeline-Tweet-author")[0])), z.push(F[E].getElementsByClassName("dt-updated")[0]), D.push(F[E].getElementsByClassName("timeline-Tweet-timestamp")[0]), void 0 !== F[E].getElementsByClassName("timeline-Tweet-media")[0] ? A.push(F[E].getElementsByClassName("timeline-Tweet-media")[0]) : A.push(void 0)), E++;
            else 
                for (var F = w(k, "timeline-Tweet"); E < F.length;)
                    w(F[E], "timeline-Tweet-retweetCredit").length > 0 ? B.push(!0) : B.push(!1), (!B[E] || B[E] && j) && (r.push(w(F[E], "timeline-Tweet-text")[0]), C.push(F[E].getAttribute("data-tweet-id")), s.push(o(w(F[E], "timeline-Tweet-author")[0])), z.push(w(F[E], "dt-updated")[0]), D.push(w(F[E], "timeline-Tweet-timestamp")[0]), void 0 !== w(F[E], "timeline-Tweet-media")[0] ? A.push(w(F[E], "timeline-Tweet-media")[0]) : A.push(void 0)), E++;
            r.length > b && (r.splice(b, r.length - b), s.splice(b, s.length - b), z.splice(b, z.length - b), B.splice(b, B.length - b), A.splice(b, A.length - b), D.splice(b, D.length - b));
            var G = [], E = r.length, H = 0;
            if (q)
                for (; H < E;)
                    G.push({
                        tweet: r[H].innerHTML,
                        author: s[H].innerHTML,
                        time: z[H].textContent,
                        image: x(A[H]),
                        rt: B[H],
                        tid: C[H],
                        permalinkURL: void 0 === D[H] ? "": D[H].href
                    }), H++;
            else 
                for (; H < E;) {
                    if ("string" != typeof h) {
                        var I = z[H].getAttribute("datetime"), J = new Date(z[H].getAttribute("datetime").replace(/-/g, "/").replace("T", " ").split("+")[0]), K = h(J, I);
                        if (z[H].setAttribute("aria-label", K), r[H].textContent)
                            if (i)
                                z[H].textContent = K;
                            else {
                                var L = document.createElement("p"), M = document.createTextNode(K);
                                L.appendChild(M), L.setAttribute("aria-label", K), z[H] = L
                            } else 
                                z[H].textContent = K
                    }
                    var N = "";
                    c ? (n && (v(r[H]), g && v(s[H])), g && (N += '<div class="user">' + u(s[H].innerHTML) + "</div>"), N += '<p class="tweet">' + u(r[H].innerHTML) + "</p>", f && (N += p ? '<p class="timePosted"><a href="' + D[H] + '">' + z[H].getAttribute("aria-label") + "</a></p>" : '<p class="timePosted">' + z[H].getAttribute("aria-label") + "</p>")) : r[H].textContent ? (g && (N += '<p class="user">' + s[H].textContent + "</p>"), N += '<p class="tweet">' + r[H].textContent + "</p>", f && (N += '<p class="timePosted">' + z[H].textContent + "</p>")) : (g && (N += '<p class="user">' + s[H].textContent + "</p>"), N += '<p class="tweet">' + r[H].textContent + "</p>", f && (N += '<p class="timePosted">' + z[H].textContent + "</p>")), l && (N += '<p class="interact"><a href="https://twitter.com/intent/tweet?in_reply_to=' + C[H] + '" class="twitter_reply_icon"' + (n ? ' target="_blank">' : ">") + 'Reply</a><a href="https://twitter.com/intent/retweet?tweet_id=' + C[H] + '" class="twitter_retweet_icon"' + (n ? ' target="_blank">' : ">") + 'Retweet</a><a href="https://twitter.com/intent/favorite?tweet_id=' + C[H] + '" class="twitter_fav_icon"' + (n ? ' target="_blank">' : ">") + "Favorite</a></p>"), m && void 0 !== A[H] && (N += '<div class="media"><img src="' + x(A[H]) + '" alt="Image from tweet" /></div>'), G.push(N), H++
                }
            t(G), e=!1, d.length > 0 && (y.fetch(d[0]), d.splice(0, 1))
        }
    };
    return window.twitterFetcher = y, y
});

