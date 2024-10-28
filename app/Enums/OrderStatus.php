<?php


namespace App\Enums;

enum OrderStatus : string {
    case ORDERED = 'ordered';
    case DONE = 'done';
    case CANCEL = 'cancel';
    case PENDING = 'pending';
}
