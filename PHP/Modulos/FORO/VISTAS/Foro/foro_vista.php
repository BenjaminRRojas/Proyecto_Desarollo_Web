<section>
    <!-- Iteración de los Foros -->
    <div class="container-fluid">
        <?php foreach($foros as $foro):
            $id=htmlspecialchars($foro->id_foro);
            $titulo=htmlspecialchars($foro->titulo);
            $fecha=htmlspecialchars($foro->fecha_creacion);
            $descripcion=htmlspecialchars($foro->descripcion);
        ?>
            <div class="container-fluid bg-light">
                <div>
                    <a href="?c=comentario&id=<?=$foro->id_foro?>"><h2><?=$titulo?></h2></a>
                </div>
                <p><?=$descripcion?></p>
            </div>
        <?php endforeach?>
    </div>
</section>    