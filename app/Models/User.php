<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable {
        notify as protected laravelNotify;
    }
    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        // 用户未读通知自增1
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    /**
     * The attributes that are mass assignable.
     * 防止用户随意修改模型数据
     * 只有在此属性里定义的字段，才允许修改，否则忽略
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'introduction', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *  一个用户拥有多个话题
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    /**
     * 一个用户拥有多个回复
     */
     public function replies()
     {
         return $this->hasMany(Reply::class);
     }
    /**
     * 权限控制
     */
     public function isAuthorOf($model)
     {
         return $this->id == $model->user_id;
     }

     /**
      *  当用户访问通知列表时，将所有通知状态设定为已读，并清空未读消息数
      */
     public function markAsRead()
     {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
     }

}
