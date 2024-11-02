<?php
interface iDespesas_FixasDAO{
    public function insert(Despesas_FixasVO $value);
    public function update(Despesas_FixasVO $value);
    public function delete(Despesas_FixasVO $value);
    public function search($codigo_grupo_usuarios, $word);
    public function getRegister($codigo_grupo_usuarios);
    public function getById($id_despesa_fixa);
    public function getAll($codigo_grupo_usuarios, $mes_id, $ano);
}
?>