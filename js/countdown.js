!function(a) {
    "use strict";
    a(document).ready(function() {
        a.fn.countdown = function(b, c) {
            function f() {
                var b = Date.parse(e.date) / 1e3, f = Math.floor(a.now() / 1e3);
                b <= f && (c.call(this), clearInterval(g));
                var h = b - f, i = Math.floor(h / 86400);
                h -= 60 * i * 60 * 24;
                var j = Math.floor(h / 3600);
                h -= 60 * j * 60;
                var k = Math.floor(h / 60);
                h -= 60 * k, 1 == i ? d.find(".timeRefDays").text("day") : d.find(".timeRefDays").text("days"), 1 == j ? d.find(".timeRefHours").text("hour") : d.find(".timeRefHours").text("hours"), 1 == k ? d.find(".timeRefMinutes").text("minute") : d.find(".timeRefMinutes").text("minutes"), 1 == h ? d.find(".timeRefSeconds").text("second") : d.find(".timeRefSeconds").text("seconds"), "on" == e.format && (i = String(i).length >= 2 ? i : "0" + i, j = String(j).length >= 2 ? j : "0" + j, k = String(k).length >= 2 ? k : "0" + k, h = String(h).length >= 2 ? h : "0" + h), isNaN(b) ? (alert("Invalid date. Here's an example: 12 Tuesday 2012 17:30:00"), clearInterval(g)) : (d.find(".days").text(i), d.find(".hours").text(j), d.find(".minutes").text(k), d.find(".seconds").text(h))
            }
            var d = a(this), e = {
                date: null,
                format: null
            };
            b && a.extend(e, b), f();
            var g = setInterval(f, 1e3)
        };
        var b = a(".start_countdown");
        b.each(function() {
            var b = a(this);
            if (b.length > 0) {
                var c = b.attr("data-date");
                b.countdown({
                    date: c,
                    format: "on"
                }, function() {})
            }
        })
    })
}(jQuery);

