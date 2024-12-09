<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Thư viện HTTP của Laravel

class TransactionController extends Controller
{
    public function checkDeposit(Request $request)
    {
        $url = 'https://thueapi.dailysieure.com/api-acbank';
        $data = [
            'taikhoan' => '0367733843',
            'matkhau' => 'Chiencoix2004',
            'sotaikhoan' => '43481257'
        ];

        // Gửi yêu cầu POST đến API
        $response = Http::asForm()->post($url, $data);

        // Kiểm tra nếu phản hồi thành công
        if ($response->successful()) {
            $transactions = $response->json()['transactions'] ?? [];

            // Lọc giao dịch `IN`
            $inTransactions = array_filter($transactions, function ($transaction) {
                return isset($transaction['type']) && $transaction['type'] === 'IN';
            });

            // Xử lý từng giao dịch nạp tiền
            foreach ($inTransactions as $transaction) {
                // Giả sử `description` chứa mã giao dịch cần kiểm tra
                $description = $transaction['description'] ?? '';

                // Kiểm tra và cập nhật vào database (nếu cần)
                if (str_contains($description, '43481257')) {
                    // Cập nhật số tiền hoặc xử lý nạp tiền vào tài khoản
                    // Đây chỉ là ví dụ
                }
            }

            return response()->json(['message' => 'Transactions processed successfully']);
        }

        return response()->json(['error' => 'Failed to fetch transactions'], 500);
    }

    // public function transactionHistory()
    // {
    //     return view('admin.contents.transaction.transaction-history');
    // }
}
