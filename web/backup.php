<?php
require('header.php');

# php7
// DICA: Verifique se o IP do banco de dados (192.168.1.20) está acessível pelo container
$mysqli = new mysqli('db', 'express', 'AllSafe0!', 'backup');
$dados = $mysqli->query("SELECT * FROM log");
?>
<div id="grid_content">
    <div class="main_content">
        <?php require('menu.php'); ?>
        <h1>Backups</h1>
        <table cellpadding="0" cellspacing="0" border="0" class="tabela">
            <thead>
                <tr>
                    <th>In&iacute;cio</th>
                    <th>Fim</th>
                    <th>Server</th>
                    <th>Arquivo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Corrigido: Removidos espaços invisíveis que causavam o erro 500
                if ($dados) {
                    while ($log = $dados->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $log['inicio'] ?></td>
                        <td><?php echo $log['fim'] ?></td>
                        <td><?php echo $log['server'] ?></td>
                        <td><?php echo $log['arquivo'] ?></td>
                        <td><?php echo $log['status'] ?></td>
                    </tr>
                    <?php } 
                } ?>
            </tbody>
        </table>
    </div>
    
    <?php require('sidebar.php'); ?>
</div>

<?php
require('footer.php');
?>