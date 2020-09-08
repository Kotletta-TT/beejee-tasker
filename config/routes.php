<?php

return array(
    "^tasks/edit$" => "tasks/edit",
    "^tasks/add$" => "tasks/add",
    "^tasks/save$" => "tasks/save",
    "^tasks/index\??" => "tasks/index",
    "^tasks\??" => "tasks/index",
    "^login$" => "login/index",
    "logout$" => "login/logout",
    "^login/check$" => "login/check",
    "^add$" => "tasks/add",
    "^edit$" => "tasks/edit",
    "^\s*$|^\??" => "tasks/index"
);
