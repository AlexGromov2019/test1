<?php $this->layout('layout', ['title' => 'Post By Category']); ?>
<?php use App\models\DateBuilder; ?>
<div class="col-sm-8">
    <?php foreach ($arrayItems as $data): ?>
        <article class="single-blog">
            <div class="post-thumb">
                <a href="/page/<?=$this->e($data['id'])?>"><img src="../assets/images/posts/<?=$this->e($data['images'])?>" alt=""></a>
            </div>
            <div class="post-content">
                <div class="entry-header text-center text-uppercase">
                    <a href="/category/<?=$this->e($data['category'])?>" class="post-cat"><?=$this->e($data['category'])?></a>
                    <h2><a href="/page/<?=$this->e($data['id'])?>"><?=$this->e($data['title'])?></a></h2>
                </div>
                <div class="entry-content">
                    <p><?=$this->e($data['preview_text'])?></p>
                </div>
                <div class="continue-reading text-center text-uppercase">
                    <a href="/page/<?=$this->e($data['id'])?>">Continue Reading</a>
                </div>
                <div class="post-meta">
                    <ul class="pull-left list-inline author-meta">
                        <li class="author">By <a href="#"><?=$this->e($data['author'])?> </a></li>
                        <li class="date"> On <?=DateBuilder::convertDate($this->e($data['creation_date'])); ?></li>
                    </ul>
                    <ul class="pull-right list-inline social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </article>
    <? endforeach; ?>

    <div class="post-pagination  clearfix">
        <ul class="pagination text-left">
            <?php if ($paginator->getPrevUrl()): ?>
                <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Назад</a></li>
            <?php endif; ?>

            <?php foreach ($paginator->getPages() as $page): ?>
                <?php if ($page['url']): ?>
                    <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                        <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                    </li>
                <?php else: ?>
                    <li class="disabled"><span><?php echo $page['num']; ?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($paginator->getNextUrl()): ?>
                <li><a href="<?php echo $paginator->getNextUrl(); ?>">Вперед &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>