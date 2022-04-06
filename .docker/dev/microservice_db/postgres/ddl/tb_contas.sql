-- auto-generated definition
create table tb_contas
(
    conta_id                     bigserial
        constraint tb_contas_pkey
            primary key,
    conta_razao_social           varchar(255) not null,
    conta_cnpj                   varchar(255) not null,
    conta_email                  varchar(255),
    conta_telefone               varchar(255),
    conta_logradouro             varchar(255),
    conta_logradouro_numero      varchar(255),
    conta_logradouro_complemento varchar(255),
    conta_status                 smallint     not null,
    data_insercao                timestamp(0) not null,
    data_manutencao              timestamp(0) not null
);

alter table tb_contas
    owner to "user";
