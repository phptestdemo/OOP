<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?=$_SESSION['success']?></div>
        <?php endif ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?=$_SESSION['error']?></div>
        <?php endif ?>
        <div class="panel panel-default">
            <div class="panel-heading">Đăng nhập</div>
            <div class="panel-body">
                <form action="?cn=signin&m=login" method="post" id="signinForm">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="vali">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <div class="vali">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnLogin" class="btn btn-success">Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<!-- end slide -->