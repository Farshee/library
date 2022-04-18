<?php namespace App\Models;
use CodeIgniter\Model;
class Bdtaskt1m1CommonModel extends Model
{

    public function __construct()
    {
      $this->db = db_connect();
    }

    //====>$table=string, $data=array(), $where = array()<=== 

    /*--------------------------
    | Inserted data return last Id
    *--------------------------*/
    public function bdtaskt1m1_01_Insert($table, $data=[])
    { 
      if(!empty($table) && !empty($data)){
        $query = $this->db->table($table)->insert($data);
        if($this->db->affectedRows() > 0 ){
          return $this->db->insertId();
        }else{
          return false;
        }
      }else{
        return false;
      }
    }

    /*--------------------------
    | Updated data 
    *--------------------------*/
    public function bdtaskt1m1_02_Update($table, $data=[], $where=[])
    { 
      if(!empty($table) && !empty($data)){
        return $this->db->table($table)->where($where)->update($data);
      }else{
        return false;
      }
    }

    /* Batch Insert of data */
    public function bdtaskt1m1_01_Insert_Batch($table, $data=[])
    { 
      if(!empty($table) && !empty($data)){
        return $this->db->table($table)->insertBatch($data);
      }else{
        return false;
      }
    }

    /* Batch update of data */
    public function bdtaskt1m1_02_Update_Batch($table, $data=[], $column)
    { 
      if(!empty($table) && !empty($data)){
        return $this->db->table($table)->updateBatch($table, $column);
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get single row data
    *--------------------------*/
    public function bdtaskt1m1_03_getRow($table, $where=[])
    { 
      if(!empty($table)){
        if(!empty($where)){
          return $this->db->table($table)->where($where)->get()->getRow();
        }else{
          return $this->db->table($table)->get()->getRow();
        }
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get all rows data
    *--------------------------*/
    public function bdtaskt1m1_04_getResult($table)
    { 
      if(!empty($table)){
        return $this->db->table($table)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | Inserted data
    *--------------------------*/
    public function bdtaskt1m1_05_getResultWhere($table, $where=null, $where_in=null, $where_not_in=null)
    { 
      if(!empty($table)){
        $builder = $this->db->table($table);

        if($where !=null){
          $builder->where($where);
        }
        if($where_in !=null){
          $builder->whereIn($where_in['field'], $where_in['values']);
        }
        if($where_not_in !=null){
          $builder->whereNotIn($where_not_in['field'], $where_not_in['values']);
        }

        $result = $builder->get()->getResult();

        return $result;
      }else{
        return false;
      }
    }

    /*--------------------------
    | get data with where() and orWhere()
    *--------------------------*/
    public function bdtaskt1m1_21_getResultWhereOR($table, $where, $orWhere)
    { 
      if(!empty($table)){
        return $this->db->table($table)->groupStart()->where($where)->groupEnd()->orGroupStart()->where($orWhere)->groupEnd()->get()->getResult();
      }else{
        return false;
      }
    }

    /* get result with where and like */

    public function bdtaskt1m1_25_getResultWhereLike($table, $where, $like)
    { 
      if(!empty($table)){
        return $this->db->table($table)->where($where)->like($like)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | Deleted data
    *--------------------------*/
    public function bdtaskt1m1_06_Deleted($table, $where)
    { 
      if(!empty($table)){
        return $this->db->table($table)->where($where)->delete();
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get Select2 data
    *--------------------------*/
    public function bdtaskt1m1_07_getSelect2Data($table, $where, $column)
    { 
      if(!empty($table)){
        return $this->db->table($table)->select($column)->where($where)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search doctor data
    *--------------------------*/
    public function bdtaskt1m1_08_searchDoctor($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('employees')->select("emp_id as id, CONCAT_WS(' ', short_name, '-', $langColumn, mobile) as text")->where('job_title_id', 14)->like('short_name', $text)->orLike('nameE', $text)->orLike('nameA', $text)->orLike('mobile', $text)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search employee data
    *--------------------------*/
    public function bdtaskt1m1_09_searchEmployee($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('employees')->select("emp_id as id, CONCAT_WS(' ', short_name, '-', $langColumn, mobile) as text")->like('nameE', $text)->orLike('nameA', $text)->orLike('mobile', $text)->orLike('short_name', $text)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search patient data
    *--------------------------*/
    public function bdtaskt1m1_10_searchPatient($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('patient')->select("patient_id as id, CONCAT_WS(' ', patient_id, '-', $langColumn, mobile) as text")->where('status', 1)->like('nameE', $text)->orLike('nameA', $text)->orLike('mobile', $text)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search services data
    *--------------------------*/
    public function bdtaskt1m1_11_searchDocServices($text, $docId, $langColumn)
    { 
      if(!empty($text) && !empty($docId)){
        return $this->db->table('doctor_services ds')
                        ->select("s.id, CONCAT(s.code_no, ' - ', s.$langColumn) as text")
                        ->join("services s", "s.id=ds.service_id", "left")
                        ->where('ds.doctor_id', $docId)
                        ->groupStart()
                          ->like('s.nameE', $text)
                          ->orLike('s.nameA', $text)
                          ->orLike('s.code_no', $text)
                        ->groupEnd()
                        ->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search medicine data
    *--------------------------*/
    public function bdtaskt1m1_12_searchMedicine($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('ph_medicine')->select("id, CONCAT_WS(' ', id, '-', $langColumn) as text, generic_name")->like('nameE', $text)->orLike('nameA', $text)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search appointment data
    *--------------------------*/
    public function bdtaskt1m1_12_searchAppoint($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('appointment app')
                    ->select("app.appoint_id as id, CONCAT(app.appoint_id, ' - ', file.file_no, ' ', p.$langColumn,' ', p.mobile) as text")
                    ->join("patient p", "p.patient_id=app.patient_id", "left")
                    ->join("patient_file file", "file.patient_id=app.patient_id", "left")
                    ->like('app.appoint_id', $text)
                    ->orLike('file.file_no', $text)
                    ->orLike('app.patient_id', $text)
                    ->get()->getResult();
         
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get Select2 data from list_data table
    *--------------------------*/
    public function bdtaskt1m1_13_getListData($table, $column, $ids)
    { 
      if(!empty($table)){
        $Id = $this->db->table('lists')->select('id')->where('table_name', $table)->get()->getRow();
        if(!empty($Id)){
          if(!empty($ids)){
            return $this->db->table('list_data')->select($column)->where('list_id', $Id->id)->where('status', 1)->whereNotIn('id', $ids)->get()->getResult();
          }else{
            return $this->db->table('list_data')->select($column)->where('list_id', $Id->id)->where('status', 1)->get()->getResult();
          }
        }else{
          return false;
        }
      }else{
        return false;
      }
    }

    /*--------------------------
    | search patient data
    *--------------------------*/
    public function bdtaskt1m1_14_searchPntWithFile($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('patient_file file')
                        ->select("file.patient_id as id, CONCAT_WS(' ', file.file_no, '-', p.$langColumn) as text")
                        ->join("patient p", "p.patient_id=file.patient_id", "left")
                        ->where('p.status', 1)
                        ->like('file.file_no', $text)
                        ->orLike('file.patient_id',$text)
                        ->orLike('p.nameE', $text)
                        ->orLike('p.nameA', $text)
                        ->orLike('p.mobile', $text)
                        ->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search patient data
    *--------------------------*/
    public function bdtaskt1m1_15_searchRV($text)
    { 
      if(!empty($text)){
        return $this->db->table('vouchers')->select("id, id as text")
                        ->where('isPV', 0)
                        ->where('isClosed', 0)
                        ->like('id', $text)->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | search invoice no
    *--------------------------*/
    public function bdtaskt1m1_16_searchInvoiceNo($text)
    { 
      if(!empty($text)){
        return $this->db->table('service_invoices')->select("id, id as text")
                        ->where('status', 1)
                        ->where('isClosed', 0)
                        ->like('id', $text)->get()->getResult();
      }else{
        return false;
      }
    }
   
    /* Update and return affected rows*/
    public function bdtaskt1m1_17_Update_getAffectedRows($table, $data=[], $where=[])
    { 
      if(!empty($table) && !empty($data)){
        $this->db->table($table)->where($where)->update($data);
        return $this->db->affectedRows();
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get MAX by after like
    *--------------------------*/
    public function bdtaskt1m1_18_getLikeMaxData($table, $like, $column)
    { 
      if(!empty($table)){
        return $this->db->table($table)->selectMax($column)->like($column, $like, 'after')->get()->getRow()->$column;
      }else{
        return false;
      }
    }

    /*--------------------------
    | search patient data
    *--------------------------*/
    public function bdtaskt1m1_19_patientList($langColumn)
    { 
        return $this->db->table('patient_file file')
                        ->select("file.patient_id as id, CONCAT_WS(' ', file.file_no, '-', p.$langColumn) as text")
                        ->join("patient p", "p.patient_id=file.patient_id", "left")
                        ->get()->getResult();
    }

    /*--------------------------
    | Get Table Max Column Id
    *--------------------------*/
    public function bdtaskt1m1_20_getTableMaxId($table, $column)
    { 
      if ($this->db->tableExists($table))
      {
        if ($this->db->fieldExists($column, $table))
        {
           $row = $this->db->table($table)
                ->selectMax($column)
                ->get()
                ->getRow()->$column;
            if(!empty($row)){
                return $row+1;
            }else{
                return 1;
            }
        }else{
          return 0;
        }
      }else{
        return 0;
      }
    }

    /*--------------------------
    | Account Transactions 
    *--------------------------*/
    public function bdtaskt1m1_21_AccTrans($VNo, $Vtype, $COAID, $details=null, $debit=0, $credit=0, $patient=0, $doctor=0, $isApproved=1)
    { 
        $data = array(
            'VNo'         => $VNo,
            'Vtype'       => $Vtype,
            'VDate'       => date('Y-m-d'),
            'COAID'       => $COAID,
            'Narration'   => $details,
            'Debit'       => $debit,
            'Credit'      => $credit,
            'PatientID'   => $patient,
            'BranchID'     => session('branchId'),
            'IsPosted'    => 1,
            'CreateBy'    => session('id'),
            'CreateDate'  => date('Y-m-d H:i:s'),
            'IsAppove'    => $isApproved
        ); 
        $this->bdtaskt1m1_01_Insert('acc_transaction', $data);
    }

    public function bdtaskt1m1_22_addActivityLog($type, $action_name, $id, $table, $status=0){
      $actionData = array(
          'emp_id'    => session('id'), 
          'type'      => $type, 
          'action'    => $action_name, 
          'action_id' => $id, 
          'table_name'=>$table,
          'slug'      => uri_string(),
          'status'    => $status
      );
      $this->bdtaskt1m1_01_Insert('activity_logs',$actionData);
    }

    /*--------------------------
    | search user data
    *--------------------------*/
    public function bdtaskt1m1_23_searchUserName($text)
    { 
      if(!empty($text)){
        return $this->db->table('user')
                        ->select("user.emp_id as id, CONCAT_WS(' ', emp.short_name, '-', emp.nameE, emp.mobile) as text")
                         ->join("employees emp", "emp.emp_id=user.emp_id", "left")
                        ->like('emp.nameE', $text)
                        ->orLike('emp.nameA', $text)
                        ->orLike('emp.mobile', $text)
                        ->orLike('emp.short_name', $text)
                        ->get()->getResult();
      }else{
        return false;
      }
    }

    /*--------------------------
    | Get current balance
    *--------------------------*/
    public function bdtaskt1m1_24_getCurrentBalance($head)
    { 
      if(!empty($head)){
        $query = $this->db->table('acc_transaction');
        $query->select('sum(Debit) as predebit, sum(Credit) as precredit');
        $query->where('COAID',$head);
        $query1 = $query->get();
        $result = $query1->getRow();
 
        return $balance=$result->predebit - $result->precredit;
      }else{
        return false;
      }
    }

    public function bdtaskt1m1_25_updatePatientBLDebit($amount, $where){
        $result = $this->db->table('patient')->set('balance', 'balance-'.$amount, FALSE)->where($where)->update();
        return $this->db->affectedRows();
    }

    public function bdtaskt1m1_26_updatePatientBLCredit($amount, $where){
        $result = $this->db->table('patient')->set('balance', 'balance+'.$amount, FALSE)->where($where)->update();
        return $this->db->affectedRows();
    }

    public function bdtaskt1m1_27_updateSupplierBLDebit($amount, $where){
        $result = $this->db->table('supplier_information')->set('balance', 'balance-'.$amount, FALSE)->where($where)->update();
        return $this->db->affectedRows();
    }

    public function bdtaskt1m1_28_updateSupplierBLCredit($amount, $where){
        $result = $this->db->table('supplier_information')->set('balance', 'balance+'.$amount, FALSE)->where($where)->update();
        return $this->db->affectedRows();
    }

    /*--------------------------
    | search pharmacy item
    *--------------------------*/
    public function bdtaskt1m1_25_searchPharmacyCustomer($text, $langColumn)
    { 
      if(!empty($text)){
        return $this->db->table('ph_customer_information')->select("id, $langColumn as text")->orLike('nameE', $text)->orLike('nameA', $text)->get()->getResult();
      }else{
        return false;
      }
    }
}