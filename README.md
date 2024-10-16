# QuickVote

![QuickVote Logo](https://via.placeholder.com/150)  
*Um sistema de votação completo, desenvolvido 100% em PHP com Laravel, HTML e SCSS.*

## 📋 Sobre o Projeto

QuickVote é uma plataforma de votação moderna e fácil de usar, projetada para permitir a criação, gerenciamento e participação em enquetes de forma intuitiva. Construída com Cleam-Code e desenvolvida com Laravel, o projeto oferece uma interface limpa e estilizada com SCSS para proporcionar uma experiência agradável aos usuários.

## 🚀 Funcionalidades

- **Criação de enquetes**: Configure enquetes com títulos, datas de início e término.
- **Gerenciamento dinâmico de opções**: Adicione e remova opções de respostas com facilidade.
- **Interface intuitiva**: UI amigável com design responsivo para todos os dispositivos.
- **Paginação e navegação simples**: Explore facilmente as enquetes disponíveis.

## 🛠️ Tecnologias Utilizadas

- **Back-end**: [PHP](https://www.php.net/) com [Laravel](https://laravel.com/)
- **Front-end**: [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML), [SCSS](https://sass-lang.com/)
- **Banco de dados**: Suporte para diferentes SGBDs, configurável no Laravel

## 📦 Como Configurar o Projeto

1. **Clone este repositório:**
   ```bash
   git clone https://github.com/seu-usuario/quickvote.git
   ```
2. **Instale as dependências do Composer:**
   ```bash
   composer install
   ```
3. **Configure o arquivo .env para o banco de dados:***
   ```bash
   cp .env.example .env
   ```
   Edite o arquivo .env com suas configurações de banco de dados. Por padrão, o projeto está configurado para utilizar MySQL.

4. **Gere a chave da aplicação:***
   ```bash
   php artisan key:generate
   ```
   
5. **Execute as migrações para criar as tabelas no banco de dados:***
   ```bash
   php artisan migrate
   ```

6. **Inicie o servidor local:***
   ```bash
   php artisan serve
   ```

7. **Acesse o projeto no navegador:***
   ```bash
   http://localhost:8000
   ```

## 🎨 Como Contribuir

1. Faça um fork do projeto.
2. Crie uma nova branch com sua funcionalidade/correção: `git checkout -b minha-feature`
3. Commit suas alterações: `git commit -m 'Adiciona nova funcionalidade'`
4. Envie para a branch principal: `git push origin minha-feature`
5. Abra um Pull Request

## 🤝 Contribuidores

Agradecimentos a todos que contribuíram para o desenvolvimento deste projeto! ❤️

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 📧 Contato

Para dúvidas ou sugestões, entre em contato:

- **Email**: [murilomayer@live.com](mailto:murilomayer@live.com)
- **LinkedIn**: [Murilo Mayer Van Nouhuys](https://www.linkedin.com/in/murilomayer)

