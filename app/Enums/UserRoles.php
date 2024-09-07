<?php

    namespace App\Enums;



    enum UserRoles : string {
        case ADMIN = 'admin';
        case CUSTOMER = 'customer';
        case SELLER = 'seller';
    }