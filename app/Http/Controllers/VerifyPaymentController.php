<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerifyPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $signature = hash('sha512', $orderId . $statusCode . $grossAmount . 'SB-Mid-server-m_8YHpunWG5H2-C1o6eZQs0H');

        Log::info('incoming-notification', $request->all());
        if ($signature != $request->signature_key) {
            return response()->json([
                'message' => 'Invalid signature',
                'status' => 400,
            ]);
        }

        $transaction = Transactions::find($request->order_id);
        
        if ($transaction) {
            $status = 'PENDING';

            if ($request->transaction_status == 'settlement') {
                $status = 'PAID';
            } else if ($request->transaction_status == 'expired') {
                $status = 'EXPIRED';
            }

            $transaction->status = $status;
            $transaction->save();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
