function PS_SE_HandleEvent()
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