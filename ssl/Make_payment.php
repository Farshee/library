<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Make_payment extends CI_Controller {


    public function __construct() {
        parent::__construct();   
    }

    //Index is loading first
    public function index(){
        $json['response'] = array(
            'status' => "ok"
        );
        echo json_encode($json,JSON_UNESCAPED_UNICODE);
    }


    public function generateNumericOTP($n)
    {
        $generator = "AZR1BRT3CDS5QWLK7PFJM9IXY2VU4GE6HN8";
        $result    = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        return $result;
    }



    public function get_payment()
    {


            $amount          = '10';
            $methodname      = $this->input->post('pmethodname', true);
            $paymentmethodid = '1';
            $description     = 'test';
            $patient_id        = '1';
            $paymentinfo     = $this->db->select("*")->from('paymentsetup')->get()->row();
            //$agentinfo     = $this->agentpi_model->read('*', 'agent_tbl', array('agent_id' => $agent_id));
            $full_name     = 'tuhin';
            $email         = 'tuhinsorker92@gmail.com';
            $phone         = '01751194212';
            $transactionid = $this->generateNumericOTP(7);

            $address     = 'test address';
            $marchandid  = $paymentinfo->marchantid;
            $islive      = $paymentinfo->Islive;
            $currency    = $paymentinfo->currency;


            $info = (object)array(
	            'marchantid'   => 'bdtas60d9a1a656c0a',
	            'store_passwd' => 'bdtas60d9a1a656c0a@ssl',
	            'amount'       => $amount,
	            'name'         => $full_name,
	            'phone'        => $phone,
	            'email'        => $email,
	            'Islive'       => $islive,
	            'trsnsid'      => $transactionid,
	            'desc'         => urlencode($description),
	            'payid'        => $paymentmethodid,
	            'page'         => 'addmoney',
	            'currency'     => $paymentinfo->currency,
	            'agent_id'     => $patient_id
	        );

	        //$this->load->view('spayment/payments',$data);

		    $post_data = array();
	        $post_data['store_id']     = $info->marchantid;
	        $post_data['store_passwd'] = $info->store_passwd;
	        $post_data['total_amount'] = $info->amount;
	        $post_data['currency']     = $info->currency;
	        $post_data['tran_id']      = "SSLC".uniqid();

	        $post_data['success_url'] 	= base_url('make_payment/successpayments/');
	        $post_data['fail_url'] 		= base_url('make_payment/fails/').$info->trsnsid;
	        $post_data['cancel_url'] 	= base_url('make_payment/cancel/').$info->trsnsid;

	        # EMI INFO
			$post_data['emi_option'] = "0";
	        $cus_email = $info->email; 
	        $ship_email = $info->email; 
	        $customer_email = (!empty($cus_email) ? $cus_email : $ship_email);

			# CUSTOMER INFORMATION
	        $post_data['cus_name'] = $info->name;
	        $post_data['cus_email'] = $info->email;
	        $post_data['cus_phone'] = $info->phone;
	        $post_data['cus_add1'] = "Dhaka";
	        $post_data['cus_postcode'] = "1000";
			$post_data['cus_country'] = "Bangladesh";

			# SHIPMENT INFORMATION
			$post_data['shipping_method'] = "NO";
			$post_data['ship_name']       = "Store Test";
			$post_data['ship_add1 ']      = "Dhaka";
			$post_data['ship_add2']       = "Dhaka";
			$post_data['ship_city']       = "Dhaka";
			$post_data['ship_state']      = "Dhaka";
			$post_data['ship_postcode']   = "1000";
			$post_data['ship_country']    = "Bangladesh";
			$post_data['cus_city']        = "Dhaka";
			$post_data['cus_state']       = "Dhaka";

			
			# OPTIONAL PARAMETERS
	        $post_data['value_a'] = $info->trsnsid;
	        $post_data['value_b'] = "";
	        $post_data['value_c'] = $info->agent_id;
	        $post_data['value_d'] = "";

	        $product_amount                = '';
	        $post_data['product_name']     = "Computer";
	        $post_data['product_category'] = "Computer";
	        $post_data['product_profile']  = "test";


			$this->session = session();

			$session = array(
				'tran_id'  => $post_data['tran_id'],
				'amount'   => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set($session);
			


            $resutl = $this->sslcommerz->RequestToSSLC($post_data, $info->marchantid, $info->store_passwd);

			if($this->sslcommerz->RequestToSSLC($post_data, $info->marchantid, $info->store_passwd))
			{
				echo "Pending";
				/***************************************
				# Change your database status to Pending.
				****************************************/
			}
            

    }


    public function successpayments()
    {

        echo "<pre>";
        print_r($_POST);exit;

    }

    public function fails($trsnsid)
    {

        echo "<pre>";
        print_r($_POST);exit;

    }
    
    public function cancel($trsnsid)
    {

        echo "<pre>";
        print_r($_POST);exit;

    }


 	public function check_valid(){

        //$val_id=urlencode($_POST['val_id']);
        $store_id=urlencode("bdtas5e772deb8ff87");
        $store_passwd=urlencode("bdtas5e772deb8ff87@ssl");
        $val_id=urlencode("2109091951521FYIKQCGgWItouh");
        $trsnsid=urlencode("bdtask2268888");

        $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

        $result = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
     
     	echo "<pre>";
        print_r(json_decode($result));exit;


    }



}