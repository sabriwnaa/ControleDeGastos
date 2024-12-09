<?php

class Produto  implements ActiveRecord{
    private int $id;
    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function __construct(protected String $descricao, protected String $categoria, protected float $valor){    
    }

    public function getDescricao():string{
        return $this->descricao;
    }

    public function getCategoria():string{
        return $this->categoria;
    }

    public function getValor():string{
        return $this->valor;
    }


    
    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE produtos SET descricao = '{$this->descricao}' ,categoria = '{$this->categoria}',valor = '{$this->valor}' WHERE id_produto = {$this->id}";
        }else{
            $sql = "INSERT INTO produtos (descricao, categoria, valor) VALUES ('{$this->descricao}','{$this->categoria}','{$this->valor}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM produtos WHERE id_produto = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Produto{
        $conexao = new MySQL();
        $sql = "SELECT * FROM produtos WHERE id_produto = {$id}";
        $resultado = $conexao->consulta($sql);
        $p = new Produto($resultado[0]['descricao'],$resultado[0]['categoria'], $resultado[0]['valor']);
        $p->setId($resultado[0]['id_produto']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM produtos";
        $resultados = $conexao->consulta($sql);
        $pessoas = array();
        foreach($resultados as $resultado){
            $p = new Produto($resultado['descricao'],$resultado['categoria'],$resultado['valor']);
            $p->setId($resultado['id_produto']);
            
            $pessoas[] = $p;
        }
        return $pessoas;
    }



    
}