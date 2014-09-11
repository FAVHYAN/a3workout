{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 6599 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{capture name=path}<a href="{$link->getPageLink('my-account', true)}">{l s='My account'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Your personal information'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<h3>{l s='Your personal information'}</h3>

{include file="$tpl_dir./errors.tpl"}

{if isset($confirmation) && $confirmation}
	<p class="success">
		{l s='Your personal information has been successfully updated.'}
		{if isset($pwd_changed)}<br />{l s='Your password has been sent to your e-mail:'} {$email}{/if}
	</p>
{else}
	<h4>{l s='Please be sure to update your personal information if it has changed.'}</h4>
	<p class="required"><sup>*</sup>{l s='Required field'}</p>
	<form action="{$link->getPageLink('identity', true)}" method="post" class="std form-horizontal">
		<fieldset>
			<div class="control-group">
				<label class="control-label">{l s='Title'}</label>
                <div class="controls">
				{foreach from=$genders key=k item=gender}
					<label for="id_gender{$gender->id}" class="radio"><input type="radio" name="id_gender" id="id_gender{$gender->id}" value="{$gender->id|intval}" {if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"{/if} />{$gender->name}</label>
				{/foreach}
                </div>
            </div>
            <div class="control-group">
				<label for="firstname" class="control-label">{l s='First name'} <sup>*</sup></label>
                <div class="controls">
				    <input type="text" id="firstname" name="firstname" value="{$smarty.post.firstname}" class="input-xlarge" />
                </div>
			</div>
            <div class="control-group">
				<label for="lastname" class="control-label">{l s='Last name'} <sup>*</sup></label>
                <div class="controls">
				    <input type="text" name="lastname" id="lastname" value="{$smarty.post.lastname}" class="input-xlarge" />
                </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">{l s='E-mail'} <sup>*</sup></label>
                <div class="controls">
				    <input type="text" name="email" id="email" value="{$smarty.post.email}" class="input-xlarge" />
                </div>
            </div>
            <div class="control-group">
				<label for="old_passwd" class="control-label">{l s='Current Password'} <sup>*</sup></label>
                <div class="controls">
				    <input type="password" name="old_passwd" id="old_passwd" class="input-xlarge" />
                </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="passwd">{l s='New Password'}</label>
				<div class="controls">
                    <input type="password" name="passwd" id="passwd" class="input-xlarge" />
                </div>
            </div>
            <div class="control-group">
				<label class="control-label" for="confirmation">{l s='Confirmation'}</label>
                <div class="controls">
				    <input type="password" name="confirmation" id="confirmation" class="input-xlarge" />
                </div>
			</div>
			<div class="control-group">
				<label class="control-label">{l s='Date of Birth'}</label>
				<div class="controls">
                <select name="days" id="days" class="input-mini">
					<option value="">-</option>
					{foreach from=$days item=v}
						<option value="{$v}" {if ($sl_day == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
					{/foreach}
				</select>
				{*
					{l s='January'}
					{l s='February'}
					{l s='March'}
					{l s='April'}
					{l s='May'}
					{l s='June'}
					{l s='July'}
					{l s='August'}
					{l s='September'}
					{l s='October'}
					{l s='November'}
					{l s='December'}
				*}
				<select id="months" name="months" class="input-medium">
					<option value="">-</option>
					{foreach from=$months key=k item=v}
						<option value="{$k}" {if ($sl_month == $k)}selected="selected"{/if}>{l s=$v}&nbsp;</option>
					{/foreach}
				</select>
				<select id="years" name="years" class="input-small">
					<option value="">-</option>
					{foreach from=$years item=v}
						<option value="{$v}" {if ($sl_year == $v)}selected="selected"{/if}>{$v}&nbsp;&nbsp;</option>
					{/foreach}
				</select>
                </div>
            </div>
			{if $newsletter}
			<div class="control-group">
                <label for="newsletter" class="control-label">{l s='Sign up for our newsletter'}</label>
                <div class="controls">
				    <input type="checkbox" id="newsletter" name="newsletter" value="1" {if isset($smarty.post.newsletter) && $smarty.post.newsletter == 1} checked="checked"{/if} />
                </div>
            </div>
			<div class="control-group">
                <label for="optin" class="control-label">{l s='Receive special offers from our partners'}</label>
                <div class="controls">
				    <input type="checkbox" name="optin" id="optin" value="1" {if isset($smarty.post.optin) && $smarty.post.optin == 1} checked="checked"{/if} />
                </div>
            </div>
			{/if}
			<div class="control-group">
                <div class="controls">
				    <input type="submit" class="button" name="submitIdentity" value="{l s='Save'}" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
				{l s='[Insert customer data privacy clause or law here, if applicable]'}
			    </div>
            </div>
		</fieldset>
	</form>
{/if}

<ul class="footer_links">
	<li><a href="{$link->getPageLink('my-account', true)}"><i class="icon-user"></i> {l s='Back to your account'}</a></li>
	<li class="f_right"><a href="{$base_dir}"><i class="icon-home"></i> {l s='Home'}</a></li>
</ul>
