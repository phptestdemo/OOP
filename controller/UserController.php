<?php
$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
$user = new UserController;
switch ($method) {
    case 'index':
        $user->index();
        break;
    case 'register':
        $user->register();
        break;
    default:
        // code...
        break;
}
/**
 * summary
 */
class UserController
{
    /**
     * construct
     */
    public function __construct()
    {
        require_once 'model/Users.php';
    }

    /**
     * show form signup
     * 
     * @return view
     */
    public function index()
    {
        require_once 'view/home/signup_view.php';
        if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
            unset($_SESSION['error'], $_SESSION['success']);
        }
    }

    /**
     * register account
     * 
     * @return view
     */
    public function register()
    {
        if (isset($_POST['signup'])) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $this->checkDuplicateEmail($email);

            $user = new Users;
            $idUser = $user->signUp($name, $email, $password);
            if ($idUser > 0) {
                $_SESSION['success'] = "Dang ki tai khoan thanh cong";
                header("Location: ?cn=signup&m=index");
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                } 
            } else {
                $_SESSION['error'] = "Dang ki khong thanh cong";
                header("Location: ?cn=signup&m=index");
            }
        }
    }

    /**
     * check Duplicate Email
     * 
     * @param  string $email
     * @return view
     */
    public function checkDuplicateEmail($email)
    {
        $user = new Users;
        $emailUser = $user->checkDuplicateUser($email);
        if (!$emailUser) {
            $_SESSION['error'] = "Vui lòng chọn tài khoản email khác";
            header("Location: ?cn=signup&m=index");
        }
    }



    function log($data = array())
    {
        echo '<pre/>';
        print_r($data);
        die();
    }
}