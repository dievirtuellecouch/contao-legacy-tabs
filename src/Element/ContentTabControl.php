<?php

namespace Websailing\TabControlBundle\Element;

use Contao\ContentElement;

class ContentTabControl extends ContentElement
{
    protected $strTemplate = 'ce_tabcontrol';

    protected function compile(): void
    {
        $tabs = [];
        $titles = [];
        $rawTabs = $this->tab_tabs ?? null;
        $rawTitles = $this->tabTitles ?? null;

        $tryDecode = function($val) {
            if ($val === null) return null;
            if (is_string($val)) {
                $tmp = @unserialize($val);
                if ($tmp !== false || $val === 'b:0;') return $tmp;
            }
            return null;
        };

        $tabs = $tryDecode($rawTabs) ?: [];
        $titles = $tryDecode($rawTitles) ?: [];

        $items = [];
        if (is_array($tabs)) {
            foreach ($tabs as $idx => $content) {
                $items[] = [
                    'title' => $titles[$idx] ?? ('Tab '.($idx+1)),
                    'content' => is_string($content) ? $content : '',
                ];
            }
        }

        $this->Template->items = $items;
        $this->Template->hasItems = count($items) > 0;
    }
}

