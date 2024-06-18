<?php
class DividasVO{
    private $id_minha_dividas;
    private $cartoes_id;
    private $descricao;
    private $orgao_devedor;
    private $valor_parcela;
    private $valor_total;
    private $numero_parcelas;
    private $data_inicial;
    private $dia_mes_vencimento;
    private $multa_atraso;
    private $juros_por_dia_atraso;
    private $desconto_por_dia_Adiantado;
    private $user_update;
    private $datetime_create;
    private $last_update;

    public function getId_minha_dividas(){
        return $this->id_minha_dividas;
    }
    public function setId_minha_dividas($id_minha_dividas){
        $this->id_minha_dividas = $id_minha_dividas;
    }

    public function getCartoes_id(){
        return $this->cartoes_id;
    }
    public function setCartoes_id($cartoes_id){
        $this->cartoes_id = $cartoes_id;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getOrgao_devedor(){
        return $this->orgao_devedor;
    }
    public function setOrgao_devedor($orgao_devedor){
        $this->orgao_devedor = $orgao_devedor;
    }

    public function getValor_parcela(){
        return $this->valor_parcela;
    }
    public function setValor_parcela($valor_parcela){
        $this->valor_parcela = $valor_parcela;
    }

    public function getValor_total(){
        return $this->valor_total;
    }
    public function setValor_total($valor_total){
        $this->valor_total = $valor_total;
    }

    public function getNumero_parcelas(){
        return $this->numero_parcelas;
    }
    public function setNumero_parcelas($numero_parcelas){
        $this->numero_parcelas = $numero_parcelas;
    }

    public function getData_inicial(){
        return $this->data_inicial;
    }
    public function setData_inicial($data_inicial){
        $this->data_inicial = $data_inicial;
    }

    public function getDia_mes_vencimento(){
        return $this->dia_mes_vencimento;
    }
    public function setDia_mes_vencimento($dia_mes_vencimento){
        $this->dia_mes_vencimento = $dia_mes_vencimento;
    }

    public function getMulta_atraso(){
        return $this->multa_atraso;
    }
    public function setMulta_atraso($multa_atraso){
        $this->multa_atraso = $multa_atraso;
    }

    public function getJuros_por_dia_atraso(){
        return $this->juros_por_dia_atraso;
    }
    public function setJuros_por_dia_atraso($juros_por_dia_atraso){
        $this->juros_por_dia_atraso = $juros_por_dia_atraso;
    }

    public function getDesconto_por_dia_Adiantado(){
        return $this->desconto_por_dia_Adiantado;
    }
    public function setDesconto_por_dia_Adiantado($desconto_por_dia_Adiantado){
        $this->desconto_por_dia_Adiantado = $desconto_por_dia_Adiantado;
    }

    public function getUser_update(){
        return $this->user_update;
    }
    public function setUser_update($user_update){
        $this->user_update = $user_update;
    }

    public function getDatetime_create(){
        return $this->datetime_create;
    }
    public function setDatetime_create($datetime_create){
        $this->datetime_create = $datetime_create;
    }

    public function getLast_update(){
        return $this->last_update;
    }
    public function setLast_update($last_update){
        $this->last_update = $last_update;
    }
}

?>