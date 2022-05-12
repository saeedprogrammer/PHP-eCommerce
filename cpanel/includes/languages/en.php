<?php

static $localize =
[
    "welcome_msg" => "Hello",
    "Home" => "Home",
];

function lang($phrase)
{
    global $localize;
    return $localize[$phrase];
}
?>