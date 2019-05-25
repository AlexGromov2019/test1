<?php $this->layout('layout', ['title' => 'Views Authorization']); ?>
<div class="col-sm-8">
    <article class="single-blog">
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                <div><?php echo flash()->display(); //Вывод исключений ?></div>
                <h2>Authorization</h2>
                <form action="/login" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Password</label>
                        <input type="text" name="password" class="form-control" id="formGroupExampleInput" placeholder="Your password" required>
                    </div>

                    <p><button type="submit" class="btn btn-primary">Authorization</button></p>

                </form>
            </div>
        </div>
    </article>
</div>