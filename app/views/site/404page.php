<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
<?php
 
$ci = new CI_Controller();
 
$ci =& get_instance();
 
$ci->load->helper('url');
 
?>

<!-- Begin Main -->
<div role="main" class="main pgl-bg-grey">
	
	<div class="container">
		<div class="pgl-error text-center">
			<h1 class="error-title" style="margin:0px;"><strong>404</strong></h1>
			<p class="error-msg">The page cannot be found</p>
			<a href="<?php echo site_url();?>" class="btn btn-primary">Return to the homepage</a>
		</div>
	</div>
	
</div>
<!-- End Main -->