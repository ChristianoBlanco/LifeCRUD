<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pessoa;
use App\Models\pessoa_tel;
use Illuminate\Support\Facades\Validator;

use geekcom\ValidatorDocs\Rules\Cpf;
use geekcom\ValidatorDocs\Rules\Cnpj;
use geekcom\ValidatorDocs\Rules\Cnh;
use geekcom\ValidatorDocs\Rules\Renavam;
use geekcom\ValidatorDocs\Rules\Placa;
use geekcom\ValidatorDocs\Rules\Ddd;
use geekcom\ValidatorDocs\Rules\InscricaoEstadual;
use geekcom\ValidatorDocs\Rules\Nis;
use geekcom\ValidatorDocs\Rules\Cns;
use geekcom\ValidatorDocs\Rules\Certidao;
use geekcom\ValidatorDocs\Rules\TituloEleitoral;

use App\Http\Controllers\Helpers;

class pessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = pessoa::get();

        return $pessoas;

        //return view('lista-pessoas', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => ['min:3'],
            'cpf' => 'required|Cpf',
            'email' => 'email:filter|unique:users',
            'nacionalidade' => ['min:3'],
        ];
        $message = [
            'nome.min' => 'Mínimo de 3 caracteres',
            'cpf.min' => 'O CPF deve conter 11 números',
            'cpf.Cpf' => 'Formato falso CPF !',
            'email.email' => 'E-mail invalido',
            'nacionalidade.min' => 'Mínimo de 3 caracteres',

        ];

        $request->validate($rules, $message);

        $pessoa = new pessoa();

        $pessoa->nome = "Marley The Beagle";
        $pessoa->cpf = "176.858.120-70";
        $pessoa->email = "marley@gmail.com";
        $pessoa->dt_nasc = "2022-05-25";
        $pessoa->nacionalidade = "Inglêsa";
        $pessoa->save();

        
        //return redirect('/insert-pessoas');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = 3;
        $pessoa = pessoa::find($id);
        $help = new Helpers;

        if (isset($pessoa)) {
            $pessoa->nome = "Marley The Beagle";
            $pessoa->cpf = $help->formatacpf("176.858.120-70");
            $pessoa->email = "marley@gmail.com";
            $pessoa->dt_nasc = "2022-05-25";
            $pessoa->nacionalidade = "Inglêsa";
            $pessoa->save();

            //return redirect('/insert-pessoas');
        }
    }
  

    public function softDelete(Request $request, $id)
    {


        pessoa::find($id)->delete();

        //return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
