	  <section id="footer-menu" class="sections footer-menu">
            <div class="container" style="margin-top: -85px;" >
                <div class="row">
                    <div class="footer-menu-wrapper" >
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="menu-item">
                                <h5>Information</h5>
                                <ul >
                                <!-- <li class="active"><a href="<?=base_url();?>" >Home</a></li>
                                      <?php
                                $menu = $this->db->query("SELECT * FROM tblmenus WHERE parentid=0 AND is_active=1 ORDER BY tblmenus.order ASC")->result();
                                $sl = "";
                                $i = 0;
                                foreach ($menu as $men) {
                                    $men_name = $men->menu_name;
                                    // if($site_lang == 'khmer') {
                                    //     $men_name = $men->menu_name_kh;
                                    // }
                                    $count=$this->db->query("SELECT count(*) as count FROM tblmenus WHERE parentid='".$men->menu_id."' AND is_active='1'")->row()->count;

                                        if($count>0){
                                            echo "<li ><a href='#'>$men_name</a>";
                                           // $this->green->getsubcate($men->menu_id,$site_lang);
                                        }else{
                                            $href = site_url('');
                                                
                                            if($men->menu_type == 10) {
                                                // $href = site_url('site/videoall/'.$men->menu_id.'/'.$men->article_id.'/'.$men->menu_type);requestquote
                                                $href = site_url('site/allcustomer/');
                                            }else if($men->menu_type == 9) {
                                                $href = site_url('site/allservice/');
                                            }else if($men->menu_type == 3) {
                                                $href = site_url('site/requestquote/');
                                            }else if($men->menu_type == 4) {
                                                $href = site_url('site/contactus/');
                                            }else if($men->menu_type == 6) {
                                                $href = site_url('site/allproduct/');
                                            }else if($men->menu_type == 7) {
                                                $href = site_url('site/aboutus/');
                                            }else if($men->menu_type == 11) {
                                                $href = site_url('site/templates/');
                                            }

                                            echo "<li class=''><a class='' href='".$href."'>$men_name</a>";
                                        }
                                        echo "</li>";
                                        $i++;
                                    }
                                ?> -->

                               
                               
                                
                                   <li><a target="_blank" href="https://www.facebook.com/pages/855solution/1776955909192788"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i> (+855)10 871 787 / 96 446 4486</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@855solution.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="menu-item">
                                <h5>Store Information</h5>
                                <ul>
                                    <li>SUPPORT</li>
                                    <li>DEVELOPERS</li>
                                    <li>BLOG</li>
                                    <li>NEWSLETTER</li>
                                    <li>PYRAMID ANALYTICS</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="menu-item">
                               <!--  <h5>Newsletter</h5>
                                <p>Insights await in your company's data. Bring them into focus with BlueLance.</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <input type="submit" class="form-control" value="Use It Free">
                                </div> -->
                                <div class="fb-page" data-href="https://www.facebook.com/855solution/" data-width="390" data-height="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/855solution/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/855solution/">855 solution</a></blockquote></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
	  <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-wrapper">

                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-brand">
                                
                            </div>
                        </div> -->

                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <div class="copyright" style="text-align: center;">
                                <p>© 2015. All Rights Reserved | Design by <a href="">855solutions.</a></p>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
		
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>

        
        <script src="<?=base_url().'assets/js/vendor/jquery-1.11.2.min.js'?>"></script>
        <script src="<?=base_url().'assets/js/vendor/bootstrap.min.js'?>"></script>

        <script src="<?=base_url().'assets/js/plugins.js'?>"></script>
        <script src="<?=base_url().'assets/js/modernizr.js'?>"></script>
        <script src="<?=base_url().'assets/js/main.js'?>"></script>
    </body>
</html>