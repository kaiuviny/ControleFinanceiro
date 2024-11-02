<?php
interface iDespesas_VariaveisDAO{
    public function insert(Despesas_VariaveisVO $value);
    public function update(Despesas_VariaveisVO $value);
    public function delete(Despesas_VariaveisVO $value);
    public function search($codigo_grupo_usuarios, $word);
    public function getRegister($codigo_grupo_usuarios);
    public function getById($id_despesa_variavel);
    public function getAll($codigo_grupo_usuarios, $mes_id, $ano);
}
?>