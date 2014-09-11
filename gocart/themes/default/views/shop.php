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
							<?php foreach($categories->result() as $cat_menu):?>
							<li><a href="<?php echo site_url($cat_menu->slug);?>" class="linkThumb"><?php echo $cat_menu->name;?></a></li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9" style="border: 1px solid #c5c5c5; border-radius: 5px; padding: 10px; width: 70%;">
	            <ul class="breadcrumb">
	                <li><a href="#">Home</a></li>
	                <li class="active">Shop</li>
	            </ul>
	            <div style="border: 1px dashed #222; border-left: none; border-right: none; padding: 5px 0;">
	                <h2 style="color: #e32322;">ALL</h2>
	            </div>
	            <div>
	                <?php foreach($categories->result() as $cat_menu):?>
	                    <a href="<?php echo site_url($cat_menu->slug);?>" class="linkThumb" style="font-size:2em; padding: 2em; margin: 10px; display: inline-block; border: 1px solid #cccccc; border-radius: 5px;"><?php echo $cat_menu->name;?></a>
	                <?php endforeach;?>
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
                  height: '80%',
                  width: '90%'
              });

          return false;
      });
  </script>
<?php include('footer.php'); ?>