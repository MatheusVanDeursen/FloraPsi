# FloraPsi (v0.2) 🌿

**FloraPsi** é um tema exclusivo e de alta performance para WordPress, desenvolvido sob medida para profissionais de psicologia. O projeto une uma estética minimalista e botânica a uma arquitetura de software flexível, permitindo que a identidade visual e 100% do conteúdo sejam gerenciados de forma intuitiva pelo usuário final através de uma interface administrativa personalizada.

📖 **[Acesse aqui o Guia Completo do Tema](https://docs.google.com/document/d/1BoPj5-aRH9Y8iS-Oh1OZF7Lpo5r8DRBG59gBX58oteI/edit?usp=sharing)**

---

## ✨ Novidades da Versão 0.2
* **Padronização de Namespace:** Migração total de funções e variáveis para o prefixo único `florapsi_`, eliminando conflitos de escopo e aumentando a segurança do código.
* **Responsividade Dinâmica:** Implementação de controles para definição manual de *breakpoints* para Tablet (padrão 1176px) e Mobile (padrão 576px) via painel administrativo.
* **Controle de Layout Granular:** Inclusão de ajustes específicos de *padding* vertical e largura máxima de imagens para diferentes dispositivos em seções críticas como "Sobre Mim" e "Meu Percurso".

## 🛠️ Funcionalidades Detalhadas

### 🎨 Personalização em Tempo Real (Customizer API)
O tema utiliza a API nativa do WordPress para gerenciar estilos sem a necessidade de editar arquivos CSS manualmente:
* **Banner Principal:** Edição de frases, tipografia completa (família, tamanho e peso) e personalização de cores do botão CTA, incluindo o estado de *hover*.
* **Gestão de Seções:** Painéis dedicados para "Sobre Mim", "Meu Percurso" e "Serviços", com subseções organizadas para cores, fontes e ajustes responsivos independentes.
* **Tipografia Selecionável:** Suporte nativo a fontes premium como *Tan Mon Cheri* e *Sofia Pro*, além de fontes seguras da web (Arial, Helvetica, etc.).
* **Botão Flutuante (WhatsApp):** Controle total de link, cores do ícone/fundo, tamanho do botão e posicionamento exato na tela (distância da base e direita).

### 📝 Gestão de Conteúdo (CMB2)
A estruturação do conteúdo é feita via Metaboxes, separando a lógica de design do preenchimento de dados:
* **Campos Repetíveis:** Adição de cards de serviços (com suporte a ícones FontAwesome) e sistema de FAQ (acordeão) de forma ilimitada.
* **Depoimentos Inteligentes:** Suporte híbrido para inserção de *shortcodes* de widgets externos ou cadastro manual de feedbacks via painel.

### ⚡ Performance e Experiência do Usuário
* **Vanilla JS:** Interações como menu mobile, acordeões e carrossel infinito desenvolvidas totalmente em JavaScript puro (jQuery-free).
* **Animações de Scroll:** Uso da API `IntersectionObserver` para disparar efeitos de surgimento (`.slide-animation`) de forma otimizada para o navegador.
* **Cache Management:** Sistema de versionamento automático (`filemtime`) para arquivos estáticos, garantindo que atualizações de CSS/JS sejam aplicadas imediatamente aos usuários.

## 🚀 Tecnologias Utilizadas
* **PHP 8.x:** Lógica de templates e integração WordPress.
* **WordPress Customizer API:** Motor de estilização e responsividade dinâmica.
* **CMB2 Framework:** Gestão de campos personalizados e metaboxes.
* **CSS3 (Flexbox/Grid):** Layouts modernos e animações complexas baseadas em `@keyframes`.
* **FontAwesome 6.5.1:** Biblioteca de ícones integrada para a seção de serviços.

## 📦 Instalação

1.  Clone este repositório no diretório de temas do seu WordPress: `/wp-content/themes/florapsi`.
2.  Certifique-se de que o plugin **[CMB2](https://wordpress.org/plugins/cmb2/)** está instalado e ativo.
3.  Ative o tema no menu **Aparência > Temas**.
4.  Certifique-se de ter uma página criada com o título **"Início"** para que todos os campos de edição apareçam no painel administrativo.

---
**Desenvolvedor:** Matheus Van Deursen  
**Versão:** 0.2 (Janeiro/2026)  
*Este projeto demonstra competências em desenvolvimento de temas WordPress profissionais, escaláveis e centrados na experiência do usuário.*