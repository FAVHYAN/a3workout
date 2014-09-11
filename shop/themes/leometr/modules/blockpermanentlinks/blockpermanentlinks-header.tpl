<!-- Block permanent links module HEADER -->
<div class="blockparmanentlinks">
	<div class="nav-item">
		<div class="item-top">
		<a href="{$link->getPageLink('contact-form.php', true)}" title="{l s='contact' mod='blockpermanentlinks'}">{l s='contact' mod='blockpermanentlinks'}</a>
		</div>
	</div>
	<div class="nav-item">
		<div class="item-top">
			<a href="{$link->getPageLink('sitemap.php')}" title="{l s='sitemap' mod='blockpermanentlinks'}">{l s='sitemap' mod='blockpermanentlinks'}</a>
		</div>
	</div>
	<div class="nav-item">
		<div class="item-top">
		<script type="text/javascript">writeBookmarkLink('{$come_from}', '{$meta_title|addslashes|addslashes}', '<span class="hidden-phone">{l s='bookmark' mod='blockpermanentlinks'}</span>');</script>
		</div>
	</div>
</div>
<!-- /Block permanent links module HEADER -->