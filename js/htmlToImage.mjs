var e,t="application/font-woff",n={woff:t,woff2:t,ttf:"application/font-truetype",eot:"application/vnd.ms-fontobject",png:"image/png",jpg:"image/jpeg",jpeg:"image/jpeg",gif:"image/gif",tiff:"image/tiff",svg:"image/svg+xml"},r=(e=0,function(){return e+=1,"u"+("0000"+(Math.random()*Math.pow(36,4)<<0).toString(36)).slice(-4)+e});function o(e){var t=function(e){var t=/\.([^./]*?)$/g.exec(e);return t?t[1]:""}(e).toLowerCase();return n[t]||""}function u(e){return new Promise((function(t,n){var r=new Image;r.onload=function(){t(r)},r.onerror=n,r.crossOrigin="anonymous",r.src=e}))}function i(e){return-1!==e.search(/^(data:)/)}function c(e,t){return"data:"+t+";base64,"+e}function a(e){return e.split(/,/)[1]}function s(e){return e.toBlob?new Promise((function(t){e.toBlob(t)})):function(e){return new Promise((function(t){for(var n=window.atob(e.toDataURL().split(",")[1]),r=n.length,o=new Uint8Array(r),u=0;u<r;u+=1)o[u]=n.charCodeAt(u);t(new Blob([o],{type:"image/png"}))}))}(e)}function f(e){for(var t=[],n=0,r=e.length;n<r;n+=1)t.push(e[n]);return t}function l(e,t){var n=window.getComputedStyle(e).getPropertyValue(t);return parseFloat(n.replace("px",""))}function h(e){return Promise.resolve().then((function(){return(new XMLSerializer).serializeToString(e)})).then(encodeURIComponent).then((function(e){return"data:image/svg+xml;charset=utf-8,"+e}))}function d(e,t){[":before",":after"].forEach((function(n){return function(e,t,n){var o=window.getComputedStyle(e,n),u=o.getPropertyValue("content");if(""!==u&&"none"!==u){var i=r(),c=document.createElement("style");c.appendChild(function(e,t,n){var r="."+e+":"+t,o=n.cssText?function(e){var t=e.getPropertyValue("content");return e.cssText+" content: "+t+";"}(n):function(e){return f(e).map((function(t){return t+": "+e.getPropertyValue(t)+(e.getPropertyPriority(t)?" !important":"")+";"})).join(" ")}(n);return document.createTextNode(r+"{"+o+"}")}(i,n,o)),t.className=t.className+" "+i,t.appendChild(c)}}(e,t,n)}))}function m(e){if(e instanceof HTMLCanvasElement){var t=e.toDataURL();return"data:,"===t?Promise.resolve(e.cloneNode(!1)):u(t)}return e.tagName&&"svg"===e.tagName.toLowerCase()?Promise.resolve(e).then((function(e){return h(e)})).then(u):Promise.resolve(e.cloneNode(!1))}function g(e,t,n){return n||!t||t(e)?Promise.resolve(e).then(m).then((function(n){return function(e,t,n){var r=f(e.childNodes);return 0===r.length?Promise.resolve(t):r.reduce((function(e,r){return e.then((function(){return g(r,n)})).then((function(e){e&&t.appendChild(e)}))}),Promise.resolve()).then((function(){return t}))}(e,n,t)})).then((function(t){return function(e,t){return t instanceof Element?Promise.resolve().then((function(){return function(e,t){var n=window.getComputedStyle(e);n.cssText?t.style.cssText=n.cssText:f(n).forEach((function(e){t.style.setProperty(e,n.getPropertyValue(e),n.getPropertyPriority(e))}))}(e,t)})).then((function(){return d(e,t)})).then((function(){return function(e,t){e instanceof HTMLTextAreaElement&&(t.innerHTML=e.value),e instanceof HTMLInputElement&&t.setAttribute("value",e.value)}(e,t)})).then((function(){return t})):t}(e,t)})):Promise.resolve(null)}function p(e,t){return t.cacheBust&&(e+=(/\?/.test(e)?"&":"?")+(new Date).getTime()),(window.fetch?window.fetch(e).then((function(e){return e.blob()})).then((function(e){return new Promise((function(t,n){var r=new FileReader;r.onloadend=function(){return t(r.result)},r.onerror=n,r.readAsDataURL(e)}))})).then(a).catch((function(){return new Promise((function(e,t){t()}))})):new Promise((function(t,n){var r=new XMLHttpRequest;r.onreadystatechange=function(){if(4===r.readyState)if(200===r.status){var o=new FileReader;o.onloadend=function(){t(a(o.result))},o.readAsDataURL(r.response)}else n(new Error("Failed to fetch resource: "+e+", status: "+r.status))},r.ontimeout=function(){n(new Error("Timeout of 30000ms occured while fetching resource: "+e))},r.responseType="blob",r.timeout=3e4,r.open("GET",e,!0),r.send()}))).catch((function(e){var n="";if(t.imagePlaceholder){var r=t.imagePlaceholder.split(/,/);r&&r[1]&&(n=r[1])}return e&&("string"==typeof e||e.message),n}))}var v=/url\((['"]?)([^'"]+?)\1\)/g;function w(e){var t=[];return e.replace(v,(function(e,n,r){return t.push(r),e})),t.filter((function(e){return!i(e)}))}function P(e){return-1!==e.search(v)}function y(e,t,n){return P(e)?Promise.resolve(e).then(w).then((function(r){return r.reduce((function(e,r){return e.then((function(e){return function(e,t,n,r){var u=n?function(e,t){if(e.match(/^[a-z]+:\/\//i))return e;if(e.match(/^\/\//))return window.location.protocol+e;if(e.match(/^[a-z]+:/i))return e;var n=document.implementation.createHTMLDocument(),r=n.createElement("base"),o=n.createElement("a");return n.head.appendChild(r),n.body.appendChild(o),t&&(r.href=t),o.href=e,o.href}(t,n):t;return Promise.resolve(u).then((function(e){return p(e,r)})).then((function(e){return c(e,o(t))})).then((function(n){return e.replace(new RegExp("(url\\(['\"]?)("+function(e){return e.replace(/([.*+?^${}()|\[\]\/\\])/g,"\\€0.82")}(t)+")(['\"]?\\))","g"),"€0.82"+n+"€2.47")})).then((function(e){return e}),(function(){return u}))}(e,r,t,n)}))}),Promise.resolve(e))})):Promise.resolve(e)}function b(e){if(void 0===e)return[];var t=e,n=[],r=new RegExp("(\\/\\*[\\s\\S]*?\\*\\/)","gi");t=t.replace(r,"");for(var o,u=new RegExp("((@.*?keyframes [\\s\\S]*?){([\\s\\S]*?}\\s*?)})","gi");null!==(o=u.exec(t));)n.push(o[0]);t=t.replace(u,"");for(var i=new RegExp("((\\s*?(?:\\/\\*[\\s\\S]*?\\*\\/)?\\s*?@media[\\s\\S]*?){([\\s\\S]*?)}\\s*?})|(([\\s\\S]*?){([\\s\\S]*?)})","gi");null!==(o=i.exec(t));)n.push(o[0]);return n}function S(e,t){return fetch(e).then((function(t){return{url:e,cssText:t.text()}}),(function(e){}))}function R(e){return e.cssText.then((function(t){var n=t,r=/url\(["']?([^"')]+)["']?\)/g,o=(n.match(/url\([^)]+\)/g)||[]).map((function(t){var o=t.replace(r,"€0.82");if(!o.startsWith("https://")){var u=e.url;o=new URL(o,u).href}return new Promise((function(e,r){fetch(o).then((function(e){return e.blob()})).then((function(r){var o=new FileReader;o.addEventListener("load",(function(r){n=n.replace(t,"url("+o.result+")"),e([t,o.result])})),o.readAsDataURL(r)})).catch(r)}))}));return Promise.all(o).then((function(){return n}))}))}function E(e){var t=[],n=[];return e.forEach((function(t){if("cssRules"in t)try{f(t.cssRules).forEach((function(e){e.type===CSSRule.IMPORT_RULE&&n.push(S(e.href).then(R).then((function(e){b(e).forEach((function(e){t.insertRule(e,t.cssRules.length)}))})).catch((function(e){})))}))}catch(o){var r=e.find((function(e){return null===e.href}))||document.styleSheets[0];null!=t.href&&n.push(S(t.href).then(R).then((function(e){b(e).forEach((function(e){r.insertRule(e,t.cssRules.length)}))})).catch((function(e){})))}})),Promise.all(n).then((function(){return e.forEach((function(e){if("cssRules"in e)try{f(e.cssRules).forEach((function(e){t.push(e)}))}catch(e){}})),t}))}function x(e){return e.filter((function(e){return e.type===CSSRule.FONT_FACE_RULE})).filter((function(e){return P(e.style.getPropertyValue("src"))}))}function C(e,t){var n,r,o;return void 0===t&&(t={}),{width:t.width||(r=l(n=e,"border-left-width"),o=l(n,"border-right-width"),n.scrollWidth+r+o),height:t.height||function(e){var t=l(e,"border-top-width"),n=l(e,"border-bottom-width");return e.scrollHeight+t+n}(e)}}function T(e,t){void 0===t&&(t={});var n=C(e,t),r=n.width,u=n.height;return g(e,t.filter,!0).then((function(e){return function(e,t){return function(e){return new Promise((function(t,n){e.ownerDocument||n(new Error("Provided element is not within a Document")),t(f(e.ownerDocument.styleSheets))})).then(E).then(x)}(e).then((function(e){return Promise.all(e.map((function(e){var n=e.parentStyleSheet?e.parentStyleSheet.href:null;return y(e.cssText,n,t)})))})).then((function(e){return e.join("\n")})).then((function(t){var n=document.createElement("style"),r=document.createTextNode(t);return n.appendChild(r),e.firstChild?e.insertBefore(n,e.firstChild):e.appendChild(n),e}))}(e,t)})).then((function(e){return function e(t,n){return t instanceof Element?Promise.resolve(t).then((function(e){return function(e,t){var n=e.style.getPropertyValue("background");return n?Promise.resolve(n).then((function(e){return y(e,null,t)})).then((function(t){return e.style.setProperty("background",t,e.style.getPropertyPriority("background")),e})):Promise.resolve(e)}(e,n)})).then((function(e){return function(e,t){return e instanceof HTMLImageElement&&!i(e.src)?Promise.resolve(e.src).then((function(e){return p(e,t)})).then((function(t){return c(t,o(e.src))})).then((function(t){return new Promise((function(n,r){e.onload=n,e.onerror=r,e.src=t}))})).then((function(){return e}),(function(){return e})):Promise.resolve(e)}(e,n)})).then((function(t){return function(t,n){var r=f(t.childNodes).map((function(t){return e(t,n)}));return Promise.all(r).then((function(){return t}))}(t,n)})):Promise.resolve(t)}(e,t)})).then((function(e){return function(e,t){var n=e.style;return t.backgroundColor&&(n.backgroundColor=t.backgroundColor),t.width&&(n.width=t.width+"px"),t.height&&(n.height=t.height+"px"),t.style&&Object.assign(n,t.style),e}(e,t)})).then((function(e){return function(e,t,n){var r="http://www.w3.org/2000/svg",o=document.createElementNS(r,"svg"),u=document.createElementNS(r,"foreignObject");return o.setAttributeNS("","width",""+t),o.setAttributeNS("","height",""+n),u.setAttributeNS("","width","100%"),u.setAttributeNS("","height","100%"),u.setAttributeNS("","x","0"),u.setAttributeNS("","y","0"),u.setAttributeNS("","externalResourcesRequired","true"),o.appendChild(u),u.appendChild(e),h(o)}(e,r,u)}))}function L(e,t){return void 0===t&&(t={}),T(e,t).then(u).then((100,function(e){return new Promise((function(t){setTimeout((function(){t(e)}),100)}))})).then((function(n){var r=document.createElement("canvas"),o=r.getContext("2d"),u=window.devicePixelRatio||1,i=C(e,t),c=i.width,a=i.height;return r.width=c*u,r.height=a*u,r.style.width=""+c,r.style.height=""+a,o.scale(u,u),t.backgroundColor&&(o.fillStyle=t.backgroundColor,o.fillRect(0,0,r.width,r.height)),o.drawImage(n,0,0),r}))}function N(e,t){void 0===t&&(t={});var n=C(e,t),r=n.width,o=n.height;return L(e,t).then((function(e){return e.getContext("2d").getImageData(0,0,r,o).data}))}function A(e,t){return void 0===t&&(t={}),L(e,t).then((function(e){return e.toDataURL()}))}function D(e,t){return void 0===t&&(t={}),L(e,t).then((function(e){return e.toDataURL("image/jpeg",t.quality||1)}))}function U(e,t){return void 0===t&&(t={}),L(e,t).then(s)}var M={toSvgDataURL:T,toCanvas:L,toPixelData:N,toPng:A,toJpeg:D,toBlob:U};export default M;export{U as toBlob,L as toCanvas,D as toJpeg,N as toPixelData,A as toPng,T as toSvgDataURL};