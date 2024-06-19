<?php
interface iDividasDAO{
    public function insert(DividasVO $value);
    public function update(DividasVO $value);
    public function delete(DividasVO $value);
    public function getById($id);
    public function search($word);
    public function getAll();
}
?>