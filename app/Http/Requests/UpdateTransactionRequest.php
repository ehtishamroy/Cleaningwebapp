<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_edit');
    }

    public function rules()
    {
        return [
            'transaction' => [
                'string',
                'nullable',
            ],
            'transaction_type' => [
                'string',
                'required',
            ],
            'agent_id' => [
                'required',
                'integer',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
        ];
    }
}
