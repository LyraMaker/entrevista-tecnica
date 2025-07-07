**Sumário**
- [1. Sync360 - Perfil](#1-sync360---perfil)
  - [1.1. Tecnologias em uso](#11-tecnologias-em-uso)
  - [1.2. Como usar o projeto](#12-como-usar-o-projeto)


# 1. Sync360 - Perfil

O sistema precisa atender os seguintes requisitos:

- [x] Exibição de informações do usuário, incluindo:
  * Imagem de perfil
  * Nome completo
  * Idade
  * Rua, bairro, estado
  * Biografia
- [x] Formulário para edição dos dados acima, com envio das alterações.
- [x] Salvar as informações em um banco de dados MySQL.
- [x] A aplicação deve ser responsiva, com boa aparência tanto em dispositivos móveis quanto em desktops.

## 1.1. Tecnologias em uso
| Tecnologia | Em prol de: |
|:----------:|-------------|
| <img src="https://wp.logos-download.com/wp-content/uploads/2016/09/PHP_logo.png" style="height:40px"> | Back-end, API, Rotas |
| <img src="https://static.vecteezy.com/system/resources/previews/053/066/792/non_2x/free-logo-bulma-free-png.png" style="height:40px"> | Layout do site |
| <img src="https://getcomposer.org/img/logo-composer-transparent.png" style="height:40px"> | Gerenciador de pacotes para projetos PHP |
| <img src="https://1000logos.net/wp-content/uploads/2020/08/Git-Logo.png" style="height:40px"> | Versionamento do projeto |

## 1.2. Como usar o projeto

Para iniciar o projeto basta você iniciar como ponto de partida do servidor a pasta **/public**, como no exemplo a seguir:

```powershell
php -S localhost:0 -t ./public
```

A base do sistema é esta:

```sql
CREATE TABLE USER(
user_code INT NOT NULL AUTO_INCREMENT, 
first_name TEXT NOT NULL,
second_name TEXT,
date_birth DATE,
street TEXT,
city TEXT,
neighborhood TEXT,
state TEXT,
description TEXT, 
profile_photo TEXT,
PRIMARY KEY(user_code));
```
Você precisará configurar o .env, seguindo o exemplo:

```env
DB_HOSTNAME =
DB_DATABASE =
DB_USERNAME =
DB_PASSWORD =
DB_DRIVER =

#Enviroments from project

project_title =
project_author =
project_since =
base_url =

```






