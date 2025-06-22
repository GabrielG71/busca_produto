# 🔍 Busca Produto
**`Sistema de Controle de Estoque`**

Sistema desenvolvido em Laravel para gerenciamento de produtos empresariais com diferentes níveis de acesso. Admins podem cadastrar e editar produtos, enquanto usuários normais visualizam e controlam a saída do estoque.

<p align="left">
    <img alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
    <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
    <img alt="MySQL" src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
</p>

---

<div align="center">

## ⚡ Instalação Rápida

</div>

**1. Clone e instale dependências**
```bash
git clone https://github.com/usuario/busca-produto.git
cd busca-produto
composer install && npm install && npm run dev
```

**2. Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

**3. Configure seu banco no `.env`**
```env
DB_DATABASE=busca_produto
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**4. Execute migrações**
```bash
php artisan migrate
```

**5. Personalize usuários**
> Vá até `database/seeders/UserSeeder.php` e configure os usuários como desejar

```bash
php artisan db:seed
```

**6. Execute o projeto**
```bash
php artisan serve
```

---

<div align="center">

## 🎯 Funcionalidades

<p align="center">
  <img alt="Admin" src="https://img.shields.io/badge/👨‍💼_Admin-Cadastro_e_Edição-4CAF50?style=flat-square"/>
  <img alt="User" src="https://img.shields.io/badge/👤_Usuário-Visualização_e_Baixa-2196F3?style=flat-square"/>
</p>

**Acesse em:** `http://localhost:8000`

⭐ **Não esqueça de dar uma estrela se curtiu o projeto!**

</div>