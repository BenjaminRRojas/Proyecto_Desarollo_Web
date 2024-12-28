<section>
    <!-- Iteración de los Foros -->
    <div class="container-fluid">
        <a href="?c=comentario&css=style-listadocentes.css">Tabla</a>
        <?php foreach($items as $r):
            $id=htmlspecialchars($r->id_foro);
            $titulo=htmlspecialchars($r->titulo);
            $fecha=htmlspecialchars($r->fecha_creacion);
            $descripcion=htmlspecialchars($r->descripcion);
        ?>
            <div class="container-fluid bg-light">
                <div class="d-flex justify-content-between">
                    <a href="?c=comentario&id=<?=$id?>"><h2><?=$titulo?></h2></a>
                    <h6><?=$fecha?></h6>
                </div>
                <p><?=$descripcion?></p>
            </div>
        <?php endforeach?>
    </div>
</section>    