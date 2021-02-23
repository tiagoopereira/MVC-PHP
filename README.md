# SistemaReservas
Realizei este projeto em um curso de PHP e resolvi adaptá-lo ao padrão MVC (com uma estrutura um pouco diferente do padrão).

## Execução
- composer install (Para instalar as dependências e gerar o arquivo de autoload).
- Utilizando docker:
  - docker-compose up -d
  - Rodar o script *db.sql* no banco de dados.
- Sem docker:
  - php -S 0.0.0.0:80 -t public/
  - Configurar os dados de acesso ao banco em *src/Repository/BaseRepository.php*, se necessário.
  - Rodar o script *db.sql* no banco de dados.
