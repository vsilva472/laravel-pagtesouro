<?php

namespace Vsilva472\PagTesouro\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagTesouroPaymentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'codigoServico'     => 'required|integer|min:1|max:99999',
            'nomeContribuinte'  => 'required|string|min:2|max:45',
            'valorPrincipal'    => 'required|regex:/^[0-9]{1,15}\.[0-9]{2}$/',
        ];
    }
}
