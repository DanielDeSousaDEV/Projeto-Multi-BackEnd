# Projeto-Multi-BackEnd
## Passo a Passo para testar o projeto
- Clone o projeto na sua maquina `git clone`
- instale as depedencias do projeto `php composer install`
- apos crie e configure um arquivo .env de acordo com o seu ambiente de teste (se preferir use o .env.example de base para a contrução do seu .env)
- execute as migrações para seu banco de dados `php artisan migrate`
- crie o link simbolico entre public e storage `php artisan storage:link`
- apos isso abra o servidor artisan do projeto `php artisan serve`
