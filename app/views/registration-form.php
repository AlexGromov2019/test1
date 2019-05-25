<?php $this->layout('layout', ['title' => 'Views Registration']); ?>
<div class="col-sm-8">
        <article class="single-blog">
            <div class="post-content">
                <div class="entry-header text-center text-uppercase">
                    <div><?php echo flash()->display(); //Вывод исключений ?></div>
                    <h2>Registration</h2>
                    <form action="/registration" method="post" enctype="multipart/form-data">

                       <div class="form-group">
                          <label for="formGroupExampleInput">Email</label>
                          <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Email" required>
                       </div>

                       <div class="form-group">
                          <label for="formGroupExampleInput">Name</label>
                          <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Your name" required>
                       </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="text" name="password" class="form-control" id="formGroupExampleInput" placeholder="Your password" required>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="text" name="repassword" class="form-control" id="formGroupExampleInput" placeholder="Re-enter Your password" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" name="pictures" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                        </div>

                        <p><button type="submit" class="btn btn-primary">Registration</button></p>
                    </form>
                </div>
            </div>
        </article>
</div>