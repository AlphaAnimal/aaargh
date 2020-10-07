<?php

    // EXPRESIONES REGULARES
    $letras = '/^[A-Za-z" "áéíóúñÁÉÍÓÚ-]{2,20}$/';
    $telefono = '/^[0-9]{9}$/';
    $postal = '/^[0-9]{5}$/';
    $annexos = '/^[0-9]{2}$/';
    $email = '/^[a-zA-Z0-9áéíóúÁÉÚÍÓñÑ._-]{1,40}@[a-zA-Záéíóúñ-]{2,20}\.[a-zA-Záéíóúñ]{2,10}(\.[a-zA-Záéíóúñ]{2,10})?$/';
    $password = '/^(?=.*[a-z])((?=.*\W|)|(?=.*[_]))(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9\W_]{8,16}$/';
    $web = '/^https:\/\//';

    // PROVINCIAS LISTADAS POR CÓDIGO POSTAL
    $provincias = [];
    $provincias[01] = ["Álava", "álava", "Alava", "alava"];
    $provincias[02] = ["Albacete", "albacete",];
    $provincias[03] = ["Alicante", "alicante",];
    $provincias[04] = ["Almería", "almería", "almeria", "Almeria"];
    $provincias[05] = ["Ávila", "ávila", "Avila", "avila"];
    $provincias[06] = ["Badajoz", "badajoz",];
    $provincias[07] = ["Baleares", "baleares",];
    $provincias[8] = ["Barcelona", "barcelona",];
    $provincias[9] = ["Burgos", "burgos",];
    $provincias[10] = ["Cáceres", "Caceres", "cáceres", "caceres"];
    $provincias[11] = ["Cádiz", "Cadiz", "cádiz", "cadiz"];
    $provincias[12] = ["Castellón", "Castellon", "castellón", "castellon"];
    $provincias[13] = ["Ciudad Real", "ciudad real",];
    $provincias[14] = ["Córdoba", "córdoba", "Cordoba", "cordoba"];
    $provincias[15] = ["A Coruña", "a coruña", "A coruña"];
    $provincias[16] = ["Cuenca", "cuenca",];
    $provincias[17] = ["Girona", "girona",];
    $provincias[18] = ["Granada", "granada",];
    $provincias[19] = ["Guadalajara", "guadalajara",];
    $provincias[20] = ["Gipuzkoa", "gipuzkoa", "Gipúzkoa", "gipúzkoa", "Gipuzcoa", "gipuzcoa", "Gipúzcoa", "gipúzcoa", ];
    $provincias[21] = ["Huelva", "huelva",];
    $provincias[22] = ["Huesca", "huesca",];
    $provincias[23] = ["Jaén", "Jaen", "jaén", "jaen",];
    $provincias[24] = ["León", "leon", "Leon", "león",];
    $provincias[25] = ["Lérida", "lérida", "lerida", "Lerida", "Lleida", "lleida"];
    $provincias[26] = ["La Rioja", "la rioja", "la Rioja", "La rioja"];
    $provincias[27] = ["Lugo", "lugo",];
    $provincias[28] = ["Madrid", "madrid",];
    $provincias[29] = ["Málaga", "malaga", "málaga", "Malaga"];
    $provincias[30] = ["Murcia", "murcia",];
    $provincias[31] = ["Navarra", "navarra",];
    $provincias[32] = ["Ourense", "ourense",];
    $provincias[33] = ["Asturias", "asturias",];
    $provincias[34] = ["Palencia", "palencia",];
    $provincias[35] = ["Las Palmas", "las palmas", "Las palmas", "las Palmas"];
    $provincias[36] = ["Pontevedra", "pontevedra",];
    $provincias[37] = ["Salamanca", "salamanca",];
    $provincias[38] = ["Santa Cruz de Tenerife", "Santa cruz de tenerife", "Santa Cruz de tenerife", "Santa cruz de Tenerife", "santa Cruz de tenerife", "santa cruz de Tenerife", "Santa Cruz De Tenerife", "santa cruz De Tenerife", "Tenerife", "tenerife",];
    $provincias[39] = ["Cantabria", "cantabria",];
    $provincias[40] = ["Segovia", "segovia",];
    $provincias[41] = ["Sevilla", "sevilla",];
    $provincias[42] = ["Soria", "soria",];
    $provincias[43] = ["Tarragona", "tarragona",];
    $provincias[44] = [ "Teruel", "teruel",];
    $provincias[45] = ["Toledo", "toledo",];
    $provincias[46] = ["Valencia", "valencia",];
    $provincias[47] = ["Valladolid", "valladolid",];
    $provincias[48] = ["Vizcaya", "vizcaya",];
    $provincias[49] = ["Zamora", "zamora",];
    $provincias[50] = ["Zaragoza", "zaragoza",];
    $provincias[51] = ["Ceuta", "ceuta",];
    $provincias[52] = ["melilla", "Melilla"];


