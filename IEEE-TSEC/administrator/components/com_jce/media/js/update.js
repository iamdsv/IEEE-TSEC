/* JCE Editor - 2.4.6 | 19 January 2015 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2014 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function($){$.jce.Update={updates:{},options:{language:{'check':'Check for Updates','install':'Install Updates','installed':'Installed','no_updates':'No Updates Available','high':'High','medium':'Medium','low':'Low','full':'Full Install','patch':'Patch','auth_failed':'Authorisation Failed','install_failed':'Install Failed','update_info':'Update Information','install_info':'Install Information','check_updates':'Checking for Updates...','info':'Show Information','read_more':'More','read_less':'Less'}},init:function(options){var self=this;$.extend(this.options,options);$('button#update-button').click(function(){self.execute(this);}).click();},execute:function(el){if($(el).hasClass('check')){this.check(el);}
if($(el).hasClass('install')){this.download(el);}},translate:function(s,v){return this.options.language[s]||v;},check:function(btn){var self=this;$('#install-button').remove();var list=$('div#updates-list');$('div.body',list).html('<div class="item">'+this.translate('check_updates')+'</div>');$(btn).addClass('loading').prop('disabled',true);var priority=['<span class="label label-important priority">'+this.translate('high')+'</span>','<span class="label label-warning priority">'+this.translate('medium')+'</span>','<span class="label label-info priority">'+this.translate('low')+'</span>'];$.getJSON("index.php?option=com_jce&view=updates&task=update&step=check",{},function(r){$(btn).removeClass('loading');$(btn).prop('disabled',false);$('div.body',list).empty();if(r){if($.type(r)=='string'){r=$.parseJSON(r);}
if(r.error){$('div.body',list).html('<div class="item error">'+r.error+'</div>');return false;}
if(r.length){$(btn).clone().click(function(){self.execute(this);}).insertAfter(btn).attr({'id':'install-button','disabled':'disabled'}).removeClass('check').addClass('install').prop('disabled',true).html('<i class="icon-arrow-up"></i>&nbsp;'+self.translate('install'));$.each(r,function(n,s){$('div.body',list).append('<div class="item"><div class="span1"><span class="checkbox" data-uid="'+s.id+'"></span></div><div class="span5">'+s.title+'</div><div class="span3">'+s.version+'</div><div class="span3">'+priority[s.priority-1]+'</div></div>');var $info=$('<div class="item info">'+s.text+'</div>').appendTo($('div.body',list));var $readmore=$('<span class="readmore">'+self.translate('read_more','More')+'</span>').click(function(){$('div.body .item',list).toggle();$(this).toggleClass('readmore readless').parent().toggleClass('expand').toggle().prev('.item').toggle();$(this).html(function(){if($(this).hasClass('readless')){return self.translate('read_less','Less');}else{return self.translate('read_more','More');}});}).appendTo($info);if(!$.support.leadingWhitespace){$readmore.css('top',0);}
$('div.body div.item.info',list).on('scroll',function(){if(!$.support.leadingWhitespace){$readmore.css('top',$(this).scrollTop());}else{$readmore.css('bottom',-$(this).scrollTop());}});var sb=$('div.body',list).get(0).clientWidth-$('div.header',list).get(0).clientWidth;if(sb<0){$('div.body',list).addClass('scrolling');}
var el=$('span[data-uid='+s.id+']');if(s.auth){if(parseInt(s.forced)==1||s.priority==1){$(el).addClass('checked').addClass('disabled');$('button#install-button').prop('disabled',false);if(s.negates){$('span[data-uid='+s.negates+']').removeClass('checked').addClass('disabled');}}
if(parseInt(s.forced)==1){$(el).addClass('disabled');}
if(s.required){$('span[data-uid='+s.required+']').addClass('checked');}
$(el).click(function(){if($(this).is('.disabled, .error, .alert')){return;}
if($(this).hasClass('checked')){$(this).removeClass('checked');}else{$(this).addClass('checked');}
if(s.negates){if($(this).hasClass('checked')){$('span[data-uid='+s.negates+']').removeClass('checked').addClass('disabled');}else{$('span[data-uid='+s.negates+']').removeClass('disabled');}}
var len=$('div.body span.checkbox.checked',list).length;if(len){$('button#install-button').attr('disabled','').prop('disabled',false);if(len==$('div.body span.checkbox',list).length){$('div.header div:first-child span.checkbox',list).addClass('checked');}else{$('div.header div:first-child span.checkbox',list).removeClass('checked');}}else{$('button#install-button').attr('disabled','disabled').prop('disabled',true);$('div.header div:first-child span.checkbox',list).removeClass('checked');}});}else{$(el).removeClass('disabled').addClass('alert');$('div.body',list).append('<div class="item error">'+s.title+' : '+self.translate('auth_failed')+'</div>');}});if(r.length>1){$('<span class="checkbox"></span>').appendTo($('div.header div:first',list)).click(function(){$('div.body span.checkbox',list).click();});}}else{$('div.body',list).append('<div class="item">'+self.translate('no_updates')+'</div>');}}else{$('div.body',list).append('<div class="item">'+self.translate('no_updates')+'</div>');}});},download:function(btn){var t=this,n=1;var s=$('#updates-list div.body div.item span.checkbox.checked');$(s).addClass('disabled');$(btn).prop('disabled',true);$('button#update-button').prop('disabled',true);$.extend(t.updates,{'joomla':[],'jce':[]});$.each(s,function(){var el=this,uid=$(this).data('uid');$(el).removeClass('error').addClass('loader');$.post("index.php?option=com_jce&view=updates&task=update&step=download",{'id':uid},function(r){if(r&&r.error){$(el).removeClass('loader disabled check').addClass('error').parents('div.item').next('div.item.info').replaceWith('<div class="item error">'+r.error+'</div>');}else{if(r.file){$(el).addClass('downloaded');$.extend(r,{'id':uid});t.updates[r.installer].push(r);}}
if(n==(s.length)){t.install(btn);}
n++;},'json');});},install:function(btn){var t=this,n=0;var s=$('div.body div.item span.checkbox.checked.downloaded');function __run(){var updates=t.updates['joomla'].length?t.updates['joomla']:t.updates['jce'];if(updates.length){var file=updates[0],id=file.id,el=$('span[data-uid='+id+']');if($(el).hasClass('downloaded')){$.post("index.php?option=com_jce&view=updates&task=update&step=install",file,function(r){$(el).removeClass('loader');if(r&&r.error){$(el).removeClass('loader disabled check').addClass('error').parents('div.item').next('div.item.info').replaceWith('<div class="item error">'+r.error+'</div>');}else{$(el).addClass('tick').removeClass('check');$('div#update_info_'+id,'').append('<h3>'+t.options.language['install_info']+'</h3><div>'+r.text+'</div>');$(el).parents('div.item').find('span.priority').removeClass('label-warning label-important label-info').addClass('label-success').html(t.options.language['installed']);}
updates.splice(0,1);n++;if(n<s.length){__run();}else{t.updates={};$('button#update-button').prop('disabled',false);window.setTimeout(function(){window.parent.document.location.href="index.php?option=com_jce&view=cpanel";},1000);}},'json');}}}
if(s.length){__run(n);}else{$('button#update-button').prop('disabled',false);}}};})(jQuery);