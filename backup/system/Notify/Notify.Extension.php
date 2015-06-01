<?php

///check if notification belongs to user

class Notify
{
    //Add notification
    public static function nAdd($user_id,$data=null,$type=null)
    {
        $data = json_encode($data);
        $model = new Model;
        $model->query("INSERT INTO notification(user_id,data,type,time) VALUES(:user_id,:data,:type,NOW())");
        $model->bind(':user_id',$user_id);
        $model->bind(':data',$data);
        $model->bind(':type',$type);
        $model->execute();
        $model = null;
        //send email
    }

    // Delete with notification id
    public static function nDelete($id)
    {
        if(Notify::check($id)){
        $model = new Model;
        $model->query("DELETE FROM notification WHERE id=:id");
        $model->bind(':id',$id);
        $model->execute();
        $model = null;
        }
    }

    // Mark Notification As Read
    public static function nMarkRead($id)
    {
        if(Notify::check($id)){
        $model = new Model;
        $model->query("UPDATE notification SET status = 0  WHERE id=:id");
        $model->bind(':id',$id);
        $model->execute();
        $model = null;
        }
    }

    // Mark All As Read
    public static function nMarkReadAll()
    {
        $model = new Model;
        $model->query("UPDATE notification SET status = 0  WHERE user_id=:user_id");
        $model->bind(':user_id',$_SESSION['user_id']);
        $model->execute();
        $model = null;
    }

    //get all notification
    public static function nGetAll()
    {
        $model = new Model;
        $model->query("SELECT id,data, time, status, type FROM notification WHERE user_id=:user_id");
        $model->bind(':user_id',$_SESSION['user_id']);
        $result = $model->rowAll();
        $model = null;
        if($result){
            foreach($result as &$r)
            {
                $r["data"] = json_decode($r["data"],true);
            }
            return $result;
        }
        else
            return 0;
    }

    // Get All Unread Notification
    public static function nGetUnread()
    {
        $model = new Model;
        $model->query("SELECT id,data, time, status, type FROM notification WHERE user_id=:user_id AND status = 1");
        $model->bind(':user_id',$_SESSION['user_id']);
        $result = $model->rowAll();
        $model = null;
        //echo "<pre>";
        //   var_dump($result[0]['data']);
        //echo "</pre>";
        if($result){
            foreach($result as &$r)
            {
                $r["data"] = json_decode($r["data"],true);
            }
          //  echo "<pre>";
          //var_dump($result);
          //  echo "</pre>";
            return $result;
        }
        else
            return 0;
    }
    //check Permission
    public static function check($id)
    {
        $model = new Model;
        $model->query("SELECT user_id FROM notification WHERE id=:id");
        $model->bind(':id',$id);
        if($result = $model->row()){
            if($result['user_id']==$_SESSION['user_id']){
                return 1;
            }
        }
        else
            return 0;
    }
}


