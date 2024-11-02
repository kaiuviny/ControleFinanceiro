<?php
class Despesas_VariaveisVO{
    private $id_despesa_variavel;
    private $mes_id;
    private $ano;
    private $categoria_despesas_variaveis_id;
    private $codigo_grupo_usuarios;
    private $estabelecimento_id;
    private $tipo_estabelecimento_id;
    private $observacao_estabalecimento;
    private $descricao;
    private $valor;
    private $data_utilizada;
    private $datetime_create;
    private $user_update;
    private $last_update;
    private $forma_pagamento_id;
    private $cartao_id;
    private $valor_pago;
    private $data_pagamento;
    private $user_update_pdv;
    private $last_update_pdv;

    public function getId_despesa_variavel(){
        return $this->id_despesa_variavel;
    }
    public function setId_despesa_variavel($id_despesa_variavel){
        $this->id_despesa_variavel = $id_despesa_variavel;
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
        $this->ano=$ano;
    }

    public function getCategoria_despesas_variaveis_id(){
        return $this->categoria_despesas_variaveis_id;
    }
    public function setCategoria_despesas_variaveis_id($categoria_despesas_variaveis_id){
        $this->categoria_despesas_variaveis_id=$categoria_despesas_variaveis_id;
    }

    public function getCodigo_grupo_usuarios(){
        return $this->codigo_grupo_usuarios;
    }
    public function setCodigo_grupo_usuarios($codigo_grupo_usuarios){
        $this->codigo_grupo_usuarios=$codigo_grupo_usuarios;
    }

    public function getEstabelecimento_id(){
        return $this->estabelecimento_id;
    }
    public function setEstabelecimento_id($estabelecimento_id){
        $this->estabelecimento_id=$estabelecimento_id;
    }

    public function getTipo_estabelecimento_id(){
        return $this->tipo_estabelecimento_id;
    }
    public function setTipo_estabelecimento_id($tipo_estabelecimento_id){
        $this->tipo_estabelecimento_id=$tipo_estabelecimento_id;
    }

    public function getObservacao_estabalecimento(){
        return $this->observacao_estabalecimento;
    }
    public function setObservacao_estabalecimento($observacao_estabalecimento){
        $this->observacao_estabalecimento=$observacao_estabalecimento;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }

    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getData_utilizada(){
        return $this->data_utilizada;
    }
    public function setData_utilizada($data_utilizada){
        $this->data_utilizada = $data_utilizada;
    }

    public function getDatetime_create(){
        return $this->datetime_create;
    }
    public function setDatetime_create($datetime_create){
        $this->datetime_create = $datetime_create;
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

    public function getForma_pagamento_id(){
        return $this->forma_pagamento_id;
    }
    public function setForma_pagamento_id($forma_pagamento_id){
        $this->forma_pagamento_id = $forma_pagamento_id;
    }

    public function getCartao_id(){
        return $this->cartao_id;
    }
    public function setCartao_id($cartao_id){
        $this->cartao_id = $cartao_id;
    }

    public function getValor_pago(){
        return $this->valor_pago;
    }
    public function setValor_pago($valor_pago){
        $this->valor_pago = $valor_pago;
    }

    public function getData_pagamento(){
        return $this->data_pagamento;
    }
    public function setData_pagamento($data_pagamento){
        $this->data_pagamento = $data_pagamento;
    }

    public function getUser_update_pdv(){
        return $this->user_update_pdv;
    }
    public function setUser_update_pdv($user_update_pdv){
        $this->user_update_pdv = $user_update_pdv;
    }
    
    public function getLast_update_pdv(){
        return $this->last_update_pdv;
    }
    public function setLast_update_pdv($last_update_pdv){
        $this->last_update_pdv = $last_update_pdv;
    }

}
?>