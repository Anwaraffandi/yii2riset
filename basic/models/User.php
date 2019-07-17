<?php
namespace app\models;

use app\models\TblUsers;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $username;
    public $password;
    public $name;
    public $role;

     
    public static function findIdentity($name){
     $users = TblUsers::find()->where(['name'=> $name])->one();
        if ($users) {
            return new static($users);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findByUsername($username){
        $users = TblUsers::find()->where(['username'=> $username])->one();
        if ($users) {
            return new static($users);
        }
        return null;
    }
 
    public function getId()
    {
        return $this->name;
    }

    public function getAuthKey()
    { 
    }

    public function validateAuthKey($authkey)
    { 
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    
//    public static function isUserAdmin($username){
//      if (static::findOne(['username' => $username, 'role' => self::ROLE_ADMIN])){
//                        
//             return true;
//      } else {
//                        
//             return false;
//      }    
//    }

}
