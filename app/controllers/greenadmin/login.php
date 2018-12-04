<?php   
    class Login extends CI_Controller {
		public function index()
		{						
			if($this->session->userdata('user_name')!=""){
				$data['page_header']="Angkorban.COM e-Commerce";
				$this->load->view('greenadmin/header',$data);
				$this->load->view('greenadmin/index',$data);
				$this->load->view('greenadmin/footer');
			}else{
				$data['page_header']="Angkorban.COM e-Commerce";
				$this->load->view('greenadmin/login',$data);
			}		
		}		
		public function getLogin()
		{
			$user_name=$this->input->post('user_name');
			$password=$this->input->post('password');
			$schoolid=$this->input->post('schoolid');
			$year=$this->input->post('year');			
			
			$sql_userinf="SELECT
					userid,
					user_name,
					`password`,
					roleid,
					last_name,
					first_name,
					last_visit,
					last_visit_ip
				FROM
					admin_user
				WHERE
					user_name = '".$user_name."'
				AND `password` =  '".md5($password)."'								
				AND is_active = 1";				
			$userinf=$this->green->getOneRow($sql_userinf);
			if(count($userinf)>0 && $userinf['userid']!=""){								
				$this->session->set_userdata($userinf);	
				$this->session->set_userdata("roleid",$userinf['roleid']);									
				$this->green->getModule($userinf['roleid']);
					
				$this->session->set_userdata("moduleids",$this->green->moduleids);
				$arrModules=$this->green->moduleids;
				
				$arrModInfos=array();				
				$arrPageInfos=array();
				$arrPageAction=array();

				if(count($arrModules)>0){
					
					foreach ($arrModules as $moduleid) {
						$this->green->getRolePage($moduleid['moduleid']);				
						$arrPages=$this->green->pageids;
						
						if(count($arrPages)>0){
							foreach($arrPages as $page){
								$this->green->getPageInfo($page['pageid']);								
								$arrPageInfos[$moduleid['moduleid']][$page['pageid']]=$this->green->pageinfos;
								$arrPageAction[$moduleid['moduleid']][$page['pageid']]=$page['is_read'];																						
							}							
						}

						$arrModInfos[$moduleid['moduleid']]=$this->green->getModuleInfo($moduleid['moduleid']);												
					}
				}			

				$this->session->set_userdata("roleid",$userinf['roleid']);
				$this->session->set_userdata("ModuleInfors",$arrModInfos);
				$this->session->set_userdata("PageInfors",$arrPageInfos);					
				$this->session->set_userdata("PageAction",$arrPageAction);

				$this->green->savelastlogin($userinf['userid']);
				
				if($userinf['roleid']==8){
					$this->green->goToPage("social/socialdash");	
				}elseif ($userinf['roleid']==1) {
					$this->green->goToPage("sys/dashboard");
				}
				else{
					$this->green->goToPage("greenadmin/home");	
				}
					
			}else{
				$this->green->goToPage(site_url('greenadmin/login'));
			}
								
		}  
		public function logOut(){
			$this->session->sess_destroy();
			$this->green->goToPage(site_url('greenadmin/login'));
		}
		   
        
    }
    
?>