create table  `user` (
    `id` int(11)  not null primary key auto_increment ,
    `firstname` varchar(150) not null ,
    `lastname` varchar(200) not null ,
    `email` varchar(180) not null ,
    `phonen_umber` int(11) not null ,
    `addres` varchar(300) not null ,
    `create_at` timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

commit ;