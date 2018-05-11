CREATE DATABASE champions_maker;

USE champions_maker;

CREATE TABLE usuario (
  id int primary key,
  nome varchar(100),
  usuario varchar(50),
  senha varchar(50),
  email varchar(100)
) ENGINE=InnoDB;

CREATE TABLE campeonato (
  id int primary key,
  nome varchar(100),
  tipo int,
  id_usuario int,
  foreign key (id_usuario) references usuario(id)
) ENGINE=InnoDB;

CREATE TABLE times(
  id int primary key,
  nome varchar(100)
) ENGINE=InnoDB;

CREATE TABLE participa(
  id_campeonato int,
  foreign key (id_campeonato) references campeonato(id),
  id_time int,
  foreign key (id_time) references times(id),
  primary key (id_campeonato, id_time)
) ENGINE=InnoDB;

CREATE TABLE jogador(
  id int primary key,
  nome varchar(100)
) ENGINE=InnoDB;

CREATE TABLE faz_parte (
  id_time int,
  foreign key (id_time) references times(id),
  id_jogador int,
  foreign key (id_jogador) references jogador(id),
  primary key (id_time, id_jogador)
) ENGINE=InnoDB;

CREATE TABLE mata_mata (
  id_campeonato int primary key,
  foreign key (id_campeonato) references campeonato(id)
) ENGINE=InnoDB;

CREATE TABLE suico (
  id_campeonato int primary key,
  foreign key (id_campeonato) references campeonato(id)
) ENGINE=InnoDB;

CREATE TABLE grupos (
  id int,
  id_campeonato int,
  foreign key (id_campeonato) references campeonato(id),
  primary key (id)
) ENGINE=InnoDB;

CREATE TABLE pontuacao (
  id_grupo int,
  id_time int,
  pontos int,
  primary key (id_grupo, id_time),
  foreign key (id_time) references times(id),
  foreign key (id_grupo) references grupos(id)
) ENGINE=InnoDB;

CREATE TABLE chaves (
  id_campeonato int,
  foreign key (id_campeonato) references campeonato(id),
  tipo int,
  time1 int,
  time2 int,
  vencedor int,
  id int,
  primary key (id_campeonato, id)
) ENGINE=InnoDB;
CREATE TABLE partidas (
  id_campeonato int,
  foreign key (id_campeonato) references campeonato(id),
  id int,
  tipo int,
  time1 int,
  time2 int,
  ponto1 int,
  ponto2 int,
  primary key (id_campeonato, id)
) ENGINE=InnoDB;