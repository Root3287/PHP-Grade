﻿CKEDITOR.dialog.add("aboutDialog",function(){return{title:"About",minWidth:"400",minHeight:"300",contents:[{id:"main",elements:[{id:"about",type:"html",html:'<style type="text/css">#about-wrapper{margin-top:50px;}#about-wrapper *{text-align:center;}#about-wrapper img {width:320px;height:65px;display: block;margin-left: auto;margin-right: auto;margin-bottom:30px;}#about-wrapper h1{font-size:16px;font-weight:bold;margin-bottom:20px;line-height:150%;}#about-wrapper sup{vertical-align:top;}#about-wrapper a{color:#840004;}</style><div id="about-wrapper"><img src="'+
CKEDITOR.plugins.getPath("performx")+'dialogs/images/systemik-logo.png" /><h1>PerformX<sup>®</sup> OpenAccess Version 1.0</h1><p>Systemik Solutions 2013<br/><a href="http://www.systemiksolutions.com" target="_blank">systemiksolutions.com</a></p></div>'}]}],buttons:[CKEDITOR.dialog.okButton]}});