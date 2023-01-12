<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronRunner
{
 private $CI;

 public function __construct()
 {
    $this->CI =& get_instance();
 }

 public function run()
 {
   $query = $this->CI->db->where('status', 1)->where('"'.date('Y-m-d').'">= create_date', '', false)->from('patient')->limit(10)->order_by('id', 'desc')->get();
   if ($query->num_rows() > 0) {
     $env = getenv('CI_ENV');
       foreach ($query->result() as $row) {
         $cmd = "export CI_ENV={$env}";
         $this->CI->db->set('create_date', date('Y-m'), false)->where('id', $row->id)->update('patient');
         $output = shell_exec($cmd);
         //$this->CI->db->set('create_date', date('Y-m-d'), false)->where('id', $row->id)->update('patient');
       }
    } 
  }
}