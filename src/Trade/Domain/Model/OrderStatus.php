<?php

namespace App\Trade\Domain\Model;

enum OrderStatus {
    case Pending;
    case Accepted;
    case Refused;
    case Processing;
    case FailedProcessing;
    case Delivering;
    case FailedDelivery;
    case Complete;
}