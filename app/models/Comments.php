<?php


namespace App\models;


use Aura\SqlQuery\QueryFactory;
use PDO;

class Comments
{
    protected $pdo;
    private $qf;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->pdo = $pdo;
        $this->qf = $queryFactory;
    }

    //Комментарии
    public function GetParentComments($postId){
        $select = $this->qf->newSelect();
        $select
            ->cols(['*'])
            ->from('comments')
            ->where('parent_id = :parent_id')
            ->where('post_id = :post_id')
            ->orderBy(['id DESC'])
            ->bindValues([
                'parent_id' => 0,
                'post_id' => $postId,
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //Дочерние комментарии / ответы на родительские комментарии
    public function GetSubComments($id_parent_comment){
        $parent_comment_id = $id_parent_comment;
        $select = $this->qf->newSelect();
        $select
            ->cols(['*'])
            ->from('comments')
            ->where('parent_id = :parent_id')
            ->orderBy(['id DESC'])
            ->bindValues([
                'parent_id' => $parent_comment_id,
            ]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}