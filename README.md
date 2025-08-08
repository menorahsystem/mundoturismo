# MundoTurismo

Uma plataforma web para descobrir e compartilhar pontos turísticos ao redor do mundo, desenvolvida com Laravel e Tailwind CSS.

## 🚀 Características

- **Design Moderno**: Interface limpa e responsiva usando Tailwind CSS
- **Header Ilustrativo**: Banner com ilustração de cidade turística
- **Sistema de Filtros**: Busca por nome, categoria, país e cidade
- **Cards de Pontos Turísticos**: Exibição em grid com informações detalhadas
- **Responsivo**: Funciona perfeitamente em dispositivos móveis e desktop
- **Base de Dados**: Sistema completo de gerenciamento de pontos turísticos
- **Multilíngue**: Suporte para português, inglês e espanhol
- **Painel Admin**: Interface completa para gerenciar pontos turísticos
- **Modal de Detalhes**: Visualização detalhada dos pontos turísticos
- **Busca Dinâmica**: Categorias carregadas automaticamente do banco de dados

## 🗄️ Estrutura da Base de Dados

### Tabela: tourist_attractions

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | BIGINT | Chave primária (auto-incremento) |
| `cidade` | VARCHAR(255) | Nome da cidade |
| `pais` | VARCHAR(255) | Nome do país |
| `categoria` | VARCHAR(255) | Categoria do ponto turístico |
| `imagem_url` | VARCHAR(500) | URL da imagem (opcional) |
| `endereco` | TEXT | Endereço completo (opcional) |
| `nome_pt` | VARCHAR(255) | Nome em português |
| `nome_en` | VARCHAR(255) | Nome em inglês |
| `nome_es` | VARCHAR(255) | Nome em espanhol |
| `descricao_pt` | TEXT | Descrição em português (opcional) |
| `descricao_en` | TEXT | Descrição em inglês (opcional) |
| `descricao_es` | TEXT | Descrição em espanhol (opcional) |
| `created_at` | TIMESTAMP | Data de criação |
| `updated_at` | TIMESTAMP | Data de atualização |

## 🌐 Rotas da Aplicação

### Rotas Públicas
- `GET /` - Página inicial com lista de pontos turísticos
- `GET /search` - Busca e filtros de pontos turísticos
- `GET /attractions/{attraction}` - Detalhes de um ponto turístico (página pública)
- `GET /language/{locale}` - Alteração de idioma (pt, en, es)

### Rotas Admin
- `GET /admin` - Redireciona para o painel de administração
- `GET /admin/attractions` - Lista todos os pontos turísticos
- `GET /admin/attractions/create` - Formulário para criar novo ponto
- `POST /admin/attractions` - Salva novo ponto turístico
- `GET /admin/attractions/{attraction}` - Visualiza detalhes de um ponto
- `GET /admin/attractions/{attraction}/edit` - Formulário para editar
- `PUT/PATCH /admin/attractions/{attraction}` - Atualiza ponto turístico
- `DELETE /admin/attractions/{attraction}` - Remove ponto turístico

## 🎨 Funcionalidades

### Página Inicial
- **Header Responsivo**: Com seletor de idioma e busca integrada
- **Sistema de Busca**: Filtros por nome, categoria, país e cidade
- **Cards Dinâmicos**: Exibição de pontos turísticos com gradientes e ícones
- **Modal de Detalhes**: Visualização completa ao clicar no ícone de olho
- **Multilíngue**: Conteúdo adaptado ao idioma selecionado

### Painel Administrativo
- **Listagem Paginada**: Todos os pontos turísticos com paginação
- **CRUD Completo**: Criar, visualizar, editar e deletar pontos
- **Validação**: Formulários com validação completa
- **Feedback**: Mensagens de sucesso e erro
- **Interface Intuitiva**: Design limpo e fácil de usar

### Sistema de Busca
- **Busca por Nome**: Pesquisa em português, inglês e espanhol
- **Filtro por Categoria**: Categorias carregadas dinamicamente do banco
- **Filtro por País**: Busca por país
- **Filtro por Cidade**: Busca por cidade
- **Persistência**: Valores mantidos após busca
- **Botão Limpar**: Remove todos os filtros aplicados

## 🛠️ Tecnologias Utilizadas

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Tailwind CSS 4, JavaScript vanilla
- **Banco de Dados**: MySQL/PostgreSQL/SQLite
- **Build Tool**: Vite
- **ORM**: Eloquent (Laravel)

## 🚀 Como Executar

1. **Clone o repositório e instale as dependências:**
   ```bash
   composer install
   npm install
   ```

2. **Configure o ambiente:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure o banco de dados:**
   - Edite o arquivo `.env` com suas configurações de banco de dados
   - Execute as migrações e seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Compile os assets:**
   ```bash
   npm run build
   ```

5. **Inicie o servidor:**
   ```bash
   php artisan serve
   ```

6. **Acesse a aplicação:**
   - Site principal: http://localhost:8000
   - Painel admin: http://localhost:8000/admin (redireciona para /admin/attractions)
   - Link secreto no rodapé da página inicial (texto transparente)

## 📁 Estrutura do Projeto

```
mundoturismo/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php          # Controlador da página inicial
│   │   └── TouristAttractionController.php  # CRUD de pontos turísticos
│   ├── Models/
│   │   └── TouristAttraction.php      # Modelo com accessors multilíngue
│   └── Http/Middleware/
│       └── SetLocale.php              # Middleware para idioma
├── database/
│   ├── migrations/
│   │   └── create_tourist_attractions_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── TouristAttractionSeeder.php
├── resources/views/
│   ├── home.blade.php                 # Página inicial
│   ├── admin/attractions/
│   │   ├── index.blade.php            # Lista de pontos turísticos
│   │   ├── create.blade.php           # Formulário de criação
│   │   ├── edit.blade.php             # Formulário de edição
│   │   └── show.blade.php             # Visualização detalhada
│   └── attractions/
│       └── show.blade.php             # Página pública de detalhes
└── routes/
    └── web.php                        # Definição das rotas
```

## 🌍 Suporte Multilíngue

O sistema suporta três idiomas:
- **Português (pt)** - Idioma padrão
- **Inglês (en)** - English
- **Espanhol (es)** - Español

### Como Funciona
- O idioma é definido via sessão
- O middleware `SetLocale` define o idioma da aplicação
- Os accessors do modelo retornam o conteúdo no idioma correto
- As views usam `app()->getLocale()` para exibir textos apropriados

## 🎯 Funcionalidades Implementadas

- [x] Página inicial responsiva
- [x] Sistema de busca e filtros
- [x] Cards de pontos turísticos
- [x] Modal de detalhes
- [x] Suporte multilíngue
- [x] Painel administrativo completo
- [x] CRUD de pontos turísticos
- [x] Validação de formulários
- [x] Persistência de dados
- [x] Categorias dinâmicas
- [x] Botão limpar busca
- [x] Design responsivo

## 🚀 Próximos Passos

- [ ] Sistema de autenticação
- [ ] Upload de imagens
- [ ] Sistema de avaliações
- [ ] Comentários dos usuários
- [ ] API REST
- [ ] PWA (Progressive Web App)
- [ ] Sistema de favoritos
- [ ] Mapa interativo
- [ ] Sistema de rotas turísticas
- [ ] Integração com APIs externas (Google Places, etc.)

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🤝 Contribuição

Contribuições são bem-vindas! Por favor, leia as diretrizes de contribuição antes de enviar um pull request.

---

**MundoTurismo** - Descubra os destinos mais incríveis do mundo! 🌍✈️
