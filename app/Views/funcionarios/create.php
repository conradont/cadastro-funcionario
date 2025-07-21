<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<h1>Cadastrar Funcionário</h1>
<a href="/funcionarios" class="button">← Voltar</a>

<form method="post" action="/funcionarios/store">
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" placeholder="Nome">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label>Idade</label>
        <input name="idade" type="number" placeholder="Idade">
    </div>

    <div class="form-group">
        <label>Cargo</label>
        <input name="cargo" placeholder="Cargo">
    </div>

    <div class="form-group">
        <label>Salário</label>
        <input name="salario" type="number" step="0.01" placeholder="Salário">
    </div>

    <div class="form-group">
        <label>Data de Admissão</label>
        <input name="data_admissao" type="date">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="ativo">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
    </div>

    <div class="form-group">
        <label>Município</label>
        <input name="municipio" placeholder="Município">
    </div>

    <div class="form-group">
        <label>Lotação</label>
        <input name="lotacao" placeholder="Lotação">
    </div>

    <div class="form-group" style="align-self: flex-end;">
        <button type="submit">Salvar</button>
    </div>
</form>

</body>
</html>
