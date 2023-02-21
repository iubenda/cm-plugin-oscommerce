<?php
/**
 * @copyright	Copyright (c) 2020 ConsentManager.net . All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
   For Ocsommerce version 2.3.4.1
   Plugin version 3.0
 */

  class ht_consent_manager_plugin {
    var $code = 'ht_consent_manager_plugin';
    var $group = 'header_tags';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function ht_consent_manager_plugin() {
      $this->title = MODULE_HEADER_TAGS_CONSENT_MANAGER_TITLE;
      $this->description = MODULE_HEADER_TAGS_CONSENT_MANAGER_DESCRIPTION;

      if ( defined('MODULE_HEADER_TAGS_CONSENT_MANAGER_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_CONSENT_MANAGER_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_CONSENT_MANAGER_STATUS == 'True');
      }
    }

    function execute() {
      global $PHP_SELF, $HTTP_GET_VARS, $cPath, $oscTemplate;

      $header = '<script>window.gdprAppliesGlobally=true;if(!("cmp_id" in window)||window.cmp_id<1){window.cmp_id=0}if(!("cmp_cdid" in window)){window.cmp_cdid="'.tep_output_string(MODULE_HEADER_TAGS_CONSENT_MANAGER_ID).'"}if(!("cmp_params" in window)){window.cmp_params=""}if(!("cmp_host" in window)){window.cmp_host="delivery.consentmanager.net"}if(!("cmp_cdn" in window)){window.cmp_cdn="cdn.consentmanager.net"}if(!("cmp_proto" in window)){window.cmp_proto="https:"}if(!("cmp_codesrc" in window)){window.cmp_codesrc="5"}window.cmp_getsupportedLangs=function(){var b=["DE","EN","FR","IT","NO","DA","FI","ES","PT","RO","BG","ET","EL","GA","HR","LV","LT","MT","NL","PL","SV","SK","SL","CS","HU","RU","SR","ZH","TR","UK","AR","BS"];if("cmp_customlanguages" in window){for(var a=0;a<window.cmp_customlanguages.length;a++){b.push(window.cmp_customlanguages[a].l.toUpperCase())}}return b};window.cmp_getRTLLangs=function(){return["AR"]};window.cmp_getlang=function(j){if(typeof(j)!="boolean"){j=true}if(j&&typeof(cmp_getlang.usedlang)=="string"&&cmp_getlang.usedlang!==""){return cmp_getlang.usedlang}var g=window.cmp_getsupportedLangs();var c=[];var f=location.hash;var e=location.search;var a="languages" in navigator?navigator.languages:[];if(f.indexOf("cmplang=")!=-1){c.push(f.substr(f.indexOf("cmplang=")+8,2).toUpperCase())}else{if(e.indexOf("cmplang=")!=-1){c.push(e.substr(e.indexOf("cmplang=")+8,2).toUpperCase())}else{if("cmp_setlang" in window&&window.cmp_setlang!=""){c.push(window.cmp_setlang.toUpperCase())}else{if(a.length>0){for(var d=0;d<a.length;d++){c.push(a[d])}}}}}if("language" in navigator){c.push(navigator.language)}if("userLanguage" in navigator){c.push(navigator.userLanguage)}var h="";for(var d=0;d<c.length;d++){var b=c[d].toUpperCase();if(g.indexOf(b)!=-1){h=b;break}if(b.indexOf("-")!=-1){b=b.substr(0,2)}if(g.indexOf(b)!=-1){h=b;break}}if(h==""&&typeof(cmp_getlang.defaultlang)=="string"&&cmp_getlang.defaultlang!==""){return cmp_getlang.defaultlang}else{if(h==""){h="EN"}}h=h.toUpperCase();return h};(function(){var n=document;var p=window;var f="";var b="_en";if("cmp_getlang" in p){f=p.cmp_getlang().toLowerCase();if("cmp_customlanguages" in p){for(var h=0;h<p.cmp_customlanguages.length;h++){if(p.cmp_customlanguages[h].l.toUpperCase()==f.toUpperCase()){f="en";break}}}b="_"+f}function g(e,d){var l="";e+="=";var i=e.length;if(location.hash.indexOf(e)!=-1){l=location.hash.substr(location.hash.indexOf(e)+i,9999)}else{if(location.search.indexOf(e)!=-1){l=location.search.substr(location.search.indexOf(e)+i,9999)}else{return d}}if(l.indexOf("&")!=-1){l=l.substr(0,l.indexOf("&"))}return l}var j=("cmp_proto" in p)?p.cmp_proto:"https:";var o=["cmp_id","cmp_params","cmp_host","cmp_cdn","cmp_proto"];for(var h=0;h<o.length;h++){if(g(o[h],"%%%")!="%%%"){window[o[h]]=g(o[h],"")}}var k=("cmp_ref" in p)?p.cmp_ref:location.href;var q=n.createElement("script");q.setAttribute("data-cmp-ab","1");var c=g("cmpdesign","");var a=g("cmpregulationkey","");q.src=j+"//"+p.cmp_host+"/delivery/cmp.php?"+("cmp_id" in p&&p.cmp_id>0?"id="+p.cmp_id:"")+("cmp_cdid" in p?"cdid="+p.cmp_cdid:"")+"&h="+encodeURIComponent(k)+(c!=""?"&cmpdesign="+encodeURIComponent(c):"")+(a!=""?"&cmpregulationkey="+encodeURIComponent(a):"")+("cmp_params" in p?"&"+p.cmp_params:"")+(n.cookie.length>0?"&__cmpfcc=1":"")+"&l="+f.toLowerCase()+"&o="+(new Date()).getTime();q.type="text/javascript";q.async=true;if(n.currentScript){n.currentScript.parentElement.appendChild(q)}else{if(n.body){n.body.appendChild(q)}else{var m=n.getElementsByTagName("body");if(m.length==0){m=n.getElementsByTagName("div")}if(m.length==0){m=n.getElementsByTagName("span")}if(m.length==0){m=n.getElementsByTagName("ins")}if(m.length==0){m=n.getElementsByTagName("script")}if(m.length==0){m=n.getElementsByTagName("head")}if(m.length>0){m[0].appendChild(q)}}}var q=n.createElement("script");q.src=j+"//"+p.cmp_cdn+"/delivery/js/cmp"+b+".min.js";q.type="text/javascript";q.setAttribute("data-cmp-ab","1");q.async=true;if(n.currentScript){n.currentScript.parentElement.appendChild(q)}else{if(n.body){n.body.appendChild(q)}else{var m=n.getElementsByTagName("body");if(m.length==0){m=n.getElementsByTagName("div")}if(m.length==0){m=n.getElementsByTagName("span")}if(m.length==0){m=n.getElementsByTagName("ins")}if(m.length==0){m=n.getElementsByTagName("script")}if(m.length==0){m=n.getElementsByTagName("head")}if(m.length>0){m[0].appendChild(q)}}}})();window.cmp_addFrame=function(b){if(!window.frames[b]){if(document.body){var a=document.createElement("iframe");a.style.cssText="display:none";a.name=b;document.body.appendChild(a)}else{window.setTimeout(window.cmp_addFrame,10,b)}}};window.cmp_rc=function(h){var b=document.cookie;var f="";var d=0;while(b!=""&&d<100){d++;while(b.substr(0,1)==" "){b=b.substr(1,b.length)}var g=b.substring(0,b.indexOf("="));if(b.indexOf(";")!=-1){var c=b.substring(b.indexOf("=")+1,b.indexOf(";"))}else{var c=b.substr(b.indexOf("=")+1,b.length)}if(h==g){f=c}var e=b.indexOf(";")+1;if(e==0){e=b.length}b=b.substring(e,b.length)}return(f)};window.cmp_stub=function(){var a=arguments;__cmapi.a=__cmapi.a||[];if(!a.length){return __cmapi.a}else{if(a[0]==="ping"){if(a[1]===2){a[2]({gdprApplies:gdprAppliesGlobally,cmpLoaded:false,cmpStatus:"stub",displayStatus:"hidden",apiVersion:"2.0",cmpId:31},true)}else{a[2](false,true)}}else{if(a[0]==="getUSPData"){a[2]({version:1,uspString:window.cmp_rc("")},true)}else{if(a[0]==="getTCData"){__cmapi.a.push([].slice.apply(a))}else{if(a[0]==="addEventListener"||a[0]==="removeEventListener"){__cmapi.a.push([].slice.apply(a))}else{if(a.length==4&&a[3]===false){a[2]({},false)}else{__cmapi.a.push([].slice.apply(a))}}}}}}};window.cmp_msghandler=function(d){var a=typeof d.data==="string";try{var c=a?JSON.parse(d.data):d.data}catch(f){var c=null}if(typeof(c)==="object"&&c!==null&&"__cmpCall" in c){var b=c.__cmpCall;window.__cmp(b.command,b.parameter,function(h,g){var e={__cmpReturn:{returnValue:h,success:g,callId:b.callId}};d.source.postMessage(a?JSON.stringify(e):e,"*")})}if(typeof(c)==="object"&&c!==null&&"__cmapiCall" in c){var b=c.__cmapiCall;window.__cmapi(b.command,b.parameter,function(h,g){var e={__cmapiReturn:{returnValue:h,success:g,callId:b.callId}};d.source.postMessage(a?JSON.stringify(e):e,"*")})}if(typeof(c)==="object"&&c!==null&&"__uspapiCall" in c){var b=c.__uspapiCall;window.__uspapi(b.command,b.version,function(h,g){var e={__uspapiReturn:{returnValue:h,success:g,callId:b.callId}};d.source.postMessage(a?JSON.stringify(e):e,"*")})}if(typeof(c)==="object"&&c!==null&&"__tcfapiCall" in c){var b=c.__tcfapiCall;window.__tcfapi(b.command,b.version,function(h,g){var e={__tcfapiReturn:{returnValue:h,success:g,callId:b.callId}};d.source.postMessage(a?JSON.stringify(e):e,"*")},b.parameter)}};window.cmp_setStub=function(a){if(!(a in window)||(typeof(window[a])!=="function"&&typeof(window[a])!=="object"&&(typeof(window[a])==="undefined"||window[a]!==null))){window[a]=window.cmp_stub;window[a].msgHandler=window.cmp_msghandler;window.addEventListener("message",window.cmp_msghandler,false)}};window.cmp_addFrame("__cmapiLocator");window.cmp_addFrame("__cmpLocator");window.cmp_addFrame("__uspapiLocator");window.cmp_addFrame("__tcfapiLocator");window.cmp_setStub("__cmapi");window.cmp_setStub("__cmp");window.cmp_setStub("__tcfapi");window.cmp_setStub("__uspapi");</script>' . "\n";

      $header_automatic = '<script type="text/javascript" data-cmp-ab="1" src="https://cdn.consentmanager.net/delivery/autoblocking/'.tep_output_string(MODULE_HEADER_TAGS_CONSENT_MANAGER_ID).'.js" data-cmp-host="delivery.consentmanager.net" data-cmp-cdn="cdn.consentmanager.net" data-cmp-codesrc="5"></script>';

      $oscTemplate->addBlock(stripslashes(tep_db_input(MODULE_HEADER_TAGS_CUSTOM_CODE)), $this->group);

      if(tep_output_string(MODULE_HEADER_TAGS_AUTOMATIC)=='Automatic'){
        $oscTemplate->addBlock($header_automatic, $this->group);
      }
      else{
        $oscTemplate->addBlock($header, $this->group);
      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_CONSENT_MANAGER_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable consentmanager Module', 'MODULE_HEADER_TAGS_CONSENT_MANAGER_STATUS', 'True', 'Do you want to enable the consentmanager module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('CMP Code ID', 'MODULE_HEADER_TAGS_CONSENT_MANAGER_ID', '', 'The CMP Code ID from consentmanager.net.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Automatic or Semi Automatic', 'MODULE_HEADER_TAGS_AUTOMATIC', 'Automatic', 'Please Select', '6', '1', 'tep_cfg_select_option(array(\'Automatic\', \'Semi Automatic\'), ', now())");
       tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Custom Code', 'MODULE_HEADER_TAGS_CUSTOM_CODE', '', 'You can write custom code here. It will add in <header>', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_HEADER_TAGS_CONSENT_MANAGER_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_CONSENT_MANAGER_STATUS',
        'MODULE_HEADER_TAGS_AUTOMATIC',
       'MODULE_HEADER_TAGS_CONSENT_MANAGER_ID','MODULE_HEADER_TAGS_CUSTOM_CODE', 'MODULE_HEADER_TAGS_CONSENT_MANAGER_SORT_ORDER');
    }
  }
?>
