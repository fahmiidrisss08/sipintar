<?php

class ErrorMessage
{
    public static function show($code=-1)
    {
        $messageLists=[
            Constants::E_UNKNOWN=>"Unknown",
            Constants::E_SUCCESS=>"Success",
            Constants::E_VIRTUAL_ACCOUNT_NOT_EXISTS=>"Virtual Account tidak ada",
            Constants::E_INVALID_APPLICATION=>"Aplikasi tidak terdaftar",
            Constants::E_TOKEN_INVALID=>"Token tidak valid",
            Constants::E_TOKEN_EXPIRED=>"Token kadaluarsa",
            Constants::E_USER_NOT_EXISTS=>"User tidak ada",
            Constants::E_INVALID_PASSWORD=>"Password tidak valid",
            Constants::E_DATABASE=>"Database Error",
            Constants::E_YEAR_INVALID=>"TahunPenyaluran tidak ada",
            Constants::E_DATA_NOT_FOUND=>"Data tidak ada",
            Constants::E_GENERIC=>"Generic",
            Constants::E_USER_INACTIVE=>"User tidak aktif",
            Constants::E_INVALID_REGISTRATION_ID=>"ID Registrasi tidak ada",
        ];
        return !empty($messageLists[$code])? $messageLists[$code]: $messageLists[Constants::E_UNKNOWN];
    }
}