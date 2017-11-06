<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?=$_SESSION['error']?></div>
        <?php endif ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?=$_SESSION['success']?></div>
        <?php endif ?>
        <div class="panel panel-default">
            <div class="panel-heading">Đăng ký tài khoản</div>
            <div class="panel-body">
                <form action="?cn=signup&m=register" method="post" id="signupForm" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Họ tên</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Nhập họ tên" name="name" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Mật khẩu</label>
                        <div class="col-sm-5">
                            <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon1" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-4">
                            <button type="submit" class="btn btn-success" name="signup" value="Sign up">Đăng ký</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
        <!-- end slide -->