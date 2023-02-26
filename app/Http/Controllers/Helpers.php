<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helpers extends Controller
{

    public function ValidateCpf($cpf){
        // Extrai somente os números
      $cpf = preg_replace( '/[^0-9]/', '', $cpf );

      // Verifica se foi informado todos os digitos corretamente
      if (strlen($cpf) != 11) {
          return false;
      }

      // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
      if (preg_match('/(\d)\1{10}/', $cpf)) {
          return false;
      }

      // Faz o calculo para validar o CPF
      for ($t = 9; $t < 11; $t++) {
          for ($d = 0, $c = 0; $c < $t; $c++) {
              $d += $cpf[$c] * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if ($cpf[$c] != $d) {
              return false;
          }
      }
      return true;


      }
      public function ValidateCnpj($value): bool
      {
          // Extrai somente os números
          $c = preg_replace( '/[^0-9]/is', '', $value );

          //Verifica se quantidade de dígitos corresponde ao Cnpj
          if (mb_strlen($c) != 14 || preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/", $c)) {
              return false;
          }

          //Faz o Cálculo do Cnpj
          $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

          for (
              $i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]
          ) {
          }

          if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
              return false;
          }

          for (
              $i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]
          ) {
          }

          if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
              return false;
          }

          return true;
      }
      public function ValidateCpfCnpj($value){

        //Seta as funções de validar Cpf e Cnpj e verifica se são verdadeiras
        if($this->ValidateCpf($value) || $this->ValidateCnpj($value)){
           return true;
        }
        return false;
      }

      public function ValidateTelefone($value){
        // Extrai somente os números
        $value = preg_replace( '/[^0-9]/is', '', $value );

        //Valida o formato dos dígitos do telefone
        if (!preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $value)) {
            return false;
        }
        return true;

      }

      public function validatePis($value): bool{

        // Extrai somente os números
        $p = preg_replace( '/[^0-9]/is', '', $value );


        //Retorna uma string produzida de acordo com a string de formatação
        $pis = sprintf('%011s', $p);

        //Faz o Cálculo do PIS/NIS/PASEP
        if (mb_strlen($pis) != 11 || preg_match("/^{$pis[0]}{11}$/", $pis)) {
             return false;
         }

         for ($d = 0, $p = 2, $c = 9; $c >= 0; $c--, ($p < 9) ? $p++ : $p = 2) {
           $d += $pis[$c] * $p;
         }

        return ($pis[10] == (((10 * $d) % 11) % 10));
      }



      public function ValidateMatricula($value){

      // Extrai somente os números
      $value = preg_replace( '/[^0-9]/is', '', $value );

      // Verifica se foi informado todos os digitos corretamente
      if (strlen($value) != 11) {
        return false;
      }
      // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
      if (preg_match('/(\d)\1{10}/', $value)) {
        return false;
    }

    return true;

    }

    public function formatacpf($value){
        // Extrai somente os números
     $c = preg_replace( '/[^0-9]/', '', $value );

     //return true;
        return $c;
   }
   public function formataTelefone($value){
    // Extrai somente os números
    $c = preg_replace( '/[^0-9]/', '', $value );

    return $c;
}

}
/*
Comandos para testar no tinker:

Exemplos:

use App\Http\Controllers\Helpers
$h = new Helpers
$h->ValidateCpf('935.679.047-79');

*/
