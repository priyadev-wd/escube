! function(e) {
    "use strict";
    var a = {
        init: function(t) {
            var r = this;
            return r.data("jqv") && null != r.data("jqv") || (t = a._saveOptions(r, t), e(document).on("click", ".formError", function() {
                e(this).fadeOut(150, function() {
                    e(this).parent(".formErrorOuter").remove(), e(this).remove()
                })
            })), this
        },
        attach: function(t) {
            var r, i = this;
            return r = t ? a._saveOptions(i, t) : i.data("jqv"), r.validateAttribute = i.find("[data-validation-engine*=validate]").length ? "data-validation-engine" : "class", r.binded && (i.on(r.validationEventTrigger, "[" + r.validateAttribute + "*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)", a._onFieldEvent), i.on("click", "[" + r.validateAttribute + "*=validate][type=checkbox],[" + r.validateAttribute + "*=validate][type=radio]", a._onFieldEvent), i.on(r.validationEventTrigger, "[" + r.validateAttribute + "*=validate][class*=datepicker]", {
                delay: 300
            }, a._onFieldEvent)), r.autoPositionUpdate && e(window).bind("resize", {
                noAnimation: !0,
                formElem: i
            }, a.updatePromptsPosition), i.on("click", "a[data-validation-engine-skip], a[class*='validate-skip'], button[data-validation-engine-skip], button[class*='validate-skip'], input[data-validation-engine-skip], input[class*='validate-skip']", a._submitButtonClick), i.removeData("jqv_submitButton"), i.on("submit", a._onSubmitEvent), this
        },
        detach: function() {
            var t = this,
                r = t.data("jqv");
            return t.off(r.validationEventTrigger, "[" + r.validateAttribute + "*=validate]:not([type=checkbox]):not([type=radio]):not(.datepicker)", a._onFieldEvent), t.off("click", "[" + r.validateAttribute + "*=validate][type=checkbox],[" + r.validateAttribute + "*=validate][type=radio]", a._onFieldEvent), t.off(r.validationEventTrigger, "[" + r.validateAttribute + "*=validate][class*=datepicker]", a._onFieldEvent), t.off("submit", a._onSubmitEvent), t.removeData("jqv"), t.off("click", "a[data-validation-engine-skip], a[class*='validate-skip'], button[data-validation-engine-skip], button[class*='validate-skip'], input[data-validation-engine-skip], input[class*='validate-skip']", a._submitButtonClick), t.removeData("jqv_submitButton"), r.autoPositionUpdate && e(window).off("resize", a.updatePromptsPosition), this
        },
        validate: function() {
            var t = e(this),
                r = null;
            if (t.is("form") || t.hasClass("validationEngineContainer")) {
                if (t.hasClass("validating")) return !1;
                t.addClass("validating");
                var i = t.data("jqv"),
                    r = a._validateFields(this);
                setTimeout(function() {
                    t.removeClass("validating")
                }, 100), r && i.onSuccess ? i.onSuccess() : !r && i.onFailure && i.onFailure()
            } else if (t.is("form") || t.hasClass("validationEngineContainer")) t.removeClass("validating");
            else {
                var o = t.closest("form, .validationEngineContainer"),
                    i = o.data("jqv") ? o.data("jqv") : e.validationEngine.defaults,
                    r = a._validateField(t, i);
                r && i.onFieldSuccess ? i.onFieldSuccess() : i.onFieldFailure && i.InvalidFields.length > 0 && i.onFieldFailure()
            }
            return i.onValidationComplete ? !!i.onValidationComplete(o, r) : r
        },
        updatePromptsPosition: function(t) {
            if (t && this == window) var r = t.data.formElem,
                i = t.data.noAnimation;
            else var r = e(this.closest("form, .validationEngineContainer"));
            var o = r.data("jqv");
            return r.find("[" + o.validateAttribute + "*=validate]").not(":disabled").each(function() {
                var t = e(this);
                o.prettySelect && t.is(":hidden") && (t = r.find("#" + o.usePrefix + t.attr("id") + o.useSuffix));
                var s = a._getPrompt(t),
                    n = e(s).find(".formErrorContent").html();
                s && a._updatePrompt(t, e(s), n, void 0, !1, o, i)
            }), this
        },
        showPrompt: function(e, t, r, i) {
            var o = this.closest("form, .validationEngineContainer"),
                s = o.data("jqv");
            return s || (s = a._saveOptions(this, s)), r && (s.promptPosition = r), s.showArrow = 1 == i, a._showPrompt(this, e, t, !1, s), this
        },
        hide: function() {
            var t, r = e(this).closest("form, .validationEngineContainer"),
                i = r.data("jqv"),
                o = i && i.fadeDuration ? i.fadeDuration : .3;
            return t = e(this).is("form") || e(this).hasClass("validationEngineContainer") ? "parentForm" + a._getClassName(e(this).attr("id")) : a._getClassName(e(this).attr("id")) + "formError", e("." + t).fadeTo(o, .3, function() {
                e(this).parent(".formErrorOuter").remove(), e(this).remove()
            }), this
        },
        hideAll: function() {
            var a = this,
                t = a.data("jqv"),
                r = t ? t.fadeDuration : 300;
            return e(".formError").fadeTo(r, 300, function() {
                e(this).parent(".formErrorOuter").remove(), e(this).remove()
            }), this
        },
        _onFieldEvent: function(t) {
            var r = e(this),
                i = r.closest("form, .validationEngineContainer"),
                o = i.data("jqv");
            o.eventTrigger = "field", window.setTimeout(function() {
                a._validateField(r, o), 0 == o.InvalidFields.length && o.onFieldSuccess ? o.onFieldSuccess() : o.InvalidFields.length > 0 && o.onFieldFailure && o.onFieldFailure()
            }, t.data ? t.data.delay : 0)
        },
        _onSubmitEvent: function() {
            var t = e(this),
                r = t.data("jqv");
            if (t.data("jqv_submitButton")) {
                var i = e("#" + t.data("jqv_submitButton"));
                if (i && i.length > 0 && (i.hasClass("validate-skip") || "true" == i.attr("data-validation-engine-skip"))) return !0
            }
            r.eventTrigger = "submit";
            var o = a._validateFields(t);
            return o && r.ajaxFormValidation ? (a._validateFormWithAjax(t, r), !1) : r.onValidationComplete ? !!r.onValidationComplete(t, o) : o
        },
        _checkAjaxStatus: function(a) {
            var t = !0;
            return e.each(a.ajaxValidCache, function(e, a) {
                return a ? void 0 : (t = !1, !1)
            }), t
        },
        _checkAjaxFieldStatus: function(e, a) {
            return 1 == a.ajaxValidCache[e]
        },
        _validateFields: function(t) {
            var r = t.data("jqv"),
                i = !1;
            t.trigger("jqv.form.validating");
            var o = null;
            if (t.find("[" + r.validateAttribute + "*=validate]").not(":disabled").each(function() {
                    var s = e(this),
                        n = [];
                    if (e.inArray(s.attr("name"), n) < 0) {
                        if (i |= a._validateField(s, r), i && null == o && (s.is(":hidden") && r.prettySelect ? o = s = t.find("#" + r.usePrefix + a._jqSelector(s.attr("id")) + r.useSuffix) : (s.data("jqv-prompt-at") instanceof jQuery ? s = s.data("jqv-prompt-at") : s.data("jqv-prompt-at") && (s = e(s.data("jqv-prompt-at"))), o = s)), r.doNotShowAllErrosOnSubmit) return !1;
                        if (n.push(s.attr("name")), 1 == r.showOneMessage && i) return !1
                    }
                }), t.trigger("jqv.form.result", [i]), i) {
                if (r.scroll) {
                    var s = o.offset().top,
                        n = o.offset().left,
                        l = r.promptPosition;
                    if ("string" == typeof l && -1 != l.indexOf(":") && (l = l.substring(0, l.indexOf(":"))), "bottomRight" != l && "bottomLeft" != l) {
                        var d = a._getPrompt(o);
                        d && (s = d.offset().top)
                    }
                    if (r.scrollOffset && (s -= r.scrollOffset), r.isOverflown) {
                        var u = e(r.overflownDIV);
                        if (!u.length) return !1;
                        var c = u.scrollTop(),
                            f = -parseInt(u.offset().top);
                        s += c + f - 5;
                        var v = e(r.overflownDIV + ":not(:animated)");
                        v.animate({
                            scrollTop: s
                        }, 1100, function() {
                            r.focusFirstField && o.focus()
                        })
                    } else e("html, body").animate({
                        scrollTop: s
                    }, 1100, function() {
                        r.focusFirstField && o.focus()
                    }), e("html, body").animate({
                        scrollLeft: n
                    }, 1100)
                } else r.focusFirstField && o.focus();
                return !1
            }
            return !0
        },
        _validateFormWithAjax: function(t, r) {
            var i = t.serialize(),
                o = r.ajaxFormValidationMethod ? r.ajaxFormValidationMethod : "GET",
                s = r.ajaxFormValidationURL ? r.ajaxFormValidationURL : t.attr("action"),
                n = r.dataType ? r.dataType : "json";
            e.ajax({
                type: o,
                url: s,
                cache: !1,
                dataType: n,
                data: i,
                form: t,
                methods: a,
                options: r,
                beforeSend: function() {
                    return r.onBeforeAjaxFormValidation(t, r)
                },
                error: function(e, t) {
                    r.onFailure ? r.onFailure(e, t) : a._ajaxError(e, t)
                },
                success: function(i) {
                    if ("json" == n && i !== !0) {
                        for (var o = !1, s = 0; s < i.length; s++) {
                            var l = i[s],
                                d = l[0],
                                u = e(e("#" + d)[0]);
                            if (1 == u.length) {
                                var c = l[2];
                                if (1 == l[1])
                                    if ("" != c && c) {
                                        if (r.allrules[c]) {
                                            var f = r.allrules[c].alertTextOk;
                                            f && (c = f)
                                        }
                                        r.showPrompts && a._showPrompt(u, c, "pass", !1, r, !0)
                                    } else a._closePrompt(u);
                                else {
                                    if (o |= !0, r.allrules[c]) {
                                        var f = r.allrules[c].alertText;
                                        f && (c = f)
                                    }
                                    r.showPrompts && a._showPrompt(u, c, "", !1, r, !0)
                                }
                            }
                        }
                        r.onAjaxFormComplete(!o, t, i, r)
                    } else r.onAjaxFormComplete(!0, t, i, r)
                }
            })
        },
        _validateField: function(t, r, i) {
            if (t.attr("id") || (t.attr("id", "form-validation-field-" + e.validationEngine.fieldIdCounter), ++e.validationEngine.fieldIdCounter), !r.validateNonVisibleFields && (t.is(":hidden") && !r.prettySelect || t.parent().is(":hidden"))) return !1;
            var o = t.attr(r.validateAttribute),
                s = /validate\[(.*)\]/.exec(o);
            if (!s) return !1;
            var n = s[1],
                l = n.split(/\[|,|\]/),
                d = !1,
                u = t.attr("name"),
                c = "",
                f = "",
                v = !1,
                p = !1;
            r.isError = !1, r.showArrow = !0, r.maxErrorsPerField > 0 && (p = !0);
            for (var m = e(t.closest("form, .validationEngineContainer")), g = 0; g < l.length; g++) l[g] = l[g].replace(" ", ""), "" === l[g] && delete l[g];
            for (var g = 0, h = 0; g < l.length; g++) {
                if (p && h >= r.maxErrorsPerField) {
                    if (!v) {
                        var _ = e.inArray("required", l);
                        v = -1 != _ && _ >= g
                    }
                    break
                }
                var x = void 0;
                switch (l[g]) {
                    case "required":
                        v = !0, x = a._getErrorMessage(m, t, l[g], l, g, r, a._required);
                        break;
                    case "custom":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._custom);
                        break;
                    case "groupRequired":
                        var C = "[" + r.validateAttribute + "*=" + l[g + 1] + "]",
                            b = m.find(C).eq(0);
                        b[0] != t[0] && (a._validateField(b, r, i), r.showArrow = !0), x = a._getErrorMessage(m, t, l[g], l, g, r, a._groupRequired), x && (v = !0), r.showArrow = !1;
                        break;
                    case "ajax":
                        x = a._ajax(t, l, g, r), x && (f = "load");
                        break;
                    case "minSize":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._minSize);
                        break;
                    case "maxSize":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._maxSize);
                        break;
                    case "min":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._min);
                        break;
                    case "max":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._max);
                        break;
                    case "past":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._past);
                        break;
                    case "future":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._future);
                        break;
                    case "dateRange":
                        var C = "[" + r.validateAttribute + "*=" + l[g + 1] + "]";
                        r.firstOfGroup = m.find(C).eq(0), r.secondOfGroup = m.find(C).eq(1), (r.firstOfGroup[0].value || r.secondOfGroup[0].value) && (x = a._getErrorMessage(m, t, l[g], l, g, r, a._dateRange)), x && (v = !0), r.showArrow = !1;
                        break;
                    case "dateTimeRange":
                        var C = "[" + r.validateAttribute + "*=" + l[g + 1] + "]";
                        r.firstOfGroup = m.find(C).eq(0), r.secondOfGroup = m.find(C).eq(1), (r.firstOfGroup[0].value || r.secondOfGroup[0].value) && (x = a._getErrorMessage(m, t, l[g], l, g, r, a._dateTimeRange)), x && (v = !0), r.showArrow = !1;
                        break;
                    case "maxCheckbox":
                        t = e(m.find("input[name='" + u + "']")), x = a._getErrorMessage(m, t, l[g], l, g, r, a._maxCheckbox);
                        break;
                    case "minCheckbox":
                        t = e(m.find("input[name='" + u + "']")), x = a._getErrorMessage(m, t, l[g], l, g, r, a._minCheckbox);
                        break;
                    case "equals":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._equals);
                        break;
                    case "verifycaptcha":
                        x = a._verifycaptcha(t, l, g, r);
                        break;
                    case "checkFileType":
                        x = a._checkFileType(t, l, g, r);
                        break;
                    case "funcCall":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._funcCall);
                        break;
                    case "creditCard":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._creditCard);
                        break;
                    case "condRequired":
                        x = a._getErrorMessage(m, t, l[g], l, g, r, a._condRequired), void 0 !== x && (v = !0)
                }
                var T = !1;
                if ("object" == typeof x) switch (x.status) {
                    case "_break":
                        T = !0;
                        break;
                    case "_error":
                        x = x.message;
                        break;
                    case "_error_no_prompt":
                        return !0
                }
                if (T) break;
                "string" == typeof x && (c += x + "<br/>", r.isError = !0, h++)
            }!v && !t.val() && t.val().length < 1 && e.inArray("equals", l) < 0 && (r.isError = !1);
            var E = t.prop("type"),
                F = t.data("promptPosition") || r.promptPosition;
            ("radio" == E || "checkbox" == E) && m.find("input[name='" + u + "']").size() > 1 && (t = e("inline" === F ? m.find("input[name='" + u + "'][type!=hidden]:last") : m.find("input[name='" + u + "'][type!=hidden]:first")), r.showArrow = r.showArrowOnRadioAndCheckbox), t.is(":hidden") && r.prettySelect && (t = m.find("#" + r.usePrefix + a._jqSelector(t.attr("id")) + r.useSuffix)), r.isError && r.showPrompts ? a._showPrompt(t, c, f, !1, r) : d || a._closePrompt(t), d || t.trigger("jqv.field.result", [t, r.isError, c]);
            var k = e.inArray(t[0], r.InvalidFields);
            return -1 == k ? r.isError && r.InvalidFields.push(t[0]) : r.isError || r.InvalidFields.splice(k, 1), a._handleStatusCssClasses(t, r), r.isError && r.onFieldFailure && r.onFieldFailure(t), !r.isError && r.onFieldSuccess && r.onFieldSuccess(t), r.isError
        },
        _handleStatusCssClasses: function(e, a) {
            a.addSuccessCssClassToField && e.removeClass(a.addSuccessCssClassToField), a.addFailureCssClassToField && e.removeClass(a.addFailureCssClassToField), a.addSuccessCssClassToField && !a.isError && e.addClass(a.addSuccessCssClassToField), a.addFailureCssClassToField && a.isError && e.addClass(a.addFailureCssClassToField)
        },
        _getErrorMessage: function(t, r, i, o, s, n, l) {
            var d = jQuery.inArray(i, o);
            if ("custom" === i || "funcCall" === i) {
                var u = o[d + 1];
                i = i + "[" + u + "]", delete o[d]
            }
            var c, f = i,
                v = r.attr(r.attr("data-validation-engine") ? "data-validation-engine" : "class"),
                p = v.split(" ");
            if (c = "future" == i || "past" == i || "maxCheckbox" == i || "minCheckbox" == i ? l(t, r, o, s, n) : l(r, o, s, n), void 0 != c) {
                var m = a._getCustomErrorMessage(e(r), p, f, n);
                m && (c = m)
            }
            return c
        },
        _getCustomErrorMessage: function(e, t, r, i) {
            var o = !1,
                s = /^custom\[.*\]$/.test(r) ? a._validityProp.custom : a._validityProp[r];
            if (void 0 != s && (o = e.attr("data-errormessage-" + s), void 0 != o)) return o;
            if (o = e.attr("data-errormessage"), void 0 != o) return o;
            var n = "#" + e.attr("id");
            if ("undefined" != typeof i.custom_error_messages[n] && "undefined" != typeof i.custom_error_messages[n][r]) o = i.custom_error_messages[n][r].message;
            else if (t.length > 0)
                for (var l = 0; l < t.length && t.length > 0; l++) {
                    var d = "." + t[l];
                    if ("undefined" != typeof i.custom_error_messages[d] && "undefined" != typeof i.custom_error_messages[d][r]) {
                        o = i.custom_error_messages[d][r].message;
                        break
                    }
                }
            return o || "undefined" == typeof i.custom_error_messages[r] || "undefined" == typeof i.custom_error_messages[r].message || (o = i.custom_error_messages[r].message), o
        },
        _validityProp: {
            required: "value-missing",
            custom: "custom-error",
            groupRequired: "value-missing",
            ajax: "custom-error",
            minSize: "range-underflow",
            maxSize: "range-overflow",
            min: "range-underflow",
            max: "range-overflow",
            past: "type-mismatch",
            future: "type-mismatch",
            dateRange: "type-mismatch",
            dateTimeRange: "type-mismatch",
            maxCheckbox: "range-overflow",
            minCheckbox: "range-underflow",
            equals: "pattern-mismatch",
            funcCall: "custom-error",
            creditCard: "pattern-mismatch",
            condRequired: "value-missing"
        },
        _required: function(a, t, r, i, o) {
            switch (a.prop("type")) {
                case "text":
                case "password":
                case "textarea":
                case "file":
                case "select-one":
                case "select-multiple":
                default:
                    var s = e.trim(a.val()),
                        n = e.trim(a.attr("data-validation-placeholder")),
                        l = e.trim(a.attr("placeholder"));
                    if (!s || n && s == n || l && s == l) return i.allrules[t[r]].alertText;
                    break;
                case "radio":
                case "checkbox":
                    if (o) {
                        if (!a.attr("checked")) return i.allrules[t[r]].alertTextCheckboxMultiple;
                        break
                    }
                    var d = a.closest("form, .validationEngineContainer"),
                        u = a.attr("name");
                    if (0 == d.find("input[name='" + u + "']:checked").size()) return 1 == d.find("input[name='" + u + "']:visible").size() ? i.allrules[t[r]].alertTextCheckboxe : i.allrules[t[r]].alertTextCheckboxMultiple
            }
        },
        _groupRequired: function(t, r, i, o) {
            var s = "[" + o.validateAttribute + "*=" + r[i + 1] + "]",
                n = !1;
            return t.closest("form, .validationEngineContainer").find(s).each(function() {
                return a._required(e(this), r, i, o) ? void 0 : (n = !0, !1)
            }), n ? void 0 : o.allrules[r[i]].alertText
        },
        _custom: function(e, a, t, r) {
            var i, o = a[t + 1],
                s = r.allrules[o];
            if (!s) return void alert("jqv:custom rule not found - " + o);
            if (s.regex) {
                var n = s.regex;
                if (!n) return void alert("jqv:custom regex not found - " + o);
                var l = new RegExp(n);
                if (!l.test(e.val())) return r.allrules[o].alertText
            } else {
                if (!s.func) return void alert("jqv:custom type not allowed " + o);
                if (i = s.func, "function" != typeof i) return void alert("jqv:custom parameter 'function' is no function - " + o);
                if (!i(e, a, t, r)) return r.allrules[o].alertText
            }
        },
        _funcCall: function(e, a, t, r) {
            var i, o = a[t + 1];
            if (o.indexOf(".") > -1) {
                for (var s = o.split("."), n = window; s.length;) n = n[s.shift()];
                i = n
            } else i = window[o] || r.customFunctions[o];
            return "function" == typeof i ? i(e, a, t, r) : void 0
        },
        _equals: function(a, t, r, i) {
            var o = t[r + 1];
            return a.val() != e("#" + o).val() ? i.allrules.equals.alertText : void 0
        },
        _verifycaptcha: function(a, t, r, i) {
            var o = t[r + 1];
            return a.val() != e("#" + o).val() ? i.allrules.verifycaptcha.alertText : void 0
        },
        _checkFileType: function(a, t, r, i) {
            var o = e(a);
            if (!o) return !0;
            var s = t[r + 1],
                n = new RegExp(s);
            return n.test(e(o).val().split(".").reverse()[0]) ? void 0 : i.allrules.checkFileType.alertText
        },
        _maxSize: function(e, a, t, r) {
            var i = a[t + 1],
                o = e.val().length;
            if (o > i) {
                var s = r.allrules.maxSize;
                return s.alertText + i + s.alertText2
            }
        },
        _minSize: function(e, a, t, r) {
            var i = a[t + 1],
                o = e.val().length;
            if (i > o) {
                var s = r.allrules.minSize;
                return s.alertText + i + s.alertText2
            }
        },
        _min: function(e, a, t, r) {
            var i = parseFloat(a[t + 1]),
                o = parseFloat(e.val());
            if (i > o) {
                var s = r.allrules.min;
                return s.alertText2 ? s.alertText + i + s.alertText2 : s.alertText + i
            }
        },
        _max: function(e, a, t, r) {
            var i = parseFloat(a[t + 1]),
                o = parseFloat(e.val());
            if (o > i) {
                var s = r.allrules.max;
                return s.alertText2 ? s.alertText + i + s.alertText2 : s.alertText + i
            }
        },
        _past: function(t, r, i, o, s) {
            var n, l = i[o + 1],
                d = e(t.find("*[name='" + l.replace(/^#+/, "") + "']"));
            if ("now" == l.toLowerCase()) n = new Date;
            else if (void 0 != d.val()) {
                if (d.is(":disabled")) return;
                n = a._parseDate(d.val())
            } else n = a._parseDate(l);
            var u = a._parseDate(r.val());
            if (u > n) {
                var c = s.allrules.past;
                return c.alertText2 ? c.alertText + a._dateToString(n) + c.alertText2 : c.alertText + a._dateToString(n)
            }
        },
        _future: function(t, r, i, o, s) {
            var n, l = i[o + 1],
                d = e(t.find("*[name='" + l.replace(/^#+/, "") + "']"));
            if ("now" == l.toLowerCase()) n = new Date;
            else if (void 0 != d.val()) {
                if (d.is(":disabled")) return;
                n = a._parseDate(d.val())
            } else n = a._parseDate(l);
            var u = a._parseDate(r.val());
            if (n > u) {
                var c = s.allrules.future;
                return c.alertText2 ? c.alertText + a._dateToString(n) + c.alertText2 : c.alertText + a._dateToString(n)
            }
        },
        _isDate: function(e) {
            var a = new RegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/);
            return a.test(e)
        },
        _isDateTime: function(e) {
            var a = new RegExp(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/);
            return a.test(e)
        },
        _dateCompare: function(e, a) {
            return new Date(e.toString()) < new Date(a.toString())
        },
        _dateRange: function(e, t, r, i) {
            return !i.firstOfGroup[0].value && i.secondOfGroup[0].value || i.firstOfGroup[0].value && !i.secondOfGroup[0].value ? i.allrules[t[r]].alertText + i.allrules[t[r]].alertText2 : a._isDate(i.firstOfGroup[0].value) && a._isDate(i.secondOfGroup[0].value) && a._dateCompare(i.firstOfGroup[0].value, i.secondOfGroup[0].value) ? void 0 : i.allrules[t[r]].alertText + i.allrules[t[r]].alertText2
        },
        _dateTimeRange: function(e, t, r, i) {
            return !i.firstOfGroup[0].value && i.secondOfGroup[0].value || i.firstOfGroup[0].value && !i.secondOfGroup[0].value ? i.allrules[t[r]].alertText + i.allrules[t[r]].alertText2 : a._isDateTime(i.firstOfGroup[0].value) && a._isDateTime(i.secondOfGroup[0].value) && a._dateCompare(i.firstOfGroup[0].value, i.secondOfGroup[0].value) ? void 0 : i.allrules[t[r]].alertText + i.allrules[t[r]].alertText2
        },
        _maxCheckbox: function(e, a, t, r, i) {
            var o = t[r + 1],
                s = a.attr("name"),
                n = e.find("input[name='" + s + "']:checked").size();
            return n > o ? (i.showArrow = !1, i.allrules.maxCheckbox.alertText2 ? i.allrules.maxCheckbox.alertText + " " + o + " " + i.allrules.maxCheckbox.alertText2 : i.allrules.maxCheckbox.alertText) : void 0
        },
        _minCheckbox: function(e, a, t, r, i) {
            var o = t[r + 1],
                s = a.attr("name"),
                n = e.find("input[name='" + s + "']:checked").size();
            return o > n ? (i.showArrow = !1, i.allrules.minCheckbox.alertText + " " + o + " " + i.allrules.minCheckbox.alertText2) : void 0
        },
        _creditCard: function(e, a, t, r) {
            var i = !1,
                o = e.val().replace(/ +/g, "").replace(/-+/g, ""),
                s = o.length;
            if (s >= 14 && 16 >= s && parseInt(o) > 0) {
                var n, l = 0,
                    t = s - 1,
                    d = 1,
                    u = new String;
                do n = parseInt(o.charAt(t)), u += d++ % 2 == 0 ? 2 * n : n; while (--t >= 0);
                for (t = 0; t < u.length; t++) l += parseInt(u.charAt(t));
                i = l % 10 == 0
            }
            return i ? void 0 : r.allrules.creditCard.alertText
        },
        _ajax: function(t, r, i, o) {
            var s = r[i + 1],
                n = o.allrules[s],
                l = n.extraData,
                d = n.extraDataDynamic,
                u = {
                    fieldId: t.attr("id"),
                    fieldValue: t.val()
                };
            if ("object" == typeof l) e.extend(u, l);
            else if ("string" == typeof l)
                for (var c = l.split("&"), i = 0; i < c.length; i++) {
                    var f = c[i].split("=");
                    f[0] && f[0] && (u[f[0]] = f[1])
                }
            if (d)
                for (var v = String(d).split(","), i = 0; i < v.length; i++) {
                    var p = v[i];
                    if (e(p).length) {
                        {
                            var m = t.closest("form, .validationEngineContainer").find(p).val();
                            p.replace("#", "") + "=" + escape(m)
                        }
                        u[p.replace("#", "")] = m
                    }
                }
            return "field" == o.eventTrigger && delete o.ajaxValidCache[t.attr("id")], o.isError || a._checkAjaxFieldStatus(t.attr("id"), o) ? void 0 : (e.ajax({
                type: o.ajaxFormValidationMethod,
                url: n.url,
                cache: !1,
                dataType: "json",
                data: u,
                field: t,
                rule: n,
                methods: a,
                options: o,
                beforeSend: function() {},
                error: function(e, t) {
                    o.onFailure ? o.onFailure(e, t) : a._ajaxError(e, t)
                },
                success: function(r) {
                    var i = r[0],
                        s = e("#" + i).eq(0);
                    if (1 == s.length) {
                        var l = r[1],
                            d = r[2];
                        if (l) {
                            if (o.ajaxValidCache[i] = !0, d) {
                                if (o.allrules[d]) {
                                    var u = o.allrules[d].alertTextOk;
                                    u && (d = u)
                                }
                            } else d = n.alertTextOk;
                            o.showPrompts && (d ? a._showPrompt(s, d, "pass", !0, o) : a._closePrompt(s)), "submit" == o.eventTrigger && t.closest("form").submit()
                        } else {
                            if (o.ajaxValidCache[i] = !1, o.isError = !0, d) {
                                if (o.allrules[d]) {
                                    var u = o.allrules[d].alertText;
                                    u && (d = u)
                                }
                            } else d = n.alertText;
                            o.showPrompts && a._showPrompt(s, d, "", !0, o)
                        }
                    }
                    s.trigger("jqv.field.result", [s, o.isError, d])
                }
            }), n.alertTextLoad)
        },
        _ajaxError: function(e, a) {
            0 == e.status && null == a ? alert("The page is not served from a server! ajax call failed") : "undefined" != typeof console && console.log("Ajax error: " + e.status + " " + a)
        },
        _dateToString: function(e) {
            return e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate()
        },
        _parseDate: function(e) {
            var a = e.split("-");
            return a == e && (a = e.split("/")), a == e ? (a = e.split("."), new Date(a[2], a[1] - 1, a[0])) : new Date(a[0], a[1] - 1, a[2])
        },
        _showPrompt: function(t, r, i, o, s, n) {
            t.data("jqv-prompt-at") instanceof jQuery ? t = t.data("jqv-prompt-at") : t.data("jqv-prompt-at") && (t = e(t.data("jqv-prompt-at")));
            var l = a._getPrompt(t);
            n && (l = !1), e.trim(r) && (l ? a._updatePrompt(t, l, r, i, o, s) : a._buildPrompt(t, r, i, o, s))
        },
        _buildPrompt: function(t, r, i, o, s) {
            var n = e("<div>");
            switch (n.addClass(a._getClassName(t.attr("id")) + "formError"), n.addClass("parentForm" + a._getClassName(t.closest("form, .validationEngineContainer").attr("id"))), n.addClass("formError"), i) {
                case "pass":
                    n.addClass("greenPopup");
                    break;
                case "load":
                    n.addClass("blackPopup")
            }
            o && n.addClass("ajaxed");
            var l = (e("<div>").addClass("formErrorContent").html(r).appendTo(n), t.data("promptPosition") || s.promptPosition);
            if (s.showArrow) {
                var d = e("<div>").addClass("formErrorArrow");
                if ("string" == typeof l) {
                    var u = l.indexOf(":"); - 1 != u && (l = l.substring(0, u))
                }
                switch (l) {
                    case "bottomLeft":
                    case "bottomRight":
                        n.find(".formErrorContent").before(d), d.addClass("formErrorArrowBottom").html('<div class="line1"><!-- --></div><div class="line2"><!-- --></div><div class="line3"><!-- --></div><div class="line4"><!-- --></div><div class="line5"><!-- --></div><div class="line6"><!-- --></div><div class="line7"><!-- --></div><div class="line8"><!-- --></div><div class="line9"><!-- --></div><div class="line10"><!-- --></div>');
                        break;
                    case "topLeft":
                    case "topRight":
                        d.html('<div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div>'), n.append(d)
                }
            }
            s.addPromptClass && n.addClass(s.addPromptClass);
            var c = t.attr("data-required-class");
            if (void 0 !== c) n.addClass(c);
            else if (s.prettySelect && e("#" + t.attr("id")).next().is("select")) {
                var f = e("#" + t.attr("id").substr(s.usePrefix.length).substring(s.useSuffix.length)).attr("data-required-class");
                void 0 !== f && n.addClass(f)
            }
            n.css({
                opacity: 0
            }), "inline" === l ? (n.addClass("inline"), "undefined" != typeof t.attr("data-prompt-target") && e("#" + t.attr("data-prompt-target")).length > 0 ? n.appendTo(e("#" + t.attr("data-prompt-target"))) : t.after(n)) : t.before(n);
            var u = a._calculatePosition(t, n, s);
            return n.css({
                position: "inline" === l ? "relative" : "absolute",
                top: u.callerTopPosition,
                left: u.callerleftPosition,
                marginTop: u.marginTopSize,
                opacity: 0
            }).data("callerField", t), s.autoHidePrompt && setTimeout(function() {
                n.animate({
                    opacity: 0
                }, function() {
                    n.closest(".formErrorOuter").remove(), n.remove()
                })
            }, s.autoHideDelay), n.animate({
                opacity: .87
            })
        },
        _updatePrompt: function(e, t, r, i, o, s, n) {
            if (t) {
                "undefined" != typeof i && ("pass" == i ? t.addClass("greenPopup") : t.removeClass("greenPopup"), "load" == i ? t.addClass("blackPopup") : t.removeClass("blackPopup")), o ? t.addClass("ajaxed") : t.removeClass("ajaxed"), t.find(".formErrorContent").html(r);
                var l = a._calculatePosition(e, t, s),
                    d = {
                        top: l.callerTopPosition,
                        left: l.callerleftPosition,
                        marginTop: l.marginTopSize
                    };
                n ? t.css(d) : t.animate(d)
            }
        },
        _closePrompt: function(e) {
            var t = a._getPrompt(e);
            t && t.fadeTo("fast", 0, function() {
                t.parent(".formErrorOuter").remove(), t.remove()
            })
        },
        closePrompt: function(e) {
            return a._closePrompt(e)
        },
        _getPrompt: function(t) {
            var r = e(t).closest("form, .validationEngineContainer").attr("id"),
                i = a._getClassName(t.attr("id")) + "formError",
                o = e("." + a._escapeExpression(i) + ".parentForm" + a._getClassName(r))[0];
            return o ? e(o) : void 0
        },
        _escapeExpression: function(e) {
            return e.replace(/([#;&,\.\+\*\~':"\!\^$\[\]\(\)=>\|])/g, "\\$1")
        },
        isRTL: function(a) {
            var t = e(document),
                r = e("body"),
                i = a && a.hasClass("rtl") || a && "rtl" === (a.attr("dir") || "").toLowerCase() || t.hasClass("rtl") || "rtl" === (t.attr("dir") || "").toLowerCase() || r.hasClass("rtl") || "rtl" === (r.attr("dir") || "").toLowerCase();
            return Boolean(i)
        },
        _calculatePosition: function(e, a, t) {
            var r, i, o, s = e.width(),
                n = e.position().left,
                l = e.position().top,
                d = (e.height(), a.height());
            r = i = 0, o = -d;
            var u = e.data("promptPosition") || t.promptPosition,
                c = "",
                f = "",
                v = 0,
                p = 0;
            switch ("string" == typeof u && -1 != u.indexOf(":") && (c = u.substring(u.indexOf(":") + 1), u = u.substring(0, u.indexOf(":")), -1 != c.indexOf(",") && (f = c.substring(c.indexOf(",") + 1), c = c.substring(0, c.indexOf(",")), p = parseInt(f), isNaN(p) && (p = 0)), v = parseInt(c), isNaN(c) && (c = 0)), u) {
                default:
                    case "topRight":
                    i += n + s - 27,
                r += l;
                break;
                case "topLeft":
                        r += l,
                    i += n;
                    break;
                case "centerRight":
                        r = l + 4,
                    o = 0,
                    i = n + e.outerWidth(!0) + 5;
                    break;
                case "centerLeft":
                        i = n - (a.width() + 2),
                    r = l + 4,
                    o = 0;
                    break;
                case "bottomLeft":
                        r = l + e.height() + 5,
                    o = 0,
                    i = n;
                    break;
                case "bottomRight":
                        i = n + s - 27,
                    r = l + e.height() + 5,
                    o = 0;
                    break;
                case "inline":
                        i = 0,
                    r = 0,
                    o = 0
            }
            return i += v, r += p, {
                callerTopPosition: r + "px",
                callerleftPosition: i + "px",
                marginTopSize: o + "px"
            }
        },
        _saveOptions: function(a, t) {
            if (e.validationEngineLanguage) var r = e.validationEngineLanguage.allRules;
            else e.error("jQuery.validationEngine rules are not loaded, plz add localization files to the page");
            e.validationEngine.defaults.allrules = r;
            var i = e.extend(!0, {}, e.validationEngine.defaults, t);
            return a.data("jqv", i), i
        },
        _getClassName: function(e) {
            return e ? e.replace(/:/g, "_").replace(/\./g, "_") : void 0
        },
        _jqSelector: function(e) {
            return e.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g, "\\$1")
        },
        _condRequired: function(e, t, r, i) {
            var o, s;
            for (o = r + 1; o < t.length; o++)
                if (s = jQuery("#" + t[o]).first(), s.length && void 0 == a._required(s, ["required"], 0, i, !0)) return a._required(e, ["required"], 0, i)
        },
        _submitButtonClick: function() {
            var a = e(this),
                t = a.closest("form, .validationEngineContainer");
            t.data("jqv_submitButton", a.attr("id"))
        }
    };
    e.fn.validationEngine = function(t) {
        var r = e(this);
        return r[0] ? "string" == typeof t && "_" != t.charAt(0) && a[t] ? ("showPrompt" != t && "hide" != t && "hideAll" != t && a.init.apply(r), a[t].apply(r, Array.prototype.slice.call(arguments, 1))) : "object" != typeof t && t ? void e.error("Method " + t + " does not exist in jQuery.validationEngine") : (a.init.apply(r, arguments), a.attach.apply(r)) : r
    }, e.validationEngine = {
        fieldIdCounter: 0,
        defaults: {
            validationEventTrigger: "blur",
            scroll: !0,
            focusFirstField: !0,
            showPrompts: !0,
            validateNonVisibleFields: !1,
            promptPosition: "topRight",
            bindMethod: "bind",
            inlineAjax: !1,
            ajaxFormValidation: !1,
            ajaxFormValidationURL: !1,
            ajaxFormValidationMethod: "get",
            onAjaxFormComplete: e.noop,
            onBeforeAjaxFormValidation: e.noop,
            onValidationComplete: !1,
            doNotShowAllErrosOnSubmit: !1,
            custom_error_messages: {},
            binded: !0,
            showArrow: !0,
            showArrowOnRadioAndCheckbox: !1,
            isError: !1,
            maxErrorsPerField: !1,
            ajaxValidCache: {},
            autoPositionUpdate: !1,
            InvalidFields: [],
            onFieldSuccess: !1,
            onFieldFailure: !1,
            onSuccess: !1,
            onFailure: !1,
            validateAttribute: "class",
            addSuccessCssClassToField: "",
            addFailureCssClassToField: "",
            autoHidePrompt: true,
            autoHideDelay: 3000,
            fadeDuration: .3,
            prettySelect: !1,
            addPromptClass: "",
            usePrefix: "",
            useSuffix: "",
            showOneMessage: !1
        }
    }, e(function() {
        e.validationEngine.defaults.promptPosition = a.isRTL() ? "topLeft" : "topRight"
    })
}(jQuery);