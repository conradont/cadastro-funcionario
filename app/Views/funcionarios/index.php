<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<h1>Funcionários</h1>

<a href="/funcionarios/create" class="button">Cadastrar</a>

<!-- Filtro -->
<form method="get" action="/funcionarios">
    <input type="text" name="nome" placeholder="Nome" value="<?= esc($_GET['nome'] ?? '') ?>">
    <input type="text" name="email" placeholder="E-mail" value="<?= esc($_GET['email'] ?? '') ?>">
    <input type="text" name="cargo" placeholder="Cargo" value="<?= esc($_GET['cargo'] ?? '') ?>">

    <input type="number" name="idade_min" placeholder="Idade mín" value="<?= esc($_GET['idade_min'] ?? '') ?>" min="0">
    <input type="number" name="idade_max" placeholder="Idade máx" value="<?= esc($_GET['idade_max'] ?? '') ?>" min="0">

    <input type="number" step="0.01" name="salario_min" placeholder="Salário mín" value="<?= esc($_GET['salario_min'] ?? '') ?>">
    <input type="number" step="0.01" name="salario_max" placeholder="Salário máx" value="<?= esc($_GET['salario_max'] ?? '') ?>">

    <input type="date" name="data_inicio" value="<?= esc($_GET['data_inicio'] ?? '') ?>">
    <input type="date" name="data_fim" value="<?= esc($_GET['data_fim'] ?? '') ?>">

    <select name="ativo">
        <option value="">Ativo?</option>
        <option value="1" <?= ($_GET['ativo'] ?? '') === '1' ? 'selected' : '' ?>>Sim</option>
        <option value="0" <?= ($_GET['ativo'] ?? '') === '0' ? 'selected' : '' ?>>Não</option>
    </select>

    <input type="text" name="municipio" placeholder="Município" value="<?= esc($_GET['municipio'] ?? '') ?>">
    <input type="text" name="lotacao" placeholder="Lotação" value="<?= esc($_GET['lotacao'] ?? '') ?>">

    <button type="submit">Filtrar</button>
</form>

<!-- Tabela -->
<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Cargo</th>
        <th>Ações</th>
    </tr>

    <?php if (empty($funcionarios)): ?>
        <tr>
            <td colspan="4" class="message">Nenhum funcionário encontrado.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($funcionarios as $f): ?>
        <tr>
            <td><?= esc($f->getNome()) ?></td>
            <td><?= esc($f->getEmail()) ?></td>
            <td><?= esc($f->getCargo()) ?></td>
            <td>
                <a href="/funcionarios/edit/<?= $f->getId() ?>" class="button">Editar</a>
                <a href="/funcionarios/delete/<?= $f->getId() ?>" onclick="return confirm('Deseja realmente excluir?')" class="button">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>
