<?php

static $localize =
[
    "welcome_msg" => "أهلا"
];

function lang($phrase)
{
    global $localize;
    return $localize[$phrase];
}
?>