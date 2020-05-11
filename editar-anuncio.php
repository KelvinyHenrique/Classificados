<?php  require './assets/php/classes/header.php'; ?>
<?php 
    if(empty($_SESSION['cLogin'])) {
        ?>
            <script type="text/javascript">window.location.href="login.php";</script>
        <?php
    }


    require './assets/php/classes/anuncios.php';
    $a = new Anuncios();

    if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = addslashes($_POST['titulo']);
        $categoria = addslashes($_POST['categoria']);
        $valor = addslashes($_POST['valor']);
        $descricao = addslashes($_POST['descricao']);
        $estado = addslashes($_POST['estado']);

        $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
        ?>
            <div class="alert alert-success">
                Produto adicionado com sucesso
            </div>
        <?php
    }

    if(isset($_GET['id']) && !empty($_GET['id'])) {
          $info = $a->getAnuncio($_GET['id']);
    } else {?>
        <script type="text/javascript">window.location.href="meus-anuncios.php";</script>
   <?php 
    }
  
?>

<div class="container">
    <h1>Meus Anúncios - Editar anúncio</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
              <?php 
              require './assets/php/classes/categorias.php';
                $c = new Categorias();
                $cats = $c->getLista();
                foreach($cats as $cat):
                    ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome'];?></option>
                    <?php
endforeach;
              ?>
            </select>
        </div>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado de Conservaçãp:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0">Ruin</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
            </select>
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</div>

<?php  require './assets/php/classes/footer.php'; ?>