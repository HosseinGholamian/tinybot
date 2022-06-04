<?php
namespace Tinybot\Core;

trait Tools
{
    use InlineMethods,Attributes;
    protected $method;
    protected $parameters = [];
    protected $allowableMethods = [
        'sendMessage' => [
            'disableWebPagePreview',
            'disableNotification',
            'protectContent',
            'replyToMessageId',
            'allowSendingWithoutReply',
            'parseMode',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],
        'forwardMessage' => [
            'disableNotification',
            'protectContent',
        ],
        'sendPhoto' => [
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],
        'sendAudio' => [
            'duration',
            'performer',
            'title',
            'thumb',
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendDocument' => [
            'thumb',
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendVideo' => [
            'duration',
            'width',
            'height',
            'thumb',
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendAnimation' => [
            'duration',
            'width',
            'height',
            'thumb',
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendVoice' => [
            'duration',
            'caption',
            'disableNotification',
            'parseMode',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendVideoNote' => [
            'duration',
            'length',
            'disableNotification',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'sendContact' => [
            'disableNotification',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'ReplyKeyboardRemove',
            'InlineKeyboardMarkup',
            'ForceReply',
        ],'sendDice' => [
            'emoji',
            'disableNotification',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'ReplyKeyboardRemove',
            'InlineKeyboardMarkup',
            'ForceReply',
        ],'sendPoll' => [
            'is_anonymous',
            'type',
            'allows_multiple_answers',
            'correct_option_id',
            'explanation',
            'open_period',
            'close_date',
            'is_closed',
            'disableNotification',
            'protectContent',
            'replyToMessageId',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],
        'isTyping' =>[],
        'uploadingPhoto ' =>[],
        'uploadingVideo ' =>[],
        'uploadingVoice ' =>[],
        'uploadingDocument ' =>[],
        'chooseSticker  ' =>[],
        'findLocation ' =>[],
        'uploadingVideoNote ' =>[],
        'sendChatAction' => [],
        'getUserProfilePhotos'=>[
            'offset',
            'limit',
        ],
        'answerCallbackQuery'=>[
            'text',
            'show_alert',
            'url',
        ], 'editMessageText'=>[
            'text',
            'parse_mode',
            'disable_web_page_preview',
            'ReplyKeyboardMarkup',
            'InlineKeyboardMarkup',
            'ReplyKeyboardRemove',
            'ForceReply',
        ],'answerInlineQuery'=>[
            'cache_time',
            'is_personal',
            'next_offset',
            'switch_pm_text',
            'switch_pm_parameter',
        ]

    ];

    

    protected function sendRequest($parameters = [])
    {
        $handle = curl_init($this->api_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($handle, CURLOPT_TIMEOUT, 60);
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        return curl_exec($handle);
    }

    public function callMethod($method, $parameters = [])
    {
        $parameters['method'] = $method;
        return $this->sendRequest($parameters);
    }

    public function sendMessage( $chatId,  $text)
    {
        $this->method = 'sendMessage';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['text'] = $text;
        return $this;
    }
    public function editMessageText( $chatId='',  $message_id='',$inline_message_id= '')
    {
        $this->method = 'editMessageText';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['message_id'] = $message_id;
        $this->parameters['inline_message_id'] = $inline_message_id;
        return $this;
    }
    public function answerCallbackQuery( $callback_query_id)
    {
        $this->method = 'answerCallbackQuery';
        $this->parameters['callback_query_id'] = $callback_query_id;
        return $this;
    }
    public function getUserProfilePhotos($chatId)
    {
        $this->method = 'getUserProfilePhotos';
        $this->parameters['user_id'] = $chatId;
     
        return $this;
    }


    public function sendPoll( $chatId,string  $question, array $options)
    {
        $this->method = 'sendPoll';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['question'] = $question;
        $this->parameters['options'] = $options;
        return $this;
    }


    public function uploadingPhoto( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'upload_photo';
        return $this;
    } public function uploadingVideo( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'upload_video';
        return $this;
    } public function uploadingVoice( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'upload_voice';
        return $this;
    } public function uploadingDocument( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'upload_document';
        return $this;
    } public function chooseSticker( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'choose_sticker';
        return $this;
    } public function findLocation( $chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'find_location';
        return $this;
    } public function uploadingVideoNote($chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'upload_video_note';
        return $this;
    }
    
    public function sendChatAction($chatId ,  string $action)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = $action;
        return $this;
    }

    public function isTyping($chatId)
    {
        $this->method = 'sendChatAction';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['action'] = 'typing';
        return $this;
    }

    public function sendDice($chatId)
    {
        $this->method = 'sendDice';
        $this->parameters['chat_id'] = $chatId;
        return $this;
    }
    public function sendVideoNote($chatId,  $video_note)
    {
        $this->method = 'sendVideoNote';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['video_note'] = $video_note;
        return $this;
    }
    public function sendVoice($chatId,  $voice)
    {
        $this->method = 'sendVoice';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['voice'] = $voice;
        return $this;
    }

    public function sendAnimation($chatId,  $animation)
    {
        $this->method = 'sendAnimation';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['animation'] = $animation;
        return $this;
    }

    public function sendDocument($chatId,  $document)
    {
        $this->method = 'sendDocument';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['document'] = $document;
        return $this;
    }

    public function sendVideo($chatId,  $video)
    {
        $this->method = 'sendVideo';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['video'] = $video;
        return $this;
    }

    public function sendAudio($chatId,  $audio)
    {
        $this->method = 'sendAudio';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['audio'] = $audio;
        return $this;
    }

    public function sendContact($chatId,  $phone_number,$first_name)
    {
        $this->method = 'sendContact';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['phone_number'] = $phone_number;
        $this->parameters['first_name'] = $first_name;
        return $this;
    }

    



    public function forwardMessage($chatId, int $fromChatId, int $messageId)
    {
        $this->method = 'forwardMessage';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['from_chat_id'] = $fromChatId;
        $this->parameters['message_id'] = $messageId;

        return $this;
    }

    public function sendPhoto($chatId, string $photo)
    {
        $this->method = 'sendPhoto';
        $this->parameters['chat_id'] = $chatId;
        $this->parameters['photo'] = $photo;
        return $this;
    }

    public function send()
    {
        $result = $this->callMethod($this->method, $this->parameters);
        $this->parameters = [];
        $this->method = '';
        return $result;
    }


 


}
