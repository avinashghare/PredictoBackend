<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class userpointlog_model extends CI_Model
{
public function create($point,$for,$prediction,$shareid)
{
$data=array("point" => $point,"for" => $for,"prediction" => $prediction,"shareid" => $shareid);
$query=$this->db->insert( "predicto_userpointlog", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("predicto_userpointlog")->row();
return $query;
}
function getsingleuserpointlog($id){
$this->db->where("id",$id);
$query=$this->db->get("predicto_userpointlog")->row();
return $query;
}
public function edit($id,$point,$for,$prediction,$shareid)
{
$data=array("point" => $point,"for" => $for,"prediction" => $prediction,"shareid" => $shareid);
$this->db->where( "id", $id );
$query=$this->db->update( "predicto_userpointlog", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `predicto_userpointlog` WHERE `id`='$id'");
return $query;
}
}
?>