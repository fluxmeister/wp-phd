window.wp=window.wp||{},window.wp.wordcount=function(e){var n={};function r(t){if(n[t])return n[t].exports;var u=n[t]={i:t,l:!1,exports:{}};return e[t].call(u.exports,u,u.exports,r),u.l=!0,u.exports}return r.m=e,r.c=n,r.d=function(e,n,t){r.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:t})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,n){if(1&n&&(e=r(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(r.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var u in e)r.d(t,u,function(n){return e[n]}.bind(null,u));return t},r.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(n,"a",n),n},r.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},r.p="",r(r.s=535)}({2:function(e,n){e.exports=window.lodash},535:function(e,n,r){"use strict";r.r(n),r.d(n,"count",(function(){return x}));var t=r(2),u={HTMLRegExp:/<\/?[a-z][^>]*?>/gi,HTMLcommentRegExp:/<!--[\s\S]*?-->/g,spaceRegExp:/&nbsp;|&#160;/gi,HTMLEntityRegExp:/&\S+?;/g,connectorRegExp:/--|\u2014/g,removeRegExp:new RegExp(["[","!-@[-`{-~","-¿×÷"," -⯿","⸀-⹿","]"].join(""),"g"),astralRegExp:/[\uD800-\uDBFF][\uDC00-\uDFFF]/g,wordsRegExp:/\S\s+/g,characters_excluding_spacesRegExp:/\S/g,characters_including_spacesRegExp:/[^\f\n\r\t\v\u00AD\u2028\u2029]/g,l10n:{type:"words"}};function c(e,n){return n.replace(e.HTMLRegExp,"\n")}function o(e,n){return n.replace(e.astralRegExp,"a")}function l(e,n){return n.replace(e.HTMLEntityRegExp,"")}function i(e,n){return n.replace(e.connectorRegExp," ")}function a(e,n){return n.replace(e.removeRegExp,"")}function p(e,n){return n.replace(e.HTMLcommentRegExp,"")}function s(e,n){return e.shortcodesRegExp?n.replace(e.shortcodesRegExp,"\n"):n}function d(e,n){return n.replace(e.spaceRegExp," ")}function g(e,n){return n.replace(e.HTMLEntityRegExp,"a")}function f(e,n,r){var u,l;return e=Object(t.flow)(c.bind(null,r),p.bind(null,r),s.bind(null,r),o.bind(null,r),d.bind(null,r),g.bind(null,r))(e),null!==(u=null===(l=(e+="\n").match(n))||void 0===l?void 0:l.length)&&void 0!==u?u:0}function x(e,n,r){var o=function(e,n){var r,c,o=Object(t.extend)({},u,n);return o.shortcodes=null!==(r=null===(c=o.l10n)||void 0===c?void 0:c.shortcodes)&&void 0!==r?r:[],o.shortcodes&&o.shortcodes.length&&(o.shortcodesRegExp=new RegExp("\\[\\/?(?:"+o.shortcodes.join("|")+")[^\\]]*?\\]","g")),o.type=e,"characters_excluding_spaces"!==o.type&&"characters_including_spaces"!==o.type&&(o.type="words"),o}(n,r);switch(o.type){case"words":return function(e,n,r){var u,o;return e=Object(t.flow)(c.bind(null,r),p.bind(null,r),s.bind(null,r),d.bind(null,r),l.bind(null,r),i.bind(null,r),a.bind(null,r))(e),null!==(u=null===(o=(e+="\n").match(n))||void 0===o?void 0:o.length)&&void 0!==u?u:0}(e,o.wordsRegExp,o);case"characters_including_spaces":return f(e,o.characters_including_spacesRegExp,o);case"characters_excluding_spaces":return f(e,o.characters_excluding_spacesRegExp,o);default:return 0}}}});