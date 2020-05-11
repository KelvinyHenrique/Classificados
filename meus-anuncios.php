<?php  require './assets/php/classes/header.php'; ?>
<?php 
    if(empty($_SESSION['cLogin'])) {
        ?>
            <script type="text/javascript">window.location.href="login.php";</script>
        <?php
    }
?>
<div class="container">
    <h1>Anúncios</h1>

    <a class="btn btn-default" href="add-anuncio.php">Adicionar Anuncio</a>
    <table class="table table striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>

        <?php 
            require './assets/php/classes/anuncios.php';
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios();

            foreach($anuncios as $anuncio):
                ?>

                <tr>
                    <td><?php
                    if(!empty($anuncio['url'])): ?>
                    <img src="./assets/images/anuncios/<?php echo $anuncio['url'];?>" alt="Anuncio imagem"  height="50">
                    <?php else: ?>
                          <img src="./assets/images/anuncios/default.svg" height="50"  alt="default">
                    <?php endif;?>
                    </td>
                    <td><?php echo $anuncio['titulo']; ?></td>
                    <td>R$<?php echo number_format($anuncio['valor'], 2);?></td>
                    <td>
                        <a class="btn btn-warning" href="editar-anuncio.php?id=<?php echo $anuncio['id'];?>">Editar</a>
                        <a class="btn btn-danger" href="excluir-anuncio.php?id=<?php echo $anuncio['id'];?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
</div>



<?php require './assets/php/classes/footer.php'; ?>