<?php

/**
 * Class CrudInterface
 */
interface CrudInterface
{
    public function getList();

    public function getById($id);

    public function create(RecordInterface $record);

    public function update(RecordInterface $record);

    public function delete(RecordInterface $record);
}
