<?php
$method = isset($_GET['m']) ? trim($_GET['m']) : '';
$user = new UserController;
switch ($method) {
    case 'signup':
        $user->signup();
        break;
    case 'register':
        $user->register();
        break;
    case 'signin':
        $user->signin();
        break;
    case 'login':
        $user->login();
        break;  
    case 'logout':
        $user->logout();
        break;  
    default:
        header("Location: ?cn=index");
        exit;
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
    public function signup()
    {
        require_once 'view/home/signup_view.php';
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
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
                header("Location: ?cn=signup&m=signin");
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                } 
            } else {
                $_SESSION['error'] = "Dang ki khong thanh cong";
                header("Location: ?cn=signup&m=signup");
            }
        }
    }

    /**
     * show view signin
     * 
     * @return view
     */
    public function signin()
    {
        require_once 'view/home/login_view.php';
        if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
            unset($_SESSION['success'], $_SESSION['error']);
        }
    }

    /**
     * login
     * 
     * @return view
     */
    public function login()
    {
        if (isset($_POST['btnLogin'])) {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            
            $user = new Users;
            $member = $user->signIn($email, md5($password));
            if (!empty($member)) {
                $_SESSION['username'] = $member->name;
                header("Location: ?cn=index");
            } else {
                $_SESSION['error'] = "Email hoặc mật khẩu không đúng!";
                header("Location: ?cn=signin&m=signin");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ?cn=index");
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
            header("Location: ?cn=signup&m=signup");
            exit;
        }
    }



    function log($data = array())
    {
        echo '<pre/>';
        print_r($data);
        die();
    }
}