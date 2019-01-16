<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/12
 * Time: 16:12
 */
namespace App\Models;


/**
 * Class App\Models\User 
 * @property integer $id 
 * @property string $username 用户名
 * @property string $email E-mail
 * @property string $password 密码
 * @property string $remember_token 记住密码token
 * @property integer $status 0正常 -1删除
 * @property string $created_at 
 * @property string $updated_at 
 */
class User extends Model
{
    protected $tableName = '{{user}}';
    protected $primaryKey = 'id';
}