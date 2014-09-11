/*! jQuery v1.7.2 jquery.com | jquery.org/license */
(function(a,b){function cy(a){return f.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow:!1}function cu(a){if(!cj[a]){var b=c.body,d=f("<"+a+">").appendTo(b),e=d.css("display");d.remove();if(e==="none"||e===""){ck||(ck=c.createElement("iframe"),ck.frameBorder=ck.width=ck.height=0),b.appendChild(ck);if(!cl||!ck.createElement)cl=(ck.contentWindow||ck.contentDocument).document,cl.write((f.support.boxModel?"<!doctype html>":"")+"<html><body>"),cl.close();d=cl.createElement(a),cl.body.appendChild(d),e=f.css(d,"display"),b.removeChild(ck)}cj[a]=e}return cj[a]}function ct(a,b){var c={};f.each(cp.concat.apply([],cp.slice(0,b)),function(){c[this]=a});return c}function cs(){cq=b}function cr(){setTimeout(cs,0);return cq=f.now()}function ci(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}function ch(){try{return new a.XMLHttpRequest}catch(b){}}function cb(a,c){a.dataFilter&&(c=a.dataFilter(c,a.dataType));var d=a.dataTypes,e={},g,h,i=d.length,j,k=d[0],l,m,n,o,p;for(g=1;g<i;g++){if(g===1)for(h in a.converters)typeof h=="string"&&(e[h.toLowerCase()]=a.converters[h]);l=k,k=d[g];if(k==="*")k=l;else if(l!=="*"&&l!==k){m=l+" "+k,n=e[m]||e["* "+k];if(!n){p=b;for(o in e){j=o.split(" ");if(j[0]===l||j[0]==="*"){p=e[j[1]+" "+k];if(p){o=e[o],o===!0?n=p:p===!0&&(n=o);break}}}}!n&&!p&&f.error("No conversion from "+m.replace(" "," to ")),n!==!0&&(c=n?n(c):p(o(c)))}}return c}function ca(a,c,d){var e=a.contents,f=a.dataTypes,g=a.responseFields,h,i,j,k;for(i in g)i in d&&(c[g[i]]=d[i]);while(f[0]==="*")f.shift(),h===b&&(h=a.mimeType||c.getResponseHeader("content-type"));if(h)for(i in e)if(e[i]&&e[i].test(h)){f.unshift(i);break}if(f[0]in d)j=f[0];else{for(i in d){if(!f[0]||a.converters[i+" "+f[0]]){j=i;break}k||(k=i)}j=j||k}if(j){j!==f[0]&&f.unshift(j);return d[j]}}function b_(a,b,c,d){if(f.isArray(b))f.each(b,function(b,e){c||bD.test(a)?d(a,e):b_(a+"["+(typeof e=="object"?b:"")+"]",e,c,d)});else if(!c&&f.type(b)==="object")for(var e in b)b_(a+"["+e+"]",b[e],c,d);else d(a,b)}function b$(a,c){var d,e,g=f.ajaxSettings.flatOptions||{};for(d in c)c[d]!==b&&((g[d]?a:e||(e={}))[d]=c[d]);e&&f.extend(!0,a,e)}function bZ(a,c,d,e,f,g){f=f||c.dataTypes[0],g=g||{},g[f]=!0;var h=a[f],i=0,j=h?h.length:0,k=a===bS,l;for(;i<j&&(k||!l);i++)l=h[i](c,d,e),typeof l=="string"&&(!k||g[l]?l=b:(c.dataTypes.unshift(l),l=bZ(a,c,d,e,l,g)));(k||!l)&&!g["*"]&&(l=bZ(a,c,d,e,"*",g));return l}function bY(a){return function(b,c){typeof b!="string"&&(c=b,b="*");if(f.isFunction(c)){var d=b.toLowerCase().split(bO),e=0,g=d.length,h,i,j;for(;e<g;e++)h=d[e],j=/^\+/.test(h),j&&(h=h.substr(1)||"*"),i=a[h]=a[h]||[],i[j?"unshift":"push"](c)}}}function bB(a,b,c){var d=b==="width"?a.offsetWidth:a.offsetHeight,e=b==="width"?1:0,g=4;if(d>0){if(c!=="border")for(;e<g;e+=2)c||(d-=parseFloat(f.css(a,"padding"+bx[e]))||0),c==="margin"?d+=parseFloat(f.css(a,c+bx[e]))||0:d-=parseFloat(f.css(a,"border"+bx[e]+"Width"))||0;return d+"px"}d=by(a,b);if(d<0||d==null)d=a.style[b];if(bt.test(d))return d;d=parseFloat(d)||0;if(c)for(;e<g;e+=2)d+=parseFloat(f.css(a,"padding"+bx[e]))||0,c!=="padding"&&(d+=parseFloat(f.css(a,"border"+bx[e]+"Width"))||0),c==="margin"&&(d+=parseFloat(f.css(a,c+bx[e]))||0);return d+"px"}function bo(a){var b=c.createElement("div");bh.appendChild(b),b.innerHTML=a.outerHTML;return b.firstChild}function bn(a){var b=(a.nodeName||"").toLowerCase();b==="input"?bm(a):b!=="script"&&typeof a.getElementsByTagName!="undefined"&&f.grep(a.getElementsByTagName("input"),bm)}function bm(a){if(a.type==="checkbox"||a.type==="radio")a.defaultChecked=a.checked}function bl(a){return typeof a.getElementsByTagName!="undefined"?a.getElementsByTagName("*"):typeof a.querySelectorAll!="undefined"?a.querySelectorAll("*"):[]}function bk(a,b){var c;b.nodeType===1&&(b.clearAttributes&&b.clearAttributes(),b.mergeAttributes&&b.mergeAttributes(a),c=b.nodeName.toLowerCase(),c==="object"?b.outerHTML=a.outerHTML:c!=="input"||a.type!=="checkbox"&&a.type!=="radio"?c==="option"?b.selected=a.defaultSelected:c==="input"||c==="textarea"?b.defaultValue=a.defaultValue:c==="script"&&b.text!==a.text&&(b.text=a.text):(a.checked&&(b.defaultChecked=b.checked=a.checked),b.value!==a.value&&(b.value=a.value)),b.removeAttribute(f.expando),b.removeAttribute("_submit_attached"),b.removeAttribute("_change_attached"))}function bj(a,b){if(b.nodeType===1&&!!f.hasData(a)){var c,d,e,g=f._data(a),h=f._data(b,g),i=g.events;if(i){delete h.handle,h.events={};for(c in i)for(d=0,e=i[c].length;d<e;d++)f.event.add(b,c,i[c][d])}h.data&&(h.data=f.extend({},h.data))}}function bi(a,b){return f.nodeName(a,"table")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function U(a){var b=V.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}function T(a,b,c){b=b||0;if(f.isFunction(b))return f.grep(a,function(a,d){var e=!!b.call(a,d,a);return e===c});if(b.nodeType)return f.grep(a,function(a,d){return a===b===c});if(typeof b=="string"){var d=f.grep(a,function(a){return a.nodeType===1});if(O.test(b))return f.filter(b,d,!c);b=f.filter(b,d)}return f.grep(a,function(a,d){return f.inArray(a,b)>=0===c})}function S(a){return!a||!a.parentNode||a.parentNode.nodeType===11}function K(){return!0}function J(){return!1}function n(a,b,c){var d=b+"defer",e=b+"queue",g=b+"mark",h=f._data(a,d);h&&(c==="queue"||!f._data(a,e))&&(c==="mark"||!f._data(a,g))&&setTimeout(function(){!f._data(a,e)&&!f._data(a,g)&&(f.removeData(a,d,!0),h.fire())},0)}function m(a){for(var b in a){if(b==="data"&&f.isEmptyObject(a[b]))continue;if(b!=="toJSON")return!1}return!0}function l(a,c,d){if(d===b&&a.nodeType===1){var e="data-"+c.replace(k,"-$1").toLowerCase();d=a.getAttribute(e);if(typeof d=="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:f.isNumeric(d)?+d:j.test(d)?f.parseJSON(d):d}catch(g){}f.data(a,c,d)}else d=b}return d}function h(a){var b=g[a]={},c,d;a=a.split(/\s+/);for(c=0,d=a.length;c<d;c++)b[a[c]]=!0;return b}var c=a.document,d=a.navigator,e=a.location,f=function(){function J(){if(!e.isReady){try{c.documentElement.doScroll("left")}catch(a){setTimeout(J,1);return}e.ready()}}var e=function(a,b){return new e.fn.init(a,b,h)},f=a.jQuery,g=a.$,h,i=/^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,j=/\S/,k=/^\s+/,l=/\s+$/,m=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,n=/^[\],:{}\s]*$/,o=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,p=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,q=/(?:^|:|,)(?:\s*\[)+/g,r=/(webkit)[ \/]([\w.]+)/,s=/(opera)(?:.*version)?[ \/]([\w.]+)/,t=/(msie) ([\w.]+)/,u=/(mozilla)(?:.*? rv:([\w.]+))?/,v=/-([a-z]|[0-9])/ig,w=/^-ms-/,x=function(a,b){return(b+"").toUpperCase()},y=d.userAgent,z,A,B,C=Object.prototype.toString,D=Object.prototype.hasOwnProperty,E=Array.prototype.push,F=Array.prototype.slice,G=String.prototype.trim,H=Array.prototype.indexOf,I={};e.fn=e.prototype={constructor:e,init:function(a,d,f){var g,h,j,k;if(!a)return this;if(a.nodeType){this.context=this[0]=a,this.length=1;return this}if(a==="body"&&!d&&c.body){this.context=c,this[0]=c.body,this.selector=a,this.length=1;return this}if(typeof a=="string"){a.charAt(0)!=="<"||a.charAt(a.length-1)!==">"||a.length<3?g=i.exec(a):g=[null,a,null];if(g&&(g[1]||!d)){if(g[1]){d=d instanceof e?d[0]:d,k=d?d.ownerDocument||d:c,j=m.exec(a),j?e.isPlainObject(d)?(a=[c.createElement(j[1])],e.fn.attr.call(a,d,!0)):a=[k.createElement(j[1])]:(j=e.buildFragment([g[1]],[k]),a=(j.cacheable?e.clone(j.fragment):j.fragment).childNodes);return e.merge(this,a)}h=c.getElementById(g[2]);if(h&&h.parentNode){if(h.id!==g[2])return f.find(a);this.length=1,this[0]=h}this.context=c,this.selector=a;return this}return!d||d.jquery?(d||f).find(a):this.constructor(d).find(a)}if(e.isFunction(a))return f.ready(a);a.selector!==b&&(this.selector=a.selector,this.context=a.context);return e.makeArray(a,this)},selector:"",jquery:"1.7.2",length:0,size:function(){return this.length},toArray:function(){return F.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,b,c){var d=this.constructor();e.isArray(a)?E.apply(d,a):e.merge(d,a),d.prevObject=this,d.context=this.context,b==="find"?d.selector=this.selector+(this.selector?" ":"")+c:b&&(d.selector=this.selector+"."+b+"("+c+")");return d},each:function(a,b){return e.each(this,a,b)},ready:function(a){e.bindReady(),A.add(a);return this},eq:function(a){a=+a;return a===-1?this.slice(a):this.slice(a,a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(F.apply(this,arguments),"slice",F.call(arguments).join(","))},map:function(a){return this.pushStack(e.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:E,sort:[].sort,splice:[].splice},e.fn.init.prototype=e.fn,e.extend=e.fn.extend=function(){var a,c,d,f,g,h,i=arguments[0]||{},j=1,k=arguments.length,l=!1;typeof i=="boolean"&&(l=i,i=arguments[1]||{},j=2),typeof i!="object"&&!e.isFunction(i)&&(i={}),k===j&&(i=this,--j);for(;j<k;j++)if((a=arguments[j])!=null)for(c in a){d=i[c],f=a[c];if(i===f)continue;l&&f&&(e.isPlainObject(f)||(g=e.isArray(f)))?(g?(g=!1,h=d&&e.isArray(d)?d:[]):h=d&&e.isPlainObject(d)?d:{},i[c]=e.extend(l,h,f)):f!==b&&(i[c]=f)}return i},e.extend({noConflict:function(b){a.$===e&&(a.$=g),b&&a.jQuery===e&&(a.jQuery=f);return e},isReady:!1,readyWait:1,holdReady:function(a){a?e.readyWait++:e.ready(!0)},ready:function(a){if(a===!0&&!--e.readyWait||a!==!0&&!e.isReady){if(!c.body)return setTimeout(e.ready,1);e.isReady=!0;if(a!==!0&&--e.readyWait>0)return;A.fireWith(c,[e]),e.fn.trigger&&e(c).trigger("ready").off("ready")}},bindReady:function(){if(!A){A=e.Callbacks("once memory");if(c.readyState==="complete")return setTimeout(e.ready,1);if(c.addEventListener)c.addEventListener("DOMContentLoaded",B,!1),a.addEventListener("load",e.ready,!1);else if(c.attachEvent){c.attachEvent("onreadystatechange",B),a.attachEvent("onload",e.ready);var b=!1;try{b=a.frameElement==null}catch(d){}c.documentElement.doScroll&&b&&J()}}},isFunction:function(a){return e.type(a)==="function"},isArray:Array.isArray||function(a){return e.type(a)==="array"},isWindow:function(a){return a!=null&&a==a.window},isNumeric:function(a){return!isNaN(parseFloat(a))&&isFinite(a)},type:function(a){return a==null?String(a):I[C.call(a)]||"object"},isPlainObject:function(a){if(!a||e.type(a)!=="object"||a.nodeType||e.isWindow(a))return!1;try{if(a.constructor&&!D.call(a,"constructor")&&!D.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}var d;for(d in a);return d===b||D.call(a,d)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw new Error(a)},parseJSON:function(b){if(typeof b!="string"||!b)return null;b=e.trim(b);if(a.JSON&&a.JSON.parse)return a.JSON.parse(b);if(n.test(b.replace(o,"@").replace(p,"]").replace(q,"")))return(new Function("return "+b))();e.error("Invalid JSON: "+b)},parseXML:function(c){if(typeof c!="string"||!c)return null;var d,f;try{a.DOMParser?(f=new DOMParser,d=f.parseFromString(c,"text/xml")):(d=new ActiveXObject("Microsoft.XMLDOM"),d.async="false",d.loadXML(c))}catch(g){d=b}(!d||!d.documentElement||d.getElementsByTagName("parsererror").length)&&e.error("Invalid XML: "+c);return d},noop:function(){},globalEval:function(b){b&&j.test(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(w,"ms-").replace(v,x)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var f,g=0,h=a.length,i=h===b||e.isFunction(a);if(d){if(i){for(f in a)if(c.apply(a[f],d)===!1)break}else for(;g<h;)if(c.apply(a[g++],d)===!1)break}else if(i){for(f in a)if(c.call(a[f],f,a[f])===!1)break}else for(;g<h;)if(c.call(a[g],g,a[g++])===!1)break;return a},trim:G?function(a){return a==null?"":G.call(a)}:function(a){return a==null?"":(a+"").replace(k,"").replace(l,"")},makeArray:function(a,b){var c=b||[];if(a!=null){var d=e.type(a);a.length==null||d==="string"||d==="function"||d==="regexp"||e.isWindow(a)?E.call(c,a):e.merge(c,a)}return c},inArray:function(a,b,c){var d;if(b){if(H)return H.call(b,a,c);d=b.length,c=c?c<0?Math.max(0,d+c):c:0;for(;c<d;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,c){var d=a.length,e=0;if(typeof c.length=="number")for(var f=c.length;e<f;e++)a[d++]=c[e];else while(c[e]!==b)a[d++]=c[e++];a.length=d;return a},grep:function(a,b,c){var d=[],e;c=!!c;for(var f=0,g=a.length;f<g;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,c,d){var f,g,h=[],i=0,j=a.length,k=a instanceof e||j!==b&&typeof j=="number"&&(j>0&&a[0]&&a[j-1]||j===0||e.isArray(a));if(k)for(;i<j;i++)f=c(a[i],i,d),f!=null&&(h[h.length]=f);else for(g in a)f=c(a[g],g,d),f!=null&&(h[h.length]=f);return h.concat.apply([],h)},guid:1,proxy:function(a,c){if(typeof c=="string"){var d=a[c];c=a,a=d}if(!e.isFunction(a))return b;var f=F.call(arguments,2),g=function(){return a.apply(c,f.concat(F.call(arguments)))};g.guid=a.guid=a.guid||g.guid||e.guid++;return g},access:function(a,c,d,f,g,h,i){var j,k=d==null,l=0,m=a.length;if(d&&typeof d=="object"){for(l in d)e.access(a,c,l,d[l],1,h,f);g=1}else if(f!==b){j=i===b&&e.isFunction(f),k&&(j?(j=c,c=function(a,b,c){return j.call(e(a),c)}):(c.call(a,f),c=null));if(c)for(;l<m;l++)c(a[l],d,j?f.call(a[l],l,c(a[l],d)):f,i);g=1}return g?a:k?c.call(a):m?c(a[0],d):h},now:function(){return(new Date).getTime()},uaMatch:function(a){a=a.toLowerCase();var b=r.exec(a)||s.exec(a)||t.exec(a)||a.indexOf("compatible")<0&&u.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}e.extend(!0,a,this),a.superclass=this,a.fn=a.prototype=this(),a.fn.constructor=a,a.sub=this.sub,a.fn.init=function(d,f){f&&f instanceof e&&!(f instanceof a)&&(f=a(f));return e.fn.init.call(this,d,f,b)},a.fn.init.prototype=a.fn;var b=a(c);return a},browser:{}}),e.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){I["[object "+b+"]"]=b.toLowerCase()}),z=e.uaMatch(y),z.browser&&(e.browser[z.browser]=!0,e.browser.version=z.version),e.browser.webkit&&(e.browser.safari=!0),j.test(" ")&&(k=/^[\s\xA0]+/,l=/[\s\xA0]+$/),h=e(c),c.addEventListener?B=function(){c.removeEventListener("DOMContentLoaded",B,!1),e.ready()}:c.attachEvent&&(B=function(){c.readyState==="complete"&&(c.detachEvent("onreadystatechange",B),e.ready())});return e}(),g={};f.Callbacks=function(a){a=a?g[a]||h(a):{};var c=[],d=[],e,i,j,k,l,m,n=function(b){var d,e,g,h,i;for(d=0,e=b.length;d<e;d++)g=b[d],h=f.type(g),h==="array"?n(g):h==="function"&&(!a.unique||!p.has(g))&&c.push(g)},o=function(b,f){f=f||[],e=!a.memory||[b,f],i=!0,j=!0,m=k||0,k=0,l=c.length;for(;c&&m<l;m++)if(c[m].apply(b,f)===!1&&a.stopOnFalse){e=!0;break}j=!1,c&&(a.once?e===!0?p.disable():c=[]:d&&d.length&&(e=d.shift(),p.fireWith(e[0],e[1])))},p={add:function(){if(c){var a=c.length;n(arguments),j?l=c.length:e&&e!==!0&&(k=a,o(e[0],e[1]))}return this},remove:function(){if(c){var b=arguments,d=0,e=b.length;for(;d<e;d++)for(var f=0;f<c.length;f++)if(b[d]===c[f]){j&&f<=l&&(l--,f<=m&&m--),c.splice(f--,1);if(a.unique)break}}return this},has:function(a){if(c){var b=0,d=c.length;for(;b<d;b++)if(a===c[b])return!0}return!1},empty:function(){c=[];return this},disable:function(){c=d=e=b;return this},disabled:function(){return!c},lock:function(){d=b,(!e||e===!0)&&p.disable();return this},locked:function(){return!d},fireWith:function(b,c){d&&(j?a.once||d.push([b,c]):(!a.once||!e)&&o(b,c));return this},fire:function(){p.fireWith(this,arguments);return this},fired:function(){return!!i}};return p};var i=[].slice;f.extend({Deferred:function(a){var b=f.Callbacks("once memory"),c=f.Callbacks("once memory"),d=f.Callbacks("memory"),e="pending",g={resolve:b,reject:c,notify:d},h={done:b.add,fail:c.add,progress:d.add,state:function(){return e},isResolved:b.fired,isRejected:c.fired,then:function(a,b,c){i.done(a).fail(b).progress(c);return this},always:function(){i.done.apply(i,arguments).fail.apply(i,arguments);return this},pipe:function(a,b,c){return f.Deferred(function(d){f.each({done:[a,"resolve"],fail:[b,"reject"],progress:[c,"notify"]},function(a,b){var c=b[0],e=b[1],g;f.isFunction(c)?i[a](function(){g=c.apply(this,arguments),g&&f.isFunction(g.promise)?g.promise().then(d.resolve,d.reject,d.notify):d[e+"With"](this===i?d:this,[g])}):i[a](d[e])})}).promise()},promise:function(a){if(a==null)a=h;else for(var b in h)a[b]=h[b];return a}},i=h.promise({}),j;for(j in g)i[j]=g[j].fire,i[j+"With"]=g[j].fireWith;i.done(function(){e="resolved"},c.disable,d.lock).fail(function(){e="rejected"},b.disable,d.lock),a&&a.call(i,i);return i},when:function(a){function m(a){return function(b){e[a]=arguments.length>1?i.call(arguments,0):b,j.notifyWith(k,e)}}function l(a){return function(c){b[a]=arguments.length>1?i.call(arguments,0):c,--g||j.resolveWith(j,b)}}var b=i.call(arguments,0),c=0,d=b.length,e=Array(d),g=d,h=d,j=d<=1&&a&&f.isFunction(a.promise)?a:f.Deferred(),k=j.promise();if(d>1){for(;c<d;c++)b[c]&&b[c].promise&&f.isFunction(b[c].promise)?b[c].promise().then(l(c),j.reject,m(c)):--g;g||j.resolveWith(j,b)}else j!==a&&j.resolveWith(j,d?[a]:[]);return k}}),f.support=function(){var b,d,e,g,h,i,j,k,l,m,n,o,p=c.createElement("div"),q=c.documentElement;p.setAttribute("className","t"),p.innerHTML="   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>",d=p.getElementsByTagName("*"),e=p.getElementsByTagName("a")[0];if(!d||!d.length||!e)return{};g=c.createElement("select"),h=g.appendChild(c.createElement("option")),i=p.getElementsByTagName("input")[0],b={leadingWhitespace:p.firstChild.nodeType===3,tbody:!p.getElementsByTagName("tbody").length,htmlSerialize:!!p.getElementsByTagName("link").length,style:/top/.test(e.getAttribute("style")),hrefNormalized:e.getAttribute("href")==="/a",opacity:/^0.55/.test(e.style.opacity),cssFloat:!!e.style.cssFloat,checkOn:i.value==="on",optSelected:h.selected,getSetAttribute:p.className!=="t",enctype:!!c.createElement("form").enctype,html5Clone:c.createElement("nav").cloneNode(!0).outerHTML!=="<:nav></:nav>",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0,pixelMargin:!0},f.boxModel=b.boxModel=c.compatMode==="CSS1Compat",i.checked=!0,b.noCloneChecked=i.cloneNode(!0).checked,g.disabled=!0,b.optDisabled=!h.disabled;try{delete p.test}catch(r){b.deleteExpando=!1}!p.addEventListener&&p.attachEvent&&p.fireEvent&&(p.attachEvent("onclick",function(){b.noCloneEvent=!1}),p.cloneNode(!0).fireEvent("onclick")),i=c.createElement("input"),i.value="t",i.setAttribute("type","radio"),b.radioValue=i.value==="t",i.setAttribute("checked","checked"),i.setAttribute("name","t"),p.appendChild(i),j=c.createDocumentFragment(),j.appendChild(p.lastChild),b.checkClone=j.cloneNode(!0).cloneNode(!0).lastChild.checked,b.appendChecked=i.checked,j.removeChild(i),j.appendChild(p);if(p.attachEvent)for(n in{submit:1,change:1,focusin:1})m="on"+n,o=m in p,o||(p.setAttribute(m,"return;"),o=typeof p[m]=="function"),b[n+"Bubbles"]=o;j.removeChild(p),j=g=h=p=i=null,f(function(){var d,e,g,h,i,j,l,m,n,q,r,s,t,u=c.getElementsByTagName("body")[0];!u||(m=1,t="padding:0;margin:0;border:",r="position:absolute;top:0;left:0;width:1px;height:1px;",s=t+"0;visibility:hidden;",n="style='"+r+t+"5px solid #000;",q="<div "+n+"display:block;'><div style='"+t+"0;display:block;overflow:hidden;'></div></div>"+"<table "+n+"' cellpadding='0' cellspacing='0'>"+"<tr><td></td></tr></table>",d=c.createElement("div"),d.style.cssText=s+"width:0;height:0;position:static;top:0;margin-top:"+m+"px",u.insertBefore(d,u.firstChild),p=c.createElement("div"),d.appendChild(p),p.innerHTML="<table><tr><td style='"+t+"0;display:none'></td><td>t</td></tr></table>",k=p.getElementsByTagName("td"),o=k[0].offsetHeight===0,k[0].style.display="",k[1].style.display="none",b.reliableHiddenOffsets=o&&k[0].offsetHeight===0,a.getComputedStyle&&(p.innerHTML="",l=c.createElement("div"),l.style.width="0",l.style.marginRight="0",p.style.width="2px",p.appendChild(l),b.reliableMarginRight=(parseInt((a.getComputedStyle(l,null)||{marginRight:0}).marginRight,10)||0)===0),typeof p.style.zoom!="undefined"&&(p.innerHTML="",p.style.width=p.style.padding="1px",p.style.border=0,p.style.overflow="hidden",p.style.display="inline",p.style.zoom=1,b.inlineBlockNeedsLayout=p.offsetWidth===3,p.style.display="block",p.style.overflow="visible",p.innerHTML="<div style='width:5px;'></div>",b.shrinkWrapBlocks=p.offsetWidth!==3),p.style.cssText=r+s,p.innerHTML=q,e=p.firstChild,g=e.firstChild,i=e.nextSibling.firstChild.firstChild,j={doesNotAddBorder:g.offsetTop!==5,doesAddBorderForTableAndCells:i.offsetTop===5},g.style.position="fixed",g.style.top="20px",j.fixedPosition=g.offsetTop===20||g.offsetTop===15,g.style.position=g.style.top="",e.style.overflow="hidden",e.style.position="relative",j.subtractsBorderForOverflowNotVisible=g.offsetTop===-5,j.doesNotIncludeMarginInBodyOffset=u.offsetTop!==m,a.getComputedStyle&&(p.style.marginTop="1%",b.pixelMargin=(a.getComputedStyle(p,null)||{marginTop:0}).marginTop!=="1%"),typeof d.style.zoom!="undefined"&&(d.style.zoom=1),u.removeChild(d),l=p=d=null,f.extend(b,j))});return b}();var j=/^(?:\{.*\}|\[.*\])$/,k=/([A-Z])/g;f.extend({cache:{},uuid:0,expando:"jQuery"+(f.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?f.cache[a[f.expando]]:a[f.expando];return!!a&&!m(a)},data:function(a,c,d,e){if(!!f.acceptData(a)){var g,h,i,j=f.expando,k=typeof c=="string",l=a.nodeType,m=l?f.cache:a,n=l?a[j]:a[j]&&j,o=c==="events";if((!n||!m[n]||!o&&!e&&!m[n].data)&&k&&d===b)return;n||(l?a[j]=n=++f.uuid:n=j),m[n]||(m[n]={},l||(m[n].toJSON=f.noop));if(typeof c=="object"||typeof c=="function")e?m[n]=f.extend(m[n],c):m[n].data=f.extend(m[n].data,c);g=h=m[n],e||(h.data||(h.data={}),h=h.data),d!==b&&(h[f.camelCase(c)]=d);if(o&&!h[c])return g.events;k?(i=h[c],i==null&&(i=h[f.camelCase(c)])):i=h;return i}},removeData:function(a,b,c){if(!!f.acceptData(a)){var d,e,g,h=f.expando,i=a.nodeType,j=i?f.cache:a,k=i?a[h]:h;if(!j[k])return;if(b){d=c?j[k]:j[k].data;if(d){f.isArray(b)||(b in d?b=[b]:(b=f.camelCase(b),b in d?b=[b]:b=b.split(" ")));for(e=0,g=b.length;e<g;e++)delete d[b[e]];if(!(c?m:f.isEmptyObject)(d))return}}if(!c){delete j[k].data;if(!m(j[k]))return}f.support.deleteExpando||!j.setInterval?delete j[k]:j[k]=null,i&&(f.support.deleteExpando?delete a[h]:a.removeAttribute?a.removeAttribute(h):a[h]=null)}},_data:function(a,b,c){return f.data(a,b,c,!0)},acceptData:function(a){if(a.nodeName){var b=f.noData[a.nodeName.toLowerCase()];if(b)return b!==!0&&a.getAttribute("classid")===b}return!0}}),f.fn.extend({data:function(a,c){var d,e,g,h,i,j=this[0],k=0,m=null;if(a===b){if(this.length){m=f.data(j);if(j.nodeType===1&&!f._data(j,"parsedAttrs")){g=j.attributes;for(i=g.length;k<i;k++)h=g[k].name,h.indexOf("data-")===0&&(h=f.camelCase(h.substring(5)),l(j,h,m[h]));f._data(j,"parsedAttrs",!0)}}return m}if(typeof a=="object")return this.each(function(){f.data(this,a)});d=a.split(".",2),d[1]=d[1]?"."+d[1]:"",e=d[1]+"!";return f.access(this,function(c){if(c===b){m=this.triggerHandler("getData"+e,[d[0]]),m===b&&j&&(m=f.data(j,a),m=l(j,a,m));return m===b&&d[1]?this.data(d[0]):m}d[1]=c,this.each(function(){var b=f(this);b.triggerHandler("setData"+e,d),f.data(this,a,c),b.triggerHandler("changeData"+e,d)})},null,c,arguments.length>1,null,!1)},removeData:function(a){return this.each(function(){f.removeData(this,a)})}}),f.extend({_mark:function(a,b){a&&(b=(b||"fx")+"mark",f._data(a,b,(f._data(a,b)||0)+1))},_unmark:function(a,b,c){a!==!0&&(c=b,b=a,a=!1);if(b){c=c||"fx";var d=c+"mark",e=a?0:(f._data(b,d)||1)-1;e?f._data(b,d,e):(f.removeData(b,d,!0),n(b,c,"mark"))}},queue:function(a,b,c){var d;if(a){b=(b||"fx")+"queue",d=f._data(a,b),c&&(!d||f.isArray(c)?d=f._data(a,b,f.makeArray(c)):d.push(c));return d||[]}},dequeue:function(a,b){b=b||"fx";var c=f.queue(a,b),d=c.shift(),e={};d==="inprogress"&&(d=c.shift()),d&&(b==="fx"&&c.unshift("inprogress"),f._data(a,b+".run",e),d.call(a,function(){f.dequeue(a,b)},e)),c.length||(f.removeData(a,b+"queue "+b+".run",!0),n(a,b,"queue"))}}),f.fn.extend({queue:function(a,c){var d=2;typeof a!="string"&&(c=a,a="fx",d--);if(arguments.length<d)return f.queue(this[0],a);return c===b?this:this.each(function(){var b=f.queue(this,a,c);a==="fx"&&b[0]!=="inprogress"&&f.dequeue(this,a)})},dequeue:function(a){return this.each(function(){f.dequeue(this,a)})},delay:function(a,b){a=f.fx?f.fx.speeds[a]||a:a,b=b||"fx";return this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,c){function m(){--h||d.resolveWith(e,[e])}typeof a!="string"&&(c=a,a=b),a=a||"fx";var d=f.Deferred(),e=this,g=e.length,h=1,i=a+"defer",j=a+"queue",k=a+"mark",l;while(g--)if(l=f.data(e[g],i,b,!0)||(f.data(e[g],j,b,!0)||f.data(e[g],k,b,!0))&&f.data(e[g],i,f.Callbacks("once memory"),!0))h++,l.add(m);m();return d.promise(c)}});var o=/[\n\t\r]/g,p=/\s+/,q=/\r/g,r=/^(?:button|input)$/i,s=/^(?:button|input|object|select|textarea)$/i,t=/^a(?:rea)?$/i,u=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,v=f.support.getSetAttribute,w,x,y;f.fn.extend({attr:function(a,b){return f.access(this,f.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){f.removeAttr(this,a)})},prop:function(a,b){return f.access(this,f.prop,a,b,arguments.length>1)},removeProp:function(a){a=f.propFix[a]||a;return this.each(function(){try{this[a]=b,delete this[a]}catch(c){}})},addClass:function(a){var b,c,d,e,g,h,i;if(f.isFunction(a))return this.each(function(b){f(this).addClass(a.call(this,b,this.className))});if(a&&typeof a=="string"){b=a.split(p);for(c=0,d=this.length;c<d;c++){e=this[c];if(e.nodeType===1)if(!e.className&&b.length===1)e.className=a;else{g=" "+e.className+" ";for(h=0,i=b.length;h<i;h++)~g.indexOf(" "+b[h]+" ")||(g+=b[h]+" ");e.className=f.trim(g)}}}return this},removeClass:function(a){var c,d,e,g,h,i,j;if(f.isFunction(a))return this.each(function(b){f(this).removeClass(a.call(this,b,this.className))});if(a&&typeof a=="string"||a===b){c=(a||"").split(p);for(d=0,e=this.length;d<e;d++){g=this[d];if(g.nodeType===1&&g.className)if(a){h=(" "+g.className+" ").replace(o," ");for(i=0,j=c.length;i<j;i++)h=h.replace(" "+c[i]+" "," ");g.className=f.trim(h)}else g.className=""}}return this},toggleClass:function(a,b){var c=typeof a,d=typeof b=="boolean";if(f.isFunction(a))return this.each(function(c){f(this).toggleClass(a.call(this,c,this.className,b),b)});return this.each(function(){if(c==="string"){var e,g=0,h=f(this),i=b,j=a.split(p);while(e=j[g++])i=d?i:!h.hasClass(e),h[i?"addClass":"removeClass"](e)}else if(c==="undefined"||c==="boolean")this.className&&f._data(this,"__className__",this.className),this.className=this.className||a===!1?"":f._data(this,"__className__")||""})},hasClass:function(a){var b=" "+a+" ",c=0,d=this.length;for(;c<d;c++)if(this[c].nodeType===1&&(" "+this[c].className+" ").replace(o," ").indexOf(b)>-1)return!0;return!1},val:function(a){var c,d,e,g=this[0];{if(!!arguments.length){e=f.isFunction(a);return this.each(function(d){var g=f(this),h;if(this.nodeType===1){e?h=a.call(this,d,g.val()):h=a,h==null?h="":typeof h=="number"?h+="":f.isArray(h)&&(h=f.map(h,function(a){return a==null?"":a+""})),c=f.valHooks[this.type]||f.valHooks[this.nodeName.toLowerCase()];if(!c||!("set"in c)||c.set(this,h,"value")===b)this.value=h}})}if(g){c=f.valHooks[g.type]||f.valHooks[g.nodeName.toLowerCase()];if(c&&"get"in c&&(d=c.get(g,"value"))!==b)return d;d=g.value;return typeof d=="string"?d.replace(q,""):d==null?"":d}}}}),f.extend({valHooks:{option:{get:function(a){var b=a.attributes.value;return!b||b.specified?a.value:a.text}},select:{get:function(a){var b,c,d,e,g=a.selectedIndex,h=[],i=a.options,j=a.type==="select-one";if(g<0)return null;c=j?g:0,d=j?g+1:i.length;for(;c<d;c++){e=i[c];if(e.selected&&(f.support.optDisabled?!e.disabled:e.getAttribute("disabled")===null)&&(!e.parentNode.disabled||!f.nodeName(e.parentNode,"optgroup"))){b=f(e).val();if(j)return b;h.push(b)}}if(j&&!h.length&&i.length)return f(i[g]).val();return h},set:function(a,b){var c=f.makeArray(b);f(a).find("option").each(function(){this.selected=f.inArray(f(this).val(),c)>=0}),c.length||(a.selectedIndex=-1);return c}}},attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attr:function(a,c,d,e){var g,h,i,j=a.nodeType;if(!!a&&j!==3&&j!==8&&j!==2){if(e&&c in f.attrFn)return f(a)[c](d);if(typeof a.getAttribute=="undefined")return f.prop(a,c,d);i=j!==1||!f.isXMLDoc(a),i&&(c=c.toLowerCase(),h=f.attrHooks[c]||(u.test(c)?x:w));if(d!==b){if(d===null){f.removeAttr(a,c);return}if(h&&"set"in h&&i&&(g=h.set(a,d,c))!==b)return g;a.setAttribute(c,""+d);return d}if(h&&"get"in h&&i&&(g=h.get(a,c))!==null)return g;g=a.getAttribute(c);return g===null?b:g}},removeAttr:function(a,b){var c,d,e,g,h,i=0;if(b&&a.nodeType===1){d=b.toLowerCase().split(p),g=d.length;for(;i<g;i++)e=d[i],e&&(c=f.propFix[e]||e,h=u.test(e),h||f.attr(a,e,""),a.removeAttribute(v?e:c),h&&c in a&&(a[c]=!1))}},attrHooks:{type:{set:function(a,b){if(r.test(a.nodeName)&&a.parentNode)f.error("type property can't be changed");else if(!f.support.radioValue&&b==="radio"&&f.nodeName(a,"input")){var c=a.value;a.setAttribute("type",b),c&&(a.value=c);return b}}},value:{get:function(a,b){if(w&&f.nodeName(a,"button"))return w.get(a,b);return b in a?a.value:null},set:function(a,b,c){if(w&&f.nodeName(a,"button"))return w.set(a,b,c);a.value=b}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(a,c,d){var e,g,h,i=a.nodeType;if(!!a&&i!==3&&i!==8&&i!==2){h=i!==1||!f.isXMLDoc(a),h&&(c=f.propFix[c]||c,g=f.propHooks[c]);return d!==b?g&&"set"in g&&(e=g.set(a,d,c))!==b?e:a[c]=d:g&&"get"in g&&(e=g.get(a,c))!==null?e:a[c]}},propHooks:{tabIndex:{get:function(a){var c=a.getAttributeNode("tabindex");return c&&c.specified?parseInt(c.value,10):s.test(a.nodeName)||t.test(a.nodeName)&&a.href?0:b}}}}),f.attrHooks.tabindex=f.propHooks.tabIndex,x={get:function(a,c){var d,e=f.prop(a,c);return e===!0||typeof e!="boolean"&&(d=a.getAttributeNode(c))&&d.nodeValue!==!1?c.toLowerCase():b},set:function(a,b,c){var d;b===!1?f.removeAttr(a,c):(d=f.propFix[c]||c,d in a&&(a[d]=!0),a.setAttribute(c,c.toLowerCase()));return c}},v||(y={name:!0,id:!0,coords:!0},w=f.valHooks.button={get:function(a,c){var d;d=a.getAttributeNode(c);return d&&(y[c]?d.nodeValue!=="":d.specified)?d.nodeValue:b},set:function(a,b,d){var e=a.getAttributeNode(d);e||(e=c.createAttribute(d),a.setAttributeNode(e));return e.nodeValue=b+""}},f.attrHooks.tabindex.set=w.set,f.each(["width","height"],function(a,b){f.attrHooks[b]=f.extend(f.attrHooks[b],{set:function(a,c){if(c===""){a.setAttribute(b,"auto");return c}}})}),f.attrHooks.contenteditable={get:w.get,set:function(a,b,c){b===""&&(b="false"),w.set(a,b,c)}}),f.support.hrefNormalized||f.each(["href","src","width","height"],function(a,c){f.attrHooks[c]=f.extend(f.attrHooks[c],{get:function(a){var d=a.getAttribute(c,2);return d===null?b:d}})}),f.support.style||(f.attrHooks.style={get:function(a){return a.style.cssText.toLowerCase()||b},set:function(a,b){return a.style.cssText=""+b}}),f.support.optSelected||(f.propHooks.selected=f.extend(f.propHooks.selected,{get:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex);return null}})),f.support.enctype||(f.propFix.enctype="encoding"),f.support.checkOn||f.each(["radio","checkbox"],function(){f.valHooks[this]={get:function(a){return a.getAttribute("value")===null?"on":a.value}}}),f.each(["radio","checkbox"],function(){f.valHooks[this]=f.extend(f.valHooks[this],{set:function(a,b){if(f.isArray(b))return a.checked=f.inArray(f(a).val(),b)>=0}})});var z=/^(?:textarea|input|select)$/i,A=/^([^\.]*)?(?:\.(.+))?$/,B=/(?:^|\s)hover(\.\S+)?\b/,C=/^key/,D=/^(?:mouse|contextmenu)|click/,E=/^(?:focusinfocus|focusoutblur)$/,F=/^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,G=function(a){var b=F.exec(a);b&&(b[1]=(b[1]||"").toLowerCase(),b[3]=b[3]&&new RegExp("(?:^|\\s)"+b[3]+"(?:\\s|$)"));return b},H=function(a,b){var c=a.attributes||{};return(!b[1]||a.nodeName.toLowerCase()===b[1])&&(!b[2]||(c.id||{}).value===b[2])&&(!b[3]||b[3].test((c["class"]||{}).value))},I=function(a){return f.event.special.hover?a:a.replace(B,"mouseenter$1 mouseleave$1")};f.event={add:function(a,c,d,e,g){var h,i,j,k,l,m,n,o,p,q,r,s;if(!(a.nodeType===3||a.nodeType===8||!c||!d||!(h=f._data(a)))){d.handler&&(p=d,d=p.handler,g=p.selector),d.guid||(d.guid=f.guid++),j=h.events,j||(h.events=j={}),i=h.handle,i||(h.handle=i=function(a){return typeof f!="undefined"&&(!a||f.event.triggered!==a.type)?f.event.dispatch.apply(i.elem,arguments):b},i.elem=a),c=f.trim(I(c)).split(" ");for(k=0;k<c.length;k++){l=A.exec(c[k])||[],m=l[1],n=(l[2]||"").split(".").sort(),s=f.event.special[m]||{},m=(g?s.delegateType:s.bindType)||m,s=f.event.special[m]||{},o=f.extend({type:m,origType:l[1],data:e,handler:d,guid:d.guid,selector:g,quick:g&&G(g),namespace:n.join(".")},p),r=j[m];if(!r){r=j[m]=[],r.delegateCount=0;if(!s.setup||s.setup.call(a,e,n,i)===!1)a.addEventListener?a.addEventListener(m,i,!1):a.attachEvent&&a.attachEvent("on"+m,i)}s.add&&(s.add.call(a,o),o.handler.guid||(o.handler.guid=d.guid)),g?r.splice(r.delegateCount++,0,o):r.push(o),f.event.global[m]=!0}a=null}},global:{},remove:function(a,b,c,d,e){var g=f.hasData(a)&&f._data(a),h,i,j,k,l,m,n,o,p,q,r,s;if(!!g&&!!(o=g.events)){b=f.trim(I(b||"")).split(" ");for(h=0;h<b.length;h++){i=A.exec(b[h])||[],j=k=i[1],l=i[2];if(!j){for(j in o)f.event.remove(a,j+b[h],c,d,!0);continue}p=f.event.special[j]||{},j=(d?p.delegateType:p.bindType)||j,r=o[j]||[],m=r.length,l=l?new RegExp("(^|\\.)"+l.split(".").sort().join("\\.(?:.*\\.)?")+"(\\.|$)"):null;for(n=0;n<r.length;n++)s=r[n],(e||k===s.origType)&&(!c||c.guid===s.guid)&&(!l||l.test(s.namespace))&&(!d||d===s.selector||d==="**"&&s.selector)&&(r.splice(n--,1),s.selector&&r.delegateCount--,p.remove&&p.remove.call(a,s));r.length===0&&m!==r.length&&((!p.teardown||p.teardown.call(a,l)===!1)&&f.removeEvent(a,j,g.handle),delete o[j])}f.isEmptyObject(o)&&(q=g.handle,q&&(q.elem=null),f.removeData(a,["events","handle"],!0))}},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(c,d,e,g){if(!e||e.nodeType!==3&&e.nodeType!==8){var h=c.type||c,i=[],j,k,l,m,n,o,p,q,r,s;if(E.test(h+f.event.triggered))return;h.indexOf("!")>=0&&(h=h.slice(0,-1),k=!0),h.indexOf(".")>=0&&(i=h.split("."),h=i.shift(),i.sort());if((!e||f.event.customEvent[h])&&!f.event.global[h])return;c=typeof c=="object"?c[f.expando]?c:new f.Event(h,c):new f.Event(h),c.type=h,c.isTrigger=!0,c.exclusive=k,c.namespace=i.join("."),c.namespace_re=c.namespace?new RegExp("(^|\\.)"+i.join("\\.(?:.*\\.)?")+"(\\.|$)"):null,o=h.indexOf(":")<0?"on"+h:"";if(!e){j=f.cache;for(l in j)j[l].events&&j[l].events[h]&&f.event.trigger(c,d,j[l].handle.elem,!0);return}c.result=b,c.target||(c.target=e),d=d!=null?f.makeArray(d):[],d.unshift(c),p=f.event.special[h]||{};if(p.trigger&&p.trigger.apply(e,d)===!1)return;r=[[e,p.bindType||h]];if(!g&&!p.noBubble&&!f.isWindow(e)){s=p.delegateType||h,m=E.test(s+h)?e:e.parentNode,n=null;for(;m;m=m.parentNode)r.push([m,s]),n=m;n&&n===e.ownerDocument&&r.push([n.defaultView||n.parentWindow||a,s])}for(l=0;l<r.length&&!c.isPropagationStopped();l++)m=r[l][0],c.type=r[l][1],q=(f._data(m,"events")||{})[c.type]&&f._data(m,"handle"),q&&q.apply(m,d),q=o&&m[o],q&&f.acceptData(m)&&q.apply(m,d)===!1&&c.preventDefault();c.type=h,!g&&!c.isDefaultPrevented()&&(!p._default||p._default.apply(e.ownerDocument,d)===!1)&&(h!=="click"||!f.nodeName(e,"a"))&&f.acceptData(e)&&o&&e[h]&&(h!=="focus"&&h!=="blur"||c.target.offsetWidth!==0)&&!f.isWindow(e)&&(n=e[o],n&&(e[o]=null),f.event.triggered=h,e[h](),f.event.triggered=b,n&&(e[o]=n));return c.result}},dispatch:function(c){c=f.event.fix(c||a.event);var d=(f._data(this,"events")||{})[c.type]||[],e=d.delegateCount,g=[].slice.call(arguments,0),h=!c.exclusive&&!c.namespace,i=f.event.special[c.type]||{},j=[],k,l,m,n,o,p,q,r,s,t,u;g[0]=c,c.delegateTarget=this;if(!i.preDispatch||i.preDispatch.call(this,c)!==!1){if(e&&(!c.button||c.type!=="click")){n=f(this),n.context=this.ownerDocument||this;for(m=c.target;m!=this;m=m.parentNode||this)if(m.disabled!==!0){p={},r=[],n[0]=m;for(k=0;k<e;k++)s=d[k],t=s.selector,p[t]===b&&(p[t]=s.quick?H(m,s.quick):n.is(t)),p[t]&&r.push(s);r.length&&j.push({elem:m,matches:r})}}d.length>e&&j.push({elem:this,matches:d.slice(e)});for(k=0;k<j.length&&!c.isPropagationStopped();k++){q=j[k],c.currentTarget=q.elem;for(l=0;l<q.matches.length&&!c.isImmediatePropagationStopped();l++){s=q.matches[l];if(h||!c.namespace&&!s.namespace||c.namespace_re&&c.namespace_re.test(s.namespace))c.data=s.data,c.handleObj=s,o=((f.event.special[s.origType]||{}).handle||s.handler).apply(q.elem,g),o!==b&&(c.result=o,o===!1&&(c.preventDefault(),c.stopPropagation()))}}i.postDispatch&&i.postDispatch.call(this,c);return c.result}},props:"attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){a.which==null&&(a.which=b.charCode!=null?b.charCode:b.keyCode);return a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,d){var e,f,g,h=d.button,i=d.fromElement;a.pageX==null&&d.clientX!=null&&(e=a.target.ownerDocument||c,f=e.documentElement,g=e.body,a.pageX=d.clientX+(f&&f.scrollLeft||g&&g.scrollLeft||0)-(f&&f.clientLeft||g&&g.clientLeft||0),a.pageY=d.clientY+(f&&f.scrollTop||g&&g.scrollTop||0)-(f&&f.clientTop||g&&g.clientTop||0)),!a.relatedTarget&&i&&(a.relatedTarget=i===a.target?d.toElement:i),!a.which&&h!==b&&(a.which=h&1?1:h&2?3:h&4?2:0);return a}},fix:function(a){if(a[f.expando])return a;var d,e,g=a,h=f.event.fixHooks[a.type]||{},i=h.props?this.props.concat(h.props):this.props;a=f.Event(g);for(d=i.length;d;)e=i[--d],a[e]=g[e];a.target||(a.target=g.srcElement||c),a.target.nodeType===3&&(a.target=a.target.parentNode),a.metaKey===b&&(a.metaKey=a.ctrlKey);return h.filter?h.filter(a,g):a},special:{ready:{setup:f.bindReady},load:{noBubble:!0},focus:{delegateType:"focusin"},blur:{delegateType:"focusout"},beforeunload:{setup:function(a,b,c){f.isWindow(this)&&(this.onbeforeunload=c)},teardown:function(a,b){this.onbeforeunload===b&&(this.onbeforeunload=null)}}},simulate:function(a,b,c,d){var e=f.extend(new f.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?f.event.trigger(e,null,b):f.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},f.event.handle=f.event.dispatch,f.removeEvent=c.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)},f.Event=function(a,b){if(!(this instanceof f.Event))return new f.Event(a,b);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?K:J):this.type=a,b&&f.extend(this,b),this.timeStamp=a&&a.timeStamp||f.now(),this[f.expando]=!0},f.Event.prototype={preventDefault:function(){this.isDefaultPrevented=K;var a=this.originalEvent;!a||(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){this.isPropagationStopped=K;var a=this.originalEvent;!a||(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=K,this.stopPropagation()},isDefaultPrevented:J,isPropagationStopped:J,isImmediatePropagationStopped:J},f.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){f.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c=this,d=a.relatedTarget,e=a.handleObj,g=e.selector,h;if(!d||d!==c&&!f.contains(c,d))a.type=e.origType,h=e.handler.apply(this,arguments),a.type=b;return h}}}),f.support.submitBubbles||(f.event.special.submit={setup:function(){if(f.nodeName(this,"form"))return!1;f.event.add(this,"click._submit keypress._submit",function(a){var c=a.target,d=f.nodeName(c,"input")||f.nodeName(c,"button")?c.form:b;d&&!d._submit_attached&&(f.event.add(d,"submit._submit",function(a){a._submit_bubble=!0}),d._submit_attached=!0)})},postDispatch:function(a){a._submit_bubble&&(delete a._submit_bubble,this.parentNode&&!a.isTrigger&&f.event.simulate("submit",this.parentNode,a,!0))},teardown:function(){if(f.nodeName(this,"form"))return!1;f.event.remove(this,"._submit")}}),f.support.changeBubbles||(f.event.special.change={setup:function(){if(z.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio")f.event.add(this,"propertychange._change",function(a){a.originalEvent.propertyName==="checked"&&(this._just_changed=!0)}),f.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1,f.event.simulate("change",this,a,!0))});return!1}f.event.add(this,"beforeactivate._change",function(a){var b=a.target;z.test(b.nodeName)&&!b._change_attached&&(f.event.add(b,"change._change",function(a){this.parentNode&&!a.isSimulated&&!a.isTrigger&&f.event.simulate("change",this.parentNode,a,!0)}),b._change_attached=!0)})},handle:function(a){var b=a.target;if(this!==b||a.isSimulated||a.isTrigger||b.type!=="radio"&&b.type!=="checkbox")return a.handleObj.handler.apply(this,arguments)},teardown:function(){f.event.remove(this,"._change");return z.test(this.nodeName)}}),f.support.focusinBubbles||f.each({focus:"focusin",blur:"focusout"},function(a,b){var d=0,e=function(a){f.event.simulate(b,a.target,f.event.fix(a),!0)};f.event.special[b]={setup:function(){d++===0&&c.addEventListener(a,e,!0)},teardown:function(){--d===0&&c.removeEventListener(a,e,!0)}}}),f.fn.extend({on:function(a,c,d,e,g){var h,i;if(typeof a=="object"){typeof c!="string"&&(d=d||c,c=b);for(i in a)this.on(i,c,d,a[i],g);return this}d==null&&e==null?(e=c,d=c=b):e==null&&(typeof c=="string"?(e=d,d=b):(e=d,d=c,c=b));if(e===!1)e=J;else if(!e)return this;g===1&&(h=e,e=function(a){f().off(a);return h.apply(this,arguments)},e.guid=h.guid||(h.guid=f.guid++));return this.each(function(){f.event.add(this,a,e,d,c)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,c,d){if(a&&a.preventDefault&&a.handleObj){var e=a.handleObj;f(a.delegateTarget).off(e.namespace?e.origType+"."+e.namespace:e.origType,e.selector,e.handler);return this}if(typeof a=="object"){for(var g in a)this.off(g,c,a[g]);return this}if(c===!1||typeof c=="function")d=c,c=b;d===!1&&(d=J);return this.each(function(){f.event.remove(this,a,d,c)})},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},live:function(a,b,c){f(this.context).on(a,this.selector,b,c);return this},die:function(a,b){f(this.context).off(a,this.selector||"**",b);return this},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return arguments.length==1?this.off(a,"**"):this.off(b,a,c)},trigger:function(a,b){return this.each(function(){f.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0])return f.event.trigger(a,b,this[0],!0)},toggle:function(a){var b=arguments,c=a.guid||f.guid++,d=0,e=function(c){var e=(f._data(this,"lastToggle"+a.guid)||0)%d;f._data(this,"lastToggle"+a.guid,e+1),c.preventDefault();return b[e].apply(this,arguments)||!1};e.guid=c;while(d<b.length)b[d++].guid=c;return this.click(e)},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),f.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){f.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.on(b,null,a,c):this.trigger(b)},f.attrFn&&(f.attrFn[b]=!0),C.test(b)&&(f.event.fixHooks[b]=f.event.keyHooks),D.test(b)&&(f.event.fixHooks[b]=f.event.mouseHooks)}),function(){function x(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}if(j.nodeType===1){g||(j[d]=c,j.sizset=h);if(typeof b!="string"){if(j===b){k=!0;break}}else if(m.filter(b,[j]).length>0){k=j;break}}j=j[a]}e[h]=k}}}function w(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}j.nodeType===1&&!g&&(j[d]=c,j.sizset=h);if(j.nodeName.toLowerCase()===b){k=j;break}j=j[a]}e[h]=k}}}var a=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,d="sizcache"+(Math.random()+"").replace(".",""),e=0,g=Object.prototype.toString,h=!1,i=!0,j=/\\/g,k=/\r\n/g,l=/\W/;[0,0].sort(function(){i=!1;return 0});var m=function(b,d,e,f){e=e||[],d=d||c;var h=d;if(d.nodeType!==1&&d.nodeType!==9)return[];if(!b||typeof b!="string")return e;var i,j,k,l,n,q,r,t,u=!0,v=m.isXML(d),w=[],x=b;do{a.exec(""),i=a.exec(x);if(i){x=i[3],w.push(i[1]);if(i[2]){l=i[3];break}}}while(i);if(w.length>1&&p.exec(b))if(w.length===2&&o.relative[w[0]])j=y(w[0]+w[1],d,f);else{j=o.relative[w[0]]?[d]:m(w.shift(),d);while(w.length)b=w.shift(),o.relative[b]&&(b+=w.shift()),j=y(b,j,f)}else{!f&&w.length>1&&d.nodeType===9&&!v&&o.match.ID.test(w[0])&&!o.match.ID.test(w[w.length-1])&&(n=m.find(w.shift(),d,v),d=n.expr?m.filter(n.expr,n.set)[0]:n.set[0]);if(d){n=f?{expr:w.pop(),set:s(f)}:m.find(w.pop(),w.length===1&&(w[0]==="~"||w[0]==="+")&&d.parentNode?d.parentNode:d,v),j=n.expr?m.filter(n.expr,n.set):n.set,w.length>0?k=s(j):u=!1;while(w.length)q=w.pop(),r=q,o.relative[q]?r=w.pop():q="",r==null&&(r=d),o.relative[q](k,r,v)}else k=w=[]}k||(k=j),k||m.error(q||b);if(g.call(k)==="[object Array]")if(!u)e.push.apply(e,k);else if(d&&d.nodeType===1)for(t=0;k[t]!=null;t++)k[t]&&(k[t]===!0||k[t].nodeType===1&&m.contains(d,k[t]))&&e.push(j[t]);else for(t=0;k[t]!=null;t++)k[t]&&k[t].nodeType===1&&e.push(j[t]);else s(k,e);l&&(m(l,h,e,f),m.uniqueSort(e));return e};m.uniqueSort=function(a){if(u){h=i,a.sort(u);if(h)for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1)}return a},m.matches=function(a,b){return m(a,null,null,b)},m.matchesSelector=function(a,b){return m(b,null,null,[a]).length>0},m.find=function(a,b,c){var d,e,f,g,h,i;if(!a)return[];for(e=0,f=o.order.length;e<f;e++){h=o.order[e];if(g=o.leftMatch[h].exec(a)){i=g[1],g.splice(1,1);if(i.substr(i.length-1)!=="\\"){g[1]=(g[1]||"").replace(j,""),d=o.find[h](g,b,c);if(d!=null){a=a.replace(o.match[h],"");break}}}}d||(d=typeof b.getElementsByTagName!="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}},m.filter=function(a,c,d,e){var f,g,h,i,j,k,l,n,p,q=a,r=[],s=c,t=c&&c[0]&&m.isXML(c[0]);while(a&&c.length){for(h in o.filter)if((f=o.leftMatch[h].exec(a))!=null&&f[2]){k=o.filter[h],l=f[1],g=!1,f.splice(1,1);if(l.substr(l.length-1)==="\\")continue;s===r&&(r=[]);if(o.preFilter[h]){f=o.preFilter[h](f,s,d,r,e,t);if(!f)g=i=!0;else if(f===!0)continue}if(f)for(n=0;(j=s[n])!=null;n++)j&&(i=k(j,f,n,s),p=e^i,d&&i!=null?p?g=!0:s[n]=!1:p&&(r.push(j),g=!0));if(i!==b){d||(s=r),a=a.replace(o.match[h],"");if(!g)return[];break}}if(a===q)if(g==null)m.error(a);else break;q=a}return s},m.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)};var n=m.getText=function(a){var b,c,d=a.nodeType,e="";if(d){if(d===1||d===9||d===11){if(typeof a.textContent=="string")return a.textContent;if(typeof a.innerText=="string")return a.innerText.replace(k,"");for(a=a.firstChild;a;a=a.nextSibling)e+=n(a)}else if(d===3||d===4)return a.nodeValue}else for(b=0;c=a[b];b++)c.nodeType!==8&&(e+=n(c));return e},o=m.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b=="string",d=c&&!l.test(b),e=c&&!d;d&&(b=b.toLowerCase());for(var f=0,g=a.length,h;f<g;f++)if(h=a[f]){while((h=h.previousSibling)&&h.nodeType!==1);a[f]=e||h&&h.nodeName.toLowerCase()===b?h||!1:h===b}e&&m.filter(b,a,!0)},">":function(a,b){var c,d=typeof b=="string",e=0,f=a.length;if(d&&!l.test(b)){b=b.toLowerCase();for(;e<f;e++){c=a[e];if(c){var g=c.parentNode;a[e]=g.nodeName.toLowerCase()===b?g:!1}}}else{for(;e<f;e++)c=a[e],c&&(a[e]=d?c.parentNode:c.parentNode===b);d&&m.filter(b,a,!0)}},"":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("parentNode",b,f,a,d,c)},"~":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("previousSibling",b,f,a,d,c)}},find:{ID:function(a,b,c){if(typeof b.getElementById!="undefined"&&!c){var d=b.getElementById(a[1]);return d&&d.parentNode?[d]:[]}},NAME:function(a,b){if(typeof b.getElementsByName!="undefined"){var c=[],d=b.getElementsByName(a[1]);for(var e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(j,"")+" ";if(f)return a;for(var g=0,h;(h=b[g])!=null;g++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[g]=!1));return!1},ID:function(a){return a[1].replace(j,"")},TAG:function(a,b){return a[1].replace(j,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||m.error(a[0]),a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0,a[3]=b[3]-0}else a[2]&&m.error(a[0]);a[0]=e++;return a},ATTR:function(a,b,c,d,e,f){var g=a[1]=a[1].replace(j,"");!f&&o.attrMap[g]&&(a[1]=o.attrMap[g]),a[4]=(a[4]||a[5]||"").replace(j,""),a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(b,c,d,e,f){if(b[1]==="not")if((a.exec(b[3])||"").length>1||/^\w/.test(b[3]))b[3]=m(b[3],null,null,c);else{var g=m.filter(b[3],c,d,!0^f);d||e.push.apply(e,g);return!1}else if(o.match.POS.test(b[0])||o.match.CHILD.test(b[0]))return!0;return b},POS:function(a){a.unshift(!0);return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){a.parentNode&&a.parentNode.selectedIndex;return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!m(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){var b=a.getAttribute("type"),c=a.type;return a.nodeName.toLowerCase()==="input"&&"text"===c&&(b===c||b===null)},radio:function(a){return a.nodeName.toLowerCase()==="input"&&"radio"===a.type},checkbox:function(a){return a.nodeName.toLowerCase()==="input"&&"checkbox"===a.type},file:function(a){return a.nodeName.toLowerCase()==="input"&&"file"===a.type},password:function(a){return a.nodeName.toLowerCase()==="input"&&"password"===a.type},submit:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"submit"===a.type},image:function(a){return a.nodeName.toLowerCase()==="input"&&"image"===a.type},reset:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"reset"===a.type},button:function(a){var b=a.nodeName.toLowerCase();return b==="input"&&"button"===a.type||b==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},focus:function(a){return a===a.ownerDocument.activeElement}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2===0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=o.filters[e];if(f)return f(a,c,b,d);if(e==="contains")return(a.textContent||a.innerText||n([a])||"").indexOf(b[3])>=0;if(e==="not"){var g=b[3];for(var h=0,i=g.length;h<i;h++)if(g[h]===a)return!1;return!0}m.error(e)},CHILD:function(a,b){var c,e,f,g,h,i,j,k=b[1],l=a;switch(k){case"only":case"first":while(l=l.previousSibling)if(l.nodeType===1)return!1;if(k==="first")return!0;l=a;case"last":while(l=l.nextSibling)if(l.nodeType===1)return!1;return!0;case"nth":c=b[2],e=b[3];if(c===1&&e===0)return!0;f=b[0],g=a.parentNode;if(g&&(g[d]!==f||!a.nodeIndex)){i=0;for(l=g.firstChild;l;l=l.nextSibling)l.nodeType===1&&(l.nodeIndex=++i);g[d]=f}j=a.nodeIndex-e;return c===0?j===0:j%c===0&&j/c>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b==="*"&&a.nodeType===1||!!a.nodeName&&a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],d=m.attr?m.attr(a,c):o.attrHandle[c]?o.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),e=d+"",f=b[2],g=b[4];return d==null?f==="!=":!f&&m.attr?d!=null:f==="="?e===g:f==="*="?e.indexOf(g)>=0:f==="~="?(" "+e+" ").indexOf(g)>=0:g?f==="!="?e!==g:f==="^="?e.indexOf(g)===0:f==="$="?e.substr(e.length-g.length)===g:f==="|="?e===g||e.substr(0,g.length+1)===g+"-":!1:e&&d!==!1},POS:function(a,b,c,d){var e=b[2],f=o.setFilters[e];if(f)return f(a,c,b,d)}}},p=o.match.POS,q=function(a,b){return"\\"+(b-0+1)};for(var r in o.match)o.match[r]=new RegExp(o.match[r].source+/(?![^\[]*\])(?![^\(]*\))/.source),o.leftMatch[r]=new RegExp(/(^(?:.|\r|\n)*?)/.source+o.match[r].source.replace(/\\(\d+)/g,q));o.match.globalPOS=p;var s=function(a,b){a=Array.prototype.slice.call(a,0);if(b){b.push.apply(b,a);return b}return a};try{Array.prototype.slice.call(c.documentElement.childNodes,0)[0].nodeType}catch(t){s=function(a,b){var c=0,d=b||[];if(g.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length=="number")for(var e=a.length;c<e;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var u,v;c.documentElement.compareDocumentPosition?u=function(a,b){if(a===b){h=!0;return 0}if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(u=function(a,b){if(a===b){h=!0;return 0}if(a.sourceIndex&&b.sourceIndex)return a.sourceIndex-b.sourceIndex;var c,d,e=[],f=[],g=a.parentNode,i=b.parentNode,j=g;if(g===i)return v(a,b);if(!g)return-1;if(!i)return 1;while(j)e.unshift(j),j=j.parentNode;j=i;while(j)f.unshift(j),j=j.parentNode;c=e.length,d=f.length;for(var k=0;k<c&&k<d;k++)if(e[k]!==f[k])return v(e[k],f[k]);return k===c?v(a,f[k],-1):v(e[k],b,1)},v=function(a,b,c){if(a===b)return c;var d=a.nextSibling;while(d){if(d===b)return-1;d=d.nextSibling}return 1}),function(){var a=c.createElement("div"),d="script"+(new Date).getTime(),e=c.documentElement;a.innerHTML="<a name='"+d+"'/>",e.insertBefore(a,e.firstChild),c.getElementById(d)&&(o.find.ID=function(a,c,d){if(typeof c.getElementById!="undefined"&&!d){var e=c.getElementById(a[1]);return e?e.id===a[1]||typeof e.getAttributeNode!="undefined"&&e.getAttributeNode("id").nodeValue===a[1]?[e]:b:[]}},o.filter.ID=function(a,b){var c=typeof a.getAttributeNode!="undefined"&&a.getAttributeNode("id");return a.nodeType===1&&c&&c.nodeValue===b}),e.removeChild(a),e=a=null}(),function(){var a=c.createElement("div");a.appendChild(c.createComment("")),a.getElementsByTagName("*").length>0&&(o.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){var d=[];for(var e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c}),a.innerHTML="<a href='#'></a>",a.firstChild&&typeof a.firstChild.getAttribute!="undefined"&&a.firstChild.getAttribute("href")!=="#"&&(o.attrHandle.href=function(a){return a.getAttribute("href",2)}),a=null}(),c.querySelectorAll&&function(){var a=m,b=c.createElement("div"),d="__sizzle__";b.innerHTML="<p class='TEST'></p>";if(!b.querySelectorAll||b.querySelectorAll(".TEST").length!==0){m=function(b,e,f,g){e=e||c;if(!g&&!m.isXML(e)){var h=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(h&&(e.nodeType===1||e.nodeType===9)){if(h[1])return s(e.getElementsByTagName(b),f);if(h[2]&&o.find.CLASS&&e.getElementsByClassName)return s(e.getElementsByClassName(h[2]),f)}if(e.nodeType===9){if(b==="body"&&e.body)return s([e.body],f);if(h&&h[3]){var i=e.getElementById(h[3]);if(!i||!i.parentNode)return s([],f);if(i.id===h[3])return s([i],f)}try{return s(e.querySelectorAll(b),f)}catch(j){}}else if(e.nodeType===1&&e.nodeName.toLowerCase()!=="object"){var k=e,l=e.getAttribute("id"),n=l||d,p=e.parentNode,q=/^\s*[+~]/.test(b);l?n=n.replace(/'/g,"\\$&"):e.setAttribute("id",n),q&&p&&(e=e.parentNode);try{if(!q||p)return s(e.querySelectorAll("[id='"+n+"'] "+b),f)}catch(r){}finally{l||k.removeAttribute("id")}}}return a(b,e,f,g)};for(var e in a)m[e]=a[e];b=null}}(),function(){var a=c.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector;if(b){var d=!b.call(c.createElement("div"),"div"),e=!1;try{b.call(c.documentElement,"[test!='']:sizzle")}catch(f){e=!0}m.matchesSelector=function(a,c){c=c.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!m.isXML(a))try{if(e||!o.match.PSEUDO.test(c)&&!/!=/.test(c)){var f=b.call(a,c);if(f||!d||a.document&&a.document.nodeType!==11)return f}}catch(g){}return m(c,null,null,[a]).length>0}}}(),function(){var a=c.createElement("div");a.innerHTML="<div class='test e'></div><div class='test'></div>";if(!!a.getElementsByClassName&&a.getElementsByClassName("e").length!==0){a.lastChild.className="e";if(a.getElementsByClassName("e").length===1)return;o.order.splice(1,0,"CLASS"),o.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null}}(),c.documentElement.contains?m.contains=function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:c.documentElement.compareDocumentPosition?m.contains=function(a,b){return!!(a.compareDocumentPosition(b)&16)}:m.contains=function(){return!1},m.isXML=function(a){var b=(a?a.ownerDocument||a:0).documentElement;return b?b.nodeName!=="HTML":!1};var y=function(a,b,c){var d,e=[],f="",g=b.nodeType?[b]:b;while(d=o.match.PSEUDO.exec(a))f+=d[0],a=a.replace(o.match.PSEUDO,"");a=o.relative[a]?a+"*":a;for(var h=0,i=g.length;h<i;h++)m(a,g[h],e,c);return m.filter(f,e)};m.attr=f.attr,m.selectors.attrMap={},f.find=m,f.expr=m.selectors,f.expr[":"]=f.expr.filters,f.unique=m.uniqueSort,f.text=m.getText,f.isXMLDoc=m.isXML,f.contains=m.contains}();var L=/Until$/,M=/^(?:parents|prevUntil|prevAll)/,N=/,/,O=/^.[^:#\[\.,]*$/,P=Array.prototype.slice,Q=f.expr.match.globalPOS,R={children:!0,contents:!0,next:!0,prev:!0};f.fn.extend({find:function(a){var b=this,c,d;if(typeof a!="string")return f(a).filter(function(){for(c=0,d=b.length;c<d;c++)if(f.contains(b[c],this))return!0});var e=this.pushStack("","find",a),g,h,i;for(c=0,d=this.length;c<d;c++){g=e.length,f.find(a,this[c],e);if(c>0)for(h=g;h<e.length;h++)for(i=0;i<g;i++)if(e[i]===e[h]){e.splice(h--,1);break}}return e},has:function(a){var b=f(a);return this.filter(function(){for(var a=0,c=b.length;a<c;a++)if(f.contains(this,b[a]))return!0})},not:function(a){return this.pushStack(T(this,a,!1),"not",a)},filter:function(a){return this.pushStack(T(this,a,!0),"filter",a)},is:function(a){return!!a&&(typeof a=="string"?Q.test(a)?f(a,this.context).index(this[0])>=0:f.filter(a,this).length>0:this.filter(a).length>0)},closest:function(a,b){var c=[],d,e,g=this[0];if(f.isArray(a)){var h=1;while(g&&g.ownerDocument&&g!==b){for(d=0;d<a.length;d++)f(g).is(a[d])&&c.push({selector:a[d],elem:g,level:h});g=g.parentNode,h++}return c}var i=Q.test(a)||typeof a!="string"?f(a,b||this.context):0;for(d=0,e=this.length;d<e;d++){g=this[d];while(g){if(i?i.index(g)>-1:f.find.matchesSelector(g,a)){c.push(g);break}g=g.parentNode;if(!g||!g.ownerDocument||g===b||g.nodeType===11)break}}c=c.length>1?f.unique(c):c;return this.pushStack(c,"closest",a)},index:function(a){if(!a)return this[0]&&this[0].parentNode?this.prevAll().length:-1;if(typeof a=="string")return f.inArray(this[0],f(a));return f.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var c=typeof a=="string"?f(a,b):f.makeArray(a&&a.nodeType?[a]:a),d=f.merge(this.get(),c);return this.pushStack(S(c[0])||S(d[0])?d:f.unique(d))},andSelf:function(){return this.add(this.prevObject)}}),f.each({parent:function(a){var b=a.parentNode;return b&&b.nodeType!==11?b:null},parents:function(a){return f.dir(a,"parentNode")},parentsUntil:function(a,b,c){return f.dir(a,"parentNode",c)},next:function(a){return f.nth(a,2,"nextSibling")},prev:function(a){return f.nth(a,2,"previousSibling")},nextAll:function(a){return f.dir(a,"nextSibling")},prevAll:function(a){return f.dir(a,"previousSibling")},nextUntil:function(a,b,c){return f.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return f.dir(a,"previousSibling",c)},siblings:function(a){return f.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return f.sibling(a.firstChild)},contents:function(a){return f.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:f.makeArray(a.childNodes)}},function(a,b){f.fn[a]=function(c,d){var e=f.map(this,b,c);L.test(a)||(d=c),d&&typeof d=="string"&&(e=f.filter(d,e)),e=this.length>1&&!R[a]?f.unique(e):e,(this.length>1||N.test(d))&&M.test(a)&&(e=e.reverse());return this.pushStack(e,a,P.call(arguments).join(","))}}),f.extend({filter:function(a,b,c){c&&(a=":not("+a+")");return b.length===1?f.find.matchesSelector(b[0],a)?[b[0]]:[]:f.find.matches(a,b)},dir:function(a,c,d){var e=[],g=a[c];while(g&&g.nodeType!==9&&(d===b||g.nodeType!==1||!f(g).is(d)))g.nodeType===1&&e.push(g),g=g[c];return e},nth:function(a,b,c,d){b=b||1;var e=0;for(;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){var c=[];for(;a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var V="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",W=/ jQuery\d+="(?:\d+|null)"/g,X=/^\s+/,Y=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,Z=/<([\w:]+)/,$=/<tbody/i,_=/<|&#?\w+;/,ba=/<(?:script|style)/i,bb=/<(?:script|object|embed|option|style)/i,bc=new RegExp("<(?:"+V+")[\\s/>]","i"),bd=/checked\s*(?:[^=]|=\s*.checked.)/i,be=/\/(java|ecma)script/i,bf=/^\s*<!(?:\[CDATA\[|\-\-)/,bg={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]},bh=U(c);bg.optgroup=bg.option,bg.tbody=bg.tfoot=bg.colgroup=bg.caption=bg.thead,bg.th=bg.td,f.support.htmlSerialize||(bg._default=[1,"div<div>","</div>"]),f.fn.extend({text:function(a){return f.access(this,function(a){return a===b?f.text(this):this.empty().append((this[0]&&this[0].ownerDocument||c).createTextNode(a))},null,a,arguments.length)},wrapAll:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapAll(a.call(this,b))});if(this[0]){var b=f(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&a.firstChild.nodeType===1)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapInner(a.call(this,b))});return this.each(function(){var b=f(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=f.isFunction(a);return this.each(function(c){f(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){f.nodeName(this,"body")||f(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});if(arguments.length){var a=f.clean(arguments);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});if(arguments.length){var a=this.pushStack(this,"after",arguments);a.push.apply(a,f.clean(arguments));return a}},remove:function(a,b){for(var c=0,d;(d=this[c])!=null;c++)if(!a||f.filter(a,[d]).length)!b&&d.nodeType===1&&(f.cleanData(d.getElementsByTagName("*")),f.cleanData([d])),d.parentNode&&d.parentNode.removeChild(d);return this},empty:function(){for(var a=0,b;(b=this[a])!=null;a++){b.nodeType===1&&f.cleanData(b.getElementsByTagName("*"));while(b.firstChild)b.removeChild(b.firstChild)}return this},clone:function(a,b){a=a==null?!1:a,b=b==null?a:b;return this.map(function(){return f.clone(this,a,b)})},html:function(a){return f.access(this,function(a){var c=this[0]||{},d=0,e=this.length;if(a===b)return c.nodeType===1?c.innerHTML.replace(W,""):null;if(typeof a=="string"&&!ba.test(a)&&(f.support.leadingWhitespace||!X.test(a))&&!bg[(Z.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(Y,"<$1></$2>");try{for(;d<e;d++)c=this[d]||{},c.nodeType===1&&(f.cleanData(c.getElementsByTagName("*")),c.innerHTML=a);c=0}catch(g){}}c&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(f.isFunction(a))return this.each(function(b){var c=f(this),d=c.html();c.replaceWith(a.call(this,b,d))});typeof a!="string"&&(a=f(a).detach());return this.each(function(){var b=this.nextSibling,c=this.parentNode;f(this).remove(),b?f(b).before(a):f(c).append(a)})}return this.length?this.pushStack(f(f.isFunction(a)?a():a),"replaceWith",a):this},detach:function(a){return this.remove(a,!0)},domManip:function(a,c,d){var e,g,h,i,j=a[0],k=[];if(!f.support.checkClone&&arguments.length===3&&typeof j=="string"&&bd.test(j))return this.each(function(){f(this).domManip(a,c,d,!0)});if(f.isFunction(j))return this.each(function(e){var g=f(this);a[0]=j.call(this,e,c?g.html():b),g.domManip(a,c,d)});if(this[0]){i=j&&j.parentNode,f.support.parentNode&&i&&i.nodeType===11&&i.childNodes.length===this.length?e={fragment:i}:e=f.buildFragment(a,this,k),h=e.fragment,h.childNodes.length===1?g=h=h.firstChild:g=h.firstChild;if(g){c=c&&f.nodeName(g,"tr");for(var l=0,m=this.length,n=m-1;l<m;l++)d.call(c?bi(this[l],g):this[l],e.cacheable||m>1&&l<n?f.clone(h,!0,!0):h)}k.length&&f.each(k,function(a,b){b.src?f.ajax({type:"GET",global:!1,url:b.src,async:!1,dataType:"script"}):f.globalEval((b.text||b.textContent||b.innerHTML||"").replace(bf,"/*$0*/")),b.parentNode&&b.parentNode.removeChild(b)})}return this}}),f.buildFragment=function(a,b,d){var e,g,h,i,j=a[0];b&&b[0]&&(i=b[0].ownerDocument||b[0]),i.createDocumentFragment||(i=c),a.length===1&&typeof j=="string"&&j.length<512&&i===c&&j.charAt(0)==="<"&&!bb.test(j)&&(f.support.checkClone||!bd.test(j))&&(f.support.html5Clone||!bc.test(j))&&(g=!0,h=f.fragments[j],h&&h!==1&&(e=h)),e||(e=i.createDocumentFragment(),f.clean(a,i,e,d)),g&&(f.fragments[j]=h?e:1);return{fragment:e,cacheable:g}},f.fragments={},f.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){f.fn[a]=function(c){var d=[],e=f(c),g=this.length===1&&this[0].parentNode;if(g&&g.nodeType===11&&g.childNodes.length===1&&e.length===1){e[b](this[0]);return this}for(var h=0,i=e.length;h<i;h++){var j=(h>0?this.clone(!0):this).get();f(e[h])[b](j),d=d.concat(j)}return this.pushStack(d,a,e.selector)}}),f.extend({clone:function(a,b,c){var d,e,g,h=f.support.html5Clone||f.isXMLDoc(a)||!bc.test("<"+a.nodeName+">")?a.cloneNode(!0):bo(a);if((!f.support.noCloneEvent||!f.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!f.isXMLDoc(a)){bk(a,h),d=bl(a),e=bl(h);for(g=0;d[g];++g)e[g]&&bk(d[g],e[g])}if(b){bj(a,h);if(c){d=bl(a),e=bl(h);for(g=0;d[g];++g)bj(d[g],e[g])}}d=e=null;return h},clean:function(a,b,d,e){var g,h,i,j=[];b=b||c,typeof b.createElement=="undefined"&&(b=b.ownerDocument||b[0]&&b[0].ownerDocument||c);for(var k=0,l;(l=a[k])!=null;k++){typeof l=="number"&&(l+="");if(!l)continue;if(typeof l=="string")if(!_.test(l))l=b.createTextNode(l);else{l=l.replace(Y,"<$1></$2>");var m=(Z.exec(l)||["",""])[1].toLowerCase(),n=bg[m]||bg._default,o=n[0],p=b.createElement("div"),q=bh.childNodes,r;b===c?bh.appendChild(p):U(b).appendChild(p),p.innerHTML=n[1]+l+n[2];while(o--)p=p.lastChild;if(!f.support.tbody){var s=$.test(l),t=m==="table"&&!s?p.firstChild&&p.firstChild.childNodes:n[1]==="<table>"&&!s?p.childNodes:[];for(i=t.length-1;i>=0;--i)f.nodeName(t[i],"tbody")&&!t[i].childNodes.length&&t[i].parentNode.removeChild(t[i])}!f.support.leadingWhitespace&&X.test(l)&&p.insertBefore(b.createTextNode(X.exec(l)[0]),p.firstChild),l=p.childNodes,p&&(p.parentNode.removeChild(p),q.length>0&&(r=q[q.length-1],r&&r.parentNode&&r.parentNode.removeChild(r)))}var u;if(!f.support.appendChecked)if(l[0]&&typeof(u=l.length)=="number")for(i=0;i<u;i++)bn(l[i]);else bn(l);l.nodeType?j.push(l):j=f.merge(j,l)}if(d){g=function(a){return!a.type||be.test(a.type)};for(k=0;j[k];k++){h=j[k];if(e&&f.nodeName(h,"script")&&(!h.type||be.test(h.type)))e.push(h.parentNode?h.parentNode.removeChild(h):h);else{if(h.nodeType===1){var v=f.grep(h.getElementsByTagName("script"),g);j.splice.apply(j,[k+1,0].concat(v))}d.appendChild(h)}}}return j},cleanData:function(a){var b,c,d=f.cache,e=f.event.special,g=f.support.deleteExpando;for(var h=0,i;(i=a[h])!=null;h++){if(i.nodeName&&f.noData[i.nodeName.toLowerCase()])continue;c=i[f.expando];if(c){b=d[c];if(b&&b.events){for(var j in b.events)e[j]?f.event.remove(i,j):f.removeEvent(i,j,b.handle);b.handle&&(b.handle.elem=null)}g?delete i[f.expando]:i.removeAttribute&&i.removeAttribute(f.expando),delete d[c]}}}});var bp=/alpha\([^)]*\)/i,bq=/opacity=([^)]*)/,br=/([A-Z]|^ms)/g,bs=/^[\-+]?(?:\d*\.)?\d+$/i,bt=/^-?(?:\d*\.)?\d+(?!px)[^\d\s]+$/i,bu=/^([\-+])=([\-+.\de]+)/,bv=/^margin/,bw={position:"absolute",visibility:"hidden",display:"block"},bx=["Top","Right","Bottom","Left"],by,bz,bA;f.fn.css=function(a,c){return f.access(this,function(a,c,d){return d!==b?f.style(a,c,d):f.css(a,c)},a,c,arguments.length>1)},f.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=by(a,"opacity");return c===""?"1":c}return a.style.opacity}}},cssNumber:{fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":f.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,c,d,e){if(!!a&&a.nodeType!==3&&a.nodeType!==8&&!!a.style){var g,h,i=f.camelCase(c),j=a.style,k=f.cssHooks[i];c=f.cssProps[i]||i;if(d===b){if(k&&"get"in k&&(g=k.get(a,!1,e))!==b)return g;return j[c]}h=typeof d,h==="string"&&(g=bu.exec(d))&&(d=+(g[1]+1)*+g[2]+parseFloat(f.css(a,c)),h="number");if(d==null||h==="number"&&isNaN(d))return;h==="number"&&!f.cssNumber[i]&&(d+="px");if(!k||!("set"in k)||(d=k.set(a,d))!==b)try{j[c]=d}catch(l){}}},css:function(a,c,d){var e,g;c=f.camelCase(c),g=f.cssHooks[c],c=f.cssProps[c]||c,c==="cssFloat"&&(c="float");if(g&&"get"in g&&(e=g.get(a,!0,d))!==b)return e;if(by)return by(a,c)},swap:function(a,b,c){var d={},e,f;for(f in b)d[f]=a.style[f],a.style[f]=b[f];e=c.call(a);for(f in b)a.style[f]=d[f];return e}}),f.curCSS=f.css,c.defaultView&&c.defaultView.getComputedStyle&&(bz=function(a,b){var c,d,e,g,h=a.style;b=b.replace(br,"-$1").toLowerCase(),(d=a.ownerDocument.defaultView)&&(e=d.getComputedStyle(a,null))&&(c=e.getPropertyValue(b),c===""&&!f.contains(a.ownerDocument.documentElement,a)&&(c=f.style(a,b))),!f.support.pixelMargin&&e&&bv.test(b)&&bt.test(c)&&(g=h.width,h.width=c,c=e.width,h.width=g);return c}),c.documentElement.currentStyle&&(bA=function(a,b){var c,d,e,f=a.currentStyle&&a.currentStyle[b],g=a.style;f==null&&g&&(e=g[b])&&(f=e),bt.test(f)&&(c=g.left,d=a.runtimeStyle&&a.runtimeStyle.left,d&&(a.runtimeStyle.left=a.currentStyle.left),g.left=b==="fontSize"?"1em":f,f=g.pixelLeft+"px",g.left=c,d&&(a.runtimeStyle.left=d));return f===""?"auto":f}),by=bz||bA,f.each(["height","width"],function(a,b){f.cssHooks[b]={get:function(a,c,d){if(c)return a.offsetWidth!==0?bB(a,b,d):f.swap(a,bw,function(){return bB(a,b,d)})},set:function(a,b){return bs.test(b)?b+"px":b}}}),f.support.opacity||(f.cssHooks.opacity={get:function(a,b){return bq.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=f.isNumeric(b)?"alpha(opacity="+b*100+")":"",g=d&&d.filter||c.filter||"";c.zoom=1;if(b>=1&&f.trim(g.replace(bp,""))===""){c.removeAttribute("filter");if(d&&!d.filter)return}c.filter=bp.test(g)?g.replace(bp,e):g+" "+e}}),f(function(){f.support.reliableMarginRight||(f.cssHooks.marginRight={get:function(a,b){return f.swap(a,{display:"inline-block"},function(){return b?by(a,"margin-right"):a.style.marginRight})}})}),f.expr&&f.expr.filters&&(f.expr.filters.hidden=function(a){var b=a.offsetWidth,c=a.offsetHeight;return b===0&&c===0||!f.support.reliableHiddenOffsets&&(a.style&&a.style.display||f.css(a,"display"))==="none"},f.expr.filters.visible=function(a){return!f.expr.filters.hidden(a)}),f.each({margin:"",padding:"",border:"Width"},function(a,b){f.cssHooks[a+b]={expand:function(c){var d,e=typeof c=="string"?c.split(" "):[c],f={};for(d=0;d<4;d++)f[a+bx[d]+b]=e[d]||e[d-2]||e[0];return f}}});var bC=/%20/g,bD=/\[\]$/,bE=/\r?\n/g,bF=/#.*$/,bG=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,bH=/^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,bI=/^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,bJ=/^(?:GET|HEAD)$/,bK=/^\/\//,bL=/\?/,bM=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bN=/^(?:select|textarea)/i,bO=/\s+/,bP=/([?&])_=[^&]*/,bQ=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,bR=f.fn.load,bS={},bT={},bU,bV,bW=["*/"]+["*"];try{bU=e.href}catch(bX){bU=c.createElement("a"),bU.href="",bU=bU.href}bV=bQ.exec(bU.toLowerCase())||[],f.fn.extend({load:function(a,c,d){if(typeof a!="string"&&bR)return bR.apply(this,arguments);if(!this.length)return this;var e=a.indexOf(" ");if(e>=0){var g=a.slice(e,a.length);a=a.slice(0,e)}var h="GET";c&&(f.isFunction(c)?(d=c,c=b):typeof c=="object"&&(c=f.param(c,f.ajaxSettings.traditional),h="POST"));var i=this;f.ajax({url:a,type:h,dataType:"html",data:c,complete:function(a,b,c){c=a.responseText,a.isResolved()&&(a.done(function(a){c=a}),i.html(g?f("<div>").append(c.replace(bM,"")).find(g):c)),d&&i.each(d,[c,b,a])}});return this},serialize:function(){return f.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?f.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||bN.test(this.nodeName)||bH.test(this.type))}).map(function(a,b){var c=f(this).val();return c==null?null:f.isArray(c)?f.map(c,function(a,c){return{name:b.name,value:a.replace(bE,"\r\n")}}):{name:b.name,value:c.replace(bE,"\r\n")}}).get()}}),f.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){f.fn[b]=function(a){return this.on(b,a)}}),f.each(["get","post"],function(a,c){f[c]=function(a,d,e,g){f.isFunction(d)&&(g=g||e,e=d,d=b);return f.ajax({type:c,url:a,data:d,success:e,dataType:g})}}),f.extend({getScript:function(a,c){return f.get(a,b,c,"script")},getJSON:function(a,b,c){return f.get(a,b,c,"json")},ajaxSetup:function(a,b){b?b$(a,f.ajaxSettings):(b=a,a=f.ajaxSettings),b$(a,b);return a},ajaxSettings:{url:bU,isLocal:bI.test(bV[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded; charset=UTF-8",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":bW},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":a.String,"text html":!0,"text json":f.parseJSON,"text xml":f.parseXML},flatOptions:{context:!0,url:!0}},ajaxPrefilter:bY(bS),ajaxTransport:bY(bT),ajax:function(a,c){function w(a,c,l,m){if(s!==2){s=2,q&&clearTimeout(q),p=b,n=m||"",v.readyState=a>0?4:0;var o,r,u,w=c,x=l?ca(d,v,l):b,y,z;if(a>=200&&a<300||a===304){if(d.ifModified){if(y=v.getResponseHeader("Last-Modified"))f.lastModified[k]=y;if(z=v.getResponseHeader("Etag"))f.etag[k]=z}if(a===304)w="notmodified",o=!0;else try{r=cb(d,x),w="success",o=!0}catch(A){w="parsererror",u=A}}else{u=w;if(!w||a)w="error",a<0&&(a=0)}v.status=a,v.statusText=""+(c||w),o?h.resolveWith(e,[r,w,v]):h.rejectWith(e,[v,w,u]),v.statusCode(j),j=b,t&&g.trigger("ajax"+(o?"Success":"Error"),[v,d,o?r:u]),i.fireWith(e,[v,w]),t&&(g.trigger("ajaxComplete",[v,d]),--f.active||f.event.trigger("ajaxStop"))}}typeof a=="object"&&(c=a,a=b),c=c||{};var d=f.ajaxSetup({},c),e=d.context||d,g=e!==d&&(e.nodeType||e instanceof f)?f(e):f.event,h=f.Deferred(),i=f.Callbacks("once memory"),j=d.statusCode||{},k,l={},m={},n,o,p,q,r,s=0,t,u,v={readyState:0,setRequestHeader:function(a,b){if(!s){var c=a.toLowerCase();a=m[c]=m[c]||a,l[a]=b}return this},getAllResponseHeaders:function(){return s===2?n:null},getResponseHeader:function(a){var c;if(s===2){if(!o){o={};while(c=bG.exec(n))o[c[1].toLowerCase()]=c[2]}c=o[a.toLowerCase()]}return c===b?null:c},overrideMimeType:function(a){s||(d.mimeType=a);return this},abort:function(a){a=a||"abort",p&&p.abort(a),w(0,a);return this}};h.promise(v),v.success=v.done,v.error=v.fail,v.complete=i.add,v.statusCode=function(a){if(a){var b;if(s<2)for(b in a)j[b]=[j[b],a[b]];else b=a[v.status],v.then(b,b)}return this},d.url=((a||d.url)+"").replace(bF,"").replace(bK,bV[1]+"//"),d.dataTypes=f.trim(d.dataType||"*").toLowerCase().split(bO),d.crossDomain==null&&(r=bQ.exec(d.url.toLowerCase()),d.crossDomain=!(!r||r[1]==bV[1]&&r[2]==bV[2]&&(r[3]||(r[1]==="http:"?80:443))==(bV[3]||(bV[1]==="http:"?80:443)))),d.data&&d.processData&&typeof d.data!="string"&&(d.data=f.param(d.data,d.traditional)),bZ(bS,d,c,v);if(s===2)return!1;t=d.global,d.type=d.type.toUpperCase(),d.hasContent=!bJ.test(d.type),t&&f.active++===0&&f.event.trigger("ajaxStart");if(!d.hasContent){d.data&&(d.url+=(bL.test(d.url)?"&":"?")+d.data,delete d.data),k=d.url;if(d.cache===!1){var x=f.now(),y=d.url.replace(bP,"$1_="+x);d.url=y+(y===d.url?(bL.test(d.url)?"&":"?")+"_="+x:"")}}(d.data&&d.hasContent&&d.contentType!==!1||c.contentType)&&v.setRequestHeader("Content-Type",d.contentType),d.ifModified&&(k=k||d.url,f.lastModified[k]&&v.setRequestHeader("If-Modified-Since",f.lastModified[k]),f.etag[k]&&v.setRequestHeader("If-None-Match",f.etag[k])),v.setRequestHeader("Accept",d.dataTypes[0]&&d.accepts[d.dataTypes[0]]?d.accepts[d.dataTypes[0]]+(d.dataTypes[0]!=="*"?", "+bW+"; q=0.01":""):d.accepts["*"]);for(u in d.headers)v.setRequestHeader(u,d.headers[u]);if(d.beforeSend&&(d.beforeSend.call(e,v,d)===!1||s===2)){v.abort();return!1}for(u in{success:1,error:1,complete:1})v[u](d[u]);p=bZ(bT,d,c,v);if(!p)w(-1,"No Transport");else{v.readyState=1,t&&g.trigger("ajaxSend",[v,d]),d.async&&d.timeout>0&&(q=setTimeout(function(){v.abort("timeout")},d.timeout));try{s=1,p.send(l,w)}catch(z){if(s<2)w(-1,z);else throw z}}return v},param:function(a,c){var d=[],e=function(a,b){b=f.isFunction(b)?b():b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};c===b&&(c=f.ajaxSettings.traditional);if(f.isArray(a)||a.jquery&&!f.isPlainObject(a))f.each(a,function(){e(this.name,this.value)});else for(var g in a)b_(g,a[g],c,e);return d.join("&").replace(bC,"+")}}),f.extend({active:0,lastModified:{},etag:{}});var cc=f.now(),cd=/(\=)\?(&|$)|\?\?/i;f.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return f.expando+"_"+cc++}}),f.ajaxPrefilter("json jsonp",function(b,c,d){var e=typeof b.data=="string"&&/^application\/x\-www\-form\-urlencoded/.test(b.contentType);if(b.dataTypes[0]==="jsonp"||b.jsonp!==!1&&(cd.test(b.url)||e&&cd.test(b.data))){var g,h=b.jsonpCallback=f.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,i=a[h],j=b.url,k=b.data,l="$1"+h+"$2";b.jsonp!==!1&&(j=j.replace(cd,l),b.url===j&&(e&&(k=k.replace(cd,l)),b.data===k&&(j+=(/\?/.test(j)?"&":"?")+b.jsonp+"="+h))),b.url=j,b.data=k,a[h]=function(a){g=[a]},d.always(function(){a[h]=i,g&&f.isFunction(i)&&a[h](g[0])}),b.converters["script json"]=function(){g||f.error(h+" was not called");return g[0]},b.dataTypes[0]="json";return"script"}}),f.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){f.globalEval(a);return a}}}),f.ajaxPrefilter("script",function(a){a.cache===b&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),f.ajaxTransport("script",function(a){if(a.crossDomain){var d,e=c.head||c.getElementsByTagName("head")[0]||c.documentElement;return{send:function(f,g){d=c.createElement("script"),d.async="async",a.scriptCharset&&(d.charset=a.scriptCharset),d.src=a.url,d.onload=d.onreadystatechange=function(a,c){if(c||!d.readyState||/loaded|complete/.test(d.readyState))d.onload=d.onreadystatechange=null,e&&d.parentNode&&e.removeChild(d),d=b,c||g(200,"success")},e.insertBefore(d,e.firstChild)},abort:function(){d&&d.onload(0,1)}}}});var ce=a.ActiveXObject?function(){for(var a in cg)cg[a](0,1)}:!1,cf=0,cg;f.ajaxSettings.xhr=a.ActiveXObject?function(){return!this.isLocal&&ch()||ci()}:ch,function(a){f.extend(f.support,{ajax:!!a,cors:!!a&&"withCredentials"in a})}(f.ajaxSettings.xhr()),f.support.ajax&&f.ajaxTransport(function(c){if(!c.crossDomain||f.support.cors){var d;return{send:function(e,g){var h=c.xhr(),i,j;c.username?h.open(c.type,c.url,c.async,c.username,c.password):h.open(c.type,c.url,c.async);if(c.xhrFields)for(j in c.xhrFields)h[j]=c.xhrFields[j];c.mimeType&&h.overrideMimeType&&h.overrideMimeType(c.mimeType),!c.crossDomain&&!e["X-Requested-With"]&&(e["X-Requested-With"]="XMLHttpRequest");try{for(j in e)h.setRequestHeader(j,e[j])}catch(k){}h.send(c.hasContent&&c.data||null),d=function(a,e){var j,k,l,m,n;try{if(d&&(e||h.readyState===4)){d=b,i&&(h.onreadystatechange=f.noop,ce&&delete cg[i]);if(e)h.readyState!==4&&h.abort();else{j=h.status,l=h.getAllResponseHeaders(),m={},n=h.responseXML,n&&n.documentElement&&(m.xml=n);try{m.text=h.responseText}catch(a){}try{k=h.statusText}catch(o){k=""}!j&&c.isLocal&&!c.crossDomain?j=m.text?200:404:j===1223&&(j=204)}}}catch(p){e||g(-1,p)}m&&g(j,k,m,l)},!c.async||h.readyState===4?d():(i=++cf,ce&&(cg||(cg={},f(a).unload(ce)),cg[i]=d),h.onreadystatechange=d)},abort:function(){d&&d(0,1)}}}});var cj={},ck,cl,cm=/^(?:toggle|show|hide)$/,cn=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,co,cp=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]],cq;f.fn.extend({show:function(a,b,c){var d,e;if(a||a===0)return this.animate(ct("show",3),a,b,c);for(var g=0,h=this.length;g<h;g++)d=this[g],d.style&&(e=d.style.display,!f._data(d,"olddisplay")&&e==="none"&&(e=d.style.display=""),(e===""&&f.css(d,"display")==="none"||!f.contains(d.ownerDocument.documentElement,d))&&f._data(d,"olddisplay",cu(d.nodeName)));for(g=0;g<h;g++){d=this[g];if(d.style){e=d.style.display;if(e===""||e==="none")d.style.display=f._data(d,"olddisplay")||""}}return this},hide:function(a,b,c){if(a||a===0)return this.animate(ct("hide",3),a,b,c);var d,e,g=0,h=this.length;for(;g<h;g++)d=this[g],d.style&&(e=f.css(d,"display"),e!=="none"&&!f._data(d,"olddisplay")&&f._data(d,"olddisplay",e));for(g=0;g<h;g++)this[g].style&&(this[g].style.display="none");return this},_toggle:f.fn.toggle,toggle:function(a,b,c){var d=typeof a=="boolean";f.isFunction(a)&&f.isFunction(b)?this._toggle.apply(this,arguments):a==null||d?this.each(function(){var b=d?a:f(this).is(":hidden");f(this)[b?"show":"hide"]()}):this.animate(ct("toggle",3),a,b,c);return this},fadeTo:function(a,b,c,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){function g(){e.queue===!1&&f._mark(this);var b=f.extend({},e),c=this.nodeType===1,d=c&&f(this).is(":hidden"),g,h,i,j,k,l,m,n,o,p,q;b.animatedProperties={};for(i in a){g=f.camelCase(i),i!==g&&(a[g]=a[i],delete a[i]);if((k=f.cssHooks[g])&&"expand"in k){l=k.expand(a[g]),delete a[g];for(i in l)i in a||(a[i]=l[i])}}for(g in a){h=a[g],f.isArray(h)?(b.animatedProperties[g]=h[1],h=a[g]=h[0]):b.animatedProperties[g]=b.specialEasing&&b.specialEasing[g]||b.easing||"swing";if(h==="hide"&&d||h==="show"&&!d)return b.complete.call(this);c&&(g==="height"||g==="width")&&(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],f.css(this,"display")==="inline"&&f.css(this,"float")==="none"&&(!f.support.inlineBlockNeedsLayout||cu(this.nodeName)==="inline"?this.style.display="inline-block":this.style.zoom=1))}b.overflow!=null&&(this.style.overflow="hidden");for(i in a)j=new f.fx(this,b,i),h=a[i],cm.test(h)?(q=f._data(this,"toggle"+i)||(h==="toggle"?d?"show":"hide":0),q?(f._data(this,"toggle"+i,q==="show"?"hide":"show"),j[q]()):j[h]()):(m=cn.exec(h),n=j.cur(),m?(o=parseFloat(m[2]),p=m[3]||(f.cssNumber[i]?"":"px"),p!=="px"&&(f.style(this,i,(o||1)+p),n=(o||1)/j.cur()*n,f.style(this,i,n+p)),m[1]&&(o=(m[1]==="-="?-1:1)*o+n),j.custom(n,o,p)):j.custom(n,h,""));return!0}var e=f.speed(b,c,d);if(f.isEmptyObject(a))return this.each(e.complete,[!1]);a=f.extend({},a);return e.queue===!1?this.each(g):this.queue(e.queue,g)},stop:function(a,c,d){typeof a!="string"&&(d=c,c=a,a=b),c&&a!==!1&&this.queue(a||"fx",[]);return this.each(function(){function h(a,b,c){var e=b[c];f.removeData(a,c,!0),e.stop(d)}var b,c=!1,e=f.timers,g=f._data(this);d||f._unmark(!0,this);if(a==null)for(b in g)g[b]&&g[b].stop&&b.indexOf(".run")===b.length-4&&h(this,g,b);else g[b=a+".run"]&&g[b].stop&&h(this,g,b);for(b=e.length;b--;)e[b].elem===this&&(a==null||e[b].queue===a)&&(d?e[b](!0):e[b].saveState(),c=!0,e.splice(b,1));(!d||!c)&&f.dequeue(this,a)})}}),f.each({slideDown:ct("show",1),slideUp:ct("hide",1),slideToggle:ct("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){f.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),f.extend({speed:function(a,b,c){var d=a&&typeof a=="object"?f.extend({},a):{complete:c||!c&&b||f.isFunction(a)&&a,duration:a,easing:c&&b||b&&!f.isFunction(b)&&b};d.duration=f.fx.off?0:typeof d.duration=="number"?d.duration:d.duration in f.fx.speeds?f.fx.speeds[d.duration]:f.fx.speeds._default;if(d.queue==null||d.queue===!0)d.queue="fx";d.old=d.complete,d.complete=function(a){f.isFunction(d.old)&&d.old.call(this),d.queue?f.dequeue(this,d.queue):a!==!1&&f._unmark(this)};return d},easing:{linear:function(a){return a},swing:function(a){return-Math.cos(a*Math.PI)/2+.5}},timers:[],fx:function(a,b,c){this.options=b,this.elem=a,this.prop=c,b.orig=b.orig||{}}}),f.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this),(f.fx.step[this.prop]||f.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=f.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,c,d){function h(a){return e.step(a)}var e=this,g=f.fx;this.startTime=cq||cr(),this.end=c,this.now=this.start=a,this.pos=this.state=0,this.unit=d||this.unit||(f.cssNumber[this.prop]?"":"px"),h.queue=this.options.queue,h.elem=this.elem,h.saveState=function(){f._data(e.elem,"fxshow"+e.prop)===b&&(e.options.hide?f._data(e.elem,"fxshow"+e.prop,e.start):e.options.show&&f._data(e.elem,"fxshow"+e.prop,e.end))},h()&&f.timers.push(h)&&!co&&(co=setInterval(g.tick,g.interval))},show:function(){var a=f._data(this.elem,"fxshow"+this.prop);this.options.orig[this.prop]=a||f.style(this.elem,this.prop),this.options.show=!0,a!==b?this.custom(this.cur(),a):this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur()),f(this.elem).show()},hide:function(){this.options.orig[this.prop]=f._data(this.elem,"fxshow"+this.prop)||f.style(this.elem,this.prop),this.options.hide=!0,this.custom(this.cur(),0)},step:function(a){var b,c,d,e=cq||cr(),g=!0,h=this.elem,i=this.options;if(a||e>=i.duration+this.startTime){this.now=this.end,this.pos=this.state=1,this.update(),i.animatedProperties[this.prop]=!0;for(b in i.animatedProperties)i.animatedProperties[b]!==!0&&(g=!1);if(g){i.overflow!=null&&!f.support.shrinkWrapBlocks&&f.each(["","X","Y"],function(a,b){h.style["overflow"+b]=i.overflow[a]}),i.hide&&f(h).hide();if(i.hide||i.show)for(b in i.animatedProperties)f.style(h,b,i.orig[b]),f.removeData(h,"fxshow"+b,!0),f.removeData(h,"toggle"+b,!0);d=i.complete,d&&(i.complete=!1,d.call(h))}return!1}i.duration==Infinity?this.now=e:(c=e-this.startTime,this.state=c/i.duration,this.pos=f.easing[i.animatedProperties[this.prop]](this.state,c,0,1,i.duration),this.now=this.start+(this.end-this.start)*this.pos),this.update();return!0}},f.extend(f.fx,{tick:function(){var a,b=f.timers,c=0;for(;c<b.length;c++)a=b[c],!a()&&b[c]===a&&b.splice(c--,1);b.length||f.fx.stop()},interval:13,stop:function(){clearInterval(co),co=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){f.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=a.now+a.unit:a.elem[a.prop]=a.now}}}),f.each(cp.concat.apply([],cp),function(a,b){b.indexOf("margin")&&(f.fx.step[b]=function(a){f.style(a.elem,b,Math.max(0,a.now)+a.unit)})}),f.expr&&f.expr.filters&&(f.expr.filters.animated=function(a){return f.grep(f.timers,function(b){return a===b.elem}).length});var cv,cw=/^t(?:able|d|h)$/i,cx=/^(?:body|html)$/i;"getBoundingClientRect"in c.documentElement?cv=function(a,b,c,d){try{d=a.getBoundingClientRect()}catch(e){}if(!d||!f.contains(c,a))return d?{top:d.top,left:d.left}:{top:0,left:0};var g=b.body,h=cy(b),i=c.clientTop||g.clientTop||0,j=c.clientLeft||g.clientLeft||0,k=h.pageYOffset||f.support.boxModel&&c.scrollTop||g.scrollTop,l=h.pageXOffset||f.support.boxModel&&c.scrollLeft||g.scrollLeft,m=d.top+k-i,n=d.left+l-j;return{top:m,left:n}}:cv=function(a,b,c){var d,e=a.offsetParent,g=a,h=b.body,i=b.defaultView,j=i?i.getComputedStyle(a,null):a.currentStyle,k=a.offsetTop,l=a.offsetLeft;while((a=a.parentNode)&&a!==h&&a!==c){if(f.support.fixedPosition&&j.position==="fixed")break;d=i?i.getComputedStyle(a,null):a.currentStyle,k-=a.scrollTop,l-=a.scrollLeft,a===e&&(k+=a.offsetTop,l+=a.offsetLeft,f.support.doesNotAddBorder&&(!f.support.doesAddBorderForTableAndCells||!cw.test(a.nodeName))&&(k+=parseFloat(d.borderTopWidth)||0,l+=parseFloat(d.borderLeftWidth)||0),g=e,e=a.offsetParent),f.support.subtractsBorderForOverflowNotVisible&&d.overflow!=="visible"&&(k+=parseFloat(d.borderTopWidth)||0,l+=parseFloat(d.borderLeftWidth)||0),j=d}if(j.position==="relative"||j.position==="static")k+=h.offsetTop,l+=h.offsetLeft;f.support.fixedPosition&&j.position==="fixed"&&(k+=Math.max(c.scrollTop,h.scrollTop),l+=Math.max(c.scrollLeft,h.scrollLeft));return{top:k,left:l}},f.fn.offset=function(a){if(arguments.length)return a===b?this:this.each(function(b){f.offset.setOffset(this,a,b)});var c=this[0],d=c&&c.ownerDocument;if(!d)return null;if(c===d.body)return f.offset.bodyOffset(c);return cv(c,d,d.documentElement)},f.offset={bodyOffset:function(a){var b=a.offsetTop,c=a.offsetLeft;f.support.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(f.css(a,"marginTop"))||0,c+=parseFloat(f.css(a,"marginLeft"))||0);return{top:b,left:c}},setOffset:function(a,b,c){var d=f.css(a,"position");d==="static"&&(a.style.position="relative");var e=f(a),g=e.offset(),h=f.css(a,"top"),i=f.css(a,"left"),j=(d==="absolute"||d==="fixed")&&f.inArray("auto",[h,i])>-1,k={},l={},m,n;j?(l=e.position(),m=l.top,n=l.left):(m=parseFloat(h)||0,n=parseFloat(i)||0),f.isFunction(b)&&(b=b.call(a,c,g)),b.top!=null&&(k.top=b.top-g.top+m),b.left!=null&&(k.left=b.left-g.left+n),"using"in b?b.using.call(a,k):e.css(k)}},f.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),c=this.offset(),d=cx.test(b[0].nodeName)?{top:0,left:0}:b.offset();c.top-=parseFloat(f.css(a,"marginTop"))||0,c.left-=parseFloat(f.css(a,"marginLeft"))||0,d.top+=parseFloat(f.css(b[0],"borderTopWidth"))||0,d.left+=parseFloat(f.css(b[0],"borderLeftWidth"))||0;return{top:c.top-d.top,left:c.left-d.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||c.body;while(a&&!cx.test(a.nodeName)&&f.css(a,"position")==="static")a=a.offsetParent;return a})}}),f.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,c){var d=/Y/.test(c);f.fn[a]=function(e){return f.access(this,function(a,e,g){var h=cy(a);if(g===b)return h?c in h?h[c]:f.support.boxModel&&h.document.documentElement[e]||h.document.body[e]:a[e];h?h.scrollTo(d?f(h).scrollLeft():g,d?g:f(h).scrollTop()):a[e]=g},a,e,arguments.length,null)}}),f.each({Height:"height",Width:"width"},function(a,c){var d="client"+a,e="scroll"+a,g="offset"+a;f.fn["inner"+a]=function(){var a=this[0];return a?a.style?parseFloat(f.css(a,c,"padding")):this[c]():null},f.fn["outer"+a]=function(a){var b=this[0];return b?b.style?parseFloat(f.css(b,c,a?"margin":"border")):this[c]():null},f.fn[c]=function(a){return f.access(this,function(a,c,h){var i,j,k,l;if(f.isWindow(a)){i=a.document,j=i.documentElement[d];return f.support.boxModel&&j||i.body&&i.body[d]||j}if(a.nodeType===9){i=a.documentElement;if(i[d]>=i[e])return i[d];return Math.max(a.body[e],i[e],a.body[g],i[g])}if(h===b){k=f.css(a,c),l=parseFloat(k);return f.isNumeric(l)?l:k}f(a).css(c,h)},c,a,arguments.length,null)}}),a.jQuery=a.$=f,typeof define=="function"&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return f})})(window);;jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d);},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b;},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b;},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*((--t)*(t-2)-1)+b;},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b;},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b;},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b;},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b;},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return-c/2*((t-=2)*t*t*t-2)+b;},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b;},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b;},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b;},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b;},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b;},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b;},easeInExpo:function(x,t,b,c,d){return(t==0)?b:c*Math.pow(2,10*(t/d-1))+b;},easeOutExpo:function(x,t,b,c,d){return(t==d)?b+c:c*(-Math.pow(2,-10*t/d)+1)+b;},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b;},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b;},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b;},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b;},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b;},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b;},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b;},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b;},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b;},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b;},easeOutBounce:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b;}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b;}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b;}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b;}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+c*.5+b;}});;function formatedNumberToFloat(price,currencyFormat,currencySign)
{price=price.replace(currencySign,'');if(currencyFormat==1)
return parseFloat(price.replace(',','').replace(' ',''));else if(currencyFormat==2)
return parseFloat(price.replace(' ','').replace(',','.'));else if(currencyFormat==3)
return parseFloat(price.replace('.','').replace(' ','').replace(',','.'));else if(currencyFormat==4)
return parseFloat(price.replace(',','').replace(' ',''));return price;}
function formatNumber(value,numberOfDecimal,thousenSeparator,virgule)
{value=value.toFixed(numberOfDecimal);var val_string=value+'';var tmp=val_string.split('.');var abs_val_string=(tmp.length==2)?tmp[0]:val_string;var deci_string=('0.'+(tmp.length==2?tmp[1]:0)).substr(2);var nb=abs_val_string.length;for(var i=1;i<4;i++)
if(value>=Math.pow(10,(3*i)))
abs_val_string=abs_val_string.substring(0,nb-(3*i))+thousenSeparator+abs_val_string.substring(nb-(3*i));if(parseInt(numberOfDecimal)==0)
return abs_val_string;return abs_val_string+virgule+(deci_string>0?deci_string:'00');}
function formatCurrency(price,currencyFormat,currencySign,currencyBlank)
{blank='';price=parseFloat(price.toFixed(6));price=ps_round(price,priceDisplayPrecision);if(currencyBlank>0)
blank=' ';if(currencyFormat==1)
return currencySign+blank+formatNumber(price,priceDisplayPrecision,',','.');if(currencyFormat==2)
return(formatNumber(price,priceDisplayPrecision,' ',',')+blank+currencySign);if(currencyFormat==3)
return(currencySign+blank+formatNumber(price,priceDisplayPrecision,'.',','));if(currencyFormat==4)
return(formatNumber(price,priceDisplayPrecision,',','.')+blank+currencySign);if(currencyFormat==5)
return(formatNumber(price,priceDisplayPrecision,' ','.')+blank+currencySign);return price;}
function ps_round(value,precision)
{if(typeof(roundMode)=='undefined')
roundMode=2;if(typeof(precision)=='undefined')
precision=2;method=roundMode;if(method==0)
return ceilf(value,precision);else if(method==1)
return floorf(value,precision);precisionFactor=precision==0?1:Math.pow(10,precision);return Math.round(value*precisionFactor)/precisionFactor;}
function autoUrl(name,dest)
{var loc;var id_list;id_list=document.getElementById(name);loc=id_list.options[id_list.selectedIndex].value;if(loc!=0)
location.href=dest+loc;return;}
function autoUrlNoList(name,dest)
{var loc;loc=document.getElementById(name).checked;location.href=dest+(loc==true?1:0);return;}
function toggle(e,show)
{e.style.display=show?'':'none';}
function toggleMultiple(tab)
{var len=tab.length;for(var i=0;i<len;i++)
if(tab[i].style)
toggle(tab[i],tab[i].style.display=='none');}
function showElemFromSelect(select_id,elem_id)
{var select=document.getElementById(select_id);for(var i=0;i<select.length;++i)
{var elem=document.getElementById(elem_id+select.options[i].value);if(elem!=null)
toggle(elem,i==select.selectedIndex);}}
function openCloseAllDiv(name,option)
{var tab=$('*[name='+name+']');for(var i=0;i<tab.length;++i)
toggle(tab[i],option);}
function toggleElemValue(id_button,text1,text2)
{var obj=document.getElementById(id_button);if(obj)
obj.value=((!obj.value||obj.value==text2)?text1:text2);}
function addBookmark(url,title)
{if(window.sidebar)
return window.sidebar.addPanel(title,url,"");else if(window.external&&('AddFavorite'in window.external))
return window.external.AddFavorite(url,title);else if(window.opera&&window.print)
return true;return true;}
function writeBookmarkLink(url,title,text,img)
{var insert='';if(img)
insert=writeBookmarkLinkObject(url,title,'<img src="'+img+'" alt="'+escape(text)+'" title="'+escape(text)+'" />')+'&nbsp';insert+=writeBookmarkLinkObject(url,title,text);if(window.sidebar||window.opera&&window.print||(window.external&&('AddFavorite'in window.external)))
document.write(insert);}
function writeBookmarkLinkObject(url,title,insert)
{if(window.sidebar||window.external)
return('<a href="javascript:addBookmark(\''+escape(url)+'\', \''+escape(title)+'\')">'+insert+'</a>');else if(window.opera&&window.print)
return('<a rel="sidebar" href="'+escape(url)+'" title="'+escape(title)+'">'+insert+'</a>');return('');}
function checkCustomizations()
{var pattern=new RegExp(' ?filled ?');if(typeof customizationFields!='undefined')
for(var i=0;i<customizationFields.length;i++)
{if(parseInt(customizationFields[i][1])==1&&($('#'+customizationFields[i][0]).html()==''||$('#'+customizationFields[i][0]).text()!=$('#'+customizationFields[i][0]).val())&&!pattern.test($('#'+customizationFields[i][0]).attr('class')))
return false;}
return true;}
function emptyCustomizations()
{if(typeof(customizationFields)=='undefined')return;$('.customization_block .success').fadeOut(function(){$(this).remove();});$('.customization_block .error').fadeOut(function(){$(this).remove();});for(var i=0;i<customizationFields.length;i++)
{$('#'+customizationFields[i][0]).html('');$('#'+customizationFields[i][0]).val('');}}
function ceilf(value,precision)
{if(typeof(precision)=='undefined')
precision=0;var precisionFactor=precision==0?1:Math.pow(10,precision);var tmp=value*precisionFactor;var tmp2=tmp.toString();if(tmp2.indexOf('.')===false)
return(value);if(tmp2.charAt(tmp2.length-1)==0)
return value;return Math.ceil(tmp)/precisionFactor;}
function floorf(value,precision)
{if(typeof(precision)=='undefined')
precision=0;var precisionFactor=precision==0?1:Math.pow(10,precision);var tmp=value*precisionFactor;var tmp2=tmp.toString();if(tmp2.indexOf('.')===false)
return(value);if(tmp2.charAt(tmp2.length-1)==0)
return value;return Math.floor(tmp)/precisionFactor;}
function setCurrency(id_currency)
{$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseDir+'index.php'+'?rand='+new Date().getTime(),data:'controller=change-currency&id_currency='+parseInt(id_currency),success:function(msg)
{location.reload(true);}});}
function isArrowKey(k_ev)
{var unicode=k_ev.keyCode?k_ev.keyCode:k_ev.charCode;if(unicode>=37&&unicode<=40)
return true;return false;}
$().ready(function()
{$('form').submit(function()
{$(this).find('.hideOnSubmit').hide();});$('a._blank').attr('target','_blank');});;function ps_round(value,precision)
{if(typeof(roundMode)==='undefined')
roundMode=2;if(typeof(precision)==='undefined')
precision=2;method=roundMode;if(method===0)
return ceilf(value,precision);else if(method===1)
return floorf(value,precision);precisionFactor=precision===0?1:Math.pow(10,precision);return Math.round(value*precisionFactor)/precisionFactor;}
function ceilf(value,precision)
{if(typeof(precision)==='undefined')
precision=0;precisionFactor=precision===0?1:Math.pow(10,precision);tmp=value*precisionFactor;tmp2=tmp.toString();if(tmp2[tmp2.length-1]===0)
return value;return Math.ceil(value*precisionFactor)/precisionFactor;}
function floorf(value,precision)
{if(typeof(precision)==='undefined')
precision=0;precisionFactor=precision===0?1:Math.pow(10,precision);tmp=value*precisionFactor;tmp2=tmp.toString();if(tmp2[tmp2.length-1]===0)
return value;return Math.floor(value*precisionFactor)/precisionFactor;}
function formatedNumberToFloat(price,currencyFormat,currencySign)
{price=price.replace(currencySign,'');if(currencyFormat===1)
return parseFloat(price.replace(',','').replace(' ',''));else if(currencyFormat===2)
return parseFloat(price.replace(' ','').replace(',','.'));else if(currencyFormat===3)
return parseFloat(price.replace('.','').replace(' ','').replace(',','.'));else if(currencyFormat===4)
return parseFloat(price.replace(',','').replace(' ',''));return price;}
function formatCurrency(price,currencyFormat,currencySign,currencyBlank)
{blank='';price=parseFloat(price.toFixed(6));price=ps_round(price,priceDisplayPrecision);if(currencyBlank>0)
blank=' ';if(currencyFormat==1)
return currencySign+blank+formatNumber(price,priceDisplayPrecision,',','.');if(currencyFormat==2)
return(formatNumber(price,priceDisplayPrecision,' ',',')+blank+currencySign);if(currencyFormat==3)
return(currencySign+blank+formatNumber(price,priceDisplayPrecision,'.',','));if(currencyFormat==4)
return(formatNumber(price,priceDisplayPrecision,',','.')+blank+currencySign);if(currencyFormat==5)
return(formatNumber(price,priceDisplayPrecision,' ','.')+blank+currencySign);return price;}
function formatNumber(value,numberOfDecimal,thousenSeparator,virgule)
{value=value.toFixed(numberOfDecimal);var val_string=value+'';var tmp=val_string.split('.');var abs_val_string=(tmp.length===2)?tmp[0]:val_string;var deci_string=('0.'+(tmp.length===2?tmp[1]:0)).substr(2);var nb=abs_val_string.length;for(var i=1;i<4;i++)
if(value>=Math.pow(10,(3*i)))
abs_val_string=abs_val_string.substring(0,nb-(3*i))+thousenSeparator+abs_val_string.substring(nb-(3*i));if(parseInt(numberOfDecimal)===0)
return abs_val_string;return abs_val_string+virgule+(deci_string>0?deci_string:'00');}
function updateTextWithEffect(jQueryElement,text,velocity,effect1,effect2,newClass)
{if(jQueryElement.text()!==text)
if(effect1==='fade')
jQueryElement.fadeOut(velocity,function(){$(this).addClass(newClass);if(effect2==='fade')$(this).text(text).fadeIn(velocity);else if(effect2==='slide')$(this).text(text).slideDown(velocity);else if(effect2==='show')$(this).text(text).show(velocity,function(){});});else if(effect1==='slide')
jQueryElement.slideUp(velocity,function(){$(this).addClass(newClass);if(effect2==='fade')$(this).text(text).fadeIn(velocity);else if(effect2==='slide')$(this).text(text).slideDown(velocity);else if(effect2==='show')$(this).text(text).show(velocity);});else if(effect1==='hide')
jQueryElement.hide(velocity,function(){$(this).addClass(newClass);if(effect2==='fade')$(this).text(text).fadeIn(velocity);else if(effect2==='slide')$(this).text(text).slideDown(velocity);else if(effect2==='show')$(this).text(text).show(velocity);});}
function dbg(value)
{var active=false;var firefox=true;if(active)
if(firefox)
console.log(value);else
alert(value);}
function print_r(arr,level)
{var dumped_text="";if(!level)
level=0;var level_padding="";for(var j=0;j<level+1;j++)
level_padding+="    ";if(typeof(arr)==='object')
{for(var item in arr)
{var value=arr[item];if(typeof(value)==='object'){dumped_text+=level_padding+"'"+item+"' ...\n";dumped_text+=dump(value,level+1);}
else
{dumped_text+=level_padding+"'"+item+"' => \""+value+"\"\n";}}}
else
{dumped_text="===>"+arr+"<===("+typeof(arr)+")";}
return dumped_text;}
function in_array(value,array)
{for(var i in array)
if(array[i]===value)
return true;return false;}
function resizeAddressesBox(nameBox)
{maxHeight=0;if(typeof(nameBox)==='undefined')
nameBox='.address';$(nameBox).each(function()
{$(this).css('height','auto');currentHeight=$(this).height();if(maxHeight<currentHeight)
maxHeight=currentHeight;});$(nameBox).height(maxHeight);}
$(document).ready(function(){$.fn.checkboxChange=function(fnChecked,fnUnchecked){if($(this).prop('checked')&&fnChecked)
fnChecked.call(this);else if(fnUnchecked)
fnUnchecked.call(this);if(!$(this).attr('eventCheckboxChange'))
{$(this).live('change',function(){$(this).checkboxChange(fnChecked,fnUnchecked);});$(this).attr('eventCheckboxChange',true);}};});$(function(){$('a.js-new-window').click(function(){window.open(this.href);return false;});});;$(document).ready(function()
{if(typeof(formatedAddressFieldsValuesList)!=='undefined')
updateAddressesDisplay(true);resizeAddressesBox();});function updateAddressesDisplay(first_view)
{updateAddressDisplay('delivery');var txtInvoiceTitle="";try{var adrs_titles=getAddressesTitles();txtInvoiceTitle=adrs_titles.invoice;}
catch(e)
{}
if($('input[type=checkbox]#addressesAreEquals:checked').length===1&&($('#multishipping_mode_checkbox:checked').length===0))
{if($('#multishipping_mode_checkbox:checked').length===0){$('#address_invoice_form:visible').hide('fast');}
$('ul#address_invoice').html($('ul#address_delivery').html());$('ul#address_invoice li.address_title').html(txtInvoiceTitle);}
else
{$('#address_invoice_form:hidden').show('fast');if($('#id_address_invoice').val())
updateAddressDisplay('invoice');else
{$('ul#address_invoice').html($('ul#address_delivery').html());$('ul#address_invoice li.address_title').html(txtInvoiceTitle);}}
if(!first_view)
{if(orderProcess==='order')
updateAddresses();}
return true;}
function updateAddressDisplay(addressType)
{if(formatedAddressFieldsValuesList.length<=0)
return false;var idAddress=parseInt($('#id_address_'+addressType+'').val());buildAddressBlock(idAddress,addressType,$('#address_'+addressType));var link=$('ul#address_'+addressType+' li.address_update a').attr('href');var expression=/id_address=\d+/;if(link)
{link=link.replace(expression,'id_address='+idAddress);$('ul#address_'+addressType+' li.address_update a').attr('href',link);}
resizeAddressesBox();}
function updateAddresses()
{var idAddress_delivery=parseInt($('#id_address_delivery').val());var idAddress_invoice=$('input[type=checkbox]#addressesAreEquals:checked').length===1?idAddress_delivery:parseInt($('#id_address_invoice').val());if(isNaN(idAddress_delivery)==false&&isNaN(idAddress_invoice)==false)
$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:"json",data:{processAddress:true,step:2,ajax:'true',controller:'order','multi-shipping':$('#id_address_delivery:hidden').length,id_address_delivery:idAddress_delivery,id_address_invoice:idAddress_invoice,token:static_token},success:function(jsonData)
{if(jsonData.hasError)
{var errors='';for(var error in jsonData.errors)
if(error!=='indexOf')
errors+=jsonData.errors[error]+"\n";alert(errors);}},error:function(XMLHttpRequest,textStatus,errorThrown){if(textStatus!=='abort')
alert("TECHNICAL ERROR: unable to save adresses \n\nDetails:\nError thrown: "+XMLHttpRequest+"\n"+'Text status: '+textStatus);}});resizeAddressesBox();};;(function($){var tmp,loading,overlay,wrap,outer,content,close,title,nav_left,nav_right,selectedIndex=0,selectedOpts={},selectedArray=[],currentIndex=0,currentOpts={},currentArray=[],ajaxLoader=null,imgPreloader=new Image(),imgRegExp=/\.(jpg|gif|png|bmp|jpeg)(.*)?$/i,swfRegExp=/[^\.]\.(swf)\s*$/i,loadingTimer,loadingFrame=1,titleHeight=0,titleStr='',start_pos,final_pos,busy=false,fx=$.extend($('<div/>')[0],{prop:0}),isIE6=$.browser.msie&&$.browser.version<7&&!window.XMLHttpRequest,_abort=function(){loading.hide();imgPreloader.onerror=imgPreloader.onload=null;if(ajaxLoader){ajaxLoader.abort();}
tmp.empty();},_error=function(){if(false===selectedOpts.onError(selectedArray,selectedIndex,selectedOpts)){loading.hide();busy=false;return;}
selectedOpts.titleShow=false;selectedOpts.width='auto';selectedOpts.height='auto';tmp.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>');_process_inline();},_start=function(){var obj=selectedArray[selectedIndex],href,type,title,str,emb,ret;_abort();selectedOpts=$.extend({},$.fn.fancybox.defaults,(typeof $(obj).data('fancybox')=='undefined'?selectedOpts:$(obj).data('fancybox')));ret=selectedOpts.onStart(selectedArray,selectedIndex,selectedOpts);if(ret===false){busy=false;return;}else if(typeof ret=='object'){selectedOpts=$.extend(selectedOpts,ret);}
title=selectedOpts.title||(obj.nodeName?$(obj).attr('title'):obj.title)||'';if(obj.nodeName&&!selectedOpts.orig){selectedOpts.orig=$(obj).children("img:first").length?$(obj).children("img:first"):$(obj);}
if(title===''&&selectedOpts.orig&&selectedOpts.titleFromAlt){title=selectedOpts.orig.attr('alt');}
href=selectedOpts.href||(obj.nodeName?$(obj).attr('href'):obj.href)||null;if((/^(?:javascript)/i).test(href)||href=='#'){href=null;}
if(selectedOpts.type){type=selectedOpts.type;if(!href){href=selectedOpts.content;}}else if(selectedOpts.content){type='html';}else if(href){if(href.match(imgRegExp)){type='image';}else if(href.match(swfRegExp)){type='swf';}else if($(obj).hasClass("iframe")){type='iframe';}else if(href.indexOf("#")===0){type='inline';}else{type='ajax';}}
if(!type){_error();return;}
if(type=='inline'){obj=href.substr(href.indexOf("#"));type=$(obj).length>0?'inline':'ajax';}
selectedOpts.type=type;selectedOpts.href=href;selectedOpts.title=title;if(selectedOpts.autoDimensions){if(selectedOpts.type=='html'||selectedOpts.type=='inline'||selectedOpts.type=='ajax'){selectedOpts.width='auto';selectedOpts.height='auto';}else{selectedOpts.autoDimensions=false;}}
if(selectedOpts.modal){selectedOpts.overlayShow=true;selectedOpts.hideOnOverlayClick=false;selectedOpts.hideOnContentClick=false;selectedOpts.enableEscapeButton=false;selectedOpts.showCloseButton=false;}
selectedOpts.padding=parseInt(selectedOpts.padding,10);selectedOpts.margin=parseInt(selectedOpts.margin,10);tmp.css('padding',(selectedOpts.padding+selectedOpts.margin));$('.fancybox-inline-tmp').unbind('fancybox-cancel').bind('fancybox-change',function(){$(this).replaceWith(content.children());});switch(type){case'html':tmp.html(selectedOpts.content);_process_inline();break;case'inline':if($(obj).parent().is('#fancybox-content')===true){busy=false;return;}
$('<div class="fancybox-inline-tmp" />').hide().insertBefore($(obj)).bind('fancybox-cleanup',function(){$(this).replaceWith(content.children());}).bind('fancybox-cancel',function(){$(this).replaceWith(tmp.children());});$(obj).appendTo(tmp);_process_inline();break;case'image':busy=false;$.fancybox.showActivity();imgPreloader=new Image();imgPreloader.onerror=function(){_error();};imgPreloader.onload=function(){busy=true;imgPreloader.onerror=imgPreloader.onload=null;_process_image();};imgPreloader.src=href;break;case'swf':selectedOpts.scrolling='no';str='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+selectedOpts.width+'" height="'+selectedOpts.height+'"><param name="movie" value="'+href+'"></param>';emb='';$.each(selectedOpts.swf,function(name,val){str+='<param name="'+name+'" value="'+val+'"></param>';emb+=' '+name+'="'+val+'"';});str+='<embed src="'+href+'" type="application/x-shockwave-flash" width="'+selectedOpts.width+'" height="'+selectedOpts.height+'"'+emb+'></embed></object>';tmp.html(str);_process_inline();break;case'ajax':busy=false;$.fancybox.showActivity();selectedOpts.ajax.win=selectedOpts.ajax.success;ajaxLoader=$.ajax($.extend({},selectedOpts.ajax,{url:href,data:selectedOpts.ajax.data||{},error:function(XMLHttpRequest,textStatus,errorThrown){if(XMLHttpRequest.status>0){_error();}},success:function(data,textStatus,XMLHttpRequest){var o=typeof XMLHttpRequest=='object'?XMLHttpRequest:ajaxLoader;if(o.status==200){if(typeof selectedOpts.ajax.win=='function'){ret=selectedOpts.ajax.win(href,data,textStatus,XMLHttpRequest);if(ret===false){loading.hide();return;}else if(typeof ret=='string'||typeof ret=='object'){data=ret;}}
tmp.html(data);_process_inline();}}}));break;case'iframe':_show();break;}},_process_inline=function(){var
w=selectedOpts.width,h=selectedOpts.height;if(w.toString().indexOf('%')>-1){w=parseInt(($(window).width()-(selectedOpts.margin*2))*parseFloat(w)/100,10)+'px';}else{w=w=='auto'?'auto':w+'px';}
if(h.toString().indexOf('%')>-1){h=parseInt(($(window).height()-(selectedOpts.margin*2))*parseFloat(h)/100,10)+'px';}else{h=h=='auto'?'auto':h+'px';}
tmp.wrapInner('<div style="width:'+w+';height:'+h+';overflow: '+(selectedOpts.scrolling=='auto'?'auto':(selectedOpts.scrolling=='yes'?'scroll':'hidden'))+';position:relative;"></div>');selectedOpts.width=tmp.width();selectedOpts.height=tmp.height();_show();},_process_image=function(){selectedOpts.width=imgPreloader.width;selectedOpts.height=imgPreloader.height;$("<img />").attr({'id':'fancybox-img','src':imgPreloader.src,'alt':selectedOpts.title}).appendTo(tmp);_show();},_show=function(){var pos,equal;loading.hide();if(wrap.is(":visible")&&false===currentOpts.onCleanup(currentArray,currentIndex,currentOpts)){$.event.trigger('fancybox-cancel');busy=false;return;}
busy=true;$(content.add(overlay)).unbind();$(window).unbind("resize.fb scroll.fb");$(document).unbind('keydown.fb');if(wrap.is(":visible")&&currentOpts.titlePosition!=='outside'){wrap.css('height',wrap.height());}
currentArray=selectedArray;currentIndex=selectedIndex;currentOpts=selectedOpts;if(currentOpts.overlayShow){overlay.css({'background-color':currentOpts.overlayColor,'opacity':currentOpts.overlayOpacity,'cursor':currentOpts.hideOnOverlayClick?'pointer':'auto','height':$(document).height()});if(!overlay.is(':visible')){if(isIE6){$('select:not(#fancybox-tmp select)').filter(function(){return this.style.visibility!=='hidden';}).css({'visibility':'hidden'}).one('fancybox-cleanup',function(){this.style.visibility='inherit';});}
overlay.show();}}else{overlay.hide();}
final_pos=_get_zoom_to();_process_title();if(wrap.is(":visible")){$(close.add(nav_left).add(nav_right)).hide();pos=wrap.position(),start_pos={top:pos.top,left:pos.left,width:wrap.width(),height:wrap.height()};equal=(start_pos.width==final_pos.width&&start_pos.height==final_pos.height);content.fadeTo(currentOpts.changeFade,0.3,function(){var finish_resizing=function(){content.html(tmp.contents()).fadeTo(currentOpts.changeFade,1,_finish);};$.event.trigger('fancybox-change');content.empty().removeAttr('filter').css({'border-width':currentOpts.padding,'width':final_pos.width-currentOpts.padding*2,'height':selectedOpts.autoDimensions?'auto':final_pos.height-titleHeight-currentOpts.padding*2});if(equal){finish_resizing();}else{fx.prop=0;$(fx).animate({prop:1},{duration:currentOpts.changeSpeed,easing:currentOpts.easingChange,step:_draw,complete:finish_resizing});}});return;}
wrap.removeAttr("style");content.css('border-width',currentOpts.padding);if(currentOpts.transitionIn=='elastic'){start_pos=_get_zoom_from();content.html(tmp.contents());wrap.show();if(currentOpts.opacity){final_pos.opacity=0;}
fx.prop=0;$(fx).animate({prop:1},{duration:currentOpts.speedIn,easing:currentOpts.easingIn,step:_draw,complete:_finish});return;}
if(currentOpts.titlePosition=='inside'&&titleHeight>0){title.show();}
content.css({'width':final_pos.width-currentOpts.padding*2,'height':selectedOpts.autoDimensions?'auto':final_pos.height-titleHeight-currentOpts.padding*2}).html(tmp.contents());wrap.css(final_pos).fadeIn(currentOpts.transitionIn=='none'?0:currentOpts.speedIn,_finish);},_format_title=function(title){if(title&&title.length){if(currentOpts.titlePosition=='float'){return'<table id="fancybox-title-float-wrap" cellpadding="0" cellspacing="0"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">'+title+'</td><td id="fancybox-title-float-right"></td></tr></table>';}
return'<div id="fancybox-title-'+currentOpts.titlePosition+'">'+title+'</div>';}
return false;},_process_title=function(){titleStr=currentOpts.title||'';titleHeight=0;title.empty().removeAttr('style').removeClass();if(currentOpts.titleShow===false){title.hide();return;}
titleStr=$.isFunction(currentOpts.titleFormat)?currentOpts.titleFormat(titleStr,currentArray,currentIndex,currentOpts):_format_title(titleStr);if(!titleStr||titleStr===''){title.hide();return;}
title.addClass('fancybox-title-'+currentOpts.titlePosition).html(titleStr).appendTo('body').show();switch(currentOpts.titlePosition){case'inside':title.css({'width':final_pos.width-(currentOpts.padding*2),'marginLeft':currentOpts.padding,'marginRight':currentOpts.padding});titleHeight=title.outerHeight(true);title.appendTo(outer);final_pos.height+=titleHeight;break;case'over':title.css({'marginLeft':currentOpts.padding,'width':final_pos.width-(currentOpts.padding*2),'bottom':currentOpts.padding}).appendTo(outer);break;case'float':title.css('left',parseInt((title.width()-final_pos.width-40)/2,10)*-1).appendTo(wrap);break;default:title.css({'width':final_pos.width-(currentOpts.padding*2),'paddingLeft':currentOpts.padding,'paddingRight':currentOpts.padding}).appendTo(wrap);break;}
title.hide();},_set_navigation=function(){if(currentOpts.enableEscapeButton||currentOpts.enableKeyboardNav){$(document).bind('keydown.fb',function(e){if(e.keyCode==27&&currentOpts.enableEscapeButton){e.preventDefault();$.fancybox.close();}else if((e.keyCode==37||e.keyCode==39)&&currentOpts.enableKeyboardNav&&e.target.tagName!=='INPUT'&&e.target.tagName!=='TEXTAREA'&&e.target.tagName!=='SELECT'){e.preventDefault();$.fancybox[e.keyCode==37?'prev':'next']();}});}
if(!currentOpts.showNavArrows){nav_left.hide();nav_right.hide();return;}
if((currentOpts.cyclic&&currentArray.length>1)||currentIndex!==0){nav_left.show();}
if((currentOpts.cyclic&&currentArray.length>1)||currentIndex!=(currentArray.length-1)){nav_right.show();}},_finish=function(){if(!$.support.opacity){content.get(0).style.removeAttribute('filter');wrap.get(0).style.removeAttribute('filter');}
if(selectedOpts.autoDimensions){content.css('height','auto');}
wrap.css('height','auto');if(titleStr&&titleStr.length){title.show();}
if(currentOpts.showCloseButton){close.show();}
_set_navigation();if(currentOpts.hideOnContentClick){content.bind('click',$.fancybox.close);}
if(currentOpts.hideOnOverlayClick){overlay.bind('click',$.fancybox.close);}
$(window).bind("resize.fb",$.fancybox.resize);if(currentOpts.centerOnScroll){$(window).bind("scroll.fb",$.fancybox.center);}
if(currentOpts.type=='iframe'){$('<iframe id="fancybox-frame" name="fancybox-frame'+new Date().getTime()+'" frameborder="0" hspace="0" '+($.browser.msie?'allowtransparency="true""':'')+' scrolling="'+selectedOpts.scrolling+'" src="'+currentOpts.href+'"></iframe>').appendTo(content);}
wrap.show();busy=false;$.fancybox.center();currentOpts.onComplete(currentArray,currentIndex,currentOpts);_preload_images();},_preload_images=function(){var href,objNext;if((currentArray.length-1)>currentIndex){href=currentArray[currentIndex+1].href;if(typeof href!=='undefined'&&href.match(imgRegExp)){objNext=new Image();objNext.src=href;}}
if(currentIndex>0){href=currentArray[currentIndex-1].href;if(typeof href!=='undefined'&&href.match(imgRegExp)){objNext=new Image();objNext.src=href;}}},_draw=function(pos){var dim={width:parseInt(start_pos.width+(final_pos.width-start_pos.width)*pos,10),height:parseInt(start_pos.height+(final_pos.height-start_pos.height)*pos,10),top:parseInt(start_pos.top+(final_pos.top-start_pos.top)*pos,10),left:parseInt(start_pos.left+(final_pos.left-start_pos.left)*pos,10)};if(typeof final_pos.opacity!=='undefined'){dim.opacity=pos<0.5?0.5:pos;}
wrap.css(dim);content.css({'width':dim.width-currentOpts.padding*2,'height':dim.height-(titleHeight*pos)-currentOpts.padding*2});},_get_viewport=function(){return[$(window).width()-(currentOpts.margin*2),$(window).height()-(currentOpts.margin*2),$(document).scrollLeft()+currentOpts.margin,$(document).scrollTop()+currentOpts.margin];},_get_zoom_to=function(){var view=_get_viewport(),to={},resize=currentOpts.autoScale,double_padding=currentOpts.padding*2,ratio;if(currentOpts.width.toString().indexOf('%')>-1){to.width=parseInt((view[0]*parseFloat(currentOpts.width))/100,10);}else{to.width=currentOpts.width+double_padding;}
if(currentOpts.height.toString().indexOf('%')>-1){to.height=parseInt((view[1]*parseFloat(currentOpts.height))/100,10);}else{to.height=currentOpts.height+double_padding;}
if(resize&&(to.width>view[0]||to.height>view[1])){if(selectedOpts.type=='image'||selectedOpts.type=='swf'){ratio=(currentOpts.width)/(currentOpts.height);if((to.width)>view[0]){to.width=view[0];to.height=parseInt(((to.width-double_padding)/ratio)+double_padding,10);}
if((to.height)>view[1]){to.height=view[1];to.width=parseInt(((to.height-double_padding)*ratio)+double_padding,10);}}else{to.width=Math.min(to.width,view[0]);to.height=Math.min(to.height,view[1]);}}
to.top=parseInt(Math.max(view[3]-20,view[3]+((view[1]-to.height-40)*0.5)),10);to.left=parseInt(Math.max(view[2]-20,view[2]+((view[0]-to.width-40)*0.5)),10);return to;},_get_obj_pos=function(obj){var pos=obj.offset();pos.top+=parseInt(obj.css('paddingTop'),10)||0;pos.left+=parseInt(obj.css('paddingLeft'),10)||0;pos.top+=parseInt(obj.css('border-top-width'),10)||0;pos.left+=parseInt(obj.css('border-left-width'),10)||0;pos.width=obj.width();pos.height=obj.height();return pos;},_get_zoom_from=function(){var orig=selectedOpts.orig?$(selectedOpts.orig):false,from={},pos,view;if(orig&&orig.length){pos=_get_obj_pos(orig);from={width:pos.width+(currentOpts.padding*2),height:pos.height+(currentOpts.padding*2),top:pos.top-currentOpts.padding-20,left:pos.left-currentOpts.padding-20};}else{view=_get_viewport();from={width:currentOpts.padding*2,height:currentOpts.padding*2,top:parseInt(view[3]+view[1]*0.5,10),left:parseInt(view[2]+view[0]*0.5,10)};}
return from;},_animate_loading=function(){if(!loading.is(':visible')){clearInterval(loadingTimer);return;}
$('div',loading).css('top',(loadingFrame*-40)+'px');loadingFrame=(loadingFrame+1)%12;};$.fn.fancybox=function(options){if(!$(this).length){return this;}
$(this).data('fancybox',$.extend({},options,($.metadata?$(this).metadata():{}))).unbind('click.fb').bind('click.fb',function(e){e.preventDefault();if(busy){return;}
busy=true;$(this).blur();selectedArray=[];selectedIndex=0;var rel=$(this).attr('rel')||'';if(!rel||rel==''||rel==='nofollow'){selectedArray.push(this);}else{selectedArray=$("a[rel="+rel+"], area[rel="+rel+"]");selectedIndex=selectedArray.index(this);}
_start();return;});return this;};$.fancybox=function(obj){var opts;if(busy){return;}
busy=true;opts=typeof arguments[1]!=='undefined'?arguments[1]:{};selectedArray=[];selectedIndex=parseInt(opts.index,10)||0;if($.isArray(obj)){for(var i=0,j=obj.length;i<j;i++){if(typeof obj[i]=='object'){$(obj[i]).data('fancybox',$.extend({},opts,obj[i]));}else{obj[i]=$({}).data('fancybox',$.extend({content:obj[i]},opts));}}
selectedArray=jQuery.merge(selectedArray,obj);}else{if(typeof obj=='object'){$(obj).data('fancybox',$.extend({},opts,obj));}else{obj=$({}).data('fancybox',$.extend({content:obj},opts));}
selectedArray.push(obj);}
if(selectedIndex>selectedArray.length||selectedIndex<0){selectedIndex=0;}
_start();};$.fancybox.showActivity=function(){clearInterval(loadingTimer);loading.show();loadingTimer=setInterval(_animate_loading,66);};$.fancybox.hideActivity=function(){loading.hide();};$.fancybox.next=function(){return $.fancybox.pos(currentIndex+1);};$.fancybox.prev=function(){return $.fancybox.pos(currentIndex-1);};$.fancybox.pos=function(pos){if(busy){return;}
pos=parseInt(pos);selectedArray=currentArray;if(pos>-1&&pos<currentArray.length){selectedIndex=pos;_start();}else if(currentOpts.cyclic&&currentArray.length>1){selectedIndex=pos>=currentArray.length?0:currentArray.length-1;_start();}
return;};$.fancybox.cancel=function(){if(busy){return;}
busy=true;$.event.trigger('fancybox-cancel');_abort();selectedOpts.onCancel(selectedArray,selectedIndex,selectedOpts);busy=false;};$.fancybox.close=function(){if(busy||wrap.is(':hidden')){return;}
busy=true;if(currentOpts&&false===currentOpts.onCleanup(currentArray,currentIndex,currentOpts)){busy=false;return;}
_abort();$(close.add(nav_left).add(nav_right)).hide();$(content.add(overlay)).unbind();$(window).unbind("resize.fb scroll.fb");$(document).unbind('keydown.fb');content.find('iframe').attr('src',isIE6&&/^https/i.test(window.location.href||'')?'javascript:void(false)':'about:blank');if(currentOpts.titlePosition!=='inside'){title.empty();}
wrap.stop();function _cleanup(){overlay.fadeOut('fast');title.empty().hide();wrap.hide();$.event.trigger('fancybox-cleanup');content.empty();currentOpts.onClosed(currentArray,currentIndex,currentOpts);currentArray=selectedOpts=[];currentIndex=selectedIndex=0;currentOpts=selectedOpts={};busy=false;}
if(currentOpts.transitionOut=='elastic'){start_pos=_get_zoom_from();var pos=wrap.position();final_pos={top:pos.top,left:pos.left,width:wrap.width(),height:wrap.height()};if(currentOpts.opacity){final_pos.opacity=1;}
title.empty().hide();fx.prop=1;$(fx).animate({prop:0},{duration:currentOpts.speedOut,easing:currentOpts.easingOut,step:_draw,complete:_cleanup});}else{wrap.fadeOut(currentOpts.transitionOut=='none'?0:currentOpts.speedOut,_cleanup);}};$.fancybox.resize=function(){if(overlay.is(':visible')){overlay.css('height',$(document).height());}
$.fancybox.center(true);};$.fancybox.center=function(){var view,align;if(busy){return;}
align=arguments[0]===true?1:0;view=_get_viewport();if(!align&&(wrap.width()>view[0]||wrap.height()>view[1])){return;}
wrap.stop().animate({'top':parseInt(Math.max(view[3]-20,view[3]+((view[1]-content.height()-40)*0.5)-currentOpts.padding)),'left':parseInt(Math.max(view[2]-20,view[2]+((view[0]-content.width()-40)*0.5)-currentOpts.padding))},typeof arguments[0]=='number'?arguments[0]:200);};$.fancybox.init=function(){if($("#fancybox-wrap").length){return;}
$('body').append(tmp=$('<div id="fancybox-tmp"></div>'),loading=$('<div id="fancybox-loading"><div></div></div>'),overlay=$('<div id="fancybox-overlay"></div>'),wrap=$('<div id="fancybox-wrap"></div>'));outer=$('<div id="fancybox-outer"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(wrap);outer.append(content=$('<div id="fancybox-content"></div>'),close=$('<a id="fancybox-close"></a>'),title=$('<div id="fancybox-title"></div>'),nav_left=$('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'),nav_right=$('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));close.click($.fancybox.close);loading.click($.fancybox.cancel);nav_left.click(function(e){e.preventDefault();$.fancybox.prev();});nav_right.click(function(e){e.preventDefault();$.fancybox.next();});if($.fn.mousewheel){wrap.bind('mousewheel.fb',function(e,delta){if(busy){e.preventDefault();}else if($(e.target).get(0).clientHeight==0||$(e.target).get(0).scrollHeight===$(e.target).get(0).clientHeight){e.preventDefault();$.fancybox[delta>0?'prev':'next']();}});}
if(!$.support.opacity){wrap.addClass('fancybox-ie');}
if(isIE6){loading.addClass('fancybox-ie6');wrap.addClass('fancybox-ie6');$('<iframe id="fancybox-hide-sel-frame" src="'+(/^https/i.test(window.location.href||'')?'javascript:void(false)':'about:blank')+'" scrolling="no" border="0" frameborder="0" tabindex="-1"></iframe>').prependTo(outer);}};$.fn.fancybox.defaults={padding:10,margin:40,opacity:false,modal:false,cyclic:false,scrolling:'auto',width:560,height:340,autoScale:true,autoDimensions:true,centerOnScroll:false,ajax:{},swf:{wmode:'transparent'},hideOnOverlayClick:false,hideOnContentClick:false,overlayShow:true,overlayOpacity:0.7,overlayColor:'#777',titleShow:true,titlePosition:'float',titleFormat:null,titleFromAlt:false,transitionIn:'fade',transitionOut:'fade',speedIn:300,speedOut:300,changeSpeed:300,changeFade:'fast',easingIn:'swing',easingOut:'swing',showCloseButton:true,showNavArrows:true,enableEscapeButton:true,enableKeyboardNav:true,onStart:function(){},onCancel:function(){},onComplete:function(){},onCleanup:function(){},onClosed:function(){},onError:function(){}};$(document).ready(function(){$.fancybox.init();});})(jQuery);;$(document).ready(function()
{$('.cart_quantity_up').unbind('click').live('click',function(){upQuantity($(this).attr('id').replace('cart_quantity_up_',''));return false;});$('.cart_quantity_down').unbind('click').live('click',function(){downQuantity($(this).attr('id').replace('cart_quantity_down_',''));return false;});$('.cart_quantity_delete').unbind('click').live('click',function(){deleteProductFromSummary($(this).attr('id'));return false;});$('.cart_quantity_input').typeWatch({highlight:true,wait:600,captureLength:0,callback:function(val){updateQty(val,true,this.el);}});$('.cart_address_delivery').live('change',function(){changeAddressDelivery($(this));});cleanSelectAddressDelivery();});function cleanSelectAddressDelivery()
{if(window.ajaxCart!==undefined)
{$.each($('.cart_address_delivery'),function(it,item)
{var options=$(item).find('option');var address_count=0;var ids=$(item).attr('id').split('_');var id_product=ids[3];var id_product_attribute=ids[4];var id_address_delivery=ids[5];$.each(options,function(i){if($(options[i]).val()>0&&($('#product_'+id_product+'_'+id_product_attribute+'_0_'+$(options[i]).val()).length==0||id_address_delivery==$(options[i]).val()))
address_count++;});if(address_count<2)
$($(item).find('option[value=-2]')).remove();else if($($(item).find('option[value=-2]')).length==0)
$(item).append($('<option value="-2">'+ShipToAnOtherAddress+'</option>'));});}}
function changeAddressDelivery(obj)
{var ids=obj.attr('id').split('_');var id_product=ids[3];var id_product_attribute=ids[4];var old_id_address_delivery=ids[5];var new_id_address_delivery=obj.val();if(new_id_address_delivery==old_id_address_delivery)
return;if(new_id_address_delivery>0)
{$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:'json',data:'controller=cart&ajax=true&changeAddressDelivery=1&summary=1&id_product='+id_product
+'&id_product_attribute='+id_product_attribute
+'&old_id_address_delivery='+old_id_address_delivery
+'&new_id_address_delivery='+new_id_address_delivery
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(typeof(jsonData.hasErrors)!='undefined'&&jsonData.hasErrors)
{alert(jsonData.error);$('#select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery).val(old_id_address_delivery);}
else
{if($('#product_'+id_product+'_'+id_product_attribute+'_0_'+new_id_address_delivery).length)
{updateCartSummary(jsonData.summary);updateCustomizedDatas(jsonData.customizedDatas);updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);if(typeof(getCarrierListAndUpdate)!=='undefined')
getCarrierListAndUpdate();$('#product_'+id_product+'_'+id_product_attribute+'_0_'+old_id_address_delivery).remove();$('.product_'+id_product+'_'+id_product_attribute+'_0_'+old_id_address_delivery).remove();}
if(window.ajaxCart!=undefined)
ajaxCart.refresh();updateAddressId(id_product,id_product_attribute,old_id_address_delivery,new_id_address_delivery);cleanSelectAddressDelivery();}}});}
else if(new_id_address_delivery==-1)
window.location=$($('.address_add a')[0]).attr('href');else if(new_id_address_delivery==-2)
{if(old_id_address_delivery==0)
{alert(txtSelectAnAddressFirst);return false;}
var id_address_delivery=0;var options=$('#select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery+' option');$.each(options,function(i){if($(options[i]).val()>0&&$(options[i]).val()!==old_id_address_delivery&&$('#product_'+id_product+'_'+id_product_attribute+'_0_'+$(options[i]).val()).length==0)
{id_address_delivery=$(options[i]).val();return false;}});$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:'json',context:obj,data:'controller=cart'
+'&ajax=true&duplicate=true&summary=true'
+'&id_product='+id_product
+'&id_product_attribute='+id_product_attribute
+'&id_address_delivery='+old_id_address_delivery
+'&new_id_address_delivery='+id_address_delivery
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(jsonData.error)
{alert(jsonData.reason);return;}
var line=$('#product_'+id_product+'_'+id_product_attribute+'_0_'+old_id_address_delivery);var new_line=line.clone();updateAddressId(id_product,id_product_attribute,old_id_address_delivery,id_address_delivery,new_line);line.after(new_line);new_line.find('input[name=quantity_'+id_product+'_'+id_product_attribute+'_0_'+old_id_address_delivery+'_hidden]').val(1);new_line.find('.cart_quantity_input').val(1);$('#select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery).val(old_id_address_delivery);$('#select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+id_address_delivery).val(id_address_delivery);cleanSelectAddressDelivery();updateCartSummary(jsonData.summary);if(window.ajaxCart!==undefined)
ajaxCart.refresh();}});}
return true;}
function updateAddressId(id_product,id_product_attribute,old_id_address_delivery,id_address_delivery,line)
{if(typeof(line)=='undefined'||line.length==0)
line=$('#product_'+id_product+'_'+id_product_attribute+'_0_'+old_id_address_delivery+', #product_'+id_product+'_'+id_product_attribute+'_nocustom_'+old_id_address_delivery);$('.product_customization_for_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery).each(function(){$(this).attr('id',$(this).attr('id').replace(/_\d+$/,'_'+id_address_delivery)).removeClass('product_customization_for_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery+' address_'+old_id_address_delivery).addClass('product_customization_for_'+id_product+'_'+id_product_attribute+'_'+id_address_delivery+' address_'+id_address_delivery);$(this).find('input[name^=quantity_]').each(function(){if(typeof($(this).attr('name'))!='undefined')
$(this).attr('name',$(this).attr('name').replace(/_\d+(_hidden|)$/,'_'+id_address_delivery));});$(this).find('a').each(function(){if(typeof($(this).attr('href'))!='undefined')
$(this).attr('href',$(this).attr('href').replace(/id_address_delivery=\d+/,'id_address_delivery='+id_address_delivery));});});line.attr('id',line.attr('id').replace(/_\d+$/,'_'+id_address_delivery)).removeClass('address_'+old_id_address_delivery).addClass('address_'+id_address_delivery).find('span[id^=cart_quantity_custom_], span[id^=total_product_price_], input[name^=quantity_], .cart_quantity_down, .cart_quantity_up, .cart_quantity_delete').each(function(){if(typeof($(this).attr('name'))!='undefined')
$(this).attr('name',$(this).attr('name').replace(/_\d+(_hidden|)$/,'_'+id_address_delivery));if(typeof($(this).attr('id'))!='undefined')
$(this).attr('id',$(this).attr('id').replace(/_\d+$/,'_'+id_address_delivery));if(typeof($(this).attr('href'))!='undefined')
$(this).attr('href',$(this).attr('href').replace(/id_address_delivery=\d+/,'id_address_delivery='+id_address_delivery));});line.find('#select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+old_id_address_delivery).attr('id','select_address_delivery_'+id_product+'_'+id_product_attribute+'_'+id_address_delivery);if(window.ajaxCart!==undefined)
{$('#cart_block_list dd, #cart_block_list dt').each(function(){if(typeof($(this).attr('id'))!='undefined')
$(this).attr('id',$(this).attr('id').replace(/_\d+$/,'_'+id_address_delivery));});}}
function updateQty(val,cart,el)
{var prefix="";if(typeof(cart)=='undefined'||cart)
prefix='#order-detail-content ';else
prefix='#fancybox-content ';var id=$(el).attr('name');var exp=new RegExp("^[0-9]+$");if(exp.test(val)==true)
{var hidden=$(prefix+'input[name='+id+'_hidden]').val();var input=$(prefix+'input[name='+id+']').val();var QtyToUp=parseInt(input)-parseInt(hidden);if(parseInt(QtyToUp)>0)
upQuantity(id.replace('quantity_',''),QtyToUp);else if(parseInt(QtyToUp)<0)
downQuantity(id.replace('quantity_',''),QtyToUp);}
else
$(prefix+'input[name='+id+']').val($(prefix+'input[name='+id+'_hidden]').val());if(typeof(getCarrierListAndUpdate)!=='undefined')
getCarrierListAndUpdate();}
function deleteProductFromSummary(id)
{var customizationId=0;var productId=0;var productAttributeId=0;var id_address_delivery=0;var ids=0;ids=id.split('_');productId=parseInt(ids[0]);if(typeof(ids[1])!=='undefined')
productAttributeId=parseInt(ids[1]);if(typeof(ids[2])!=='undefined'&&ids[2]!=='nocustom')
customizationId=parseInt(ids[2]);if(typeof(ids[3])!=='undefined')
id_address_delivery=parseInt(ids[3]);$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:'json',data:'controller=cart'
+'&ajax=true&delete=true&summary=true'
+'&id_product='+productId
+'&ipa='+productAttributeId
+'&id_address_delivery='+id_address_delivery
+((customizationId!==0)?'&id_customization='+customizationId:'')
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(jsonData.hasError)
{var errors='';for(var error in jsonData.errors)
if(error!=='indexOf')
errors+=jsonData.errors[error]+"\n";}
else
{if(jsonData.refresh)
location.reload();if(parseInt(jsonData.summary.products.length)==0)
{if(typeof(orderProcess)=='undefined'||orderProcess!=='order-opc')
document.location.href=document.location.href;else
{$('#center_column').children().each(function(){if($(this).attr('id')!=='emptyCartWarning'&&$(this).attr('class')!=='breadcrumb'&&$(this).attr('id')!=='cart_title')
{$(this).fadeOut('slow',function(){$(this).remove();});}});$('#summary_products_label').remove();$('#emptyCartWarning').fadeIn('slow');}}
else
{$('#product_'+id).fadeOut('slow',function(){$(this).remove();cleanSelectAddressDelivery();if(!customizationId)
refreshOddRow();});var exist=false;for(i=0;i<jsonData.summary.products.length;i++)
{if(jsonData.summary.products[i].id_product==productId&&jsonData.summary.products[i].id_product_attribute==productAttributeId&&jsonData.summary.products[i].id_address_delivery==id_address_delivery&&(parseInt(jsonData.summary.products[i].customization_quantity)>0))
exist=true;}
if(!exist&&customizationId)
$('#product_'+productId+'_'+productAttributeId+'_0_'+id_address_delivery).fadeOut('slow',function(){$(this).remove();var line=$('#product_'+productId+'_'+productAttributeId+'_nocustom_'+id_address_delivery);if(line.length>0)
{line.find('input[name^=quantity_], .cart_quantity_down, .cart_quantity_up, .cart_quantity_delete').each(function(){if(typeof($(this).attr('name'))!='undefined')
$(this).attr('name',$(this).attr('name').replace(/nocustom/,'0'));if(typeof($(this).attr('id'))!='undefined')
$(this).attr('id',$(this).attr('id').replace(/nocustom/,'0'));});line.find('span[id^=total_product_price_]').each(function(){$(this).attr('id',$(this).attr('id').replace(/_nocustom/,''));});line.attr('id',line.attr('id').replace(/nocustom/,'0'));}
refreshOddRow();});}
updateCartSummary(jsonData.summary);updateCustomizedDatas(jsonData.customizedDatas);updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);if(typeof(getCarrierListAndUpdate)!=='undefined'&&jsonData.summary.products.length>0)
getCarrierListAndUpdate();}},error:function(XMLHttpRequest,textStatus,errorThrown){if(textStatus!=='abort')
alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: "+XMLHttpRequest+"\n"+'Text status: '+textStatus);}});}
function refreshOddRow()
{var odd_class='odd';var even_class='even';$.each($('.cart_item'),function(i,it)
{if(i==0)
{if($(this).hasClass('even'))
{odd_class='even';even_class='odd';}
$(this).addClass('first_item');}
if(i%2)
$(this).removeClass(odd_class).addClass(even_class);else
$(this).removeClass(even_class).addClass(odd_class);});$('.cart_item:last-child, .customization:last-child').addClass('last_item');}
function upQuantity(id,qty)
{if(typeof(qty)=='undefined'||!qty)
qty=1;var customizationId=0;var productId=0;var productAttributeId=0;var id_address_delivery=0;var ids=0;ids=id.split('_');productId=parseInt(ids[0]);if(typeof(ids[1])!=='undefined')
productAttributeId=parseInt(ids[1]);if(typeof(ids[2])!=='undefined'&&ids[2]!=='nocustom')
customizationId=parseInt(ids[2]);if(typeof(ids[3])!=='undefined')
id_address_delivery=parseInt(ids[3]);$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:'json',data:'controller=cart'
+'&ajax=true'
+'&add=true'
+'&getproductprice=true'
+'&summary=true'
+'&id_product='+productId
+'&ipa='+productAttributeId
+'&id_address_delivery='+id_address_delivery
+((customizationId!==0)?'&id_customization='+customizationId:'')
+'&qty='+qty
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(jsonData.hasError)
{var errors='';for(var error in jsonData.errors)
if(error!=='indexOf')
errors+=jsonData.errors[error]+"\n";alert(errors);$('input[name=quantity_'+id+']').val($('input[name=quantity_'+id+'_hidden]').val());}
else
{if(jsonData.refresh)
location.reload();updateCartSummary(jsonData.summary);if(customizationId!==0)
updateCustomizedDatas(jsonData.customizedDatas);updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);if(typeof(getCarrierListAndUpdate)!=='undefined')
getCarrierListAndUpdate();if(typeof(updatePaymentMethodsDisplay)!=='undefined')
updatePaymentMethodsDisplay();}},error:function(XMLHttpRequest,textStatus,errorThrown){if(textStatus!=='abort')
alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: "+XMLHttpRequest+"\n"+'Text status: '+textStatus);}});}
function downQuantity(id,qty)
{var val=$('input[name=quantity_'+id+']').val();var newVal=val;if(typeof(qty)=='undefined'||!qty)
{qty=1;newVal=val-1;}
else if(qty<0)
qty=-qty;var customizationId=0;var productId=0;var productAttributeId=0;var id_address_delivery=0;var ids=0;ids=id.split('_');productId=parseInt(ids[0]);if(typeof(ids[1])!=='undefined')
productAttributeId=parseInt(ids[1]);if(typeof(ids[2])!=='undefined'&&ids[2]!=='nocustom')
customizationId=parseInt(ids[2]);if(typeof(ids[3])!=='undefined')
id_address_delivery=parseInt(ids[3]);if(newVal>0||$('#product_'+id+'_gift').length)
{$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,dataType:'json',data:'controller=cart'
+'&ajax=true'
+'&add=true'
+'&getproductprice=true'
+'&summary=true'
+'&id_product='+productId
+'&ipa='+productAttributeId
+'&id_address_delivery='+id_address_delivery
+'&op=down'
+((customizationId!==0)?'&id_customization='+customizationId:'')
+'&qty='+qty
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(jsonData.hasError)
{var errors='';for(var error in jsonData.errors)
if(error!=='indexOf')
errors+=jsonData.errors[error]+"\n";alert(errors);$('input[name=quantity_'+id+']').val($('input[name=quantity_'+id+'_hidden]').val());}
else
{if(jsonData.refresh)
location.reload();updateCartSummary(jsonData.summary);if(customizationId!==0)
updateCustomizedDatas(jsonData.customizedDatas);updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);if(newVal==0)
$('#product_'+id).hide();if(typeof(getCarrierListAndUpdate)!=='undefined')
getCarrierListAndUpdate();if(typeof(updatePaymentMethodsDisplay)!=='undefined')
updatePaymentMethodsDisplay();}},error:function(XMLHttpRequest,textStatus,errorThrown){if(textStatus!=='abort')
alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: "+XMLHttpRequest+"\n"+'Text status: '+textStatus);}});}
else
{deleteProductFromSummary(id);}}
function updateCartSummary(json)
{var i;var nbrProducts=0;var product_list=new Array();if(typeof json=='undefined')
return;$('div.error').fadeOut();for(i=0;i<json.products.length;i++)
product_list[json.products[i].id_product+'_'+json.products[i].id_product_attribute+'_'+json.products[i].id_address_delivery]=json.products[i];if(!$('.multishipping-cart:visible').length)
{for(i=0;i<json.gift_products.length;i++)
if(typeof(product_list[json.gift_products[i].id_product+'_'+json.gift_products[i].id_product_attribute+'_'+json.gift_products[i].id_address_delivery])!=='undefined')
product_list[json.gift_products[i].id_product+'_'+json.gift_products[i].id_product_attribute+'_'+json.gift_products[i].id_address_delivery].quantity-=json.gift_products[i].cart_quantity;}
else
for(i=0;i<json.gift_products.length;i++)
if(typeof(product_list[json.gift_products[i].id_product+'_'+json.gift_products[i].id_product_attribute+'_'+json.gift_products[i].id_address_delivery])=='undefined')
product_list[json.gift_products[i].id_product+'_'+json.gift_products[i].id_product_attribute+'_'+json.gift_products[i].id_address_delivery]=json.gift_products[i];for(i in product_list)
{var reduction=product_list[i].reduction_applies;var initial_price_text='';initial_price='';if(typeof(product_list[i].price_without_quantity_discount)!=='undefined')
initial_price=formatCurrency(product_list[i].price_without_quantity_discount,currencyFormat,currencySign,currencyBlank);var current_price='';if(priceDisplayMethod!==0)
current_price=formatCurrency(product_list[i].price,currencyFormat,currencySign,currencyBlank);else
current_price=formatCurrency(product_list[i].price_wt,currencyFormat,currencySign,currencyBlank);if(reduction&&typeof(initial_price)!=='undefined')
if(initial_price!==''&&product_list[i].price_without_quantity_discount>product_list[i].price)
initial_price_text='<span style="text-decoration:line-through;">'+initial_price+'</span><br />';var key_for_blockcart=product_list[i].id_product+'_'+product_list[i].id_product_attribute+'_'+product_list[i].id_address_delivery;var key_for_blockcart_nocustom=product_list[i].id_product+'_'+product_list[i].id_product_attribute+'_'+((product_list[i].quantity_without_customization!=product_list[i].quantity)?'nocustom':'0')+'_'+product_list[i].id_address_delivery;if(priceDisplayMethod!==0)
{$('#product_price_'+key_for_blockcart).html(initial_price_text+current_price);if(typeof(product_list[i].customizationQuantityTotal)!=='undefined'&&product_list[i].customizationQuantityTotal>0)
$('#total_product_price_'+key_for_blockcart).html(formatCurrency(product_list[i].total_customization,currencyFormat,currencySign,currencyBlank));else
$('#total_product_price_'+key_for_blockcart).html(formatCurrency(product_list[i].total,currencyFormat,currencySign,currencyBlank));if(product_list[i].quantity_without_customization!=product_list[i].quantity)
$('#total_product_price_'+key_for_blockcart_nocustom).html(formatCurrency(product_list[i].total,currencyFormat,currencySign,currencyBlank));}
else
{$('#product_price_'+key_for_blockcart).html(initial_price_text+current_price);if(typeof(product_list[i].customizationQuantityTotal)!=='undefined'&&product_list[i].customizationQuantityTotal>0)
$('#total_product_price_'+key_for_blockcart).html(formatCurrency(product_list[i].total_customization_wt,currencyFormat,currencySign,currencyBlank));else
$('#total_product_price_'+key_for_blockcart).html(formatCurrency(product_list[i].total_wt,currencyFormat,currencySign,currencyBlank));if(product_list[i].quantity_without_customization!=product_list[i].quantity)
$('#total_product_price_'+key_for_blockcart_nocustom).html(formatCurrency(product_list[i].total_wt,currencyFormat,currencySign,currencyBlank));}
$('input[name=quantity_'+key_for_blockcart_nocustom+']').val(product_list[i].quantity_without_customization);$('input[name=quantity_'+key_for_blockcart_nocustom+'_hidden]').val(product_list[i].quantity_without_customization);if(typeof(product_list[i].customizationQuantityTotal)!=='undefined'&&product_list[i].customizationQuantityTotal>0)
$('#cart_quantity_custom_'+key_for_blockcart).html(product_list[i].customizationQuantityTotal);nbrProducts+=parseInt(product_list[i].quantity);}
if(json.discounts.length==0)
{$('.cart_discount').each(function(){$(this).remove();});$('.cart_total_voucher').remove();}
else
{if($('.cart_discount').length==0)
location.reload();if(priceDisplayMethod!==0)
$('#total_discount').html(formatCurrency(json.total_discounts_tax_exc,currencyFormat,currencySign,currencyBlank));else
$('#total_discount').html(formatCurrency(json.total_discounts,currencyFormat,currencySign,currencyBlank));$('.cart_discount').each(function(){var idElmt=$(this).attr('id').replace('cart_discount_','');var toDelete=true;for(i=0;i<json.discounts.length;i++)
if(json.discounts[i].id_discount==idElmt)
{if(json.discounts[i].value_real!=='!')
if(priceDisplayMethod!==0)
$('#cart_discount_'+idElmt+' td.cart_discount_price span.price-discount').html(formatCurrency(json.discounts[i].value_tax_exc*-1,currencyFormat,currencySign,currencyBlank));else
$('#cart_discount_'+idElmt+' td.cart_discount_price span.price-discount').html(formatCurrency(json.discounts[i].value_real*-1,currencyFormat,currencySign,currencyBlank));toDelete=false;}
if(toDelete)
$('#cart_discount_'+idElmt+', #cart_total_voucher').fadeTo('fast',0,function(){$(this).remove();});});}
$('#cart_block_shipping_cost').show();$('#cart_block_shipping_cost').next().show();if(json.total_shipping>0)
{if(priceDisplayMethod!==0)
{$('#cart_block_shipping_cost').html(formatCurrency(json.total_shipping_tax_exc,currencyFormat,currencySign,currencyBlank));$('#cart_block_wrapping_cost').html(formatCurrency(json.total_wrapping_tax_exc,currencyFormat,currencySign,currencyBlank));$('#cart_block_total').html(formatCurrency(json.total_price_without_tax,currencyFormat,currencySign,currencyBlank));}
else
{$('#cart_block_shipping_cost').html(formatCurrency(json.total_shipping,currencyFormat,currencySign,currencyBlank));$('#cart_block_wrapping_cost').html(formatCurrency(json.total_wrapping,currencyFormat,currencySign,currencyBlank));$('#cart_block_total').html(formatCurrency(json.total_price,currencyFormat,currencySign,currencyBlank));}}
else
{if(json.carrier.id==null)
{$('#cart_block_shipping_cost').hide();$('#cart_block_shipping_cost').next().hide();}}
$('#cart_block_tax_cost').html(formatCurrency(json.total_tax,currencyFormat,currencySign,currencyBlank));$('.ajax_cart_quantity').html(nbrProducts);$('#summary_products_quantity').html(nbrProducts+' '+(nbrProducts>1?txtProducts:txtProduct));if(priceDisplayMethod!==0)
$('#total_product').html(formatCurrency(json.total_products,currencyFormat,currencySign,currencyBlank));else
$('#total_product').html(formatCurrency(json.total_products_wt,currencyFormat,currencySign,currencyBlank));$('#total_price').html(formatCurrency(json.total_price,currencyFormat,currencySign,currencyBlank));$('#total_price_without_tax').html(formatCurrency(json.total_price_without_tax,currencyFormat,currencySign,currencyBlank));$('#total_tax').html(formatCurrency(json.total_tax,currencyFormat,currencySign,currencyBlank));$('.cart_total_delivery').show();if(json.total_shipping>0)
{if(priceDisplayMethod!==0)
$('#total_shipping').html(formatCurrency(json.total_shipping_tax_exc,currencyFormat,currencySign,currencyBlank));else
$('#total_shipping').html(formatCurrency(json.total_shipping,currencyFormat,currencySign,currencyBlank));}
else
{if(json.carrier.id!=null)
$('#total_shipping').html(freeShippingTranslation);else
$('.cart_total_delivery').hide();}
if(json.free_ship>0&&!json.is_virtual_cart)
{$('.cart_free_shipping').fadeIn();$('#free_shipping').html(formatCurrency(json.free_ship,currencyFormat,currencySign,currencyBlank));}
else
$('.cart_free_shipping').hide();if(json.total_wrapping>0)
{$('#total_wrapping').html(formatCurrency(json.total_wrapping,currencyFormat,currencySign,currencyBlank));$('#total_wrapping').parent().show();}
else
{$('#total_wrapping').html(formatCurrency(json.total_wrapping,currencyFormat,currencySign,currencyBlank));$('#total_wrapping').parent().hide();}
if(window.ajaxCart!==undefined)
ajaxCart.refresh();}
function updateCustomizedDatas(json)
{for(var i in json)
for(var j in json[i])
for(var k in json[i][j])
for(var l in json[i][j][k])
{var quantity=json[i][j][k][l]['quantity'];$('input[name=quantity_'+i+'_'+j+'_'+l+'_'+k+'_hidden]').val(quantity);$('input[name=quantity_'+i+'_'+j+'_'+l+'_'+k+']').val(quantity);}}
function updateHookShoppingCart(html)
{$('#HOOK_SHOPPING_CART').html(html);}
function updateHookShoppingCartExtra(html)
{$('#HOOK_SHOPPING_CART_EXTRA').html(html);}
function refreshDeliveryOptions()
{$.each($('.delivery_option_radio'),function(){if($(this).prop('checked'))
{if($(this).parent().find('.delivery_option_carrier.not-displayable').length==0)
$(this).parent().find('.delivery_option_carrier').show();var carrier_id_list=$(this).val().split(',');carrier_id_list.pop();var it=this;$(carrier_id_list).each(function(){$(it).parent().find('input[value="'+this.toString()+'"]').change();});}
else
$(this).parent().find('.delivery_option_carrier').hide();});}
$(document).ready(function(){refreshDeliveryOptions();$('.delivery_option_radio').live('change',function(){refreshDeliveryOptions();});$('#allow_seperated_package').live('click',function(){$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseUri+'?rand='+new Date().getTime(),async:true,cache:false,data:'controller=cart&ajax=true&allowSeperatedPackage=true&value='
+($(this).prop('checked')?'1':'0')
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{if(typeof(getCarrierListAndUpdate)!=='undefined')
getCarrierListAndUpdate();}});});$('#gift').checkboxChange(function(){$('#gift_div').show('slow');},function(){$('#gift_div').hide('slow');});$('#enable-multishipping').checkboxChange(function(){$('.standard-checkout').hide(0);$('.multishipping-checkout').show(0);},function(){$('.standard-checkout').show(0);$('.multishipping-checkout').hide(0);});});function updateExtraCarrier(id_delivery_option,id_address)
{var url="";if(typeof(orderOpcUrl)!=='undefined')
url=orderOpcUrl;else
url=orderUrl;$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:url+'?rand='+new Date().getTime(),async:true,cache:false,dataType:"json",data:'ajax=true'
+'&method=updateExtraCarrier'
+'&id_address='+id_address
+'&id_delivery_option='+id_delivery_option
+'&token='+static_token
+'&allow_refresh=1',success:function(jsonData)
{$('#HOOK_EXTRACARRIER_'+id_address).html(jsonData['content']);}});};(function(jQuery){jQuery.fn.typeWatch=function(o){var options=jQuery.extend({wait:750,callback:function(){},highlight:true,captureLength:2},o);function checkElement(timer,override){var elTxt=jQuery(timer.el).val();if((elTxt.length>options.captureLength&&elTxt.toUpperCase()!=timer.text)||(override&&elTxt.length>options.captureLength)){timer.text=elTxt.toUpperCase();timer.cb(elTxt);}};function watchElement(elem){if(elem.type.toUpperCase()=="TEXT"||elem.nodeName.toUpperCase()=="TEXTAREA"){var timer={timer:null,text:jQuery(elem).val().toUpperCase(),cb:options.callback,el:elem,wait:options.wait};if(options.highlight){jQuery(elem).focus(function(){this.select();});}
var startWatch=function(evt){var timerWait=timer.wait;var overrideBool=false;if(evt.keyCode==13&&this.type.toUpperCase()=="TEXT"){timerWait=1;overrideBool=true;}
var timerCallbackFx=function()
{checkElement(timer,overrideBool);}
clearTimeout(timer.timer);timer.timer=setTimeout(timerCallbackFx,timerWait);};jQuery(elem).keydown(startWatch);}};return this.each(function(index){watchElement(this);});};})(jQuery);;function PS_SE_HandleEvent()
{$(document).ready(function(){$('#id_country').change(function(){resetAjaxQueries();updateStateByIdCountry();});if(SE_RefreshMethod==0)
{$('#id_state').change(function(){resetAjaxQueries();updateCarriersList();});$('#zipcode').bind('blur keyup',function(e){if(e.type=='blur'||e.keyCode=='13')
{resetAjaxQueries();updateCarriersList();}});}
$('#update_carriers_list').click(function(){updateCarriersList();});$('#carriercompare_submit').click(function(){resetAjaxQueries();saveSelection();return false;});updateStateByIdCountry();});}
function displayWaitingAjax(type,message)
{$('#SE_AjaxDisplay').find('p').html(message);$('#SE_AjaxDisplay').css('display',type);}
function updateStateByIdCountry()
{$('#id_state').children().remove();$('#availableCarriers').slideUp('fast');$('#states').slideUp('fast');displayWaitingAjax('block',SE_RefreshStateTS);var query=$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseDir+'modules/carriercompare/ajax.php'+'?rand='+new Date().getTime(),data:'method=getStates&id_country='+$('#id_country').val(),dataType:'json',success:function(json){if(json.length)
{for(state in json)
{$('#id_state').append('<option value=\''+json[state].id_state+'\' '+(id_state==json[state].id_state?'selected="selected"':'')+'>'+json[state].name+'</option>');}
$('#states').slideDown('fast');}
if(SE_RefreshMethod==0)
updateCarriersList();displayWaitingAjax('none','');}});ajaxQueries.push(query);}
function updateCarriersList()
{$('#carriercompare_errors_list').children().remove();$('#availableCarriers').slideUp('normal',function(){$(this).find(('tbody')).children().remove();$('#noCarrier').slideUp('fast');displayWaitingAjax('block',SE_RetrievingInfoTS);var query=$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseDir+'modules/carriercompare/ajax.php'+'?rand='+new Date().getTime(),data:'method=getCarriers&id_country='+$('#id_country').val()+'&id_state='+$('#id_state').val()+'&zipcode='+$('#zipcode').val(),dataType:'json',success:function(json){if(json.length)
{for(carrier in json)
{var html='<tr class="'+(carrier%2?'alternate_':'')+'item">'+'<td class="carrier_action radio">'+'<input type="radio" name="id_carrier" value="'+json[carrier].id_carrier+'" id="id_carrier'+json[carrier].id_carrier+'" '+(id_carrier==json[carrier].id_carrier?'checked="checked"':'')+'/>'+'</td>'+'<td class="carrier_name">'+'<label for="id_carrier'+json[carrier].id_carrier+'">'+
(json[carrier].img?'<img src="'+json[carrier].img+'" alt="'+json[carrier].name+'" />':json[carrier].name)+'</label>'+'</td>'+'<td class="carrier_infos">'+((json[carrier].delay!=null)?json[carrier].delay:'')+'</td>'+'<td class="carrier_price">';if(json[carrier].price)
{html+='<span class="price">'+(displayPrice==1?formatCurrency(json[carrier].price_tax_exc,currencyFormat,currencySign,currencyBlank):formatCurrency(json[carrier].price,currencyFormat,currencySign,currencyBlank))+'</span>';}
else
{html+=txtFree;}
html+='</td>'+'</tr>';$('#carriers_list').append(html);}
displayWaitingAjax('none','');$('#availableCarriers').slideDown();}
else
{displayWaitingAjax('none','');$('#noCarrier').slideDown();}}});ajaxQueries.push(query);});}
function saveSelection()
{$('#carriercompare_errors').slideUp();$('#carriercompare_errors_list').children().remove();displayWaitingAjax('block',SE_RedirectTS);var query=$.ajax({type:'POST',headers:{"cache-control":"no-cache"},url:baseDir+'modules/carriercompare/ajax.php'+'?rand='+new Date().getTime(),data:'method=saveSelection&'+$('#compare_shipping_form').serialize(),dataType:'json',success:function(json){if(json.length)
{for(error in json)
$('#carriercompare_errors_list').append('<li>'+json[error]+'</li>');$('#carriercompare_errors').slideDown();displayWaitingAjax('none','');}
else
{$('.SE_SubmitRefreshCard').fadeOut('fast');location.reload(true);}}});ajaxQueries.push(query);return false;}
var ajaxQueries=new Array();function resetAjaxQueries()
{for(i=0;i<ajaxQueries.length;++i)
ajaxQueries[i].abort();ajaxQueries=new Array();};if(typeof baseUri==="undefined"&&typeof baseDir!=="undefined")
baseUri=baseDir;var ajaxCart={nb_total_products:0,overrideButtonsInThePage:function(){$('.ajax_add_to_cart_button').unbind('click').click(function(){var idProduct=$(this).attr('rel').replace('ajax_id_product_','');if($(this).attr('disabled')!='disabled')
ajaxCart.add(idProduct,null,false,this);return false;});$('#add_to_cart input').unbind('click').click(function(){ajaxCart.add($('#product_page_product_id').val(),$('#idCombination').val(),true,null,$('#quantity_wanted').val(),null);return false;});$('#cart_block_list .ajax_cart_block_remove_link').unbind('click').click(function(){var customizationId=0;var productId=0;var productAttributeId=0;if($($(this).parent().parent()).attr('name')=='customization')
var customizableProductDiv=$($(this).parent().parent()).find("div[id^=deleteCustomizableProduct_]");else
var customizableProductDiv=$($(this).parent()).find("div[id^=deleteCustomizableProduct_]");if(customizableProductDiv&&$(customizableProductDiv).length)
{$(customizableProductDiv).each(function(){var ids=$(this).attr('id').split('_');if(typeof(ids[1])!='undefined')
{customizationId=parseInt(ids[1]);productId=parseInt(ids[2]);if(typeof(ids[3])!='undefined')
productAttributeId=parseInt(ids[3]);return false;}});}
if(!customizationId)
{var firstCut=$(this).parent().parent().attr('id').replace('cart_block_product_','');firstCut=firstCut.replace('deleteCustomizableProduct_','');ids=firstCut.split('_');productId=parseInt(ids[0]);if(typeof(ids[1])!='undefined')
productAttributeId=parseInt(ids[1]);}
var idAddressDelivery=$(this).parent().parent().attr('id').match(/.*_\d+_\d+_(\d+)/)[1];ajaxCart.remove(productId,productAttributeId,customizationId,idAddressDelivery);return false;});},expand:function(){if($('#cart_block_list').hasClass('collapsed'))
{$('#cart_block_summary').slideUp(200,function(){$(this).addClass('collapsed').removeClass('expanded');$('#cart_block_list').slideDown({duration:450,complete:function(){$(this).addClass('expanded').removeClass('collapsed');}});});$('#block_cart_expand').fadeOut('slow',function(){$('#block_cart_collapse').fadeIn('fast');});$.ajax({type:'GET',url:baseDir+'modules/blockcart/blockcart-set-collapse.php',async:true,data:'ajax_blockcart_display=expand'+'&rand='+new Date().getTime()});}},refresh:function(){$.ajax({type:'GET',url:baseUri,async:true,cache:false,dataType:"json",data:'controller=cart&ajax=true&token='+static_token,success:function(jsonData)
{ajaxCart.updateCart(jsonData);}});},collapse:function(){if($('#cart_block_list').hasClass('expanded'))
{$('#cart_block_list').slideUp('slow',function(){$(this).addClass('collapsed').removeClass('expanded');$('#cart_block_summary').slideDown(450,function(){$(this).addClass('expanded').removeClass('collapsed');});});$('#block_cart_collapse').fadeOut('slow',function(){$('#block_cart_expand').fadeIn('fast');});$.ajax({type:'GET',url:baseDir+'modules/blockcart/blockcart-set-collapse.php',async:true,data:'ajax_blockcart_display=collapse'+'&rand='+new Date().getTime()});}},updateCartInformation:function(jsonData,addedFromProductPage)
{ajaxCart.updateCart(jsonData);if(addedFromProductPage)
$('#add_to_cart input').removeAttr('disabled').addClass('exclusive').removeClass('exclusive_disabled');else
$('.ajax_add_to_cart_button').removeAttr('disabled');},add:function(idProduct,idCombination,addedFromProductPage,callerElement,quantity,whishlist){if(addedFromProductPage&&!checkCustomizations())
{alert(fieldRequired);return;}
emptyCustomizations();if(addedFromProductPage)
{$('#add_to_cart input').attr('disabled',true).removeClass('exclusive').addClass('exclusive_disabled');$('.filled').removeClass('filled');}
else
$(callerElement).attr('disabled',true);if($('#cart_block_list').hasClass('collapsed'))
this.expand();$.ajax({type:'POST',url:baseUri,async:true,cache:false,dataType:"json",data:'controller=cart&add=1&ajax=true&qty='+((quantity&&quantity!=null)?quantity:'1')+'&id_product='+idProduct+'&token='+static_token+((parseInt(idCombination)&&idCombination!=null)?'&ipa='+parseInt(idCombination):''),success:function(jsonData,textStatus,jqXHR)
{if(whishlist&&!jsonData.errors)
WishlistAddProductCart(whishlist[0],idProduct,idCombination,whishlist[1]);var $element=$(callerElement).parent().parent().find('a.product_image img,a.product_img_link img');if(!$element.length)
$element=$('#bigpic');var $picture=$element.clone();var pictureOffsetOriginal=$element.offset();if($picture.size())
$picture.css({'position':'absolute','top':pictureOffsetOriginal.top,'left':pictureOffsetOriginal.left});var pictureOffset=$picture.offset();if($('#cart_block').offset().top&&$('#cart_block').offset().left)
var cartBlockOffset=$('#cart_block').offset();else
var cartBlockOffset=$('#shopping_cart').offset();if(cartBlockOffset!=undefined&&$picture.size())
{$picture.appendTo('body');$picture.css({'position':'absolute','top':$picture.css('top'),'left':$picture.css('left'),'z-index':4242}).animate({'width':$element.attr('width')*0.66,'height':$element.attr('height')*0.66,'opacity':0.2,'top':cartBlockOffset.top+30,'left':cartBlockOffset.left+15},1000).fadeOut(100,function(){ajaxCart.updateCartInformation(jsonData,addedFromProductPage);});}
else
ajaxCart.updateCartInformation(jsonData,addedFromProductPage);},error:function(XMLHttpRequest,textStatus,errorThrown)
{alert("Impossible to add the product to the cart.\n\ntextStatus: '"+textStatus+"'\nerrorThrown: '"+errorThrown+"'\nresponseText:\n"+XMLHttpRequest.responseText);if(addedFromProductPage)
$('#add_to_cart input').removeAttr('disabled').addClass('exclusive').removeClass('exclusive_disabled');else
$(callerElement).removeAttr('disabled');}});},remove:function(idProduct,idCombination,customizationId,idAddressDelivery){$.ajax({type:'POST',url:baseUri,async:true,cache:false,dataType:"json",data:'controller=cart&delete=1&id_product='+idProduct+'&ipa='+((idCombination!=null&&parseInt(idCombination))?idCombination:'')+((customizationId&&customizationId!=null)?'&id_customization='+customizationId:'')+'&id_address_delivery='+idAddressDelivery+'&token='+static_token+'&ajax=true',success:function(jsonData){ajaxCart.updateCart(jsonData);if($('body').attr('id')=='order'||$('body').attr('id')=='order-opc')
deleteProductFromSummary(idProduct+'_'+idCombination+'_'+customizationId+'_'+idAddressDelivery);},error:function(){alert('ERROR: unable to delete the product');}});},hideOldProducts:function(jsonData){if($('#cart_block_list dl.products').length>0)
{var removedProductId=null;var removedProductData=null;var removedProductDomId=null;$('#cart_block_list dl.products dt').each(function(){var domIdProduct=$(this).attr('id');var firstCut=domIdProduct.replace('cart_block_product_','');var ids=firstCut.split('_');var stayInTheCart=false;for(aProduct in jsonData.products)
{if(jsonData.products[aProduct]['id']==ids[0]&&(!ids[1]||jsonData.products[aProduct]['idCombination']==ids[1]))
{stayInTheCart=true;ajaxCart.hideOldProductCustomizations(jsonData.products[aProduct],domIdProduct);}}
if(!stayInTheCart)
{removedProductId=$(this).attr('id');if(removedProductId!=null)
{var firstCut=removedProductId.replace('cart_block_product_','');var ids=firstCut.split('_');$('#'+removedProductId).addClass('strike').fadeTo('slow',0,function(){$(this).slideUp('slow',function(){$(this).remove();if($('#cart_block dl.products dt').length==0)
{$("#header #cart_block").stop(true,true).slideUp(200);$('#cart_block_no_products:hidden').slideDown(450);$('#cart_block dl.products').remove();}});});$('#cart_block_combination_of_'+ids[0]+(ids[1]?'_'+ids[1]:'')+(ids[2]?'_'+ids[2]:'')).fadeTo('fast',0,function(){$(this).slideUp('fast',function(){$(this).remove();});});}}});}},hideOldProductCustomizations:function(product,domIdProduct)
{var customizationList=$('#customization_'+product['id']+'_'+product['idCombination']);if(customizationList.length>0)
{$(customizationList).find("li").each(function(){$(this).find("div").each(function(){var customizationDiv=$(this).attr('id');var tmp=customizationDiv.replace('deleteCustomizableProduct_','');var ids=tmp.split('_');if((parseInt(product.idCombination)==parseInt(ids[2]))&&!ajaxCart.doesCustomizationStillExist(product,ids[0]))
$('#'+customizationDiv).parent().addClass('strike').fadeTo('slow',0,function(){$(this).slideUp('slow');$(this).remove();});});});}
var removeLinks=$('#cart_block_product_'+domIdProduct).find('a.ajax_cart_block_remove_link');if(!product.hasCustomizedDatas&&!removeLinks.length)
$('#'+domIdProduct+' span.remove_link').html('<a class="ajax_cart_block_remove_link" rel="nofollow" href="'+baseUri+'?controller=cart&amp;delete&amp;id_product='+product['id']+'&amp;ipa='+product['idCombination']+'&amp;token='+static_token+'"> </a>');if(parseFloat(product.price_float)<=0)
$('#'+domIdProduct+' span.remove_link').html('');},doesCustomizationStillExist:function(product,customizationId)
{var exists=false;$(product.customizedDatas).each(function(){if(this.customizationId==customizationId)
{exists=true;return false;}});return(exists);},refreshVouchers:function(jsonData){if(typeof(jsonData.discounts)=='undefined'||jsonData.discounts.length==0)
$('#vouchers').hide();else
{$('#vouchers tbody').html('');for(i=0;i<jsonData.discounts.length;i++)
{if(parseFloat(jsonData.discounts[i].price_float)>0)
{var delete_link='';if(jsonData.discounts[i].code.length)
delete_link='<a class="delete_voucher" href="'+jsonData.discounts[i].link+'" title="'+delete_txt+'"><img src="'+img_dir+'icon/delete.gif" alt="'+delete_txt+'" class="icon" /></a>';$('#vouchers tbody').append($('<tr class="bloc_cart_voucher" id="bloc_cart_voucher_'+jsonData.discounts[i].id+'">'
+' <td class="quantity">1x</td>'
+' <td class="name" title="'+jsonData.discounts[i].description+'">'+jsonData.discounts[i].name+'</td>'
+' <td class="price">-'+jsonData.discounts[i].price+'</td>'
+' <td class="delete">'+delete_link+'</td>'
+'</tr>'));}}
$('#vouchers').show();}},updateProductQuantity:function(product,quantity){$('#cart_block_product_'+product.id+'_'+(product.idCombination?product.idCombination:'0')+'_'+(product.idAddressDelivery?product.idAddressDelivery:'0')+' .quantity').fadeTo('fast',0,function(){$(this).text(quantity);$(this).fadeTo('fast',1,function(){$(this).fadeTo('fast',0,function(){$(this).fadeTo('fast',1,function(){$(this).fadeTo('fast',0,function(){$(this).fadeTo('fast',1);});});});});});},displayNewProducts:function(jsonData){$(jsonData.products).each(function(){if(this.id!=undefined)
{if($('#cart_block dl.products').length==0)
{$('#cart_block_no_products').before('<dl class="products"></dl>');$('#cart_block_no_products').hide();}
var domIdProduct=this.id+'_'+(this.idCombination?this.idCombination:'0')+'_'+(this.idAddressDelivery?this.idAddressDelivery:'0');var domIdProductAttribute=this.id+'_'+(this.idCombination?this.idCombination:'0');if($('#cart_block_product_'+domIdProduct).length==0)
{var productId=parseInt(this.id);var productAttributeId=(this.hasAttributes?parseInt(this.attributes):0);var content='<dt class="hidden" id="cart_block_product_'+domIdProduct+'">';content+='<span class="quantity-formated"><span class="quantity">'+this.quantity+'</span>x</span>';var name=(this.name.length>12?this.name.substring(0,10)+'...':this.name);content+='<a href="'+this.link+'" title="'+this.name+'">'+name+'</a>';if(parseFloat(this.price_float)>0)
content+='<span class="remove_link"><a rel="nofollow" class="ajax_cart_block_remove_link" href="'+baseUri+'?controller=cart&amp;delete&amp;id_product='+productId+'&amp;token='+static_token+(this.hasAttributes?'&amp;ipa='+parseInt(this.idCombination):'')+'"> </a></span>';else
content+='<span class="remove_link"></span>';if(typeof(freeShippingTranslation)!='undefined')
content+='<span class="price">'+(parseFloat(this.price_float)>0?this.priceByLine:freeProductTranslation)+'</span>';content+='</dt>';if(this.hasAttributes)
content+='<dd id="cart_block_combination_of_'+domIdProduct+'" class="hidden"><a href="'+this.link+'" title="'+this.name+'">'+this.attributes+'</a>';if(this.hasCustomizedDatas)
content+=ajaxCart.displayNewCustomizedDatas(this);if(this.hasAttributes)content+='</dd>';$('#cart_block dl.products').append(content);}
else
{var jsonProduct=this;if($('#cart_block_product_'+domIdProduct+' .quantity').text()!=jsonProduct.quantity||$('dt#cart_block_product_'+domIdProduct+' .price').text()!=jsonProduct.priceByLine)
{if(parseFloat(this.price_float)>0)
$('#cart_block_product_'+domIdProduct+' .price').text(jsonProduct.priceByLine);else
$('#cart_block_product_'+domIdProduct+' .price').html(freeProductTranslation);ajaxCart.updateProductQuantity(jsonProduct,jsonProduct.quantity);if(jsonProduct.hasCustomizedDatas)
{customizationFormatedDatas=ajaxCart.displayNewCustomizedDatas(jsonProduct);if(!$('#customization_'+domIdProductAttribute).length)
{if(jsonProduct.hasAttributes)
$('#cart_block_combination_of_'+domIdProduct).append(customizationFormatedDatas);else
$('#cart_block dl.products').append(customizationFormatedDatas);}
else
{$('#customization_'+domIdProductAttribute).html('');$('#customization_'+domIdProductAttribute).append(customizationFormatedDatas);}}}}
$('#cart_block dl.products .hidden').slideDown(450).removeClass('hidden');var removeLinks=$('#cart_block_product_'+domIdProduct).find('a.ajax_cart_block_remove_link');if(this.hasCustomizedDatas&&removeLinks.length)
$(removeLinks).each(function(){$(this).remove();});}});},displayNewCustomizedDatas:function(product)
{var content='';var productId=parseInt(product.id);var productAttributeId=typeof(product.idCombination)=='undefined'?0:parseInt(product.idCombination);var hasAlreadyCustomizations=$('#customization_'+productId+'_'+productAttributeId).length;if(!hasAlreadyCustomizations)
{if(!product.hasAttributes)
content+='<dd id="cart_block_combination_of_'+productId+'" class="hidden">';if($('#customization_'+productId+'_'+productAttributeId).val()==undefined)
content+='<ul class="cart_block_customizations" id="customization_'+productId+'_'+productAttributeId+'">';}
$(product.customizedDatas).each(function(){var done=0;customizationId=parseInt(this.customizationId);productAttributeId=typeof(product.idCombination)=='undefined'?0:parseInt(product.idCombination);content+='<li name="customization"><div class="deleteCustomizableProduct" id="deleteCustomizableProduct_'+customizationId+'_'+productId+'_'+(productAttributeId?productAttributeId:'0')+'"><a  rel="nofollow" class="ajax_cart_block_remove_link" href="'+baseUri+'?controller=cart&amp;delete&amp;id_product='+productId+'&amp;ipa='+productAttributeId+'&amp;id_customization='+customizationId+'&amp;token='+static_token+'"> </a></div><span class="quantity-formated"><span class="quantity">'+parseInt(this.quantity)+'</span>x</span>';$(this.datas).each(function(){if(this['type']==CUSTOMIZE_TEXTFIELD)
{$(this.datas).each(function(){if(this['index']==0)
{content+=' '+this.truncatedValue.replace(/<br \/>/g,' ');done=1;return false;}})}});if(!done)
content+=customizationIdMessage+customizationId;if(!hasAlreadyCustomizations)content+='</li>';if(customizationId)
{$('#uploadable_files li div.customizationUploadBrowse img').remove();$('#text_fields input').attr('value','');}});if(!hasAlreadyCustomizations)
{content+='</ul>';if(!product.hasAttributes)content+='</dd>';}
return(content);},updateCart:function(jsonData){if(jsonData.hasError)
{var errors='';for(error in jsonData.errors)
if(error!='indexOf')
errors+=jsonData.errors[error]+"\n";alert(errors);}
else
{ajaxCart.updateCartEverywhere(jsonData);ajaxCart.hideOldProducts(jsonData);ajaxCart.displayNewProducts(jsonData);ajaxCart.refreshVouchers(jsonData);$('#cart_block .products dt').removeClass('first_item').removeClass('last_item').removeClass('item');$('#cart_block .products dt:first').addClass('first_item');$('#cart_block .products dt:not(:first,:last)').addClass('item');$('#cart_block .products dt:last').addClass('last_item');ajaxCart.overrideButtonsInThePage();}},updateCartEverywhere:function(jsonData){$('.ajax_cart_total').text(jsonData.productTotal);if(parseFloat(jsonData.shippingCostFloat)>0||jsonData.nbTotalProducts<1)
$('.ajax_cart_shipping_cost').text(jsonData.shippingCost);else if(typeof(freeShippingTranslation)!='undefined')
$('.ajax_cart_shipping_cost').html(freeShippingTranslation);$('.ajax_cart_tax_cost').text(jsonData.taxCost);$('.cart_block_wrapping_cost').text(jsonData.wrappingCost);$('.ajax_block_cart_total').text(jsonData.total);this.nb_total_products=jsonData.nbTotalProducts;if(parseInt(jsonData.nbTotalProducts)>0)
{$('.ajax_cart_no_product').hide();$('.ajax_cart_quantity').text(jsonData.nbTotalProducts);$('.ajax_cart_quantity').fadeIn('slow');$('.ajax_cart_total').fadeIn('slow');if(parseInt(jsonData.nbTotalProducts)>1)
{$('.ajax_cart_product_txt').each(function(){$(this).hide();});$('.ajax_cart_product_txt_s').each(function(){$(this).show();});}
else
{$('.ajax_cart_product_txt').each(function(){$(this).show();});$('.ajax_cart_product_txt_s').each(function(){$(this).hide();});}}
else
{$('.ajax_cart_quantity, .ajax_cart_product_txt_s, .ajax_cart_product_txt, .ajax_cart_total').each(function(){$(this).hide();});$('.ajax_cart_no_product').show('slow');}}};function HoverWatcher(selector){this.hovering=false;var self=this;this.isHoveringOver=function(){return self.hovering;}
$(selector).hover(function(){self.hovering=true;},function(){self.hovering=false;})}
$(document).ready(function(){$('#block_cart_collapse').click(function(){ajaxCart.collapse();});$('#block_cart_expand').click(function(){ajaxCart.expand();});ajaxCart.overrideButtonsInThePage();ajaxCart.refresh();var cart_block=new HoverWatcher('#header #cart_block');var shopping_cart=new HoverWatcher('#shopping_cart');$("#shopping_cart a:first").hover(function(){$(this).css('border-radius','3px 3px 0px 0px');if(ajaxCart.nb_total_products>0)
$("#header #cart_block").stop(true,true).slideDown(450);},function(){$('#shopping_cart a').css('border-radius','3px');setTimeout(function(){if(!shopping_cart.isHoveringOver()&&!cart_block.isHoveringOver())
$("#header #cart_block").stop(true,true).slideUp(450);},200);});$("#cart_block").hover(function(){$('#shopping_cart a').css('border-radius','3px 3px 0px 0px');},function(){$('#shopping_cart a').css('border-radius','3px');setTimeout(function(){if(!shopping_cart.isHoveringOver())
$("#header #cart_block").stop(true,true).slideUp(450);},200);});$('.delete_voucher').live('click',function(){$.ajax({url:$(this).attr('href')});$(this).parent().parent().remove();if($('body').attr('id')=='order'||$('body').attr('id')=='order-opc')
{if(typeof(updateAddressSelection)!='undefined')
updateAddressSelection();else
location.reload();}
return false;});});;function openBranch(jQueryElement,noAnimation){jQueryElement.addClass('OPEN').removeClass('CLOSE');if(noAnimation)
jQueryElement.parent().find('ul:first').show();else
jQueryElement.parent().find('ul:first').slideDown();}
function closeBranch(jQueryElement,noAnimation){jQueryElement.addClass('CLOSE').removeClass('OPEN');if(noAnimation)
jQueryElement.parent().find('ul:first').hide();else
jQueryElement.parent().find('ul:first').slideUp();}
function toggleBranch(jQueryElement,noAnimation){if(jQueryElement.hasClass('OPEN'))
closeBranch(jQueryElement,noAnimation);else
openBranch(jQueryElement,noAnimation);}
$(document).ready(function(){if(!$('ul.tree.dhtml').hasClass('dynamized'))
{$('ul.tree.dhtml ul').prev().before("<span class='grower OPEN'> </span>");$('ul.tree.dhtml ul li:last-child, ul.tree.dhtml li:last-child').addClass('last');$('ul.tree.dhtml span.grower.OPEN').addClass('CLOSE').removeClass('OPEN').parent().find('ul:first').hide();$('ul.tree.dhtml').show();$('ul.tree.dhtml .selected').parents().each(function(){if($(this).is('ul'))
toggleBranch($(this).prev().prev(),true);});toggleBranch($('ul.tree.dhtml .selected').prev(),true);$('ul.tree.dhtml span.grower').click(function(){toggleBranch($(this));});$('ul.tree.dhtml').addClass('dynamized');$('ul.tree.dhtml').removeClass('dhtml');}});;;(function($){$.fn.extend({autocomplete:function(urlOrData,options){var isUrl=typeof urlOrData=="string";options=$.extend({},$.Autocompleter.defaults,{url:isUrl?urlOrData:null,data:isUrl?null:urlOrData,delay:isUrl?$.Autocompleter.defaults.delay:10,max:options&&!options.scroll?10:150},options);options.highlight=options.highlight||function(value){return value;};options.formatMatch=options.formatMatch||options.formatItem;return this.each(function(){new $.Autocompleter(this,options);});},result:function(handler){return this.bind("result",handler);},search:function(handler){return this.trigger("search",[handler]);},flushCache:function(){return this.trigger("flushCache");},setOptions:function(options){return this.trigger("setOptions",[options]);},unautocomplete:function(){return this.trigger("unautocomplete");}});$.Autocompleter=function(input,options){var KEY={UP:38,DOWN:40,DEL:46,TAB:9,RETURN:13,ESC:27,COMMA:188,PAGEUP:33,PAGEDOWN:34,BACKSPACE:8};var $input=$(input).attr("autocomplete","off").addClass(options.inputClass);var timeout;var previousValue="";var cache=$.Autocompleter.Cache(options);var hasFocus=0;var lastKeyPressCode;var config={mouseDownOnSelect:false};var select=$.Autocompleter.Select(options,input,selectCurrent,config);var blockSubmit;$.browser.opera&&$(input.form).bind("submit.autocomplete",function(){if(blockSubmit){blockSubmit=false;return false;}});$input.bind(($.browser.opera?"keypress":"keydown")+".autocomplete",function(event){lastKeyPressCode=event.keyCode;switch(event.keyCode){case KEY.UP:event.preventDefault();if(select.visible()){select.prev();}else{onChange(0,true);}
break;case KEY.DOWN:event.preventDefault();if(select.visible()){select.next();}else{onChange(0,true);}
break;case KEY.PAGEUP:event.preventDefault();if(select.visible()){select.pageUp();}else{onChange(0,true);}
break;case KEY.PAGEDOWN:event.preventDefault();if(select.visible()){select.pageDown();}else{onChange(0,true);}
break;case options.multiple&&$.trim(options.multipleSeparator)==","&&KEY.COMMA:case KEY.TAB:case KEY.RETURN:if(selectCurrent()){event.preventDefault();blockSubmit=true;return false;}
break;case KEY.ESC:select.hide();break;default:clearTimeout(timeout);timeout=setTimeout(onChange,options.delay);break;}}).focus(function(){hasFocus++;}).blur(function(){hasFocus=0;if(!config.mouseDownOnSelect){hideResults();}}).click(function(){if(hasFocus++>1&&!select.visible()){onChange(0,true);}}).bind("search",function(){var fn=(arguments.length>1)?arguments[1]:null;function findValueCallback(q,data){var result;if(data&&data.length){for(var i=0;i<data.length;i++){if(data[i].result.toLowerCase()==q.toLowerCase()){result=data[i];break;}}}
if(typeof fn=="function")fn(result);else $input.trigger("result",result&&[result.data,result.value]);}
$.each(trimWords($input.val()),function(i,value){request(value,findValueCallback,findValueCallback);});}).bind("flushCache",function(){cache.flush();}).bind("setOptions",function(){$.extend(options,arguments[1]);if("data"in arguments[1])
cache.populate();}).bind("unautocomplete",function(){select.unbind();$input.unbind();$(input.form).unbind(".autocomplete");});function selectCurrent(){var selected=select.selected();if(!selected)
return false;var v=selected.result;previousValue=v;if(options.multiple){var words=trimWords($input.val());if(words.length>1){v=words.slice(0,words.length-1).join(options.multipleSeparator)+options.multipleSeparator+v;}
v+=options.multipleSeparator;}
$input.val(v);hideResultsNow();$input.trigger("result",[selected.data,selected.value]);return true;}
function onChange(crap,skipPrevCheck){if(lastKeyPressCode==KEY.DEL){select.hide();return;}
var currentValue=$input.val();if(!skipPrevCheck&&currentValue==previousValue)
return;previousValue=currentValue;currentValue=lastWord(currentValue);if(currentValue.length>=options.minChars){$input.addClass(options.loadingClass);if(!options.matchCase)
currentValue=currentValue.toLowerCase();request(currentValue,receiveData,hideResultsNow);}else{stopLoading();select.hide();}};function trimWords(value){if(!value){return[""];}
var words=value.split(options.multipleSeparator);var result=[];$.each(words,function(i,value){if($.trim(value))
result[i]=$.trim(value);});return result;}
function lastWord(value){if(!options.multiple)
return value;var words=trimWords(value);return words[words.length-1];}
function autoFill(q,sValue){if(options.autoFill&&(lastWord($input.val()).toLowerCase()==q.toLowerCase())&&lastKeyPressCode!=KEY.BACKSPACE){$input.val($input.val()+sValue.substring(lastWord(previousValue).length));$.Autocompleter.Selection(input,previousValue.length,previousValue.length+sValue.length);}};function hideResults(){clearTimeout(timeout);timeout=setTimeout(hideResultsNow,200);};function hideResultsNow(){var wasVisible=select.visible();select.hide();clearTimeout(timeout);stopLoading();if(options.mustMatch){$input.search(function(result){if(!result){if(options.multiple){var words=trimWords($input.val()).slice(0,-1);$input.val(words.join(options.multipleSeparator)+(words.length?options.multipleSeparator:""));}
else
$input.val("");}});}
if(wasVisible)
$.Autocompleter.Selection(input,input.value.length,input.value.length);};function receiveData(q,data){if(data&&data.length&&hasFocus){stopLoading();select.display(data,q);autoFill(q,data[0].value);select.show();}else{hideResultsNow();}};function request(term,success,failure){if(!options.matchCase)
term=term.toLowerCase();var data=cache.load(term);if(data&&data.length){success(term,data);}else if((typeof options.url=="string")&&(options.url.length>0)){var extraParams={timestamp:+new Date()};$.each(options.extraParams,function(key,param){extraParams[key]=typeof param=="function"?param():param;});$.ajax({mode:"abort",port:"autocomplete"+input.name,dataType:options.dataType,url:options.url,data:$.extend({q:lastWord(term),limit:options.max},extraParams),success:function(data){var parsed=options.parse&&options.parse(data)||parse(data);cache.add(term,parsed);success(term,parsed);}});}else{select.emptyList();failure(term);}};function parse(data){var parsed=[];var rows=data.split("\n");for(var i=0;i<rows.length;i++){var row=$.trim(rows[i]);if(row){row=row.split("|");parsed[parsed.length]={data:row,value:row[0],result:options.formatResult&&options.formatResult(row,row[0])||row[0]};}}
return parsed;};function stopLoading(){$input.removeClass(options.loadingClass);};};$.Autocompleter.defaults={inputClass:"ac_input",resultsClass:"ac_results",loadingClass:"ac_loading",minChars:1,delay:400,matchCase:false,matchSubset:true,matchContains:false,cacheLength:10,max:100,mustMatch:false,extraParams:{},selectFirst:true,formatItem:function(row){return row[0];},formatMatch:null,autoFill:false,width:0,multiple:false,multipleSeparator:", ",highlight:function(value,term){return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)("+term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi,"\\$1")+")(?![^<>]*>)(?![^&;]+;)","gi"),"<strong>$1</strong>");},scroll:true,scrollHeight:180};$.Autocompleter.Cache=function(options){var data={};var length=0;function matchSubset(s,sub){if(!options.matchCase)
s=s.toLowerCase();var i=s.indexOf(sub);if(i==-1)return false;return i==0||options.matchContains;};function add(q,value){if(length>options.cacheLength){flush();}
if(!data[q]){length++;}
data[q]=value;}
function populate(){if(!options.data)return false;var stMatchSets={},nullData=0;if(!options.url)options.cacheLength=1;stMatchSets[""]=[];for(var i=0,ol=options.data.length;i<ol;i++){var rawValue=options.data[i];rawValue=(typeof rawValue=="string")?[rawValue]:rawValue;var value=options.formatMatch(rawValue,i+1,options.data.length);if(value===false)
continue;var firstChar=value.charAt(0).toLowerCase();if(!stMatchSets[firstChar])
stMatchSets[firstChar]=[];var row={value:value,data:rawValue,result:options.formatResult&&options.formatResult(rawValue)||value};stMatchSets[firstChar].push(row);if(nullData++<options.max){stMatchSets[""].push(row);}};$.each(stMatchSets,function(i,value){options.cacheLength++;add(i,value);});}
setTimeout(populate,25);function flush(){data={};length=0;}
return{flush:flush,add:add,populate:populate,load:function(q){if(!options.cacheLength||!length)
return null;if(!options.url&&options.matchContains){var csub=[];for(var k in data){if(k.length>0){var c=data[k];$.each(c,function(i,x){if(matchSubset(x.value,q)){csub.push(x);}});}}
return csub;}else
if(data[q]){return data[q];}else
if(options.matchSubset){for(var i=q.length-1;i>=options.minChars;i--){var c=data[q.substr(0,i)];if(c){var csub=[];$.each(c,function(i,x){if(matchSubset(x.value,q)){csub[csub.length]=x;}});return csub;}}}
return null;}};};$.Autocompleter.Select=function(options,input,select,config){var CLASSES={ACTIVE:"ac_over"};var listItems,active=-1,data,term="",needsInit=true,element,list;function init(){if(!needsInit)
return;element=$("<div/>").hide().addClass(options.resultsClass).css("position","absolute").appendTo(document.body);list=$("<ul/>").appendTo(element).mouseover(function(event){if(target(event).nodeName&&target(event).nodeName.toUpperCase()=='LI'){active=$("li",list).removeClass(CLASSES.ACTIVE).index(target(event));$(target(event)).addClass(CLASSES.ACTIVE);}}).click(function(event){$(target(event)).addClass(CLASSES.ACTIVE);select();input.focus();return false;}).mousedown(function(){config.mouseDownOnSelect=true;}).mouseup(function(){config.mouseDownOnSelect=false;});if(options.width>0)
element.css("width",options.width);needsInit=false;}
function target(event){var element=event.target;while(element&&element.tagName!="LI")
element=element.parentNode;if(!element)
return[];return element;}
function moveSelect(step){listItems.slice(active,active+1).removeClass(CLASSES.ACTIVE);movePosition(step);var activeItem=listItems.slice(active,active+1).addClass(CLASSES.ACTIVE);if(options.scroll){var offset=0;listItems.slice(0,active).each(function(){offset+=this.offsetHeight;});if((offset+activeItem[0].offsetHeight-list.scrollTop())>list[0].clientHeight){list.scrollTop(offset+activeItem[0].offsetHeight-list.innerHeight());}else if(offset<list.scrollTop()){list.scrollTop(offset);}}};function movePosition(step){active+=step;if(active<0){active=listItems.size()-1;}else if(active>=listItems.size()){active=0;}}
function limitNumberOfItems(available){return options.max&&options.max<available?options.max:available;}
function fillList(){list.empty();var max=limitNumberOfItems(data.length);for(var i=0;i<max;i++){if(!data[i])
continue;var formatted=options.formatItem(data[i].data,i+1,max,data[i].value,term);if(formatted===false)
continue;var li=$("<li/>").html(options.highlight(formatted,term)).addClass(i%2==0?"ac_even":"ac_odd").appendTo(list)[0];$.data(li,"ac_data",data[i]);}
listItems=list.find("li");if(options.selectFirst){listItems.slice(0,1).addClass(CLASSES.ACTIVE);active=0;}
if($.fn.bgiframe)
list.bgiframe();}
return{display:function(d,q){init();data=d;term=q;fillList();},next:function(){moveSelect(1);},prev:function(){moveSelect(-1);},pageUp:function(){if(active!=0&&active-8<0){moveSelect(-active);}else{moveSelect(-8);}},pageDown:function(){if(active!=listItems.size()-1&&active+8>listItems.size()){moveSelect(listItems.size()-1-active);}else{moveSelect(8);}},hide:function(){element&&element.hide();listItems&&listItems.removeClass(CLASSES.ACTIVE);active=-1;},visible:function(){return element&&element.is(":visible");},current:function(){return this.visible()&&(listItems.filter("."+CLASSES.ACTIVE)[0]||options.selectFirst&&listItems[0]);},show:function(){var offset=$(input).offset();element.css({width:typeof options.width=="string"||options.width>0?options.width:$(input).width(),top:offset.top+input.offsetHeight,left:offset.left}).show();if(options.scroll){list.css({maxHeight:options.scrollHeight,overflow:'auto'});if($.browser.msie&&typeof document.body.style.maxHeight==="undefined"){var listHeight=0;listItems.each(function(){listHeight+=this.offsetHeight;});var scrollbarsVisible=listHeight>options.scrollHeight;list.css('height',scrollbarsVisible?options.scrollHeight:listHeight);if(!scrollbarsVisible){listItems.width(list.width()-parseInt(listItems.css("padding-left"))-parseInt(listItems.css("padding-right")));}}}},selected:function(){var selected=listItems&&listItems.filter("."+CLASSES.ACTIVE).removeClass(CLASSES.ACTIVE);return selected&&selected.length&&$.data(selected[0],"ac_data");},emptyList:function(){list&&list.empty();},unbind:function(){element&&element.remove();}};};$.Autocompleter.Selection=function(field,start,end){if(field.createTextRange){var selRange=field.createTextRange();selRange.collapse(true);selRange.moveStart("character",start);selRange.moveEnd("character",end);selRange.select();}else if(field.setSelectionRange){field.setSelectionRange(start,end);}else{if(field.selectionStart){field.selectionStart=start;field.selectionEnd=end;}}
field.focus();};})(jQuery);;$('document').ready(function(){$('#favoriteproducts_block_extra_add').click(function(){$.ajax({url:favorite_products_url_add+'?rand='+new Date().getTime(),type:"POST",headers:{"cache-control":"no-cache"},data:{"id_product":favorite_products_id_product},success:function(result){if(result=='0')
{$('#favoriteproducts_block_extra_add').slideUp(function(){$('#favoriteproducts_block_extra_added').slideDown("slow");});}}});});$('#favoriteproducts_block_extra_remove').click(function(){$.ajax({url:favorite_products_url_remove+'?rand='+new Date().getTime(),type:"POST",headers:{"cache-control":"no-cache"},data:{"id_product":favorite_products_id_product},success:function(result){if(result=='0')
{$('#favoriteproducts_block_extra_remove').slideUp(function(){$('#favoriteproducts_block_extra_removed').slideDown("slow");});}}});});$('#favoriteproducts_block_extra_added').click(function(){$.ajax({url:favorite_products_url_remove+'?rand='+new Date().getTime(),type:"POST",headers:{"cache-control":"no-cache"},data:{"id_product":favorite_products_id_product},success:function(result){if(result=='0')
{$('#favoriteproducts_block_extra_added').slideUp(function(){$('#favoriteproducts_block_extra_removed').slideDown("slow");});}}});});$('#favoriteproducts_block_extra_removed').click(function(){$.ajax({url:favorite_products_url_add+'?rand='+new Date().getTime(),type:"POST",headers:{"cache-control":"no-cache"},data:{"id_product":favorite_products_id_product},success:function(result){if(result=='0')
{$('#favoriteproducts_block_extra_removed').slideUp(function(){$('#favoriteproducts_block_extra_added').slideDown("slow");});}}});});});!function($){"use strict";$(function(){$.support.transition=(function(){var transitionEnd=(function(){var el=document.createElement('bootstrap'),transEndEventNames={'WebkitTransition':'webkitTransitionEnd','MozTransition':'transitionend','OTransition':'oTransitionEnd otransitionend','transition':'transitionend'},name
for(name in transEndEventNames){if(el.style[name]!==undefined){return transEndEventNames[name]}}}())
return transitionEnd&&{end:transitionEnd}})()})}(window.jQuery);!function($){"use strict";var dismiss='[data-dismiss="alert"]',Alert=function(el){$(el).on('click',dismiss,this.close)}
Alert.prototype.close=function(e){var $this=$(this),selector=$this.attr('data-target'),$parent
if(!selector){selector=$this.attr('href')
selector=selector&&selector.replace(/.*(?=#[^\s]*$)/,'')}
$parent=$(selector)
e&&e.preventDefault()
$parent.length||($parent=$this.hasClass('alert')?$this:$this.parent())
$parent.trigger(e=$.Event('close'))
if(e.isDefaultPrevented())return
$parent.removeClass('in')
function removeElement(){$parent.trigger('closed').remove()}
$.support.transition&&$parent.hasClass('fade')?$parent.on($.support.transition.end,removeElement):removeElement()}
var old=$.fn.alert
$.fn.alert=function(option){return this.each(function(){var $this=$(this),data=$this.data('alert')
if(!data)$this.data('alert',(data=new Alert(this)))
if(typeof option=='string')data[option].call($this)})}
$.fn.alert.Constructor=Alert
$.fn.alert.noConflict=function(){$.fn.alert=old
return this}
$(document).on('click.alert.data-api',dismiss,Alert.prototype.close)}(window.jQuery);!function($){"use strict";var Button=function(element,options){this.$element=$(element)
this.options=$.extend({},$.fn.button.defaults,options)}
Button.prototype.setState=function(state){var d='disabled',$el=this.$element,data=$el.data(),val=$el.is('input')?'val':'html'
state=state+'Text'
data.resetText||$el.data('resetText',$el[val]())
$el[val](data[state]||this.options[state])
setTimeout(function(){state=='loadingText'?$el.addClass(d).attr(d,d):$el.removeClass(d).removeAttr(d)},0)}
Button.prototype.toggle=function(){var $parent=this.$element.closest('[data-toggle="buttons-radio"]')
$parent&&$parent.find('.active').removeClass('active')
this.$element.toggleClass('active')}
var old=$.fn.button
$.fn.button=function(option){return this.each(function(){var $this=$(this),data=$this.data('button'),options=typeof option=='object'&&option
if(!data)$this.data('button',(data=new Button(this,options)))
if(option=='toggle')data.toggle()
else if(option)data.setState(option)})}
$.fn.button.defaults={loadingText:'loading...'}
$.fn.button.Constructor=Button
$.fn.button.noConflict=function(){$.fn.button=old
return this}
$(document).on('click.button.data-api','[data-toggle^=button]',function(e){var $btn=$(e.target)
if(!$btn.hasClass('btn'))$btn=$btn.closest('.btn')
$btn.button('toggle')})}(window.jQuery);!function($){"use strict";var Carousel=function(element,options){this.$element=$(element)
this.options=options
this.options.pause=='hover'&&this.$element.on('mouseenter',$.proxy(this.pause,this)).on('mouseleave',$.proxy(this.cycle,this))}
Carousel.prototype={cycle:function(e){if(!e)this.paused=false
this.options.interval&&!this.paused&&(this.interval=setInterval($.proxy(this.next,this),this.options.interval))
return this},to:function(pos){var $active=this.$element.find('.item.active'),children=$active.parent().children(),activePos=children.index($active),that=this
if(pos>(children.length-1)||pos<0)return
if(this.sliding){return this.$element.one('slid',function(){that.to(pos)})}
if(activePos==pos){return this.pause().cycle()}
return this.slide(pos>activePos?'next':'prev',$(children[pos]))},pause:function(e){if(!e)this.paused=true
if(this.$element.find('.next, .prev').length&&$.support.transition.end){this.$element.trigger($.support.transition.end)
this.cycle()}
clearInterval(this.interval)
this.interval=null
return this},next:function(){if(this.sliding)return
return this.slide('next')},prev:function(){if(this.sliding)return
return this.slide('prev')},slide:function(type,next){var $active=this.$element.find('.item.active'),$next=next||$active[type](),isCycling=this.interval,direction=type=='next'?'left':'right',fallback=type=='next'?'first':'last',that=this,e
this.sliding=true
isCycling&&this.pause()
$next=$next.length?$next:this.$element.find('.item')[fallback]()
e=$.Event('slide',{relatedTarget:$next[0]})
if($next.hasClass('active'))return
if($.support.transition&&this.$element.hasClass('slide')){this.$element.trigger(e)
if(e.isDefaultPrevented())return
$next.addClass(type)
$next[0].offsetWidth
$active.addClass(direction)
$next.addClass(direction)
this.$element.one($.support.transition.end,function(){$next.removeClass([type,direction].join(' ')).addClass('active')
$active.removeClass(['active',direction].join(' '))
that.sliding=false
setTimeout(function(){that.$element.trigger('slid')},0)})}else{this.$element.trigger(e)
if(e.isDefaultPrevented())return
$active.removeClass('active')
$next.addClass('active')
this.sliding=false
this.$element.trigger('slid')}
isCycling&&this.cycle()
return this}}
var old=$.fn.carousel
$.fn.carousel=function(option){return this.each(function(){var $this=$(this),data=$this.data('carousel'),options=$.extend({},$.fn.carousel.defaults,typeof option=='object'&&option),action=typeof option=='string'?option:options.slide
if(!data)$this.data('carousel',(data=new Carousel(this,options)))
if(typeof option=='number')data.to(option)
else if(action)data[action]()
else if(options.interval)data.cycle()})}
$.fn.carousel.defaults={interval:5000,pause:'hover'}
$.fn.carousel.Constructor=Carousel
$.fn.carousel.noConflict=function(){$.fn.carousel=old
return this}
$(document).on('click.carousel.data-api','[data-slide]',function(e){var $this=$(this),href,$target=$($this.attr('data-target')||(href=$this.attr('href'))&&href.replace(/.*(?=#[^\s]+$)/,'')),options=$.extend({},$target.data(),$this.data())
$target.carousel(options)
e.preventDefault()})}(window.jQuery);!function($){"use strict";var Collapse=function(element,options){this.$element=$(element)
this.options=$.extend({},$.fn.collapse.defaults,options)
if(this.options.parent){this.$parent=$(this.options.parent)}
this.options.toggle&&this.toggle()}
Collapse.prototype={constructor:Collapse,dimension:function(){var hasWidth=this.$element.hasClass('width')
return hasWidth?'width':'height'},show:function(){var dimension,scroll,actives,hasData
if(this.transitioning)return
dimension=this.dimension()
scroll=$.camelCase(['scroll',dimension].join('-'))
actives=this.$parent&&this.$parent.find('> .accordion-group > .in')
if(actives&&actives.length){hasData=actives.data('collapse')
if(hasData&&hasData.transitioning)return
actives.collapse('hide')
hasData||actives.data('collapse',null)}
this.$element[dimension](0)
this.transition('addClass',$.Event('show'),'shown')
$.support.transition&&this.$element[dimension](this.$element[0][scroll])},hide:function(){var dimension
if(this.transitioning)return
dimension=this.dimension()
this.reset(this.$element[dimension]())
this.transition('removeClass',$.Event('hide'),'hidden')
this.$element[dimension](0)},reset:function(size){var dimension=this.dimension()
this.$element.removeClass('collapse')
[dimension](size||'auto')
[0].offsetWidth
this.$element[size!==null?'addClass':'removeClass']('collapse')
return this},transition:function(method,startEvent,completeEvent){var that=this,complete=function(){if(startEvent.type=='show')that.reset()
that.transitioning=0
that.$element.trigger(completeEvent)}
this.$element.trigger(startEvent)
if(startEvent.isDefaultPrevented())return
this.transitioning=1
this.$element[method]('in')
$.support.transition&&this.$element.hasClass('collapse')?this.$element.one($.support.transition.end,complete):complete()},toggle:function(){this[this.$element.hasClass('in')?'hide':'show']()}}
var old=$.fn.collapse
$.fn.collapse=function(option){return this.each(function(){var $this=$(this),data=$this.data('collapse'),options=typeof option=='object'&&option
if(!data)$this.data('collapse',(data=new Collapse(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.collapse.defaults={toggle:true}
$.fn.collapse.Constructor=Collapse
$.fn.collapse.noConflict=function(){$.fn.collapse=old
return this}
$(document).on('click.collapse.data-api','[data-toggle=collapse]',function(e){var $this=$(this),href,target=$this.attr('data-target')||e.preventDefault()||(href=$this.attr('href'))&&href.replace(/.*(?=#[^\s]+$)/,''),option=$(target).data('collapse')?'toggle':$this.data()
$this[$(target).hasClass('in')?'addClass':'removeClass']('collapsed')
$(target).collapse(option)})}(window.jQuery);!function($){"use strict";var toggle='[data-toggle=dropdown]',Dropdown=function(element){var $el=$(element).on('click.dropdown.data-api',this.toggle)
$('html').on('click.dropdown.data-api',function(){$el.parent().removeClass('open')})}
Dropdown.prototype={constructor:Dropdown,toggle:function(e){var $this=$(this),$parent,isActive
if($this.is('.disabled, :disabled'))return
$parent=getParent($this)
isActive=$parent.hasClass('open')
clearMenus()
if(!isActive){$parent.toggleClass('open')}
$this.focus()
return false},keydown:function(e){var $this,$items,$active,$parent,isActive,index
if(!/(38|40|27)/.test(e.keyCode))return
$this=$(this)
e.preventDefault()
e.stopPropagation()
if($this.is('.disabled, :disabled'))return
$parent=getParent($this)
isActive=$parent.hasClass('open')
if(!isActive||(isActive&&e.keyCode==27))return $this.click()
$items=$('[role=menu] li:not(.divider):visible a',$parent)
if(!$items.length)return
index=$items.index($items.filter(':focus'))
if(e.keyCode==38&&index>0)index--
if(e.keyCode==40&&index<$items.length-1)index++
if(!~index)index=0
$items.eq(index).focus()}}
function clearMenus(){$(toggle).each(function(){getParent($(this)).removeClass('open')})}
function getParent($this){var selector=$this.attr('data-target'),$parent
if(!selector){selector=$this.attr('href')
selector=selector&&/#/.test(selector)&&selector.replace(/.*(?=#[^\s]*$)/,'')}
$parent=$(selector)
$parent.length||($parent=$this.parent())
return $parent}
var old=$.fn.dropdown
$.fn.dropdown=function(option){return this.each(function(){var $this=$(this),data=$this.data('dropdown')
if(!data)$this.data('dropdown',(data=new Dropdown(this)))
if(typeof option=='string')data[option].call($this)})}
$.fn.dropdown.Constructor=Dropdown
$.fn.dropdown.noConflict=function(){$.fn.dropdown=old
return this}
$(document).on('click.dropdown.data-api touchstart.dropdown.data-api',clearMenus).on('click.dropdown touchstart.dropdown.data-api','.dropdown form',function(e){e.stopPropagation()}).on('touchstart.dropdown.data-api','.dropdown-menu',function(e){e.stopPropagation()}).on('click.dropdown.data-api touchstart.dropdown.data-api',toggle,Dropdown.prototype.toggle).on('keydown.dropdown.data-api touchstart.dropdown.data-api',toggle+', [role=menu]',Dropdown.prototype.keydown)}(window.jQuery);!function($){"use strict";var Modal=function(element,options){this.options=options
this.$element=$(element).delegate('[data-dismiss="modal"]','click.dismiss.modal',$.proxy(this.hide,this))
this.options.remote&&this.$element.find('.modal-body').load(this.options.remote)}
Modal.prototype={constructor:Modal,toggle:function(){return this[!this.isShown?'show':'hide']()},show:function(){var that=this,e=$.Event('show')
this.$element.trigger(e)
if(this.isShown||e.isDefaultPrevented())return
this.isShown=true
this.escape()
this.backdrop(function(){var transition=$.support.transition&&that.$element.hasClass('fade')
if(!that.$element.parent().length){that.$element.appendTo(document.body)}
that.$element.show()
if(transition){that.$element[0].offsetWidth}
that.$element.addClass('in').attr('aria-hidden',false)
that.enforceFocus()
transition?that.$element.one($.support.transition.end,function(){that.$element.focus().trigger('shown')}):that.$element.focus().trigger('shown')})},hide:function(e){e&&e.preventDefault()
var that=this
e=$.Event('hide')
this.$element.trigger(e)
if(!this.isShown||e.isDefaultPrevented())return
this.isShown=false
this.escape()
$(document).off('focusin.modal')
this.$element.removeClass('in').attr('aria-hidden',true)
$.support.transition&&this.$element.hasClass('fade')?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var that=this
$(document).on('focusin.modal',function(e){if(that.$element[0]!==e.target&&!that.$element.has(e.target).length){that.$element.focus()}})},escape:function(){var that=this
if(this.isShown&&this.options.keyboard){this.$element.on('keyup.dismiss.modal',function(e){e.which==27&&that.hide()})}else if(!this.isShown){this.$element.off('keyup.dismiss.modal')}},hideWithTransition:function(){var that=this,timeout=setTimeout(function(){that.$element.off($.support.transition.end)
that.hideModal()},500)
this.$element.one($.support.transition.end,function(){clearTimeout(timeout)
that.hideModal()})},hideModal:function(that){this.$element.hide().trigger('hidden')
this.backdrop()},removeBackdrop:function(){this.$backdrop.remove()
this.$backdrop=null},backdrop:function(callback){var that=this,animate=this.$element.hasClass('fade')?'fade':''
if(this.isShown&&this.options.backdrop){var doAnimate=$.support.transition&&animate
this.$backdrop=$('<div class="modal-backdrop '+animate+'" />').appendTo(document.body)
this.$backdrop.click(this.options.backdrop=='static'?$.proxy(this.$element[0].focus,this.$element[0]):$.proxy(this.hide,this))
if(doAnimate)this.$backdrop[0].offsetWidth
this.$backdrop.addClass('in')
doAnimate?this.$backdrop.one($.support.transition.end,callback):callback()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass('in')
$.support.transition&&this.$element.hasClass('fade')?this.$backdrop.one($.support.transition.end,$.proxy(this.removeBackdrop,this)):this.removeBackdrop()}else if(callback){callback()}}}
var old=$.fn.modal
$.fn.modal=function(option){return this.each(function(){var $this=$(this),data=$this.data('modal'),options=$.extend({},$.fn.modal.defaults,$this.data(),typeof option=='object'&&option)
if(!data)$this.data('modal',(data=new Modal(this,options)))
if(typeof option=='string')data[option]()
else if(options.show)data.show()})}
$.fn.modal.defaults={backdrop:true,keyboard:true,show:true}
$.fn.modal.Constructor=Modal
$.fn.modal.noConflict=function(){$.fn.modal=old
return this}
$(document).on('click.modal.data-api','[data-toggle="modal"]',function(e){var $this=$(this),href=$this.attr('href'),$target=$($this.attr('data-target')||(href&&href.replace(/.*(?=#[^\s]+$)/,''))),option=$target.data('modal')?'toggle':$.extend({remote:!/#/.test(href)&&href},$target.data(),$this.data())
e.preventDefault()
$target.modal(option).one('hide',function(){$this.focus()})})}(window.jQuery);!function($){"use strict";var Tooltip=function(element,options){this.init('tooltip',element,options)}
Tooltip.prototype={constructor:Tooltip,init:function(type,element,options){var eventIn,eventOut
this.type=type
this.$element=$(element)
this.options=this.getOptions(options)
this.enabled=true
if(this.options.trigger=='click'){this.$element.on('click.'+this.type,this.options.selector,$.proxy(this.toggle,this))}else if(this.options.trigger!='manual'){eventIn=this.options.trigger=='hover'?'mouseenter':'focus'
eventOut=this.options.trigger=='hover'?'mouseleave':'blur'
this.$element.on(eventIn+'.'+this.type,this.options.selector,$.proxy(this.enter,this))
this.$element.on(eventOut+'.'+this.type,this.options.selector,$.proxy(this.leave,this))}
this.options.selector?(this._options=$.extend({},this.options,{trigger:'manual',selector:''})):this.fixTitle()},getOptions:function(options){options=$.extend({},$.fn[this.type].defaults,options,this.$element.data())
if(options.delay&&typeof options.delay=='number'){options.delay={show:options.delay,hide:options.delay}}
return options},enter:function(e){var self=$(e.currentTarget)[this.type](this._options).data(this.type)
if(!self.options.delay||!self.options.delay.show)return self.show()
clearTimeout(this.timeout)
self.hoverState='in'
this.timeout=setTimeout(function(){if(self.hoverState=='in')self.show()},self.options.delay.show)},leave:function(e){var self=$(e.currentTarget)[this.type](this._options).data(this.type)
if(this.timeout)clearTimeout(this.timeout)
if(!self.options.delay||!self.options.delay.hide)return self.hide()
self.hoverState='out'
this.timeout=setTimeout(function(){if(self.hoverState=='out')self.hide()},self.options.delay.hide)},show:function(){var $tip,inside,pos,actualWidth,actualHeight,placement,tp
if(this.hasContent()&&this.enabled){$tip=this.tip()
this.setContent()
if(this.options.animation){$tip.addClass('fade')}
placement=typeof this.options.placement=='function'?this.options.placement.call(this,$tip[0],this.$element[0]):this.options.placement
inside=/in/.test(placement)
$tip.detach().css({top:0,left:0,display:'block'}).insertAfter(this.$element)
pos=this.getPosition(inside)
actualWidth=$tip[0].offsetWidth
actualHeight=$tip[0].offsetHeight
switch(inside?placement.split(' ')[1]:placement){case'bottom':tp={top:pos.top+pos.height,left:pos.left+pos.width/2-actualWidth/2}
break
case'top':tp={top:pos.top-actualHeight,left:pos.left+pos.width/2-actualWidth/2}
break
case'left':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left-actualWidth}
break
case'right':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left+pos.width}
break}
$tip.offset(tp).addClass(placement).addClass('in')}},setContent:function(){var $tip=this.tip(),title=this.getTitle()
$tip.find('.tooltip-inner')[this.options.html?'html':'text'](title)
$tip.removeClass('fade in top bottom left right')},hide:function(){var that=this,$tip=this.tip()
$tip.removeClass('in')
function removeWithAnimation(){var timeout=setTimeout(function(){$tip.off($.support.transition.end).detach()},500)
$tip.one($.support.transition.end,function(){clearTimeout(timeout)
$tip.detach()})}
$.support.transition&&this.$tip.hasClass('fade')?removeWithAnimation():$tip.detach()
return this},fixTitle:function(){var $e=this.$element
if($e.attr('title')||typeof($e.attr('data-original-title'))!='string'){$e.attr('data-original-title',$e.attr('title')||'').removeAttr('title')}},hasContent:function(){return this.getTitle()},getPosition:function(inside){return $.extend({},(inside?{top:0,left:0}:this.$element.offset()),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight})},getTitle:function(){var title,$e=this.$element,o=this.options
title=$e.attr('data-original-title')||(typeof o.title=='function'?o.title.call($e[0]):o.title)
return title},tip:function(){return this.$tip=this.$tip||$(this.options.template)},validate:function(){if(!this.$element[0].parentNode){this.hide()
this.$element=null
this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(e){var self=$(e.currentTarget)[this.type](this._options).data(this.type)
self[self.tip().hasClass('in')?'hide':'show']()},destroy:function(){this.hide().$element.off('.'+this.type).removeData(this.type)}}
var old=$.fn.tooltip
$.fn.tooltip=function(option){return this.each(function(){var $this=$(this),data=$this.data('tooltip'),options=typeof option=='object'&&option
if(!data)$this.data('tooltip',(data=new Tooltip(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.tooltip.Constructor=Tooltip
$.fn.tooltip.defaults={animation:true,placement:'top',selector:false,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:'hover',title:'',delay:0,html:false}
$.fn.tooltip.noConflict=function(){$.fn.tooltip=old
return this}}(window.jQuery);!function($){"use strict";var Popover=function(element,options){this.init('popover',element,options)}
Popover.prototype=$.extend({},$.fn.tooltip.Constructor.prototype,{constructor:Popover,setContent:function(){var $tip=this.tip(),title=this.getTitle(),content=this.getContent()
$tip.find('.popover-title')[this.options.html?'html':'text'](title)
$tip.find('.popover-content')[this.options.html?'html':'text'](content)
$tip.removeClass('fade top bottom left right in')},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var content,$e=this.$element,o=this.options
content=$e.attr('data-content')||(typeof o.content=='function'?o.content.call($e[0]):o.content)
return content},tip:function(){if(!this.$tip){this.$tip=$(this.options.template)}
return this.$tip},destroy:function(){this.hide().$element.off('.'+this.type).removeData(this.type)}})
var old=$.fn.popover
$.fn.popover=function(option){return this.each(function(){var $this=$(this),data=$this.data('popover'),options=typeof option=='object'&&option
if(!data)$this.data('popover',(data=new Popover(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.popover.Constructor=Popover
$.fn.popover.defaults=$.extend({},$.fn.tooltip.defaults,{placement:'right',trigger:'click',content:'',template:'<div class="popover"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"></div></div></div>'})
$.fn.popover.noConflict=function(){$.fn.popover=old
return this}}(window.jQuery);!function($){"use strict";function ScrollSpy(element,options){var process=$.proxy(this.process,this),$element=$(element).is('body')?$(window):$(element),href
this.options=$.extend({},$.fn.scrollspy.defaults,options)
this.$scrollElement=$element.on('scroll.scroll-spy.data-api',process)
this.selector=(this.options.target||((href=$(element).attr('href'))&&href.replace(/.*(?=#[^\s]+$)/,''))||'')+' .nav li > a'
this.$body=$('body')
this.refresh()
this.process()}
ScrollSpy.prototype={constructor:ScrollSpy,refresh:function(){var self=this,$targets
this.offsets=$([])
this.targets=$([])
$targets=this.$body.find(this.selector).map(function(){var $el=$(this),href=$el.data('target')||$el.attr('href'),$href=/^#\w/.test(href)&&$(href)
return($href&&$href.length&&[[$href.position().top+self.$scrollElement.scrollTop(),href]])||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){self.offsets.push(this[0])
self.targets.push(this[1])})},process:function(){var scrollTop=this.$scrollElement.scrollTop()+this.options.offset,scrollHeight=this.$scrollElement[0].scrollHeight||this.$body[0].scrollHeight,maxScroll=scrollHeight-this.$scrollElement.height(),offsets=this.offsets,targets=this.targets,activeTarget=this.activeTarget,i
if(scrollTop>=maxScroll){return activeTarget!=(i=targets.last()[0])&&this.activate(i)}
for(i=offsets.length;i--;){activeTarget!=targets[i]&&scrollTop>=offsets[i]&&(!offsets[i+1]||scrollTop<=offsets[i+1])&&this.activate(targets[i])}},activate:function(target){var active,selector
this.activeTarget=target
$(this.selector).parent('.active').removeClass('active')
selector=this.selector
+'[data-target="'+target+'"],'
+this.selector+'[href="'+target+'"]'
active=$(selector).parent('li').addClass('active')
if(active.parent('.dropdown-menu').length){active=active.closest('li.dropdown').addClass('active')}
active.trigger('activate')}}
var old=$.fn.scrollspy
$.fn.scrollspy=function(option){return this.each(function(){var $this=$(this),data=$this.data('scrollspy'),options=typeof option=='object'&&option
if(!data)$this.data('scrollspy',(data=new ScrollSpy(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.scrollspy.Constructor=ScrollSpy
$.fn.scrollspy.defaults={offset:10}
$.fn.scrollspy.noConflict=function(){$.fn.scrollspy=old
return this}
$(window).on('load',function(){$('[data-spy="scroll"]').each(function(){var $spy=$(this)
$spy.scrollspy($spy.data())})})}(window.jQuery);!function($){"use strict";var Tab=function(element){this.element=$(element)}
Tab.prototype={constructor:Tab,show:function(){var $this=this.element,$ul=$this.closest('ul:not(.dropdown-menu)'),selector=$this.attr('data-target'),previous,$target,e
if(!selector){selector=$this.attr('href')
selector=selector&&selector.replace(/.*(?=#[^\s]*$)/,'')}
if($this.parent('li').hasClass('active'))return
previous=$ul.find('.active:last a')[0]
e=$.Event('show',{relatedTarget:previous})
$this.trigger(e)
if(e.isDefaultPrevented())return
$target=$(selector)
this.activate($this.parent('li'),$ul)
this.activate($target,$target.parent(),function(){$this.trigger({type:'shown',relatedTarget:previous})})},activate:function(element,container,callback){var $active=container.find('> .active'),transition=callback&&$.support.transition&&$active.hasClass('fade')
function next(){$active.removeClass('active').find('> .dropdown-menu > .active').removeClass('active')
element.addClass('active')
if(transition){element[0].offsetWidth
element.addClass('in')}else{element.removeClass('fade')}
if(element.parent('.dropdown-menu')){element.closest('li.dropdown').addClass('active')}
callback&&callback()}
transition?$active.one($.support.transition.end,next):next()
$active.removeClass('in')}}
var old=$.fn.tab
$.fn.tab=function(option){return this.each(function(){var $this=$(this),data=$this.data('tab')
if(!data)$this.data('tab',(data=new Tab(this)))
if(typeof option=='string')data[option]()})}
$.fn.tab.Constructor=Tab
$.fn.tab.noConflict=function(){$.fn.tab=old
return this}
$(document).on('click.tab.data-api','[data-toggle="tab"], [data-toggle="pill"]',function(e){e.preventDefault()
$(this).tab('show')})}(window.jQuery);!function($){"use strict";var Typeahead=function(element,options){this.$element=$(element)
this.options=$.extend({},$.fn.typeahead.defaults,options)
this.matcher=this.options.matcher||this.matcher
this.sorter=this.options.sorter||this.sorter
this.highlighter=this.options.highlighter||this.highlighter
this.updater=this.options.updater||this.updater
this.source=this.options.source
this.$menu=$(this.options.menu)
this.shown=false
this.listen()}
Typeahead.prototype={constructor:Typeahead,select:function(){var val=this.$menu.find('.active').attr('data-value')
this.$element.val(this.updater(val)).change()
return this.hide()},updater:function(item){return item},show:function(){var pos=$.extend({},this.$element.position(),{height:this.$element[0].offsetHeight})
this.$menu.insertAfter(this.$element).css({top:pos.top+pos.height,left:pos.left}).show()
this.shown=true
return this},hide:function(){this.$menu.hide()
this.shown=false
return this},lookup:function(event){var items
this.query=this.$element.val()
if(!this.query||this.query.length<this.options.minLength){return this.shown?this.hide():this}
items=$.isFunction(this.source)?this.source(this.query,$.proxy(this.process,this)):this.source
return items?this.process(items):this},process:function(items){var that=this
items=$.grep(items,function(item){return that.matcher(item)})
items=this.sorter(items)
if(!items.length){return this.shown?this.hide():this}
return this.render(items.slice(0,this.options.items)).show()},matcher:function(item){return~item.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(items){var beginswith=[],caseSensitive=[],caseInsensitive=[],item
while(item=items.shift()){if(!item.toLowerCase().indexOf(this.query.toLowerCase()))beginswith.push(item)
else if(~item.indexOf(this.query))caseSensitive.push(item)
else caseInsensitive.push(item)}
return beginswith.concat(caseSensitive,caseInsensitive)},highlighter:function(item){var query=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,'\\$&')
return item.replace(new RegExp('('+query+')','ig'),function($1,match){return'<strong>'+match+'</strong>'})},render:function(items){var that=this
items=$(items).map(function(i,item){i=$(that.options.item).attr('data-value',item)
i.find('a').html(that.highlighter(item))
return i[0]})
items.first().addClass('active')
this.$menu.html(items)
return this},next:function(event){var active=this.$menu.find('.active').removeClass('active'),next=active.next()
if(!next.length){next=$(this.$menu.find('li')[0])}
next.addClass('active')},prev:function(event){var active=this.$menu.find('.active').removeClass('active'),prev=active.prev()
if(!prev.length){prev=this.$menu.find('li').last()}
prev.addClass('active')},listen:function(){this.$element.on('blur',$.proxy(this.blur,this)).on('keypress',$.proxy(this.keypress,this)).on('keyup',$.proxy(this.keyup,this))
if(this.eventSupported('keydown')){this.$element.on('keydown',$.proxy(this.keydown,this))}
this.$menu.on('click',$.proxy(this.click,this)).on('mouseenter','li',$.proxy(this.mouseenter,this))},eventSupported:function(eventName){var isSupported=eventName in this.$element
if(!isSupported){this.$element.setAttribute(eventName,'return;')
isSupported=typeof this.$element[eventName]==='function'}
return isSupported},move:function(e){if(!this.shown)return
switch(e.keyCode){case 9:case 13:case 27:e.preventDefault()
break
case 38:e.preventDefault()
this.prev()
break
case 40:e.preventDefault()
this.next()
break}
e.stopPropagation()},keydown:function(e){this.suppressKeyPressRepeat=~$.inArray(e.keyCode,[40,38,9,13,27])
this.move(e)},keypress:function(e){if(this.suppressKeyPressRepeat)return
this.move(e)},keyup:function(e){switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break
case 9:case 13:if(!this.shown)return
this.select()
break
case 27:if(!this.shown)return
this.hide()
break
default:this.lookup()}
e.stopPropagation()
e.preventDefault()},blur:function(e){var that=this
setTimeout(function(){that.hide()},150)},click:function(e){e.stopPropagation()
e.preventDefault()
this.select()},mouseenter:function(e){this.$menu.find('.active').removeClass('active')
$(e.currentTarget).addClass('active')}}
var old=$.fn.typeahead
$.fn.typeahead=function(option){return this.each(function(){var $this=$(this),data=$this.data('typeahead'),options=typeof option=='object'&&option
if(!data)$this.data('typeahead',(data=new Typeahead(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu"></ul>',item:'<li><a href="#"></a></li>',minLength:1}
$.fn.typeahead.Constructor=Typeahead
$.fn.typeahead.noConflict=function(){$.fn.typeahead=old
return this}
$(document).on('focus.typeahead.data-api','[data-provide="typeahead"]',function(e){var $this=$(this)
if($this.data('typeahead'))return
e.preventDefault()
$this.typeahead($this.data())})}(window.jQuery);!function($){"use strict";var Affix=function(element,options){this.options=$.extend({},$.fn.affix.defaults,options)
this.$window=$(window).on('scroll.affix.data-api',$.proxy(this.checkPosition,this)).on('click.affix.data-api',$.proxy(function(){setTimeout($.proxy(this.checkPosition,this),1)},this))
this.$element=$(element)
this.checkPosition()}
Affix.prototype.checkPosition=function(){if(!this.$element.is(':visible'))return
var scrollHeight=$(document).height(),scrollTop=this.$window.scrollTop(),position=this.$element.offset(),offset=this.options.offset,offsetBottom=offset.bottom,offsetTop=offset.top,reset='affix affix-top affix-bottom',affix
if(typeof offset!='object')offsetBottom=offsetTop=offset
if(typeof offsetTop=='function')offsetTop=offset.top()
if(typeof offsetBottom=='function')offsetBottom=offset.bottom()
affix=this.unpin!=null&&(scrollTop+this.unpin<=position.top)?false:offsetBottom!=null&&(position.top+this.$element.height()>=scrollHeight-offsetBottom)?'bottom':offsetTop!=null&&scrollTop<=offsetTop?'top':false
if(this.affixed===affix)return
this.affixed=affix
this.unpin=affix=='bottom'?position.top-scrollTop:null
this.$element.removeClass(reset).addClass('affix'+(affix?'-'+affix:''))}
var old=$.fn.affix
$.fn.affix=function(option){return this.each(function(){var $this=$(this),data=$this.data('affix'),options=typeof option=='object'&&option
if(!data)$this.data('affix',(data=new Affix(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.affix.Constructor=Affix
$.fn.affix.defaults={offset:0}
$.fn.affix.noConflict=function(){$.fn.affix=old
return this}
$(window).on('load',function(){$('[data-spy="affix"]').each(function(){var $spy=$(this),data=$spy.data()
data.offset=data.offset||{}
data.offsetBottom&&(data.offset.bottom=data.offsetBottom)
data.offsetTop&&(data.offset.top=data.offsetTop)
$spy.affix(data)})})}(window.jQuery);;$(document).ready(function(){$(".bgpattern").each(function(){var wrap=this;if($("input",wrap).val()){$("#"+$("input",wrap).val()).addClass("active");}
$("a",this).click(function(){$("input",wrap).val($(this).attr("id").replace(/\.\w+$/,""));$("a",wrap).removeClass("active");$(this).addClass("active");});});});;;(function($){$.fn.camera=function(opts,callback){var defaults={alignment:'center',autoAdvance:true,mobileAutoAdvance:true,barDirection:'leftToRight',barPosition:'bottom',cols:6,easing:'easeInOutExpo',mobileEasing:'',fx:'random',mobileFx:'',gridDifference:250,height:'50%',imagePath:'images/',hover:true,loader:'pie',loaderColor:'#eeeeee',loaderBgColor:'#222222',loaderOpacity:.8,loaderPadding:2,loaderStroke:7,minHeight:'200px',navigation:true,navigationHover:true,mobileNavHover:true,opacityOnGrid:false,overlayer:true,pagination:true,playPause:true,pauseOnClick:true,pieDiameter:38,piePosition:'rightTop',portrait:false,rows:4,slicedCols:12,slicedRows:8,slideOn:'random',thumbnails:false,time:7000,transPeriod:1500,onEndTransition:function(){},onLoaded:function(){},onStartLoading:function(){},onStartTransition:function(){}};function isMobile(){if(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPad/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)){return true;}}
var opts=$.extend({},defaults,opts);var wrap=$(this).addClass('camera_wrap');wrap.wrapInner('<div class="camera_src" />').wrapInner('<div class="camera_fakehover" />');var fakeHover=$('.camera_fakehover',wrap);fakeHover.append('<div class="camera_target"></div>');if(opts.overlayer==true){fakeHover.append('<div class="camera_overlayer"></div>')}
fakeHover.append('<div class="camera_target_content"></div>');var loader;if(opts.loader=='pie'&&$.browser.msie&&$.browser.version<9){loader='bar';}else{loader=opts.loader;}
if(loader=='pie'){fakeHover.append('<div class="camera_pie"></div>')}else if(loader=='bar'){fakeHover.append('<div class="camera_bar"></div>')}else{fakeHover.append('<div class="camera_bar" style="display:none"></div>')}
if(opts.playPause==true){fakeHover.append('<div class="camera_commands"></div>')}
if(opts.navigation==true){fakeHover.append('<div class="camera_prev"><span></span></div>').append('<div class="camera_next"><span></span></div>');}
if(opts.thumbnails==true){wrap.append('<div class="camera_thumbs_cont" />');}
if(opts.thumbnails==true&&opts.pagination!=true){$('.camera_thumbs_cont',wrap).wrap('<div />').wrap('<div class="camera_thumbs" />').wrap('<div />').wrap('<div class="camera_command_wrap" />');}
if(opts.pagination==true){wrap.append('<div class="camera_pag"></div>');}
wrap.append('<div class="camera_loader"></div>');$('.camera_caption',wrap).each(function(){$(this).wrapInner('<div />');});var pieID='pie_'+wrap.index(),elem=$('.camera_src',wrap),target=$('.camera_target',wrap),content=$('.camera_target_content',wrap),pieContainer=$('.camera_pie',wrap),barContainer=$('.camera_bar',wrap),prevNav=$('.camera_prev',wrap),nextNav=$('.camera_next',wrap),commands=$('.camera_commands',wrap),pagination=$('.camera_pag',wrap),thumbs=$('.camera_thumbs_cont',wrap);var w,h;var allImg=new Array();$('> div',elem).each(function(){allImg.push($(this).attr('data-src'));});var allLinks=new Array();$('> div',elem).each(function(){if($(this).attr('data-link')){allLinks.push($(this).attr('data-link'));}else{allLinks.push('');}});var allTargets=new Array();$('> div',elem).each(function(){if($(this).attr('data-target')){allTargets.push($(this).attr('data-target'));}else{allTargets.push('');}});var allPor=new Array();$('> div',elem).each(function(){if($(this).attr('data-portrait')){allPor.push($(this).attr('data-portrait'));}else{allPor.push('');}});var allAlign=new Array();$('> div',elem).each(function(){if($(this).attr('data-alignment')){allAlign.push($(this).attr('data-alignment'));}else{allAlign.push('');}});var allThumbs=new Array();$('> div',elem).each(function(){if($(this).attr('data-thumb')){allThumbs.push($(this).attr('data-thumb'));}else{allThumbs.push('');}});var amountSlide=allImg.length;$(content).append('<div class="cameraContents" />');var loopMove;for(loopMove=0;loopMove<amountSlide;loopMove++)
{$('.cameraContents',content).append('<div class="cameraContent" />');if(allLinks[loopMove]!=''){var dataBox=$('> div ',elem).eq(loopMove).attr('data-box');if(typeof dataBox!=='undefined'&&dataBox!==false&&dataBox!=''){dataBox='data-box="'+$('> div ',elem).eq(loopMove).attr('data-box')+'"';}else{dataBox='';}
$('.camera_target_content .cameraContent:eq('+loopMove+')',wrap).append('<a class="camera_link" href="'+allLinks[loopMove]+'" '+dataBox+' target="'+allTargets[loopMove]+'"></a>');}}
$('.camera_caption',wrap).each(function(){var ind=$(this).parent().index(),cont=wrap.find('.cameraContent').eq(ind);$(this).appendTo(cont);});target.append('<div class="cameraCont" />');var cameraCont=$('.cameraCont',wrap);var loop;for(loop=0;loop<amountSlide;loop++)
{cameraCont.append('<div class="cameraSlide cameraSlide_'+loop+'" />');var div=$('> div:eq('+loop+')',elem);target.find('.cameraSlide_'+loop).clone(div);}
function thumbnailVisible(){var wTh=$(thumbs).width();$('li',thumbs).removeClass('camera_visThumb');$('li',thumbs).each(function(){var pos=$(this).position(),ulW=$('ul',thumbs).outerWidth(),offUl=$('ul',thumbs).offset().left,offDiv=$('> div',thumbs).offset().left,ulLeft=offDiv-offUl;if(ulLeft>0){$('.camera_prevThumbs',camera_thumbs_wrap).removeClass('hideNav');}else{$('.camera_prevThumbs',camera_thumbs_wrap).addClass('hideNav');}
if((ulW-ulLeft)>wTh){$('.camera_nextThumbs',camera_thumbs_wrap).removeClass('hideNav');}else{$('.camera_nextThumbs',camera_thumbs_wrap).addClass('hideNav');}
var left=pos.left,right=pos.left+($(this).width());if(right-ulLeft<=wTh&&left-ulLeft>=0){$(this).addClass('camera_visThumb');}});}
$(window).bind('load resize pageshow',function(){thumbnailPos();thumbnailVisible();});cameraCont.append('<div class="cameraSlide cameraSlide_'+loop+'" />');var started;wrap.show();var w=target.width();var h=target.height();var setPause;$(window).bind('resize pageshow',function(){if(started==true){resizeImage();}
$('ul',thumbs).animate({'margin-top':0},0,thumbnailPos);if(!elem.hasClass('paused')){elem.addClass('paused');if($('.camera_stop',camera_thumbs_wrap).length){$('.camera_stop',camera_thumbs_wrap).hide()
$('.camera_play',camera_thumbs_wrap).show();if(loader!='none'){$('#'+pieID).hide();}}else{if(loader!='none'){$('#'+pieID).hide();}}
clearTimeout(setPause);setPause=setTimeout(function(){elem.removeClass('paused');if($('.camera_play',camera_thumbs_wrap).length){$('.camera_play',camera_thumbs_wrap).hide();$('.camera_stop',camera_thumbs_wrap).show();if(loader!='none'){$('#'+pieID).fadeIn();}}else{if(loader!='none'){$('#'+pieID).fadeIn();}}},1500);}});function resizeImage(){var res;function resizeImageWork(){w=wrap.width();if(opts.height.indexOf('%')!=-1){var startH=Math.round(w/(100/parseFloat(opts.height)));if(opts.minHeight!=''&&startH<parseFloat(opts.minHeight)){h=parseFloat(opts.minHeight);}else{h=startH;}
wrap.css({height:h});}else if(opts.height=='auto'){h=wrap.height();}else{h=parseFloat(opts.height);wrap.css({height:h});}
$('.camerarelative',target).css({'width':w,'height':h});$('.imgLoaded',target).each(function(){var t=$(this),wT=t.attr('width'),hT=t.attr('height'),imgLoadIn=t.index(),mTop,mLeft,alignment=t.attr('data-alignment'),portrait=t.attr('data-portrait');if(typeof alignment==='undefined'||alignment===false||alignment===''){alignment=opts.alignment;}
if(typeof portrait==='undefined'||portrait===false||portrait===''){portrait=opts.portrait;}
if(portrait==false||portrait=='false'){if((wT/hT)<(w/h)){var r=w/wT;var d=(Math.abs(h-(hT*r)))*0.5;switch(alignment){case'topLeft':mTop=0;break;case'topCenter':mTop=0;break;case'topRight':mTop=0;break;case'centerLeft':mTop='-'+d+'px';break;case'center':mTop='-'+d+'px';break;case'centerRight':mTop='-'+d+'px';break;case'bottomLeft':mTop='-'+d*2+'px';break;case'bottomCenter':mTop='-'+d*2+'px';break;case'bottomRight':mTop='-'+d*2+'px';break;}
t.css({'height':hT*r,'margin-left':0,'margin-right':0,'margin-top':mTop,'position':'absolute','visibility':'visible','width':w});}
else{var r=h/hT;var d=(Math.abs(w-(wT*r)))*0.5;switch(alignment){case'topLeft':mLeft=0;break;case'topCenter':mLeft='-'+d+'px';break;case'topRight':mLeft='-'+d*2+'px';break;case'centerLeft':mLeft=0;break;case'center':mLeft='-'+d+'px';break;case'centerRight':mLeft='-'+d*2+'px';break;case'bottomLeft':mLeft=0;break;case'bottomCenter':mLeft='-'+d+'px';break;case'bottomRight':mLeft='-'+d*2+'px';break;}
t.css({'height':h,'margin-left':mLeft,'margin-right':mLeft,'margin-top':0,'position':'absolute','visibility':'visible','width':wT*r});}}else{if((wT/hT)<(w/h)){var r=h/hT;var d=(Math.abs(w-(wT*r)))*0.5;switch(alignment){case'topLeft':mLeft=0;break;case'topCenter':mLeft=d+'px';break;case'topRight':mLeft=d*2+'px';break;case'centerLeft':mLeft=0;break;case'center':mLeft=d+'px';break;case'centerRight':mLeft=d*2+'px';break;case'bottomLeft':mLeft=0;break;case'bottomCenter':mLeft=d+'px';break;case'bottomRight':mLeft=d*2+'px';break;}
t.css({'height':h,'margin-left':mLeft,'margin-right':mLeft,'margin-top':0,'position':'absolute','visibility':'visible','width':wT*r});}
else{var r=w/wT;var d=(Math.abs(h-(hT*r)))*0.5;switch(alignment){case'topLeft':mTop=0;break;case'topCenter':mTop=0;break;case'topRight':mTop=0;break;case'centerLeft':mTop=d+'px';break;case'center':mTop=d+'px';break;case'centerRight':mTop=d+'px';break;case'bottomLeft':mTop=d*2+'px';break;case'bottomCenter':mTop=d*2+'px';break;case'bottomRight':mTop=d*2+'px';break;}
t.css({'height':hT*r,'margin-left':0,'margin-right':0,'margin-top':mTop,'position':'absolute','visibility':'visible','width':w});}}});}
if(started==true){clearTimeout(res);res=setTimeout(resizeImageWork,200);}else{resizeImageWork();}
started=true;}
var u,setT;var clickEv,autoAdv,navHover,commands,pagination;var videoHover,videoPresent;if(isMobile()&&opts.mobileAutoAdvance!=''){autoAdv=opts.mobileAutoAdvance;}else{autoAdv=opts.autoAdvance;}
if(autoAdv==false){elem.addClass('paused');}
if(isMobile()&&opts.mobileNavHover!=''){navHover=opts.mobileNavHover;}else{navHover=opts.navigationHover;}
if(elem.length!=0){var selector=$('.cameraSlide',target);selector.wrapInner('<div class="camerarelative" />');var navSlide;var barDirection=opts.barDirection;var camera_thumbs_wrap=wrap;$('iframe',fakeHover).each(function(){var t=$(this);var src=t.attr('src');t.attr('data-src',src);var divInd=t.parent().index('.camera_src > div');$('.camera_target_content .cameraContent:eq('+divInd+')',wrap).append(t);});function imgFake(){$('iframe',fakeHover).each(function(){$('.camera_caption',fakeHover).show();var t=$(this);var cloneSrc=t.attr('data-src');t.attr('src',cloneSrc);var imgFakeUrl=opts.imagePath+'blank.gif';var imgFake=new Image();imgFake.src=imgFakeUrl;if(opts.height.indexOf('%')!=-1){var startH=Math.round(w/(100/parseFloat(opts.height)));if(opts.minHeight!=''&&startH<parseFloat(opts.minHeight)){h=parseFloat(opts.minHeight);}else{h=startH;}}else if(opts.height=='auto'){h=wrap.height();}else{h=parseFloat(opts.height);}
t.after($(imgFake).attr({'class':'imgFake','width':w,'height':h}));var clone=t.clone();t.remove();$(imgFake).bind('click',function(){if($(this).css('position')=='absolute'){$(this).remove();if(cloneSrc.indexOf('vimeo')!=-1||cloneSrc.indexOf('youtube')!=-1){if(cloneSrc.indexOf('?')!=-1){autoplay='&autoplay=1';}else{autoplay='?autoplay=1';}}else if(cloneSrc.indexOf('dailymotion')!=-1){if(cloneSrc.indexOf('?')!=-1){autoplay='&autoPlay=1';}else{autoplay='?autoPlay=1';}}
clone.attr('src',cloneSrc+autoplay);videoPresent=true;}else{$(this).css({position:'absolute',top:0,left:0,zIndex:10}).after(clone);clone.css({position:'absolute',top:0,left:0,zIndex:9});}});});}
imgFake();if(opts.hover==true){if(!isMobile()){fakeHover.hover(function(){elem.addClass('hovered');},function(){elem.removeClass('hovered');});}}
if(navHover==true){$(prevNav,wrap).animate({opacity:0},0);$(nextNav,wrap).animate({opacity:0},0);$(commands,wrap).animate({opacity:0},0);if(isMobile()){fakeHover.live('vmouseover',function(){$(prevNav,wrap).animate({opacity:1},200);$(nextNav,wrap).animate({opacity:1},200);$(commands,wrap).animate({opacity:1},200);});fakeHover.live('vmouseout',function(){$(prevNav,wrap).delay(500).animate({opacity:0},200);$(nextNav,wrap).delay(500).animate({opacity:0},200);$(commands,wrap).delay(500).animate({opacity:0},200);});}else{fakeHover.hover(function(){$(prevNav,wrap).animate({opacity:1},200);$(nextNav,wrap).animate({opacity:1},200);$(commands,wrap).animate({opacity:1},200);},function(){$(prevNav,wrap).animate({opacity:0},200);$(nextNav,wrap).animate({opacity:0},200);$(commands,wrap).animate({opacity:0},200);});}}
$('.camera_stop',camera_thumbs_wrap).live('click',function(){autoAdv=false;elem.addClass('paused');if($('.camera_stop',camera_thumbs_wrap).length){$('.camera_stop',camera_thumbs_wrap).hide()
$('.camera_play',camera_thumbs_wrap).show();if(loader!='none'){$('#'+pieID).hide();}}else{if(loader!='none'){$('#'+pieID).hide();}}});$('.camera_play',camera_thumbs_wrap).live('click',function(){autoAdv=true;elem.removeClass('paused');if($('.camera_play',camera_thumbs_wrap).length){$('.camera_play',camera_thumbs_wrap).hide();$('.camera_stop',camera_thumbs_wrap).show();if(loader!='none'){$('#'+pieID).show();}}else{if(loader!='none'){$('#'+pieID).show();}}});if(opts.pauseOnClick==true){$('.camera_target_content',fakeHover).mouseup(function(){autoAdv=false;elem.addClass('paused');$('.camera_stop',camera_thumbs_wrap).hide()
$('.camera_play',camera_thumbs_wrap).show();$('#'+pieID).hide();});}
$('.cameraContent, .imgFake',fakeHover).hover(function(){videoHover=true;},function(){videoHover=false;});$('.cameraContent, .imgFake',fakeHover).bind('click',function(){if(videoPresent==true&&videoHover==true){autoAdv=false;$('.camera_caption',fakeHover).hide();elem.addClass('paused');$('.camera_stop',camera_thumbs_wrap).hide()
$('.camera_play',camera_thumbs_wrap).show();$('#'+pieID).hide();}});}
function shuffle(arr){for(var j,x,i=arr.length;i;j=parseInt(Math.random()*i),x=arr[--i],arr[i]=arr[j],arr[j]=x);return arr;}
function isInteger(s){return Math.ceil(s)==Math.floor(s);}
if(loader!='pie'){barContainer.append('<span class="camera_bar_cont" />');$('.camera_bar_cont',barContainer).animate({opacity:opts.loaderOpacity},0).css({'position':'absolute','left':0,'right':0,'top':0,'bottom':0,'background-color':opts.loaderBgColor}).append('<span id="'+pieID+'" />');$('#'+pieID).animate({opacity:0},0);var canvas=$('#'+pieID);canvas.css({'position':'absolute','background-color':opts.loaderColor});switch(opts.barPosition){case'left':barContainer.css({right:'auto',width:opts.loaderStroke});break;case'right':barContainer.css({left:'auto',width:opts.loaderStroke});break;case'top':barContainer.css({bottom:'auto',height:opts.loaderStroke});break;case'bottom':barContainer.css({top:'auto',height:opts.loaderStroke});break;}
switch(barDirection){case'leftToRight':canvas.css({'left':0,'right':0,'top':opts.loaderPadding,'bottom':opts.loaderPadding});break;case'rightToLeft':canvas.css({'left':0,'right':0,'top':opts.loaderPadding,'bottom':opts.loaderPadding});break;case'topToBottom':canvas.css({'left':opts.loaderPadding,'right':opts.loaderPadding,'top':0,'bottom':0});break;case'bottomToTop':canvas.css({'left':opts.loaderPadding,'right':opts.loaderPadding,'top':0,'bottom':0});break;}}else{pieContainer.append('<canvas id="'+pieID+'"></canvas>');var G_vmlCanvasManager;var canvas=document.getElementById(pieID);canvas.setAttribute("width",opts.pieDiameter);canvas.setAttribute("height",opts.pieDiameter);var piePosition;switch(opts.piePosition){case'leftTop':piePosition='left:0; top:0;';break;case'rightTop':piePosition='right:0; top:0;';break;case'leftBottom':piePosition='left:0; bottom:0;';break;case'rightBottom':piePosition='right:0; bottom:0;';break;}
canvas.setAttribute("style","position:absolute; z-index:1002; "+piePosition);var rad;var radNew;if(canvas&&canvas.getContext){var ctx=canvas.getContext("2d");ctx.rotate(Math.PI*(3/2));ctx.translate(-opts.pieDiameter,0);}}
if(loader=='none'||autoAdv==false){$('#'+pieID).hide();$('.camera_canvas_wrap',camera_thumbs_wrap).hide();}
if($(pagination).length){$(pagination).append('<ul class="camera_pag_ul" />');var li;for(li=0;li<amountSlide;li++){$('.camera_pag_ul',wrap).append('<li class="pag_nav_'+li+'" style="position:relative; z-index:1002"><span><span>'+li+'</span></span></li>');}
$('.camera_pag_ul li',wrap).hover(function(){$(this).addClass('camera_hover');if($('.camera_thumb',this).length){var wTh=$('.camera_thumb',this).outerWidth(),hTh=$('.camera_thumb',this).outerHeight(),wTt=$(this).outerWidth();$('.camera_thumb',this).show().css({'top':'-'+hTh+'px','left':'-'+(wTh-wTt)/2+'px'}).animate({'opacity':1,'margin-top':'-3px'},200);$('.thumb_arrow',this).show().animate({'opacity':1,'margin-top':'-3px'},200);}},function(){$(this).removeClass('camera_hover');$('.camera_thumb',this).animate({'margin-top':'-20px','opacity':0},200,function(){$(this).css({marginTop:'5px'}).hide();});$('.thumb_arrow',this).animate({'margin-top':'-20px','opacity':0},200,function(){$(this).css({marginTop:'5px'}).hide();});});}
if($(thumbs).length){var thumbUrl;if(!$(pagination).length){$(thumbs).append('<div />');$(thumbs).before('<div class="camera_prevThumbs hideNav"><div></div></div>').before('<div class="camera_nextThumbs hideNav"><div></div></div>');$('> div',thumbs).append('<ul />');$.each(allThumbs,function(i,val){if($('> div',elem).eq(i).attr('data-thumb')!=''){var thumbUrl=$('> div',elem).eq(i).attr('data-thumb'),newImg=new Image();newImg.src=thumbUrl;$('ul',thumbs).append('<li class="pix_thumb pix_thumb_'+i+'" />');$('li.pix_thumb_'+i,thumbs).append($(newImg).attr('class','camera_thumb'));}});}else{$.each(allThumbs,function(i,val){if($('> div',elem).eq(i).attr('data-thumb')!=''){var thumbUrl=$('> div',elem).eq(i).attr('data-thumb'),newImg=new Image();newImg.src=thumbUrl;$('li.pag_nav_'+i,pagination).append($(newImg).attr('class','camera_thumb').css({'position':'absolute'}).animate({opacity:0},0));$('li.pag_nav_'+i+' > img',pagination).after('<div class="thumb_arrow" />');$('li.pag_nav_'+i+' > .thumb_arrow',pagination).animate({opacity:0},0);}});wrap.css({marginBottom:$(pagination).outerHeight()});}}else if(!$(thumbs).length&&$(pagination).length){wrap.css({marginBottom:$(pagination).outerHeight()});}
var firstPos=true;function thumbnailPos(){if($(thumbs).length&&!$(pagination).length){var wTh=$(thumbs).outerWidth(),owTh=$('ul > li',thumbs).outerWidth(),pos=$('li.cameracurrent',thumbs).length?$('li.cameracurrent',thumbs).position():'',ulW=($('ul > li',thumbs).length*$('ul > li',thumbs).outerWidth()),offUl=$('ul',thumbs).offset().left,offDiv=$('> div',thumbs).offset().left,ulLeft;if(offUl<0){ulLeft='-'+(offDiv-offUl);}else{ulLeft=offDiv-offUl;}
if(firstPos==true){$('ul',thumbs).width($('ul > li',thumbs).length*$('ul > li',thumbs).outerWidth());if($(thumbs).length&&!$(pagination).lenght){wrap.css({marginBottom:$(thumbs).outerHeight()});}
thumbnailVisible();$('ul',thumbs).width($('ul > li',thumbs).length*$('ul > li',thumbs).outerWidth());if($(thumbs).length&&!$(pagination).lenght){wrap.css({marginBottom:$(thumbs).outerHeight()});}}
firstPos=false;var left=$('li.cameracurrent',thumbs).length?pos.left:'',right=$('li.cameracurrent',thumbs).length?pos.left+($('li.cameracurrent',thumbs).outerWidth()):'';if(left<$('li.cameracurrent',thumbs).outerWidth()){left=0;}
if(right-ulLeft>wTh){if((left+wTh)<ulW){$('ul',thumbs).animate({'margin-left':'-'+(left)+'px'},500,thumbnailVisible);}else{$('ul',thumbs).animate({'margin-left':'-'+($('ul',thumbs).outerWidth()-wTh)+'px'},500,thumbnailVisible);}}else if(left-ulLeft<0){$('ul',thumbs).animate({'margin-left':'-'+(left)+'px'},500,thumbnailVisible);}else{$('ul',thumbs).css({'margin-left':'auto','margin-right':'auto'});setTimeout(thumbnailVisible,100);}}}
if($(commands).length){$(commands).append('<div class="camera_play"></div>').append('<div class="camera_stop"></div>');if(autoAdv==true){$('.camera_play',camera_thumbs_wrap).hide();$('.camera_stop',camera_thumbs_wrap).show();}else{$('.camera_stop',camera_thumbs_wrap).hide();$('.camera_play',camera_thumbs_wrap).show();}}
function canvasLoader(){rad=0;var barWidth=$('.camera_bar_cont',camera_thumbs_wrap).width(),barHeight=$('.camera_bar_cont',camera_thumbs_wrap).height();if(loader!='pie'){switch(barDirection){case'leftToRight':$('#'+pieID).css({'right':barWidth});break;case'rightToLeft':$('#'+pieID).css({'left':barWidth});break;case'topToBottom':$('#'+pieID).css({'bottom':barHeight});break;case'bottomToTop':$('#'+pieID).css({'top':barHeight});break;}}else{ctx.clearRect(0,0,opts.pieDiameter,opts.pieDiameter);}}
canvasLoader();$('.moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom',fakeHover).each(function(){$(this).css('visibility','hidden');});opts.onStartLoading.call(this);nextSlide();function nextSlide(navSlide){elem.addClass('camerasliding');videoPresent=false;var vis=parseFloat($('div.cameraSlide.cameracurrent',target).index());if(navSlide>0){var slideI=navSlide-1;}else if(vis==amountSlide-1){var slideI=0;}else{var slideI=vis+1;}
var slide=$('.cameraSlide:eq('+slideI+')',target);var slideNext=$('.cameraSlide:eq('+(slideI+1)+')',target).addClass('cameranext');if(vis!=slideI+1){slideNext.hide();}
$('.cameraContent',fakeHover).fadeOut(600);$('.camera_caption',fakeHover).show();$('.camerarelative',slide).append($('> div ',elem).eq(slideI).find('> div.camera_effected'));$('.camera_target_content .cameraContent:eq('+slideI+')',wrap).append($('> div ',elem).eq(slideI).find('> div'));if(!$('.imgLoaded',slide).length){var imgUrl=allImg[slideI];var imgLoaded=new Image();imgLoaded.src=imgUrl+"?"+new Date().getTime();slide.css('visibility','hidden');slide.prepend($(imgLoaded).attr('class','imgLoaded').css('visibility','hidden'));var wT,hT;if(!$(imgLoaded).get(0).complete||wT=='0'||hT=='0'||typeof wT==='undefined'||wT===false||typeof hT==='undefined'||hT===false){$('.camera_loader',wrap).delay(500).fadeIn(400);imgLoaded.onload=function(){wT=imgLoaded.naturalWidth;hT=imgLoaded.naturalHeight;$(imgLoaded).attr('data-alignment',allAlign[slideI]).attr('data-portrait',allPor[slideI]);$(imgLoaded).attr('width',wT);$(imgLoaded).attr('height',hT);target.find('.cameraSlide_'+slideI).hide().css('visibility','visible');resizeImage();nextSlide(slideI+1);};}}else{if(allImg.length>(slideI+1)&&!$('.imgLoaded',slideNext).length){var imgUrl2=allImg[(slideI+1)];var imgLoaded2=new Image();imgLoaded2.src=imgUrl2+"?"+new Date().getTime();slideNext.prepend($(imgLoaded2).attr('class','imgLoaded').css('visibility','hidden'));imgLoaded2.onload=function(){wT=imgLoaded2.naturalWidth;hT=imgLoaded2.naturalHeight;$(imgLoaded2).attr('data-alignment',allAlign[slideI+1]).attr('data-portrait',allPor[slideI+1]);$(imgLoaded2).attr('width',wT);$(imgLoaded2).attr('height',hT);resizeImage();};}
opts.onLoaded.call(this);if($('.camera_loader',wrap).is(':visible')){$('.camera_loader',wrap).fadeOut(400);}else{$('.camera_loader',wrap).css({'visibility':'hidden'});$('.camera_loader',wrap).fadeOut(400,function(){$('.camera_loader',wrap).css({'visibility':'visible'});});}
var rows=opts.rows,cols=opts.cols,couples=1,difference=0,dataSlideOn,time,transPeriod,fx,easing,randomFx=new Array('simpleFade','curtainTopLeft','curtainTopRight','curtainBottomLeft','curtainBottomRight','curtainSliceLeft','curtainSliceRight','blindCurtainTopLeft','blindCurtainTopRight','blindCurtainBottomLeft','blindCurtainBottomRight','blindCurtainSliceBottom','blindCurtainSliceTop','stampede','mosaic','mosaicReverse','mosaicRandom','mosaicSpiral','mosaicSpiralReverse','topLeftBottomRight','bottomRightTopLeft','bottomLeftTopRight','topRightBottomLeft','scrollLeft','scrollRight','scrollTop','scrollBottom','scrollHorz');marginLeft=0,marginTop=0,opacityOnGrid=0;if(opts.opacityOnGrid==true){opacityOnGrid=0;}else{opacityOnGrid=1;}
var dataFx=$(' > div',elem).eq(slideI).attr('data-fx');if(isMobile()&&opts.mobileFx!=''&&opts.mobileFx!='default'){fx=opts.mobileFx;}else{if(typeof dataFx!=='undefined'&&dataFx!==false&&dataFx!=='default'){fx=dataFx;}else{fx=opts.fx;}}
if(fx=='random'){fx=shuffle(randomFx);fx=fx[0];}else{fx=fx;if(fx.indexOf(',')>0){fx=fx.replace(/ /g,'');fx=fx.split(',');fx=shuffle(fx);fx=fx[0];}}
dataEasing=$(' > div',elem).eq(slideI).attr('data-easing');mobileEasing=$(' > div',elem).eq(slideI).attr('data-mobileEasing');if(isMobile()&&opts.mobileEasing!=''&&opts.mobileEasing!='default'){if(typeof mobileEasing!=='undefined'&&mobileEasing!==false&&mobileEasing!=='default'){easing=mobileEasing;}else{easing=opts.mobileEasing;}}else{if(typeof dataEasing!=='undefined'&&dataEasing!==false&&dataEasing!=='default'){easing=dataEasing;}else{easing=opts.easing;}}
dataSlideOn=$(' > div',elem).eq(slideI).attr('data-slideOn');if(typeof dataSlideOn!=='undefined'&&dataSlideOn!==false){slideOn=dataSlideOn;}else{if(opts.slideOn=='random'){var slideOn=new Array('next','prev');slideOn=shuffle(slideOn);slideOn=slideOn[0];}else{slideOn=opts.slideOn;}}
var dataTime=$(' > div',elem).eq(slideI).attr('data-time');if(typeof dataTime!=='undefined'&&dataTime!==false&&dataTime!==''){time=parseFloat(dataTime);}else{time=opts.time;}
var dataTransPeriod=$(' > div',elem).eq(slideI).attr('data-transPeriod');if(typeof dataTransPeriod!=='undefined'&&dataTransPeriod!==false&&dataTransPeriod!==''){transPeriod=parseFloat(dataTransPeriod);}else{transPeriod=opts.transPeriod;}
if(!$(elem).hasClass('camerastarted')){fx='simpleFade';slideOn='next';easing='';transPeriod=400;$(elem).addClass('camerastarted')}
switch(fx){case'simpleFade':cols=1;rows=1;break;case'curtainTopLeft':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'curtainTopRight':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'curtainBottomLeft':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'curtainBottomRight':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'curtainSliceLeft':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'curtainSliceRight':if(opts.slicedCols==0){cols=opts.cols;}else{cols=opts.slicedCols;}
rows=1;break;case'blindCurtainTopLeft':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'blindCurtainTopRight':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'blindCurtainBottomLeft':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'blindCurtainBottomRight':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'blindCurtainSliceTop':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'blindCurtainSliceBottom':if(opts.slicedRows==0){rows=opts.rows;}else{rows=opts.slicedRows;}
cols=1;break;case'stampede':difference='-'+transPeriod;break;case'mosaic':difference=opts.gridDifference;break;case'mosaicReverse':difference=opts.gridDifference;break;case'mosaicRandom':break;case'mosaicSpiral':difference=opts.gridDifference;couples=1.7;break;case'mosaicSpiralReverse':difference=opts.gridDifference;couples=1.7;break;case'topLeftBottomRight':difference=opts.gridDifference;couples=6;break;case'bottomRightTopLeft':difference=opts.gridDifference;couples=6;break;case'bottomLeftTopRight':difference=opts.gridDifference;couples=6;break;case'topRightBottomLeft':difference=opts.gridDifference;couples=6;break;case'scrollLeft':cols=1;rows=1;break;case'scrollRight':cols=1;rows=1;break;case'scrollTop':cols=1;rows=1;break;case'scrollBottom':cols=1;rows=1;break;case'scrollHorz':cols=1;rows=1;break;}
var cycle=0;var blocks=rows*cols;var leftScrap=w-(Math.floor(w/cols)*cols);var topScrap=h-(Math.floor(h/rows)*rows);var addLeft;var addTop;var tAppW=0;var tAppH=0;var arr=new Array();var delay=new Array();var order=new Array();while(cycle<blocks){arr.push(cycle);delay.push(cycle);cameraCont.append('<div class="cameraappended" style="display:none; overflow:hidden; position:absolute; z-index:1000" />');var tApp=$('.cameraappended:eq('+cycle+')',target);if(fx=='scrollLeft'||fx=='scrollRight'||fx=='scrollTop'||fx=='scrollBottom'||fx=='scrollHorz'){selector.eq(slideI).clone().show().appendTo(tApp);}else{if(slideOn=='next'){selector.eq(slideI).clone().show().appendTo(tApp);}else{selector.eq(vis).clone().show().appendTo(tApp);}}
if(cycle%cols<leftScrap){addLeft=1;}else{addLeft=0;}
if(cycle%cols==0){tAppW=0;}
if(Math.floor(cycle/cols)<topScrap){addTop=1;}else{addTop=0;}
tApp.css({'height':Math.floor((h/rows)+addTop+1),'left':tAppW,'top':tAppH,'width':Math.floor((w/cols)+addLeft+1)});$('> .cameraSlide',tApp).css({'height':h,'margin-left':'-'+tAppW+'px','margin-top':'-'+tAppH+'px','width':w});tAppW=tAppW+tApp.width()-1;if(cycle%cols==cols-1){tAppH=tAppH+tApp.height()-1;}
cycle++;}
switch(fx){case'curtainTopLeft':break;case'curtainBottomLeft':break;case'curtainSliceLeft':break;case'curtainTopRight':arr=arr.reverse();break;case'curtainBottomRight':arr=arr.reverse();break;case'curtainSliceRight':arr=arr.reverse();break;case'blindCurtainTopLeft':break;case'blindCurtainBottomLeft':arr=arr.reverse();break;case'blindCurtainSliceTop':break;case'blindCurtainTopRight':break;case'blindCurtainBottomRight':arr=arr.reverse();break;case'blindCurtainSliceBottom':arr=arr.reverse();break;case'stampede':arr=shuffle(arr);break;case'mosaic':break;case'mosaicReverse':arr=arr.reverse();break;case'mosaicRandom':arr=shuffle(arr);break;case'mosaicSpiral':var rows2=rows/2,x,y,z,n=0;for(z=0;z<rows2;z++){y=z;for(x=z;x<cols-z-1;x++){order[n++]=y*cols+x;}
x=cols-z-1;for(y=z;y<rows-z-1;y++){order[n++]=y*cols+x;}
y=rows-z-1;for(x=cols-z-1;x>z;x--){order[n++]=y*cols+x;}
x=z;for(y=rows-z-1;y>z;y--){order[n++]=y*cols+x;}}
arr=order;break;case'mosaicSpiralReverse':var rows2=rows/2,x,y,z,n=blocks-1;for(z=0;z<rows2;z++){y=z;for(x=z;x<cols-z-1;x++){order[n--]=y*cols+x;}
x=cols-z-1;for(y=z;y<rows-z-1;y++){order[n--]=y*cols+x;}
y=rows-z-1;for(x=cols-z-1;x>z;x--){order[n--]=y*cols+x;}
x=z;for(y=rows-z-1;y>z;y--){order[n--]=y*cols+x;}}
arr=order;break;case'topLeftBottomRight':for(var y=0;y<rows;y++)
for(var x=0;x<cols;x++){order.push(x+y);}
delay=order;break;case'bottomRightTopLeft':for(var y=0;y<rows;y++)
for(var x=0;x<cols;x++){order.push(x+y);}
delay=order.reverse();break;case'bottomLeftTopRight':for(var y=rows;y>0;y--)
for(var x=0;x<cols;x++){order.push(x+y);}
delay=order;break;case'topRightBottomLeft':for(var y=0;y<rows;y++)
for(var x=cols;x>0;x--){order.push(x+y);}
delay=order;break;}
$.each(arr,function(index,value){if(value%cols<leftScrap){addLeft=1;}else{addLeft=0;}
if(value%cols==0){tAppW=0;}
if(Math.floor(value/cols)<topScrap){addTop=1;}else{addTop=0;}
switch(fx){case'simpleFade':height=h;width=w;opacityOnGrid=0;break;case'curtainTopLeft':height=0,width=Math.floor((w/cols)+addLeft+1),marginTop='-'+Math.floor((h/rows)+addTop+1)+'px';break;case'curtainTopRight':height=0,width=Math.floor((w/cols)+addLeft+1),marginTop='-'+Math.floor((h/rows)+addTop+1)+'px';break;case'curtainBottomLeft':height=0,width=Math.floor((w/cols)+addLeft+1),marginTop=Math.floor((h/rows)+addTop+1)+'px';break;case'curtainBottomRight':height=0,width=Math.floor((w/cols)+addLeft+1),marginTop=Math.floor((h/rows)+addTop+1)+'px';break;case'curtainSliceLeft':height=0,width=Math.floor((w/cols)+addLeft+1);if(value%2==0){marginTop=Math.floor((h/rows)+addTop+1)+'px';}else{marginTop='-'+Math.floor((h/rows)+addTop+1)+'px';}
break;case'curtainSliceRight':height=0,width=Math.floor((w/cols)+addLeft+1);if(value%2==0){marginTop=Math.floor((h/rows)+addTop+1)+'px';}else{marginTop='-'+Math.floor((h/rows)+addTop+1)+'px';}
break;case'blindCurtainTopLeft':height=Math.floor((h/rows)+addTop+1),width=0,marginLeft='-'+Math.floor((w/cols)+addLeft+1)+'px';break;case'blindCurtainTopRight':height=Math.floor((h/rows)+addTop+1),width=0,marginLeft=Math.floor((w/cols)+addLeft+1)+'px';break;case'blindCurtainBottomLeft':height=Math.floor((h/rows)+addTop+1),width=0,marginLeft='-'+Math.floor((w/cols)+addLeft+1)+'px';break;case'blindCurtainBottomRight':height=Math.floor((h/rows)+addTop+1),width=0,marginLeft=Math.floor((w/cols)+addLeft+1)+'px';break;case'blindCurtainSliceBottom':height=Math.floor((h/rows)+addTop+1),width=0;if(value%2==0){marginLeft='-'+Math.floor((w/cols)+addLeft+1)+'px';}else{marginLeft=Math.floor((w/cols)+addLeft+1)+'px';}
break;case'blindCurtainSliceTop':height=Math.floor((h/rows)+addTop+1),width=0;if(value%2==0){marginLeft='-'+Math.floor((w/cols)+addLeft+1)+'px';}else{marginLeft=Math.floor((w/cols)+addLeft+1)+'px';}
break;case'stampede':height=0;width=0;marginLeft=(w*0.2)*(((index)%cols)-(cols-(Math.floor(cols/2))))+'px';marginTop=(h*0.2)*((Math.floor(index/cols)+1)-(rows-(Math.floor(rows/2))))+'px';break;case'mosaic':height=0;width=0;break;case'mosaicReverse':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)+'px';marginTop=Math.floor((h/rows)+addTop+1)+'px';break;case'mosaicRandom':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)*0.5+'px';marginTop=Math.floor((h/rows)+addTop+1)*0.5+'px';break;case'mosaicSpiral':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)*0.5+'px';marginTop=Math.floor((h/rows)+addTop+1)*0.5+'px';break;case'mosaicSpiralReverse':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)*0.5+'px';marginTop=Math.floor((h/rows)+addTop+1)*0.5+'px';break;case'topLeftBottomRight':height=0;width=0;break;case'bottomRightTopLeft':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)+'px';marginTop=Math.floor((h/rows)+addTop+1)+'px';break;case'bottomLeftTopRight':height=0;width=0;marginLeft=0;marginTop=Math.floor((h/rows)+addTop+1)+'px';break;case'topRightBottomLeft':height=0;width=0;marginLeft=Math.floor((w/cols)+addLeft+1)+'px';marginTop=0;break;case'scrollRight':height=h;width=w;marginLeft=-w;break;case'scrollLeft':height=h;width=w;marginLeft=w;break;case'scrollTop':height=h;width=w;marginTop=h;break;case'scrollBottom':height=h;width=w;marginTop=-h;break;case'scrollHorz':height=h;width=w;if(vis==0&&slideI==amountSlide-1){marginLeft=-w;}else if(vis<slideI||(vis==amountSlide-1&&slideI==0)){marginLeft=w;}else{marginLeft=-w;}
break;}
var tApp=$('.cameraappended:eq('+value+')',target);if(typeof u!=='undefined'){clearInterval(u);clearTimeout(setT);setT=setTimeout(canvasLoader,transPeriod+difference);}
if($(pagination).length){$('.camera_pag li',wrap).removeClass('cameracurrent');$('.camera_pag li',wrap).eq(slideI).addClass('cameracurrent');}
if($(thumbs).length){$('li',thumbs).removeClass('cameracurrent');$('li',thumbs).eq(slideI).addClass('cameracurrent');$('li',thumbs).not('.cameracurrent').find('img').animate({opacity:.5},0);$('li.cameracurrent img',thumbs).animate({opacity:1},0);$('li',thumbs).hover(function(){$('img',this).stop(true,false).animate({opacity:1},150);},function(){if(!$(this).hasClass('cameracurrent')){$('img',this).stop(true,false).animate({opacity:.5},150);}});}
var easedTime=parseFloat(transPeriod)+parseFloat(difference);function cameraeased(){$(this).addClass('cameraeased');if($('.cameraeased',target).length>=0){$(thumbs).css({visibility:'visible'});}
if($('.cameraeased',target).length==blocks){thumbnailPos();$('.moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom',fakeHover).each(function(){$(this).css('visibility','hidden');});selector.eq(slideI).show().css('z-index','999').removeClass('cameranext').addClass('cameracurrent');selector.eq(vis).css('z-index','1').removeClass('cameracurrent');$('.cameraContent',fakeHover).eq(slideI).addClass('cameracurrent');if(vis>=0){$('.cameraContent',fakeHover).eq(vis).removeClass('cameracurrent');}
opts.onEndTransition.call(this);if($('> div',elem).eq(slideI).attr('data-video')!='hide'&&$('.cameraContent.cameracurrent .imgFake',fakeHover).length){$('.cameraContent.cameracurrent .imgFake',fakeHover).click();}
var lMoveIn=selector.eq(slideI).find('.fadeIn').length;var lMoveInContent=$('.cameraContent',fakeHover).eq(slideI).find('.moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom').length;if(lMoveIn!=0){$('.cameraSlide.cameracurrent .fadeIn',fakeHover).each(function(){if($(this).attr('data-easing')!=''){var easeMove=$(this).attr('data-easing');}else{var easeMove=easing;}
var t=$(this);if(typeof t.attr('data-outerWidth')==='undefined'||t.attr('data-outerWidth')===false||t.attr('data-outerWidth')===''){var wMoveIn=t.outerWidth();t.attr('data-outerWidth',wMoveIn);}else{var wMoveIn=t.attr('data-outerWidth');}
if(typeof t.attr('data-outerHeight')==='undefined'||t.attr('data-outerHeight')===false||t.attr('data-outerHeight')===''){var hMoveIn=t.outerHeight();t.attr('data-outerHeight',hMoveIn);}else{var hMoveIn=t.attr('data-outerHeight');}
var pos=t.position();var left=pos.left;var top=pos.top;var tClass=t.attr('class');var ind=t.index();var hRel=t.parents('.camerarelative').outerHeight();var wRel=t.parents('.camerarelative').outerWidth();if(tClass.indexOf("fadeIn")!=-1){t.animate({opacity:0},0).css('visibility','visible').delay((time/lMoveIn)*(0.1*(ind-1))).animate({opacity:1},(time/lMoveIn)*0.15,easeMove);}else{t.css('visibility','visible');}});}
$('.cameraContent.cameracurrent',fakeHover).show();if(lMoveInContent!=0){$('.cameraContent.cameracurrent .moveFromLeft, .cameraContent.cameracurrent .moveFromRight, .cameraContent.cameracurrent .moveFromTop, .cameraContent.cameracurrent .moveFromBottom, .cameraContent.cameracurrent .fadeIn, .cameraContent.cameracurrent .fadeFromLeft, .cameraContent.cameracurrent .fadeFromRight, .cameraContent.cameracurrent .fadeFromTop, .cameraContent.cameracurrent .fadeFromBottom',fakeHover).each(function(){if($(this).attr('data-easing')!=''){var easeMove=$(this).attr('data-easing');}else{var easeMove=easing;}
var t=$(this);var pos=t.position();var left=pos.left;var top=pos.top;var tClass=t.attr('class');var ind=t.index();var thisH=t.outerHeight();if(tClass.indexOf("moveFromLeft")!=-1){t.css({'left':'-'+(w)+'px','right':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'left':pos.left},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("moveFromRight")!=-1){t.css({'left':w+'px','right':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'left':pos.left},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("moveFromTop")!=-1){t.css({'top':'-'+h+'px','bottom':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'top':pos.top},(time/lMoveInContent)*0.15,easeMove,function(){t.css({top:'auto',bottom:0});});}else if(tClass.indexOf("moveFromBottom")!=-1){t.css({'top':h+'px','bottom':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'top':pos.top},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("fadeFromLeft")!=-1){t.animate({opacity:0},0).css({'left':'-'+(w)+'px','right':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'left':pos.left,opacity:1},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("fadeFromRight")!=-1){t.animate({opacity:0},0).css({'left':(w)+'px','right':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'left':pos.left,opacity:1},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("fadeFromTop")!=-1){t.animate({opacity:0},0).css({'top':'-'+(h)+'px','bottom':'auto'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'top':pos.top,opacity:1},(time/lMoveInContent)*0.15,easeMove,function(){t.css({top:'auto',bottom:0});});}else if(tClass.indexOf("fadeFromBottom")!=-1){t.animate({opacity:0},0).css({'bottom':'-'+thisH+'px'});t.css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({'bottom':'0',opacity:1},(time/lMoveInContent)*0.15,easeMove);}else if(tClass.indexOf("fadeIn")!=-1){t.animate({opacity:0},0).css('visibility','visible').delay((time/lMoveInContent)*(0.1*(ind-1))).animate({opacity:1},(time/lMoveInContent)*0.15,easeMove);}else{t.css('visibility','visible');}});}
$('.cameraappended',target).remove();elem.removeClass('camerasliding');selector.eq(vis).hide();var barWidth=$('.camera_bar_cont',camera_thumbs_wrap).width(),barHeight=$('.camera_bar_cont',camera_thumbs_wrap).height(),radSum;if(loader!='pie'){radSum=0.05;}else{radSum=0.005;}
$('#'+pieID).animate({opacity:opts.loaderOpacity},200);u=setInterval(function(){if(elem.hasClass('stopped')){clearInterval(u);}
if(loader!='pie'){if(rad<=1.002&&!elem.hasClass('stopped')&&!elem.hasClass('paused')&&!elem.hasClass('hovered')){rad=(rad+radSum);}else if(rad<=1&&(elem.hasClass('stopped')||elem.hasClass('paused')||elem.hasClass('stopped')||elem.hasClass('hovered'))){rad=rad;}else{if(!elem.hasClass('stopped')&&!elem.hasClass('paused')&&!elem.hasClass('hovered')){clearInterval(u);imgFake();$('#'+pieID).animate({opacity:0},200,function(){clearTimeout(setT);setT=setTimeout(canvasLoader,easedTime);nextSlide();opts.onStartLoading.call(this);});}}
switch(barDirection){case'leftToRight':$('#'+pieID).animate({'right':barWidth-(barWidth*rad)},(time*radSum),'linear');break;case'rightToLeft':$('#'+pieID).animate({'left':barWidth-(barWidth*rad)},(time*radSum),'linear');break;case'topToBottom':$('#'+pieID).animate({'bottom':barHeight-(barHeight*rad)},(time*radSum),'linear');break;case'bottomToTop':$('#'+pieID).animate({'bottom':barHeight-(barHeight*rad)},(time*radSum),'linear');break;}}else{radNew=rad;ctx.clearRect(0,0,opts.pieDiameter,opts.pieDiameter);ctx.globalCompositeOperation='destination-over';ctx.beginPath();ctx.arc((opts.pieDiameter)/2,(opts.pieDiameter)/2,(opts.pieDiameter)/2-opts.loaderStroke,0,Math.PI*2,false);ctx.lineWidth=opts.loaderStroke;ctx.strokeStyle=opts.loaderBgColor;ctx.stroke();ctx.closePath();ctx.globalCompositeOperation='source-over';ctx.beginPath();ctx.arc((opts.pieDiameter)/2,(opts.pieDiameter)/2,(opts.pieDiameter)/2-opts.loaderStroke,0,Math.PI*2*radNew,false);ctx.lineWidth=opts.loaderStroke-(opts.loaderPadding*2);ctx.strokeStyle=opts.loaderColor;ctx.stroke();ctx.closePath();if(rad<=1.002&&!elem.hasClass('stopped')&&!elem.hasClass('paused')&&!elem.hasClass('hovered')){rad=(rad+radSum);}else if(rad<=1&&(elem.hasClass('stopped')||elem.hasClass('paused')||elem.hasClass('hovered'))){rad=rad;}else{if(!elem.hasClass('stopped')&&!elem.hasClass('paused')&&!elem.hasClass('hovered')){clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},200,function(){clearTimeout(setT);setT=setTimeout(canvasLoader,easedTime);nextSlide();opts.onStartLoading.call(this);});}}}},time*radSum);}}
if(fx=='scrollLeft'||fx=='scrollRight'||fx=='scrollTop'||fx=='scrollBottom'||fx=='scrollHorz'){opts.onStartTransition.call(this);easedTime=0;tApp.delay((((transPeriod+difference)/blocks)*delay[index]*couples)*0.5).css({'display':'block','height':height,'margin-left':marginLeft,'margin-top':marginTop,'width':width}).animate({'height':Math.floor((h/rows)+addTop+1),'margin-top':0,'margin-left':0,'width':Math.floor((w/cols)+addLeft+1)},(transPeriod-difference),easing,cameraeased);selector.eq(vis).delay((((transPeriod+difference)/blocks)*delay[index]*couples)*0.5).animate({'margin-left':marginLeft*(-1),'margin-top':marginTop*(-1)},(transPeriod-difference),easing,function(){$(this).css({'margin-top':0,'margin-left':0});});}else{opts.onStartTransition.call(this);easedTime=parseFloat(transPeriod)+parseFloat(difference);if(slideOn=='next'){tApp.delay((((transPeriod+difference)/blocks)*delay[index]*couples)*0.5).css({'display':'block','height':height,'margin-left':marginLeft,'margin-top':marginTop,'width':width,'opacity':opacityOnGrid}).animate({'height':Math.floor((h/rows)+addTop+1),'margin-top':0,'margin-left':0,'opacity':1,'width':Math.floor((w/cols)+addLeft+1)},(transPeriod-difference),easing,cameraeased);}else{selector.eq(slideI).show().css('z-index','999').addClass('cameracurrent');selector.eq(vis).css('z-index','1').removeClass('cameracurrent');$('.cameraContent',fakeHover).eq(slideI).addClass('cameracurrent');$('.cameraContent',fakeHover).eq(vis).removeClass('cameracurrent');tApp.delay((((transPeriod+difference)/blocks)*delay[index]*couples)*0.5).css({'display':'block','height':Math.floor((h/rows)+addTop+1),'margin-top':0,'margin-left':0,'opacity':1,'width':Math.floor((w/cols)+addLeft+1)}).animate({'height':height,'margin-left':marginLeft,'margin-top':marginTop,'width':width,'opacity':opacityOnGrid},(transPeriod-difference),easing,cameraeased);}}});}}
if($(prevNav).length){$(prevNav).click(function(){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($('.cameraSlide.cameracurrent',target).index());clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',wrap).animate({opacity:0},0);canvasLoader();if(idNum!=0){nextSlide(idNum);}else{nextSlide(amountSlide);}
opts.onStartLoading.call(this);}});}
if($(nextNav).length){$(nextNav).click(function(){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($('.cameraSlide.cameracurrent',target).index());clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},0);canvasLoader();if(idNum==amountSlide-1){nextSlide(1);}else{nextSlide(idNum+2);}
opts.onStartLoading.call(this);}});}
if(isMobile()){fakeHover.bind('swipeleft',function(event){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($('.cameraSlide.cameracurrent',target).index());clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},0);canvasLoader();if(idNum==amountSlide-1){nextSlide(1);}else{nextSlide(idNum+2);}
opts.onStartLoading.call(this);}});fakeHover.bind('swiperight',function(event){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($('.cameraSlide.cameracurrent',target).index());clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},0);canvasLoader();if(idNum!=0){nextSlide(idNum);}else{nextSlide(amountSlide);}
opts.onStartLoading.call(this);}});}
if($(pagination).length){$('.camera_pag li',wrap).click(function(){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($(this).index());var curNum=parseFloat($('.cameraSlide.cameracurrent',target).index());if(idNum!=curNum){clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},0);canvasLoader();nextSlide(idNum+1);opts.onStartLoading.call(this);}}});}
if($(thumbs).length){$('.pix_thumb img',thumbs).click(function(){if(!elem.hasClass('camerasliding')){var idNum=parseFloat($(this).parents('li').index());var curNum=parseFloat($('.cameracurrent',target).index());if(idNum!=curNum){clearInterval(u);imgFake();$('#'+pieID+', .camera_canvas_wrap',camera_thumbs_wrap).animate({opacity:0},0);$('.pix_thumb',thumbs).removeClass('cameracurrent');$(this).parents('li').addClass('cameracurrent');canvasLoader();nextSlide(idNum+1);thumbnailPos();opts.onStartLoading.call(this);}}});$('.camera_thumbs_cont .camera_prevThumbs',camera_thumbs_wrap).hover(function(){$(this).stop(true,false).animate({opacity:1},250);},function(){$(this).stop(true,false).animate({opacity:.7},250);});$('.camera_prevThumbs',camera_thumbs_wrap).click(function(){var sum=0,wTh=$(thumbs).outerWidth(),offUl=$('ul',thumbs).offset().left,offDiv=$('> div',thumbs).offset().left,ulLeft=offDiv-offUl;$('.camera_visThumb',thumbs).each(function(){var tW=$(this).outerWidth();sum=sum+tW;});if(ulLeft-sum>0){$('ul',thumbs).animate({'margin-left':'-'+(ulLeft-sum)+'px'},500,thumbnailVisible);}else{$('ul',thumbs).animate({'margin-left':0},500,thumbnailVisible);}});$('.camera_thumbs_cont .camera_nextThumbs',camera_thumbs_wrap).hover(function(){$(this).stop(true,false).animate({opacity:1},250);},function(){$(this).stop(true,false).animate({opacity:.7},250);});$('.camera_nextThumbs',camera_thumbs_wrap).click(function(){var sum=0,wTh=$(thumbs).outerWidth(),ulW=$('ul',thumbs).outerWidth(),offUl=$('ul',thumbs).offset().left,offDiv=$('> div',thumbs).offset().left,ulLeft=offDiv-offUl;$('.camera_visThumb',thumbs).each(function(){var tW=$(this).outerWidth();sum=sum+tW;});if(ulLeft+sum+sum<ulW){$('ul',thumbs).animate({'margin-left':'-'+(ulLeft+sum)+'px'},500,thumbnailVisible);}else{$('ul',thumbs).animate({'margin-left':'-'+(ulW-wTh)+'px'},500,thumbnailVisible);}});}}})(jQuery);;(function($){$.fn.cameraStop=function(){var wrap=$(this),elem=$('.camera_src',wrap),pieID='pie_'+wrap.index();elem.addClass('stopped');if($('.camera_showcommands').length){var camera_thumbs_wrap=$('.camera_thumbs_wrap',wrap);}else{var camera_thumbs_wrap=wrap;}}})(jQuery);;(function($){$.fn.cameraPause=function(){var wrap=$(this);var elem=$('.camera_src',wrap);elem.addClass('paused');}})(jQuery);;(function($){$.fn.cameraResume=function(){var wrap=$(this);var elem=$('.camera_src',wrap);if(typeof autoAdv==='undefined'||autoAdv!==true){elem.removeClass('paused');}}})(jQuery);;(function($){$.prettyPhoto={version:'3.1.4'};$.fn.prettyPhoto=function(pp_settings){pp_settings=jQuery.extend({hook:'rel',animation_speed:'fast',ajaxcallback:function(){},slideshow:5000,autoplay_slideshow:false,opacity:0.80,show_title:true,allow_resize:true,allow_expand:true,default_width:500,default_height:344,counter_separator_label:'/',theme:'pp_default',horizontal_padding:20,hideflash:false,wmode:'opaque',autoplay:true,modal:false,deeplinking:true,overlay_gallery:true,overlay_gallery_max:30,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},ie6_fallback:true,markup:'<div class="pp_pic_holder"> \
      <div class="ppt">&nbsp;</div> \
      <div class="pp_top"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
      <div class="pp_content_container"> \
       <div class="pp_left"> \
       <div class="pp_right"> \
        <div class="pp_content"> \
         <div class="pp_loaderIcon"></div> \
         <div class="pp_fade"> \
          <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
          <div class="pp_hoverContainer"> \
           <a class="pp_next" href="#">next</a> \
           <a class="pp_previous" href="#">previous</a> \
          </div> \
          <div id="pp_full_res"></div> \
          <div class="pp_details"> \
           <div class="pp_nav"> \
            <a href="#" class="pp_arrow_previous">Previous</a> \
            <p class="currentTextHolder">0/0</p> \
            <a href="#" class="pp_arrow_next">Next</a> \
           </div> \
           <p class="pp_description"></p> \
           <div class="pp_social">{pp_social}</div> \
           <a class="pp_close" href="#">Close</a> \
          </div> \
         </div> \
        </div> \
       </div> \
       </div> \
      </div> \
      <div class="pp_bottom"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
     </div> \
     <div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> \
        <a href="#" class="pp_arrow_previous">Previous</a> \
        <div> \
         <ul> \
          {gallery} \
         </ul> \
        </div> \
        <a href="#" class="pp_arrow_next">Next</a> \
       </div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:'',social_tools:'<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'},pp_settings);var matchedObjects=this,percentBased=false,pp_dimensions,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containerWidth,windowHeight=$(window).height(),windowWidth=$(window).width(),pp_slideshow;doresize=true,scroll_pos=_get_scroll();$(window).unbind('resize.prettyphoto').bind('resize.prettyphoto',function(){_center_overlay();_resize_overlay();});if(pp_settings.keyboard_shortcuts){$(document).unbind('keydown.prettyphoto').bind('keydown.prettyphoto',function(e){if(typeof $pp_pic_holder!='undefined'){if($pp_pic_holder.is(':visible')){switch(e.keyCode){case 37:$.prettyPhoto.changePage('previous');e.preventDefault();break;case 39:$.prettyPhoto.changePage('next');e.preventDefault();break;case 27:if(!settings.modal)
$.prettyPhoto.close();e.preventDefault();break;};};};});};$.prettyPhoto.initialize=function(){settings=pp_settings;if(settings.theme=='pp_default')settings.horizontal_padding=16;if(settings.ie6_fallback&&$.browser.msie&&parseInt($.browser.version)==6)settings.theme="light_square";theRel=$(this).attr(settings.hook);galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return $(n).attr('href');}):$.makeArray($(this).attr('href'));pp_titles=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return($(n).find('img').attr('alt'))?$(n).find('img').attr('alt'):"";}):$.makeArray($(this).find('img').attr('alt'));pp_descriptions=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return($(n).attr('title'))?$(n).attr('title'):"";}):$.makeArray($(this).attr('title'));if(pp_images.length>settings.overlay_gallery_max)settings.overlay_gallery=false;set_position=jQuery.inArray($(this).attr('href'),pp_images);rel_index=(isSet)?set_position:$("a["+settings.hook+"^='"+theRel+"']").index($(this));_build_overlay(this);if(settings.allow_resize)
$(window).bind('scroll.prettyphoto',function(){_center_overlay();});$.prettyPhoto.open();return false;}
$.prettyPhoto.open=function(event){if(typeof settings=="undefined"){settings=pp_settings;if($.browser.msie&&$.browser.version==6)settings.theme="light_square";pp_images=$.makeArray(arguments[0]);pp_titles=(arguments[1])?$.makeArray(arguments[1]):$.makeArray("");pp_descriptions=(arguments[2])?$.makeArray(arguments[2]):$.makeArray("");isSet=(pp_images.length>1)?true:false;set_position=(arguments[3])?arguments[3]:0;_build_overlay(event.target);}
if($.browser.msie&&$.browser.version==6)$('select').css('visibility','hidden');if(settings.hideflash)$('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','hidden');_checkPosition($(pp_images).size());$('.pp_loaderIcon').show();if(settings.deeplinking)
setHashtag();if(settings.social_tools){facebook_like_link=settings.social_tools.replace('{location_href}',encodeURIComponent(location.href));$pp_pic_holder.find('.pp_social').html(facebook_like_link);}
if($ppt.is(':hidden'))$ppt.css('opacity',0).show();$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find('.currentTextHolder').text((set_position+1)+settings.counter_separator_label+$(pp_images).size());if(typeof pp_descriptions[set_position]!='undefined'&&pp_descriptions[set_position]!=""){$pp_pic_holder.find('.pp_description').show().html(unescape(pp_descriptions[set_position]));}else{$pp_pic_holder.find('.pp_description').hide();}
movie_width=(parseFloat(getParam('width',pp_images[set_position])))?getParam('width',pp_images[set_position]):settings.default_width.toString();movie_height=(parseFloat(getParam('height',pp_images[set_position])))?getParam('height',pp_images[set_position]):settings.default_height.toString();percentBased=false;if(movie_height.indexOf('%')!=-1){movie_height=parseFloat(($(window).height()*parseFloat(movie_height)/100)-150);percentBased=true;}
if(movie_width.indexOf('%')!=-1){movie_width=parseFloat(($(window).width()*parseFloat(movie_width)/100)-150);percentBased=true;}
$pp_pic_holder.fadeIn(function(){(settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt.html(unescape(pp_titles[set_position])):$ppt.html('&nbsp;');imgPreloader="";skipInjection=false;switch(_getFileType(pp_images[set_position])){case'image':imgPreloader=new Image();nextImage=new Image();if(isSet&&set_position<$(pp_images).size()-1)nextImage.src=pp_images[set_position+1];prevImage=new Image();if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];$pp_pic_holder.find('#pp_full_res')[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]);imgPreloader.onload=function(){pp_dimensions=_fitToViewport(imgPreloader.width,imgPreloader.height);_showContent();};imgPreloader.onerror=function(){alert('Image cannot be loaded. Make sure the path is correct and image exist.');$.prettyPhoto.close();};imgPreloader.src=pp_images[set_position];break;case'youtube':pp_dimensions=_fitToViewport(movie_width,movie_height);movie_id=getParam('v',pp_images[set_position]);if(movie_id==""){movie_id=pp_images[set_position].split('youtu.be/');movie_id=movie_id[1];if(movie_id.indexOf('?')>0)
movie_id=movie_id.substr(0,movie_id.indexOf('?'));if(movie_id.indexOf('&')>0)
movie_id=movie_id.substr(0,movie_id.indexOf('&'));}
movie='http://www.youtube.com/embed/'+movie_id;(getParam('rel',pp_images[set_position]))?movie+="?rel="+getParam('rel',pp_images[set_position]):movie+="?rel=1";if(settings.autoplay)movie+="&autoplay=1";toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case'vimeo':pp_dimensions=_fitToViewport(movie_width,movie_height);movie_id=pp_images[set_position];var regExp=/http:\/\/(www\.)?vimeo.com\/(\d+)/;var match=movie_id.match(regExp);movie='http://player.vimeo.com/video/'+match[2]+'?title=0&amp;byline=0&amp;portrait=0';if(settings.autoplay)movie+="&autoplay=1;";vimeo_width=pp_dimensions['width']+'/embed/?moog_width='+pp_dimensions['width'];toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,movie);break;case'quicktime':pp_dimensions=_fitToViewport(movie_width,movie_height);pp_dimensions['height']+=15;pp_dimensions['contentHeight']+=15;pp_dimensions['containerHeight']+=15;toInject=settings.quicktime_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case'flash':pp_dimensions=_fitToViewport(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf('flashvars')+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf('?'));toInject=settings.flash_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);break;case'iframe':pp_dimensions=_fitToViewport(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf('iframe')-1);toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,frame_url);break;case'ajax':doresize=false;pp_dimensions=_fitToViewport(movie_width,movie_height);doresize=true;skipInjection=true;$.get(pp_images[set_position],function(responseHTML){toInject=settings.inline_markup.replace(/{content}/g,responseHTML);$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();});break;case'custom':pp_dimensions=_fitToViewport(movie_width,movie_height);toInject=settings.custom_markup;break;case'inline':myClone=$(pp_images[set_position]).clone().append('<br clear="all" />').css({'width':settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo($('body')).show();doresize=false;pp_dimensions=_fitToViewport($(myClone).width(),$(myClone).height());doresize=true;$(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());break;};if(!imgPreloader&&!skipInjection){$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();};});return false;};$.prettyPhoto.changePage=function(direction){currentGalleryPage=0;if(direction=='previous'){set_position--;if(set_position<0)set_position=$(pp_images).size()-1;}else if(direction=='next'){set_position++;if(set_position>$(pp_images).size()-1)set_position=0;}else{set_position=direction;};rel_index=set_position;if(!doresize)doresize=true;if(settings.allow_expand){$('.pp_contract').removeClass('pp_contract').addClass('pp_expand');}
_hideContent(function(){$.prettyPhoto.open();});};$.prettyPhoto.changeGalleryPage=function(direction){if(direction=='next'){currentGalleryPage++;if(currentGalleryPage>totalPage)currentGalleryPage=0;}else if(direction=='previous'){currentGalleryPage--;if(currentGalleryPage<0)currentGalleryPage=totalPage;}else{currentGalleryPage=direction;};slide_speed=(direction=='next'||direction=='previous')?settings.animation_speed:0;slide_to=currentGalleryPage*(itemsPerPage*itemWidth);$pp_gallery.find('ul').animate({left:-slide_to},slide_speed);};$.prettyPhoto.startSlideshow=function(){if(typeof pp_slideshow=='undefined'){$pp_pic_holder.find('.pp_play').unbind('click').removeClass('pp_play').addClass('pp_pause').click(function(){$.prettyPhoto.stopSlideshow();return false;});pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow);}else{$.prettyPhoto.changePage('next');};}
$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find('.pp_pause').unbind('click').removeClass('pp_pause').addClass('pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});clearInterval(pp_slideshow);pp_slideshow=undefined;}
$.prettyPhoto.close=function(){if($pp_overlay.is(":animated"))return;$.prettyPhoto.stopSlideshow();$pp_pic_holder.stop().find('object,embed').css('visibility','hidden');$('div.pp_pic_holder,div.ppt,.pp_fade').fadeOut(settings.animation_speed,function(){$(this).remove();});$pp_overlay.fadeOut(settings.animation_speed,function(){if($.browser.msie&&$.browser.version==6)$('select').css('visibility','visible');if(settings.hideflash)$('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','visible');$(this).remove();$(window).unbind('scroll.prettyphoto');clearHashtag();settings.callback();doresize=true;pp_open=false;delete settings;});};function _showContent(){$('.pp_loaderIcon').hide();projectedTop=scroll_pos['scrollTop']+((windowHeight/2)-(pp_dimensions['containerHeight']/2));if(projectedTop<0)projectedTop=0;$ppt.fadeTo(settings.animation_speed,1);$pp_pic_holder.find('.pp_content').animate({height:pp_dimensions['contentHeight'],width:pp_dimensions['contentWidth']},settings.animation_speed);$pp_pic_holder.animate({'top':projectedTop,'left':((windowWidth/2)-(pp_dimensions['containerWidth']/2)<0)?0:(windowWidth/2)-(pp_dimensions['containerWidth']/2),width:pp_dimensions['containerWidth']},settings.animation_speed,function(){$pp_pic_holder.find('.pp_hoverContainer,#fullResImage').height(pp_dimensions['height']).width(pp_dimensions['width']);$pp_pic_holder.find('.pp_fade').fadeIn(settings.animation_speed);if(isSet&&_getFileType(pp_images[set_position])=="image"){$pp_pic_holder.find('.pp_hoverContainer').show();}else{$pp_pic_holder.find('.pp_hoverContainer').hide();}
if(settings.allow_expand){if(pp_dimensions['resized']){$('a.pp_expand,a.pp_contract').show();}else{$('a.pp_expand').hide();}}
if(settings.autoplay_slideshow&&!pp_slideshow&&!pp_open)$.prettyPhoto.startSlideshow();settings.changepicturecallback();pp_open=true;});_insert_gallery();pp_settings.ajaxcallback();};function _hideContent(callback){$pp_pic_holder.find('#pp_full_res object,#pp_full_res embed').css('visibility','hidden');$pp_pic_holder.find('.pp_fade').fadeOut(settings.animation_speed,function(){$('.pp_loaderIcon').show();callback();});};function _checkPosition(setCount){(setCount>1)?$('.pp_nav').show():$('.pp_nav').hide();};function _fitToViewport(width,height){resized=false;_getDimensions(width,height);imageWidth=width,imageHeight=height;if(((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight))&&doresize&&settings.allow_resize&&!percentBased){resized=true,fitting=false;while(!fitting){if((pp_containerWidth>windowWidth)){imageWidth=(windowWidth-200);imageHeight=(height/width)*imageWidth;}else if((pp_containerHeight>windowHeight)){imageHeight=(windowHeight-200);imageWidth=(width/height)*imageHeight;}else{fitting=true;};pp_containerHeight=imageHeight,pp_containerWidth=imageWidth;};_getDimensions(imageWidth,imageHeight);if((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight)){_fitToViewport(pp_containerWidth,pp_containerHeight)};};return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containerWidth:Math.floor(pp_containerWidth)+(settings.horizontal_padding*2),contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized};};function _getDimensions(width,height){width=parseFloat(width);height=parseFloat(height);$pp_details=$pp_pic_holder.find('.pp_details');$pp_details.width(width);detailsHeight=parseFloat($pp_details.css('marginTop'))+parseFloat($pp_details.css('marginBottom'));$pp_details=$pp_details.clone().addClass(settings.theme).width(width).appendTo($('body')).css({'position':'absolute','top':-10000});detailsHeight+=$pp_details.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;if($.browser.msie&&$.browser.version==7)detailsHeight+=8;$pp_details.remove();$pp_title=$pp_pic_holder.find('.ppt');$pp_title.width(width);titleHeight=parseFloat($pp_title.css('marginTop'))+parseFloat($pp_title.css('marginBottom'));$pp_title=$pp_title.clone().appendTo($('body')).css({'position':'absolute','top':-10000});titleHeight+=$pp_title.height();$pp_title.remove();pp_contentHeight=height+detailsHeight;pp_contentWidth=width;pp_containerHeight=pp_contentHeight+titleHeight+$pp_pic_holder.find('.pp_top').height()+$pp_pic_holder.find('.pp_bottom').height();pp_containerWidth=width;}
function _getFileType(itemSrc){if(itemSrc.match(/youtube\.com\/watch/i)||itemSrc.match(/youtu\.be/i)){return'youtube';}else if(itemSrc.match(/vimeo\.com/i)){return'vimeo';}else if(itemSrc.match(/\b.mov\b/i)){return'quicktime';}else if(itemSrc.match(/\b.swf\b/i)){return'flash';}else if(itemSrc.match(/\biframe=true\b/i)){return'iframe';}else if(itemSrc.match(/\bajax=true\b/i)){return'ajax';}else if(itemSrc.match(/\bcustom=true\b/i)){return'custom';}else if(itemSrc.substr(0,1)=='#'){return'inline';}else{return'image';};};function _center_overlay(){if(doresize&&typeof $pp_pic_holder!='undefined'){scroll_pos=_get_scroll();contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=(windowHeight/2)+scroll_pos['scrollTop']-(contentHeight/2);if(projectedTop<0)projectedTop=0;if(contentHeight>windowHeight)
return;$pp_pic_holder.css({'top':projectedTop,'left':(windowWidth/2)+scroll_pos['scrollLeft']-(contentwidth/2)});};};function _get_scroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width();if(typeof $pp_overlay!="undefined")$pp_overlay.height($(document).height()).width(windowWidth);};function _insert_gallery(){if(isSet&&settings.overlay_gallery&&_getFileType(pp_images[set_position])=="image"&&(settings.ie6_fallback&&!($.browser.msie&&parseInt($.browser.version)==6))){itemWidth=52+5;navWidth=(settings.theme=="facebook"||settings.theme=="pp_default")?50:30;itemsPerPage=Math.floor((pp_dimensions['containerWidth']-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').hide();}else{$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').show();};galleryWidth=itemsPerPage*itemWidth;fullGalleryWidth=pp_images.length*itemWidth;$pp_gallery.css('margin-left',-((galleryWidth/2)+(navWidth/2))).find('div:first').width(galleryWidth+5).find('ul').width(fullGalleryWidth).find('li.selected').removeClass('selected');goToPage=(Math.floor(set_position/itemsPerPage)<totalPage)?Math.floor(set_position/itemsPerPage):totalPage;$.prettyPhoto.changeGalleryPage(goToPage);$pp_gallery_li.filter(':eq('+set_position+')').addClass('selected');}else{$pp_pic_holder.find('.pp_content').unbind('mouseenter mouseleave');}}
function _build_overlay(caller){if(settings.social_tools)
facebook_like_link=settings.social_tools.replace('{location_href}',encodeURIComponent(location.href));settings.markup=settings.markup.replace('{pp_social}','');$('body').append(settings.markup);$pp_pic_holder=$('.pp_pic_holder'),$ppt=$('.ppt'),$pp_overlay=$('div.pp_overlay');if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var i=0;i<pp_images.length;i++){if(!pp_images[i].match(/\b(jpg|jpeg|png|gif)\b/gi)){classname='default';img_src='';}else{classname='';img_src=pp_images[i];}
toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>";};toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find('#pp_full_res').after(toInject);$pp_gallery=$('.pp_pic_holder .pp_gallery'),$pp_gallery_li=$pp_gallery.find('li');$pp_gallery.find('.pp_arrow_next').click(function(){$.prettyPhoto.changeGalleryPage('next');$.prettyPhoto.stopSlideshow();return false;});$pp_gallery.find('.pp_arrow_previous').click(function(){$.prettyPhoto.changeGalleryPage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_content').hover(function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeIn();},function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeOut();});itemWidth=52+5;$pp_gallery_li.each(function(i){$(this).find('a').click(function(){$.prettyPhoto.changePage(i);$.prettyPhoto.stopSlideshow();return false;});});};if(settings.slideshow){$pp_pic_holder.find('.pp_nav').prepend('<a href="#" class="pp_play">Play</a>')
$pp_pic_holder.find('.pp_nav .pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});}
$pp_pic_holder.attr('class','pp_pic_holder '+settings.theme);$pp_overlay.css({'opacity':0,'height':$(document).height(),'width':$(window).width()}).bind('click',function(){if(!settings.modal)$.prettyPhoto.close();});$('a.pp_close').bind('click',function(){$.prettyPhoto.close();return false;});if(settings.allow_expand){$('a.pp_expand').bind('click',function(e){if($(this).hasClass('pp_expand')){$(this).removeClass('pp_expand').addClass('pp_contract');doresize=false;}else{$(this).removeClass('pp_contract').addClass('pp_expand');doresize=true;};_hideContent(function(){$.prettyPhoto.open();});return false;});}
$pp_pic_holder.find('.pp_previous, .pp_nav .pp_arrow_previous').bind('click',function(){$.prettyPhoto.changePage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_next, .pp_nav .pp_arrow_next').bind('click',function(){$.prettyPhoto.changePage('next');$.prettyPhoto.stopSlideshow();return false;});_center_overlay();};if(!pp_alreadyInitialized&&getHashtag()){pp_alreadyInitialized=true;hashIndex=getHashtag();hashRel=hashIndex;hashIndex=hashIndex.substring(hashIndex.indexOf('/')+1,hashIndex.length-1);hashRel=hashRel.substring(0,hashRel.indexOf('/'));setTimeout(function(){$("a["+pp_settings.hook+"^='"+hashRel+"']:eq("+hashIndex+")").trigger('click');},50);}
return this.unbind('click.prettyphoto').bind('click.prettyphoto',$.prettyPhoto.initialize);};function getHashtag(){url=location.href;hashtag=(url.indexOf('#prettyPhoto')!==-1)?decodeURI(url.substring(url.indexOf('#prettyPhoto')+1,url.length)):false;return hashtag;};function setHashtag(){if(typeof theRel=='undefined')return;location.hash=theRel+'/'+rel_index+'/';};function clearHashtag(){if(location.href.indexOf('#prettyPhoto')!==-1)location.hash="prettyPhoto";}
function getParam(name,url){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(url);return(results==null)?"":results[1];}})(jQuery);var pp_alreadyInitialized=false;;
/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
* Licensed under the MIT License (LICENSE.txt).
*
* Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
* Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
* Thanks to: Seamus Leahy for adding deltaX and deltaY
*
* Version: 3.0.6
* 
* Requires: 1.2.2+
*/
(function($){var types=['DOMMouseScroll','mousewheel'];if($.event.fixHooks){for(var i=types.length;i;){$.event.fixHooks[types[--i]]=$.event.mouseHooks;}}
$.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var i=types.length;i;){this.addEventListener(types[--i],handler,false);}}else{this.onmousewheel=handler;}},teardown:function(){if(this.removeEventListener){for(var i=types.length;i;){this.removeEventListener(types[--i],handler,false);}}else{this.onmousewheel=null;}}};$.fn.extend({mousewheel:function(fn){return fn?this.bind("mousewheel",fn):this.trigger("mousewheel");},unmousewheel:function(fn){return this.unbind("mousewheel",fn);}});function handler(event){var orgEvent=event||window.event,args=[].slice.call(arguments,1),delta=0,returnValue=true,deltaX=0,deltaY=0;event=$.event.fix(orgEvent);event.type="mousewheel";if(orgEvent.wheelDelta){delta=orgEvent.wheelDelta/120;}
if(orgEvent.detail){delta=-orgEvent.detail/3;}
deltaY=delta;if(orgEvent.axis!==undefined&&orgEvent.axis===orgEvent.HORIZONTAL_AXIS){deltaY=0;deltaX=-1*delta;}
if(orgEvent.wheelDeltaY!==undefined){deltaY=orgEvent.wheelDeltaY/120;}
if(orgEvent.wheelDeltaX!==undefined){deltaX=-1*orgEvent.wheelDeltaX/120;}
args.unshift(event,delta,deltaX,deltaY);return($.event.dispatch||$.event.handle).apply(this,args);}})(jQuery);;(function(b,a,c){b.fn.jScrollPane=function(f){function d(ah,ae){var an,h=this,ad,I,R,at,W,al,ac,E,q,aq,m,X,A,p,ap,D,P,af,V,o,S,C,aa,F,H,O,n,K,y,ao,z;I={};J(ae);function J(aw){var aA,az,ay,av,au,ax;an=aw;if(ad==c){ah.css("overflow","hidden");R=an.paneWidth||ah.innerWidth();at=ah.innerHeight();ad=b('<div class="jspPane" />').wrap(b('<div class="jspContainer" />').css({width:R+"px",height:at+"px"}));ah.wrapInner(ad.parent());W=ah.find(">.jspContainer");ad=W.find(">.jspPane")}else{ax=ah.outerWidth()!=R||ah.outerHeight()!=at;if(ax){R=ah.innerWidth();at=ah.innerHeight();W.css({width:R+"px",height:at+"px"})}ad.css("width",null);if(!ax&&ad.outerWidth()==al&&ad.outerHeight()==ac){return}W.find(".jspVerticalBar,.jspHorizontalBar").remove().end()}aA=ad.clone().css("position","absolute");az=b('<div style="width:1px; position: relative;" />').append(aA);b("body").append(az);al=Math.max(ad.outerWidth(),aA.outerWidth());az.remove();ac=ad.outerHeight();E=al/R;q=ac/at;aq=q>1;m=E>1;if(!(m||aq)){ah.removeClass("jspScrollable");ad.css("top",0);Q();r();u()}else{ah.addClass("jspScrollable");ay=an.maintainPosition&&(p||P);if(ay){av=j();au=g()}x();aj();k();if(ay){w(av);v(au)}t();ar();if(an.hijackInternalLinks){i()}}if(an.autoReinitialise&&!z){z=setInterval(function(){J(an)},an.autoReinitialiseDelay)}else{if(!an.autoReinitialise&&z){clearInterval(z)}}}function x(){if(aq){W.append(b('<div class="jspVerticalBar" />').append(b('<div class="jspCap jspCapTop" />'),b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragTop" />'),b('<div class="jspDragBottom" />'))),b('<div class="jspCap jspCapBottom" />')));af=W.find(">.jspVerticalBar");V=af.find(">.jspTrack");X=V.find(">.jspDrag");if(an.showArrows){aa=b('<a href="#" class="jspArrow jspArrowUp">Scroll up</a>').bind("mousedown.jsp",G(0,-1)).bind("click.jsp",ai);F=b('<a href="#" class="jspArrow jspArrowDown">Scroll down</a>').bind("mousedown.jsp",G(0,1)).bind("click.jsp",ai);if(an.arrowScrollOnHover){aa.bind("mouseover.jsp",G(0,-1,aa));F.bind("mouseover.jsp",G(0,1,F))}U(V,an.verticalArrowPositions,aa,F)}S=at;W.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){S-=b(this).outerHeight()});X.hover(function(){X.addClass("jspHover")},function(){X.removeClass("jspHover")}).bind("mousedown.jsp",function(au){b("html").bind("dragstart.jsp selectstart.jsp",function(){return false});X.addClass("jspActive");var s=au.pageY-X.position().top;b("html").bind("mousemove.jsp",function(av){L(av.pageY-s,false)}).bind("mouseup.jsp mouseleave.jsp",B);return false});N();ag();l()}else{Q()}}function N(){V.height(S+"px");p=0;o=an.verticalGutter+V.outerWidth();ad.width(R-o);if(af.position().left==0){ad.css("margin-left",o+"px")}}function aj(){if(m){W.append(b('<div class="jspHorizontalBar" />').append(b('<div class="jspCap jspCapLeft" />'),b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragLeft" />'),b('<div class="jspDragRight" />'))),b('<div class="jspCap jspCapRight" />')));H=W.find(">.jspHorizontalBar");O=H.find(">.jspTrack");ap=O.find(">.jspDrag");if(an.showArrows){y=b('<a href="#" class="jspArrow jspArrowLeft">Scroll left</a>').bind("mousedown.jsp",G(-1,0)).bind("click.jsp",ai);ao=b('<a href="#" class="jspArrow jspArrowRight">Scroll right</a>').bind("mousedown.jsp",G(1,0)).bind("click.jsp",ai);if(an.arrowScrollOnHover){y.bind("mouseover.jsp",G(-1,0,y));ao.bind("mouseover.jsp",G(1,0,ao))}U(O,an.horizontalArrowPositions,y,ao)}ap.hover(function(){ap.addClass("jspHover")},function(){ap.removeClass("jspHover")}).bind("mousedown.jsp",function(au){b("html").bind("dragstart.jsp selectstart.jsp",function(){return false});ap.addClass("jspActive");var s=au.pageX-ap.position().left;b("html").bind("mousemove.jsp",function(av){M(av.pageX-s,false)}).bind("mouseup.jsp mouseleave.jsp",B);return false});n=W.innerWidth();ab();am()}else{}}function ab(){W.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){n-=b(this).outerWidth()});O.width(n+"px");P=0}function k(){if(m&&aq){var au=O.outerHeight(),s=V.outerWidth();S-=au;b(H).find(">.jspCap:visible,>.jspArrow").each(function(){n+=b(this).outerWidth()});n-=s;at-=s;R-=au;O.parent().append(b('<div class="jspCorner" />').css("width",au+"px"));N();ab()}if(m){ad.width(W.outerWidth()+"px")}ac=ad.outerHeight();q=ac/at;if(m){K=1/E*n;if(K>an.horizontalDragMaxWidth){K=an.horizontalDragMaxWidth}else{if(K<an.horizontalDragMinWidth){K=an.horizontalDragMinWidth}}ap.width(K+"px");D=n-K}if(aq){C=1/q*S;if(C>an.verticalDragMaxHeight){C=an.verticalDragMaxHeight}else{if(C<an.verticalDragMinHeight){C=an.verticalDragMinHeight}}X.height(C+"px");A=S-C}}function U(av,ax,au,s){var az="before",aw="after",ay;if(ax=="os"){ax=/Mac/.test(navigator.platform)?"after":"split"}if(ax==az){aw=ax}else{if(ax==aw){az=ax;ay=au;au=s;s=ay}}av[az](au)[aw](s)}function G(au,s,av){return function(){ak(au,s,this,av);this.blur();return false}}function ak(av,s,ay,ax){ay=b(ay).addClass("jspActive");var aw,au=setInterval(function(){if(av!=0){M(P+av*an.arrowButtonSpeed,false)}if(s!=0){L(p+s*an.arrowButtonSpeed,false)}},an.arrowRepeatFreq);aw=ax==c?"mouseup.jsp":"mouseout.jsp";ax=ax||b("html");ax.bind(aw,function(){ay.removeClass("jspActive");clearInterval(au);ax.unbind(aw)})}function B(){b("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp");X&&X.removeClass("jspActive");ap&&ap.removeClass("jspActive")}function L(s,au){if(!aq){return}if(s<0){s=0}else{if(s>A){s=A}}if(au==c){au=an.animateScroll}if(au){h.animate(X,"top",s,Y)}else{X.css("top",s);Y(s)}}function Y(au){if(au==c){au=X.position().top}W.scrollTop(0);p=au;ag();var av=au/A,s=-av*(ac-at);ad.css("top",s)}function M(au,s){if(!m){return}if(au<0){au=0}else{if(au>D){au=D}}if(s==c){s=an.animateScroll}if(s){h.animate(ap,"left",au,Z)}else{ap.css("left",au);Z(au)}}function Z(au){if(au==c){au=ap.position().left}W.scrollTop(0);P=au;am();var av=au/D,s=-av*(al-R);ad.css("left",s)}function ag(){if(an.showArrows){aa[p==0?"addClass":"removeClass"]("jspDisabled");F[p==A?"addClass":"removeClass"]("jspDisabled")}}function am(){if(an.showArrows){y[P==0?"addClass":"removeClass"]("jspDisabled");ao[P==D?"addClass":"removeClass"]("jspDisabled")}}function v(s,au){var av=s/(ac-at);L(av*A,au)}function w(au,s){var av=au/(al-R);M(av*D,s)}function T(aC,aA,au){var ay,aw,s=0,av,az,aB;try{ay=b(aC)}catch(ax){return}aw=ay.outerHeight();W.scrollTop(0);while(!ay.is(".jspPane")){s+=ay.position().top;ay=ay.offsetParent();if(/^body|html$/i.test(ay[0].nodeName)){return}}av=g();az=av+at;if(s<av||aA){aB=s-an.verticalGutter}else{if(s+aw>az){aB=s-at+aw+an.verticalGutter}}if(aB){v(aB,au)}}function j(){return-ad.position().left}function g(){return-ad.position().top}function l(){W.unbind("mousewheel.jsp").bind("mousewheel.jsp",function(s,av){var au=p;L(p-av*an.mouseWheelSpeed,false);return au==p})}function Q(){W.unbind("mousewheel.jsp")}function ai(){return false}function t(){ad.find(":input,a").bind("focus.jsp",function(){T(this,false)})}function r(){ad.find(":input,a").unbind("focus.jsp")}function ar(){if(location.hash&&location.hash.length>1){var av,au;try{av=b(location.hash)}catch(s){return}if(av.length&&ad.find(av)){if(W.scrollTop()==0){au=setInterval(function(){if(W.scrollTop()>0){T(location.hash,true);b(document).scrollTop(W.position().top);clearInterval(au)}},50)}else{T(location.hash,true);b(document).scrollTop(W.position().top)}}}}function u(){b("a.jspHijack").unbind("click.jsp-hijack").removeClass("jspHijack")}function i(){u();b("a[href^=#]").addClass("jspHijack").bind("click.jsp-hijack",function(){var s=this.href.split("#"),au;if(s.length>1){au=s[1];if(au.length>0&&ad.find("#"+au).length>0){T("#"+au,true);return false}}})}b.extend(h,{reinitialise:function(au){au=b.extend({},au,an);J(au)},scrollToElement:function(av,au,s){T(av,au,s)},scrollTo:function(av,s,au){w(av,au);v(s,au)},scrollToX:function(au,s){w(au,s)},scrollToY:function(s,au){v(s,au)},scrollBy:function(au,s,av){h.scrollByX(au,av);h.scrollByY(s,av)},scrollByX:function(s,av){var au=j()+s,aw=au/(al-R);M(aw*D,av)},scrollByY:function(s,av){var au=g()+s,aw=au/(ac-at);L(aw*A,av)},animate:function(au,ax,s,aw){var av={};av[ax]=s;au.animate(av,{duration:an.animateDuration,ease:an.animateEase,queue:false,step:aw})},getContentPositionX:function(){return j()},getContentPositionY:function(){return g()},getContentPane:function(){return ad},scrollToBottom:function(s){L(A,s)},hijackInternalLinks:function(){i()}})}f=b.extend({},b.fn.jScrollPane.defaults,f);var e;this.each(function(){var g=b(this),h=g.data("jsp");if(h){h.reinitialise(f)}else{h=new d(g,f);g.data("jsp",h)}e=e?e.add(g):g});return e};b.fn.jScrollPane.defaults={showArrows:false,maintainPosition:true,autoReinitialise:false,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,animateScroll:false,animateDuration:300,animateEase:"linear",hijackInternalLinks:false,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:10,arrowButtonSpeed:10,arrowRepeatFreq:100,arrowScrollOnHover:false,verticalArrowPositions:"split",horizontalArrowPositions:"split",paneWidth:c}})(jQuery,this);;(function($){var mwheelI={pos:[-260,-260]},minDif=3,doc=document,root=doc.documentElement,body=doc.body,longDelay,shortDelay;function unsetPos(){if(this===mwheelI.elem){mwheelI.pos=[-260,-260];mwheelI.elem=false;minDif=3;}}
$.event.special.mwheelIntent={setup:function(){var jElm=$(this).bind('mousewheel',$.event.special.mwheelIntent.handler);if(this!==doc&&this!==root&&this!==body){jElm.bind('mouseleave',unsetPos);}
jElm=null;return true;},teardown:function(){$(this).unbind('mousewheel',$.event.special.mwheelIntent.handler).unbind('mouseleave',unsetPos);return true;},handler:function(e,d){var pos=[e.clientX,e.clientY];if(this===mwheelI.elem||Math.abs(mwheelI.pos[0]-pos[0])>minDif||Math.abs(mwheelI.pos[1]-pos[1])>minDif){mwheelI.elem=this;mwheelI.pos=pos;minDif=250;clearTimeout(shortDelay);shortDelay=setTimeout(function(){minDif=10;},200);clearTimeout(longDelay);longDelay=setTimeout(function(){minDif=3;},1500);e=$.extend({},e,{type:'mwheelIntent'});return $.event.handle.apply(this,arguments);}}};$.fn.extend({mwheelIntent:function(fn){return fn?this.bind("mwheelIntent",fn):this.trigger("mwheelIntent");},unmwheelIntent:function(fn){return this.unbind("mwheelIntent",fn);}});$(function(){body=doc.body;$(doc).bind('mwheelIntent.mwheelIntentDefault',$.noop);});})(jQuery);;(function($)
{$.fn.jTweetsAnywhere=function(options)
{var options=$.extend({username:'tbillenstein',list:null,searchParams:null,count:0,tweetProfileImagePresent:null,tweetFilter:defaultTweetFilter,showTweetFeed:true,showFollowButton:false,showConnectButton:false,showLoginInfo:false,showTweetBox:false,mainDecorator:defaultMainDecorator,tweetFeedDecorator:defaultTweetFeedDecorator,tweetDecorator:defaultTweetDecorator,tweetProfileImageDecorator:defaultTweetProfileImageDecorator,tweetBodyDecorator:defaultTweetBodyDecorator,tweetUsernameDecorator:defaultTweetUsernameDecorator,tweetTextDecorator:defaultTweetTextDecorator,tweetAttributesDecorator:defaultTweetAttributesDecorator,tweetTimestampDecorator:defaultTweetTimestampDecorator,tweetSourceDecorator:defaultTweetSourceDecorator,tweetGeoLocationDecorator:defaultTweetGeoLocationDecorator,tweetInReplyToDecorator:defaultTweetInReplyToDecorator,tweetRetweeterDecorator:defaultTweetRetweeterDecorator,tweetFeedControlsDecorator:defaultTweetFeedControlsDecorator,tweetFeedControlsMoreBtnDecorator:defaultTweetFeedControlsMoreBtnDecorator,tweetFeedControlsPrevBtnDecorator:defaultTweetFeedControlsPrevBtnDecorator,tweetFeedControlsNextBtnDecorator:defaultTweetFeedControlsNextBtnDecorator,tweetFeedAutorefreshTriggerDecorator:defaultTweetFeedAutorefreshTriggerDecorator,tweetFeedAutorefreshTriggerContentDecorator:defaultTweetFeedAutorefreshTriggerContentDecorator,connectButtonDecorator:defaultConnectButtonDecorator,loginInfoDecorator:defaultLoginInfoDecorator,loginInfoContentDecorator:defaultLoginInfoContentDecorator,followButtonDecorator:defaultFollowButtonDecorator,tweetBoxDecorator:defaultTweetBoxDecorator,linkDecorator:defaultLinkDecorator,usernameDecorator:defaultUsernameDecorator,hashtagDecorator:defaultHashtagDecorator,loadingDecorator:defaultLoadingDecorator,errorDecorator:defaultErrorDecorator,noDataDecorator:defaultNoDataDecorator,tweetTimestampFormatter:defaultTweetTimestampFormatter,tweetTimestampTooltipFormatter:defaultTweetTimestampTooltipFormatter,tweetVisualizer:defaultTweetVisualizer,loadingIndicatorVisualizer:defaultLoadingIndicatorVisualizer,autorefreshTriggerVisualizer:defaultAutorefreshTriggerVisualizer,onDataRequestHandler:defaultOnDataRequestHandler,onRateLimitDataHandler:defaultOnRateLimitDataHandler,_tweetFeedConfig:{expandHovercards:false,showTimestamp:{refreshInterval:0},showSource:false,showGeoLocation:true,showInReplyTo:true,showProfileImages:null,showUserScreenNames:null,showUserFullNames:false,includeRetweets:true,paging:{mode:"none",_limit:0,_offset:0},autorefresh:{mode:"none",interval:60,duration:3600,_startTime:null,_triggerElement:null},_pageParam:0,_maxId:null,_recLevel:0,_noData:false,_clearBeforePopulate:false},_tweetBoxConfig:{counter:true,width:515,height:65,label:"What's happening?",defaultContent:'',onTweet:function(textTweet,htmlTweet){}},_connectButtonConfig:{size:"medium"},_baseSelector:null,_baseElement:null,_tweetFeedElement:null,_tweetFeedControlsElement:null,_followButtonElement:null,_loginInfoElement:null,_connectButtonElement:null,_tweetBoxElement:null,_loadingIndicatorElement:null,_noDataElement:null,_tweetsCache:[],_autorefreshTweetsCache:[],_stats:{dataRequestCount:0,rateLimitPreventionCount:0,rateLimit:{remaining_hits:150,hourly_limit:150}}},options);if(!options.mainDecorator)
{return;}
options._baseSelector=this.selector;if(typeof(options.username)!='string')
{if(!options.searchParams)
{options.searchParams=['q=from:'+options.username.join(" OR from:")];}
options.username=options.username[0];}
if(typeof(options.showTweetFeed)=='object')
{$.extend(true,options._tweetFeedConfig,options.showTweetFeed);}
if(typeof(options.showTweetBox)=='object')
{options._tweetBoxConfig=options.showTweetBox;options.showTweetBox=true;}
if(typeof(options.showConnectButton)=='object')
{options._connectButtonConfig=options.showConnectButton;options.showConnectButton=true;}
if(options._tweetFeedConfig.showProfileImages==null)
{options._tweetFeedConfig.showProfileImages=options.tweetProfileImagePresent;}
if(options._tweetFeedConfig.showProfileImages==null)
{options._tweetFeedConfig.showProfileImages=(options.list||options.searchParams)&&options.tweetProfileImageDecorator;}
if(options._tweetFeedConfig.showUserScreenNames==null)
{if(options.list||options.searchParams)
{options._tweetFeedConfig.showUserScreenNames=true;}
if(!options.tweetUsernameDecorator)
{options._tweetFeedConfig.showUserScreenNames=false;}}
if(options._tweetFeedConfig.showUserFullNames==null)
{if(options.list||options.searchParams)
{options._tweetFeedConfig.showUserFullNames=true;}
if(!options.tweetUsernameDecorator)
{options._tweetFeedConfig.showUserFullNames=false;}}
options.count=validateRange(options.count,0,options.searchParams?100:20);options._tweetFeedConfig.autorefresh.interval=Math.max(30,options._tweetFeedConfig.autorefresh.interval);options._tweetFeedConfig.paging._offset=0;options._tweetFeedConfig.paging._limit=options.count;if(options.count==0||!options.showTweetFeed)
{options.tweetFeedDecorator=null;options.tweetFeedControlsDecorator=null;}
if(options._tweetFeedConfig.paging.mode=='none')
{options.tweetFeedControlsDecorator=null;}
if(!options.showFollowButton)
{options.followButtonDecorator=null;}
if(!options.showTweetBox)
{options.tweetBoxDecorator=null;}
if(!options.showConnectButton)
{options.connectButtonDecorator=null;}
if(!options.showLoginInfo)
{options.loginInfoDecorator=null;}
if(!options._tweetFeedConfig.showTimestamp)
{options.tweetTimestampDecorator=null;}
if(!options._tweetFeedConfig.showSource)
{options.tweetSourceDecorator=null;}
if(!options._tweetFeedConfig.showGeoLocation)
{options.tweetGeoLocationDecorator=null;}
if(!options._tweetFeedConfig.showInReplyTo)
{options.tweetInReplyToDecorator=null;}
$.ajaxSetup({cache:true});return this.each(function()
{options._baseElement=$(this);options._tweetFeedElement=options.tweetFeedDecorator?$(options.tweetFeedDecorator(options)):null;options._tweetFeedControlsElement=options.tweetFeedControlsDecorator?$(options.tweetFeedControlsDecorator(options)):null;options._followButtonElement=options.followButtonDecorator?$(options.followButtonDecorator(options)):null;options._tweetBoxElement=options.tweetBoxDecorator?$(options.tweetBoxDecorator(options)):null;options._connectButtonElement=options.connectButtonDecorator?$(options.connectButtonDecorator(options)):null;options._loginInfoElement=options.loginInfoDecorator?$(options.loginInfoDecorator(options)):null;options.mainDecorator(options);populateTweetFeed(options);populateAnywhereControls(options);bindEventHandlers(options);options._tweetFeedConfig.autorefresh._startTime=new Date().getTime();startAutorefresh(options);startTimestampRefresh(options);});};defaultMainDecorator=function(options)
{if(options._tweetFeedElement)
{options._baseElement.append(options._tweetFeedElement);}
if(options._tweetFeedControlsElement)
{options._baseElement.append(options._tweetFeedControlsElement);}
if(options._connectButtonElement)
{options._baseElement.append(options._connectButtonElement);}
if(options._loginInfoElement)
{options._baseElement.append(options._loginInfoElement);}
if(options._followButtonElement)
{options._baseElement.append(options._followButtonElement);}
if(options._tweetBoxElement)
{options._baseElement.append(options._tweetBoxElement);}};defaultTweetFeedControlsDecorator=function(options)
{var html='';if(options._tweetFeedConfig.paging.mode=='prev-next')
{if(options.tweetFeedControlsPrevBtnDecorator)
{html+=options.tweetFeedControlsPrevBtnDecorator(options);}
if(options.tweetFeedControlsNextBtnDecorator)
{html+=options.tweetFeedControlsNextBtnDecorator(options);}}
else if(options._tweetFeedConfig.paging.mode=='endless-scroll')
{}
else
{if(options.tweetFeedControlsMoreBtnDecorator)
{html+=options.tweetFeedControlsMoreBtnDecorator(options);}}
return'<div class="jta-tweet-list-controls">'+html+'</div>';};defaultTweetFeedControlsMoreBtnDecorator=function(options)
{return'<span class="jta-tweet-list-controls-button jta-tweet-list-controls-button-more">'+'More'+'</span>';};defaultTweetFeedControlsPrevBtnDecorator=function(options)
{return'<span class="jta-tweet-list-controls-button jta-tweet-list-controls-button-prev">'+'Prev'+'</span>';};defaultTweetFeedControlsNextBtnDecorator=function(options)
{return'<span class="jta-tweet-list-controls-button jta-tweet-list-controls-button-next">'+'Next'+'</span>';};defaultTweetFeedAutorefreshTriggerDecorator=function(count,options)
{var html='';if(options.tweetFeedAutorefreshTriggerContentDecorator)
{html=options.tweetFeedAutorefreshTriggerContentDecorator(count,options);}
return'<li class="jta-tweet-list-autorefresh-trigger">'+html+'</li>';};defaultTweetFeedAutorefreshTriggerContentDecorator=function(count,options)
{var content=''+count+' new '+(count>1?' tweets':' tweet');return'<span class="jta-tweet-list-autorefresh-trigger-content">'+content+'</span>';};defaultTweetFeedDecorator=function(options)
{return'<ul class="jta-tweet-list"></ul>';};defaultTweetDecorator=function(tweet,options)
{var html='';if(options._tweetFeedConfig.showProfileImages)
{html+=options.tweetProfileImageDecorator(tweet,options);}
if(options.tweetBodyDecorator)
{html+=options.tweetBodyDecorator(tweet,options);}
html+='<div class="jta-clear">&nbsp;</div>';return'<li class="jta-tweet-list-item">'+html+'</li>';};defaultTweetProfileImageDecorator=function(tweet,options)
{var t=tweet.retweeted_status||tweet;var screenName=t.user?t.user.screen_name:false||t.from_user;var imageUrl=t.user?t.user.profile_image_url:false||t.profile_image_url;var html='<a class="jta-tweet-profile-image-link" href="http://twitter.com/'+screenName+'" target="_blank">'+'<img src="'+imageUrl+'" alt="'+screenName+'"'+
(isAnywherePresent()?'':(' title="'+screenName+'"'))+'/>'+'</a>';return'<div class="jta-tweet-profile-image">'+html+'</div>';};defaultTweetBodyDecorator=function(tweet,options)
{var html='';if(options.tweetTextDecorator)
{html+=options.tweetTextDecorator(tweet,options);}
if(options.tweetAttributesDecorator)
{html+=options.tweetAttributesDecorator(tweet,options);}
return'<div class="jta-tweet-body '+(options._tweetFeedConfig.showProfileImages?'jta-tweet-body-list-profile-image-present':'')+'">'+html+'</div>';};defaultTweetTextDecorator=function(tweet,options)
{var tweetText=tweet.text;if(tweet.retweeted_status&&(options._tweetFeedConfig.showUserScreenNames||options._tweetFeedConfig.showUserScreenNames==null||options._tweetFeedConfig.showUserFullNames||options._tweetFeedConfig.showUserFullNames==null))
{tweetText=tweet.retweeted_status.text;}
if(options.linkDecorator)
{tweetText=options.linkDecorator(tweetText,options);}
if(options.usernameDecorator)
{tweetText=options.usernameDecorator(tweetText,options);}
if(options.hashtagDecorator)
{tweetText=options.hashtagDecorator(tweetText,options);}
if(options._tweetFeedConfig.showUserScreenNames||options._tweetFeedConfig.showUserFullNames||tweet.retweeted_status&&(options._tweetFeedConfig.showUserScreenNames==null||options._tweetFeedConfig.showUserFullNames==null))
{tweetText=options.tweetUsernameDecorator(tweet,options)+' '+tweetText;}
return'<span class="jta-tweet-text">'+tweetText+'</span>';};defaultTweetUsernameDecorator=function(tweet,options)
{var t=tweet.retweeted_status||tweet;var screenName=t.user?t.user.screen_name:false||t.from_user;var fullName=t.user?t.user.name:null;var htmlScreenName;if(screenName&&(options._tweetFeedConfig.showUserScreenNames||(options._tweetFeedConfig.showUserScreenNames==null&&tweet.retweeted_status)))
{htmlScreenName='<span class="jta-tweet-user-screen-name">'+'<a class="jta-tweet-user-screen-name-link" href="http://twitter.com/'+screenName+'" target="_blank">'+
screenName+'</a>'+'</span>';}
var htmlFullName;if(fullName&&(options._tweetFeedConfig.showUserFullNames||(options._tweetFeedConfig.showUserFullNames==null&&tweet.retweeted_status)))
{htmlFullName='<span class="jta-tweet-user-full-name">'+
(htmlScreenName?' (':'')+'<a class="jta-tweet-user-full-name-link" href="http://twitter.com/'+screenName+'" name="'+screenName+'" target="_blank">'+
fullName+'</a>'+
(htmlScreenName?')':'')+'</span>';}
var html="";if(htmlScreenName)
{html+=htmlScreenName;}
if(htmlFullName)
{if(htmlScreenName)
{html+=' ';}
html+=htmlFullName;}
if(htmlScreenName||htmlFullName)
{html='<span class="jta-tweet-user-name">'+
(tweet.retweeted_status?'RT ':'')+
html+'</span>';}
return html;};defaultTweetAttributesDecorator=function(tweet,options)
{var html='';if(options.tweetTimestampDecorator||options.tweetSourceDecorator||options.tweetGeoLocationDecorator||options.tweetInReplyToDecorator||(tweet.retweeted_status&&options.tweetRetweeterDecorator))
{html+='<span class="jta-tweet-attributes">';if(options.tweetTimestampDecorator)
{html+=options.tweetTimestampDecorator(tweet,options);}
if(options.tweetSourceDecorator)
{html+=options.tweetSourceDecorator(tweet,options);}
if(options.tweetGeoLocationDecorator)
{html+=options.tweetGeoLocationDecorator(tweet,options);}
if(options.tweetInReplyToDecorator)
{html+=options.tweetInReplyToDecorator(tweet,options);}
if(tweet.retweeted_status&&options.tweetRetweeterDecorator)
{html+=options.tweetRetweeterDecorator(tweet,options);}
html+='</span>';}
return html;};defaultTweetTimestampDecorator=function(tweet,options)
{var tw=tweet.retweeted_status||tweet;var createdAt=formatDate(tw.created_at);var tweetTimestamp=options.tweetTimestampFormatter(createdAt);var tweetTimestampTooltip=options.tweetTimestampTooltipFormatter(createdAt);var screenName=tw.user?tw.user.screen_name:false||tw.from_user;var html='<span class="jta-tweet-timestamp">'+'<a class="jta-tweet-timestamp-link" data-timestamp="'+createdAt+'" href="http://twitter.com/'+screenName+'/status/'+tw.id+'" target="_blank" title="'+
tweetTimestampTooltip+'">'+
tweetTimestamp+'</a>'+'</span>';return html;};defaultTweetTimestampTooltipFormatter=function(timeStamp)
{var d=new Date(timeStamp);return d.toLocaleString();};defaultTweetTimestampFormatter=function(timeStamp)
{var now=new Date();var diff=parseInt((now.getTime()-Date.parse(timeStamp))/1000);var tweetTimestamp='';if(diff<60)
{tweetTimestamp+=diff+' second'+(diff==1?'':'s')+' ago';}
else if(diff<3600)
{var t=parseInt((diff+30)/60);tweetTimestamp+=t+' minute'+(t==1?'':'s')+' ago';}
else if(diff<86400)
{var t=parseInt((diff+1800)/3600);tweetTimestamp+=t+' hour'+(t==1?'':'s')+' ago';}
else
{var d=new Date(timeStamp);var period='AM';var hours=d.getHours();if(hours>12)
{hours-=12;period='PM';}
var mins=d.getMinutes();var minutes=(mins<10?'0':'')+mins;var monthName=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];tweetTimestamp+=monthName[d.getMonth()]+' '+d.getDate();if(d.getFullYear()<now.getFullYear())
{tweetTimestamp+=', '+d.getFullYear();}
var t=parseInt((diff+43200)/86400);tweetTimestamp+=' ('+t+' day'+(t==1?'':'s')+' ago)';}
return tweetTimestamp;};exTimestampFormatter=function(timeStamp)
{var diff=parseInt((new Date().getTime()-Date.parse(timeStamp))/1000);var tweetTimestamp='';if(diff<60)
{tweetTimestamp+='less than a minute ago';}
else if(diff<3600)
{var t=parseInt((diff+30)/60);tweetTimestamp+=t+' minute'+(t==1?'':'s')+' ago';}
else if(diff<86400)
{var t=parseInt((diff+1800)/3600);tweetTimestamp+='about '+t+' hour'+(t==1?'':'s')+' ago';}
else
{var t=parseInt((diff+43200)/86400);tweetTimestamp+='about '+t+' day'+(t==1?'':'s')+' ago';var d=new Date(timeStamp);var period='AM';var hours=d.getHours();if(hours>12)
{hours-=12;period='PM';}
var mins=d.getMinutes();var minutes=(mins<10?'0':'')+mins;tweetTimestamp+=' ('+hours+':'+minutes+' '+period+' '+(d.getMonth()+1)+'/'+d.getDate()+'/'+d.getFullYear()+')';}
return tweetTimestamp;};defaultTweetSourceDecorator=function(tweet,options)
{var tw=tweet.retweeted_status||tweet;var source=tw.source.replace(/\&lt\;/gi,'<').replace(/\&gt\;/gi,'>').replace(/\&quot\;/gi,'"');var html='<span class="jta-tweet-source">'+' via '+'<span class="jta-tweet-source-link">'+
source+'</span>'+'</span>';return html;};defaultTweetGeoLocationDecorator=function(tweet,options)
{var html='';var tw=tweet.retweeted_status||tweet;var q;if(tw.geo&&tw.geo.coordinates)
{q=tw.geo.coordinates.join();}
else if(tw.place&&tw.place.full_name)
{q=tw.place.full_name;}
if(q)
{var location='here';if(tw.place&&tw.place.full_name)
{location=tw.place.full_name;}
var link='http://maps.google.com/maps?q='+q;html='<span class="jta-tweet-location">'+' from '+'<a class="jta-tweet-location-link" href="'+link+'" target="_blank">'+
location+'</a>'+'</span>';}
return html;};defaultTweetInReplyToDecorator=function(tweet,options)
{var tw=tweet.retweeted_status||tweet;var html='';if(tw.in_reply_to_status_id&&tw.in_reply_to_screen_name)
{html='<span class="jta-tweet-inreplyto">'+' '+'<a class="jta-tweet-inreplyto-link" href="http://twitter.com/'+tw.in_reply_to_screen_name+'/status/'+tw.in_reply_to_status_id+'" target="_blank">'+'in reply to '+tw.in_reply_to_screen_name+'</a>'+'</span>';}
return html;};defaultTweetRetweeterDecorator=function(tweet,options)
{var html='';if(tweet.retweeted_status)
{var screenName=tweet.user?tweet.user.screen_name:false||tweet.from_user;var rtc=(tweet.retweeted_status.retweet_count||0)-1;var link='<a class="jta-tweet-retweeter-link" href="http://twitter.com/'+screenName+'" target="_blank">'+
screenName+'</a>';var rtcount=' and '+rtc+(rtc>1?' others':' other');html='<br/>'+'<span class="jta-tweet-retweeter">'+'Retweeted by '+link+
(rtc>0?rtcount:'')+'</span>';}
return html;};defaultConnectButtonDecorator=function(options)
{return'<div class="jta-connect-button"></div>';};defaultLoginInfoDecorator=function(options)
{return'<div class="jta-login-info"></div>';};defaultLoginInfoContentDecorator=function(options,T)
{var html='';if(T.isConnected())
{var screenName=T.currentUser.data('screen_name');var imageUrl=T.currentUser.data('profile_image_url');html='<div class="jta-login-info-profile-image">'+'<a href="http://twitter.com/'+screenName+'" target="_blank">'+'<img src="'+imageUrl+'" alt="'+screenName+'" title="'+screenName+'"/>'+'</a>'+'</div>'+'<div class="jta-login-info-block">'+'<div class="jta-login-info-screen-name">'+'<a href="http://twitter.com/'+screenName+'" target="_blank">'+screenName+'</a>'+'</div>'+'<div class="jta-login-info-sign-out">'+'Sign out'+'</div>'+'</div>'+'<div class="jta-clear">&nbsp;</div>';}
return html;};defaultFollowButtonDecorator=function(options)
{return'<div class="jta-follow-button"></div>';};defaultTweetBoxDecorator=function(options)
{return'<div class="jta-tweet-box"></div>';};defaultLinkDecorator=function(text,options)
{return text.replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi,'<a href="$1" class="jta-tweet-a jta-tweet-link" target="_blank" rel="nofollow">$1<\/a>');};defaultUsernameDecorator=function(text,options)
{return isAnywherePresent()?text:text.replace(/@([a-zA-Z0-9_]+)/gi,'@<a href="http://twitter.com/$1" class="jta-tweet-a twitter-anywhere-user" target="_blank" rel="nofollow">$1<\/a>');};defaultHashtagDecorator=function(text,options)
{return text.replace(/#([a-zA-Z0-9_]+)/gi,'<a href="http://search.twitter.com/search?q=%23$1" class="jta-tweet-a jta-tweet-hashtag" title="#$1" target="_blank" rel="nofollow">#$1<\/a>');};defaultLoadingDecorator=function(options)
{return'<li class="jta-loading">loading ...</li>';};defaultErrorDecorator=function(errorText,options)
{return'<li class="jta-error">ERROR: '+errorText+'</li>';};defaultNoDataDecorator=function(options)
{return'<li class="jta-nodata">No more data</li>';};defaultTweetFilter=function(tweet,options)
{return true;};defaultTweetVisualizer=function(tweetFeedElement,tweetElement,inserter,options)
{tweetFeedElement[inserter](tweetElement);};defaultLoadingIndicatorVisualizer=function(tweetFeedElement,loadingIndicatorElement,options,callback)
{defaultVisualizer(tweetFeedElement,loadingIndicatorElement,'append','fadeIn',600,'fadeOut',200,callback);};defaultAutorefreshTriggerVisualizer=function(tweetFeedElement,triggerElement,options,callback)
{defaultVisualizer(tweetFeedElement,triggerElement,'prepend','slideDown',600,'fadeOut',200,callback);};defaultVisualizer=function(container,element,inserter,effectIn,durationIn,effectOut,durationOut,callback)
{var cb=function()
{if(callback)
{callback();}};if(container)
{element.hide();container[inserter](element);element[effectIn](durationIn,cb);}
else
{element[effectOut](durationOut,function()
{element.remove();cb();});}};defaultOnDataRequestHandler=function(stats,options)
{return true;};defaultOnRateLimitDataHandler=function(stats,options)
{};updateLoginInfoElement=function(options,T)
{if(options._loginInfoElement&&options.loginInfoContentDecorator)
{options._loginInfoElement.children().remove();options._loginInfoElement.append(options.loginInfoContentDecorator(options,T));$(options._baseSelector+' .jta-login-info-sign-out').bind('click',function()
{twttr.anywhere.signOut();});}};getFeedUrl=function(options,flPaging)
{var url=('https:'==document.location.protocol?'https:':'http:');if(options.searchParams)
{url+='//search.twitter.com/search.json?'+
((options.searchParams instanceof Array)?options.searchParams.join('&'):options.searchParams)+'&rpp=100';}
else if(options.list)
{url+='//api.twitter.com/1/'+options.username+'/lists/'+options.list+'/statuses.json?per_page=20';}
else
{url+='//api.twitter.com/1/statuses/user_timeline.json?screen_name='+options.username+'&count=20';if(options._tweetFeedConfig.includeRetweets)
url+='&include_rts=true';}
if(flPaging)
{url+=(options._tweetFeedConfig._maxId?'&max_id='+options._tweetFeedConfig._maxId:'')+'&page='+options._tweetFeedConfig._pageParam;}
url+='&callback=?';return url;};isAnywherePresent=function()
{return typeof(twttr)!='undefined';};clearTweetFeed=function(options)
{if(options._tweetFeedElement)
{options._tweetFeedElement.empty();}};populateTweetFeed=function(options)
{if(options.tweetDecorator&&options._tweetFeedElement)
{getPagedTweets(options,function(tweets,options)
{if(options._tweetFeedConfig._clearBeforePopulate)
{clearTweetFeed(options);}
hideLoadingIndicator(options,function()
{$.each(tweets,function(idx,tweet)
{options.tweetVisualizer(options._tweetFeedElement,$(options.tweetDecorator(tweet,options)),'append',options);});if(options._tweetFeedConfig._noData&&options.noDataDecorator&&!options._tweetFeedConfig._noDataElement)
{options._tweetFeedConfig._noDataElement=$(options.noDataDecorator(options));options._tweetFeedElement.append(options._tweetFeedConfig._noDataElement);}
if(options._tweetFeedConfig._clearBeforePopulate)
{options._tweetFeedElement.scrollTop(0);}
addHovercards(options);});});}};populateTweetFeed2=function(options)
{if(options._tweetFeedElement&&options._autorefreshTweetsCache.length>0)
{if(options._tweetFeedConfig.autorefresh.mode=='trigger-insert')
{if(options._tweetFeedConfig.autorefresh._triggerElement)
{if(options.tweetFeedAutorefreshTriggerContentDecorator)
{options._tweetFeedConfig.autorefresh._triggerElement.html(options.tweetFeedAutorefreshTriggerContentDecorator(options._autorefreshTweetsCache.length,options));}}
else
{if(options.tweetFeedAutorefreshTriggerDecorator)
{options._tweetFeedConfig.autorefresh._triggerElement=$(options.tweetFeedAutorefreshTriggerDecorator(options._autorefreshTweetsCache.length,options));options._tweetFeedConfig.autorefresh._triggerElement.bind('click',function()
{options.autorefreshTriggerVisualizer(null,options._tweetFeedConfig.autorefresh._triggerElement,options,function()
{insertTriggerTweets(options);});options._tweetFeedConfig.autorefresh._triggerElement=null;});options.autorefreshTriggerVisualizer(options._tweetFeedElement,options._tweetFeedConfig.autorefresh._triggerElement,options);}}}
else
{insertTriggerTweets(options);}}};insertTriggerTweets=function(options)
{if(options.tweetDecorator&&options._autorefreshTweetsCache.length>0)
{while(options._autorefreshTweetsCache.length>0)
{var tweet=options._autorefreshTweetsCache.pop();options._tweetsCache.unshift(tweet);options._tweetFeedConfig.paging._offset++;options.tweetVisualizer(options._tweetFeedElement,$(options.tweetDecorator(tweet,options)),'prepend',options);}
addHovercards(options);}};addHovercards=function(options)
{if(isAnywherePresent())
{twttr.anywhere(function(T)
{T(options._baseSelector+' .jta-tweet-list').hovercards({expanded:options._tweetFeedConfig.expandHovercards});T(options._baseSelector+' .jta-tweet-profile-image img').hovercards({expanded:options._tweetFeedConfig.expandHovercards,username:function(node){return node.alt;}});T(options._baseSelector+' .jta-tweet-retweeter-link').hovercards({expanded:options._tweetFeedConfig.expandHovercards,username:function(node){return node.text;}});T(options._baseSelector+' .jta-tweet-user-screen-name-link').hovercards({expanded:options._tweetFeedConfig.expandHovercards,username:function(node){return node.text;}});T(options._baseSelector+' .jta-tweet-user-full-name-link').hovercards({expanded:options._tweetFeedConfig.expandHovercards,username:function(node){return node.name;}});});}};populateAnywhereControls=function(options)
{if(isAnywherePresent())
{twttr.anywhere(function(T)
{if(options.tweetBoxDecorator)
{T(options._baseSelector+' .jta-tweet-box').tweetBox(options._tweetBoxConfig);}
if(options.followButtonDecorator)
{T(options._baseSelector+' .jta-follow-button').followButton(options.username);}
if(options.connectButtonDecorator)
{var o=$.extend({authComplete:function(user)
{updateLoginInfoElement(options,T);},signOut:function()
{updateLoginInfoElement(options,T);}},options._connectButtonConfig);T(options._baseSelector+' .jta-connect-button').connectButton(o);updateLoginInfoElement(options,T);}});}};bindEventHandlers=function(options)
{if(options.tweetFeedControlsDecorator)
{if(options._tweetFeedConfig.paging.mode=='prev-next')
{$(options._baseSelector+' .jta-tweet-list-controls-button-prev').bind('click',function()
{if(!isLoading(options)&&options._tweetFeedConfig.paging._offset>0)
{prevPage(options,true);}});$(options._baseSelector+' .jta-tweet-list-controls-button-next').bind('click',function()
{if(!isLoading(options))
{nextPage(options,true);}});}
else if(options._tweetFeedConfig.paging.mode=='endless-scroll')
{options._tweetFeedElement.bind("scroll",function()
{if(!isLoading(options)&&($(this)[0].scrollHeight-$(this).scrollTop()==$(this).outerHeight()))
{nextPage(options,false);}});}
else
{$(options._baseSelector+' .jta-tweet-list-controls-button-more').bind('click',function()
{if(!isLoading(options))
{nextPage(options,false);}});}}};nextPage=function(options,flClear)
{doPage(options,flClear,Math.min(options._tweetFeedConfig.paging._offset+options._tweetFeedConfig.paging._limit,options._tweetsCache.length));};prevPage=function(options,flClear)
{doPage(options,flClear,Math.max(0,options._tweetFeedConfig.paging._offset-options._tweetFeedConfig.paging._limit));};doPage=function(options,flClear,newOffset)
{options._tweetFeedConfig.paging._offset=newOffset;options._tweetFeedConfig._clearBeforePopulate=flClear;populateTweetFeed(options);};startAutorefresh=function(options)
{if(options._tweetFeedConfig.autorefresh.mode!='none'&&options._tweetFeedConfig.paging.mode!='prev-next'&&options._tweetFeedConfig.autorefresh.duration!=0&&(options._tweetFeedConfig.autorefresh.duration<0||(new Date().getTime()-options._tweetFeedConfig.autorefresh._startTime)<=options._tweetFeedConfig.autorefresh.duration*1000))
{window.setTimeout(function(){processAutorefresh(options);},options._tweetFeedConfig.autorefresh.interval*1000);}};stopAutorefresh=function(options)
{options._tweetFeedConfig.autorefresh.duration=0;};processAutorefresh=function(options)
{if(options._tweetFeedConfig.autorefresh.duration!=0)
{getRateLimitedData(options,true,getFeedUrl(options,false),function(data,options)
{var tweets=(data.results||data).slice(0);tweets.reverse();$.each(tweets,function(idx,tweet)
{if(!isTweetInCache(tweet,options))
{if(options.tweetFilter(tweet,options))
{options._autorefreshTweetsCache.unshift(tweet);}}});populateTweetFeed2(options);});startAutorefresh(options);}};startTimestampRefresh=function(options)
{if(options.tweetTimestampDecorator&&typeof(options._tweetFeedConfig.showTimestamp)=='object'&&options._tweetFeedConfig.showTimestamp.refreshInterval>0)
{window.setTimeout(function(){processTimestampRefresh(options);},options._tweetFeedConfig.showTimestamp.refreshInterval*1000);}};processTimestampRefresh=function(options)
{$.each(options._tweetFeedElement.find('.jta-tweet-timestamp-link'),function(idx,element)
{var dataTimestamp=$(element).attr('data-timestamp');$(element).html(options.tweetTimestampFormatter(dataTimestamp));});startTimestampRefresh(options);};isTweetInCache=function(tweet,options)
{var l=options._tweetsCache.length;for(var i=0;i<l;i++)
{if(tweet.id==options._tweetsCache[i].id)
{return true;}}
return false;};showLoadingIndicator=function(options)
{if(options._tweetFeedElement&&options.loadingDecorator&&!options._loadingIndicatorElement)
{options._loadingIndicatorElement=$(options.loadingDecorator(options));options.loadingIndicatorVisualizer(options._tweetFeedElement,options._loadingIndicatorElement,options,null);options._tweetFeedElement.scrollTop(1000000);}};hideLoadingIndicator=function(options,callback)
{if(options._loadingIndicatorElement)
{options.loadingIndicatorVisualizer(null,options._loadingIndicatorElement,options,callback);options._loadingIndicatorElement=null;}
else
{if(callback)
{callback();}}};isLoading=function(options)
{return options._loadingIndicatorElement!=null;};formatDate=function(dateStr)
{return dateStr.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i,'$1,$2$4$3');};validateRange=function(num,lo,hi)
{if(num<lo)
num=lo;if(num>hi)
num=hi;return num;};showError=function(options,errorText)
{if(options.errorDecorator&&options._tweetFeedElement)
{options._tweetFeedElement.append(options.errorDecorator(errorText,options));}};getPagedTweets=function(options,callback)
{options._tweetFeedConfig._recLevel=0;getRecPagedTweets(options,options._tweetFeedConfig.paging._offset,options._tweetFeedConfig.paging._limit,callback);};getRecPagedTweets=function(options,offset,limit,callback)
{++options._tweetFeedConfig._recLevel;if(offset+limit<=options._tweetsCache.length||options._tweetFeedConfig._recLevel>3||options._tweetFeedConfig._noData)
{if(offset+limit>options._tweetsCache.length)
{limit=Math.max(0,options._tweetsCache.length-offset);}
var tweets=[];for(var i=0;i<limit;i++)
{tweets[i]=options._tweetsCache[offset+i];}
callback(tweets,options);}
else
{++options._tweetFeedConfig._pageParam;getRateLimitedData(options,false,getFeedUrl(options,true),function(data,options)
{var tweets=data.results||data;if(tweets.length==0)
{options._tweetFeedConfig._noData=true;}
else
{$.each(tweets,function(idx,tweet)
{if(tweet.id_str){tweet.id=tweet.id_str;}
if(tweet.in_reply_to_status_id_str){tweet.in_reply_to_status_id=tweet.in_reply_to_status_id_str;}
if(!options._tweetFeedConfig._maxId)
{options._tweetFeedConfig._maxId=tweet.id;}
if(options.tweetFilter(tweet,options))
{options._tweetsCache.push(tweet);}});}
getRecPagedTweets(options,offset,limit,callback);});}};getRateLimitedData=function(options,flAutorefresh,url,callback)
{getRateLimit(options,function(rateLimit)
{if(rateLimit&&rateLimit.remaining_hits<=0)
{options._stats.rateLimitPreventionCount++;hideLoadingIndicator(options,null);return;}
getData(options,flAutorefresh,url,callback);});};getData=function(options,flAutorefresh,url,callback)
{options._stats.dataRequestCount++;if(!options.onDataRequestHandler(options._stats,options))
{hideLoadingIndicator(options,null);return;}
if(!flAutorefresh)
{showLoadingIndicator(options);}
$.getJSON(url,function(data)
{if(data.error)
{showError(options,data.error);}
else
{callback(data,options);}});};getRateLimit=function(options,callback)
{$.getJSON("http://api.twitter.com/1/account/rate_limit_status.json?callback=?",function(rateLimit)
{options._stats.rateLimit=rateLimit;options.onRateLimitDataHandler(options._stats,options);callback(rateLimit);});};})(jQuery);;(function($)
{var twitterCount=1;$.fn.lofTwitter=function(options)
{var options=$.extend({showMode:'ticker',travelocity:0.07,vertical:true,hoverPause:true,visible:3,auto:500,speed:1000},options);return this.each(function(){var lofTwitter=$(this);options=$.extend({lofTwitter:lofTwitter},options);$(lofTwitter).jTweetsAnywhere(options);twitterCount++;});}
initSlider=function(options){var lofTwitter=options.lofTwitter;if(options.showMode=="ticker"){var wrapperWidth=(options.itemWidth+options.space)*options.count;$(lofTwitter).css({width:wrapperWidth});$(lofTwitter).find("li.jta-tweet-list-item").css({width:options.itemWidth,height:options.itemHeight});$(lofTwitter).find("ul.jta-tweet-list").liScroll(options);}
else if(options.showMode=="scroll"){$(lofTwitter).jScrollPane(options);}
else{$(lofTwitter).jCarouselLite(options);}}
populateTweetFeed=function(options)
{if(options.tweetDecorator&&options._tweetFeedElement)
{getPagedTweets(options,function(tweets,options)
{if(options._tweetFeedConfig._clearBeforePopulate)
{clearTweetFeed(options);}
hideLoadingIndicator(options,function()
{$.each(tweets,function(idx,tweet)
{options.tweetVisualizer(options._tweetFeedElement,$(options.tweetDecorator(tweet,options)),'append',options);});if(options._tweetFeedConfig._noData&&options.noDataDecorator&&!options._tweetFeedConfig._noDataElement)
{options._tweetFeedConfig._noDataElement=$(options.noDataDecorator(options));options._tweetFeedElement.append(options._tweetFeedConfig._noDataElement);}
if(options._tweetFeedConfig._clearBeforePopulate)
{options._tweetFeedElement.scrollTop(0);}
addHovercards(options);initSlider(options);});});}};})(jQuery);;function WishlistCart(id,action,id_product,id_product_attribute,quantity)
{$.ajax({type:'GET',url:baseDir+'modules/blockwishlist/cart.php',async:true,cache:false,data:'action='+action+'&id_product='+id_product+'&quantity='+quantity+'&token='+static_token+'&id_product_attribute='+id_product_attribute,success:function(data)
{if(action=='add')
{var $element=$('#bigpic');if(!$element.length)
var $element=$('#wishlist_button');var $picture=$element.clone();var pictureOffsetOriginal=$element.offset();$picture.css({'position':'absolute','top':pictureOffsetOriginal.top,'left':pictureOffsetOriginal.left});var pictureOffset=$picture.offset();var wishlistBlockOffset=$('#wishlist_block').offset();$picture.appendTo('body');$picture.css({'position':'absolute','top':$picture.css('top'),'left':$picture.css('left')}).animate({'width':$element.attr('width')*0.66,'height':$element.attr('height')*0.66,'opacity':0.2,'top':wishlistBlockOffset.top+30,'left':wishlistBlockOffset.left+15},1000).fadeOut(800);}
if($('#'+id).length!=0)
{$('#'+id).slideUp('normal');document.getElementById(id).innerHTML=data;$('#'+id).slideDown('normal');}}});}
function WishlistChangeDefault(id,id_wishlist)
{$.ajax({type:'GET',url:baseDir+'modules/blockwishlist/cart.php',async:true,data:'id_wishlist='+id_wishlist+'&token='+static_token,cache:false,success:function(data)
{$('#'+id).slideUp('normal');document.getElementById(id).innerHTML=data;$('#'+id).slideDown('normal');}});}
function WishlistBuyProduct(token,id_product,id_product_attribute,id_quantity,button,ajax)
{if(ajax)
ajaxCart.add(id_product,id_product_attribute,false,button,1,[token,id_quantity]);else
{$('#'+id_quantity).val(0);WishlistAddProductCart(token,id_product,id_product_attribute,id_quantity)
document.forms['addtocart'+'_'+id_product+'_'+id_product_attribute].method='POST';document.forms['addtocart'+'_'+id_product+'_'+id_product_attribute].action=baseUri+'?controller=cart';document.forms['addtocart'+'_'+id_product+'_'+id_product_attribute].elements['token'].value=static_token;document.forms['addtocart'+'_'+id_product+'_'+id_product_attribute].submit();}
return(true);}
function WishlistAddProductCart(token,id_product,id_product_attribute,id_quantity)
{if($('#'+id_quantity).val()<=0)
return(false);$.ajax({type:'GET',url:baseDir+'modules/blockwishlist/buywishlistproduct.php',data:'token='+token+'&static_token='+static_token+'&id_product='+id_product+'&id_product_attribute='+id_product_attribute,async:true,cache:false,success:function(data)
{if(data)
alert(data);else
{$('#'+id_quantity).val($('#'+id_quantity).val()-1);}}});return(true);}
function WishlistManage(id,id_wishlist)
{$.ajax({type:'GET',async:true,url:baseDir+'modules/blockwishlist/managewishlist.php',data:'id_wishlist='+id_wishlist+'&refresh='+false,cache:false,success:function(data)
{$('#'+id).hide();document.getElementById(id).innerHTML=data;$('#'+id).fadeIn('slow');}});}
function WishlistProductManage(id,action,id_wishlist,id_product,id_product_attribute,quantity,priority)
{$.ajax({type:'GET',async:true,url:baseDir+'modules/blockwishlist/managewishlist.php',data:'action='+action+'&id_wishlist='+id_wishlist+'&id_product='+id_product+'&id_product_attribute='+id_product_attribute+'&quantity='+quantity+'&priority='+priority+'&refresh='+true,cache:false,success:function(data)
{if(action=='delete')
$('#wlp_'+id_product+'_'+id_product_attribute).fadeOut('fast');else if(action=='update')
{$('#wlp_'+id_product+'_'+id_product_attribute).fadeOut('fast');$('#wlp_'+id_product+'_'+id_product_attribute).fadeIn('fast');}}});}
function WishlistDelete(id,id_wishlist,msg)
{var res=confirm(msg);if(res==false)
return(false);$.ajax({type:'GET',async:true,url:baseDir+'modules/blockwishlist/mywishlist.php',cache:false,data:'deleted&id_wishlist='+id_wishlist,success:function(data)
{$('#'+id).fadeOut('slow');}});}
function WishlistVisibility(bought_class,id_button)
{if($('#hide'+id_button).css('display')=='none')
{$('.'+bought_class).slideDown('fast');$('#show'+id_button).hide();$('#hide'+id_button).css('display','block');}
else
{$('.'+bought_class).slideUp('fast');$('#hide'+id_button).hide();$('#show'+id_button).css('display','block');}}
function WishlistSend(id,id_wishlist,id_email)
{$.post(baseDir+'modules/blockwishlist/sendwishlist.php',{token:static_token,id_wishlist:id_wishlist,email1:$('#'+id_email+'1').val(),email2:$('#'+id_email+'2').val(),email3:$('#'+id_email+'3').val(),email4:$('#'+id_email+'4').val(),email5:$('#'+id_email+'5').val(),email6:$('#'+id_email+'6').val(),email7:$('#'+id_email+'7').val(),email8:$('#'+id_email+'8').val(),email9:$('#'+id_email+'9').val(),email10:$('#'+id_email+'10').val()},function(data)
{if(data)
alert(data);else
WishlistVisibility(id,'hideSendWishlist');});};