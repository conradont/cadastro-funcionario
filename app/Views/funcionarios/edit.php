<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 0.3rem;
        }

        .form-group input,
        .form-group select {
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ccc;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #aaa;
        }

        button {
            padding: 8px 16px;
            font-size: 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 2rem auto;
            padding: 1rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: flex-start;
        }
    </style>
</head>
<body>

<h1>Editar Funcionário</h1>

<form method="post" action="/funcionarios/update/<?= $funcionario->getId() ?>">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= esc($funcionario->getNome()) ?>" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?= esc($funcionario->getEmail()) ?>" required>
    </div>

    <div class="form-group">
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?= esc($funcionario->getIdade()) ?>">
    </div>

    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" id="cargo" value="<?= esc($funcionario->getCargo()) ?>">
    </div>

    <div class="form-group">
        <label for="salario">Salário:</label>
        <input type="number" step="0.01" name="salario" id="salario" value="<?= esc($funcionario->getSalario()) ?>">
    </div>

    <div class="form-group">
        <label for="dataAdmissao">Data de Admissão:</label>
        <input type="date" name="dataAdmissao" id="dataAdmissao" value="<?= esc($funcionario->getDataAdmissao()->format('Y-m-d')) ?>">
    </div>

    <div class="form-group">
        <label for="ativo">Ativo:</label>
        <select name="ativo" id="ativo">
            <option value="1" <?= $funcionario->isAtivo() ? 'selected' : '' ?>>Sim</option>
            <option value="0" <?= !$funcionario->isAtivo() ? 'selected' : '' ?>>Não</option>
        </select>
    </div>

    <div class="form-group">
        <label for="municipio">Município:</label>
        <input type="text" name="municipio" id="municipio" value="<?= esc($funcionario->getMunicipio()) ?>">
    </div>

    <div class="form-group">
        <label for="lotacao">Lotação:</label>
        <input type="text" name="lotacao" id="lotacao" value="<?= esc($funcionario->getLotacao()) ?>">
    </div>

    <div class="form-group form-actions">
        <button type="submit">Salvar</button>
        <a href="/funcionarios" class="button">Voltar</a>
    </div>

</form>

</body>
</html>
