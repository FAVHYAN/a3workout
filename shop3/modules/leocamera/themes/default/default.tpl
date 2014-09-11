<div class="leocamera_container" style="width:100%;">
    <div id="leo-camera" class="camera_wrap {$leocamera.theme}">
        {foreach from=$leocamera_slides item=item}
            <div data-thumb="{$item.thumbnail}" data-src="{$item.mainimage}" >
                {if $item.title and $leocamera.show_desc}                            
                    <div class="camera_caption fadeFromBottom" >             
                        <div class="leo_camera_title" >
                            {if $leocamera.show_title}
                                <a href="{$item.url}" title="{$item.title}">{$item.title}</a>
                            {/if}                            
                        </div>
						<div class="leo_camara_desc">
							{$item.description}
						</div>
                    </div>
                {/if}
            </div>
        {/foreach}    
    </div>
</div>