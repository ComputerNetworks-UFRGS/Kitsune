<?php
class AuthTree{
    public static function createRoles(){
        //Creating JEMS roles
        $auth = Yii::app()->authManager;
        $bizRule='return !Yii::app()->user->isGuest;';
        $auth->createRole('author', 'Every authenticated user of Kitsune', $bizRule);
        $bizRule='return Yii::app()->user->isGuest;';
        $auth->createRole('guest', 'Guest user', $bizRule);
        $auth->createRole('admin', 'Administer from Kitsune');
    }
    public static function assignRoles(){
        $auth = Yii::app()->authManager;
        //Para o Marotta
        $auth->assign('admin', 1);
        //Para o lisandro
        $auth->assign('admin', 5);
        
        
        //Luiz é só autor [6]
    }
    public static function createTasks(){
        $auth = Yii::app()->authManager;
        //Users must be allowed to update their own information only
        $bizRule = 'return Yii::app()->user->id===$params["Person"]->id;';
        $auth->createTask('updatemyaccount', 'update own information', $bizRule);
        $role = $auth->getAuthItem('author'); // pull up the authenticated role
        $role->addChild('updatemyaccount'); // assign updateSelf tasks to authenticated users
        
//        //Chair conference admin
//        $bizRule = 'return Yii::app()->user->id===$params["Conference"]->maintainer;';
//        $auth->createTask('updateconf', 'update conference information', $bizRule);
//        $role = $auth->getAuthItem('chair');
//        $role->addChild('updateconf');
        
        
    }
    
}
?>
