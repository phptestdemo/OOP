<?php

/**
 * summary
 */
class Users extends database
{
    /**
     * register acount member
     * 
     * @param  string $name
     * @param  string $email 
     * @param  string $pass  
     * @return boolean| int        
     */
    public function signUp($name, $email, $pass)
    {
        $sql = "insert into users(name, email, password) values(?,?,?)";
        $this->setQuery($sql);
        $result = $this->execute(array($name, $email, md5($pass)));
        if ($result) {
            return $this->getLastId();
        }
        return false;
    }

    /**
     * get email
     * 
     * @param  string $email
     * @return boolean      
     */
    public function checkDuplicateUser($email)
    {
        $flag = true;
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $this->setQuery($sql);
        $result = $this->loadRow(array($email));
        if (!empty($result)) {
            $flag = false;
        }
        return $flag;
    }
    
}