<?php
function getCourseIcon($course_name){
    switch ($course_name) {
        case 'Biologie':
            return '<i class="fa-regular fa-dna fa-3x text-success"></i>';
        case 'Chemie':
            return '<i class="fa-regular fa-flask-vial fa-3x text-success"></i>';
        case 'Deutsch':
            return '<i class="fa-regular fa-book fa-3x text-success"></i>';
        case 'Englisch':
            return '<i class="fa-regular fa-mug-tea fa-3x text-success"></i>';
        case 'Ethik':
            return '<i class="fa-regular fa-people-arrows fa-3x text-success"></i>';
        case 'Geographie':
            return '<i class="fa-regular fa-globe-europe fa-3x text-success"></i>';
        case 'Geschichte':
            return '<i class="fa-regular fa-scroll-old fa-3x text-success"></i>';
        case 'Kunst':
            return '<i class="fa-regular fa-palette fa-3x text-success"></i>';
        case 'Mathematik':
            return '<i class="fa-regular fa-calculator-simple fa-3x text-success"></i>';
        case 'Physik':
            return '<i class="fa-regular fa-bolt fa-3x text-success"></i>';
        case 'Spanisch':
            return '<i class="fa-regular fa-taco fa-3x text-success"></i>';
        case 'Sport':
            return '<i class="fa-regular fa-face-head-bandage fa-3x text-success"></i>';
        case 'Wirtschaft':
            return '<i class="fa-regular fa-money-bill-trend-up fa-3x text-success"></i>';
        case 'Französisch':
            return '<i class="fa-regular fa-baguette fa-3x text-success"></i>';
        case 'Latein':
            return '<i class="fa-regular fa-message-slash fa-3x text-success"></i>';
        case 'Russisch':
            return '<span class="fs-1 fw-bold text-success">UKR</span>';
        case 'Italienisch':
            return '<i class="fa-regular fa-pizza-slice fa-spin fa-3x text-success"></i>';
        case 'Griechisch':
            return '<i class="fa-regular fa-piggy-bank fa-3x text-success"></i>';
        case 'Sozialkunde':
            return '<i class="fa-regular fa-users fa-3x text-success"></i>';
        case 'Musik':
            return '<i class="fa-regular fa-music fa-3x text-success"></i>';
        case 'Evangelische Religion':
            return '<i class="fa-regular fa-bible fa-3x text-success"></i>';
        case 'Katholische Religion':
            return '<i class="fa-regular fa-bible fa-3x text-success"></i>';
        case 'Psychologie':
            return '<i class="fa-regular fa-head-side-brain fa-3x text-success"></i>';
        case 'Rechtskunde':
            return '<i class="fa-regular fa-gavel fa-3x text-success"></i>';
        case 'Technik':
            return '<i class="fa-regular fa-gears fa-3x text-success"></i>';
        case 'Informatik':
            return '<i class="fa-regular fa-display-code fa-3x text-success"></i>';
        default:
            return '<i class="fa-regular fa-graduation-cap fa-3x text-success"></i>';
    }
}