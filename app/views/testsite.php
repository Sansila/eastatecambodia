
		<h3>Demo 1:</h3>
		<img class="my-foto" src="<?php echo base_url("assets/upload/product/haydensmall.jpg"); ?>"  data-large="<?php echo base_url("assets/upload/product/hayden.jpg"); ?>" title="Фото1" style="width:250px">	
		<img class="my-foto" src="<?php echo base_url("assets/upload/product/haydensmall.jpg"); ?>"  data-large="<?php echo base_url("assets/upload/product/hayden.jpg"); ?>" title="Фото1" style="width:250px">	
		<img class="my-foto" src="<?php echo base_url("assets/upload/product/haydensmall.jpg"); ?>"  data-large="<?php echo base_url("assets/upload/product/hayden.jpg"); ?>" title="Фото1" style="width:250px">

		<div class="sp-slideshow">
			
				<input id="button-1" type="radio" name="radio-set" class="sp-selector-1" checked="checked" />
				<label for="button-1" class="button-label-1"></label>
				
				<input id="button-2" type="radio" name="radio-set" class="sp-selector-2" />
				<label for="button-2" class="button-label-2"></label>
				
				<input id="button-3" type="radio" name="radio-set" class="sp-selector-3" />
				<label for="button-3" class="button-label-3"></label>
				
				<input id="button-4" type="radio" name="radio-set" class="sp-selector-4" />
				<label for="button-4" class="button-label-4"></label>
				
				<input id="button-5" type="radio" name="radio-set" class="sp-selector-5" />
				<label for="button-5" class="button-label-5"></label>
				
				<label for="button-1" class="sp-arrow sp-a1"></label>
				<label for="button-2" class="sp-arrow sp-a2"></label>
				<label for="button-3" class="sp-arrow sp-a3"></label>
				<label for="button-4" class="sp-arrow sp-a4"></label>
				<label for="button-5" class="sp-arrow sp-a5"></label>
				
				<div class="sp-content">
					<div class="sp-parallax-bg"></div>
					<ul class="sp-slider clearfix">
						<li><img src="<?php echo base_url("assets/upload/slideshow/image1.png"); ?>" alt="image01" /></li>
						<li><img src="<?php echo base_url("assets/upload/slideshow/image2.png"); ?>" alt="image02" /></li>
						<li><img src="<?php echo base_url("assets/upload/slideshow/image3.png"); ?>" alt="image03" /></li>
						<li><img src="<?php echo base_url("assets/upload/slideshow/image4.png"); ?>" alt="image04" /></li>
						<li><img src="<?php echo base_url("assets/upload/slideshow/image5.png"); ?>" alt="image05" /></li>
					</ul>
				</div><!-- sp-content -->
				
			</div><!-- sp-slideshow -->	
		<script>
		   jQuery(function(){

			  $(".my-foto").mouseover(function(){
			  	$(this).imagezoomsl({
				  	descarea: ".big-caption", 				

					zoomrange: [2.68, 100],

					zoomstart: 1.68,

					cursorshadeborder: "10px solid black",

					magnifiereffectanimate: "fadeIn",
				  });

			  })
			  
		   });   
		</script>