# FloraPsi WordPress Theme 🌿
**Versão:** 0.4 (Beta)

Um tema WordPress exclusivo, minimalista e de alta performance, desenvolvido com Vanilla JS para profissionais de psicologia. O projeto une uma estética botânica a uma arquitetura de software robusta, focada na autonomia do usuário e na experiência do paciente.

---

## 📚 Documentação Oficial (v0.4)
Para garantir a melhor experiência de uso e desenvolvimento, a documentação foi dividida em dois guias essenciais:

* 📘 **[Manual Técnico do Tema](https://docs.google.com/document/d/1BoPj5-aRH9Y8iS-Oh1OZF7Lpo5r8DRBG59gBX58oteI/edit?usp=sharing)** *Focado em instalação, arquitetura de código, gestão de conteúdo via CMB2 e conformidade ética.*
* 🎨 **[Guia de Edição Visual](https://docs.google.com/document/d/1Nv8y3Lwrob75YsDo1gc83MB_fJTQVyxZmj5JxBgTwoo/edit?usp=sharing)** *Focado na personalização estética via Customizer (cores, fontes, responsividade e imagens).*

---

## 🚀 Funcionalidades Principais

### Governança Híbrida
O tema utiliza uma separação lógica para facilitar a manutenção:
* **Conteúdo Estrutural (CMB2):** Biografias, Serviços (grupos repetíveis), FAQ e Depoimentos são geridos na edição da página.
* **Identidade Visual (Customizer):** Cores, tipografia, paddings e layouts são geridos em tempo real no personalizador nativo.

### Performance e Arquitetura
* **Vanilla JS:** Zero dependência de jQuery ou bibliotecas pesadas de animação.
* **One-Page Architecture:** Navegação fluida via *smooth scroll* e links âncora.
* **CSS Dinâmico:** Injeção de variáveis PHP no `<head>` para sobrescrever estilos estáticos sem latência.
* **Cache Busting:** Versionamento automático de arquivos via `filemtime()` para atualizações imediatas no navegador do cliente.

### Responsividade Avançada
* **Controle Granular de Imagens:** Sistema duplo de medidas para avatares e fotos (Pixels fixos para Tablet / Porcentagem fluida para Mobile).
* **Breakpoints Dinâmicos:** As media queries respondem às configurações do banco de dados, não apenas a arquivos CSS estáticos.

---

## 🛠 Instalação e Configuração

1.  Faça o download do arquivo `.zip` deste repositório ou clone a pasta em `/wp-content/themes/`.
2.  Renomeie a pasta para `florapsi` (caso esteja como `FloraPsi-main`).
3.  Ative o tema no Painel do WordPress.
4.  **Obrigatório:** Instale e ative o plugin **CMB2** para habilitar os campos de edição de conteúdo.
5.  Acesse **Aparência > Personalizar** para definir a identidade visual inicial.

---

## 📦 Changelog (v0.4)

* **Seção Contatos Refatorada:** A seção contatos foi refeira do zero com um novo modelo mais moderno. Foram adicionadas customizações completas e animações aos elementos da seção.
* **SEO Aprimorado:** Pequenas melhorias ao SEO com uso de tags mais pertinentes.

---

## ⚠️ Nota Ética e Legal
**Sobre a Seção de Depoimentos:**
Embora o tema possua capacidade técnica para exibir depoimentos (via shortcode ou manual), esta funcionalidade é desativada por padrão em conformidade com o **Código de Ética Profissional do Psicólogo (CEPP)**. A ativação e uso desta seção são de inteira responsabilidade do profissional titular do site. Consulte o Manual Técnico para mais detalhes.

---

**Desenvolvido por Matheus Van Deursen**