<?php

namespace Tinybot\Core;

trait Attributes{
    
    public function is_anonymous(bool $is_anonymous)
    {
        if (in_array('is_anonymous', $this->allowableMethods[$this->method])) {
            $this->parameters['is_anonymous'] = $is_anonymous;
        }
        return $this;
    }
    public function type(string $type='quiz')
    {
        if (in_array('type', $this->allowableMethods[$this->method])) {
            $this->parameters['type'] = $type;
        }
        return $this;
    }
    public function allows_multiple_answers(bool $allows_multiple_answers)
    {
        if (in_array('allows_multiple_answers', $this->allowableMethods[$this->method])) {
            $this->parameters['allows_multiple_answers'] = $allows_multiple_answers;
        }
        return $this;
    }
    public function correct_option_id(int $correct_option_id = 0)
    {
        if (in_array('correct_option_id', $this->allowableMethods[$this->method])) {
            $this->parameters['correct_option_id'] = $correct_option_id;
        }
        return $this;
    }

    public function explanation(string $explanation )
    {
        if (in_array('explanation', $this->allowableMethods[$this->method])) {
            $this->parameters['explanation'] = $explanation;
        }
        return $this;
    }



    public function open_period(int $open_period )
    {
        if (in_array('open_period', $this->allowableMethods[$this->method])) {
            $this->parameters['open_period'] = $open_period;
        }
        return $this;
    }
    public function text( string $text)
    {
        if (in_array('text', $this->allowableMethods[$this->method])) {
            $this->parameters['text'] = $text;
        }
        return $this;
    }
    public function show_alert(bool $show_alert )
    {
        if (in_array('show_alert', $this->allowableMethods[$this->method])) {
            $this->parameters['show_alert'] = $show_alert;
        }
        return $this;
    }
  
    public function url(string $url )
    {
        if (in_array('url', $this->allowableMethods[$this->method])) {
            $this->parameters['url'] = $url;
        }
        return $this;
    }
    public function close_date(int $close_date)
    {
        if (in_array('close_date', $this->allowableMethods[$this->method])) {
            $this->parameters['close_date'] = $close_date;
        }
        return $this;
    }
    public function is_closed(bool $is_closed )
    {
        if (in_array('is_closed', $this->allowableMethods[$this->method])) {
            $this->parameters['is_closed'] = $is_closed;
        }
        return $this;
    }

    public function duration(int $duration)
    {
        if (in_array('duration', $this->allowableMethods[$this->method])) {
            $this->parameters['duration'] = $duration;
        }
        return $this;
    }
    public function length(int $length)
    {
        if (in_array('length', $this->allowableMethods[$this->method])) {
            $this->parameters['length'] = $length;
        }
        return $this;
    }
    public function limit(int $limit)
    {
        if (in_array('limit', $this->allowableMethods[$this->method])) {
            $this->parameters['limit'] = $limit;
        }
        return $this;
    }
    public function offset(int $offset)
    {
        if (in_array('offset', $this->allowableMethods[$this->method])) {
            $this->parameters['limit'] = $offset;
        }
        return $this;
    }


    public function emoji(string $emoji)
    {
        if (in_array('emoji', $this->allowableMethods[$this->method])) {
            $this->parameters['emoji'] = $emoji;
        }
        return $this;
    }


    public function height(int $height)
    {
        if (in_array('height', $this->allowableMethods[$this->method])) {
            $this->parameters['height'] = $height;
        }
        return $this;
    }


    public function width(int $width)
    {
        if (in_array('width', $this->allowableMethods[$this->method])) {
            $this->parameters['width'] = $width;
        }
        return $this;
    }

    public function performer(string $performer)
    {
        if (in_array('performer', $this->allowableMethods[$this->method])) {
            $this->parameters['performer'] = $performer;
        }
        return $this;
    }


    public function title(string $title)
    {
        if (in_array('title', $this->allowableMethods[$this->method])) {
            $this->parameters['title'] = $title;
        }
        return $this;
    }

    public function thumb($thumb)
    {
        if (in_array('thumb', $this->allowableMethods[$this->method])) {
            $this->parameters['thumb'] = $thumb;
        }
        return $this;
    }


    public function caption(string $text)
    {
        if (in_array('caption', $this->allowableMethods[$this->method])) {
            $this->parameters['caption'] = $text;
        }
        return $this;

    }

    public function disableWebPagePreview(bool $disableWebPagePreview)
    {
        if (in_array('disableWebPagePreview', $this->allowableMethods[$this->method])) {
            $this->parameters['disable_web_page_preview'] = $disableWebPagePreview;
        }
        return $this;
    }

    public function disableNotification(bool $disableNotification)
    {
        if (in_array('disableNotification', $this->allowableMethods[$this->method])) {
            $this->parameters['disable_notification'] = $disableNotification;
        }
        return $this;
    }

    public function protectContent(bool $protectContent)
    {
        if (in_array('protectContent', $this->allowableMethods[$this->method])) {
            $this->parameters['protect_content'] = $protectContent;
        }
        return $this;
    }

    public function replyToMessageId(int $replyToMessageId)
    {
        if (in_array('replyToMessageId', $this->allowableMethods[$this->method])) {
            $this->parameters['reply_to_message_id'] = $replyToMessageId;
        }
        return $this;
    }

    public function allowSendingWithoutReply(bool $allowSendingWithoutReply)
    {
        if (in_array('allowSendingWithoutReply', $this->allowableMethods[$this->method])) {
            $this->parameters['allow_sending_without_reply'] = $allowSendingWithoutReply;
        }
        return $this;
    }
    public function parseMode(string $parseMode = 'HTML')
    {
        if (in_array('parseMode', $this->allowableMethods[$this->method])) {
            $this->parameters['parse_mode'] = $parseMode;
        }
        return $this;
    }

    public function ReplyKeyboardMarkup(array $buttons, bool $one_time_keyboard = false)
    {
        if (in_array('ReplyKeyboardMarkup', $this->allowableMethods[$this->method])) {
            $this->parameters['reply_markup'] = [];
            $this->parameters['reply_markup'] = [
                'resize_keyboard' => true,
                'one_time_keyboard' => $one_time_keyboard,
                'keyboard' => $buttons,
            ];
        }
        return $this;
    }



    public function  InlineKeyboardMarkup(array $buttonsArray = [])
    {
        if (in_array('InlineKeyboardMarkup', $this->allowableMethods[$this->method])) {
            $this->parameters['reply_markup'] = [
               
                'inline_keyboard' => $buttonsArray,
            ];
        }
        return $this;
    }



    public function ReplyKeyboardRemove()
    {
        if (in_array('ReplyKeyboardRemove', $this->allowableMethods[$this->method])) {
            $this->parameters['reply_markup'] = [];
            $this->parameters['reply_markup'] = [
                'remove_keyboard' => true,
            ];
        }
        return $this;
    }

    public function ForceReply()
    {
        if (in_array('ForceReply', $this->allowableMethods[$this->method])) {
            $this->parameters['reply_markup'] = [];
            $this->parameters['reply_markup'] = [
                'force_reply' => true,
            ];
        }
        return $this;
    }

        //Inline mode

        public function cache_time(int $cache_time)
        {
            if (in_array('cache_time', $this->allowableMethods[$this->method])) {
                $this->parameters['cache_time'] = $cache_time;
            }
            return $this;
        }    public function is_personal(bool $is_personal)
        {
            if (in_array('is_personal', $this->allowableMethods[$this->method])) {
                $this->parameters['is_personal'] = $is_personal;
            }
            return $this;
        }    public function next_offset(string $next_offset)
        {
            if (in_array('next_offset', $this->allowableMethods[$this->method])) {
                $this->parameters['next_offset'] = $next_offset;
            }
            return $this;
        }    public function switch_pm_text(string $switch_pm_text)
        {
            if (in_array('switch_pm_text', $this->allowableMethods[$this->method])) {
                $this->parameters['switch_pm_text'] = $switch_pm_text;
            }
            return $this;
        }    public function switch_pm_parameter(string $switch_pm_parameter)
        {
            if (in_array('switch_pm_parameter', $this->allowableMethods[$this->method])) {
                $this->parameters['switch_pm_parameter'] = $switch_pm_parameter;
            }
            return $this;
        }

}