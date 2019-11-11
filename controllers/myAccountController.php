<?php

require_once '../models/myAccountModel.php';

class myAccountController extends myAccountModel{

    public function myaccount_controller(){

        return myAccountModel::myaccount_model();

    }

}

echo json_encode(myAccountController::myaccount_controller());