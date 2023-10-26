<?php

namespace App\Services\Log;

use Illuminate\Support\Facades\Log;

class LogService
{
    public const LOG_APP_REQUEST      = "appRequest";
    public const LOG_USER             = "userLog";
    public const LOG_FAILED_LOGIN     = "failedLoginLog";
    public const LOG_VALIDATION_ERROR = "validationErrorLog";
    public const LOG_SYNTAX_ERROR     = "syntaxErrorLog";
    public const LOG_ORDER            = "orderLog";
    public const LOG_ORDER_DETAIL     = "orderDetailLog";
    public const LOG_ORDER_TRACKER    = "orderTrackLog";
    public const LOG_AUTH             = "authLog";
    public const LOG_OTP              = "otpLog";
    public const LOG_PRODUCT          = "products";
    public const LOG_PRODUCT_STOCK    = "productStocks";
    public const LOG_PRODUCT_STOCK_DETAIL = "productStockDetails";
    public const LOG_PRODUCT_COLOR_SIZE   = "productColorSize";
    public const LOG_SALE_CART      = "saleCarts";
    public const LOG_SALE           = "sales";
    public const LOG_QUERY_ERROR    = "queryErrors";
    public const LOG_PROMO          = "promoCode";
    public const LOG_FRONT          = "frontEnd";


    public function commonLog(
        $title = null,
        $payloads = [],
        $channel = ""
    )
    {
        $data = [
            "title"        => $title,
            "request_time" => miliTimeFormat(),
            "url"          => currentUrl(),
            "payloads"     => json_encode($payloads, JSON_THROW_ON_ERROR),
            "ip"           => $this->getIp(),
            "request_headers"  => request()->headers->all(),
            "userInfo"     => $this->userInfo()
        ];

       Log::channel($channel)->info(json_encode($data));
    }

    public function getIp()
    {

        return request()->ip();
    }

    public function userInfo()
    {

        return request()->getUserInfo();
    }

    public function channels($channel = "fabign"){

        return [
          self::LOG_APP_REQUEST,
          self::LOG_FABIGN,
          self::LOG_USER,
          self::LOG_FAILED_LOGIN,
          self::LOG_VALIDATION_ERROR,
          self::LOG_SYNTAX_ERROR,
          self::LOG_ORDER,
          self::LOG_AUTH,
          self::LOG_OTP,
          self::LOG_SALE_CART,
          self::LOG_SALE,
        ];
    }
}
