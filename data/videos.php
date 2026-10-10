<?php
// Add work here: one row = one card. 'v' = vertical (9:16), 'h' = horizontal (16:9)
$w = fn($k, $t, $o = 'h') => ['title' => $t, 'video' => "stream.php?f=$k", 'poster' => "assets/posters/$k.jpg", 'orient' => $o];
return [
    'trailers' => [
        $w('trailers-1', 'Actualize Visuals Trailer'),
        $w('trailers-2', 'Dharma Dank Trailer'),
        $w('trailers-3', 'DJ Eliza May Trailer'),
        $w('trailers-4', 'Marc Trailer'),
    ],
    'lfv' => [
        $w('lfv-1', 'California\'s $34 Million Nonprofit Scandal'),
        $w('lfv-2', 'DJ Eliza May: I Lost My Sister & It Took 30 Years To Heal'),
        $w('lfv-3', 'GRiZ\'s Stage Manager: How I Almost Ruined a Concert'),
        $w('lfv-4', 'I Gave My Employees Bigger Bonuses Than Raises'),
        $w('lfv-5', 'The Dark Reality Behind Mexico\'s Declining Murder Rates'),
        $w('lfv-6', 'Why California\'s Independent Redistricting Is Being Destroyed'),
    ],
    'shorts' => [
        $w('shorts-1', 'Anuj', 'v'),
        $w('shorts-2', 'CEO Owns His Biggest Failures', 'v'),
        $w('shorts-3', 'Fastest Way To Pay Your Mortgage', 'v'),
        $w('shorts-4', 'How To Stop Being A Victim', 'v'),
        $w('shorts-5', 'Jackson', 'v'),
        $w('shorts-6', 'Mastering Your Thoughts Is The Key To Healing', 'v'),
        $w('shorts-7', 'Russia\'s Next Era Will Destroy Us', 'v'),
        $w('shorts-8', 'Safe Seats, Lazy Politicians', 'v'),
        $w('shorts-9', 'Strait and the Market', 'v'),
        $w('shorts-10', 'Why She Was Recruited to Change Civil Rights', 'v'),
    ],
];
