<?php

require __DIR__ . '/CrudInterface.php';

/**
 * Class Articles
 */
class Articles implements CrudInterface
{
    /**
     * @return Article[]|false
     */
    public function getList()
    {
        // @TODO
    }

    /**
     * @param $id
     * @return Article|false
     */
    public function getById($id)
    {
        // @TODO
    }

    /**
     * @param RecordInterface $record
     * @return string
     * @throws Exception
     */
    public function create(RecordInterface $record)
    {
        // @TODO
    }

    /**
     * @param RecordInterface $record
     * @return string
     * @throws Exception
     */
    public function update(RecordInterface $record)
    {
        // @TODO
    }

    /**
     * @param RecordInterface $record
     * @return string
     * @throws Exception
     */
    public function delete(RecordInterface $record)
    {
        // @TODO
    }
}
