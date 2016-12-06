# nr-challenge

Repositório contendo desafio de desenvolvimento de um web crawler

##Configuração do Ambiente (Windows)

###Ambiente PHP

É necessário setar um ambiente de desenvolvimento PHP, contendo Apache e PHP, minimamente.
Pode-se utilizar pacotes de instalação como WAMP: http://www.wampserver.com/en/ que já 
são mais fáceis de se instalar e configurar.
Verifique se o mod_rewrite está habilitado no Apache, precisaremos dele habilitado posteriormente.
Para habilitar, caso não esteja habilitado, o arquivo _httpd.conf_ deve conter a seguinte linha ativa:

```
LoadModule rewrite_module modules/mod_rewrite.so
```

###Obter uma cópia do repositório

O passo seguinte é obter um clone do repositório nr-challenge, pode-se fazer isso diretamente
do GitHub ou utilizando alguma ferramenta (SourceTree, por exemplo). Após isso deve-se fazer com 
que o servidor apache aponte para a pasta contendo os arquivos que foram obtidos do repositório.

###Instalar o Composer

Para instalar o Composer pode-se seguir o passo a passo contido em: https://getcomposer.org/doc/00-intro.md
Ponto mais importante, baixar o instalador que já faz a configuração do PATH após a instalação:
https://getcomposer.org/Composer-Setup.exe

###Instalar o Laravel

Já para a instalação do Laravel basta seguir o tutorial contido em: https://laravel.com/docs/5.3/installation.
Utilizaremos o Composer para instalar o Laravel, para tanto utilize o comando:

```
composer global require "laravel/installer"
```
Após isso o ambiente já está configurado e o sistema funcional.

##Utilização do Crawler

Foram implementadas buscas de informações em duas das páginas sugeridas:

* http://www.sebrae.com.br/canaldofornecedor
* https://www.compras.df.gov.br/publico/em_andamento.asp

Para executar o crawler em cada um dos sites basta acessar os caminhos:

```
localhost/nr-challenge/public/sebrae
localhost/nr-challenge/public/gdf
```
