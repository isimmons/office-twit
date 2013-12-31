<?php

/**
* Returns the correct nav links based on authentication
* 
* @return array
*/
function getNavLinks()
{
    $navLinks = [
        'Twits' => '/twits',
        'Profile' => '/profile',
        'Users' => '/users'
    ];

    if(Auth::check())
    {
        $links = null;
        foreach ($navLinks as $text => $link) {
            $links .= "<li><a href={$link}>{$text}</a></li>";
        }
        return $links;
    }

    return null;
}

