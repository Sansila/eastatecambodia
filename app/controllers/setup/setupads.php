<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SetupAds extends CI_Controller {
	protected $thead;
	protected $theadkh;
	protected $idfield;
	protected $searchrow;		
	public function __construct(){
		parent::__construct();
		$this->load->model('setup/ModSetupAds','ads');
		$this->thead=array("No"=>'no',
							"Photos"=>"image",
							 "Banner Name"=>'adstitle',
							 "Location Banner"=>'category',
							 "Action"=>'Action'							 	
							);
		$this->theadkh=array("លេខរាង"=>'លេខរាង',
							"រូបភាព"=>"រូបភាព",
							 "ឈ្មោះផ្សព្វផ្សាយ"=>'ឈ្មោះផ្សព្វផ្សាយ',
							 "ទីតាំង​ផ្សព្វផ្សាយ"=>'ទីតាំង​ផ្សព្វផ្សាយ',
							 "កំណត់"=>'កំណត់'							 	
							);
		$this->idfield="categoryid";
	}
	
	public function index(){
		$data['idfield']=$this->idfield;
		if($this->session->userdata('site_lang') == "khmer")
			$data['thead']=	$this->theadkh;
		else
			$data['thead']=	$this->thead;
		$data['page_header']="ADS List";	
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('setup/ads_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	public function add(){
		$data['idfield']=$this->idfield;
		$data['page_header']="ADS List";	
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('setup/ads_form', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function delete($adsid){
		$this->db->where('banner_id',$adsid)->delete('tblbanner');
		unlink('./assets/upload/banner/'.$adsid.'.png');
		unlink('./assets/upload/banner/thumb/'.$adsid.'.png');
		// $this->db->where('adsid',$adsid)->delete('site_adsblog_detail');
	}
	public function edit($adsid){
		$row=$this->db->query("SELECT * FROM tblbanner
							WHERE banner_id='$adsid'")->row();
		$data['idfield']=$this->idfield;
		$datas['data']=$row;
		$data['page_header']="ADS List";	
		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('setup/ads_form', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function save(){
		$banner_id=$this->input->post('banner_id');
		$banner_title=$this->input->post('banner_title');
		$link=$this->input->post('link');
		$location=$this->input->post('location');
		$orders=$this->input->post('orders');
		$is_active=$this->input->post('is_active');
		$pageid=$this->input->post('page_id');
		$data=array('title'=>$banner_title,
					'link'=>$link,
					'banner_location'=>$location,
					'orders'=>$orders,
					'is_active'=>$is_active,
					'page'=>$pageid
					);
		$count=$this->validate($banner_id,$banner_title);
		if($count>0){
			$msg='Banner name hase already exist....!';
			$banner_id='';
		}else{
			if($banner_id!=''){
				$this->db->where('banner_id',$banner_id)->update('tblbanner',$data);
				$msg='Banner has been Updated....!';
			}else{
				$this->db->insert('tblbanner',$data);
				$banner_id=$this->db->insert_id();
				$msg='Banner has been Save....!';
			}
		}
		
		
		$arr=array('msg'=>$msg,'banner_id'=>$banner_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function validate($banner_id,$banner_title){
		$where='';
		if($banner_id!='')
			$where.=" AND banner_id<>'".$banner_id."'";
		return $this->db->query("SELECT COUNT(*) as count FROM tblbanner WHERE title='$banner_title' {$where}")->row()->count;
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$where='';
		$adstitle=$this->input->post('adstitle');
		$menu_id=$this->input->post('storeid');
		if($menu_id!='')
		{
			$where.=" AND banner_location='$menu_id'";
		}
		$sql="SELECT * FROM tblbanner WHERE  title LIKE '%$adstitle%' {$where}";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("setup/SetupAds/getdata"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			
			$active='No';
			if($row->is_active==1)
				$active='Yes';
			$img_path=base_url('assets/upload/no_image.jpg');
			if(file_exists(FCPATH."assets/upload/banner/thumb/".$row->banner_id.'.png'))
                $img_path=base_url("assets/upload/banner/thumb/".$row->banner_id.'.png');
            	if($row->banner_location == 1)
                {
                    $bannerlog = 'Banner Top';
                }elseif($row->banner_location == 2)
                {
                    $bannerlog = 'Banner Left';
                }elseif($row->banner_location == 3)
                {
                    $bannerlog = 'Banner Bottom';
                }elseif ($row->banner_location == 4) {
                    $bannerlog = 'Banner Right';
                }
			$table.= "<tr>
				 <td class='no' style='text-align:center;'>".$i."</td>
				 <td class='image' style='text-align:center;'><img style='height:45px; width:auto' src='".$img_path."' /></td>
				 <td class='adstitle'>".$row->title."</td>
				 <td class='adstitle'>".$bannerlog."</td>	
				 
				 <td class='remove_tag no_wrap' style='text-align:center;'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->banner_id." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->banner_id." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
			$table.= " </td>
				 </tr>
				 ";										 
			$i++;	 
		}
		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function do_upload($adsid){	
		if(!file_exists('./assets/upload/banner/') || !file_exists('./assets/upload/banner/thumb/'))
		 {
		    if(mkdir('./assets/upload/banner/',0755,true))
		    {
		                return true;
		    }
		    if(mkdir('./assets/upload/banner/thumb/',0755,true))
		    {
		                return true;
		    }
		 }
			$config['upload_path'] ='./assets/upload/banner/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp';
			$config['max_size']	= '10000';
			$config['file_name']  = "$adsid.png";
			$config['overwrite']=true;
			$config['file_type']='image/png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());	
				echo $error["error"];		
			}
			else
			{		
					
				$data = array('upload_data' => $this->upload->data());
			 	$config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/upload/banner/thumb/';
                $config2['maintain_ratio'] = TRUE;
                $config2['create_thumb'] = TRUE;
                $config2['thumb_marker'] = FALSE;
                $config2['overwrite']=true;
                $this->load->library('image_lib',$config2); 

                if ( !$this->image_lib->resize()){
                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
				}else{
					//unlink('./assets/upload/students/'.$student_id.'.jpg');
				}
			}
		}

}