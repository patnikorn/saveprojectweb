<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Product extends Model implements Commentable
{
    use HasComments;

    // ...
}
