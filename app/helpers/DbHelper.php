<?php 
class DbHelper extends \Phalcon\Di\Injectable
{
    public function query($query,$binds=[],$params=[])
    {
        $stmt=$this->db->prepare($query);
        foreach($binds as $bind=>$value):
            if(!empty($params[$bind])):
                $stmt->bindValue(':' . $bind, $value,$params[$bind]);
            else:
                $stmt->bindValue(':' . $bind, $value);
            endif;
        endforeach;
        $stmt->execute();
        return $stmt;
    }
}