<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<h1>Cadastrar Funcionário</h1>

<!-- Botões no topo lado a lado -->
<div class="top-buttons">
    <a href="/funcionarios" class="button">← Voltar</a>
    <button form="form-cadastro" type="submit">Salvar</button>
</div>

<form method="post" action="/funcionarios/store" id="form-cadastro">

    <div class="form-group">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" placeholder="Nome" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="idade">Idade</label>
        <input name="idade" id="idade" type="number" placeholder="Idade">
    </div>

    <div class="form-group">
        <label for="cargo">Cargo</label>
        <input name="cargo" id="cargo" placeholder="Cargo">
    </div>

    <div class="form-group">
        <label for="salario">Salário</label>
        <input name="salario" id="salario" type="number" step="0.01" placeholder="Salário">
    </div>

    <div class="form-group">
        <label for="data_admissao">Data de Admissão</label>
        <input name="data_admissao" id="data_admissao" type="date">
    </div>

    <div class="form-group">
        <label for="ativo">Status</label>
        <select name="ativo" id="ativo">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
    </div>

    <div class="form-group">
        <label for="municipio">Município</label>
        <input name="municipio" id="municipio" placeholder="Município">
    </div>

    <div class="form-group">
        <label for="lotacao">Lotação</label>
        <input name="lotacao" id="lotacao" placeholder="Lotação">
    </div>

</form>

</body>
</html>
