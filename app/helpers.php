<?php

use Illuminate\Support\Facades\Date;

function setActivo($nombreRuta){
        return request()->routeIs($nombreRuta) ? 'c-navbar__link--active' : '';
    }

    function fechaActual($formatString){
        return date($formatString);
    }
