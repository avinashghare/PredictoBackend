<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class usershare_model extends CI_Model
{
public function create($user,$sharecontent,$total,$prediction)
{
$data=array("user" => $user,"sharecontent" => $sharecontent,"total" => $total,"prediction" => $prediction);
$query=$this->db->insert( "predicto_usershare", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("predicto_usershare")->row();
return $query;
}
function getsingleusershare($id){
$this->db->where("id",$id);
$query=$this->db->get("predicto_usershare")->row();
return $query;
}
public function edit($id,$user,$sharecontent,$total,$prediction)
{
$data=array("user" => $user,"sharecontent" => $sharecontent,"total" => $total,"prediction" => $prediction);
$this->db->where( "id", $id );
$query=$this->db->update( "predicto_usershare", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `predicto_usershare` WHERE `id`='$id'");
return $query;
}
}
?>
