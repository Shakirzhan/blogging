  <section id="page-breadcrumb" style="margin-bottom: 40px;">
    <div class="vertical-center sun">
        <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <?php if (isset($_SESSION['session_username'])): ?>
                            <h1 class="title" style="font-family: Arial;">Добро пожаловать, <span> <?=$_SESSION['session_username']; ?> </span>!</h1>
                            <p><a href="?action=logout" class="color-red">Выйти</a> из системы...</p>
                        <?php else: ?>
                            <h1 class="title">Blog</h1>
                            <p>Blog with right sidebar</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--/#page-breadcrumb-->