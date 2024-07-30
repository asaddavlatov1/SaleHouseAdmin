<?php

return [
    'UserStatus'  => [
        'active' => 'Активный',
        'block'  => 'Заблокированный',
    ],
    'RoleEnum'    => [
        'super_admin' => 'Супер админ',
        'admin'       => 'Админ',
        'manager'     => 'Менеджер',
        'seller'      => 'Продавец',
        'owner'       => 'Владелец',
    ],
    'ActionType'  => [
        'income'  => 'Приход',
        'outcome' => 'Расход',
    ],
    'ReasonType'  => [
        'chef_one_star'         => 'Шефу поставили одну звезду',
        'waiter_one_star'       => 'Официанту присвоена одна звезда',
        'restaurant_one_star'   => 'Ресторану присвоена одна звезда',
        'chef_two_star'         => 'Шеф-повар удостоен двух звезд',
        'waiter_two_star'       => 'Официанту присвоены две звезды',
        'restaurant_two_star'   => 'Ресторану присвоены две звезды',
        'chef_three_star'       => 'Шеф-повар удостоен трех звезд',
        'waiter_three_star'     => 'Официанту присвоены три звезды',
        'restaurant_three_star' => 'Ресторану присвоено три звезды',
        'chef_four_star'        => 'Шеф-повар получил четыре звезды',
        'waiter_four_star'      => 'Официанту присвоено четыре звезды',
        'restaurant_four_star'  => 'Ресторану присвоено четыре звезды',
        'chef_five_star'        => 'Шеф-повар получил пять звезд',
        'waiter_five_star'      => 'Официанту поставили пять звезд',
        'restaurant_five_star'  => 'Ресторану присвоено пять звезд',
    ],
    'OrderStatus' => [
        'in_progress' => 'В процессе',
        'done'        => 'Завершен',
        'reject'      => 'Отклонен',
    ],
    'SettingType' => [
        'sms_service' => 'СМС сервис',
    ],
];
