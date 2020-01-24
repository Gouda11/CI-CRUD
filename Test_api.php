<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('pages/api_view');
	}
	public function action(){
		if($this->input->post('data_action'))
		 {

			$data_action = $this->input->post('data_action');
		}

		if ($data_acion == 'fetch_all'){
			$api_url = "http://localhost/codeigniter-rest-api-master/index.php/api/student";
			$client = curl_init(api_url);
			curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($client);
			curl_close($client);
			$result = json_decode($response);
			$output = " ";
			if (count($result)>0) {
				# code...
				foreach ($result as $row ) {
					# code...
					$output .= '
					
					  <tr>
					  <td>'.$row->id .' </td>
					  <td>'. $row->name .' </td>
					  <td>'. $row->email .' </td>
					  <td>'. $row->mobile.' </td>
					  <td>'.$row->course .' </td>
					    <td><?php echo $row->status; ?></td>

					  <td>



					';
				}
			}else{
				$output .= '

				<tr>
				<td><h1>No data Found</h1></td>
				</tr>
				';
			}
			echo $output;
		}
	}
}

