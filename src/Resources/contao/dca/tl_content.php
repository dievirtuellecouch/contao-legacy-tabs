<?php

// Palette for legacy tabcontrol
$GLOBALS['TL_DCA']['tl_content']['palettes']['tabcontrol'] = '{type_legend},type,headline;{legacy_legend},tableitems,tabType,tabClasses,tabBehaviour,tab_autoplay_autoSlide,tab_autoplay_fade,tab_autoplay_delay,tabControlCookies,tab_tabs,tab_template,tab_template_start,tab_template_stop,tab_template_end,tab_remember,tabTitles;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// Field definitions relevant for the tabcontrol element
$tabFields = [
    'tableitems'             => "mediumblob NULL",
    'tabType'                => "varchar(32) NOT NULL default ''",
    'tabClasses'             => "varchar(255) NOT NULL default ''",
    'tabBehaviour'           => "varchar(64) NOT NULL default ''",
    'tab_autoplay_autoSlide' => "char(1) NOT NULL default '0'",
    'tab_autoplay_fade'      => "char(1) NOT NULL default '0'",
    'tab_autoplay_delay'     => "int(10) NOT NULL default '2500'",
    'tabControlCookies'      => "varchar(128) NOT NULL default ''",
    'tab_tabs'               => "blob NULL",
    'tab_template'           => "varchar(64) NOT NULL default ''",
    'tab_template_start'     => "varchar(64) NOT NULL default ''",
    'tab_template_stop'      => "varchar(64) NOT NULL default ''",
    'tab_template_end'       => "varchar(64) NOT NULL default ''",
    'tab_remember'           => "char(1) NOT NULL default ''",
    'tabTitles'              => "blob NULL",
];

foreach ($tabFields as $name => $sql) {
    $GLOBALS['TL_DCA']['tl_content']['fields'][$name] = [
        'label' => [$name, ''],
        'exclude' => true,
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50'],
        'sql' => $sql,
    ];
}

