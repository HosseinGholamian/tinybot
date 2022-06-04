<?php
namespace Tinybot\Core;

use Tinybot\Config\Config;

trait GetContent
{
    protected $token;
    protected $api_url;
    public $content;


    // user properties
    public $userChatId;
    public $userFirstName;
    public $username;
    public $userIsBot;
    public $messageText;
    public $chatDate;
    public $chatType;
    public $messageId;


    //photo video document and ... properties
    public $photoObject;
    public $photoSize;
    public $photoFileId;
    public $photoFileUniqueId;
    public $replyToMessageObject = [];
    public $forwardFromChatObject;
    public $voiceObject;
    public $documentObject;
    public $musicObject;
    public $videoObject;


    //callback properties for inline methods
    public $callbackObject;
    public    $callbackId ;
    public    $callbackMessage;
    public    $callbackPvId ;
    public    $callbackMessageText ;
    public    $callbackMessageId;
    public    $callbackChatId ;
    public    $callbackData ;

    //inline properties
    public $inlineMessageObject;
    public $inlineMessageChatId ;
    public $inlineMessageId ;
    public $inlineMessageQuery ;

    public function setToken()
    {
        $this->token = Config::get('app.TOKEN');
    }

    public function getToken()
    {
        return $this->token = Config::get('app.TOKEN');
    }

    public function setApiUrl()
    {
        $this->api_url = Config::get('app.API_URL') . Config::get('app.TOKEN') . '/';
    }

    public function setContent()
    {
        $content = file_get_contents('php://input');
        $this->content = $content ? json_decode($content, true) : null;
    }

    public function getContent()
    {
        $content = file_get_contents('php://input');
        return $this->content;
    }

    public function setUserChatId()
    {
        if ($this->content) {
            $this->userChatId = ($this->content)['message']['from']['id'];
        } else {
            return false;
        }
    }

    public function getUserChatId()
    {
        return $this->userChatId;
    }

    public function setUserFirstName()
    {
        if ($this->content) {
            $this->userFirstName = ($this->content)['message']['from']['first_name'];
        } else {
            return false;
        }
    }

    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    public function setUsername()
    {
        if ($this->content) {
            $this->username = ($this->content)['message']['from']['username'];
        } else {
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUserIsBot()
    {
        if ($this->content) {
            $this->userIsBot = ($this->content)['message']['from']['is_bot'];
        } else {
            return false;
        }
    }

    public function getUserIsBot()
    {
        return $this->userIsBot;
    }

    public function setMessageText()
    {
        if ($this->content) {
            $this->messageText = ($this->content)['message']['text'];
        } else {
            return false;
        }
    }

    public function getMessageText()
    {
        return $this->messageText;
    }

    public function setMessageId()
    {
        $this->messageId = ($this->content)['message']['message_id'];
    }

    public function getMessageId()
    {
        return $this->messageId;
    }
    public function setChatDate()
    {
        if ($this->content) {
            $this->chatDate = ($this->content)['message']['date'];
        } else {
            return false;
        }
    }

    public function getChatDate()
    {
        return $this->chatDate;
    }

    public function setChatType()
    {
        if ($this->content) {
            $this->chatType = ($this->content)['message']['chat']['type'];
        } else {
            return false;
        }
    }

    public function getChatType()
    {
        return $this->chatType;
    }

    public function setReplyToMessage()
    {
        if (array_key_exists('reply_to_message', $this->content['message'])) {
            $this->replyToMessageObject = (object) $this->content['message']['reply_to_message'];
        }
    }

    public function getReplyToMessageObject()
    {
        return $this->replyToMessageObject;
    }

    public function setPhotoInfo()
    {
        if (array_key_exists('photo', $this->content['message'])) {
            $this->photoObject = (object) $this->content['message']['photo'][0];
            $this->photoFileId = $this->content['message']['photo'][0]['file_id'];
            $this->photoFileUniqueId = $this->content['message']['photo'][0]['file_unique_id'];
            $this->photoSize = $this->content['message']['photo'][0]['file_size'];
        }
    }
    public function getPhotoFileId()
    {
        return $this->photoFileId;
    }
    public function getPhotoFileUniqueId()
    {
        return $this->photoFileUniqueId;
    }
    public function getPhotoObject()
    {
        return $this->photoObject;
    }
    public function getPhotoSize()
    {
        return $this->photoSize;
    }

    public function setForwardFromChat()
    {
        if (array_key_exists('forward_from_chat', $this->content['message'])) {
            $this->forwardFromChatObject = (object) $this->content['message']['forward_from_chat'];
        }
    }

    public function getForwardFromChatObject()
    {
        return $this->forwardFromChatObject;
    }

    public function setVoiceObject()
    {
        if (array_key_exists('voice', $this->content['message'])) {

            $this->voiceObject = (object) $this->content['message']['voice'];
        }
    }

    public function setDucumentObject()
    {
        if (array_key_exists('document', $this->content['message'])) {

            $this->documentObject = (object) $this->content['message']['document'];
        }
    }

    public function setMusicObject()
    {
        if (array_key_exists('audio', $this->content['message'])) {
            $this->musicObject = (object) $this->content['message']['audio'];
        }
    }

    public function setvideoObject()
    {
        if (array_key_exists('video', $this->content['message'])) {
            $this->videoObject = (object) $this->content['message']['video'];
        }
    }

    public function setCallbackObject()
    {
        if (array_key_exists('callback_query', $this->content)) {
            $this->callbackObject = (object) $this->content['callback_query'];
            $this->callbackId =  $this->content['callback_query']['id'];
            $this->callbackMessage = $this->content['callback_query']['message'];
            $this->callbackPvId = $this->content['callback_query']['message']['from']['id'];
            $this->callbackMessageText = $this->content['callback_query']['message']['text'];
            $this->callbackMessageId = $this->content['callback_query']['message']['message_id'];
            $this->callbackChatId =  $this->content['callback_query']['message']['chat']['id'];
            $this->callbackData = $this->content['callback_query']['data'];
        }
    }

    public function setInlineMessage()
    {
        if (array_key_exists('inline_query', $this->content)) {
            $this->inlineMessageObject = (object) $this->content['inline_query'];
            $this->inlineMessageChatId =  $this->content['inline_query']['from']['id'];
            $this->inlineMessageId =  $this->content['inline_query']['id'];
            $this->inlineMessageQuery =  $this->content['inline_query']['query'];
        }
    }

    public function init()
    {
        $this->setToken();
        $this->setApiUrl();
        $this->setContent();

        if (isset($this->content['message'])) {
            $this->setMessageId();
            $this->setUserChatId();
            $this->setUserFirstName();
            $this->setUsername();
            $this->setUserIsBot();
            $this->setMessageText();
            $this->setChatDate();
            $this->setChatType();
            $this->setReplyToMessage();
            $this->setPhotoInfo();
            $this->setForwardFromChat();
            $this->setVoiceObject();
            $this->setDucumentObject();
            $this->setVoiceObject();
            $this->setMusicObject();
        }
        if (isset($this->content['callback_query'])) {
            $this->setCallbackObject();
        }
        if (isset($this->content['inline_query'])) {
            $this->setInlineMessage();
        }

    }

}
