# Projeto-Multi-BackEnd
## Passo a Passo para testar o projeto
- Clone o projeto na sua maquina `git clone`
- apos crie e configure um arquivo .env de acordo com o seu ambiente de teste
- execute as migrações para seu banco de dados ´php artisan migrate´
- crie o link simbolico entre public e storage `php artisan storage:link`
- apos isso abra o servidor artisan do projeto `php artisan serve`
