create database db_swcpa default character set utf8 collate utf8_general_ci;
use db_swcpa;

create table arquivo_morto(
  id_arquivo_morto int not null auto_increment,
  nome_arquivo_morto varchar(200) not null,
  primary key (id_arquivo_morto)
);

create table aluno(
  id_aluno int not null auto_increment,
  id_arquivo_morto int not null,
  num_aluno int not null,
  cpf_aluno varchar(11),
  data_nascimento_aluno date not null,
  nome_aluno varchar(200) not null,
  nome_mae_aluno varchar(200) not null,
  observacao_aluno varchar(1000),
  primary key (id_aluno),
  constraint fk_id_arquivo_morto foreign key (id_arquivo_morto) references arquivo_morto (id_arquivo_morto)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

create table usuarios(
  id int not null auto_increment,
  cpf varchar(11) not null,
  senha varchar(200)not null,
  primary key (id)
);

insert into usuarios (cpf, senha) values('96319631287', '487755c88d8465843665683f5f61b017');

-- INNER JOINS
select nome_arquivo_morto, num_aluno, cpf_aluno, data_nascimento_aluno, nome_aluno, nome_mae_aluno, observacao_aluno order by nome_arquivo_morto, nome_aluno from arquivo_morto inner join aluno on arquivo_morto.id_arquivo_morto = aluno.id_arquivo_morto
where nome_arquivo_morto = 'A2';
