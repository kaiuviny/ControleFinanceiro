<?php
    class Despesas_FixasVO{
        private $id_despesa_fixa;
        private $codigo_grupo_usuarios;
        private $categoria_despesas_fixas_id;
        private $categoria;
        private $mes_id;
        private $ano;
        private $descricao;
        private $vencimento;
        private $valor;
        private $status;
        private $user_update;
        private $last_update;

        public function getId_despesa_fixa(){
            return $this->id_despesa_fixa;
        }
        public function setId_despesa_fixa($id_despesa_fixa){
            $this->id_despesa_fixa = $id_despesa_fixa;
        }
        
        public function getCodigo_grupo_usuarios(){
            return $this->codigo_grupo_usuarios;
        }
        public function setCodigo_grupo_usuarios($codigo_grupo_usuarios){
            $this->codigo_grupo_usuarios = $codigo_grupo_usuarios;
        }

        public function getCategoria_despesas_fixas_id(){
            return $this->categoria_despesas_fixas_id;
        }
        public function setCategoria_despesas_fixas_id($categoria_despesas_fixas_id){
            $this->categoria_despesas_fixas_id = $categoria_despesas_fixas_id;
        }

        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function getMes_id(){
            return $this->mes_id;
        }
        public function setMes_id($mes_id){
            $this->mes_id = $mes_id;
        }

        public function getAno(){
            return $this->ano;
        }
        public function setAno($ano){
            $this->ano = $ano;
        }

        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getVencimento(){
            return $this->vencimento;
        }
        public function setVencimento($vencimento){
            $this->vencimento = $vencimento;
        }

        public function getValor(){
            return $this->valor;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }

        public function getUser_update(){
            return $this->user_update;
        }
        public function setUser_update($user_update){
            $this->user_update = $user_update;
        }
        
        public function getLast_update(){
            return $this->last_update;
        }
        public function setLast_update($last_update){
            $this->last_update = $last_update;
        }



    }
?>