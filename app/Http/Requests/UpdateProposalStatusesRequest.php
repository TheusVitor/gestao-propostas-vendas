<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalStatusesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status_id' => 'required|exists:proposal_statuses,id',
            'notes'     => 'required|string|min:5',
        ];
    }
}

