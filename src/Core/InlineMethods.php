<?php
namespace Tinybot\Core;

trait InlineMethods
{

    public function answerInlineQuery($inline_query_id, array $results )
    {
        $this->method = 'answerInlineQuery';
        $this->parameters['inline_query_id'] = $inline_query_id;
        $this->parameters['results'] = $results;
        return $this;
    }


}