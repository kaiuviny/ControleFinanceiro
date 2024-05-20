<?php
interface iDespesas_FixasDAO{
    public function insert(Despesas_FixasVO $value);
    public function update(Despesas_FixasVO $value);
    public function delete(Despesas_FixasVO $value);
    public function getById($id_depesas_fixas);
    public function getAll($codigo_grupo_usuarios, $mes_id, $ano);
}
?>