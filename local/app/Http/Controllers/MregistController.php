<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 13:47
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ValidatorService;
use App\Http\Models\Ucenters;

class MregistController extends Controller
{
    public function index()
    {
        return view('mregist');
    }

    public function store(ValidatorService $validatorService, Request $request)
    {
        $data = $request->all();
        $validator = $validatorService->RegisterValidator($data);

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $ucenter = Ucenters::create([
            'username' => $data['username'],
            'password' => $data['password'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'] ? $data['mobile'] : null,
            'role'     => 0,
            'status'   => 1,
            'createtime' => date('Y-m-d H:i:s', time())
        ]);

        return redirect()->action(
            'MloginController@index'
        );
    }
}