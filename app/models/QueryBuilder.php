<?php

namespace App\models;

use Aura\SqlQuery\QueryFactory;
use PDO;
use JasonGrimes\Paginator;

class QueryBuilder{

    protected $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }

    public function getAll($table, $itemPage){
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $totalItems = $sth->fetchAll(PDO::FETCH_ASSOC);
        //Селект для пагинации
        $select = $this->queryFactory->newSelect();
        //для пагинации
        $itemsPerPage = $itemPage;
        $currentPage = $_GET['page'] ?? 1;
        $urlPattern = '?page=(:num)';
        $select
            ->cols(['*'])
            ->from($table)
            ->orderBy(['id DESC'])
            //для пагинации
            ->setPaging($itemsPerPage)
            ->page($currentPage);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $items = $sth->fetchAll(PDO::FETCH_ASSOC);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        return [
            'items' => $items,
            'paginator' => $paginator
        ];
    }

    public function getPopular($table, $column){
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from($table)
            ->orderBy([$column . ' DESC'])
            ->limit(3);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $totalItems = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $totalItems;
    }

    public function getAllByCategory($table, $category){
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from($table)
            ->where('category = :category')
            ->bindValues([
                'category' => $category
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $totalItems = $sth->fetchAll(PDO::FETCH_ASSOC);
        //Селект для пагинации
        $select = $this->queryFactory->newSelect();
        //для пагинации
        $itemsPerPage = 3;
        $currentPage = $_GET['page'] ?? 1;
        $urlPattern = '?page=(:num)';
        $select
            ->cols(['*'])
            ->from($table)
            ->orderBy(['id DESC'])
            ->where('category = :category')
            ->bindValues([
                'category' => $category
            ])
            //для пагинации
            ->setPaging($itemsPerPage)
            ->page($currentPage);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $items = $sth->fetchAll(PDO::FETCH_ASSOC);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        return [
            'items' => $items,
            'paginator' => $paginator
        ];
    }

    public function getOne($table, $id){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('id = :id')
            ->bindValues([
            'id' => $id
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($table, $data){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $data, $id){
        $update = $this->queryFactory->newUpdate();
        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id')
            ->bindValues([
                'id' => $id,
            ]);
        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }

    public function delete($table, $id){
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValues([
                'id' => $id,
            ]);

        $sth = $this->pdo->prepare($delete->getStatement());

        $sth->execute($delete->getBindValues());
    }

    public function getOneUser($table, $username){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('username = :username')
            ->bindValues([
                'username' => $username
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countRecordsInTable($table, $post_id){
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['COUNT(*)'])
            ->from($table)
            ->where('post_id = :post_id')
            ->bindValues([
                'post_id' => $post_id
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $count = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $count;
    }

    //Получаем следующие и предыдущие записи для страницы
    private function currentRecordNumber($id){
        //Получаем номер текущей записи
        $select = $this->queryFactory->newSelect();
        $select->cols(['COUNT(id)'])
            ->from('posts')
            ->where('id < :id')
            ->bindValues(['id' => $id])
            ->limit(1);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $numberCount = $sth->fetch(PDO::FETCH_NUM);
        return $numberCount[0];
    }
    public function nextPost($id){
        //Следующая запись
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('posts')
            ->where('id > :id')
            ->bindValues(['id' => $id])
            ->limit(1);
        //->offset($numberCount[0] - 1);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $resNext  = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resNext;
    }
    public function previousPost($id){
        //Предыдущая запись
        $numberCount = $this->currentRecordNumber($id);
        $select = $this->queryFactory->newSelect($id);
        $select->cols(['*'])
            ->from('posts')
            ->where('id < :id')
            ->bindValues(['id' => $id])
            ->limit(1)
            ->offset($numberCount - 1);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $resPrev  = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resPrev;
    }

}
