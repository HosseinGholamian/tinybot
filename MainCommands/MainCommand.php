<?php
namespace MainCommands;


use Models\User;
 
class MainCommand{
    public static function adduser($chatID , $firstname , $username ,$isBot){
        $inputs['firstname'] = $firstname;
        $inputs['username'] = $username;
        $inputs['chat_id'] = $chatID;
        $inputs['user_is_bot'] = $isBot ;
        $result = User::create($inputs);
        $result ? : exit();
    }

    public static function start_command( object $core){
        if($core->getMessageText() == "/start"){

            $user = User::where('chat_id',$core->userChatId)->get();
           
            if(!$user){
                self::adduser($core->userChatId , $core->userFirstName , $core->username  , $core->userIsBot);  
            }
            $core->sendMessage($core->userChatId,'bot started')->send();
            exit();
        }
        
    }
    

    public function addFile(object $core){
        if($core->getMessageText() == "/addfile"){
            $user = User::where('chat_id',$core->userChatId)->get();
            if(!$user[0]->is_admin){
                $core->sendMessage($core->userChatId,'شما ادمین نیستید')->send();
                exit();
            }
            $core->sendMessage($core->userChatId,'فایل مورد نظرتان را بفرستید')->ForceReply()->send();
        }
        //$core->sendMessage($core->userChatId,$core->content)->send();
    }



}