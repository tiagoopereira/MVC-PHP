<?php include __DIR__ . '/../inicio-html.php'; ?>
<center>
    <h1>Adicionar Reserva</h1>

    <form action="/salvar" method="POST">
        <select name="carro">
            <optgroup label="Veículos">
                <?php
                    foreach($carros as $carro):
                ?>
                        <option value="<?= $carro->getId(); ?>"><?= $carro->getNome(); ?></option>
                <?php
                    endforeach;
                ?>
            </optgroup>
        </select><br/>

        <input type="text" name="data_inicio" placeholder="Data Inicial" required/><br/>
        <input type="text" name="data_fim" placeholder="Data Final" required/><br/>
        <input type="text" name="nome_reservante" placeholder="Nome do Reservante" required/><br/>
        <input type="submit" name="btn-reservar" value="Reservar"/>
    </form>

    <a href="/home">Voltar</a>
</center>
<?php include __DIR__ . '/../fim-html.php'; ?>