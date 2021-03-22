CREATE DATABASE ecom;
USE ecom;

create table client (
    id INT(11) not null AUTO_INCREMENT,
    first_name VARCHAR(45),
    last_name VARCHAR(45) not null,
    email VARCHAR(45) not null UNIQUE,
    `password` VARCHAR(100) not null,
    phone VARCHAR(20),
    PRIMARY KEY (id)
);

create table `order` (
    id INT(11) not null AUTO_INCREMENT,
    id_client INT(11),
    paid tinyint(1),
    PRIMARY KEY (id),
    FOREIGN KEY (id_client) REFERENCES client(id)
);

CREATE TABLE category (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    PRIMARY KEY (id)
);

CREATE TABLE item (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    description TEXT,
    image VARCHAR(150),
    id_category INT(11),
    price FLOAT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_category) REFERENCES category(id)
);

CREATE TABLE content_order (
    id_order INT(11),
    id_item INT(11),
    quantity INT(11),
    PRIMARY KEY (id_order, id_item),
    FOREIGN KEY (id_order) REFERENCES `order`(id),
    FOREIGN KEY (id_item) REFERENCES item(id)   
);

CREATE TABLE payment_method (
    id INT(11) NOT NULL AUTO_INCREMENT,
    method VARCHAR(45),
    `value` VARCHAR(45),
    id_client INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (id_client) REFERENCES client(id)
);

create table ordered_item_snapshot (
    id INT(11) not null AUTO_INCREMENT,
    id_order int(11),
    name_item VARCHAR(45),
    price float,
    catgory varchar(45),
    quantity int(11),
    PRIMARY KEY (id),
    FOREIGN KEY (id_order) REFERENCES `order`(id)
);

create table payement(
    id INT(11) not null AUTO_INCREMENT,
    total_ht float,
    tva float,
    id_order int(11),
    id_payment_method int(11),
    PRIMARY KEY (id),
    FOREIGN KEY (id_payment_method) REFERENCES payment_method(id),
    FOREIGN KEY (id_order) REFERENCES `order`(id)
);