<?php $this->layout('layout', ['title' => 'Administration']) ?>
<div class="col-sm-8">
    <article class="single-blog">
        <div class="post-content">

            <h2 align="center">Administrator Panel</h2>

            <a class="btn btn-primary btn-success" href="/admin-add-post-form" role="button">Add Post</a>

            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col">Views</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($arrayItems as $data): ?>
                    <tr>
                        <th scope="row"><?=$data['id']?></th>
                        <td><?=$data['title']?></td>
                        <td><?=$data['category']?></td>
                        <td><?=$data['author']?></td>
                        <td><?=$data['views_post']?></td>
                        <td><a href="/admin-edit-post-form/<?=$data['id']?>"
                                data-toggle="tooltip" data-placement="top" title="Edit post">
                                <img src="../assets/images/arrow/edit.png" width="20"></a>
                                <span style="margin-left: 10px;"><a href="/delete-post/<?=$data['id']?>"
                                data-toggle="tooltip" data-placement="top" title="Delete post" onclick="return confirm('are you sure?')">
                                <img src="../assets/images/arrow/del.png" width="20"></a></span></td>
                    </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </article>

    <div class="post-pagination  clearfix">
        <ul class="pagination text-left">
            <?php if ($paginator->getPrevUrl()): ?>
                <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Назад</a></li>
            <?php endif; ?>

            <?php foreach ($paginator->getPages() as $page): ?>
                <?php if ($page['url']): ?>
                    <li <?=$page['isCurrent'] ? 'class="active"' : ''; ?>>
                        <a href="<?=$page['url']; ?>"><?=$page['num']; ?></a>
                    </li>
                <?php else: ?>
                    <li class="disabled"><span><?=$page['num']; ?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($paginator->getNextUrl()): ?>
                <li><a href="<?=$paginator->getNextUrl(); ?>">Вперед &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </div>

</div>

