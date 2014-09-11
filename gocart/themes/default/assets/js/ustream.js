/**!
 * Ustream Embed API
 * http://ustream.tv/
 *
 * Enables sites using Ustream embed iframe to build and adapt on the embed player.
 * The Ustream Embed API provides basic methods to control the live stream
 * or video playback, and enables the user to access essential events
 * of the live stream or played video.
 *
 * USAGE
 *
 * Create an instance of the Embed API by providing the ID of the iframe,
 * or the iframe DOM object itself:
 *
 * var viewer = UstreamEmbed('UstreamIframe');
 *
 * The Ustream Embed API provides the following:
 *
 *     callMethod
 *     getProperty
 *     addListener
 *     removeListener
 *
 * Available methods through 'callMethod':
 *
 *     play
 *         Starts playing the currently loaded channel or video
 *
 *         Example:
 *             viewer.callMethod('play');
 *
 *     pause
 *         Pauses the live stream, or the playback of a video
 *
 *         Example:
 *             viewer.callMethod('pause');
 *
 *     stop
 *         Pauses the live stream, or stops the video and jumps back to the start
 *
 *         Example:
 *             viewer.callMethod('stop');
 *
 *     load
 *         Loads a channel or a video in the player
 *         Requires two additional arguments:
 *             type - the loaded content type (channel|video)
 *             id   - the loaded content id
 *
 *         Example:
 *             viewer.callMethod('load', 'video', 5903947);
 *             viewer.callMethod('load', 'channel', 1524);
 *
 *     seek
 *         Jumps to given position in played recorded video
 *         Requires one argument:
 *             position in seconds
 *
 *         Example:
 *             viewer.callMethod('seek', 180);
 *
 *     volume
 *         Sets the playback sound volume
 *         Requires one argument:
 *             volume percent between 0-100
 *
 *         Example:
 *             viewer.callMethod('volume', 0); // mute
 *
 *     quality
 *         Sets the stream quality, if available
 *         Requires one argument:
 *            a quality index from received quality options in quality event
 *
 *         Example:
 *             viewer.callMethod('quality', 16); // set to high
 *
 *
 * Accessable properties by 'getProperty':
 *
 *     duration
 *         Get the video duration in seconds
 *
 *         Example:
 *             viewer.getProperty('duration', callBack);
 *
 *     viewers
 *         Get the current viewer count for the loaded live stream
 *
 *         Example:
 *             viewer.getProperty('viewers', callBack);
 *
 *     progress
 *         Get the current progress for recorded video playback
 *
 *         Example:
 *             viewer.getProperty('progress', callBack);
 *
 *
 * Available events for 'addListener' and 'removeListener':
 *
 *     live
 *         Called when the currently loaded channel becomes live
 *
 *         Example:
 *             viewer.addListener('live', callBack);
 *
 *     offline
 *         Called when the currently loaded channel goes offline
 *
 *         Example:
 *             viewer.addListener('offline', callBack);
 *
 *     finished
 *         Called when the currently loaded and played video reaches its end
 *
 *         Example:
 *             viewer.addListener('finished', callBack);
 *
 *     playing
 *         Called when the currently loaded content playback is started or stopped
 *         Received arguments: playing (boolean)
 *
 *         Example:
 *             viewer.addListener('playing', callBack);
 *
 *     size
 *         Called when the stream size is available,
 *         or changed (changes reported only in flash mode)
 *         Data is the size of the ideal embed iframe according to it's width,
 *         and the stream aspect ratio. Player bar height is included
 *         Received arguments: size (array) width, height
 *
 *         Example:
 *             viewer.addListener('size', callBack);
 *
 *     quality
 *         Called when the stream quality options are available.
 *         Receives an object, with the quality IDs as keys,
 *         and an object with two properties as values:
 *
 *         {
 *             label: "480p", // label to show to users on control UI
 *             active: true  // if this quality is used or set
 *         }
 *
 *         Example:
 *             viewer.addListener('quality', callBack);
 *
 */
var UstreamEmbed=function(){function e(t){return new e.fn.initialize(t)}function p(e){if(typeof e==="string"){e=document.getElementById(e)}return e}function d(e,t){for(var n in l[e]){l[e][n].call(window,e,t)}}function v(e,t){if(!f[e]){return}for(var n in f[e]){f[e][n].call(window,t)}f[e]=null;delete f[e]}function m(e){var t,n;if(!r&&!o){c.push({origin:e.origin,data:e.data})}if(e.origin==r){t=JSON.parse(e.data);if(t.sstream&&u){g(e);return}if(!!t.event&&t.event.ready){y();d("ready")}if(!!t.event&&t.event.live===true){d("live");return}else if(!!t.event&&t.event.live===false){d("offline");return}if(!!t.event&&!t.event.ready){if(i){Object.keys(t.event).forEach(function(e){d(e,t.event[e])})}else{for(var a in t.event){d(a,t.event[a])}}}if(!!t.property){if(i){Object.keys(t.property).forEach(function(e){v(e,t.property[e])})}else{for(var a in t.property){v(a,t.property[a])}}}}else if(s&&e.origin==o){g(e);return}}function g(e){var t=JSON.parse(e.data);if(!!t.cmd&&t.cmd=="ready"){E(u,o,{cmd:"ready"});return}args=[t.cmd];args=args.concat(t.args);b.apply(this,args)}function y(){t=true;w()}function b(e){if(e==="socialstream"){u=p(arguments[1]);o=S(u.getAttribute("src"));s=true;if(c.length){for(var i=0,l=c.length;i<l;i++){m(c[i])}}return}if(!t){if(!a){a=[]}a.push(arguments);return}var h=x(arguments).slice(1);if(h[0]&&typeof h[0]==="function"){if(!f[e]){f[e]=[]}f[e].push(h[0])}E(n,r,{cmd:e,args:h})}function w(){if(a){while(a.length){b.apply(this,a.shift())}a=null}}function E(e,t,n){e.contentWindow.postMessage(JSON.stringify(n),t)}function S(e){return e.match(h)[1].toString()}function x(e){return Array.prototype.slice.call(e,0)}var t=false,n,r,i=typeof Object.keys!=="undefined",s=false,o,u,a=[],f={},l={},c=[],h=new RegExp("^(http(?:s)?://[^/]+)","im");e.fn=e.prototype={initialize:function(e){n=p(e);r=S(n.getAttribute("src"));return this},callMethod:function(){b.apply(this,arguments)},getProperty:function(){this.callMethod.apply(this,arguments)},addListener:function(e,t){if(!l[e]){l[e]=[]}l[e].push(t)},removeListener:function(e,t){if(t){for(var n=0,r=l[e].length;n<r;n++){if(l[e][n]===t){l[e][n]=null}}}else{l[e]=null}}};e.fn.initialize.prototype=e.fn;if(window.addEventListener){window.addEventListener("message",m,false)}else{window.attachEvent("onmessage",m)}return window.UstreamEmbed=e}();