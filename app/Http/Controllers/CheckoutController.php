<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    static $vnp_TmnCode = "1CYHXAXJ";
    static $vnp_HashSecret = "NPU8DYD27DB0ZVBE40HJEJVPP0A4FRSL";
    static $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    static $vnp_Returnurl = "/checkout/vnPayCheck";

    public function index(Request $request){
        $order = Order::find($request->order_id);
        return view('pages.checkout', compact('order'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'total_price' => 'required',
        ]);

        $data = [
            'vnp_TxnRef' => $request->order_id,
            'vnp_OrderInfo' => 'Order Payment No.' . $request->order_id,
            'vnp_Amount' => $request->total_price,
        ];
        $data_url = $this->vnpay_create_payment($data);
        // Chuyển hướng đến URL lấy được
        return redirect($data_url);
    }

    protected function vnpay_create_payment(array $data)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TxnRef = $data['vnp_TxnRef'];
        $vnp_OrderInfo = $data['vnp_OrderInfo'];
        $vnp_OrderType = 200000;
        $vnp_Amount = $data['vnp_Amount'] * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => self::$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => 'http://127.0.0.1:8000' . self::$vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        //thêm 'vnp_BankCode'
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        //thêm 'vnp_SecureHash'
        $vnp_Url = self::$vnp_Url . "?" . $query;
        if (isset(self::$vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, self::$vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = [
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        ];


        return $returnData['data'];
    }

    public function vnPayCheck(Request $request)
    {

        //Lấy data từ URL (VNPay gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // ID đơn  hàng

        // Kiểm tra mã phản hồi
        if ($vnp_ResponseCode != null) {
            $order = Order::find($vnp_TxnRef);

            //00: TH thành công
            if ($vnp_ResponseCode == 00) {
                // Tạo bản ghi thanh toán
                $checkout = Checkout::create([
                    'order_id' => $vnp_TxnRef,
                    'payment_status' => 'completed',
                ]);
                $order = Order::find($vnp_TxnRef); // hoặc từ biến $order nếu đã có
                $order->order_status = 'Đang giao hàng';
                $order->save();
                return redirect(route('home'))->with('success', 'Thanh toán thành công!');
            } elseif ($vnp_ResponseCode == 24) { //24: Hủy thanh toán
                return redirect()->route('checkout');
            } else {
                return back()->with('error', 'Có lỗi xảy ra với VNPay');
            }
        }
    }
}
