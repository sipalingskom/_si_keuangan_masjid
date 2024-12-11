<?php

use Filament\Pages\Auth\EditProfile as AuthEditProfile;

class EditProfile extends AuthEditProfile
{
    public static function getLabel(): string
    {
        return 'Pengaturan Akun';
    }
}
