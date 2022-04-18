<?php namespace App\Libraries;
use App\Libraries\Permission;
class Template {
	    public function __construct()
    {
        $this->session = session();
        $this->permission = new Permission();
        $this->db = db_connect();
         
           
    }
	public function layout($data){
		$data['permission']    = $this->permission;
		$data['settings_info'] = $this->setting_data();
		$data['dynamic_color']   = $this->dynamic_color();
		$data['notify']   = $this->notify();
	return view('template/layout', $data);
	}

	public function setting_data(){
		$builder = $this->db->table('setting')
                             ->get()
                             ->getRow(); 
		return $builder;
	}
	
	public function dynamic_color()
	{
		$builder = $this->db->table('theme_color_setup')
		->get()
			->getRow();
		return $builder;
	}
	public function notify()
	{
		$builder = $this->db->table('donation_tbl a');
		$builder->select("a.id AS donation_id,CONCAT_WS(' ', b.firstname, b.lastname) AS donar_name,a.amount AS donation_amount,a.payment_date AS donation_date,a.event_name,a.anonymous")
		->join('user b', 'b.id=a.donar_id')
		->orderBy('a.id', 'desc')
		->limit(3);
		$query   = $builder->get();
		return $query->getResult();
	}
}
