<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class predictionteam_model extends CI_Model
{
    public function create($prediction,$teamgroup,$order)
    {
        $data=array("prediction" => $prediction,"teamgroup" => $teamgroup,"order" => $order);
        $query=$this->db->insert( "predicto_predictionteam", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("predicto_predictionteam")->row();
        return $query;
    }
    function getsinglepredictionteam($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("predicto_predictionteam")->row();
        return $query;
    }
    public function edit($id,$prediction,$teamgroup,$order)
    {
        $data=array("prediction" => $prediction,"teamgroup" => $teamgroup,"order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "predicto_predictionteam", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `predicto_predictionteam` WHERE `id`='$id'");
        return $query;
    }
    
    public function getpredictionteamdropdown()
	{
		$query=$this->db->query("SELECT * FROM `predicto_predictionteam`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->id;
		}
		
		return $return;
	}
}
?>
