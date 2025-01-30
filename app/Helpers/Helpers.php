<?php 

use Illuminate\Http\Exceptions\HttpResponseException;


if(!function_exists("errorArray")){
    function errorArray($e){

        return [
            "requested_url" => currentUrl(),
            "title"         => $e->getMessage(),
            "file"          => $e->getFile(),
            "line"          => $e->getLine()
        ];
    }
}

if(!function_exists("todayDateTimePrefix")) {
    function todayDateTimePrefix()
    {

        return now()->format('dmY');
    }
}

if(!function_exists("randGen")) {
    function randGen($valueType = 1, $length = 6)
    {
        $value = null;
        if($valueType == 1){
            $value = random_int(111111,999999);
        }

        return $value;
    }
}

if(!function_exists("miliTimeFormat")) {
    function miliTimeFormat(){

        return now()->format("Y-m-d H:i:s, v");
    }
}

if(!function_exists("passwordGenerator")) {
    function passwordGenerator($digitLimit = 8, $mixed = false){
        if($mixed){

            $password =  substr(md5(time()),0,8);
            commonLog("Mixed Generated Password ", $password, \App\Services\Log\LogService::LOG_USER);

            return $password;
        }

        $minValue = 10 ** ($digitLimit - 1);
        $maxValue = (10 ** $digitLimit) - 1;

        return  random_int($minValue,$maxValue);
    }
}

if(!function_exists("addMinutes")) {
    function addMinutes($minutes = 5){

        return now()->addMinutes($minutes);
    }
}

if(!function_exists("commonLog")){
    function commonLog(
        $title,
        $payloads,
        $channel
    ){

         (new \App\Services\Log\LogService())->commonLog(
            $title,
            $payloads,
            $channel
        );
    }
}




if(!function_exists("deleteLog")){
    function deleteLog(
        $id = null
    ){
        $data['date_time']         = miliTimeFormat();
        $data['url']               = request()->url();
        $data['logged_in_user_id'] = userID();
        $data['query_params']      = $id;

         \Illuminate\Support\Facades\Log::info("Deleting Log : ".json_encode($data));
    }
}


if(!function_exists("currentRoute")){
    function currentRoute(){

        return request()->route()->getName();
    }
}

if(!function_exists("currentUrl")){
    function currentUrl(){

        return request()->fullUrl();
    }
}


if(!function_exists("currentHost")){
    function currentHost(){

        return request()->getSchemeAndHttpHost();
    }
}

if(!function_exists("imageLink")){
    function imageLink($imageColumn){

        return !empty($imageColumn) ? currentHost()."/".$imageColumn : null;
    }
}


if(!function_exists("statuses")) {
    function statuses(){

        return ["active","inactive"];
    }
}


if(!function_exists("statusManage")) {
    function statusManage($status = 1){


        return allStatuses()[$status];
    }
}

if(!function_exists("allStatuses")) {
    function allStatuses(){


        return [
            1 => "Active", // Active
            2 => "Inactive", // Inactive
            3,
            4,
            5,
            6
        ];
    }
}


if(!function_exists("slugMaker")) {
    function slugMaker($value){

        return \Illuminate\Support\Str::slug($value);
    }
}

if(!function_exists("newUUID")) {
    function newUUID(){

        return \Illuminate\Support\Str::uuid()->toString();
    }
}


if(!function_exists("createdBy")) {
    function createdBy($createdByObject){

        if(empty($createdByObject)){
            return null;
        }

        return [
            "id"        => $createdByObject->id,
            "ref_code"  => $createdByObject->ref_code,
            "name"      => $createdByObject->name,
            "email"     => $createdByObject->email,
            "avatar"    => $createdByObject->avatar,
            "status"    => $createdByObject->status,
            "mobile_no" => $createdByObject->mobile_no
        ];
    }
}


if(!function_exists("validationErrorThrow")) {
    function validationErrorThrow($validator, $isValidationError = true){
        $fabignCode       = new FabignCode();
        $title            = $isValidationError ? "Opps! Validation Errors" : "Stock not available";

        $errorDataFormats = [
            "status"    => $fabignCode::FALSE,
            "code"      => $fabignCode::VALIDATION_ERROR,
            "message"   => $title,
            "data"      => [],
            "error"     => $isValidationError ? $validator->errors() : $validator,
            "optional"  => [
                "token" => null
            ],
        ];

        commonLog(
            miliTimeFormat()." ".$title,
             $errorDataFormats,
            $isValidationError ? LogService::LOG_VALIDATION_ERROR : LogService::LOG_SALE_CART
        );

         throw new HttpResponseException(
            response()
                ->json(
                    $errorDataFormats,
                    $fabignCode::VALIDATION_ERROR
                )
        );
    }
}


if(!function_exists("stringReplace")) {
    function stringReplace($text, $keyword = "storage/", $replace= "")
    {
        return str_replace($keyword,$replace,$text);
    }
}


if(!function_exists("url_version")) {
    function url_version($file)
    {
        $linkRandom = "06022023001";
        return asset($file.'?version='.$linkRandom);
    }
}

if(!function_exists("localize")) {
    function localize($value)
    {

        return $value;
    }
}