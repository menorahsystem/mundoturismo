# 📊 Configuração do Google Adsense - ExploreNow

## 🎯 Slots de Anúncios Configurados

Este documento mostra os **4 slots de anúncios** que você precisa criar no painel do Google Adsense e onde substituir os códigos.

---

## 📝 Slots Necessários

### 1️⃣ **SLOT_TOPO_HOME** - Anúncio do Topo da Página Inicial
- **Localização**: `resources/views/home.blade.php` (linha ~905)
- **Posição no site**: Logo após o carousel, antes dos cards de atrações
- **Formato**: Horizontal / Display
- **Descrição**: Primeira coisa que o usuário vê ao rolar a página

### 2️⃣ **SLOT_MEIO_HOME** - Anúncio do Meio da Página Inicial
- **Localização**: `resources/views/home.blade.php` (linha ~992)
- **Posição no site**: Após todos os cards de pontos turísticos
- **Formato**: Horizontal / Display
- **Descrição**: Usuário já viu o conteúdo, ótima taxa de clique

### 3️⃣ **SLOT_TOPO_ATRACAO** - Anúncio do Topo da Página de Detalhes
- **Localização**: `resources/views/attractions/show.blade.php` (linha ~95)
- **Posição no site**: Logo após a imagem da atração turística
- **Formato**: Horizontal / Display
- **Descrição**: Usuário está interessado no local, alto engajamento

### 4️⃣ **SLOT_RODAPE_ATRACAO** - Anúncio do Rodapé da Página de Detalhes
- **Localização**: `resources/views/attractions/show.blade.php` (linha ~282)
- **Posição no site**: Antes do botão "Voltar"
- **Formato**: Horizontal / Display
- **Descrição**: Usuário terminou de ler, pronto para clicar

---

## 🚀 Passo a Passo - Como Configurar

### 1. Acesse o Google Adsense
- Entre em: https://www.google.com/adsense/
- Faça login com sua conta

### 2. Crie os Blocos de Anúncio

Para **CADA** um dos 4 slots acima:

1. Vá em **"Anúncios"** → **"Por unidade de anúncio"**
2. Clique em **"Criar nova unidade de anúncio"**
3. Escolha **"Anúncios display"**
4. Configure:
   - **Nome**: Use os nomes acima (ex: "SLOT_TOPO_HOME")
   - **Tipo**: Responsivo
   - **Tamanho**: Horizontal ou Automático
5. Clique em **"Criar"**
6. **COPIE** o código gerado
7. Procure a linha que tem `data-ad-slot="XXXXXXXXXX"`
8. **COPIE APENAS O NÚMERO** (10 dígitos)

### 3. Substitua nos Arquivos

Abra os arquivos e substitua os placeholders:

#### `resources/views/home.blade.php`
```html
<!-- Encontre e substitua: -->
data-ad-slot="SLOT_TOPO_HOME"
<!-- Por (exemplo): -->
data-ad-slot="1234567890"

<!-- E também: -->
data-ad-slot="SLOT_MEIO_HOME"
<!-- Por (exemplo): -->
data-ad-slot="0987654321"
```

#### `resources/views/attractions/show.blade.php`
```html
<!-- Encontre e substitua: -->
data-ad-slot="SLOT_TOPO_ATRACAO"
<!-- Por (exemplo): -->
data-ad-slot="1122334455"

<!-- E também: -->
data-ad-slot="SLOT_RODAPE_ATRACAO"
<!-- Por (exemplo): -->
data-ad-slot="5544332211"
```

---

## 📊 Vantagens de Usar Slots Diferentes

✅ **Rastreamento separado** - Veja qual posição tem mais cliques  
✅ **Otimização** - Desative posições com baixo desempenho  
✅ **Teste A/B** - Experimente formatos diferentes em cada slot  
✅ **Relatórios detalhados** - Saiba exatamente de onde vem o dinheiro  

---

## ⚠️ IMPORTANTE

- O `data-ad-client` já está correto em todos: `ca-pub-3039233942822179`
- Você só precisa substituir os `data-ad-slot`
- **NÃO** mude o resto do código
- Após substituir, rode: `php artisan view:clear`

---

## 📞 Suporte

Se tiver dúvidas sobre onde encontrar os códigos no Adsense, consulte:
https://support.google.com/adsense/answer/9274025

---

**Última atualização**: Outubro 2024

