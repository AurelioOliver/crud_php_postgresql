<?php
include_once('connection.php'); 
class Db_Class{
    private $table_name = 'pessoa';
    function createPessoa(){
        $sql = "INSERT INTO PUBLIC.".$this->table_name.
                "(
                    name,
                    sobrenome,
                    logradouro,
                    numero,
                    complemento,
                    bairro,
                    cidade,
                    estado,
                    cep
                ) "."VALUES('".
                    $this->cleanData($_POST['name'])."','".
                    $this->cleanData($_POST['sobrenome'])."','".
                    $this->cleanData($_POST['logradouro'])."','".
                    $this->cleanData($_POST['numero'])."','".
                    $this->cleanData($_POST['complemento'])."','".
                    $this->cleanData($_POST['bairro'])."','".
                    $this->cleanData($_POST['cidade'])."','".
                    $this->cleanData($_POST['estado'])."','".
                    $this->cleanData($_POST['cep']).
                "')";
        return pg_affected_rows(pg_query($sql));
    }

    function getPessoa(){             
        $sql ="select *from public." . $this->table_name . " ORDER BY name";
        return pg_query($sql);
    } 

    function getPessoaId(){    
        $sql ="select *from public." . $this->table_name . "  where id='".$this->cleanData($_POST['id'])."'";
        return pg_query($sql);
    } 

    function deletePessoa(){    
         $sql ="delete from public." . $this->table_name . "  where id='".$this->cleanData($_POST['id'])."'";
         return pg_affected_rows(pg_query($sql));
    }

    function updatePessoa($data=array()){       
        $sql = "update public.pessoa 
        set 
            name        = '".$this->cleanData($_POST['name'])."',
            sobrenome   = '".$this->cleanData($_POST['sobrenome'])."',
            logradouro  = '".$this->cleanData($_POST['logradouro'])."',
            numero      = '".$this->cleanData($_POST['numero'])."',
            complemento = '".$this->cleanData($_POST['complemento'])."',
            bairro      = '".$this->cleanData($_POST['bairro'])."',
            cidade      = '".$this->cleanData($_POST['cidade'])."',
            estado      = '".$this->cleanData($_POST['estado'])."',
            cep         = '".$this->cleanData($_POST['cep'])."' 
        where 
            id ='".$this->cleanData($_POST['id'])."'";
        return pg_affected_rows(pg_query($sql));        
    }

    function cleanData($val){
         return pg_escape_string($val);
    }
}
?>