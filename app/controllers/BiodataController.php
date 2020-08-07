<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class BiodataController extends Controller
{
    /**
     *
     * @SWG\Get(
     *   path="/biodata/view/{t}",
     *   tags={"Biodata"},
     *   summary="Get Biodata By Registration ID",
     *   produces={"application/json"},
       *     @SWG\Parameter(
       *     in="header",
       *     type="string",
       *     name="app",
       *     required=true,
       *     description="Application ID",
       *   ),
       *     @SWG\Parameter(
       *     in="header",
       *     type="string",
       *     name="token",
       *     required=true,
       *     description="Token",
       *   ),   
       *     @SWG\Parameter(
     *     in="path",
     *     type="string",
     *     name="t",
     *     required=true,
     *     description="Registrastion ID",
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="success",
     *    @SWG\Schema(ref="#/definitions/ResponseApi")
     *   )
     * )
     * @return string
     */

    public function getView($id="")
    {
        $query=<<<HAFIZH
        SELECT bb.*,u.role,substring(u.kode_wilayah,1,2) as pro,substring(u.kode_wilayah,1,4) as kab,substring(u.kode_wilayah,1,6) as kec
        FROM biodata_bimtek bb
        LEFT JOIN users u on bb.user_id=u.id
        LEFT JOIN master_dapodik.dbo.mst_wilayah mp on substring(u.kode_wilayah,1,2) = substring(mp.kode_wilayah,1,2) and mp.id_level_wilayah=1
        WHERE id_registrasi=:id_registrasi
        HAFIZH;
        $result=$this->dbHelper->query($query,[
            "id_registrasi"=> $id,
        ]);
        $data=$result->fetch(PDO::FETCH_OBJ);
        if(!$data):
            throw new Exception(null, Constants::E_INVALID_REGISTRATION_ID);
        endif;
        if(in_array($data->role,["DinasSD", "DinasSMP"])):
            $data->jenjang_dasar="dikdas";
        elseif ($data->role=="DinasKesetaraan"):
            $data->jenjang_dasar="kesetaraan";
        elseif(!in_array($data->role, ["Sekolah"])):
            $data->jenjang_dasar="dikmen";
        else:
            $data->jenjang_dasar=null;
        endif;
        $this->responseApi->status=Constants::E_SUCCESS;
        $this->responseApi->data=$data;
    }
}