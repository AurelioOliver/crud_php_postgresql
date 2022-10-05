<?php
function callback($buffer)
{
  return ($buffer);
}

ob_start("callback");

include('top.php');
$pessoas = $obj->getPessoa();
$sn=1;
if(isset($_POST['update'])){
    $pessoa = $obj->getPessoaId();
    $_SESSION['pessoa'] = pg_fetch_object($pessoa);
    header('location:edit.php');
}
if(isset($_POST['delete'])){
   $ret_val = $obj->deletePessoa();
   if($ret_val==1){
      echo "<script language='javascript'>";
      echo 'alert("Deletado com sucesso!");'; 
      echo 'window.location.href = "index.php";';
      echo "</script>";
  }
}

?>
<div class="loader"></div>
<div class="container-fluid bg-3 text-center">    
<p class="ex">Lista de pessoas</p>
  <a href="insert.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-plus-sign"></span> Novo registro</a>
  <br>
  <table class="highlight">
    <thead>
      <tr class="active">
            <th>Código</th>  
            <th>Name</th>       
            <th>Sobrenome</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
      </tr>
    </thead>
    <tbody>
    <?php while($p = pg_fetch_object($pessoas)): ?>   
      <tr>
        <td ><?=$p->id?></td>
        <td><?=$p->name?></td>
        <td><?=$p->sobrenome?></td>
        <td><?=$p->logradouro?></td>
        <td><?=$p->numero?></td>
        <td><?=$p->bairro?></td>
        <td><?=$p->cidade?></td>
        <td><?=$p->estado?></td>
        <td><?=$p->cep?></td>
        <td>
            <form method="post">
                <input type="submit" class="btn btn-success" name= "update" value="Editar">
                <input type="submit" onClick="return confirm('Deletar o registro?');" class="btn btn-danger" name= "delete" value="Deletar">
                <input type="hidden" value="<?=$p->id?>" name="id">
            </form>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
<?php include('footer.php');?>
<?php
ob_end_flush();
?>
