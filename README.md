# Projeto De Engenharia de Software 2021/06
![header](https://user-images.githubusercontent.com/38620899/106385660-2de04b00-63b0-11eb-9747-843cdc397c76.PNG)

> Status: Em Desenvolvimento ⚠️

### Uma Aplicação Web criada para a aula de Engenharia de Software da Fatec de Cruzeiro 

## Tecnologias Usadas:

⚠️ NECESSÁRIO TER DOCKER & DOCKER COMPOSE INSTALADO.

## Tecnologias Usadas:

<table>
  <tr>
    <td>PHP</td>
    <td>Laravel</td>
    <td>Composer</td>
    <td>MySql</td>
    <td>Laradock</td>
  </tr>
  <tr>
    <td>v7.3.31</td>
    <td>v8.63.0</td>
    <td>2.1.9</td>
    <td>5.7</td>
    <td>v12.1</td>
  </tr>
</table>

## Como rodar a Aplicação?  :

1) Entrar na Pasta do Laradock
2) copiar o arquivo <b>.env.example</b> e colar com o nome <b>.env</b>
3) rodar o comando <br> * [<b>WINDOWS : docker-compose up -d nginx mysql phpmyadmin </b>] <br> * [<b>LINUX : $ sudo docker-compose up -d nginx mysql phpmyadmin </b>]
4) Assim que os containers terem terminado de *buildar* , rode o comando <br> docker-compose exec workspace bash
5) Voce estará dentro do ambiente virtual, entre na pasta do projeto rodando o comando: <br> <b> cd RedRocketStore/ </b>
6) Dentro da pasta do projeto no ambiente virtual, voce fará a configuração do laravel, rode os comandos:: .
7) cp .env.example .env
8) composer install --no-scripts
9) php artisan config:clear
10) php artisan cache:clear
11) php artisan key:generate


