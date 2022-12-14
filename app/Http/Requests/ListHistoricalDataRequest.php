<?php

namespace App\Http\Requests;

use App\DTO\HistoricalDataRequestTransfer;
use Illuminate\Foundation\Http\FormRequest;

class ListHistoricalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'symbol'  => 'required|exists:companies,symbol',
            'start_date'  => 'required|date|date_format:Y-m-d|before:end_date|before_or_equal:today',
            'end_date'  => 'required|date|date_format:Y-m-d|after:start_date|before_or_equal:today',
            'email'  => 'required|email|max:80',
        ];
    }

    /**
     * @return HistoricalDataRequestTransfer
     */
    public function getRequestDataTransfer(): HistoricalDataRequestTransfer
    {
        return new HistoricalDataRequestTransfer(
            $this->input('symbol'),
            $this->input('start_date'),
            $this->input('end_date'),
            $this->input('email')
        );
    }
}
