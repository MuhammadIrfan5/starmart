<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use session;

class PayproController extends Controller
{
    //
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function create()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://demoapi.paypro.com.pk/v2/ppro/auth',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "clientid" : "C4MDrKPLTBK19sh",
        "clientsecret" : "34qHIoR4j13T0wg"
        }',
        CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        // $order_id = uniqid();
        // $data_for_request = $this->handlePaytmRequest($order_id, session('total_price'));

        // $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
        // $paramList = $data_for_request['paramList'];
        // $checkSum = $data_for_request['checkSum'];

        // return view('web.paytm.paytm-merchant-form', compact('paytm_txn_url', 'paramList', 'checkSum'));
    }
    
}
