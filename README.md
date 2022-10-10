# ZEROKM - MOVIDA


## Setup Docker Backend Laravel 9 com PHP 8  

*Docker version: "3.7"

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/Elizeu-Medeiros/teste-mov-back-elizeu.git
```

```sh
cd teste-mov-back-elizeu/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=ZeroKm
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=zerokm
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Gerar banco de dados
```sh
php artisan migrate
```

Gerar Vários usuários (senha: secret)
```sh
php artisan db:seed --class=UsersSeeder 
```

Gerar um usuário (usuário: elizeumedeiros@gmail.com senha: secret)
```sh
php artisan db:seed --class=UsersTableSeeder
```

Gerar marcas dos carros
```sh
php artisan db:seed --class=BrandSeeder
```

Gerar carros
```sh
php artisan db:seed --class=CarsSeeder
```

Acesse o projeto
[http://localhost:8080](http://localhost:8080)


## **Configurar Postman**

No Environment -> Global atribua a variável TOKEN a key gerada pelo login e crie na BASE_URL o link conforme exemplo abaixo:

TOKEN -> 1|ipRV4U0DybvdtFFrUAY2lJHLRvIyKfTtPLTzfYUW (exemplo)

BASE_URL -> http://localhost:8080/ 

###Todas as collection necessárias para testar a API encontram-se na pasta .documentacao/Collections
