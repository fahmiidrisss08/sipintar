<?php
return [
  [
    "controller"=>"AuthController",
    "data"=>[
      [
        "method"=>"post",
        "path"=>"/auth/token",
        "action"=>"postToken",
        "checkAuth"=>false,
      ],
      [
        "method"=>"get",
        "path"=>"/auth/logout",
        "action"=>"getLogout",
        //"checkAuth"=>false,
      ],
    ],
  ],
  [
    "controller"=>"MainController",
    "data"=>[
      [ // Key Mandatory (Format: <Controller Name>-<Action>)
          "method"=>"get",
          "path"=>"/",
          "action"=>"index",
          "checkAuth"=>false,
      ],
      [
          "method"=>"get",
          "path"=>"/generate/{t}",
          "action"=>"generate",
          "checkAuth"=>false,
      ],
      [
          "method"=>"get",
          "path"=>"/sha512/{t}",
          "action"=>"sha512",
          "checkAuth"=>false,
        ],
      [
          "method"=>"get",
          "path"=>"/sha256/{t}",
          "action"=>"sha256",
          "checkAuth"=>false,
      ],
      [
          "method"=>"get",
          "path"=>"/doc",
          "action"=>"doc",
          "checkAuth"=>false,
        ],
      [
          "method"=>"get",
          "path"=>"/swagger.json",
          "action"=>"swagger",
          "checkAuth"=>false,
        ],
      [
          "method"=>"post",
          "path"=>"/time",
          "action"=>"getTime",
//          "checkAuth"=>false,
        ],
      ],
    ],
    [
      "controller"=>"BiodataController",
      "data"=>[
        [
          "method"=>"get",
          "path"=>"/biodata/view/{id}",
          "action"=>"getView",
          //"checkAuth"=>false,
        ],
      ],
    ],
  ];