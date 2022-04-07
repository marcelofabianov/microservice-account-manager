# Proposta

Objetivo é criar uma proposta de arquitetura para microservices, onde é importante criar um contrato para garantir um padrão de entrada e saída de dados. A idéia inicial para este estudo foi da necessidade de utilizar banco de dados legados, sem uma padronização de campos e de produtos monolíticos com dificuldade de escalar.

## Projeto

Este projeto será realizar a construção de um microservico que irá contemplar o gerenciamento de cadastros de Conta, Usuários, Organizações, Permissões e etc...

## Organização

Este serviço está organizado em diretório isolados "módulos"

Os arquivos e diretórios do projeto devem seguir conforme descrito.

```
.
├── app                                 #   Diretório que terá todos os módulos
│   ├── Accounts                        #   Diretório Raiz do Módulo
│   │   ├── Business                    #   Diretório que irá conter as Regras de Negócio
│   │   ├── Data                        #   Camada que trabalha com os Dados
│   │   │   ├── Dto                     #   Diretório que irá conter os Dtos classes com objetivo de garantir uma estrutura de dados e seus tipos
│   │   │   ├── DtoTranslate            #   Diretório que irá conter Translates vão ajudar na padronização de nomes de campos de várias origem diferentes e legadas
│   │   │   ├── Enums                   #   Diretório para criação de Enums para representar conjuntos de informações condicionais "CASES"
│   │   │   ├── QueryFilters            #   Diretório com Classes que representação uma fração de uma query com objetivo de criar filtros reutilizaveis
│   │   │   ├── Repositories            #   Diretório de classes que utiliza de várias conexões para receber, persistir e criar queries de consulta.
│   │   ├── Http                        #   Camada de transporte de dados, receber, validar e dispachar
│   │   │   ├── Controllers             #   Recebe os dados, despacha para quem precisa e retorna a resposta
│   │   │   ├── Requests                #   Valida os dados que estão chegando conforme regras estabelecidas
│   │   │   ├── Resources               #   Recebe os dados e os devolve em JSON seguindo um layout padronizado
│   │   ├── Services                    #   Camada de serviço são classes responsáveis por encapsuar e executar ações.
│   │   ├── routes.php                  #   Mapeamento das rotas de para consumo dos endpoints do modulo

```
