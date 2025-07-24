<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>
        function toggleFiltros() {
            const filtro = document.getElementById("filtros");
            filtro.style.display = filtro.style.display === "none" ? "flex" : "none";
        }
    </script>
</head>
<body>

<h1>Funcionários</h1>

<!-- Botões -->
<div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
    <a href="/funcionarios/create" class="button">Cadastrar</a>
    <button type="button" class="button" onclick="toggleFiltros()">Mostrar/Ocultar Filtros</button>
</div>

<!-- Filtro -->
<form id="filtros" method="get" action="/funcionarios" style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= esc($_GET['nome'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="<?= esc($_GET['email'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" id="cargo" value="<?= esc($_GET['cargo'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="idade_min">Idade mín</label>
        <input type="number" name="idade_min" id="idade_min" value="<?= esc($_GET['idade_min'] ?? '') ?>" min="0">
    </div>

    <div class="form-group">
        <label for="idade_max">Idade máx</label>
        <input type="number" name="idade_max" id="idade_max" value="<?= esc($_GET['idade_max'] ?? '') ?>" min="0">
    </div>

    <div class="form-group">
        <label for="salario_min">Salário mín</label>
        <input type="number" step="0.01" name="salario_min" id="salario_min" value="<?= esc($_GET['salario_min'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="salario_max">Salário máx</label>
        <input type="number" step="0.01" name="salario_max" id="salario_max" value="<?= esc($_GET['salario_max'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="data_inicio">Data de Início</label>
        <input type="date" name="data_inicio" id="data_inicio" value="<?= esc($_GET['data_inicio'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="data_fim">Data de Fim</label>
        <input type="date" name="data_fim" id="data_fim" value="<?= esc($_GET['data_fim'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="ativo">Ativo?</label>
        <select name="ativo" id="ativo">
            <option value="">Selecione</option>
            <option value="1" <?= ($_GET['ativo'] ?? '') === '1' ? 'selected' : '' ?>>Sim</option>
            <option value="0" <?= ($_GET['ativo'] ?? '') === '0' ? 'selected' : '' ?>>Não</option>
        </select>
    </div>

    <div class="form-group">
        <label for="municipio">Município</label>
        <input type="text" name="municipio" id="municipio" value="<?= esc($_GET['municipio'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="lotacao">Lotação</label>
        <input type="text" name="lotacao" id="lotacao" value="<?= esc($_GET['lotacao'] ?? '') ?>">
    </div>

    <div class="form-group" style="align-self: flex-end;">
        <button type="submit">Filtrar</button>
    </div>
</form>

<!-- Tabela -->
<div class="table-container">
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
                    <a href="/funcionarios/delete/<?= $f->getId() ?>" class="button" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
