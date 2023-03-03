<?php

return [
  "login" => [
    "controller" => "auth",
    "action" => "login"
  ],
  "login/signin" => [
    "controller" => "auth",
    "action" => "signIn"
  ],
  "register" => [
    "controller" => "auth",
    "action" => "register"
  ],
  "register/signup" => [
    "controller" => "auth",
    "action" => "signUp"
  ],
  "" => [
    "controller" => "news",
    "action" => "news"
  ],
  "news" => [
    "controller" => "news",
    "action" => "news"
  ],
  "news/addpost" => [
    "controller" => "news",
    "action" => "addpost"
  ],
  "news/logout" => [
    "controller" => "news",
    "action" => "logout"
  ],
  "news/deletepost/{id:\d+}" => [
    "controller" => "news",
    "action" => "deletepost"
  ],
  "news/editpost/{id:\d+}" => [
    "controller" => "news",
    "action" => "editpost"
  ],
  "news/post/{id:\d+}" => [
    "controller" => "news",
    "action" => "post"
  ],
  "comments/{id:\d+}" => [
    "controller" => "comments",
    "action" => "comments"
  ],
  "comments/addcomment/{id:\d+}" => [
    "controller" => "comments",
    "action" => "addcomment"
  ],
  "comments/deletecomment/{id:\d+}" => [
    "controller" => "comments",
    "action" => "deletecomment"
  ],
  "comments/commentPage/{id:\d+}" => [
    "controller" => "comments",
    "action" => "commentPage"
  ],
  "comments/editComment/{id:\d+}" => [
    "controller" => "comments",
    "action" => "editComment"
  ]
];