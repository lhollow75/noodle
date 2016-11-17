!function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("undefined" != typeof jQuery ? jQuery : window.Zepto)
}(function(a) {
    "use strict";
    function b(b) {
        var c = b.data;
        b.isDefaultPrevented() || (b.preventDefault(), a(b.target).ajaxSubmit(c))
    }
    function c(b) {
        var c = b.target, d = a(c);
        if (!d.is("[type=submit],[type=image]")) {
            var e = d.closest("[type=submit]");
            if (0 === e.length)
                return;
            c = e[0]
        }
        var f = this;
        if (f.clk = c, "image" == c.type)
            if (void 0 !== b.offsetX)
                f.clk_x = b.offsetX, f.clk_y = b.offsetY;
            else if ("function" == typeof a.fn.offset) {
                var g = d.offset();
                f.clk_x = b.pageX - g.left, f.clk_y = b.pageY - g.top
            } else 
                f.clk_x = b.pageX - c.offsetLeft, f.clk_y = b.pageY - c.offsetTop;
        setTimeout(function() {
            f.clk = f.clk_x = f.clk_y = null
        }, 100)
    }
    function d() {
        if (a.fn.ajaxSubmit.debug) {
            var b = "[jquery.form] " + Array.prototype.join.call(arguments, "");
            window.console && window.console.log ? window.console.log(b) : window.opera && window.opera.postError && window.opera.postError(b)
        }
    }
    var e = {};
    e.fileapi = void 0 !== a("<input type='file'/>").get(0).files, e.formdata = void 0 !== window.FormData;
    var f=!!a.fn.prop;
    a.fn.attr2 = function() {
        if (!f)
            return this.attr.apply(this, arguments);
        var a = this.prop.apply(this, arguments);
        return a && a.jquery || "string" == typeof a ? a : this.attr.apply(this, arguments)
    }, a.fn.ajaxSubmit = function(b) {
        function c(c) {
            var d, e, f = a.param(c, b.traditional).split("&"), g = f.length, h = [];
            for (d = 0; g > d; d++)
                f[d] = f[d].replace(/\+/g, " "), e = f[d].split("="), h.push([decodeURIComponent(e[0]), decodeURIComponent(e[1])]);
            return h
        }
        function g(d) {
            for (var e = new FormData, f = 0; f < d.length; f++)
                e.append(d[f].name, d[f].value);
            if (b.extraData) {
                var g = c(b.extraData);
                for (f = 0; f < g.length; f++)
                    g[f] && e.append(g[f][0], g[f][1])
            }
            b.data = null;
            var h = a.extend(!0, {}, a.ajaxSettings, b, {
                contentType: !1,
                processData: !1,
                cache: !1,
                type: i || "POST"
            });
            b.uploadProgress && (h.xhr = function() {
                var c = a.ajaxSettings.xhr();
                return c.upload && c.upload.addEventListener("progress", function(a) {
                    var c = 0, d = a.loaded || a.position, e = a.total;
                    a.lengthComputable && (c = Math.ceil(d / e * 100)), b.uploadProgress(a, d, e, c)
                }, !1), c
            }), h.data = null;
            var j = h.beforeSend;
            return h.beforeSend = function(a, c) {
                c.data = b.formData ? b.formData : e, j && j.call(this, a, c)
            }, a.ajax(h)
        }
        function h(c) {
            function e(a) {
                var b = null;
                try {
                    a.contentWindow && (b = a.contentWindow.document)
                } catch (a) {
                    d("cannot get iframe.contentWindow document: " + a)
                }
                if (b)
                    return b;
                try {
                    b = a.contentDocument ? a.contentDocument : a.document
                } catch (c) {
                    d("cannot get iframe.contentDocument: " + c), b = a.document
                }
                return b
            }
            function g() {
                function b() {
                    try {
                        var a = e(r).readyState;
                        d("state = " + a), a && "uninitialized" == a.toLowerCase() && setTimeout(b, 50)
                    } catch (a) {
                        d("Server abort: ", a, " (", a.name, ")"), h(A), w && clearTimeout(w), w = void 0
                    }
                }
                var c = l.attr2("target"), f = l.attr2("action"), g = "multipart/form-data", j = l.attr("enctype") || l.attr("encoding") || g;
                x.setAttribute("target", o), (!i || /post/i.test(i)) && x.setAttribute("method", "POST"), f != m.url && x.setAttribute("action", m.url), m.skipEncodingOverride || i&&!/post/i.test(i) || l.attr({
                    encoding: "multipart/form-data",
                    enctype: "multipart/form-data"
                }), m.timeout && (w = setTimeout(function() {
                    v=!0, h(z)
                }, m.timeout));
                var k = [];
                try {
                    if (m.extraData)
                        for (var n in m.extraData)
                            m.extraData.hasOwnProperty(n) && k.push(a.isPlainObject(m.extraData[n]) && m.extraData[n].hasOwnProperty("name") && m.extraData[n].hasOwnProperty("value") ? a('<input type="hidden" name="' + m.extraData[n].name + '">').val(m.extraData[n].value).appendTo(x)[0] : a('<input type="hidden" name="' + n + '">').val(m.extraData[n]).appendTo(x)[0]);
                    m.iframeTarget || q.appendTo("body"), r.attachEvent ? r.attachEvent("onload", h) : r.addEventListener("load", h, !1), setTimeout(b, 15);
                    try {
                        x.submit()
                    } catch (a) {
                        var p = document.createElement("form").submit;
                        p.apply(x)
                    }
                } finally {
                    x.setAttribute("action", f), x.setAttribute("enctype", j), c ? x.setAttribute("target", c) : l.removeAttr("target"), a(k).remove()
                }
            }
            function h(b) {
                if (!s.aborted&&!F) {
                    if (E = e(r), E || (d("cannot access response document"), b = A), b === z && s)
                        return s.abort("timeout"), void y.reject(s, "timeout");
                    if (b == A && s)
                        return s.abort("server abort"), void y.reject(s, "error", "server abort");
                    if (E && E.location.href != m.iframeSrc || v) {
                        r.detachEvent ? r.detachEvent("onload", h) : r.removeEventListener("load", h, !1);
                        var c, f = "success";
                        try {
                            if (v)
                                throw "timeout";
                            var g = "xml" == m.dataType || E.XMLDocument || a.isXMLDoc(E);
                            if (d("isXml=" + g), !g && window.opera && (null === E.body ||!E.body.innerHTML)&&--G)
                                return d("requeing onLoad callback, DOM not available"), void setTimeout(h, 250);
                            var i = E.body ? E.body: E.documentElement;
                            s.responseText = i ? i.innerHTML : null, s.responseXML = E.XMLDocument ? E.XMLDocument : E, g && (m.dataType = "xml"), s.getResponseHeader = function(a) {
                                var b = {
                                    "content-type": m.dataType
                                };
                                return b[a.toLowerCase()]
                            }, i && (s.status = Number(i.getAttribute("status")) || s.status, s.statusText = i.getAttribute("statusText") || s.statusText);
                            var j = (m.dataType || "").toLowerCase(), k = /(json|script|text)/.test(j);
                            if (k || m.textarea) {
                                var l = E.getElementsByTagName("textarea")[0];
                                if (l)
                                    s.responseText = l.value, s.status = Number(l.getAttribute("status")) || s.status, s.statusText = l.getAttribute("statusText") || s.statusText;
                                else if (k) {
                                    var o = E.getElementsByTagName("pre")[0], p = E.getElementsByTagName("body")[0];
                                    o ? s.responseText = o.textContent ? o.textContent : o.innerText : p && (s.responseText = p.textContent ? p.textContent : p.innerText)
                                }
                            } else 
                                "xml" == j&&!s.responseXML && s.responseText && (s.responseXML = H(s.responseText));
                            try {
                                D = J(s, j, m)
                            } catch (a) {
                                f = "parsererror", s.error = c = a || f
                            }
                        } catch (a) {
                            d("error caught: ", a), f = "error", s.error = c = a || f
                        }
                        s.aborted && (d("upload aborted"), f = null), s.status && (f = s.status >= 200 && s.status < 300 || 304 === s.status ? "success" : "error"), "success" === f ? (m.success && m.success.call(m.context, D, "success", s), y.resolve(s.responseText, "success", s), n && a.event.trigger("ajaxSuccess", [s, m])) : f && (void 0 === c && (c = s.statusText), m.error && m.error.call(m.context, s, f, c), y.reject(s, "error", c), n && a.event.trigger("ajaxError", [s, m, c])), n && a.event.trigger("ajaxComplete", [s, m]), n&&!--a.active && a.event.trigger("ajaxStop"), m.complete && m.complete.call(m.context, s, f), F=!0, m.timeout && clearTimeout(w), setTimeout(function() {
                            m.iframeTarget ? q.attr("src", m.iframeSrc) : q.remove(), s.responseXML = null
                        }, 100)
                    }
                }
            }
            var j, k, m, n, o, q, r, s, t, u, v, w, x = l[0], y = a.Deferred();
            if (y.abort = function(a) {
                s.abort(a)
            }, c)
                for (k = 0; k < p.length; k++)
                    j = a(p[k]), f ? j.prop("disabled", !1) : j.removeAttr("disabled");
            if (m = a.extend(!0, {}, a.ajaxSettings, b), m.context = m.context || m, o = "jqFormIO" + (new Date).getTime(), m.iframeTarget ? (q = a(m.iframeTarget), u = q.attr2("name"), u ? o = u : q.attr2("name", o)) : (q = a('<iframe name="' + o + '" src="' + m.iframeSrc + '" />'), q.css({
                position: "absolute",
                top: "-1000px",
                left: "-1000px"
            })), r = q[0], s = {
                aborted: 0,
                responseText: null,
                responseXML: null,
                status: 0,
                statusText: "n/a",
                getAllResponseHeaders: function() {},
                getResponseHeader: function() {},
                setRequestHeader: function() {},
                abort: function(b) {
                    var c = "timeout" === b ? "timeout": "aborted";
                    d("aborting upload... " + c), this.aborted = 1;
                    try {
                        r.contentWindow.document.execCommand && r.contentWindow.document.execCommand("Stop")
                    } catch (a) {}
                    q.attr("src", m.iframeSrc), s.error = c, m.error && m.error.call(m.context, s, c, b), n && a.event.trigger("ajaxError", [s, m, c]), m.complete && m.complete.call(m.context, s, c)
                }
            }, n = m.global, n && 0 === a.active++&&a.event.trigger("ajaxStart"), n && a.event.trigger("ajaxSend", [s, m]), m.beforeSend && m.beforeSend.call(m.context, s, m)===!1)return m.global && a.active--, y.reject(), y;
            if (s.aborted)
                return y.reject(), y;
            t = x.clk, t && (u = t.name, u&&!t.disabled && (m.extraData = m.extraData || {}, m.extraData[u] = t.value, "image" == t.type && (m.extraData[u + ".x"] = x.clk_x, m.extraData[u + ".y"] = x.clk_y)));
            var z = 1, A = 2, B = a("meta[name=csrf-token]").attr("content"), C = a("meta[name=csrf-param]").attr("content");
            C && B && (m.extraData = m.extraData || {}, m.extraData[C] = B), m.forceSync ? g() : setTimeout(g, 10);
            var D, E, F, G = 50, H = a.parseXML || function(a, b) {
                return window.ActiveXObject ? (b = new ActiveXObject("Microsoft.XMLDOM"), b.async = "false", b.loadXML(a)) : b = (new DOMParser).parseFromString(a, "text/xml"), b && b.documentElement && "parsererror" != b.documentElement.nodeName ? b : null
            }, I = a.parseJSON || function(a) {
                return window.eval("(" + a + ")")
            }, J = function(b, c, d) {
                var e = b.getResponseHeader("content-type") || "", f = "xml" === c ||!c && e.indexOf("xml") >= 0, g = f ? b.responseXML: b.responseText;
                return f && "parsererror" === g.documentElement.nodeName && a.error && a.error("parsererror"), d && d.dataFilter && (g = d.dataFilter(g, c)), "string" == typeof g && ("json" === c ||!c && e.indexOf("json") >= 0 ? g = I(g) : ("script" === c ||!c && e.indexOf("javascript") >= 0) && a.globalEval(g)), g
            };
            return y
        }
        if (!this.length)
            return d("ajaxSubmit: skipping submit process - no element selected"), this;
        var i, j, k, l = this;
        "function" == typeof b ? b = {
            success: b
        } : void 0 === b && (b = {}), i = b.type || this.attr2("method"), j = b.url || this.attr2("action"), k = "string" == typeof j ? a.trim(j) : "", k = k || window.location.href || "", k && (k = (k.match(/^([^#]+)/) || [])[1]), b = a.extend(!0, {
            url: k,
            success: a.ajaxSettings.success,
            type: i || a.ajaxSettings.type,
            iframeSrc: /^https/i.test(window.location.href || "") ? "javascript:false": "about:blank"
        }, b);
        var m = {};
        if (this.trigger("form-pre-serialize", [this, b, m]), m.veto)
            return d("ajaxSubmit: submit vetoed via form-pre-serialize trigger"), this;
        if (b.beforeSerialize && b.beforeSerialize(this, b)===!1)
            return d("ajaxSubmit: submit aborted via beforeSerialize callback"), this;
        var n = b.traditional;
        void 0 === n && (n = a.ajaxSettings.traditional);
        var o, p = [], q = this.formToArray(b.semantic, p);
        if (b.data && (b.extraData = b.data, o = a.param(b.data, n)), b.beforeSubmit && b.beforeSubmit(q, this, b)===!1)
            return d("ajaxSubmit: submit aborted via beforeSubmit callback"), this;
        if (this.trigger("form-submit-validate", [q, this, b, m]), m.veto)
            return d("ajaxSubmit: submit vetoed via form-submit-validate trigger"), this;
        var r = a.param(q, n);
        o && (r = r ? r + "&" + o : o), "GET" == b.type.toUpperCase() ? (b.url += (b.url.indexOf("?") >= 0 ? "&" : "?") + r, b.data = null) : b.data = r;
        var s = [];
        if (b.resetForm && s.push(function() {
            l.resetForm()
        }), b.clearForm && s.push(function() {
            l.clearForm(b.includeHidden)
        }), !b.dataType && b.target) {
            var t = b.success || function() {};
            s.push(function(c) {
                var d = b.replaceTarget ? "replaceWith": "html";
                a(b.target)[d](c).each(t, arguments)
            })
        } else 
            b.success && s.push(b.success);
        if (b.success = function(a, c, d) {
            for (var e = b.context || this, f = 0, g = s.length; g > f; f++)
                s[f].apply(e, [a, c, d || l, l])
        }, b.error) {
            var u = b.error;
            b.error = function(a, c, d) {
                var e = b.context || this;
                u.apply(e, [a, c, d, l])
            }
        }
        if (b.complete) {
            var v = b.complete;
            b.complete = function(a, c) {
                var d = b.context || this;
                v.apply(d, [a, c, l])
            }
        }
        var w = a("input[type=file]:enabled", this).filter(function() {
            return "" !== a(this).val()
        }), x = w.length > 0, y = "multipart/form-data", z = l.attr("enctype") == y || l.attr("encoding") == y, A = e.fileapi && e.formdata;
        d("fileAPI :" + A);
        var B, C = (x || z)&&!A;
        b.iframe!==!1 && (b.iframe || C) ? b.closeKeepAlive ? a.get(b.closeKeepAlive, function() {
            B = h(q)
        }) : B = h(q) : B = (x || z) && A ? g(q) : a.ajax(b), l.removeData("jqxhr").data("jqxhr", B);
        for (var D = 0; D < p.length; D++)
            p[D] = null;
        return this.trigger("form-submit-notify", [this, b]), this
    }, a.fn.ajaxForm = function(e) {
        if (e = e || {}, e.delegation = e.delegation && a.isFunction(a.fn.on), !e.delegation && 0 === this.length) {
            var f = {
                s: this.selector,
                c: this.context
            };
            return !a.isReady && f.s ? (d("DOM not ready, queuing ajaxForm"), a(function() {
                a(f.s, f.c).ajaxForm(e)
            }), this) : (d("terminating; zero elements found by selector" + (a.isReady ? "" : " (DOM not ready)")), this)
        }
        return e.delegation ? (a(document).off("submit.form-plugin", this.selector, b).off("click.form-plugin", this.selector, c).on("submit.form-plugin", this.selector, e, b).on("click.form-plugin", this.selector, e, c), this) : this.ajaxFormUnbind().bind("submit.form-plugin", e, b).bind("click.form-plugin", e, c)
    }, a.fn.ajaxFormUnbind = function() {
        return this.unbind("submit.form-plugin click.form-plugin")
    }, a.fn.formToArray = function(b, c) {
        var d = [];
        if (0 === this.length)
            return d;
        var f, g = this[0], h = this.attr("id"), i = b ? g.getElementsByTagName("*"): g.elements;
        if (i&&!/MSIE [678]/.test(navigator.userAgent) && (i = a(i).get()), h && (f = a(':input[form="' + h + '"]').get(), f.length && (i = (i || []).concat(f))), !i ||!i.length)
            return d;
        var j, k, l, m, n, o, p;
        for (j = 0, o = i.length; o > j; j++)
            if (n = i[j], l = n.name, l&&!n.disabled)
                if (b && g.clk && "image" == n.type)
                    g.clk == n && (d.push({
                        name: l,
                        value: a(n).val(),
                        type: n.type
                    }), d.push({
                        name: l + ".x",
                        value: g.clk_x
                    }, {
                        name: l + ".y",
                        value: g.clk_y
                    }));
                else if (m = a.fieldValue(n, !0), m && m.constructor == Array)
                    for (c && c.push(n), k = 0, p = m.length; p > k; k++)
                        d.push({
                            name: l,
                            value: m[k]
                        });
                else if (e.fileapi && "file" == n.type) {
                    c && c.push(n);
                    var q = n.files;
                    if (q.length)
                        for (k = 0; k < q.length; k++)
                            d.push({
                                name: l,
                                value: q[k],
                                type: n.type
                            });
                    else 
                        d.push({
                            name: l,
                            value: "",
                            type: n.type
                        })
                } else 
                    null !== m && "undefined" != typeof m && (c && c.push(n), d.push({
                        name: l,
                        value: m,
                        type: n.type,
                        required: n.required
                    }));
        if (!b && g.clk) {
            var r = a(g.clk), s = r[0];
            l = s.name, l&&!s.disabled && "image" == s.type && (d.push({
                name: l,
                value: r.val()
            }), d.push({
                name: l + ".x",
                value: g.clk_x
            }, {
                name: l + ".y",
                value: g.clk_y
            }))
        }
        return d
    }, a.fn.formSerialize = function(b) {
        return a.param(this.formToArray(b))
    }, a.fn.fieldSerialize = function(b) {
        var c = [];
        return this.each(function() {
            var d = this.name;
            if (d) {
                var e = a.fieldValue(this, b);
                if (e && e.constructor == Array)
                    for (var f = 0, g = e.length; g > f; f++)
                        c.push({
                            name: d,
                            value: e[f]
                        });
                else 
                    null !== e && "undefined" != typeof e && c.push({
                        name: this.name,
                        value: e
                    })
            }
        }), a.param(c)
    }, a.fn.fieldValue = function(b) {
        for (var c = [], d = 0, e = this.length; e > d; d++) {
            var f = this[d], g = a.fieldValue(f, b);
            null === g || "undefined" == typeof g || g.constructor == Array&&!g.length || (g.constructor == Array ? a.merge(c, g) : c.push(g))
        }
        return c
    }, a.fieldValue = function(b, c) {
        var d = b.name, e = b.type, f = b.tagName.toLowerCase();
        if (void 0 === c && (c=!0), c && (!d || b.disabled || "reset" == e || "button" == e || ("checkbox" == e || "radio" == e)&&!b.checked || ("submit" == e || "image" == e) && b.form && b.form.clk != b || "select" == f&&-1 == b.selectedIndex)
            )return null;
        if ("select" == f) {
            var g = b.selectedIndex;
            if (0 > g)
                return null;
            for (var h = [], i = b.options, j = "select-one" == e, k = j ? g + 1 : i.length, l = j ? g : 0; k > l; l++) {
                var m = i[l];
                if (m.selected) {
                    var n = m.value;
                    if (n || (n = m.attributes && m.attributes.value&&!m.attributes.value.specified ? m.text : m.value), j)
                        return n;
                    h.push(n)
                }
            }
            return h
        }
        return a(b).val()
    }, a.fn.clearForm = function(b) {
        return this.each(function() {
            a("input,select,textarea", this).clearFields(b)
        })
    }, a.fn.clearFields = a.fn.clearInputs = function(b) {
        var c = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
        return this.each(function() {
            var d = this.type, e = this.tagName.toLowerCase();
            c.test(d) || "textarea" == e ? this.value = "" : "checkbox" == d || "radio" == d ? this.checked=!1 : "select" == e ? this.selectedIndex =- 1 : "file" == d ? /MSIE/.test(navigator.userAgent) ? a(this).replaceWith(a(this).clone(!0)) : a(this).val("") : b && (b===!0 && /hidden/.test(d) || "string" == typeof b && a(this).is(b)) && (this.value = "")
        })
    }, a.fn.resetForm = function() {
        return this.each(function() {
            ("function" == typeof this.reset || "object" == typeof this.reset&&!this.reset.nodeType) && this.reset()
        })
    }, a.fn.enable = function(a) {
        return void 0 === a && (a=!0), this.each(function() {
            this.disabled=!a
        })
    }, a.fn.selected = function(b) {
        return void 0 === b && (b=!0), this.each(function() {
            var c = this.type;
            if ("checkbox" == c || "radio" == c)
                this.checked = b;
            else if ("option" == this.tagName.toLowerCase()) {
                var d = a(this).parent("select");
                b && d[0] && "select-one" == d[0].type && d.find("option").selected(!1), this.selected = b
            }
        })
    }, a.fn.ajaxSubmit.debug=!1
}), !function(a) {
    a.extend(a.fn, {
        validate: function(b) {
            if (!this.length)
                return void(b && b.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."));
            var c = a.data(this[0], "validator");
            return c ? c : (this.attr("novalidate", "novalidate"), c = new a.validator(b, this[0]), a.data(this[0], "validator", c), c.settings.onsubmit && (this.validateDelegate(":submit", "click", function(b) {
                c.settings.submitHandler && (c.submitButton = b.target), a(b.target).hasClass("cancel") && (c.cancelSubmit=!0), void 0 !== a(b.target).attr("formnovalidate") && (c.cancelSubmit=!0)
            }), this.submit(function(b) {
                function d() {
                    var d;
                    return !c.settings.submitHandler || (c.submitButton && (d = a("<input type='hidden'/>").attr("name", c.submitButton.name).val(a(c.submitButton).val()).appendTo(c.currentForm)), c.settings.submitHandler.call(c, c.currentForm, b), c.submitButton && d.remove(), !1)
                }
                return c.settings.debug && b.preventDefault(), c.cancelSubmit ? (c.cancelSubmit=!1, d()) : c.form() ? c.pendingRequest ? (c.formSubmitted=!0, !1) : d() : (c.focusInvalid(), !1)
            })), c)
        },
        valid: function() {
            var b, c;
            return a(this[0]).is("form") ? b = this.validate().form() : (b=!0, c = a(this[0].form).validate(), this.each(function() {
                b = c.element(this) && b
            })), b
        },
        removeAttrs: function(b) {
            var c = {}, d = this;
            return a.each(b.split(/\s/), function(a, b) {
                c[b] = d.attr(b), d.removeAttr(b)
            }), c
        },
        rules: function(b, c) {
            var d, e, f, g, h, i, j = this[0];
            if (b)
                switch (d = a.data(j.form, "validator").settings, e = d.rules, f = a.validator.staticRules(j), b) {
                case"add":
                    a.extend(f, a.validator.normalizeRule(c)), delete f.messages, e[j.name] = f, c.messages && (d.messages[j.name] = a.extend(d.messages[j.name], c.messages));
                    break;
                case"remove":
                    return c ? (i = {}, a.each(c.split(/\s/), function(b, c) {
                        i[c] = f[c], delete f[c], "required" === c && a(j).removeAttr("aria-required")
                    }), i) : (delete e[j.name], f)
                }
            return g = a.validator.normalizeRules(a.extend({}, a.validator.classRules(j), a.validator.attributeRules(j), a.validator.dataRules(j), a.validator.staticRules(j)), j), g.required && (h = g.required, delete g.required, g = a.extend({
                required: h
            }, g), a(j).attr("aria-required", "true")), g.remote && (h = g.remote, delete g.remote, g = a.extend(g, {
                remote: h
            })), g
        }
    }), a.extend(a.expr[":"], {
        blank: function(b) {
            return !a.trim("" + a(b).val())
        },
        filled: function(b) {
            return !!a.trim("" + a(b).val())
        },
        unchecked: function(b) {
            return !a(b).prop("checked")
        }
    }), a.validator = function(b, c) {
        this.settings = a.extend(!0, {}, a.validator.defaults, b), this.currentForm = c, this.init()
    }, a.validator.format = function(b, c) {
        return 1 === arguments.length ? function() {
            var c = a.makeArray(arguments);
            return c.unshift(b), a.validator.format.apply(this, c)
        } : (arguments.length > 2 && c.constructor !== Array && (c = a.makeArray(arguments).slice(1)), c.constructor !== Array && (c = [c]), a.each(c, function(a, c) {
            b = b.replace(new RegExp("\\{" + a + "\\}", "g"), function() {
                return c
            })
        }), b)
    }, a.extend(a.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusInvalid: !0,
            errorContainer: a([]),
            errorLabelContainer: a([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function(a) {
                this.lastActive = a, this.settings.focusCleanup&&!this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, a, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(a)).hide())
            },
            onfocusout: function(a) {
                this.checkable(a) ||!(a.name in this.submitted) && this.optional(a) || this.element(a)
            },
            onkeyup: function(a, b) {
                (9 !== b.which || "" !== this.elementValue(a)) && (a.name in this.submitted || a === this.lastElement) && this.element(a)
            },
            onclick: function(a) {
                a.name in this.submitted ? this.element(a) : a.parentNode.name in this.submitted && this.element(a.parentNode)
            },
            highlight: function(b, c, d) {
                "radio" === b.type ? this.findByName(b.name).addClass(c).removeClass(d) : a(b).addClass(c).removeClass(d)
            },
            unhighlight: function(b, c, d) {
                "radio" === b.type ? this.findByName(b.name).removeClass(c).addClass(d) : a(b).removeClass(c).addClass(d)
            }
        },
        setDefaults: function(b) {
            a.extend(a.validator.defaults, b)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            maxlength: a.validator.format("Please enter no more than {0} characters."),
            minlength: a.validator.format("Please enter at least {0} characters."),
            rangelength: a.validator.format("Please enter a value between {0} and {1} characters long."),
            range: a.validator.format("Please enter a value between {0} and {1}."),
            max: a.validator.format("Please enter a value less than or equal to {0}."),
            min: a.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function() {
                function b(b) {
                    var c = a.data(this[0].form, "validator"), d = "on" + b.type.replace(/^validate/, ""), e = c.settings;
                    e[d]&&!this.is(e.ignore) && e[d].call(c, this[0], b)
                }
                this.labelContainer = a(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || a(this.currentForm), this.containers = a(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                var c, d = this.groups = {};
                a.each(this.settings.groups, function(b, c) {
                    "string" == typeof c && (c = c.split(/\s/)), a.each(c, function(a, c) {
                        d[c] = b
                    })
                }), c = this.settings.rules, a.each(c, function(b, d) {
                    c[b] = a.validator.normalizeRule(d)
                }), a(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", b).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", b), this.settings.invalidHandler && a(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler), a(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required", "true")
            },
            form: function() {
                return this.checkForm(), a.extend(this.submitted, this.errorMap), this.invalid = a.extend({}, this.errorMap), this.valid() || a(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            },
            checkForm: function() {
                this.prepareForm();
                for (var a = 0, b = this.currentElements = this.elements(); b[a]; a++)
                    this.check(b[a]);
                return this.valid()
            },
            element: function(b) {
                var c = this.clean(b), d = this.validationTargetFor(c), e=!0;
                return this.lastElement = d, void 0 === d ? delete this.invalid[c.name] : (this.prepareElement(d), this.currentElements = a(d), e = this.check(d)!==!1, e ? delete this.invalid[d.name] : this.invalid[d.name]=!0), a(b).attr("aria-invalid", !e), this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), e
            },
            showErrors: function(b) {
                if (b) {
                    a.extend(this.errorMap, b), this.errorList = [];
                    for (var c in b)
                        this.errorList.push({
                            message: b[c],
                            element: this.findByName(c)[0]
                        });
                    this.successList = a.grep(this.successList, function(a) {
                        return !(a.name in b)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function() {
                a.fn.resetForm && a(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue").removeAttr("aria-invalid")
            },
            numberOfInvalids: function() {
                return this.objectLength(this.invalid)
            },
            objectLength: function(a) {
                var b, c = 0;
                for (b in a)
                    c++;
                return c
            },
            hideErrors: function() {
                this.addWrapper(this.toHide).hide()
            },
            valid: function() {
                return 0 === this.size()
            },
            size: function() {
                return this.errorList.length
            },
            focusInvalid: function() {
                if (this.settings.focusInvalid)
                    try {
                        a(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (a) {}
            },
            findLastActive: function() {
                var b = this.lastActive;
                return b && 1 === a.grep(this.errorList, function(a) {
                    return a.element.name === b.name
                }).length && b
            },
            elements: function() {
                var b = this, c = {};
                return a(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function() {
                    return !this.name && b.settings.debug && window.console && console.error("%o has no name assigned", this), !(this.name in c ||!b.objectLength(a(this).rules())) && (c[this.name]=!0, !0)
                })
            },
            clean: function(b) {
                return a(b)[0]
            },
            errors: function() {
                var b = this.settings.errorClass.split(" ").join(".");
                return a(this.settings.errorElement + "." + b, this.errorContext)
            },
            reset: function() {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = a([]), this.toHide = a([]), this.currentElements = a([])
            },
            prepareForm: function() {
                this.reset(), this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function(a) {
                this.reset(), this.toHide = this.errorsFor(a)
            },
            elementValue: function(b) {
                var c, d = a(b), e = d.attr("type");
                return "radio" === e || "checkbox" === e ? a("input[name='" + d.attr("name") + "']:checked").val() : (c = d.val(), "string" == typeof c ? c.replace(/\r/g, "") : c)
            },
            check: function(b) {
                b = this.validationTargetFor(this.clean(b));
                var c, d, e, f = a(b).rules(), g = a.map(f, function(a, b) {
                    return b
                }).length, h=!1, i = this.elementValue(b);
                for (d in f) {
                    e = {
                        method: d,
                        parameters: f[d]
                    };
                    try {
                        if (c = a.validator.methods[d].call(this, i, b, e.parameters), "dependency-mismatch" === c && 1 === g) {
                            h=!0;
                            continue
                        }
                        if (h=!1, "pending" === c)
                            return void(this.toHide = this.toHide.not(this.errorsFor(b)));
                        if (!c)
                            return this.formatAndAdd(b, e), !1
                    } catch (a) {
                        throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + b.id + ", check the '" + e.method + "' method.", a), a
                    }
                }
                if (!h)
                    return this.objectLength(f) && this.successList.push(b), !0
            },
            customDataMessage: function(b, c) {
                return a(b).data("msg" + c[0].toUpperCase() + c.substring(1).toLowerCase()) || a(b).data("msg")
            },
            customMessage: function(a, b) {
                var c = this.settings.messages[a];
                return c && (c.constructor === String ? c : c[b])
            },
            findDefined: function() {
                for (var a = 0; a < arguments.length; a++)
                    if (void 0 !== arguments[a])
                        return arguments[a]
            },
            defaultMessage: function(b, c) {
                return this.findDefined(this.customMessage(b.name, c), this.customDataMessage(b, c), !this.settings.ignoreTitle && b.title || void 0, a.validator.messages[c], "<strong>Warning: No message defined for " + b.name + "</strong>")
            },
            formatAndAdd: function(b, c) {
                var d = this.defaultMessage(b, c.method), e = /\$?\{(\d+)\}/g;
                "function" == typeof d ? d = d.call(this, c.parameters, b) : e.test(d) && (d = a.validator.format(d.replace(e, "{$1}"), c.parameters)), this.errorList.push({
                    message: d,
                    element: b,
                    method: c.method
                }), this.errorMap[b.name] = d, this.submitted[b.name] = d
            },
            addWrapper: function(a) {
                return this.settings.wrapper && (a = a.add(a.parent(this.settings.wrapper))), a
            },
            defaultShowErrors: function() {
                var a, b, c;
                for (a = 0; this.errorList[a]; a++)
                    c = this.errorList[a], this.settings.highlight && this.settings.highlight.call(this, c.element, this.settings.errorClass, this.settings.validClass), this.showLabel(c.element, c.message);
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)
                    for (a = 0; this.successList[a]; a++)
                        this.showLabel(this.successList[a]);
                if (this.settings.unhighlight)
                    for (a = 0, b = this.validElements(); b[a]; a++)
                        this.settings.unhighlight.call(this, b[a], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            },
            validElements: function() {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function() {
                return a(this.errorList).map(function() {
                    return this.element
                })
            },
            showLabel: function(b, c) {
                var d = this.errorsFor(b);
                d.length ? (d.removeClass(this.settings.validClass).addClass(this.settings.errorClass), d.html(c)) : (d = a("<" + this.settings.errorElement + ">").attr("for", this.idOrName(b)).addClass(this.settings.errorClass).html(c || ""), this.settings.wrapper && (d = d.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(d).length || (this.settings.errorPlacement ? this.settings.errorPlacement(d, a(b)) : d.insertAfter(b))), !c && this.settings.success && (d.text(""), "string" == typeof this.settings.success ? d.addClass(this.settings.success) : this.settings.success(d, b)), this.toShow = this.toShow.add(d)
            },
            errorsFor: function(b) {
                var c = this.idOrName(b);
                return this.errors().filter(function() {
                    return a(this).attr("for") === c
                })
            },
            idOrName: function(a) {
                return this.groups[a.name] || (this.checkable(a) ? a.name : a.id || a.name)
            },
            validationTargetFor: function(a) {
                return this.checkable(a) && (a = this.findByName(a.name).not(this.settings.ignore)[0]), a
            },
            checkable: function(a) {
                return /radio|checkbox/i.test(a.type)
            },
            findByName: function(b) {
                return a(this.currentForm).find("[name='" + b + "']")
            },
            getLength: function(b, c) {
                switch (c.nodeName.toLowerCase()) {
                case"select":
                    return a("option:selected", c).length;
                case"input":
                    if (this.checkable(c))
                        return this.findByName(c.name).filter(":checked").length
                }
                return b.length
            },
            depend: function(a, b) {
                return !this.dependTypes[typeof a] || this.dependTypes[typeof a](a, b)
            },
            dependTypes: {
                boolean: function(a) {
                    return a
                },
                string: function(b, c) {
                    return !!a(b, c.form).length
                },
                function: function(a, b) {
                    return a(b)
                }
            },
            optional: function(b) {
                var c = this.elementValue(b);
                return !a.validator.methods.required.call(this, c, b) && "dependency-mismatch"
            },
            startRequest: function(a) {
                this.pending[a.name] || (this.pendingRequest++, this.pending[a.name]=!0)
            },
            stopRequest: function(b, c) {
                this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[b.name], c && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (a(this.currentForm).submit(), this.formSubmitted=!1) : !c && 0 === this.pendingRequest && this.formSubmitted && (a(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted=!1)
            },
            previousValue: function(b) {
                return a.data(b, "previousValue") || a.data(b, "previousValue", {
                    old: null,
                    valid: !0,
                    message: this.defaultMessage(b, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: !0
            },
            email: {
                email: !0
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            dateISO: {
                dateISO: !0
            },
            number: {
                number: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            }
        },
        addClassRules: function(b, c) {
            b.constructor === String ? this.classRuleSettings[b] = c : a.extend(this.classRuleSettings, b)
        },
        classRules: function(b) {
            var c = {}, d = a(b).attr("class");
            return d && a.each(d.split(" "), function() {
                this in a.validator.classRuleSettings && a.extend(c, a.validator.classRuleSettings[this])
            }), c
        },
        attributeRules: function(b) {
            var c, d, e = {}, f = a(b), g = b.getAttribute("type");
            for (c in a.validator.methods)
                "required" === c ? (d = b.getAttribute(c), "" === d && (d=!0), d=!!d) : d = f.attr(c), /min|max/.test(c) && (null === g || /number|range|text/.test(g)) && (d = Number(d)), d || 0 === d ? e[c] = d : g === c && "range" !== g && (e[c]=!0);
            return e.maxlength && /-1|2147483647|524288/.test(e.maxlength) && delete e.maxlength, e
        },
        dataRules: function(b) {
            var c, d, e = {}, f = a(b);
            for (c in a.validator.methods)
                d = f.data("rule" + c[0].toUpperCase() + c.substring(1).toLowerCase()), void 0 !== d && (e[c] = d);
            return e
        },
        staticRules: function(b) {
            var c = {}, d = a.data(b.form, "validator");
            return d.settings.rules && (c = a.validator.normalizeRule(d.settings.rules[b.name]) || {}), c
        },
        normalizeRules: function(b, c) {
            return a.each(b, function(d, e) {
                if (e===!1)
                    return void delete b[d];
                if (e.param || e.depends) {
                    var f=!0;
                    switch (typeof e.depends) {
                    case"string":
                        f=!!a(e.depends, c.form).length;
                        break;
                    case"function":
                        f = e.depends.call(c, c)
                    }
                    f ? b[d] = void 0 === e.param || e.param : delete b[d]
                }
            }), a.each(b, function(d, e) {
                b[d] = a.isFunction(e) ? e(c) : e
            }), a.each(["minlength", "maxlength"], function() {
                b[this] && (b[this] = Number(b[this]))
            }), a.each(["rangelength", "range"], function() {
                var c;
                b[this] && (a.isArray(b[this]) ? b[this] = [Number(b[this][0]), Number(b[this][1])] : "string" == typeof b[this] && (c = b[this].split(/[\s,]+/), b[this] = [Number(c[0]), Number(c[1])]))
            }), a.validator.autoCreateRanges && (b.min && b.max && (b.range = [b.min, b.max], delete b.min, delete b.max), b.minlength && b.maxlength && (b.rangelength = [b.minlength, b.maxlength], delete b.minlength, delete b.maxlength)), b
        },
        normalizeRule: function(b) {
            if ("string" == typeof b) {
                var c = {};
                a.each(b.split(/\s/), function() {
                    c[this]=!0
                }), b = c
            }
            return b
        },
        addMethod: function(b, c, d) {
            a.validator.methods[b] = c, a.validator.messages[b] = void 0 !== d ? d : a.validator.messages[b], c.length < 3 && a.validator.addClassRules(b, a.validator.normalizeRule(b))
        },
        methods: {
            required: function(b, c, d) {
                if (!this.depend(d, c))
                    return "dependency-mismatch";
                if ("select" === c.nodeName.toLowerCase()) {
                    var e = a(c).val();
                    return e && e.length > 0
                }
                return this.checkable(c) ? this.getLength(b, c) > 0 : a.trim(b).length > 0
            },
            email: function(a, b) {
                return this.optional(b) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(a)
            },
            url: function(a, b) {
                return this.optional(b) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a);
            },
            date: function(a, b) {
                return this.optional(b) ||!/Invalid|NaN/.test(new Date(a).toString())
            },
            dateISO: function(a, b) {
                return this.optional(b) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(a)
            },
            number: function(a, b) {
                return this.optional(b) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(a)
            },
            digits: function(a, b) {
                return this.optional(b) || /^\d+$/.test(a)
            },
            creditcard: function(a, b) {
                if (this.optional(b))
                    return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(a))
                    return !1;
                var c, d, e = 0, f = 0, g=!1;
                if (a = a.replace(/\D/g, ""), a.length < 13 || a.length > 19)
                    return !1;
                for (c = a.length - 1; c >= 0; c--)
                    d = a.charAt(c), f = parseInt(d, 10), g && (f*=2) > 9 && (f -= 9), e += f, g=!g;
                return e%10 === 0
            },
            minlength: function(b, c, d) {
                var e = a.isArray(b) ? b.length: this.getLength(a.trim(b), c);
                return this.optional(c) || e >= d
            },
            maxlength: function(b, c, d) {
                var e = a.isArray(b) ? b.length: this.getLength(a.trim(b), c);
                return this.optional(c) || d >= e
            },
            rangelength: function(b, c, d) {
                var e = a.isArray(b) ? b.length: this.getLength(a.trim(b), c);
                return this.optional(c) || e >= d[0] && e <= d[1]
            },
            min: function(a, b, c) {
                return this.optional(b) || a >= c
            },
            max: function(a, b, c) {
                return this.optional(b) || c >= a
            },
            range: function(a, b, c) {
                return this.optional(b) || a >= c[0] && a <= c[1]
            },
            equalTo: function(b, c, d) {
                var e = a(d);
                return this.settings.onfocusout && e.unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                    a(c).valid()
                }), b === e.val()
            },
            remote: function(b, c, d) {
                if (this.optional(c))
                    return "dependency-mismatch";
                var e, f, g = this.previousValue(c);
                return this.settings.messages[c.name] || (this.settings.messages[c.name] = {}), g.originalMessage = this.settings.messages[c.name].remote, this.settings.messages[c.name].remote = g.message, d = "string" == typeof d && {
                    url: d
                }
                || d, g.old === b ? g.valid : (g.old = b, e = this, this.startRequest(c), f = {}, f[c.name] = b, a.ajax(a.extend(!0, {
                    url: d,
                    mode: "abort",
                    port: "validate" + c.name,
                    dataType: "json",
                    data: f,
                    context: e.currentForm,
                    success: function(d) {
                        var f, h, i, j = d===!0 || "true" === d;
                        e.settings.messages[c.name].remote = g.originalMessage, j ? (i = e.formSubmitted, e.prepareElement(c), e.formSubmitted = i, e.successList.push(c), delete e.invalid[c.name], e.showErrors()) : (f = {}, h = d || e.defaultMessage(c, "remote"), f[c.name] = g.message = a.isFunction(h) ? h(b) : h, e.invalid[c.name]=!0, e.showErrors(f)), g.valid = j, e.stopRequest(c, j)
                    }
                }, d)), "pending")
            }
        }
    }), a.format = function() {
        throw "$.format has been deprecated. Please use $.validator.format instead."
    }
}(jQuery), function(a) {
    var b, c = {};
    a.ajaxPrefilter ? a.ajaxPrefilter(function(a, b, d) {
        var e = a.port;
        "abort" === a.mode && (c[e] && c[e].abort(), c[e] = d)
    }) : (b = a.ajax, a.ajax = function(d) {
        var e = ("mode"in d ? d : a.ajaxSettings).mode, f = ("port"in d ? d : a.ajaxSettings).port;
        return "abort" === e ? (c[f] && c[f].abort(), c[f] = b.apply(this, arguments), c[f]) : b.apply(this, arguments)
    })
}(jQuery), function(a) {
    a.extend(a.fn, {
        validateDelegate: function(b, c, d) {
            return this.bind(c, function(c) {
                var e = a(c.target);
                return e.is(b) ? d.apply(e, arguments) : void 0
            })
        }
    })
}(jQuery), function(a) {
    a.validator.addMethod("mc_birthday", function(b, c, d) {
        var e=!1, f = a("input:not(:hidden)", a(c).closest(d));
        if (0 == f.filter(":filled").length && this.optional(c))
            e=!0;
        else {
            var g = new Array;
            g.month = f.filter("input[name*='[month]']").val(), g.day = f.filter("input[name*='[day]']").val(), g.month = g.month - 1;
            var h = new Date(1970, g.month, g.day);
            e = h.getDate() == g.day && h.getMonth() == g.month
        }
        return e
    }, "Please enter a valid month and day."), a.validator.addMethod("mc_date", function(b, c, d) {
        var e=!1, f = a("input:not(:hidden)", a(c).closest(d));
        if (0 == f.filter(":filled").length && this.optional(c))
            e=!0;
        else {
            var g = new Array;
            g.month = f.filter("input[name*='[month]']").val(), g.day = f.filter("input[name*='[day]']").val(), g.year = f.filter("input[name*='[year]']").val(), g.month = g.month - 1, g.year.length < 4 && (g.year = parseInt(g.year) < 50 ? 2e3 + parseInt(g.year) : 1900 + parseInt(g.year));
            var h = new Date(g.year, g.month, g.day);
            e = h.getDate() == g.day && h.getMonth() == g.month && h.getFullYear() == g.year
        }
        return e
    }, "Please enter a valid date"), a.validator.addMethod("mc_phone", function(b, c, d) {
        var e=!1, f = a("input:filled:not(:hidden)", a(c).closest(d));
        return 0 == f.length && this.optional(c) ? e=!0 : (b = f.eq(0).val() + f.eq(1).val() + f.eq(2).val(), e = 10 == b.length && b.match(/[0-9]{9}/)), e
    }, "Please specify a valid phone number"), a.validator.addMethod("skip_or_complete_group", function(b, c, d) {
        var e = a("input:not(:hidden)", a(c).closest(d)), f = e.eq(0), g = f.data("valid_skip") ? f.data("valid_skip"): a.extend({}, this), h = e.filter(function() {
            return g.elementValue(this)
        }).length, i = 0 === h || h === e.length;
        return f.data("valid_skip", g), a(c).data("being_validated") || (e.data("being_validated", !0), e.each(function() {
            g.element(this)
        }), e.data("being_validated", !1)), i
    }, a.validator.format("Please supply missing fields.")), a.validator.addMethod("skip_or_fill_minimum", function(b, c, d) {
        var e = a(d[1], c.form), f = e.eq(0), g = f.data("valid_skip") ? f.data("valid_skip"): a.extend({}, this), h = e.filter(function() {
            return g.elementValue(this)
        }).length, i = 0 === h || h >= d[0];
        return console.log(e.eq(0)), f.data("valid_skip", g), a(c).data("being_validated") || (e.data("being_validated", !0), e.each(function() {
            g.element(this)
        }), e.data("being_validated", !1)), i
    }, a.validator.format("Please either skip these fields or fill at least {0} of them.")), a.validator.addMethod("zipcodeUS", function(a, b) {
        return this.optional(b) || /^\d{5}-\d{4}$|^\d{5}$/.test(a)
    }, "The specified US ZIP Code is invalid")
}(jQuery), function(a) {
    var b = "";
    try {
        b = mc_custom_error_style
    } catch (a) {
        b = "#mc_embed_signup input.mce_inline_error { border-color:#6B0505; } #mc_embed_signup div.mce_inline_error { margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff; }"
    }
    var c = document.getElementsByTagName("head")[0], d = document.createElement("style");
    d.type = "text/css", d.styleSheet ? d.styleSheet.cssText = b : d.appendChild(document.createTextNode(b)), c.appendChild(d), window.mc = {
        openPopup: function() {
            a("#mc_embed_signup a.mc_embed_close").show(), setTimeout(function() {
                a("#mc_embed_signup").fadeIn()
            }, mc.delayPopup)
        },
        closePopup: function() {
            a("#mc_embed_signup").hide();
            var b = new Date, c = new Date(b.getTime() + 31536e6);
            document.cookie = "MCEvilPopupClosed=yes;expires=" + c.toGMTString() + ";path=/"
        },
        evalPopup: function() {
            for (a("#mc_embed_signup")
                .hide(), cks = document.cookie.split(";"), i = 0;
            i < cks.length;
            i++)parts = cks[i].split("="), parts[0].indexOf("MCEvilPopupClosed")!=-1 && (mc.showPopup=!1);
            mc.showPopup && mc.openPopup()
        },
        getAjaxSubmitUrl: function() {
            var b = a("form#mc-embedded-subscribe-form").attr("action");
            return b = b.replace("/post?u=", "/post-json?u="), b += "&c=?"
        },
        getGroups: function() {
            var b = {};
            return a(".mc-field-group").each(function(c) {
                var d = a(this).find("input:text:not(:hidden)");
                if (d.length > 1) {
                    var e = d.first().attr("name"), f = a.map(d, function(a) {
                        return a.name
                    });
                    b[e.substring(0, e.indexOf("["))] = f.join(" ")
                }
            }), b
        },
        isMultiPartField: function(b) {
            return a("input:not(:hidden)", a(b).closest(".mc-field-group")).length > 1
        },
        isTooEarly: function(b) {
            var c = a("input:not(:hidden)", a(b).closest(".mc-field-group"));
            return a(c).eq( - 1).attr("id") != a(b).attr("id")
        },
        mce_success_cb: function(b) {
            if (a("#mce-success-response").hide(), a("#mce-error-response").hide(), "success" == b.result)
                a("#mce-" + b.result + "-response").show(), a("#mce-" + b.result + "-response").html(b.msg), a("#mc-embedded-subscribe-form").each(function() {
                    this.reset()
                });
            else {
                var d, c =- 1;
                try {
                    var e = b.msg.split(" - ", 2);
                    void 0 == e[1] ? d = b.msg : (i = parseInt(e[0]), i.toString() == e[0] ? (c = e[0], d = e[1]) : (c =- 1, d = b.msg))
                } catch (a) {
                    c =- 1, d = b.msg
                }
                try {
                    if (c==-1)
                        a("#mce-" + b.result + "-response").show(), a("#mce-" + b.result + "-response").html(d);
                    else {
                        var f = a("input[name*='" + fnames[c] + "']").attr("name"), g = {};
                        g[f] = d, mc.mce_validator.showErrors(g)
                    }
                } catch (c) {
                    a("#mce-" + b.result + "-response").show(), a("#mce-" + b.result + "-response").html(d)
                }
            }
        }
    }, window.mc.mce_validator = a("#mc-embedded-subscribe-form").validate({
        errorClass: "mce_inline_error",
        errorElement: "div",
        onkeyup: !1,
        onfocusout: function(b) {
            mc.isTooEarly(b) || a(b).valid()
        },
        onblur: function(b) {
            mc.isTooEarly(b) || a(b).valid()
        },
        groups: mc.getGroups(),
        errorPlacement: function(a, b) {
            b.closest(".mc-field-group").append(a)
        },
        submitHandler: function(b) {
            a(b).ajaxSubmit(mc.ajaxOptions)
        }
    }), window.mc.ajaxOptions = {
        url: mc.getAjaxSubmitUrl(),
        type: "GET",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: mc.mce_success_cb
    }, a.validator.addClassRules("birthday", {
        digits: !0,
        mc_birthday: ".datefield"
    }), a.validator.addClassRules("datepart", {
        digits: !0,
        mc_date: ".datefield"
    }), a.validator.addClassRules("phonepart", {
        digits: !0,
        mc_phone: ".phonefield"
    }), a("#mc_embed_signup a.mc_embed_close").click(function() {
        mc.closePopup()
    }), a(document).keydown(function(a) {
        keycode = null == a ? event.keyCode : a.which, 27 == keycode && "undefined" != typeof mc.showPopup && mc.closePopup()
    })
}(jQuery), function(a) {
    window.fnames = new Array, window.ftypes = new Array, fnames[0] = "EMAIL", ftypes[0] = "email", fnames[1] = "FNAME", ftypes[1] = "text", fnames[2] = "LNAME", ftypes[2] = "text"
}(jQuery);

