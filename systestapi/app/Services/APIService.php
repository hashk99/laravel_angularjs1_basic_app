<?php

namespace App\Services;

use Illuminate\Http\Request;   

class APIService  
{
  	

    protected $success_status_string = 'success';
    protected $fail_status_string = 'fail'; 

    protected $data;
    protected $status_code = 200;

  	public function __construct(){
        
    } 

    /*GETTERS*/
    private function getStructuredRespondData(){
    	return array(
    		'data' => $this->getData(),
    		'status' => $this->getStatusCode(),
    		'status_string' => $this->getStatusString()
    		); 
    } 

    private function getStructuredErrorRespondData(){
    	return array(
    		'errors' => ((is_array($this->getData())) ? $this->getData() : array($this->getData())) ,
    		'status' => $this->getStatusCode(),
    		'status_string' => $this->getStatusString()
    		); 
    }
	   private function getStatusString()
    {
        return $this->getStatusCode() == 200 ? $this->success_status_string : $this->fail_status_string;
    }
    private function getData(){
    	return $this->data;
    }
    private function getStatusCode(){
    	return $this->status_code;
    }

    /*SETTERS*/
    private function setStatusCode($status_code){
   		$this->status_code = $status_code; 
    }
    private function setData($data){
   		$this->data = $data; 
    }

  	public function respond($data = null, $status_code = 200 ){ 
  		$this->setData($data);
  		$this->setStatusCode($status_code);

        return response()->json($this->getStructuredRespondData(), $status_code);
    }

  	public function respondError($data = null, $status_code = 200){
  		
  		$this->setData($data);
  		$this->setStatusCode($status_code);

        return response()->json($this->getStructuredErrorRespondData(), $status_code);
    }

}
