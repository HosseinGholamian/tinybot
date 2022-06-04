<?php

use MainCommands\MainCommand;
use Models\User;
use Models\File;
function message($core)
{

    $chatId = $core->getUserChatId();
    $messageText = $core->getMessageText();
    $maincommand = new MainCommand();
    $maincommand->start_command($core);
    $maincommand->addFile($core);
    $core->isTyping($chatId)->send();

    //$files = File::whereLike('title',$messageText.'%')->get();
    //$results = [];
     //foreach($files as $file){
     //    array_push($results,['type'=>'document','id'=>$file->id,'title'=>$file->title,'document_file_id'=>$file->file_id]);
     //}

     $user_profile_photo = $core->callMethod('getUserProfilePhotos',[
         'user_id' => $chatId,
     ]);
    //$user_profile_photo = $core->getUserProfilePhotos($chatId)->send();
    $core->sendMessage($chatId,  $core->content )->replyToMessageId($core->messageId)->InlineKeyboardMarkup(
        [
            [['text' => 'salam', 'callback_data' => '1']],
            [['text' => 'salam2', 'callback_data' => '2']],
        ]
    )->send();
    exit();
}

function callback($core)
{
    if ($core->callbackObject->data == 1) {
        $core->sendMessage($core->callbackObject->message['chat']['id'], 'you click 1 data')->send();
        exit();
    } else {
        $core->answerCallbackQuery($core->content['callback_query']['id'])->text('you click two data')->send();
        $core->editMessageText($core->callbackObject->message['chat']['id'], $core->callbackMessageId)->text('message is edited')->InlineKeyboardMarkup(
            [
                [['text' => 'edited', 'callback_data' => '1']],
                [['text' => 'edited2', 'callback_data' => '2']],
            ]
        )->send();
        exit();

    }
    
}

function inlineQuery($core)
{
    $files = File::whereLike('title',$core->inlineMessageQuery.'%')->get();
    $results = [];
    foreach($files as $file){
         array_push($results,['type'=>'document','id'=>$file->id,'title'=>$file->title,'document_file_id'=>$file->file_id]);
     }
     
     $core->answerInlineQuery( $core->inlineMessageId,   $results)->send(); 
}
