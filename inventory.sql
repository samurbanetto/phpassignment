create database inventory;

create table Items (
    item_id serial primary key,
    item_name varchar(100) not null,
    item_format varchar(10) not null,
    item_qnt int not null,
    item_price numeric(6,2)
)

insert into Items (item_name, item_qnt, item_price) values
    ('David Bowie - The Rise And Fall Of Ziggy Stardust And The Spiders From Mars (2012 Remaster)', 'CD', 4, 14.99), 
    ('Candlemass - Epicus Doomicus Metallicus', 'LP', 1, 59.99), 
    ('Tyler, The Creator - IGOR', 'CD', 12, 14.99), 
    ('Queens Of The Stone Age - Songs For The Deaf', 'LP', 2, 39.99);