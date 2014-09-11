<?php include('header.php'); ?>

<div class="zero-margin content-shadow effect-load slideDown" style="z-index: 1; background-color: #ffffff;">
    <div class="container zero-margin zero-padding">
	    <div class="row" style="margin: 3em 1em;">
			<div class="col-md-3">
				<?php echo form_open('cart/search', 'class=""');?>
					<input type="text" name="term" class="form-control" placeholder="<?php echo lang('search');?>"/>
				</form>
				<div class="a3w-box">
					<h4 align="center" class="title-box">MY PURCHASES</h4>
					<div align="center">
						<a href="<?php echo site_url('cart/view_cart');?>">
						<?php
						if ($this->go_cart->total_items()==0)
						{
							echo lang('empty_cart');
						}
						else
						{
							if($this->go_cart->total_items() > 1)
							{
								echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
							}
							else
							{
								echo sprintf (lang('single_item'), $this->go_cart->total_items());
							}
						}
						?>
						</a>
					</div>
				</div>
				
				<div class="a3w-box">
					<h4 align="center" class="title-box">PRODUCT CATEGORIES</h4>
					<div align="left">
						<ul>
							<?php foreach($this->categories as $cat_menu):?>
							<li><a href="<?php echo site_url($cat_menu['category']->slug);?>" class="linkThumb"><?php echo $cat_menu['category']->name;?></a></li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
	        <div class="col-md-9">
	            <div style="border: 1px dashed #222; border-left: none; border-right: none; padding: 5px 0;">
	                <h2 style="color: #e32322;"><?php echo $page_title; ?></h2>
	            </div>
	            <p><?php echo (isset($category)) ? $category->description : ''; ?></p>
	            <div>
	                <?php if((!isset($subcategories) || count($subcategories)==0) && (count($products) == 0)):?>
	                    <div class="alert alert-info">
	                        <a class="close" data-dismiss="alert">&times;</a>
	                        <?php echo lang('no_products');?>
	                    </div>
	                <?php endif;?>
	
	                <?php foreach($products as $product):?>
	                    <div class="span3 product" style="padding:10px;overflow: hidden;box-shadow: 1px 1px 2px #CCC; border-radius: 5px; width: 200px;">
	                        <?php
	                        $photo	= theme_img('no_picture.png', lang('no_image_available'));
	                        $product->images	= array_values($product->images);
	                        $photoUrl = theme_url('assets/img/no_picture.png');
	
	                        if(!empty($product->images[0]))
	                        {
	                            $primary	= $product->images[0];
	                            foreach($product->images as $photo)
	                            {
	                                if(isset($photo->primary))
	                                {
	                                    $primary	= $photo;
	                                }
	                            }
	
	                            $photo	= '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'" width="150" style="width:auto; height:150px;"/>';
	                            $photoUrl = base_url('uploads/images/full/'.$primary->filename);
	                        }
	                        ?>
	                        <a class="thumbnail linkThumb" style="border: none;" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>" >
	                            <?php echo $photo; ?>
	                        </a>
	
	                        <h5 style="margin:5px 0;"><a class="linkThumb" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><?php echo $product->name;?></a></h5>
	                        <?php if($product->excerpt != ''): ?>
	                            <div class="excerpt" style="margin:10px 0;"><?php echo $product->excerpt; ?></div>
	                        <?php endif; ?>
	                        <div>
	                            <div>
	                                <?php if ($product->saleprice > 0):?>
	                                    <span class="price-slash"><?php echo lang('product_reg');?> <?php echo format_currency($product->price); ?></span>
	                                    <span class="price-sale"><?php echo lang('product_sale');?> <?php echo format_currency($product->saleprice); ?></span>
	                                <?php else: ?>
	                                    <span class="price-reg"><?php echo lang('product_price');?> <?php echo format_currency($product->price); ?></span>
	                                <?php endif; ?>
	                            </div>
	                            <?php if((bool)$product->track_stock && $product->quantity < 1) { ?>
	                                <div class="stock_msg"><?php echo lang('out_of_stock');?></div>
	                            <?php } ?>
	                        </div>
	                        <div style="margin-top:1em; text-align: right;">
	                            <a class="btn linkThumb" href="<?php echo $photoUrl; ?>"><i class="icon-zoom-in"></i></a>
	                            <a class="btn btn-primary" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>">Add to <i class="icon-shopping-cart"></i></a>
	                        </div>
	                    </div>
	                <?php endforeach?>
	
	            </div>
	        </div>
	    </div>
	</div>
</div>
    <script type="text/javascript">
        $(function(){
            var maxHeight = Math.max.apply(null, $(".linkThumb").map(function ()
            {
                return $(this).height();
            }).get());

            $('.linkThumb')
                .colorbox({
                    href: function(){
                        return $(this).attr('href');
                    },
                    height: '80%'
                });

            return false;
        });
    </script>
<?php include('footer.php'); ?>