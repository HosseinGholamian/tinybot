<?php
require __DIR__.'/boot.php';



if(isset($core->content['message'])){
   message($core);
}
if(isset($core->content['callback_query'])){
    callback($core);
}
if(isset($core->content['inline_query'])){
   inlineQuery($core);
}

exit();

//$core->callMethod('sendMessage',['chat_id'=>$chatId , 'text'=>$core->content]);