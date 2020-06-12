@extends('app')

@section('content')
<div id="formCadastro" class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Pacientes</h3>
    </div>
 <form id="frmPaciente" action="javascript:void(0)">
    <?php echo csrf_field() ?>
     <div class="card-body"> 
        <div class="row">

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $pacienteEdit['cpf'] ?? NULL}}"  placeholder="cpf" required>
             </div>
         </div>

         <div  class="col-sm-4">
             <div class="form-group">
                 <input type="text" class="form-control" id="nome" name="nome" value="{{ $pacienteEdit['nome'] ?? NULL}}"   placeholder="nome" required>
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="rg" name="rg" value="{{ $pacienteEdit['rg'] ?? NULL}}"  placeholder="RG" required>
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="cartaoSus" name="cartaoSus"  value="{{ $pacienteEdit['cartaoSus'] ?? NULL}}" placeholder="Cartao Sus" required>
             </div>
         </div>
     </div> 

     <div class="row">
         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="sexo" name="sexo" value="{{ $pacienteEdit['sexo'] ?? NULL}}"  placeholder="sexo" required>
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">                     
                 <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ $pacienteEdit['nascimento'] ?? NULL}}"  placeholder="nascimento" required>
             </div>
         </div>
         
         <div class="col-sm-4">
             <div class="form-group">
                 <input type="text" class="form-control" id="mae" name="mae" value="{{ $pacienteEdit['mae'] ?? NULL}}"  placeholder="Nome da Mãe" required>
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $pacienteEdit['telefone'] ?? NULL}}" placeholder=" telefone " required>
             </div>
         </div>     
     </div>   

     <div class="row">

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="cep" name="cep" value="{{ $pacienteEdit['cep'] ?? NULL}}"   placeholder="Cep.." required>
             </div>
         </div>

         <div class="col-sm-3">
             <div class="form-group">
                 <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $pacienteEdit['logradouro'] ?? NULL}}"  placeholder="Avenida/Rua.." required>
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="numero" name="numero" value="{{ $pacienteEdit['numero']?? NULL}}"   placeholder="numero" >
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="quadra" class="form-control" id="quadra" name="quadra" value="{{ $pacienteEdit['quadra'] ?? NULL}}"   placeholder="quadra">
             </div>
         </div>

         <div class="col-sm-2">
             <div class="form-group">
                 <input type="text" class="form-control" id="lote" name="lote" value="{{ $pacienteEdit['lote'] ?? NULL}}"  placeholder="lote">
             </div> 
         </div>

     </div>   

     <div class="row">

         <div class="col-sm-3">
             <div class="form-group">
                 <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $pacienteEdit['complemento'] ?? NULL}}"   placeholder="Complemento....">
             </div>
         </div>

         <div class="col-sm-4">
             <div class="form-group">
                 <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $pacienteEdit['bairro'] ?? NULL}}"  placeholder="bairro" required>
             </div>
         </div>

         <div class="col-sm-3">
             <div class="form-group">
                 <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $pacienteEdit['cidade'] ?? NULL}}"  placeholder="cidade" required>
             </div>
         </div>

         <div class="col-sm-1">
             <div class="form-group">
                 <input type="text" class="form-control" id="uf" name="uf" value="{{ $pacienteEdit['uf'] ?? NULL}}"   placeholder="UF" required>
             </div>
         </div>
     </div>  

     <div class="row">
     </div>
     
    </div>
     <div class="card-footer">
          @if($pacienteEdit['id'] ?? NULL)  
          <button class="btn btn-primary"  v-on:click.prevent="alteraPaciente();">Atualizar</button>
          @else  
          <button class="btn btn-primary" v-on:click.prevent="adicionarPaciente();">Salvar</button>    
          @endif

          <div class="row">
            <div class="col-sm-9">
            </div>
   
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="buscaNome" name="buscaNome" value=""  placeholder="Buscar">
                </div>
            </div>
        </div> 
     </div>
 </form>
</div>  

  
<div  id="tabela"  class="page-header">
     <div class="tabbable">
         <ul class="nav nav-tabs">
             <li id="cadAtivo" class="active"><a href="#tab1" data-toggle="tab">Cadastros Ativos</a></li>
             <li id="cadInativo" ><a href="#tab2" data-toggle="tab"  onclick="cadastrosInativos()">Cadastros Inativos</a></li>
         </ul>
         <div class="tab-content">
             <div class="tab-pane active" id="tab1">
                 <p>
                     <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                             <th>Nome</th>
                             <th>idade</th>
                             <th>CPF</th>
                             <th colspan="2">  
                                Ações</th>
                           </tr>
                         </thead>
                         <tbody v-for="cadastro in cadastros" v-if ="cadastro.status === 1 ">
                           <th> ${ cadastro.nome  }  </th>
                           <th> ${ cadastro.idade }  </th>
                           <th> ${ cadastro.cpf   }  </th>
                           <th width="10px">
                           <a  v-on:click.prevent="editarCadastro(cadastro)" class="btn btn-primary btn-sm">Editar</a>                               
                           </th>
                           <th width="10px">   
                            <a class="btn btn-danger btn-sm" v-on:click.prevent="inativarCadastro(cadastro)">Inativar</a>                               
                            </th> 
                         </tbody>
                     </table>
                 </p>
             </div>

             <div class="tab-pane " id="tab2">
                 <p>
                     <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                             <th>Nome</th>
                             <th>idade</th>
                             <th>CPF</th>
                           </tr>
                         </thead>
                         <tbody>
                           <th></th>
                           <th></th>
                           <th> </th>
                         </tbody>
                     </table> 
                 </p>
             </div>

         </div>
     </div>
</div>

@endsection