<?php
/*
 * This file is part of shopee-php.
 *
 * (c) Jin <j@sax.vn>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EcomPHP\Shopee\Resources;

use GuzzleHttp\RequestOptions;
use EcomPHP\Shopee\Resource;

class Logistic extends Resource
{
    /**
     * API: v2.logistics.get_tracking_number
     * Use this api to get tracking_number when you have shipped order.
     *
     * @param $order_id
     * @param  array  $params
     * @return array|mixed
     */
    public function getTrackingNumber($order_id, $params = [])
    {
        $params['order_sn'] = $order_id;
        return $this->call('GET', 'logistics/get_tracking_number', [
            RequestOptions::QUERY => $params,
        ]);
    }

    public function getShippingDocumentResult($order_sn_list = [], $params = [])
    {
        $params = array_merge([
            'order_list' => array_map(function ($order_sn) {
                return [
                    'order_sn' => $order_sn,
                ];
            }, $order_sn_list)
        ], $params);

        return $this->call('POST', 'logistics/get_shipping_document_result', [
            RequestOptions::JSON => $params,
        ]);
    }

    public function downloadShippingDocument($order_sn_list = [], $params = [])
    {
        $params = array_merge([
            'order_list' => array_map(function ($order_sn) {
                return [
                    'order_sn' => $order_sn,
                ];
            }, $order_sn_list)
        ], $params);

        return $this->call('POST', 'logistics/download_shipping_document', [
            RequestOptions::JSON => $params,
        ]);
    }

    public function createShippingDocument($order_sn_list = [], $params = [])
    {
        $params = array_merge([
            'order_list' => array_map(function ($order_sn) {
                return [
                    'order_sn' => $order_sn,
                ];
            }, $order_sn_list)
        ], $params);

        return $this->call('POST', 'logistics/create_shipping_document', [
            RequestOptions::JSON => $params,
        ]);
    }
}
