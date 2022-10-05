<?php 
include('top.php');
if(isset($_POST['submit']) and !empty($_POST['submit'])){
$ret_val = $obj->createPessoa();
if($ret_val==1){
    echo '<script type="text/javascript">'; 
    echo 'alert("Cadastrado com sucesso!");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    function limpa_formulário_cep() {
        $("#logradouro").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
    }
    
    $("#cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                $("#logradouro").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                    }
                    else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }
        else {
            limpa_formulário_cep();
        }
    });
});

</script>
        
<div class="container-fluid bg-3 text-center">    
<p class="ex">Novo registro</p>
  <a href="index.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-step-backward"></span> Voltar</a>
  <div class="tb">
      <form class="form-horizontal" method="post">
         <div class="panel-body">
             <div class="form-group">
               <label class="control-label col-sm-2">Nome:<span style='color:red'>*</span></label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="name" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Sobrenome:<span style='color:red'>*</span></label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="sobrenome" required>
               </div>
            </div>
            <hr>
            <div class="form-group">
               <label class="control-label col-sm-2">CEP:<span style='color:red'>*</span></label>
               <div class="col-sm-2">
                  <input class="form-control" type="text" name="cep"  id="cep" required>
               </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-2">Logradouro:<span style='color:red'>*</span></label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="logradouro"  id="logradouro" required>
               </div>
            </div>
            
             <div class="form-group">
               <label class="control-label col-sm-2">Numero:<span style='color:red'>*</span></label>
               <div class="col-sm-2">
                  <input class="form-control" type="number" name="numero" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Complemento:</label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="complemento">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Bairro:<span style='color:red'>*</span></label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="bairro"  id="bairro" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Cidade:<span style='color:red'>*</span></label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="cidade"  id="cidade" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Estado:<span style='color:red'>*</span></label>
               <div class="col-sm-2">
                  <input class="form-control" type="text" name="estado"  id="estado" required>
               </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-2">  </label>
               <div class="col-sm-8">
                  <input type="submit" class="btn btn-primary" name="submit"  value="Salvar">
               </div>
            </div> 
        </div>      
      </form>
   </div>
 <?php include('footer.php');?>