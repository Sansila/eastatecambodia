<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));		
	}
	public function dupcheck()
	{	
		$ref_val=$_POST['ref_val'];
		$ref_field=$_POST['ref_field'];
		$ref_table=$_POST['ref_table'];
		$arrJson=array();
		if($ref_val!="" && $ref_field!="" && $ref_table!=""){
			$arrJson['isDup']=$this->green->getValue("SELECT COUNT({$ref_table}.{$ref_field}) as num 
																FROM {$ref_table} 
																WHERE {$ref_table}.{$ref_field}='{$ref_val}'
															")-0;			
			
		}	

		echo header("Content-type:text/x-json");
		echo json_encode($arrJson) ;
		exit();
	}

	//=========== for run script =========

	public function runMultiQuery($query){

		$mysqli = new mysqli("localhost", "greensim", "GrEEnICT#9999", "greensim_v4_01");
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}	
		if($query!=""){
			$mysqli->multi_query($query);
		}
		/*	muli query 	
		$query="SELECT
				sch_student.studentid,
				sch_student.student_num,
				sch_student.first_name,
				sch_student.last_name
			FROM
				sch_student
			LIMIT 0,
			 10
			;
			SELECT
				sch_student.studentid,
				sch_student.student_num,
				sch_student.first_name,
				sch_student.last_name
			FROM
				sch_student
			LIMIT 11,
			 10
			;
			";		
		// execute multi query 
		if ($mysqli->multi_query($query)) {
		    do {
		        // store first result set 
		        if ($result = $mysqli->store_result()) {
		            while ($row = $result->fetch_assoc()) {
		               echo $row['first_name']." ";
		            }
		            $result->free();
		        }
		        // print divider 
		        if ($mysqli->more_results()) {
		            printf("-----------------\n");
		        }
		    } while ($mysqli->next_result());
		}
		
		/* close connection */

		$mysqli->close();

	}
	function runQuery(){
		$sql="UPDATE sch_emp_profile SET pob='' WHERE pob='0000-00-00'";
		$this->runMultiQuery($sql);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */