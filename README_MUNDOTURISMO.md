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

## 🛠️ Tecnologias Utilizadas

- **Laravel 11**: Framework PHP para backend
- **Tailwind CSS 4**: Framework CSS para estilização
- **Vite**: Build tool para assets
- **Blade**: Template engine do Laravel
- **MySQL/SQLite**: Banco de dados
- **Eloquent ORM**: Mapeamento objeto-relacional

## 📁 Estrutura do Projeto

```
mundoturismo/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php              # Controller da página inicial
│   │   └── TouristAttractionController.php # CRUD de pontos turísticos
│   └── Models/
│       └── TouristAttraction.php           # Modelo dos pontos turísticos
├── database/
│   ├── migrations/
│   │   └── create_tourist_attractions_table.php # Migration da tabela
│   └── seeders/
│       └── TouristAttractionSeeder.php     # Dados de exemplo
├── resources/
│   └── views/
│       └── home.blade.php                  # View da página inicial
├── routes/
│   └── web.php                             # Rotas da aplicação
└── public/
    └── build/                              # Assets compilados
```

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

### Categorias Disponíveis

- **Histórico**: Monumentos e locais históricos
- **Religioso**: Templos, igrejas e locais sagrados
- **Natural**: Parques, montanhas e belezas naturais
- **Cultural**: Museus, teatros e centros culturais
- **Arquitetônico**: Edifícios e estruturas arquitetônicas
- **Gastronômico**: Restaurantes e experiências culinárias
- **Esportivo**: Estádios e locais esportivos
- **Tecnológico**: Centros de tecnologia e inovação

## 🚀 Como Executar

1. **Clone o repositório**:
   ```bash
   git clone <url-do-repositorio>
   cd mundoturismo
   ```

2. **Instale as dependências**:
   ```bash
   composer install
   npm install
   ```

3. **Configure o ambiente**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure o banco de dados**:
   ```bash
   # Edite o arquivo .env com suas configurações de banco
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mundoturismo
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Execute as migrations e seeders**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Compile os assets**:
   ```bash
   npm run build
   ```

7. **Inicie o servidor**:
   ```bash
   php artisan serve
   ```

8. **Acesse a aplicação**:
   Abra http://localhost:8000 no seu navegador

## 🎨 Componentes da Interface

### Header
- Banner ilustrativo com gradiente azul-verde
- Elementos decorativos: prédios, palmeiras, pássaros, avião, barco
- Seletor de idioma (BR/Português)
- Logo e slogan do MundoTurismo

### Seção de Filtros
- Campo de busca por nome com ícone de lupa
- Dropdown para categorias
- Campos para filtrar por país e cidade
- Design em card com sombra
- Botão de busca funcional

### Cards de Pontos Turísticos
- Grid responsivo (1-4 colunas dependendo do tamanho da tela)
- Imagem de fundo com gradiente colorido ou imagem real
- Ícone representativo do ponto turístico
- Nome, localização e categoria
- Tag colorida para categoria
- Descrição resumida
- Efeito hover com sombra

## 📱 Responsividade

A aplicação é totalmente responsiva:
- **Mobile**: 1 coluna de cards
- **Tablet**: 2 colunas de cards
- **Desktop**: 3-4 colunas de cards
- **Header**: Adapta-se a diferentes tamanhos de tela

## 🎯 Pontos Turísticos Incluídos

1. **Cristo Redentor** - Rio de Janeiro, Brasil (Histórico)
2. **Machu Picchu** - Cusco, Peru (Histórico)
3. **Taj Mahal** - Agra, Índia (Religioso)
4. **Torre Eiffel** - Paris, França (Arquitetônico)
5. **Moai** - Ilha de Páscoa, Chile (Cultural)
6. **Monte Fuji** - Honshu, Japão (Natural)
7. **Coliseu** - Roma, Itália (Histórico)
8. **Estátua da Liberdade** - Nova York, EUA (Arquitetônico)

## 🔧 Funcionalidades

### Sistema de Busca
- Busca por nome (português, inglês e espanhol)
- Filtro por categoria
- Filtro por país
- Filtro por cidade
- Resultados em tempo real

### CRUD de Pontos Turísticos
- **Create**: Adicionar novos pontos turísticos
- **Read**: Visualizar lista e detalhes
- **Update**: Editar informações existentes
- **Delete**: Remover pontos turísticos

### Rotas Disponíveis

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/` | Página inicial |
| GET | `/search` | Busca de pontos turísticos |
| GET | `/attractions` | Lista de pontos turísticos (admin) |
| GET | `/attractions/create` | Formulário de criação |
| POST | `/attractions` | Criar novo ponto turístico |
| GET | `/attractions/{id}` | Visualizar ponto turístico |
| GET | `/attractions/{id}/edit` | Formulário de edição |
| PUT | `/attractions/{id}` | Atualizar ponto turístico |
| DELETE | `/attractions/{id}` | Excluir ponto turístico |

## 🎨 Personalização

### Adicionar Novos Pontos Turísticos

1. **Via Interface Admin**:
   - Acesse `/attractions/create`
   - Preencha todos os campos obrigatórios
   - Salve o ponto turístico

2. **Via Seeder**:
   Edite o arquivo `database/seeders/TouristAttractionSeeder.php` e adicione novos itens ao array `$attractions`.

3. **Via Tinker**:
   ```bash
   php artisan tinker
   ```
   ```php
   TouristAttraction::create([
       'cidade' => 'Nome da Cidade',
       'pais' => 'Nome do País',
       'categoria' => 'Categoria',
       'nome_pt' => 'Nome em Português',
       'nome_en' => 'Name in English',
       'nome_es' => 'Nombre en Español',
       // ... outros campos
   ]);
   ```

### Cores Disponíveis para Categorias

O sistema automaticamente associa cores baseadas na categoria:
- `orange` - Histórico
- `purple` - Religioso
- `green` - Natural
- `yellow` - Cultural
- `red` - Arquitetônico
- `pink` - Gastronômico
- `blue` - Esportivo
- `indigo` - Tecnológico

## 📄 Licença

Este projeto está sob a licença MIT.

## 👨‍💻 Desenvolvimento

Para desenvolvimento, use:
```bash
npm run dev
```

Isso iniciará o Vite em modo de desenvolvimento com hot reload.

## 🚀 Próximos Passos

- [x] Implementar banco de dados
- [x] Sistema de busca funcional
- [x] CRUD de pontos turísticos
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
