CREATE TABLE `utilizador` (
	`id_utilizador` int(10) NOT NULL,
	`nome` VARCHAR(50) NOT NULL,
	`email` VARCHAR(30) NOT NULL,
	`password` VARCHAR(20) NOT NULL,

	PRIMARY KEY (`id_utilizador`)
);

CREATE TABLE `mensagem` (
	`id_mensagem` int(10) NOT NULL,
	`id_utilizador` int(10) NOT NULL,
	`mensagem` VARCHAR(255) NOT NULL,

	PRIMARY KEY (`id_mensagem`),
    FOREIGN KEY ("id_utilizador") REFERENCES utilizador("id_utilizador")

);

CREATE TABLE `notificacoes` (
	`id_notif` int(10) NOT NULL,
/*	`amizades` int(10) NOT NULL,*/
	`gostos` int(255) NOT NULL,
    `mensagens` VARCHAR(255) NOT NULL,

	PRIMARY KEY (`id_notif`)

);

CREATE TABLE `amizades` (
	`id_amizade` int(10) NOT NULL,
	`id_utilizador` int(10) NOT NULL,
	`id_pedidos` int(255) NOT NULL,


	PRIMARY KEY (`id_amizade`),
    FOREIGN KEY ("id_utilizador") REFERENCES utilizador("id_utilizador")

);

CREATE TABLE `publicacoes` (
	`id_pub` int(10) NOT NULL,
	`id_comentario` int(10) NOT NULL,
/*	`foto` int(255) NOT NULL,*/
    `descricao` VARCHAR(255) NOT NULL,
    `id_utilizador` int(10) NOT NULL,
    `likes` int(255) NOT NULL,
    `comentarios` VARCHAR(255) NOT NULL,


	PRIMARY KEY (`id_pub`),
    FOREIGN KEY ("id_utilizador") REFERENCES utilizador("id_utilizador"),
    FOREIGN KEY ("id_comentario") REFERENCES comentarios("id_comentario")

);


CREATE TABLE `comentarios` (
	`id_comentario` int(10) NOT NULL,
	`id_pub` int(10) NOT NULL,
    `id_utilizador` int(10) NOT NULL,
    `likes` int(255) NOT NULL,

	PRIMARY KEY (`id_comentario`),
    FOREIGN KEY ("id_pub") REFERENCES publicacoes("id_pub"),
    FOREIGN KEY ("id_utilizador") REFERENCES utilizador("id_utilizador")

);

CREATE TABLE `fotos` (
	`id_foto` int(10) NOT NULL,
	`num_likes` int(255) NOT NULL,
    `num_comentarios` int(255) NOT NULL,
    `id_comentario` int(255) NOT NULL,
    `id_utilizador` int(255) NOT NULL,

	PRIMARY KEY (`id_foto`),
    FOREIGN KEY ("id_comentario") REFERENCES comentarios("id_comentario"),
    FOREIGN KEY ("id_utilizador") REFERENCES utilizador("id_utilizador")

);

