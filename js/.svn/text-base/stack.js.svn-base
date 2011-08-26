StackExchange.tagAutocomplete = true;
function bindTagFilterAutoComplete(c, a) {
    var b = (a || "") + "/filter/tags";
    $(c).autocomplete(b, {
        max: 6,
        dataType: "jsonp",
        matchSubset: false,
        highlightItem: true,
        multiple: true,
        multipleSeparator: " ",
        matchContains: true,
        scroll: true,
        scrollHeight: 300,
        formatItem: function(d) {
            var e = d[0];
            var f = d[1];
            return e + " (" + f + ")"
        },
        formatResult: function(e) {
            var d = e[0];
            return d
        }
    })
}
function initTagPreview(i, e, f) {
    var b = null,
    h,
    g = window.tagRenderer,
    a = true,
    c;
    if (!g) {
        return
    }
    c = StackExchange.helpers.DelayedReaction(function(j) {
        var k = $("#prettify-lang");
        if (!k.length) {
            return
        }
        $.get("/api/tags/langdiv", {
            tags: j.join(" ")
        }).done(function(l) {
            if (l) {
                k.replaceWith(l)
            } else {
                k.empty()
            }
            StackExchange.MarkdownEditor.refreshAllPreviews();
            styleCode()
        })
    },
    1500, {
        sliding: true
    });
    var d = function() {
        if (i.closest("body").length == 0) {
            clearInterval(h);
            return
        }
        var l = i.val();
        if (l == b) {
            return
        }
        b = l;
        var m = sanitizeAndSplitTags(l);
        if (m.length == 0) {
            e.slideUp(function() {
                e.empty()
            });
            return
        }
        e.empty();
        for (var k = 0; k < m.length; k++) {
            var j = m[k];
            g(j).appendTo(e);
            e.append("<span> </span>")
        }
        if (m.length > f) {
            e.append("<span class='form-error'>a question cannot have more than " + f + " tags</span>")
        } else {
            if (!a && StackExchange.MarkdownEditor) {
                c.trigger(m)
            }
        }
        a = false;
        e.slideDown()
    };
    h = setInterval(d, 500);
    i.keydown(function(j) {
        if (h) {
            clearInterval(h)
        }
        if (j.which == 32 || j.which == 13) {
            d()
        }
        h = setInterval(d, 500)
    })
}
StackExchange.autocomplete = true; 
(function(a) {
    a.fn.extend({
        autocomplete: function(b, d) {
            var c = typeof b == "string";
            d = a.extend({},
            a.Autocompleter.defaults, {
                url: c ? b: null,
                data: c ? null: b,
                delay: c ? a.Autocompleter.defaults.delay: 10,
                max: d && !d.scroll ? 10: 150
            },
            d);
            d.highlight = d.highlight || 
            function(e) {
                return e
            };
            d.formatMatch = d.formatMatch || d.formatItem;
            return this.each(function() {
                new a.Autocompleter(this, d)
            })
        },
        result: function(b) {
            return this.bind("result", b)
        },
        search: function(b) {
            return this.trigger("search", [b])
        },
        flushCache: function() {
            return this.trigger("flushCache")
        },
        setOptions: function(b) {
            return this.trigger("setOptions", [b])
        },
        unautocomplete: function() {
            return this.trigger("unautocomplete")
        }
    });
    a.Autocompleter = function(v, t) {
        var u = {
            UP: 38,
            DOWN: 40,
            DEL: 46,
            TAB: 9,
            RETURN: 13,
            ESC: 27,
            COMMA: 188,
            PAGEUP: 33,
            PAGEDOWN: 34,
            BACKSPACE: 8,
            SPACE: 32
        };
        var n = a(v).attr("autocomplete", "off").addClass(t.inputClass);
        var q;
        var k = "";
        var b = a.Autocompleter.Cache(t);
        var o = 0;
        var g;
        var p = {
            mouseDownOnSelect: false
        };
        var s = a.Autocompleter.Select(t, v, m, p);
        var l;
        n.bind("keydown.autocomplete", 
        function(y) {
            g = y.keyCode;
            switch (y.keyCode) {
            case u.UP:
                y.preventDefault();
                if (s.visible()) {
                    s.prev()
                } else {
                    f(0, true)
                }
                break;
            case u.DOWN:
                y.preventDefault();
                if (s.visible()) {
                    s.next()
                } else {
                    f(0, true)
                }
                break;
            case u.PAGEUP:
                y.preventDefault();
                if (s.visible()) {
                    s.pageUp()
                } else {
                    f(0, true)
                }
                break;
            case u.PAGEDOWN:
                y.preventDefault();
                if (s.visible()) {
                    s.pageDown()
                } else {
                    f(0, true)
                }
                break;
            case t.multiple && a.trim(t.multipleSeparator) == "," && u.COMMA: case u.TAB:
            case u.RETURN:
                if (m()) {
                    y.preventDefault();
                    l = true;
                    return false
                }
                break;
            case u.ESC:
                s.hide();
                break;
            case t.multiple && t.multipleSeparator === " " && u.SPACE: w();
                break;
            default:
                clearTimeout(q);
                q = setTimeout(f, t.delay);
                break
            }
        }).focus(function() {
            o++
        }).blur(function() {
            o = 0;
            if (!p.mouseDownOnSelect) {
                e()
            }
        }).click(function() {
            if (o++>1 && !s.visible()) {
                f(0, true)
            }
        }).bind("search", 
        function() {
            var y = (arguments.length > 1) ? arguments[1] : null;
            function z(A, B) {
                var C;
                if (B && B.length) {
                    for (var D = 0; D < B.length; D++) {
                        if (B[D].result.toLowerCase() == A.toLowerCase()) {
                            C = B[D];
                            break
                        }
                    }
                }
                if (typeof y == "function") {
                    y(C)
                } else {
                    n.trigger("result", C && [C.data, C.value])
                }
            }
            a.each(i(n.val()), 
            function(A, B) {
                r(B, z, z)
            })
        }).bind("flushCache", 
        function() {
            b.flush()
        }).bind("setOptions", 
        function() {
            a.extend(t, arguments[1]);
            if ("data" in arguments[1]) {
                b.populate()
            }
        }).bind("unautocomplete", 
        function() {
            s.unbind();
            n.unbind();
            a(v.form).unbind(".autocomplete")
        });
        function m() {
            var C = s.selected();
            if (!C) {
                return false
            }
            var G = C.result;
            k = G;
            if (t.multiple) {
                var D = i(n.val());
                if (D.length > 1) {
                    var F = t.multipleSeparator.length;
                    var E = a(v).selection().start;
                    var z,
                    B = 0;
                    a.each(D, 
                    function(H, I) {
                        B += I.length;
                        if (E <= B) {
                            z = H;
                            return false
                        }
                        B += F
                    });
                    D[z] = G;
                    G = D.join(t.multipleSeparator)
                }
                G += t.multipleSeparator
            }
            n.val(G);
            var y = n[0];
            if (y.createTextRange) {
                var A = y.createTextRange();
                A.move("textedit");
                A.select()
            }
            w();
            n.trigger("result", [C.data, C.value]);
            return true
        }
        function f(y, A) {
            if (g == u.DEL) {
                s.hide();
                return
            }
            var z = n.val();
            if (!A && z == k) {
                return
            }
            k = z;
            z = d(z);
            if (z.length >= t.minChars) {
                n.addClass(t.loadingClass);
                if (!t.matchCase) {
                    z = z.toLowerCase()
                }
                r(z, j, w)
            } else {
                h();
                s.hide()
            }
        }
        function i(y) {
            if (!y) {
                return [""]
            }
            var z = y.split(t.multipleSeparator);
            var A = [];
            a.each(z, 
            function(B, C) {
                if (a.trim(C)) {
                    A.push(a.trim(C))
                }
            });
            return A.length ? A: [""]
        }
        function d(y) {
            if (!t.multiple) {
                return y
            }
            var z = i(y);
            if (z.length == 1) {
                return z[0]
            }
            var A = a(v).selection().start;
            if (A == y.length) {
                z = i(y)
            } else {
                z = i(y.replace(y.substring(A), ""))
            }
            return z[z.length - 1]
        }
        function x(z, y) {
            if (t.autoFill && (d(n.val()).toLowerCase() == z.toLowerCase()) && g != u.BACKSPACE) {
                n.val(n.val() + y.substring(d(k).length));
                a(v).selection(k.length, k.length + y.length)
            }
        }
        function e() {
            clearTimeout(q);
            q = setTimeout(w, 200)
        }
        function w() {
            var y = s.visible();
            s.hide();
            clearTimeout(q);
            h();
            if (t.mustMatch) {
                n.search(function(z) {
                    if (!z) {
                        if (t.multiple) {
                            var A = i(n.val()).slice(0, -1);
                            n.val(A.join(t.multipleSeparator) + (A.length ? t.multipleSeparator: ""))
                        } else {
                            n.val("")
                        }
                    }
                })
            }
        }
        function j(z, y) {
            if (y && y.length && o) {
                h();
                s.display(y, z);
                x(z, y[0].value);
                s.show()
            } else {
                w()
            }
        }
        function r(A, B, D) {
            if (!t.matchCase) {
                A = A.toLowerCase()
            }
            var z = b.load(A);
            if (z && z.length) {
                B(A, z)
            } else {
                if ((typeof t.url == "string") && (t.url.length > 0)) {
                    var C = {
                        timestamp: +new Date()
                    };
                    a.each(t.extraParams, 
                    function(E, F) {
                        C[E] = typeof F == "function" ? F() : F
                    });
                    var y = false;
                    a.ajax({
                        mode: "abort",
                        port: "autocomplete" + v.name,
                        dataType: t.dataType,
                        url: t.url,
                        data: a.extend({
                            q: d(A),
                            limit: t.max
                        },
                        C),
                        success: function(E) {
                            var F = t.parse && t.parse(E) || c(E);
                            b.add(A, F);
                            B(A, F);
                            y = true
                        },
                        complete: function() {
                            if (!y) {
                                B()
                            }
                            y = true
                        }
                    })
                } else {
                    s.emptyList();
                    D(A)
                }
            }
        }
        function c(z) {
            var B = [];
            var C = z.split("\n");
            for (var A = 0; A < C.length; A++) {
                var y = a.trim(C[A]);
                if (y) {
                    y = y.split("|");
                    B[B.length] = {
                        data: y,
                        value: y[0],
                        result: t.formatResult && t.formatResult(y, y[0]) || y[0]
                    }
                }
            }
            return B
        }
        function h() {
            n.removeClass(t.loadingClass)
        }
    };
    a.Autocompleter.defaults = {
        inputClass: "ac_input",
        resultsClass: "ac_results",
        loadingClass: "ac_loading",
        minChars: 1,
        delay: 400,
        matchCase: false,
        matchSubset: true,
        matchContains: false,
        cacheLength: 10,
        max: 100,
        mustMatch: false,
        extraParams: {},
        selectFirst: true,
        formatItem: function(b) {
            return b[0]
        },
        formatMatch: null,
        autoFill: false,
        width: 0,
        multiple: false,
        multipleSeparator: ", ",
        highlight: function(c, b) {
            return c.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + b.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1") + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>")
        },
        scroll: true,
        scrollHeight: 180
    };
    a.Autocompleter.Cache = function(c) {
        var b = {};
        var g = 0;
        function d(k, l) {
            if (!c.matchCase) {
                k = k.toLowerCase()
            }
            var j = k.indexOf(l);
            if (c.matchContains == "word") {
                j = k.toLowerCase().search("\\b" + l.toLowerCase())
            }
            if (j == -1) {
                return false
            }
            return j == 0 || c.matchContains
        }
        function f(j, i) {
            if (g > c.cacheLength) {
                h()
            }
            if (!b[j]) {
                g++
            }
            b[j] = i
        }
        function e() {
            if (!c.data) {
                return false
            }
            var o = {},
            p = 0;
            if (!c.url) {
                c.cacheLength = 1
            }
            o[""] = [];
            for (var k = 0, n = c.data.length; k < n; k++) {
                var l = c.data[k];
                l = (typeof l == "string") ? [l] : l;
                var j = c.formatMatch(l, k + 1, c.data.length);
                if (j === false) {
                    continue
                }
                var m = j.charAt(0).toLowerCase();
                if (!o[m]) {
                    o[m] = []
                }
                var q = {
                    value: j,
                    data: l,
                    result: c.formatResult && c.formatResult(l) || j
                };
                o[m].push(q);
                if (p++<c.max) {
                    o[""].push(q)
                }
            }
            a.each(o, 
            function(r, s) {
                c.cacheLength++;
                f(r, s)
            })
        }
        setTimeout(e, 25);
        function h() {
            b = {};
            g = 0
        }
        return {
            flush: h,
            add: f,
            populate: e,
            load: function(j) {
                if (!c.cacheLength || !g) {
                    return null
                }
                if (!c.url && c.matchContains) {
                    var o = [];
                    for (var m in b) {
                        if (m.length > 0) {
                            var n = b[m];
                            a.each(n, 
                            function(k, p) {
                                if (d(p.value, j)) {
                                    o.push(p)
                                }
                            })
                        }
                    }
                    return o
                } else {
                    if (b[j]) {
                        return b[j]
                    } else {
                        if (c.matchSubset) {
                            for (var l = j.length - 1; l >= c.minChars; l--) {
                                var n = b[j.substr(0, l)];
                                if (n) {
                                    var o = [];
                                    a.each(n, 
                                    function(k, p) {
                                        if (d(p.value, j)) {
                                            o[o.length] = p
                                        }
                                    });
                                    return o
                                }
                            }
                        }
                    }
                }
                return null
            }
        }
    };
    a.Autocompleter.Select = function(p, q, o, l) {
        var e = {
            ACTIVE: "ac_over"
        };
        var i,
        k = -1,
        b,
        g = "",
        m = true,
        f,
        n;
        function j() {
            if (!m) {
                return
            }
            f = a("<div/>").hide().addClass(p.resultsClass).css("position", "absolute").appendTo(document.body);
            n = a("<ul/>").appendTo(f).mouseover(function(t) {
                if (r(t).nodeName && r(t).nodeName.toUpperCase() == "LI") {
                    k = a("li", n).removeClass(e.ACTIVE).index(r(t));
                    a(r(t)).addClass(e.ACTIVE)
                }
            }).click(function(t) {
                a(r(t)).addClass(e.ACTIVE);
                o();
                q.focus();
                return false
            }).mousedown(function() {
                l.mouseDownOnSelect = true
            }).mouseup(function() {
                l.mouseDownOnSelect = false
            });
            if (p.width > 0) {
                f.css("width", p.width)
            }
            m = false
        }
        function r(u) {
            var t = u.target;
            while (t && t.tagName != "LI") {
                t = t.parentNode
            }
            if (!t) {
                return []
            }
            return t
        }
        function d(u) {
            i.slice(k, k + 1).removeClass(e.ACTIVE);
            c(u);
            var t = i.slice(k, k + 1).addClass(e.ACTIVE);
            if (p.scroll) {
                var v = 0;
                i.slice(0, k).each(function() {
                    v += this.offsetHeight
                });
                if ((v + t[0].offsetHeight - n.scrollTop()) > n[0].clientHeight) {
                    n.scrollTop(v + t[0].offsetHeight - n.innerHeight())
                } else {
                    if (v < n.scrollTop()) {
                        n.scrollTop(v)
                    }
                }
            }
        }
        function c(t) {
            k += t;
            if (k < 0) {
                k = i.size() - 1
            } else {
                if (k >= i.size()) {
                    k = 0
                }
            }
        }
        function s(t) {
            return p.max && p.max < t ? p.max: t
        }
        function h() {
            n.empty();
            var w = s(b.length);
            for (var t = 0; t < w; t++) {
                if (!b[t]) {
                    continue
                }
                var u = p.formatItem(b[t].data, t + 1, w, b[t].value, g);
                if (u === false) {
                    continue
                }
                var v = a("<li/>").html(p.highlight(u, g)).addClass(t % 2 == 0 ? "ac_even": "ac_odd").appendTo(n)[0];
                a.data(v, "ac_data", b[t])
            }
            i = n.find("li");
            if (p.selectFirst) {
                i.slice(0, 1).addClass(e.ACTIVE);
                k = 0
            }
        }
        return {
            display: function(t, u) {
                j();
                b = t;
                g = u;
                h()
            },
            next: function() {
                d(1)
            },
            prev: function() {
                d( - 1)
            },
            pageUp: function() {
                if (k != 0 && k - 8 < 0) {
                    d( - k)
                } else {
                    d( - 8)
                }
            },
            pageDown: function() {
                if (k != i.size() - 1 && k + 8 > i.size()) {
                    d(i.size() - 1 - k)
                } else {
                    d(8)
                }
            },
            hide: function() {
                f && f.hide();
                i && i.removeClass(e.ACTIVE);
                k = -1
            },
            visible: function() {
                return f && f.is(":visible")
            },
            current: function() {
                return this.visible() && (i.filter("." + e.ACTIVE)[0] || p.selectFirst && i[0])
            },
            show: function() {
                var v = a(q).offset();
                f.css({
                    width: typeof p.width == "string" || p.width > 0 ? p.width: a(q).width(),
                    top: v.top + q.offsetHeight,
                    left: v.left
                }).show();
                if (p.scroll) {
                    n.scrollTop(0);
                    n.css({
                        maxHeight: p.scrollHeight,
                        overflow: "auto"
                    });
                    if (a.browser.msie && typeof document.body.style.maxHeight === "undefined") {
                        var t = 0;
                        i.each(function() {
                            t += this.offsetHeight
                        });
                        var u = t > p.scrollHeight;
                        n.css("height", u ? p.scrollHeight: t);
                        if (!u) {
                            i.width(n.width() - parseInt(i.css("padding-left")) - parseInt(i.css("padding-right")))
                        }
                    }
                }
            },
            selected: function() {
                var t = i && i.filter("." + e.ACTIVE).removeClass(e.ACTIVE);
                return t && t.length && a.data(t[0], "ac_data")
            },
            emptyList: function() {
                n && n.empty()
            },
            unbind: function() {
                f && f.remove()
            }
        }
    };
    a.fn.selection = function(d, b) {
        if (d !== undefined) {
            return this.each(function() {
                if (this.createTextRange) {
                    var j = this.createTextRange();
                    if (b === undefined || d == b) {
                        j.move("character", d);
                        j.select()
                    } else {
                        j.collapse(true);
                        j.moveStart("character", d);
                        j.moveEnd("character", b);
                        j.select()
                    }
                } else {
                    if (this.setSelectionRange) {
                        this.setSelectionRange(d, b)
                    } else {
                        if (this.selectionStart) {
                            this.selectionStart = d;
                            this.selectionEnd = b
                        }
                    }
                }
            })
        }
        var f = this[0];
        if (f.createTextRange) {
            var e = document.selection.createRange(),
            c = f.value,
            h = "<->",
            g = e.text.length;
            if (g === 0) {
                return {
                    start: f.value.length,
                    end: f.value.length
                }
            }
            e.text = h;
            var i = f.value.indexOf(h);
            f.value = c;
            this.selection(i, i + g);
            return {
                start: i,
                end: i + g
            }
        } else {
            if (f.selectionStart !== undefined) {
                return {
                    start: f.selectionStart,
                    end: f.selectionEnd
                }
            }
        }
    }
})(jQuery);